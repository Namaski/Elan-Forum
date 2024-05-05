<?php

namespace Controller;

use App\Session;
use App\Manager;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use PHPMailer\PHPMailer\OAuthTokenProvider;

class SecurityController extends AbstractController
{
    // contiendra les méthodes liées à l'authentification : register, login et logout


    //LOGIN/REGISTER PANEL
    public function showLoginPanel()
    {
        require "view\security\login.php";
    }

    public function showRegisterPanel()
    {
        require "view\security\login.php";
    }



    /**
     * REGISTER
     */
    public function register()
    {

        if ($_POST['submit']) {

            $newUser = new UserManager;

            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password1 = filter_input(INPUT_POST, "password1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($username && $email && $password1 && $password2) { // CHECK IF THE FILTER DONT RETURN NON-NULL VALUE


                if ($newUser->findUserMail($email)) { // CHECK IF THE MAIL EXIST
                    Session::addFlash('error', 'Incorrect value, please, verify the information send and register');

                    $this->redirectTo('security', 'showRegisterPanel');
                    exit;
                } else { // MAIL IS AVAILABLE

                    if ($password1 == $password2 && strlen($password1) >= 5) {

                        // USER ID IN SESSION
                        $token = bin2hex(random_bytes(32));
                        // WELCOME MAIL
                        $this->sentEmailTo(
                            $email,
                            "Welcome to InsightForce",
                            '<h1> Have Fun ! <h1>
                        <p> One last step to complete your registration, </p> 
                        <p> Click on the link below : </p>
                        <small><a href="http://localhost/Elan-Forum/index.php?ctrl=security&action=validateRegistration&id=' . $token . '&' . '">' . $token . '</a></small>'
                        );

                        // FUNCTION ADD -> ADD THE DATA AND RETURN lastInsertId() WE STORE IN ID_NEWUSER
                        $newUser->add([
                            'username' => $username,
                            'email' => $email,
                            'password' => password_hash($password1, PASSWORD_DEFAULT),
                            'token' => $token
                        ]);

                        // REDIRECT HOME

                        Session::addFlash('success', 'A mail as been sent to your mailbox, please check it and follow the instructions');
                        $this->redirectTo('security', 'showRegisterPanel');
                        exit;
                    } else { // PASSWORD IS INCORRECT

                        Session::addFlash('error', 'Incorrect value, the two passwords must be iddentical and longer than 5 caracters');

                        $this->redirectTo('security', 'showRegisterPanel');
                        exit;
                    }
                }
            } else { // THE FILTER RETURN NON-VALUE

                Session::addFlash('error', 'Incorrect value, please, verify the information send and register');

                $this->redirectTo('security', 'showRegisterPanel');
                exit;
            }

            Session::addFlash('error', 'Incorrect value, please, verify the information send and register');

            $this->redirectTo('security', 'showRegisterPanel');
            exit;
        }

        $this->redirectTo('security', 'showRegisterPanel');
        exit;
    }
    /**
     * VALIDATE REGISTRATION
     */
    public function validateRegistration()
    {

        $token = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($token) {

            $userManager = new UserManager;
            $user = $userManager->findOneByToken($token);

            if ($user) {

                Session::addFlash('success', 'Welcome to InsightForce, ' . $user->getUsername());
                Session::setUser($user); // DEMANDER SI C'EST UNE BONNE IDEE DE STOCKER L USER DANS SESSION

                $this->redirectTo('home');
                exit;
            }
            // MESSAGE TEST A DELETE APRES
            Session::addFlash('error', 'Incorrect value, please, verify the information send and register');
            $this->redirectTo('security', 'showRegisterPanel');
            exit;
        }

        $this->redirectTo('security', 'showRegisterPanel');
        exit;
    }

    /**
     * LOGIN
     */

    public function login()
    {
        if ($_POST['submit']) {
            $connectUser = new UserManager;
            // FILTER DATA
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($email && $password) { // VERIFY FILTERED DATA

                $user = $connectUser->findUserMail($email);

                if ($user) { // IF USER EXIST
                    $hash = $user->getPassword();
                    if (password_verify($password, $hash)) { //
                        Session::setUser($user); // DEMANDER SI C'EST UNE BONNE IDEE DE METTRE LE HASH DANS SESSION
                        $this->redirectTo('home');
                        exit;
                    } else { // IF PASSWORD DONT MATCH
                        Session::addFlash('error', 'Incorrect value, please, verify the information send and login');
                        $this->redirectTo('security', 'showLoginPanel');
                        exit;
                    }
                } else { // IF USER DONT EXIST
                    Session::addFlash('error', 'Incorrect value, please, verify the information send and login');
                    $this->redirectTo('security', 'showLoginPanel');
                    exit;
                }
            } else {
                // ERROR FILTERED DATA IS FALSE
                Session::addFlash('error', 'Incorrect value, please, verify the information send and login');
                $this->redirectTo('security', 'showLoginPanel');
                exit;
            }
        }
        // ERROR NOT SUBMITED REDIRECT
        $this->redirectTo('security', 'showLoginPanel');
        exit;
    }

    /**
     * LOGOUT
     */
    public function logout()
    {
        // DEMANDER SI ON PEUT CHANGER LES ELEMENTS DE LA SESSION COMME AVEC INSPECT HTML
        Session::setUser(false);
        // REDIRECT TO LOGIN PAGE
        $this->redirectTo('security', 'showLoginPanel');
    }

    /**
     * DELETE USER
     */
    public function deleteUser($id, $token)
    {
        $user = Session::getUser();

        if ($user) {

            $userToken = $user->getToken();

            if ($userToken === $token) {
                
                $userManager = new UserManager;
                // DELETE USER AND REMOVE TOKEN IN SESSION
                $userManager->delete($id);
                Session::setUser(false);
                // MESSAGE AND REDIRECTION
                Session::addFlash('success', 'Your account has been sucessfully deleted');
                $this->redirectTo('security', 'showLoginPanel');
                exit;
            }
            // ERROR FILTERED DATA IS FALSE
            Session::addFlash('error', 'Incorrect value, please, verify the information send and login');
            $this->redirectTo('security', 'showLoginPanel');
            exit;
        }
        // ERROR FILTERED DATA IS FALSE
        Session::addFlash('error', 'Incorrect value, please, verify the information send and login');
        $this->redirectTo('security', 'showLoginPanel');
        exit;
    }
}

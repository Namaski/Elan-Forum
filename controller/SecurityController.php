<?php

namespace Controller;

use App\Session;
use App\Manager;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

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

                        // FUNCTION ADD -> ADD THE DATA AND RETURN lastInsertId() WE STORE IN ID_NEWUSER
                        $id_newUser = $newUser->add([
                            'username' => $username,
                            'email' => $email,
                            'password' => password_hash($password1, PASSWORD_DEFAULT)
                        ]);

                        // SUCESS MESSAGE
                        Session::addFlash('success', 'Welcome to InsightForce, ' . $username);

                        $user = $newUser->findOneById($id_newUser);
                        
                        // USER ID IN SESSION
                        Session::setUser($newUser); // DEMANDER SI C'EST UNE BONNE IDEE DE STOCKER L USER DANS SESSION

                        // WELCOME MAIL
                        $this->sentEmailTo($email, "Welcome to InsightForce", "Have Fun !");

                        // REDIRECT HOME
                        $this->redirectTo('home');
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


    public function logout()
    {
        // DEMANDER SI ON PEUT CHANGER LES ELEMENTS DE LA SESSION COMME AVEC INSPECT HTML
        Session::setUser(false);
        // REDIRECT TO LOGIN PAGE
        $this->redirectTo('security', 'showLoginPanel');
    }
}

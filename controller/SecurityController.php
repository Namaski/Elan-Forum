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

            var_dump($_POST['email']);
         
            if ($username && $email && $password1 && $password2) { // CHECK IF THE FILTER DONT RETURN NON-NULL VALUE

                
                if ($newUser->findUserMail($email)) { // CHECK IF THE MAIL EXIST
                    Session::addFlash('error', 'Incorrect value, please, verify the information send and register');

                    $this->redirectTo('security', 'showRegisterPanel');
                    exit;

                } else { // MAIL IS AVAILABLE

                    if ($password1 == $password2 && strlen($password1) >= 5) {

                        $id_newUser = $newUser->add([
                            'username' => $username,
                            'email' => $email,
                            'password' => password_hash($password1, PASSWORD_DEFAULT)
                        ]);

                        // SUCESS MESSAGE
                        Session::addFlash('success', 'Welcome to InsightForce, ' . $username);

                        Session::setUser($id_newUser);

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
                    var_dump($connectUser->findUserMail($email)); die; // REPRENDRE ICI
                }

            }  else {
                // ERROR
                $this->redirectTo('security', 'showLoginPanel');
                exit;
            }
        }
        // ERROR
        $this->redirectTo('security', 'showLoginPanel');
        exit;
    }


    public function logout()
    {
        require "view\security\login.php";
    }
}

<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use App\Session;
use Model\Managers\PostManager;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface {

    public function index(){
        $postManager = new PostManager();
        $lastPosts = $postManager->findAllLastPostByCategory(['creationDate', 'DESC']);

        if (Session::getUser()) { // A FAIRE
            # REDIRECT HOME PAGE
        } else {
            # REDIRECT LOGIN/REGISTER
        }
        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Your feed",
            "data" => [ 
                "lastPosts" => $lastPosts,

            ]
        ];
        
    }
        
    public function users(){
        $this->restrictTo("ROLE_USER");

        $manager = new UserManager();
        $users = $manager->findAll(['register_date', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }

    public function findAllLastPostByCategory(){
        $this->restrictTo("ROLE_USER");


    }


}

<?php
namespace App;

class Session{

    private static $categories = ['error', 'success'];

    /**
    *   ajoute un message en session, dans la catégorie $categ
    */
    public static function addFlash($categ, $msg){
        $_SESSION[$categ] = $msg;
        return $_SESSION[$categ];
    }

    /**
    *   renvoie un message de la catégorie $categ, s'il y en a !
    */
    public static function getFlash($categ){
        
        if(isset($_SESSION[$categ])){
            $msg = $_SESSION[$categ];  
            unset($_SESSION[$categ]);
        }
        else $msg = "";
        
        return $msg;
    }

    /**
    *   met un user dans la session (pour le maintenir connecté)
    */
    public static function setUser($user){
        $_SESSION["user"] = $user;
    }

    public static function getUser(){
        return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
    }

    public static function isAdmin(){
        // attention de bien définir la méthode "hasRole" dans l'entité User en fonction de la façon dont sont gérés les rôles en base de données
        if(self::getUser() && self::getUser()->hasRole("ROLE_ADMIN")){
            return true;
        }
        return false;
    }

    public static function setNewToken(){
        $token = bin2hex(random_bytes(32));
        $_SESSION['newToken'] = $token;

    }

    public static function getNewToken(){

        return (isset($_SESSION['newToken'])) ? $_SESSION['newToken'] : false;
    }
}


// fonction csrf 

// chaine de caractère aleatoire hachhées

// je mets en session la valeur du token_get_all

// lors de la soumision d'un form je compare la valeur du form avec celle ne session 
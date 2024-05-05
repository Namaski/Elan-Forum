<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class User extends Entity{

    private $id;
    private $username;
    private $email;
    private $password;
    private $token;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nickName
     */ 
    public function getUsername(){
        return $this->username;
    }

    /**
     * Set the value of nickName
     *
     * @return  self
     */ 
    public function setUsername($username){
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of nickName
     */ 
    public function getEmail(){
        return $this->email;
    }

    /**
     * Set the value of nickName
     *
     * @return  self
     */ 
    public function setEmail($email){
        $this->email = $email;

        return $this;
    }
    /**
     * Get the value of Password
     */ 
    public function getPassword(){
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */ 
    public function setPassword($password){
        $this->password = $password;

        return $this;
    }
    /**
     * Get the value of Token
     */ 
    public function getToken(){
        return $this->token;
    }

    /**
     * Set the value of Token
     *
     * @return  self
     */ 
    public function setToken($token){
        $this->token = $token;

        return $this;
    }

    public function __toString() {
        return $this->username;
    }
}
<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager
{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct()
    {
        parent::connect();
    }

    public function findUserMail($email)
    {
        $sql = "SELECT u.*
        FROM " . $this->tableName . " u
        WHERE u.email = :email
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }

    public function findOneByToken($token)
    {
        $sql = "SELECT u.*
        FROM " . $this->tableName . " u
        WHERE u.token = :token
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['token' => $token], false),
            $this->className
        );

    }
}

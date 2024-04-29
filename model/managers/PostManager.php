<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager
{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct()
    {
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findPostsByTopic($id)
    {

        $sql = "SELECT * 
                FROM " . $this->tableName . " p 
                WHERE p.topic_id = :id";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    public function findAllLastPostByCategory()
    {

        $sql = "SELECT
        p.id_post,
        p.content,
        p.creationDate,
        p.user_id,
        p.topic_id
        FROM
        post p
        JOIN (  SELECT
                topic_id,
                MIN(creationDate) AS min_creationDate
                FROM post
                GROUP BY topic_id ) AS min_dates 
        ON p.topic_id = min_dates.topic_id 
        AND p.creationDate = min_dates.min_creationDate";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
}

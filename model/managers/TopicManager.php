<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Managers\PostManager;

class TopicManager extends Manager
{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct()
    {
        parent::connect();
    }


    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id)
    {

        $sql = "SELECT * 
                FROM " . $this->tableName . " t 
                WHERE t.category_id = :id";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function addTopicWithPost()
    {

        if(isset($_POST['Send']) ) {
            $topic['category'] = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
            $topic['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_NUMBER_INT);
            $post['content'] = filter_input(INPUT_POST, "content", FILTER_SANITIZE_NUMBER_INT);
            
            // ADD TOPIC
            $this->add($topic);
            
            //GET LAST ID
            $pdo = new DAO;
            
            $post['topic-id'] = $newID;
            
            // ADD POST
            $newPost = new PostManager;
            $newPost-> add($post);
            
        }

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->add(
            DAO::insert($sql, ['id' => $id]),
            $this->className
        );
    }
}

<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface
{

    /**
     * INDEX
     */
    public function index()
    {

        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["name", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }
    ///////////////////////////////SHOW PANEL/////////////////////////////////////////
   
    /**
     * LIST TOPICS BY CATEGORY
     */
    public function listTopicsByCategory($id)
    {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : " . $category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    /**
     * LIST POST BY TOPIC
     */
    public function listPostsByTopic($id)
    {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopic($id);

        return [
            "view" => VIEW_DIR . "forum/listPostsByTopic.php",
            "meta_description" => "Topics : " . $topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }

    /**
     * SHOW PANEL INSERT TOPIC
     */
    public function showPanelInsertTopic()
    {

        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->findAll();


        return [
            "view" => VIEW_DIR . "forum/showPanelInsertTopic.php",
            "meta_description" => "Add a topic",
            "data" => [
                "categorys" => $categorys
            ]
        ];
    }
    /**
     * SHOW PANEL INSERT POST
     */
    public function showPanelInsertPost($id)
    {

        $topicManager = new CategoryManager();
        $topic = $topicManager->findOneById($id);


        return [
            "view" => VIEW_DIR . "forum/data/showPanelInsertPost.php",
            "meta_description" => "Add a post",
            "data" => [
                "topic" => $topic
            ]
        ];
    }
    ///////////////////////////////MAKE AN ACTION////////////////////////////////////////
    /*****************ADD***********/
    /**
     * INSERT TOPIC WITH POST
     */
    public function insertTopicWithPost()
    {
        // INSTANCE
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $topic = [];
        $post = [];

        if (isset($_POST['category']) && isset($_POST['title']) && isset($_POST['content'])) {

            // FILTER DATA
            $topic['category_id'] = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
            $topic['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post['content'] = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            var_dump($topic);
            var_dump($post);

            // ADD TOPIC
            $topic_id = $topic = $topicManager->add($topic);

            $post['topic_id'] = $topic_id; // tester si c'est utile
            // ADD POST
            $postManager->add($post);


            Session::addFlash('success', 'Your post has been sent');
        } else {
            Session::addFlash('error', 'Post not sent');
        }

        $this->redirectTo('forum','listPostsByTopic',$post['topic_id']); // A TESTER
    }

    /**
     * INSERT POST
     */
    public function insertPost($id)
    {
        // INSTANCE
        $postManager = new PostManager();
        $msg = new Session();
        $post = [];

        if (isset($_POST['content']) && $_POST['content'] != '') {

            // FILTER DATA
            $post['content'] = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post['topic_id'] = $id;
            // ADD POST
            $postManager->add($post);


            $msg->addFlash('success', 'Your post has been sent');
        } else {
            $msg->addFlash('error', 'Post not sent');
        }

        var_dump($id);
        var_dump($post);
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopic($id);

        return [
            "view" => VIEW_DIR . "forum/listPostsByTopic.php",
            "meta_description" => "Topics : " . $topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }
    /**
     * INSERT CATEGORY
     */
    public function insertCategory()
    {
        // INSTANCE
        $categoryManager = new CategoryManager();
        $msg = new Session();
        $category = [];

        if (isset($_POST['name']) && $_POST['name'] != '') {

            // FILTER DATA
            $category['name'] = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // ADD POST
            $categoryManager->add($category);


            $msg->addFlash('success', 'Your post has been sent');
        } else {
            $msg->addFlash('error', 'Post not sent');
        }

        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["name", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    /********************DELETE*****************/
    /**
     * DELETE POST
     */
    public function deletePost($id){
        
        $id_post = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

        $postManager = new PostManager;
        
        $postManager->delete($id_post);
        
        $this->redirectTo('forum','listTopics');
    }
    /**
     * DELETE TOPIC
     */
    public function deleteTopic($id){
        
        $id_post = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

        $postManager = new PostManager;
        
        $postManager->delete($id_post);
        
        $this->redirectTo('forum','listTopics');
    }





}

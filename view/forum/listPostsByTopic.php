<?php


// $category = $result["data"]['category'];
$topic = $result["data"]['topic'];
$posts = $result["data"]['posts'];
$category = $topic->getCategory();
$postUsers = [];

?>

<?php
// echo  "<br> Result :<br>"; 
// echo var_dump($result) . "<br>";
// echo "<br> Catégory :<br>"; 
// echo var_dump($category) . "<br>";
// echo "<br> Topics : <br>";
// echo var_dump($topic); 
// echo "<br> post : <br>";
// echo var_dump($posts);
?>

<!------------------ TOPIC SECTION ---------------------->
<article class="topicSection">
    <h2>Catégorie : <?= $category  ?></h2>
    <h1><?= $topic ?></h1>

    <!------------------ POSTS ELEMENTS ---------------------->
    <div class="postsFrame">

        <?php
        $i = 0;
        foreach ($posts as $post) { ?>

            <div class="userPlace">
                <?php
                $postUsers[] = $post;
                echo $postUsers[$i]->getUser();
                $i++;
                ?>
            </div>

            <div class="content">
                <?= $post->getContent(); ?>
            </div>


        <?php } ?>

    </div>

</article>
<?php
$category = $result["data"]['category'];
$topics = $result["data"]['topics'];
?>

<h1>Liste des topics</h1>


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
<?php if (isset($topics)) {
foreach ($topics as $topic) { ?>
    <p>
        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>&token=<?=$_SESSION['newToken'] ?>">
            <?= $topic ?>
        </a>
        par <?= $topic->getUser() ?>
    </p>
<?php }
} else { ?>
    <h3>There is no post yet</h3>
<?php }; ?>



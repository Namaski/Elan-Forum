<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>

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

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
<?php }


  

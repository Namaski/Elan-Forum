<?php
    $categories = $result["data"]['categories']; 
?>

<h2>Category List</h2>

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
    <p><strong><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></strong></p>
<?php } ?>


<form action="index.php?ctrl=forum&action=insertCategory" method="post">
    <input type="hidden" name="token" value="<?=$_SESSION['user']->getToken();?>">
    <label for="categoryName"> Add a category :</label>
    <input type="text" name="name" id="categoryName">
    
    <input type="submit" value="Send">
</form>


  

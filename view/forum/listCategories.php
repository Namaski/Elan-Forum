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



<?php if (isset($categories)) { ?>
    <?php
foreach ($categories as $category) { ?>
    <p><strong>
            <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>&token=<?= $_SESSION['newToken'] ?>">
                <?= $category->getName() ?></a>
        </strong></p>
<?php }
} else { ?>
    <h3>There is no categories yet</h3>
<?php }; ?>

<form action="index.php?ctrl=forum&action=insertCategory" method="post">
    <input type="hidden" name="token" value="<?= $_SESSION['newToken'] ?>">
    <label for="categoryName"> Add a category :</label>
    <input type="text" name="name" id="categoryName">

    <input type="submit" value="Send">
</form>
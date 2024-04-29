<?php
$lastPosts = $result["data"]['lastPosts'];

?>

<h3>Your feed</h3>




<?php foreach ($lastPosts as $post) { ?>
    
    <?php 
    // GET USER FROM POST
    $lastUser = $post -> getUser();
    // GET TOPIC FROM POST
    $lastTopic = $post -> getTopic();
    // GET CATEGORY FROM TOPIC
    $lastCategory = $lastTopic -> getCategory();
    
    echo $lastCategory;
    
    ?>

<div>

    <div class="userInfo">

        <h4>
            <?=$lastUser; ?> 
        </h4>

        <figure><i class="fa-regular fa-circle-user"></i> </figure>

    </div>

    <h1>
        <?=$lastTopic;?>
    </h1>

</div>

    <p>
        <?= $post->getContent(); ?>
    </p>
    

<?php }; ?>








<!-- <p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a>
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
</p> -->
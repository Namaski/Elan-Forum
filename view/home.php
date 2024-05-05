<?php
$lastPosts = $result["data"]['lastPosts'];
?>

<div class="contentHeader">

    <h3>Your feed</h3>

    <button>TOPIC</button>

    <button>USERS</button>

    <a href="index.php?ctrl=forum&&action=showPanelInsertTopic">
        <i class="fa-solid fa-circle-plus newPost"></i>
    </a>


</div>

<section class="feed-wrapper">

    <?php foreach ($lastPosts as $post) { ?>

        <?php
        // GET USER FROM POST
        $lastUser = $post->getUser();
        // GET TOPIC FROM POST
        $lastTopic = $post->getTopic();
        // GET CATEGORY FROM TOPIC
        $lastCategory = $lastTopic->getCategory();
        ?>

        <article class="lastTopic">

        <h3><?= $lastCategory; ?></h3>

            <div class="userTopic">

                <div class="userInfo">

                    <h4>
                        <?= $lastUser; ?>
                    </h4>

                    <figure><i class="fa-regular fa-circle-user"></i> </figure>

                </div>

                <h1>
                    <?= $lastTopic; ?>
                </h1>

            </div>

            <p>
                <?= $post->getContent(); ?>
            </p>

        </article>

    <?php }; ?>


</section>






<!-- <p>
    <a href="index.php?ctrl=security&action=login">Se connecter</a>
    <a href="index.php?ctrl=security&action=register">S'inscrire</a>
</p> -->
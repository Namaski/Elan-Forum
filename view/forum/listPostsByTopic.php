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
// echo "<br> firstPost : <br>";
// echo var_dump($firstPost);
?>

<article class="topicSection">
    <h2 class="categoryTitle"><?= $category  ?></h2>


    <?php
    $i = 0;
    foreach ($posts as $post) { ?>

        <?php if ($i == 0) { ?>
            <!------------------ FIRST POST ---------------------->

            <section class="firstPost">

                <div>

                    <div class="userInfo">

                        <h4><?php
                            $postUsers[] = $post;
                            echo $postUsers[$i]->getUser();
                            ?> </h4>

                        <figure><i class="fa-regular fa-circle-user"></i> </figure>

                    </div>

                    <h1><?= $topic ?></h1>

                </div>

                <p>
                    <?= $post->getContent(); ?>
                </p>


            </section>

        <?php } ?>


        <?php if ($i != 0) { ?>


            <!------------------ COMMENTS ---------------------->
            <section class="comment">

                <div class="userInfo">

                    <h4><?php
                        $postUsers[] = $post;
                        echo $postUsers[$i]->getUser();
                        $i++;
                        ?></h4>

                    <figure><i class="fa-regular fa-circle-user"></i> </figure>

                </div>

                <div class="content">
                    <?= $post->getContent(); ?>
                </div>

            </section>

        <?php } ?>
        <?php $i++; ?>


    <?php } ?>

</article>
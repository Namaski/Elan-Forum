<?php
$topic = $result["data"]["topic"]

?>

<article>

    <form action="index.php?ctrl=forum&action=insertPost&id=<?= $topic->getId() ?>" method="post">

        <section>

            <div>
                <input type="hidden" name="token" value="<?= $_SESSION['user']->getToken(); ?>">
                <label for="content"> Content </label>
                <textarea name="content" id="content" class="post" cols="30" rows="10"></textarea>
            </div>

            <!-- <div>
                <label for="file"> insert an image </label>
                <input type="file" name="" id="file">
            </div> -->

            <input type="submit" value="Send">


        </section>

    </form>


    <?php
    // $topic = $result['data']['topic'];
    // $post = $result['data']['topic'];
    // echo var_dump($topic);
    // echo "<br>";
    // echo var_dump($post);


    ?>

</article>
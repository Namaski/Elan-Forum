<?php
$topic = $result["data"]["topic"]

?>

<article>

    <form action="index.php?ctrl=forum&action=insertPost&id=<?= $topic->getId() ?>" method="post">

        <section>

            <div>
                <label for="content"> Content </label>
                <input type="text" name="content" value="" id="topic">
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
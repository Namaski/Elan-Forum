<?php
$categorys = $result["data"]["categorys"]
?>

<article>

    <form action="index.php?ctrl=forum&action=insertTopicWithPost" method="post">

        <section>

            <input type="hidden" name="token" value="<?= $_SESSION['newToken'] ?>">

            <div>

                <h2>What do you want to talk about ?</h2>

                <select name="category" class="form-select">

                    <option value="" disabled>Category </option>
                    <?php foreach ($categorys as $category) { ?>
                        <option value="<?= $category->getId(); ?>">
                            <?= $category ?>
                        </option>
                    <?php } ?>

                </select>

            </div>

            <div>
                <label for="title"> Title </label>
                <input type="text" name="title" value="" id="title">
            </div>

            <div>
                <label for="content"> Content </label>
                <input type="text" name="content" value="" id="topic">

            </div>

            <!-- <div>
                <label for="file"> insert an image </label>
                <input type="file" name="" id="file">
            </div> -->

            <input type="submit" name='submit' value="Send">


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
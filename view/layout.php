<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta_description ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <script defer src="https://kit.fontawesome.com/d80deb4694.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/styleLogin.css">

    <title>FORUM</title>
</head>

<body>

    <div class="container">
        <!----------------------------HEADER----------------------------->
        <header>

            <i class="fa-solid fa-bars hamburgerIcon"></i>

            <form action="" method="get">

                <input type="text" id="searchbar">
                <button type="submit">
                    <img src="./public/img/svg/magnifying-glass-solid.svg" alt="">
                </button>

            </form>

            <a href="">
                <i class="fa-solid fa-circle-user"></i>
            </a>

        </header>

        <!----------------------------SECONDARY-NAV----------------------------->
        <nav class="active">

            <i class="fa-solid fa-bars hamburgerIcon-active"></i>

            <div>

                <a href="index.php?ctrl=home">
                    <i class="fa-solid fa-house-chimney"></i>
                </a>
                <a href="index.php?ctrl=forum&action=index">
                    <i class="fa-solid fa-tags"></i>
                </a>
                <a href="index.php?ctrl=home&action=users">
                    <i class="fa-solid fa-users"></i>
                </a>
                <a href="index.php?ctrl=message">
                    <i class="fa-solid fa-message"></i>
                </a>

            </div>

        </nav>
        <!----------------------------MAIN CONTENT----------------------------->

        <main>

            <?= $page ?>

        </main>

        <!----------------------------ASIDE CONTENT----------------------------->

        <aside>
            <section>
                <div>
                    <h3>Hot topics</h3>
                    <ol>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                    </ol>
                </div>
            </section>
            <section>
                <div>
                    <h3>Latest topics</h3>
                    <ol>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                        <li>TOPIC</li>
                    </ol>
                </div>
            </section>
        </aside>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $(".message").each(function() {
                if ($(this).text().length > 0) {
                    $(this).slideDown(500, function() {
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function() {
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })
    </script>

    <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>

</body>

</html>
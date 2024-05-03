<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsightForge</title>
    <script defer src="https://kit.fontawesome.com/d80deb4694.js" crossorigin="anonymous"></script>
    <script defer src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script defer src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public\css\style.css">
    <link rel="stylesheet" href="public\css\styleLogin.css">

</head>

<body>

    <div class="wrapper">

        <div class="background-illustration">
            <img src="public\img\blacksmith_about_us.jpg" alt="illustration image of a working blacksmith">
        </div>

        <!-- LOGIN BOX -->

        <div class="loginCard">
            <div class="loginCard-wrapper">
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>

                <!-- NAV LOGIN/REGISTER -->

                <ul class="loginCard-nav" role="tablist">
                    <li class="nav-item" role="presentation" id="tab-login" href="#pills-login">
                        <a class="nav-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation" id="tab-register" href="#pills-register">
                        <a class="nav-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>

                <!-- LOG IN CONTENT -->


                <form action="index.php?ctrl=security&action=login" method="post" class="loginCard-content fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

                    <div class="text-center">
                        <p>Sign in with:</p>

                        <div class="link-list">

                            <a href="link-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-google"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-twitter"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-github"></i>
                            </a>

                        </div>

                    </div>

                    <p class="text-center">or:</p>

                    <!-- EMAIL -->
                    <div class="input-form">
                        <input type="email" id="loginEmail" name="email" value="" placeholder="Email" />
                    </div>

                    <!-- PASSWORD -->
                    <div class="input-form">
                        <input type="password" id="loginPassword" name="password" value="" placeholder="Password" />
                    </div>

                    <!-- REMEMBER ME/ FORGOT PASSWORD -->
                    <div class="forgotPassword-container">
                        <!-- Checkbox -->
                        <div class="rememberMe">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>

                        <div class="forgotPassword">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button name="submit" type="submit" value="submit">
                        Sign in
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                    </div>
                </form>


                <!-- REGISTER CONTENT -->

                <form action="index.php?ctrl=security&action=register" method="post" class="loginCard-content fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                    <div class="text-center">
                        <p>Sign in with:</p>

                        <div class="link-list">

                            <a href="link-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-google"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-twitter"></i>
                            </a>


                            <a href="link-icon">
                                <i class="fab fa-github"></i>
                            </a>

                        </div>

                    </div>

                    <p class="text-center">or:</p>


                    <!-- Username input -->
                    <div class="input-form">
                        <!-- <label class="form-label" for="registerUsername">Username</label> -->
                        <input name="username" type="text" id="registerUsername" placeholder="Username" required />
                    </div>

                    <!-- Email input -->
                    <div class="input-form">
                        <input name="email" type="email" id="registerEmail" placeholder="Email" required />
                        <!-- <label class="form-label" for="registerEmail">Email</label> -->
                    </div>

                    <!-- Password input -->
                    <div class="input-form">
                        <label class="password-label" for="registerPassword">
                            <input name="password1" type="password" id="registerPassword" class="password-input" placeholder="Password" required />
                            <div class="password-icon">
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="input-form">
                        <label class="password-label" for="registerRepeatPassword">
                            <input name="password2" type="password" id="registerRepeatPassword" class="password-input" placeholder="Repeat password" required />
                            <div class="password-icon">
                                <i class="fa-regular fa-eye"></i>
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="chebox" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" required />
                        <label class="form-check-label" for="registerCheck">I have read and agree to the terms</label>
                    </div>

                    <!-- Submit button -->
                    <button name="submit" type="submit" value="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
                </form>


            </div>
        </div>

        <article class="about-us">
            <div>
                <p>Join a community of visionaries, innovators, and creative thinkers on InsightForge</p>
                <p>Forge connections, share ideas, and explore new perspectives in a dynamic environment where
                    inspiration is continually forged. </p>
                <p>
                    Whether you're a passionate entrepreneur, a visionary artist, or a curious researcher, our community
                    welcomes you to delve into the depths of thought and creativity. </p>
                <p>Join us on InsightForge and together, let's shape the future of insight!</p>
            </div>

        </article>
    </div>

</body>

</html>
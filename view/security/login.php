
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsightForge</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <script defer src="https://kit.fontawesome.com/d80deb4694.js" crossorigin="anonymous"></script>
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
                <!-- Pills navs -->
                <ul class="loginCard-nav" role="tablist">

                    <li class="nav" role="presentation">
                        <a class="nav-link active" href="#pills-login">Login</a>
                    </li>

                    <li class="nav" role="presentation">
                        <a class="nav-link" href="#pills-register">Register</a>
                    </li>

                </ul>

                <!-- Pills content -->



                <form action="" method="post" class="loginCard-content">

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

                    <!-- USERNAME -->
                    <div class="input-form">
                        <input type="text" id="loginName" class="form-control" name="username" value="Username" />
                    </div>

                    <!-- PASSWORD -->
                    <div class="input-form">
                        <input type="password" id="loginPassword" class="form-control" name="password"
                            value="Password" />
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
                    <button type="submit">
                        Sign in
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                    </div>
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

<?php die ?>

<div class="background-illustration">
        <img src="public\img\blacksmith_about_us.jpg" alt="illustration image of a working blacksmith">
    </div>

    <div class="wrapper">

        <!-- LOGIN BOX -->
        <div class="login-card">
            <!-- Pills navs -->
            <ul class="tablist" role="tablist">

                <li class="nav" role="presentation">
                    <a class="nav-link active" href="#pills-login">Login</a>
                </li>

                <li class="nav" role="presentation">
                    <a class="nav-link" href="#pills-register">Register</a>
                </li>

            </ul>

            <!-- Pills content -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>

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

                        <!-- Email input -->
                        <div class="">
                            <input type="email" id="loginName" class="form-control" name="username" value="username"/>
                        </div>

                        <!-- Password input -->
                        <div class="">
                            <input type="password" id="loginPassword" class="form-control" name="password" value="password" />
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                    <label class="form-check-label" for="loginCheck"> Remember me </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" >
                            Sign in
                        </button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                        </div>
                    </form>
                </div>

                <!-- <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form>
                    <div class="text-center mb-3">
                        <p>Sign up with:</p>
<link-icona ref="">

    <i class="fab fa-facebook-f"></i>
</button>
</a>                          
cl<a href=link-icon""

                      <i class="fab fa-google"></i>
                    </button>
                </a>ass="btn">
                    
              link-icon  <a href="">

                        <i class="fab fa-twitter"></i>
                    </button>
                </a>btn">
                    <a hrlink-iconef"">

                            btn">
                            <i class="fab fa-github"></i>
                        </a>
                        </button>
                    </div>            <p class="text-center">or:</p>
                    
                    Name input -->
                <!-- <div class="">
                        <input type="text" id="registerName" class="form-control" />
                        <label class="form-label" for="registerName">Name</label>
                    </div> -->

                <!-- Username input -->
                <!-- <div class="">
                        <input type="text" id="registerUsername" class="form-control" />
                        <label class="form-label" for="registerUsername">Username</label>
                    </div> -->

                <!-- Email input -->
                <!-- <div class="">
                        <input type="email" id="registerEmail" class="form-control" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div> -->

                <!-- Password input -->
                <!-- <div class="">
                        <input type="password" id="registerPassword" class="form-control" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div> -->

                <!-- Repeat Password input -->
                <!-- <div class="">
                        <input type="password" id="registerRepeatPassword" class="form-control" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div> -->

                <!-- Checkbox -->
                <!-- <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                        aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div> -->

                <!-- Submit button -->
                <!-- <button type="submit"  class="btn btn-primary btn-block mb-3">Sign in</button>
                </form>
            </div> -->

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

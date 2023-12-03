<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is login then redirect to authenticated page
    */
          // Store user information in the session
          
      

    if (isset($_SESSION['user_id']) && $_SESSION['email']){
        header('location: ./User/webpages/courses.php');
        exit();
    }

    //if the login button is clicked
    require_once('./User/classes/account.class.php');
    
    if (isset($_POST['login'])) {
        $account = new Account();
        $account->email = htmlentities($_POST['email']);
        $account->password = htmlentities($_POST['password']);
        if ($account->sign_in_users()){

          $user_id =  $account->user_id; 
          $email =$account->email; 
            $_SESSION['user'] = 'users';
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            header('location: courses.php');
        }else{
            $error =  'Invalid email/password. Try again.';
        }
    }
    
    //if the above code is false then html below will be displayed
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Welcome to Cognicore</title>
      <!-- This is how we add bootstrap, fontawesome and jquery locally. -->
      <link href="./User/vendor/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">
      <link href="./User/vendor/dataTable-1.13.6/datatables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./User/vendor/font-awesome-4.7.0/css/font-awesome.min.css"/>
      <!-- Your custome css goes here -->
      <link rel="stylesheet" href="./User/css/style.css">
      <link rel="stylesheet" href="./User/css/stylesheet.css">
  </head>
  <?php
    $title = 'Cognicore';
    $home = 'active';

    require_once './User/tools/functions.php';
  ?>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow  sticky-top" id="navi1">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" id="logo-style"><img src="./User/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./User/webpages/index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./User/webpages/courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./User/webpages/setting-account.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./User/webpages/user-dashboard.php">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <main class="background-img">
          <section id="page-banner">
            <div class="container-fluid">
              <div class="row flex-row-reverse flex-col align-items-center center-vertically">
                <div class="col-sm-12 col-md-6 col-lg-6 text-center" id="banner-img">
                  <img src="./User/images/banner-3.png" class="img-fluid" alt="Banner Image">
              </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 text-center" id="heading-banner">
                      <h1>Welcome to Your Computer Science Learning Hub!</h1>
                      <p>Course Outline Guide for Computer Science Students.</p>
                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal"id="login-btn">Login</button>
                      <button type="button" class="btn" id="signup-btn"><a href="./User/webpages/signup.php">Sign up</a></button>
                  </div>
              </div>
          </div>

          <!-- Login Modal -->
          <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signupModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your sign-up form here -->
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                            </div>
                            <!-- Add more form fields as needed -->
                            <button type="submit" name="login" class="btn btn-primary mt-3 px-5 py-2">Login</button>
                            <?php
                            if (isset($_POST['login']) && isset($error)){
                            ?>
                                <p class="text-danger mt-3 text-center"><?= $error ?></p>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                                <h6 class="py-4 mb-5">Don't have an Account? <a href="./User/webpages/signup.php">Signup</a></h6>
                            </div>
                </div>
            </div>
        </div>
        
          </section>
  
          <section id="feature-1">
            <div class="container-fluid">
              <div class="row flex-row-reverse flex-col align-items-center center-vertically-2">
                  <h2 class="text-center pb-4">What You'll Find Here</h2>
                  <div class="col-sm-12 col-md-6 text-center">
                    <div class="row text-md-end" id="feature-list">
                      <h3>Diverse Topics</h3>
                      <p>Dive into the core concepts of computer science, from algorithms and data structures to programming languages and cybersecurity</p>
                      <h3><br>Structured Learning</h3>
                      <p>Our platform offers organized modules and lessons, ensuring you grasp each topic thoroughly.</p>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 text-center" id="banner-img">
                    <img src="./User/images/ftr-1.png" class="img-fluid" alt="Banner Image">
                  </div>
              </div>
          </div>
          </section>

          <section id="feature-2">
            <div class="container-fluid" id="space-top">
              <div class="row flex-col align-items-center center-vertically-2">
                  <div class="col-sm-12 col-md-6 text-center">
                    <div class="row text-md-start" id="feature-list-2">
                      <h3>Expert Resources</h3>
                      <p>Access a curated selection of learning materials, including articles, videos, coding examples, and research papers.</p>
                      <h3><br>Interactive Challenges</h3>
                      <p>Challenges:Engage with quizzes, coding exercises, and realworld projects to apply what you've learned. Huyyy</p>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 text-center" id="banner-img">
                    <img src="./User/images/ftr-2.png" class="img-fluid" alt="Banner Image">
                  </div>
              </div>
          </div>
          </section>
          
          <section id="feature-3">
            <div class="container-fluid">
              <div class="row flex-col align-items-center center-vertically-2" id="call-to-action">
                  <div class="col text-center">
                      <h3>Ready to get started? Click the link below to begin your journey into the fascinating realm of computing.</h3>
                      <button class="btn" type="button" id="signup-btn"><a href="./User/webpages/signup.php">Start Learning<a></button>
                    </div>
                  </div>
              </div>
          </section>
        </main>


        <footer>
        <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12 col-md-4 flex-col align-items-center center-logo">
            <a class="navbar-brand text-center" href="#" id="logo-footer"><img src="./User/images/logo.png"></a>
            </div>
            <div class="col-sm-6 col-md-4 text-center">
            <h3>Navigation</h3>
            <ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Subjects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Account</a>
                </li>
            </ul>
            </div>
            <div class="col-sm-6 col-md-4 text-center">
            <h3>Contact Us</h3>
            <ul>
                <li class="nav-item">
                    <a class="nav-link active">Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gmail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Number</a>
                </li>
            </ul>
            </div>
        </div>
        <p class="text-center">All Rights Reserved 2023</p>
        </div>
</footer>
        <script src="./User/vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is login then redirect to authenticated page
    */
          // Store user information in the session
          
      

    if (isset($_SESSION['user_id']) && $_SESSION['email']){
        header('location: ./courses.php');
        exit();
    }

    //if the login button is clicked
    require_once('../classes/account.class.php');
    
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
  <?php
    $title = 'Cognicore';
    $home = 'active';
    require_once('../include/head.php');
    require_once '../tools/functions.php';
  ?>
    <body>
      <?php
        require_once('../include/header.user.php');
      ?>

        <main class="background-img">
          <section id="page-banner">
            <div class="container-fluid">
              <div class="row flex-row-reverse flex-col align-items-center center-vertically">
                <div class="col-sm-12 col-md-6 col-lg-6 text-center" id="banner-img">
                  <img src="../images/banner-3.png" class="img-fluid" alt="Banner Image">
              </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 text-center" id="heading-banner">
                      <h1>Welcome to Your Computer Science Learning Hub!</h1>
                      <p>Course Outline Guide for Computer Science Students.</p>
                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal"id="login-btn">Login</button>
                      <button type="button" class="btn" id="signup-btn"><a href="signup.php">Sign up</a></button>
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
                                <h6 class="py-4 mb-5">Don't have an account? <a href="signup.php">Signup</a></h6>
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
                    <img src="../images/ftr-1.png" class="img-fluid" alt="Banner Image">
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
                    <img src="../images/ftr-2.png" class="img-fluid" alt="Banner Image">
                  </div>
              </div>
          </div>
          </section>
          
          <section id="feature-3">
            <div class="container-fluid">
              <div class="row flex-col align-items-center center-vertically-2" id="call-to-action">
                  <div class="col text-center">
                      <h3>Ready to get started? Click the link below to begin your journey into the fascinating realm of computing.</h3>
                      <button class="btn" type="button" id="signup-btn"><a href="signup.php">Start Learning<a></button>
                    </div>
                  </div>
              </div>
          </section>
        </main>


      <?php
        require_once('../include/footer.php');
      ?>
        
        
        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
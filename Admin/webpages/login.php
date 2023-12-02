<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link href="../vendor/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <title>Home</title>
    </head>
    <body>
        <main class="background-img">
          <section id="page-banner">
            <div class="container-fluid">
              <div class="row flex-row-reverse flex-col align-items-center center-vertically">
                <div class="col-sm-12 col-md-6 text-center py-5" id="banner-img">
                  <img src="../images/logo.png" class="img-fluid" alt="Banner Image">
              </div>
                  <div class="col-sm-12 col-md-6 text-center" id="heading-banner">
                      <h1>CS Learning Hub<br><span>Cognicore Admin</span></h1>
                      <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
                      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal"id="login-btn">Login</button>
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
                        <form class="user" action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="login_btn" class="btn btn-primary "> Login </button>
                        <hr>
                    </div>
                            <!-- Add more form fields as needed -->
                        </form>

                      </div>
                    
                </div>
            </div>
        </div>
          </section>
        </main>



        <footer>
          <div class="container-fluid">
            <div class="row ">
              <div class="col-sm-12 col-md-4 flex-col align-items-center center-logo">
                <a class="navbar-brand text-center" href="#" id="logo-footer"><img src="../images/logo.png"></a>
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
        
        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
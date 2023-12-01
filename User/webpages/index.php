<!DOCTYPE html>
<html lang="en">
  <?php
    $title = 'Courses';
    $home = 'active';
    require_once('../include/head.php');
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
                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <!-- Add more form fields as needed -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"><a href="courses.html">Login</a></button>
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
                      <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#signupModal1" id="signup-btn">Start Learning</button>
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
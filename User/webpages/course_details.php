<?php
  session_start();
  /*
      if user is not login then redirect to login page,
      this is to prevent users from accessing pages that requires
      authentication such as the dashboard
  */
  if (!isset($_SESSION['user']) || $_SESSION['user'] != 'users'){
      header('location: ./index.php');
  }


  require_once '../classes/course.class.php';
  require_once  '../tools/functions.php';

  if(isset($_GET['id'])){
    $course =  new Course();
    $record = $course->fetch($_GET['id']);
    
    $id = $record['course_id'];
    $subject_code = $record['subject_code'];
    $prerequisite = $record['prerequisite'];
    $course_name = $record['course_name'];
    $year_level_and_semester = $record['year_level_and_semester'];
    $subject_description = $record['subject_description']; 
}

?>

<!DOCTYPE html>
<html lang="en">
  <?php
    $title = 'Courses';
    $courses = 'active';
    require_once('../include/head.php');
  ?>
    <body>
      <?php
        require_once('../include/header.user.php');

      ?>

        <main>
          <section id="courselist">
            <div class="container-fluid pb-5">
              <div class="row">
                <div class="col-12 col-md-7">
                <?php if ($record) { ?>
                  <h2 class="pt-4" id="subjcode"><?php echo $record['subject_code'] ?></h2>
                  <h3 class="prereq">Prerequisite: <?php echo $record['prerequisite'] ?></h2>
                  <h1 class="pt-2" id="courname"><span></span><?php echo $record['course_name'] ?></h1>
                  <h3 class="yearsem"><?php echo $record['year_level_and_semester'] ?></h3>
                  <h4><?php echo $record['subject_description'] ?></h4>
                </div>

                <?php } ?>
                      <div class="col-md-5">
                      <h1 class="pt-4 d-flex">Available Tutors</h1>
                      <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal" data-bs-target="#signupModal">
                          Apply as Tutor
                      </button>
                          <div class="card scrollable-container">
                              <div class="card-body">
                                  
                              <?php 

                              require_once '../classes/tutor.class.php';
                                
                                $course_tutor = new Tutor();

                                // Fetch staff data (you should modify this to retrieve data from your database)
                                $tutorArray = $course_tutor->show3($id);
                                $countertutor = 1;

                                    if ($tutorArray) {
                                      foreach ($tutorArray as $tutoritem) { ?>
                              <div class="tutor_card col-12 col-md-12 mt-4">
                                  <div class="infos">
                                  <?php if ($tutoritem['profile_pic']): ?>
                                    <?php
                                        $imageData = base64_encode($tutoritem['profile_pic']);
                                        $imageSrc = "data:image/jpeg;base64," . $imageData;
                                    ?>
                                      <div class="image"><img src="<?php echo $imageSrc; ?>"></div>
                                      <?php endif; ?>
                                      <div class="info">
                                          <div>
                                              <p class="name">
                                                <?php echo $tutoritem['tutor_name']; ?>
                                              </p>
                                              <p class="function">
                                                <?php echo $tutoritem['description']; ?>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                                  <button class="request" type="button">
                                    <?php echo $tutoritem['contact_detail']; ?>
                                      </button>
                              </div>
                              </div>

                              <?php
                                                $countertutor++;
                                            }
                                        }
                                    ?>

                              <!-- Signup Modal -->
                              <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                                  <div class="modal-dialog d-flex align-items-center justify-content-center">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="signupModalLabel">Apply as Tutor</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <!-- Signup form goes here -->
                                              <form>
                                                  <div class="mb-3">
                                                      <label for="description" class="form-label">Description</label>
                                                      <input type="text" class="form-control" id="description" name="description" required>
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="contact_detail" class="form-label">Contact Detail</label>
                                                      <input type="text" class="form-control" id="contact_detail" name="contact_detail" required>
                                                  </div>
                                                  <!-- Add more form fields as needed -->
                                                  <button type="submit" class="btn btn-primary">Apply as Tutor</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              </div>
                          </div>
                      </div>

                


                <div class="row" id="course-outline">
                  <h2 class=" pb-3">What You Need to Learn:</h2>

                  <div class="row py-4">
                  <?php 

                  require_once '../classes/topic_links.class.php';
                    
                    $topic_link = new Link();

                    // Fetch staff data (you should modify this to retrieve data from your database)
                    $courseArray = $topic_link->show2($id);
                    $counter = 1;

                        if ($courseArray) {
                          foreach ($courseArray as $item) { ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <h4>Topic #<?php echo $item['topic_number']; ?></h4>

                                  <p class="heading"><?= $item['topic_name']; ?>
                                  </p><p class="para">
                                  <?= $item['topic_description']; ?>
                                  </p>
                                  <button class="btn"><a href="<?php echo $item['topic_link']; ?>" onclick="openCleanLink(event)">Read more</a></button>
                                  <button class="btn"><a href="#">Take Quiz</a></button>
                                </div>
                              </div>
                        </div>
                        <?php
                                    $counter++;
                                }
                            }
                        ?>
                        
                    </div>
                  
                  
                </div>
            </div>
            

            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <p>This is the modal content.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          </section>
        </main>


      <?php
        require_once('../include/footer.php');
      ?>

      <script>
      function openCleanLink(event) {
          event.preventDefault(); // Prevent the default behavior of the link click

          // Get the raw link from the href attribute
          const rawLink = event.target.href;

          // Decode the URL to get the actual link
          const decodedLink = decodeURIComponent(rawLink);

          // Open the link in a new tab
          const newTab = window.open(decodedLink, '_blank');

          // Focus on the new tab's window to ensure it's in focus
          if (newTab) {
              newTab.focus();
          }
      }
      </script>
        

        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
        <script>
          // JavaScript to show the modal when the checkbox is clicked
          $(document).ready(function() {
              $('#showModalQuiz').change(function() {
                  if (this.checked) {
                      $('#myModal').modal('show');
                  } else {
                      $('#myModal').modal('hide');
                  }
              });
          });
      </script>
    </body>
</html>
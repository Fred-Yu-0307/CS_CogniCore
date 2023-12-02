<?php
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
              <?php if ($record) { ?>
              <h2 class=""><?php echo $record['subject_code'] ?></h2>
              <h3>Prerequisite: <?php echo $record['prerequisite'] ?></h2>
              <h1 class="pt-4"><span></span><?php echo $record['course_name'] ?></h1>
              <h3><?php echo $record['year_level_and_semester'] ?></h3>
              <h4><?php echo $record['subject_description'] ?></h4>
                <div class="row" id="course-outline">
                  <h2 class="pt-5 pb-3">What You Need to Learn: <span>(Click Topic to Redirect on References)</span></h2>

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
                                  <button class="btn"><a href="<?php echo urlencode($item['topic_link']); ?>" target="_blank" onclick="openCleanLink(event)">Read more</a></button>
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
            <?php } ?>

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
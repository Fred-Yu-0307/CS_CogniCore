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
            <section id="current-semester">
                <div class="container-fluid">
                    <h1 class="pt-5">Computer Science Courses <span></span></h1>
                    <p> Add Courses to Monitor </p>
                    <?php
                        require_once '../classes/course.class.php';
                        require_once '../tools/functions.php';

                        $course = new Course();

                        // Fetch staff data (you should modify this to retrieve data from your database)
                        $courseArray = $course->show();
                        $counter = 1;
                            
                    ?>
                    <div class="row py-4">
                        <?php
                          if ($courseArray) {
                            foreach ($courseArray as $item) {
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <h4><?= $item['subject_code'] ?></h4>
                                  <p>Prerequisite: <?= $item['prerequisite'] ?></p>
                                  <p class="heading"><?= $item['course_name'] ?>
                                  </p><p class="para">
                                  <?= $item['subject_description'] ?>
                                  </p>
                                  <button class="btn"><a href="course_details.php?id=<?php echo $item['course_id']; ?>">Read more</a></button>
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
            </section>
        </main>



      <?php
        require_once('../include/footer.php');
      ?>
        

        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
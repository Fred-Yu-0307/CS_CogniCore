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
                    <h1 class="pt-5">Computer Science 2A Courses <span>(First Semester)</span></h1>
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

            <section id="other-semester">
                <div class="container-fluid">
                    <h1 class="pt-5">Other Year Level's Courses</span></h1>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="year_level" data-bs-toggle="dropdown" aria-expanded="false">
                            Year Levels
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="year_level">
                            <li><a class="dropdown-item" href="#">1st Year First Semester</a></li>
                            <li><a class="dropdown-item" href="#">1st Year Second Semester</a></li>
                            <li><a class="dropdown-item" href="#">2nd Year First Semester</a></li>
                            <li><a class="dropdown-item" href="#">2nd Year Second Semester</a></li>
                            <li><a class="dropdown-item" href="#">3rd Year First Semester</a></li>
                            <li><a class="dropdown-item" href="#">3rd Year Second Semester</a></li>
                            <li><a class="dropdown-item" href="#">4th Year First Semester</a></li>
                            <li><a class="dropdown-item" href="#">4th Year Second Semester</a></li>
                        </ul>
                    </div>
                    <div class="row py-4">
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Information Management
                                  </p><p class="para">
                                    Information Management is the art and science of handling data and information strategically within organizations. In a data-driven world, this subject explores how to collect, store, analyze, and protect information effectively, ensuring it becomes a valuable asset rather than a burden.
                                  </p>
                                  <button class="btn">Read more</button>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Architecture and Organization
                                  </p><p class="para">
                                    Architecture and Organization is a fundamental subject in computer science and engineering, focusing on the design and structure of computer systems. It delves into the hardware components, organization, and functioning of computers, providing a crucial understanding of how digital systems work from the ground up.
                                  </p>
                                  <button class="btn">Read more</button>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Design and Analysis of Algorithms
                                  </p><p class="para">
                                    Design and Analysis of Algorithms is a core subject in computer science that focuses on the development and evaluation of efficient algorithms for solving complex problems. It provides the essential tools and techniques for designing algorithms, analyzing their performance, and understanding their theoretical foundations.
                                  </p>
                                  <button class="btn">Read more</button>
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
        

        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
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
                    <div class="row py-4">
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Data Structures and Algorithms
                                  </p><p class="para">
                                    Data Structures and Algorithms are the backbone of computer science and software development. This subject equips you with the knowledge and skills to design, analyze, and implement efficient data structures and algorithms, critical for solving complex computational problems.
                                  </p>
                                  <button class="btn"><a href="data-structures.html">Read more</a></button>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Object-Oriented Programming (OOP)
                                  </p><p class="para">
                                    Object-Oriented Programming (OOP) is the cornerstone of modern software development. This subject delves into the principles and practices of OOP, teaching you how to design, build, and maintain software using objects, classes, inheritance, and encapsulation.
                                  </p>
                                  <button class="btn">Read more</button>
                                </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                            <div class="card1">
                                <div class="content">
                                  <p class="heading">Discrete Structures 2
                                  </p><p class="para">
                                    Discrete Structures 2 is the continuation of your exploration into the mathematical foundations of computer science. This advanced course delves into topics such as formal logic, proof techniques, automata theory, and formal language theory, equipping you with a deeper understanding of theoretical computer science.
                                  </p>
                                  <button class="btn">Read more</button>
                                </div>
                              </div>
                        </div>
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
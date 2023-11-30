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
              <h1 class="pt-4"><span></span>Data Structures and Algorithms</h1>
              <h4>Data Structures and Algorithms are the backbone of computer science and software development. This
                subject equips you with the knowledge and skills to design, analyze, and implement efficient data
                structures and algorithms, critical for solving complex computational problems.</h4>
                <div class="row" id="course-outline">
                  <h2 class="pt-5 pb-3">What You Need to Learn: <span>(Click Topic to Redirect on References)</span></h2>
                  <div class="col-sm-12 col-md-6">
                    <h3><a href="https://python-textbok.readthedocs.io/en/1.0/Sorting_and_Searching_Algorithms.html" target="_blank"><label class="container3"> <input checked="checked" type="checkbox" id="showModalQuiz"> <div class="checkmark"></div> </label><span>TOPIC 1:</span><br> Analysis of Algorithms & Searching and Sorting</a></h3>
                    <h3><a href="https://everythingcomputerscience.com/discrete_mathematics/Stacks_and_Queues.html" target="_blank"><label class="container3"> <input checked="checked" type="checkbox"> <div class="checkmark"></div> </label><span>TOPIC 2:</span><br> Stacks & Queues</a></h3>
                    <h3><a href="https://www.oreilly.com/library/view/data-structures-and/9781118771334/11_chap07.html" target="_blank"><label class="container3"> <input checked="checked" type="checkbox"> <div class="checkmark"></div> </label><span>TOPIC 3:</span><br> Lists & Iterators</a></h3>
                  </div>
                  
                  <div class="col-sm-12 col-md-6">
                    <h3><a href="https://www.tutorialspoint.com/data_structures_algorithms/tree_data_structure.htm" target="_blank"><label class="container3"> <input checked="checked" type="checkbox"> <div class="checkmark"></div> </label><span>TOPIC 4:</span><br> Trees & Binary Search Trees</a></h3>
                    <h3><a href="https://www.hackerearth.com/practice/notes/heaps-and-priority-queues/" ><label class="container3"> <input checked="checked" type="checkbox"> <div class="checkmark"></div> </label><span>TOPIC 5:</span><br> Heaps and Priority Queues, Graphs & Hashing</a></h3>
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
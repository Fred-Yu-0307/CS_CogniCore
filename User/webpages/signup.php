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

    <main>
        <h1>Create Your Account</h1>
                          <form>
                              <div class="row">
                                <div class="col-12 col-md-6">
                                <div class="col-12 col-sm-9">
                                    <div class="mb-3">
                                        <label for="last-name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                </div>
                              <div class="row">
                                <div class="col-12 col-sm-5">
                                  <div class="mb-3">
                                    <label for="dropdownField" class="form-label">Year</label>
                                  <select class="form-select" id="dropdownField" name="dropdownField">
                                      <option value="option1">BS Computer Science 1</option>
                                      <option value="option2">BS Computer Science 2</option>
                                      <option value="option3">BS Computer Science 3</option>
                                      <option value="option4">BS Computer Science 4</option>
                                  </select>
                                </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="mb-3">
                                    <label for="dropdownField" class="form-label">Section</label>
                                  <select class="form-select" id="dropdownField" name="dropdownField">
                                      <option value="option1">A</option>
                                      <option value="option2">B</option>
                                      <option value="option3">C</option>
                                  </select>
                                </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                </div>
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="conpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="conpassword" name="conpassword">
                                </div>
                                </div>
                              </div>
                              <!-- Add more form fields as needed -->
                          </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary"><a href="courses.html">Sign Up</a></button>
                      </div>
    </main>






    <?php
        require_once('../include/footer.php');
    ?>

</body>
</html>
<?php
  require_once '../classes/user.class.php';
  require_once '../tools/functions.php';
  
  if(isset($_POST['save'])){

    $user = new User();
    //sanitize
    $user->last_name = htmlentities($_POST['last_name']);
    $user->first_name = htmlentities($_POST['first_name']);
    $user->email = htmlentities($_POST['email']);
    $user->year_level = htmlentities($_POST['year_level']);
    $user->section = htmlentities($_POST['section']);
    $user->password = htmlentities($_POST['password']);

    //validate
    if (validate_field($user->last_name) &&
    validate_field($user->first_name) &&
    validate_field($user->email) &&
    validate_field($user->year_level) &&
    validate_field($user->section) &&
    validate_field($user->password) &&
    validate_password($user->password) &&
    validate_email($user->email) && !$user->is_email_exist()){
        if($user->add()){
            header('location: courses.php');
        }else{
            echo 'An error occured while adding in the database.';
        }
    }
}

?>

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
      <div class="col-12 col-md-6 ">
        <h1 class="py-4 text-center">Create Your Account</h1>
                          <form method="post" action="">
                              <div class="row px-3">
                                <div class="col-12 ">
                                  <di class="row justify-content-center">
                                  <div class="col-12 col-sm-9">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; }else if(isset($user->last_name)) { echo $user->last_name; } ?>">
                                        <?php
                                            if(isset($_POST['last_name']) && !validate_field($_POST['last_name'])){
                                        ?>
                                                <p class="text-danger my-1">Last Name is required</p>
                                        <?php
                                            }
                                        ?>
                                      </div>
                                </div>
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required value="<?php if(isset($_POST['first_name'])) { echo $_POST['first_name']; }else if(isset($user->first_name)) { echo $user->first_name; } ?>">
                                    <?php
                                        if(isset($_POST['first_name']) && !validate_field($_POST['first_name'])){
                                    ?>
                                            <p class="text-danger my-1">First Name is required</p>
                                    <?php
                                        }
                                    ?>
                                  </div>
                                </div>
                                
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; }else if(isset($user->email)) { echo $user->email; } ?>">
                                    <?php
                                        $new_user = new User();
                                        if(isset($_POST['email'])){
                                            $new_user->email = htmlentities($_POST['email']);
                                        }else{
                                            $new_user->email = '';
                                        }

                                        if(isset($_POST['email']) && strcmp(validate_email($_POST['email']), 'success') != 0){
                                    ?>
                                            <p class="text-danger my-1"><?php echo validate_email($_POST['email']) ?></p>
                                    <?php
                                        }else if ($new_user->is_email_exist() && $_POST['email']){
                                    ?>
                                            <p class="text-danger my-1">Email already exist</p>
                                    <?php      
                                        }
                                    ?>
                                  </div>
                                </div>
                                
                              <div class="row justify-content-center">
                                <div class="col-12 col-sm-5">
                                  <div class="mb-3">
                                    <label for="year_level" class="form-label">Year</label>
                                  <select class="form-select" id="year_level" name="year_level">
                                      <option value="">Select Year Level</option>
                                      <option value="BS Computer Science 1" <?php if(isset($_POST['year_level']) && $_POST['year_level'] == 'BS Computer Science 1') { echo 'selected'; } ?>>BS Computer Science 1</option>
                                      <option value="BS Computer Science 2" <?php if(isset($_POST['year_level']) && $_POST['year_level'] == 'BS Computer Science 2') { echo 'selected'; } ?>>BS Computer Science 2</option>
                                      <option value="BS Computer Science 3" <?php if(isset($_POST['year_level']) && $_POST['year_level'] == 'BS Computer Science 3') { echo 'selected'; } ?>>BS Computer Science 3</option>
                                      <option value="BS Computer Science 4" <?php if(isset($_POST['year_level']) && $_POST['year_level'] == 'BS Computer Science 4') { echo 'selected'; } ?>>BS Computer Science 4</option>
                                  </select>
                                  <?php
                                      if(isset($_POST['year_level']) && !validate_field($_POST['year_level'])){
                                  ?>
                                          <p class="text-danger my-1">Select Year Level</p>
                                  <?php
                                      }
                                  ?>
                                </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                  <select class="form-select" id="section" name="section">
                                      <option value="">Select Section</option>
                                      <option value="A" <?php if(isset($_POST['section']) && $_POST['section'] == 'A') { echo 'selected'; } ?>>A</option>
                                      <option value="B" <?php if(isset($_POST['section']) && $_POST['section'] == 'B') { echo 'selected'; } ?>>B</option>
                                      <option value="C" <?php if(isset($_POST['section']) && $_POST['section'] == 'C') { echo 'selected'; } ?>>C</option>
                                      
                                  </select>
                                  <?php
                                      if(isset($_POST['section']) && !validate_field($_POST['section'])){
                                  ?>
                                          <p class="text-danger my-1">Select Section</p>
                                  <?php
                                      }
                                  ?>
                                </div>
                                </div>
                              </div>

                              <div class="row justify-content-center">
                                <div class="col-12 col-sm-9">
                                  <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                                    <?php
                                        if(isset($_POST['password']) && strcmp(validate_password($_POST['password']), 'success') != 0){
                                    ?>
                                            
                                    <?php
                                        }
                                    ?>
                                  </div>
                                </div>
                              </div>
                              <!-- Add more form fields as needed -->
                          </form>
                      <div class="modal-footer px-4">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="save" class="btn btn-primary" id="signupButton">Sign Up</button>
                      </div>
      </div>
      <div class="col-12 col-md-6">

      </div>
    </main>






    <?php
        require_once('../include/footer.php');
    ?>

<script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
    
    require_once '../classes/user.class.php';
    require_once  '../tools/functions.php';

    //resume session here to fetch session values
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
      // Redirect to the login page or another page as needed
      header("Location: index.php");
      exit();
}
    
    //if the above code is false then html below will be displayed

    // Fetch information for the logged-in user
    $user_id = $_SESSION['user_id'];
    $user = new User();
    $record = $staff->fetch($user_id);

    // Assuming that the fetch method returns user information
    if ($record) {
        $staff->id = $record['id'];
        $staff->firstname = $record['firstname'];
        $staff->lastname = $record['lastname'];
        $staff->role = $record['role'];
        $staff->email = $record['email'];
        $old_email = $staff->email;
        $staff->status = $record['status'];
    } else {
        // Handle the case where user information couldn't be retrieved
        // You might want to redirect to an error page or handle it in another way
        header("Location: error.php");
        exit();
    }

    if(isset($_POST['save'])){
        $staff = new Staff();
        //sanitize
        $staff->id = $_GET['id'];
        $staff->firstname = htmlentities($_POST['firstname']);
        $staff->lastname = htmlentities($_POST['lastname']);
        $staff->role = htmlentities($_POST['role']);
        $staff->email = htmlentities($_POST['email']);
        if(isset($_POST['status'])){
            $staff->status = htmlentities($_POST['status']);
        }else{
            $staff->status = '';
        }

        //validate
        if (validate_field($staff->firstname) &&
        validate_field($staff->lastname) &&
        validate_field($staff->role) &&
        validate_field($staff->email) &&
        validate_field($staff->status) &&
        validate_email($staff->email)){
            if($old_email != $staff->email){
                if(!$staff->is_email_exist()){
                    if($staff->edit()){
                        header('location: staff.php');
                    }else{
                        echo 'An error occured while adding in the database.';
                    } 
                }
            }else{
                if($staff->edit()){
                    header('location: staff.php');
                }else{
                    echo 'An error occured while adding in the database.';
                } 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <?php
    $title = 'Courses';
    $settings = 'active';
    require_once('../include/head.php');
  ?>
    <body>
      <?php
        require_once('../include/header.user.php');
      ?>

        <main id="courselist">
          <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <!-- Settings navigation tabs -->
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" id="accounts-tab" data-bs-toggle="pill" href="#accounts">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notifications-tab" data-bs-toggle="pill" href="#notifications">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="privacy-tab" data-bs-toggle="pill" href="#privacy">Privacy and Security</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="help-tab" data-bs-toggle="pill" href="#help">Help and Support</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 pt-3">
                    <!-- Settings content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="accounts">
                            <h3>Accounts Settings</h3>
                            <!-- Include account settings content here -->
                            <div class="row">
                              <div class="col-sm-12 col-md-4 text-center pb-4">
                                <img src="../images/avatar.png" class="pb-4">
                                <button type="button" class="btn" id="login-btn">Upload Picture</button>
                                <button type="button" class="btn" id="signup-btn">Delete Picture</button>
                              </div>
                              <div class="col-sm-12 col-md-8">
                                <div class="row">
                                  <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">First Name</label>
                                      <input type="text" class="form-control" id="textInput" placeholder="Alexandra">
                                    </div>
                                  </div>
                                  <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">Last Name</label>
                                      <input type="text" class="form-control" id="textInput" placeholder="Alejo">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">Year</label>
                                      <input type="text" class="form-control" id="textInput" placeholder="BS Computer Science 2A">
                                    </div>
                                  </div>
                                  <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">Section</label>
                                      <input type="text" class="form-control" id="textInput" placeholder="A">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">Email</label>
                                      <input type="email" class="form-control" id="textInput" placeholder="qb2021021020@wmsu.edu.ph">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="mb-3">
                                      <label for="textInput" class="form-label">Password</label>
                                      <input type="password" class="form-control" id="textInput" placeholder="****************">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row" id="sc-btn">
                              <button type="button" class="btn" id="login-btn">Save</button>
                                <button type="button" class="btn" id="signup-btn">Cancel</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notifications">
                            <h3>Notifications Settings</h3>
                            <!-- Include notifications settings content here -->
                            <div class="row">
                              <div class="col">
                                <div class="row pb-5">
                                  <div class="col-sm-9">
                                    <h4><span>EMAIL NOTIFICATIONS</span>
                                      Get emails to find out what’s going on when you’re 
                                      not online. You can turn these off.</h4>
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="switch">
                                      <input type="checkbox">
                                      <span class="slider"></span>
                                    </label>
                                  </div>
                                </div>
                                <div class="row pb-5">
                                  <div class="col-sm-9">
                                    <h4><span>PUSH NOTIFICATIONS</span>
                                      Enable or disable push notifications on your mobile device for
                                      real-time alerts about course activities and announcements.</h4>
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="switch">
                                      <input type="checkbox">
                                      <span class="slider"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="privacy">
                            <h3>Privacy and Security Settings</h3>
                            <!-- Include privacy and security settings content here -->
                            <div class="row">
                              <div class="col">
                                <div class="row pb-5">
                                  <div class="col-sm-9">
                                    <h4><span>Two-Factor Authentication</span>
                                      KEEP YOUR ACCOUNT SECURE BY ENABLING 2FA VIA SMS OR 
                                      USING A TEMPORARY ONE-TIME PASSCODE (TOTP).</h4>
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="switch">
                                      <input type="checkbox">
                                      <span class="slider"></span>
                                    </label>
                                  </div>
                                </div>
                                <div class="row pb-5">
                                  <div class="col-sm-9">
                                    <h4><span>Login History: [View History]</span>
                                      View a record of your recent login sessions, including dates, 
                                      times, and the devices used to access your account.</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <h4 class="text-center">LOGIN HISTORY</h4>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Time</th>
                                      <th scope="col">Device</th>
                                      <th scope="col">Location</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">2023-10-05 01:24</th>
                                      <td>Iphone 7 Plus</td>
                                      <td>Zamboanga City</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2023-10-04 08:43</th>
                                      <td>Dell Desktop</td>
                                      <td>Tetuan, Zamboanga City</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2023-10-01 18:32</th>
                                      <td>Iphone 7 Plus</td>
                                      <td>Putik, Zamboanga City</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="help">
                            <h3>Help and Support</h3>
                            <!-- Include help and support content here -->
                            <h1>COMING SOON</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>



      <?php
        require_once('../include/footer.php');
      ?>
        
        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
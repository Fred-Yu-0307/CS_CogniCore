
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="../vendor/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <title>Home</title>
    </head>
    <body>
    
        <nav class="logo-header2 text-center">
            <img src="../images/logo.png" class="img-fluid" alt="Banner Image">
        </nav>

        <main id="page-banner">
          <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-3" id="nav-options">
                    <!-- Settings navigation tabs -->
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="pill" href="#dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manage-courses-tab" data-bs-toggle="pill" href="#manage-courses">Manage Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="user-management-tab" data-bs-toggle="pill" href="#user-management">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-bs-toggle="pill" href="#settings">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log out</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 pt-3">
                    <!-- Settings content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <!-- Include account settings content here -->
                            <div class="row">
                              <div class="col-sm-12 col-md-4 text-center pb-4" id="admin-card">
                                <img src="../images/fred.jpg" class="pb-4">
                                <h4 class="d-block">Fred Anthony Yu</h4>
                                <h5 class="d-block">Admin</h5>
                                
                              </div>
                              <div class="col-sm-12 col-md-4 text-center pb-4" id="admin-card">
                                <img src="../images/charlyn.jpg" class="pb-4"style="width:65%">
                                <h4 class="d-block">Charlyn Elorde</h4>
                                <h5 class="d-block">Admin</h5>
                               
                              </div>
                              <div class="col-sm-12 col-md-8">
                                <div class="row">
                                  <h2 class="pb-3 py-4">Dashboard</h2>
                                </div>
                                <div class="row"  id="card-totalrow">
                                  <div class="col-sm-12 col-md-6"  id="card-total">
                                    <h4>Total Courses</h4>
                                    <p>
                                        <?php 
                                         include ("connection.php" );  
                                         $sql = "SELECT * from courses"; 
                                         if ($result = mysqli_query($conn, $sql)) { 
                                            $rowcount = mysqli_num_rows( $result ); 
                                            printf($rowcount); 
                                        } mysqli_close($conn); ?> 
                                    </p>
                                  </div>
                                  <div class="col-sm-12 col-md-6"  id="card-total">
                                    <h4>Total Topics</h4>
                                    <p>
                                    <?php 
                                         include ("connection.php" );  
                                         $sql = "SELECT * from course_topics"; 
                                         if ($result = mysqli_query($conn, $sql)) { 
                                            $rowcount = mysqli_num_rows( $result ); 
                                            printf($rowcount); 
                                        } mysqli_close($conn); ?> 
                                    </p>
                                  </div>
                                  <div class="col-sm-12 col-md-6"  id="card-total">
                                    <h4>Total Users</h4>
                                    <p>
                                    <?php 
                                         include ("connection.php" );  
                                         $sql = "SELECT * from users"; 
                                         if ($result = mysqli_query($conn, $sql)) { 
                                            $rowcount = mysqli_num_rows( $result ); 
                                            printf($rowcount); 
                                        } mysqli_close($conn); ?> 
                                    </p>
                                  </div>
                                </div>                             
                              </div>                         
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="manage-courses">
                            <!-- Include manage-courses settings content here -->
                            <div class="row">
                              <div class="col">
                                <div class="row pb-5">
                                  <div class="col-sm-12 col-md-6">
                                    <h4>Course Management</h4>
                                  </div>
                                  <div class="col-sm-12 col-md-6">
                                    <div class="input-wrapper">
                                        <button class="icon"> 
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
                                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
                                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20">S</path>
                                          </svg>
                                        </button>
                                        <input placeholder="search.." class="input" name="text" type="text" id=inputfield>
                                        
                                      </div>
                                  </div>
                                </div>
                                <div class="row pb-5"style="height:80vh; overflow:scroll;">
                                  <div class="col-sm-12 col-md-6 col-lg-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr> <th scope="col">Course ID</th>
                                            <th scope="col">Subject Code</th>
                                            <th scope="col">prerequisite</th>
                                            <th scope="col">Course Name</th>
                                            <th scope="col">Year Level and Semester</th>
                                            <th scope="col">Subject Description</th>
                                            <th scope="col">ACTIONS</th>
                                          </tr>
                                        </thead>
                                        <tbody id="course_data">
                                      </table>
                                  </div>
                                </div>
                                <div class="row" >
                                    <div class="col-sm-12 col-md-8 col-lg-6" id="button-list">
                                    <a href="#addCourseModal" class="btn btn-success" data-toggle="modal" id="login-btn"><i
                                    class="material-icons"></i><span>Add New Course</span></a>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="addCourseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_course">
                    <div class="form-group">
                        <label>Subject Code</label>
                        <input type="text" id="subject_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>prerequisite</label>
                        <input type="text" id="prerequisite" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="course_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Year Level and Semester</label>
                        <input type="text" id="year_level_and_semester" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Description</label>
                        <textarea class="form-control" id="subject_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addCourse()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editCourseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_course">
                    <div class="form-group">
                        <label>Subject Code</label>
                        <input type="text" id="subject_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>prerequisite</label>
                        <input type="text" id="prerequisite" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="course_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Year Level and Semester</label>
                        <input type="text" id="year_level_and_semester" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Subject Description</label>
                        <textarea class="form-control" id="subject_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editCourse()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewCourseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_course">
                    <div class="form-group">
                        <label>Subject Code</label>
                        <input type="text" id="subject_code" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>prerequisite</label>
                        <input type="text" id="prerequisite" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" id="course_name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Year Level and Semester</label>
                        <textarea class="form-control" id="year_level_and_semester" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Subject Description</label>
                        <textarea class="form-control" id="subject_description" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteCourseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteCourse()" value="Delete">
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
    <script>
        $(document).ready(function () {
            courseList();

        });

        function courseList() {
            $.ajax({
                type: "GET",
                url: "course-list.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var course_id = response[i].course_id;
                        var subject_code = response[i].subject_code;
                        var prerequisite = response[i].prerequisite;
                        var course_name = response[i].course_name;
                        var year_level_and_semester = response[i].year_level_and_semester;
                        var subject_description = response[i].subject_description;
                        tr += '<tr>';
                        tr += '<td>' + course_id + '</td>';
                        tr += '<td>' + subject_code + '</td>';
                        tr += '<td>' + prerequisite + '</td>';
                        tr += '<td>' + course_name + '</td>';
                        tr += '<td>' + year_level_and_semester + '</td>';
                        tr += '<td>' + subject_description + '</td>';
                        tr += '<td><div class="d-flex">';
                        tr +=
                            '<a href="#viewCourseModal" class="m-1 view" data-toggle="modal" onclick=viewCourse("' +
                            course_id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                        tr +=
                            '<a href="#editCourseModal" class="m-1 edit" data-toggle="modal" onclick=viewCourse("' +
                            course_id +
                            '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                        tr +=
                            '<a href="#deleteCourseModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                            course_id +
                            '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                        tr += '</div></td>';
                        tr += '</tr>';
                    }
                    $('#course_data').html(tr);
                }
            });
        }

        function addCourse() {
            var subject_code = $('.add_course #subject_code').val();
            var prerequisite = $('.add_course #prerequisite').val();
            var course_name = $('.add_course #course_name').val();
            var year_level_and_semester = $('.add_course #year_level_and_semester').val();
            var subject_description = $('.add_course #subject_description').val();

            $.ajax({
                type: 'post',
                data: {
                  subject_code: subject_code,
                  prerequisite: prerequisite,
                  course_name: course_name,
                  year_level_and_semester: year_level_and_semester,
                  subject_description: subject_description,
                },
                url: "course-add.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#addCourseModal').modal('hide');
                    courseList();
                    alert(response.message);
                }

            })
        }

        function editCourse() {
            var subject_code = $('.edit_course #subject_code').val();
            var prerequisite = $('.edit_course #prerequisite').val();
            var course_name = $('.edit_course #course_name').val();
            var year_level_and_semester = $('.edit_course #year_level_and_semester').val();
            var subject_description = $('.edit_course #subject_description').val();
            var id = $('.edit_course #id').val();

            $.ajax({
                type: 'post',
                data: {
                  subject_code: subject_code,
                  prerequisite: prerequisite,
                  course_name: course_name,
                  year_level_and_semester: year_level_and_semester,
                  subject_description: subject_description,
                  id: id,
                },
                url: "course-edit.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#editCourseModal').modal('hide');
                    courseList();
                    alert(response.message);
                }

            })
        }

        function viewCourse(course_id = 2) {
            $.ajax({
                type: "GET",
                data: {
                    course_id: course_id,
                },
                url: "course-view.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('.view_course #subject_code').val(response.subject_code);
                    $('.view_course #prerequisite').val(response.prerequisite);
                    $('.view_course #course_name').val(response.course_name);
                    $('.view_course #year_level_and_semester').val(response.year_level_and_semester);
                    $('.view_course #subject_description').val(response.subject_description);
                  
                }
            })
        }

        function deleteCourse() {
            var course_id = $('#delete_id').val();
            $('#deleteCourseModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                  course_id: course_id,
                },
                url: "course-delete.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    courseList();
                    alert(response.message);
                }
            })
        }
    </script>

<div class="tab-pane fade" id="user-management">
                            <!-- Include user-managemennt settings content here -->
                            <div class="row">
                              <div class="col">
                                <div class="row pb-5">
                                  <div class="col-sm-12 col-md-6">
                                    <h4>User Management</h4>
                                  </div>
                                  <div class="col-sm-12 col-md-6">
                                    <div class="input-wrapper">
                                        <button class="icon"> 
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
                                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
                                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20">S</path>
                                          </svg>
                                        </button>
                                        <input placeholder="search.." class="input" name="text" type="text" id=inputfield>
                                      </div>
                                  </div>
                                </div>
                                <div class="row pb-5">
                                  <div class="col-sm-12 col-md-6 col-lg-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr> <th scope="col">User ID</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Year Level</th>
                                            <th scope="col">Section</th>
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody id="user_data">
                                      </table>
                                  </div>
                                </div>
                                <div class="row" >
                                    <div class="col-sm-12 col-md-8 col-lg-6" id="button-list">
                                    <a href="#addUserModal" class="btn btn-success" data-toggle="modal" id="login-btn"><i
                                    class="material-icons">&#xE147;</i><span>Add New User</span></a>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="addUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_user">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" id="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" id="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Year Level</label>
                        <input type="text" id="year_level" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" id="section" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addUser()">
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteUser()" value="Delete">
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
    <script>
        $(document).ready(function () {
            userList();
        });

        function userList() {
            $.ajax({
                type: "GET",
                url: "user-list.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var user_id = response[i].user_id;
                        var last_name = response[i].last_name;
                        var first_name = response[i].first_name;
                        var email = response[i].email;
                        var year_level = response[i].year_level;
                        var section = response[i].section;

                        tr += '<tr>';
                        tr += '<td>' + user_id + '</td>';
                        tr += '<td>' + last_name + '</td>';
                        tr += '<td>' + first_name + '</td>';
                        tr += '<td>' + email + '</td>';
                        tr += '<td>' + year_level + '</td>';
                        tr += '<td>' + section + '</td>';
                        tr += '<td><div class="d-flex">';              
                        tr +=
                            '<a href="#deleteUserModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                            user_id +
                            '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                        tr += '</div></td>';
                        tr += '</tr>';
                    }
                    $('#user_data').html(tr);
                }
            });
        }

        function addUser() {
            var last_name = $('.add_user #last_name').val();
            var first_name = $('.add_user #first_name').val();
            var email = $('.add_user #email').val();
            var year_level = $('.add_user #year_level').val();
            var section = $('.add_user #section').val();
            var password = $('.add_user #password').val();

            $.ajax({
                type: 'post',
                data: {
                  last_name: last_name,
                  first_name: first_name,
                  email: email,
                  year_level: year_level,
                  section: section,
                  password: password,
                },
                url: "user-add.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#addUserModal').modal('hide');
                    userList();
                    alert(response.message);
                }

            })
        }

        function deleteUser() {
            var user_id = $('#delete_id').val();
            $('#deleteUserModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                  user_id: user_id,
                },
                url: "user-delete.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    userList();
                    alert(response.message);
                }
            })
        }
    </script>


<div class="tab-pane fade" id="settings">
                            <h3>Admin Settings</h3>
                            <!-- Include user-management and security settings content here -->
                            <div class="row" id="adminset">
                              <div class="col-sm-12 col-md-6" id="admin-setting">
                                <div class="row pb-3">
                                    <label for="name" class="form-label">Name: </label>
                                    <input type="text" class="form-control" id="name" placeholder="Chared Yu">
                                </div>
                                <div class="row pb-3">
                                    <label for="name" class="form-label">Public Title: </label>
                                    <input type="text" class="form-control" id="name" placeholder="*******">
                                </div>
                                <div class="row pb-3">
                                    <label for="status" class="form-label">Active:</label>
                                    <select class="form-select" id="status" placeholder="Active">
                                        <option value="option1">Active</option>
                                        <option value="option2">Offline</option>
                                    </select>
                                </div>
                                <div class="row pb-3">
                                    <label for="base-url" class="form-label">Base URL: </label>
                                    <input type="text" class="form-control" id="base-url" placeholder="cognicore.com">
                                </div>
                              </div>
                              <div class="col-sm-12 col-md-6"  id="admin-setting">
                                <div class="row pb-3">
                                    <label for="clp" class="form-label">Closed Landing Page:</label>
                                    <select class="form-select" id="status" placeholder="clp">
                                        <option value="option1">****</option>
                                        <option value="option2">****</option>
                                    </select>
                                </div>
                                <div class="row pb-3">
                                    <label for="elp" class="form-label">Error Landing Page:</label>
                                    <select class="form-select" id="elp" placeholder="elp">
                                        <option value="option1">****</option>
                                        <option value="option2">****</option>
                                    </select>
                                </div>
                                <div class="row pb-3">
                                    <label for="language" class="form-label">Language:</label>
                                    <select class="form-select" id="language" placeholder="language">
                                        <option value="option1">English</option>
                                        <option value="option2">Filipino</option>
                                    </select>
                                </div>
                                <div class="row pb-3">
                                    <label for="template" class="form-label">Template:</label>
                                    <select class="form-select" id="template" placeholder="template">
                                        <option value="option1">Template 1</option>
                                        <option value="option2">Template 2</option>
                                    </select>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="notes" class="form-label">Notes: </label>
                                <textarea class="form-control" id="notes" rows="3" placeholder="Enter Notes"></textarea>
                            </div>
                            <button class="btn" id="login-btn">Save</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings">
                            <h3>settings and Support</h3>
                            <!-- Include settings and support content here -->

                            <h1>COMING SOON</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>



        <footer>
          <div class="container-fluid">
            <div class="row ">
              <div class="col-sm-12 col-md-4 flex-col align-items-center center-logo">
                <a class="navbar-brand text-center" href="#" id="logo-footer"><img src="../images/logo.png"></a>
              </div>
              <div class="col-sm-6 col-md-4 text-center">
                <h3>Navigation</h3>
                <ul>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Subjects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Account</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-6 col-md-4 text-center">
                <h3>Contact Us</h3>
                <ul>
                  <li class="nav-item">
                    <a class="nav-link active">Facebook</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Instagram</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Gmail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact Number</a>
                  </li>
                </ul>
              </div>
            </div>
            <p class="text-center">All Rights Reserved 2023</p>
          </div>
        </footer>
        
        <script src="../vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    </body>
</html>
<?php include_once 'inc/head.php'; ?>
<?php

include '../admin/connection.php';
include 'auth.php';
$conn = OpenCon();

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $fname = $_POST['fname'];
  $dob = $_POST['dob'];
  $number = $_POST['number'];
  $password = $_POST['password'];
  $qualification = $_POST['qualification'];
  $aadhar = $_POST['aadhar'];
  $target_dir = "../admin/upload/students/";

  // Valid file extensions
  $extensions_arr = array("jpg", "jpeg", "png");

  //saving first image
  $img1 = $_FILES['file']['name'];
  // echo $_FILES['photo']['name'];
  $target_file1 = $target_dir . basename($_FILES["file"]["name"]);
  // Select file type
  $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));


  // Check extension
  if (in_array($imageFileType1, $extensions_arr)) {
    // Upload file
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img1)) {
      // Insert record
      $password = md5($password);
      $email = $_SESSION['email'];
      $query = "UPDATE students SET name='$name', fname='$fname', dob='$dob', aadhar='$aadhar', 
                qualification='$qualification', file='$img1', password='$password' 
                WHERE email='$email'";

      $result = $conn->query($query);
      if ($result) {
        $_SESSION['msg'] = "Successfully Updated your info!";
      } else {
        $_SESSION['error'] = "Your info did not get updated! try again";
      }
    }
  } else {
    $_SESSION['error'] = 'Image Saving Failed! try again';
  }
}
?>
<link rel="stylesheet" type="text/css" href="inc/css/style.css">

<body>

  <section>
    <!-- large-screen-sidebarstarts -->
    <div class="sidebar">
    <div class="logo">
            <a class="navbar-brand" href="index.php">
                <img src="../images/logo-2.jpeg" alt="">
            <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
            </div>
      <div class="pt-3">
        <div class="pt-3">
          <a href="index.php" class="list ">My Course</a>
          <a href="account.php" class="list active">Profile</a>
          <a href="#" class="list " onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">Germani Classes</a>
                </div>
        </div>
      </div>
    </div>

    <!-- large-screen-sidebar-ends -->





    <!-- small-screen-sidebar starts -->
    <div class="small-screen-sidebar">
      <div id="mySidenav" class="sidenav">
      <div class="logo-small bg-color-sidenav">
            <div class="d-flex bd-highlight">
                <div class=" bd-highlight">
                    <a href="index.php" class="small-sidenavbar">
                    <img src="../images/logo-2.jpeg">
                    <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
                </a>
                </div>
                <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
            </div>
            </div>
        <div class="pt-3" id="sidebar-here">
          <a href="index.php" class="list ">My Course</a>
          <a href="account.php" class="list active">Profile</a>
          <a href="#" class="list " onclick="openLan1()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">Germani Classes</a>
                </div>
        </div>
      </div>
    </div>
    <!-- large-screen-sidebar-starts -->


    <div class="content">

      <?php include_once 'inc/header.php'; ?>

      <div class="container py-5 personal-inforamtion">


        <div class="row justify-content-center">
          <div class="col-md-10">
            <h4 class="mb-4 text-success"><?php
                                          if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                          }
                                          ?>
            </h4>
            <h4 class="mb-4 text-danger"><?php
                                          if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                          }
                                          ?>
            </h4>
            <div class="card shadow">
              <nav class="navbar navbar-light border personal-detail">
                <a class="h4 text-danger font-weight-bold pt-2">Personal Information</a>
                <form class="form-inline">
                  <a class="btn btn-danger mb text-white" onclick="enable()">Update Personal Information</a>

                </form>
              </nav>
              <div class="card-body">
                <form action=" " method="post" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label>Applicant Name</label>
                      <input type="text" class="form-control" id="name" disabled="disabled" placeholder="Applicant's Name" name="name">
                    </div>
                    <div class="col-md mb-3">
                      <label>Father Name</label>
                      <input type="text" class="form-control" id="name1" disabled="disabled" placeholder="Father Name" name="fname">
                    </div>
                  </div>

                  <div class="form-row">

                    <div class="col-md mb-3">
                      <label>Contact Phone Number</label>
                      <input type="tel" class="form-control" disabled="disabled" placeholder="Telephone Number" maxlength="12" minlength="10" id="name11" name="number">
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label>Email</label>
                      <input type="email" class="form-control" id="name3" disabled="disabled" value="<?php if (isset($_SESSION['email'])) {
                                                                                                        echo $_SESSION['email'];
                                                                                                      } else {
                                                                                                        echo "Your Email";
                                                                                                      } ?>" readonly>
                    </div>
                    <div class="col-md mb-3">
                      <label>Paasword</label>
                      <input type="password" class="form-control" id="name4" disabled="disabled" placeholder="Password" name="password">
                    </div>
                    <div class="col-md mb-3">
                      <label>Date Of Birth</label>
                      <input type="date" class="form-control" id="dob" disabled="disabled" placeholder="Date Of Birth" name="dob">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label>Highest Qualification</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Address" id="qualification" name="qualification">
                    </div>
                    <div class="col-md mb-3">
                      <label>Adhar Card Number</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Adhar Number" id="name6" name="aadhar">
                    </div>
                  </div>
                  <div class="form-row">

                    <div class="col-md mb-3">
                      <label>Upload Image</label>
                      <input type="file" id="file_type" name="file" disabled>
                    </div>
                  </div>


                  <div class="form-row my-3">
                    <div class="col-md mb-2">
                      <button type="submit" class="btn btn-info text-white" id="name2" name="submit">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>




  <!-- 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pb-3">
          <div class="row pb-4">
            <div class="col-md-5 ">
              <div class="pswd-inst">
                <p class="font-weight-bold">Your new password must:</p>
                <ol>
                  <li>Be at least 4 characters in length</li>
                  <li> Not be same as your current password</li>
                  <li> Not contain common passwords.</li>
                </ol>
              </div>
            </div>

            <div class="col-md-7">
              <!-- <h5 class="font-weight-bold pb-3">Change Password<span class="resend"><a href="">Resend OTP</a></span></h5> -->
              <form>
                <div id="send">
                  <h6 class="font-weight-bold" onclick="resend()"><a href="#!" class="text-decoration-none">Send OTP</a></h6>
                </div>
                <div id="resend" style="display: none;">
                  <h6 class="font-weight-bold"><a href="#!" class="text-decoration-none">Resend OTP</a></h6>
                </div>
                <div class="form-group">
                  <!--   <label for="exampleInputPassword1">Enter Current Password</label> -->
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Current Password">
                </div>

                <div class="form-group">
                  <!-- <label for="exampleInputPassword1">Enter New Password</label> -->
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter New Password">
                  <small>Your Password must be of 4-characters</small>
                </div>

                <div class="form-group">
                  <!--  <label for="exampleInputPassword1">Confirm New Password</label> -->
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm New Password">
                </div>

                <div class="form-group">
                  <!--  <label for="exampleInputPassword1">Enter OTP</label> -->
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter OTP">
                </div>
                <button type="submit" class="btn btn-info btn-sm btn-block" name="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script> -->






  <script>
    function enable() {
      document.getElementById('file_type').disabled = false;
      document.getElementById("name").disabled = false;
      document.getElementById("name").placeholder = "Enter Name";
      document.getElementById("name1").disabled = false;
      document.getElementById("name1").placeholder = "Enter Father Name";
      document.getElementById("name2").disabled = false;
      document.getElementById("name2").placeholder = "Enter Course";
      document.getElementById("name3").disabled = false;
      document.getElementById("name4").disabled = false;
      document.getElementById("dob").placeholder = "Enter Password";
      document.getElementById("dob").disabled = false;
      document.getElementById("name4").placeholder = "Enter Date OF Birth";
      document.getElementById("qualification").disabled = false;
      document.getElementById("qualification").placeholder = "Enter Highest Qualification";
      document.getElementById("name6").disabled = false;
      document.getElementById("name6").placeholder = "Enter Adhar Number";
      document.getElementById("name11").disabled = false;
      document.getElementById("name11").placeholder = "Enter Contact Phone";

    }
  </script>
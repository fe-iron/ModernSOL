<?php 
    session_start();
    include 'auth.php';
    include_once'inc/head.php'; ?>

<?php
  include '../admin/connection.php';
  $conn = OpenCon();

  if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $faname = $_POST['faname'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $number = $_POST['number'];
    $profession = $_POST['profession'];
    $qualification = $_POST['qualification'];
    $aadhar = $_POST['aadhar'];
    $pin = $_POST['pin'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    
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
        
        $query = "UPDATE students SET fname='$fname', lname='$lname', father_name='$faname', country='$country', state='$state', city='$city', gender='$gender', dob='$dob', aadhar='$aadhar', number='$number', profession='$profession', aadhar='$aadhar', qualification='$qualification', address='$address', pin_code='$pin', file='$img1', password='$password' WHERE email='$email'";

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
                <img src="../images/logo-2.png" alt="">
            <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
            </div>
      <div class="pt-3">
        <div class="pt-3">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list active">Profile</a>
          <a href="contact.php" class="list">Contact Us</a>
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
                    <img src="../images/logo-2.png">
                    <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
                </a>
                </div>
                <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
            </div>
            </div>
        <div class="pt-3" id="sidebar-here">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list active">Profile</a>
          <a href="contact.php" class="list">Contact Us</a>
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
                      <label>First Name</label>
                      <input type="text" class="form-control" id="fname" disabled="disabled" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="col-md mb-3">
                      <label>Last Name</label>
                      <input type="text" class="form-control" id="lname" disabled="disabled" placeholder="Last Name" name="lname" required>
                    </div>
                    <div class="col-md mb-3">
                      <label>Father Name</label>
                      <input type="text" class="form-control" id="name1" disabled="disabled" placeholder="Father's Name" name="faname" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label>Country</label>
                      <input type="text" class="form-control" id="country" disabled="disabled" placeholder="Country" name="country" required>
                    </div>
                    <div class="col-md mb-3">
                      <label>State</label>
                      <input type="text" class="form-control" id="state" disabled="disabled" placeholder="State" name="state" required>
                    </div>
                    <div class="col-md mb-3">
                      <label>City</label>
                      <input type="text" class="form-control" id="city" disabled="disabled" placeholder="City" name="city" required>
                    </div>
                  </div>


                  <div class="form-row">

                    <div class="col-md mb-3">
                        <label>Gender</label>
                        <select class="form-select form-control" aria-label="Default select example" name="gender" id="gender" disabled required>
                            <option value="none">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="col-md mb-3">
                      <label>DOB*</label>
                      <input type="date" class="form-control" disabled="disabled" placeholder="DOB" maxlength="12" id="dob" name="dob" required>
                    </div>

                    <div class="col-md mb-3">
                      <label>Contact Phone Number</label>
                      <input type="tel" class="form-control" disabled="disabled" placeholder="Telephone Number" maxlength="12" minlength="10" id="name11" name="number" required>
                    </div>

                  </div>

                  
                  <div class="form-row">

                    <div class="col-md mb-3">
                      <label>Profession</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Profession" id="profession" name="profession" required>
                    </div>

                    <div class="col-md mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="name3" disabled="disabled" value="
                        <?php if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                              } else {
                                echo "Your Email";
                              } ?>" readonly>
                    </div>

                    <div class="col-md mb-3">
                      <label>Highest Qualification</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Highest Qualification" id="qualification" name="qualification" required>
                    </div>
                    
                  </div>
                  <div class="form-row">
                    
                    <div class="col-md mb-3">
                      <label>Aadhar Card Number</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Adhar Number" id="name6" name="aadhar" required>
                    </div>

                    <div class="col-md mb-3">
                      <label>Upload Image</label>
                      <input type="file" id="file_type" name="file" disabled required>
                    </div>
                  </div>

                  <div class="form-row">
                    
                    <div class="col-md mb-3">
                      <label>Address</label>
                      <input type="text" class="form-control" disabled="disabled" placeholder="Address" id="address" name="address" required>
                    </div>

                    <div class="col-md mb-3">
                      <label>Pin Code</label>
                      <input type="number" class="form-control" disabled="disabled" placeholder="Pin Code" id="pin" name="pin" required>
                    </div>
                    <div class="col-md mb-3">
                      <label>Paasword</label>
                      <input type="password" class="form-control" id="name4" disabled="disabled" placeholder="Password" name="password" required>
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
      document.getElementById("fname").disabled = false;
      document.getElementById("lname").disabled = false;
      document.getElementById("name1").disabled = false;
      document.getElementById("name2").disabled = false;
      document.getElementById("country").disabled = false;
      document.getElementById("state").disabled = false;
      document.getElementById("city").disabled = false;
      document.getElementById("gender").disabled = false;
      document.getElementById("profession").disabled = false;
      document.getElementById("address").disabled = false;
      document.getElementById("pin").disabled = false;

      document.getElementById("name3").disabled = false;
      document.getElementById("name4").disabled = false;
      document.getElementById("dob").disabled = false;
      document.getElementById("qualification").disabled = false;
      document.getElementById("name6").disabled = false;
      document.getElementById("name11").disabled = false;
    }
  </script>
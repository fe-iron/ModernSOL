<?php 
  session_start();
  include_once 'inc/head.php'; ?>
<?php

    include 'connection.php';
    $conn = OpenCon();
    
    if(!isset($_SESSION['email'])){
      echo "<script>window.location.href='login.php';</script>";
      exit;
    }
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $target_dir = "upload/admin/";

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png");

        //saving first image
        $img1 = $_FILES['file']['name'];
        // echo $_FILES['photo']['name'];
        $target_file1 = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        
        // Check extension
        if(in_array($imageFileType1,$extensions_arr) ){
        // Upload file
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img1)){
                // Insert record
                $password = md5($password);
                $query = "UPDATE admin SET name='$name', file='$img1', password='$password' 
                WHERE email='$email'"; 

                $result = $conn->query($query);
                if ($result){
                  $_SESSION['msg'] = "Successfully Updated your info!";
                }else{
                  $_SESSION['error'] = "Your info did not get updated! try again";
                }
            }
        }else{
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
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a  class="list" onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">German Classes</a>
                </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
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
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a class="list " onclick="openLan1()">Classes</a>
            <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list ">French Classes</a>
                <a href="spnish_classes.php" class="list ">Spanish Classes</a>
                <a href="german_classes.php" class="list ">German Classes</a>
            </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list active">Payments</a>
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
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
            </h4>
            <h4 class="mb-4 text-danger"><?php
                        if(isset($_SESSION['error'])){
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
                      <input type="text" class="form-control" id="name" disabled="disabled" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username']; }else{ echo "Your name";} ?>" name="name" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label>Email</label>
                      <input type="email" class="form-control" id="email" disabled="disabled" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; }else{ echo "Your Email";} ?>" name="email" readonly required>
                    </div>
                    <div class="col-md mb-3">
                      <label>Paasword</label>
                      <input type="password" class="form-control" id="password" disabled="disabled" placeholder="Password" name="password" required>
                    </div>
                    
                  </div>

                  
                  <div class="form-row">
                    
                    <div class="col-md mb-3">
                      <label>Upload Image</label>
                      <input type="file" id="file" name="file" disabled required>
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



  <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>



  <script>
    function enable() {
      document.getElementById('name').disabled = false;
      document.getElementById('email').disabled = false;
      document.getElementById('password').disabled = false;
      document.getElementById('file').disabled = false;
    }
  </script>


</body>

</html>
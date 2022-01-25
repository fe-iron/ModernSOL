<?php 
  session_start();
  include_once 'inc/head.php';
  include 'connection.php';
  $conn = OpenCon();

  if(isset($_POST['batch'])){
    $name = $_POST['name'];
    $language = $_POST['language'];

    if(isset($_POST['monday'])){
      $mond = $_POST['monday']; 
    }else{
        $mond = ' ';
    }
    
    if(isset($_POST['tuesday'])){
      $tuesd = $_POST['tuesday']; 
    }else{
        $tuesd = ' ';
    }

    if(isset($_POST['wednesday'])){
      $wednesd = $_POST['wednesday']; 
    }else{
        $wednesd = ' ';
    }

    if(isset($_POST['thursday'])){
      $thursd = $_POST['thursday']; 
    }else{
        $thursd = ' ';
    }

    if(isset($_POST['friday'])){
      $frid = $_POST['friday']; 
    }else{
        $frid = ' ';
    }
    
    if(isset($_POST['saturday'])){
      $saturd = $_POST['saturday']; 
    }else{
        $saturd = ' ';
    }

    if(isset($_POST['sunday'])){
      $sund = $_POST['sunday']; 
    }else{
        $sund = ' ';
    }

    if(isset($_POST['time1'])){
      $batch_time1 = $_POST['time1']; 
    }else{
        $batch_time1 = '';
    }

    if(isset($_POST['time2'])){
      $batch_time2 = $_POST['time2']; 
    }else{
        $batch_time2 = '';
    }

    if(isset($_POST['time3'])){
      $batch_time3 = $_POST['time3']; 
    }else{
        $batch_time3 = '';
    }

    if(isset($_POST['time4'])){
      $batch_time4 = $_POST['time4']; 
    }else{
        $batch_time4 = '';
    }

    if(isset($_POST['time5'])){
      $batch_time5 = $_POST['time5']; 
    }else{
      $batch_time5 = '';
    }

    if(isset($_POST['time6'])){
      $batch_time6 = $_POST['time6']; 
    }else{
        $batch_time6 = '';
    }

    if(isset($_POST['time7'])){
      $batch_time7 = $_POST['time7']; 
    }else{
      $batch_time7 = '';
    }

    $days = $mond . ' ' .$tuesd . ' ' .$wednesd . ' ' .$thursd . ' ' .$frid . ' ' .$saturd . ' ' .$sund;

    $query = "INSERT into `batches` (name, language, day, batch_time_mon, batch_time_tues, batch_time_wed, batch_time_thurs, batch_time_fri, batch_time_sat, batch_time_sun)
                VALUES ('$name', '$language', '$days', '$batch_time1', '$batch_time2', '$batch_time3', '$batch_time4', '$batch_time5', '$batch_time6', '$batch_time7')";

    if($conn->query($query) === TRUE){  
      $_SESSION['msg'] = "Successfully created new Batch!";
    }else{
        // echo "Error: " . $query . "<br>" . $conn->error;
      $_SESSION['error'] = "New Batch creation failed! Try Again";
    }
  }

  
  $sql = "SELECT * FROM batches ORDER BY id DESC";
  $batches = $conn->query($sql);

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
          <a href="account.php" class="list">Profile</a>
          <a href="batches.php" class="list active">Batches</a>
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
          <a href="spanish_student.php" class="list">Spanish Students</a>
          <a href="french_student.php" class="list">French Students</a>
          <a href="german_student.php" class="list">German Students</a>
          <a href="all_student.php" class="list">All Students</a>
        </div>
      </div>
    </div>


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
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list active">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a  class="list " onclick="openLan1()">Classes</a>
            <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list ">French Classes</a>
                <a href="spnish_classes.php" class="list ">Spanish Classes</a>
                <a href="german_classes.php" class="list ">German Classes</a>
            </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
          <a href="spanish_student.php" class="list">Spanish Students</a>
          <a href="french_student.php" class="list">French Students</a>
          <a href="german_student.php" class="list">German Students</a>
          <a href="all_student.php" class="list">All Students</a>
        </div>
      </div>
    </div>
    <!-- large-screen-sidebar-starts -->


    <div class="content">

      <?php include_once 'inc/header.php'; ?>

      <div class="container py-5 personal-inforamtion">


        <div class="row justify-content-center">
          <div class="col-md-10">
          <h4 class="mx-4 text-success"><?php 
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
            </h4>
            <h4 class="mx-4 text-danger"><?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
            </h4>
            <div class="card shadow">
              <nav class="navbar navbar-light border personal-detail">
                <a class="h4 text-danger font-weight-bold pt-2">Create New Batch</a>
                <form class="form-inline">
                  <a class="btn btn-danger mb text-white" href="#batches">See Available Batches</a>

                </form>
              </nav>
              <div class="card-body">
                <form action=" " method="post">

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Batch Name</label>
                      <input type="text" class="form-control" name="name" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Language</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="language">
                        <option selected="selected" value="none">Select Language  </option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Spanish">Spanish</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Day</label>
                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="monday" id="flexCheckChecked" name="monday" onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Monday
                        </label>
                      </div>
                      
                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="tuesday" id="flexCheckChecked" name="tuesday" onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Tuesday
                        </label>
                      </div>
                        
                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="wednesday" id="flexCheckChecked" name="wednesday"  onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Wednesday
                        </label>
                      </div>

                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="thursday" id="flexCheckChecked" name="thursday" onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Thursday
                        </label>
                      </div>
                      
                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="friday" id="flexCheckChecked" name="friday"  onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Friday
                        </label>
                      </div>

                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="saturday" id="flexCheckChecked" name="saturday"  onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Saturday
                        </label>
                      </div>

                      <div class="form-check px-5">
                        <input class="form-check-input" type="checkbox" value="sunday" id="flexCheckChecked" name="sunday"  onclick="add_batch_time(this.value);">
                        <label class="form-check-label" for="flexCheckChecked">
                          Sunday
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_mon" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Monday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time1" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_tues" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Tuesday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time2" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_wed" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Wednesday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time3" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_thurs" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Thursday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time4" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_fri" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Friday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time5" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_sat" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Saturday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time6" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3" id="batch_div_sun" style="display:none">
                      <label class="font-weight-bold">Select Batch Time For Sunday</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="time7" required>
                          <option selected="selected" value="none">Select Time</option>
                          <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                          <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                          <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                          <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                          <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                          <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                          <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                          <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                          <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                          <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                          <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                          <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                          <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                          <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                          <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                          <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                          <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                          <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                          <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                          <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                          <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                          <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row my-3">
                    <div class="col-md mb-2">
                      <button type="submit" class="btn btn-info text-white" name="batch">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
                      

          <div class="row justify-content-center" id="batches">
            <div class="col-md-10 my-5">
                  <div class="card">
                      <nav class="navbar navbar-light border venue-registration border-bottom">
                          <a class="h4 text-dark font-weight-bold pt-2">Your Batches</a>
                          <form class="form-inline">

                          </form>
                      </nav>
                      <div class="card-body shadow">
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="border">
                                  <tr>
                                      <th scope="col" class="border-right text-center">Sr.</th>
                                      <th scope="col" class="border-right text-center">Date</th>
                                      <th scope="col" class="border-right text-center">Batch Name</th>
                                      <th scope="col" class="border-right text-center">Language</th>  
                                      <th scope="col" class="border-right text-center">Day</th>  
                                      <th scope="col" class="border-right text-center">Batch Times</th>
                                      <th scope="col" class="border-right text-center">Remove</th>
                                      <th scope="col" class="border-right text-center">Change Batch Time</th>
                                  </tr>
                                  </thead>
                                  <tbody> 
                                  <?php $count = 0;
                                  while($data = mysqli_fetch_assoc($batches)){ 
                                      $count = $count + 1; ?>
                                      <tr class="border-bottom">
                                        <td class="border-right border-left text-center"><?php echo $count; ?></td>
                                        <td class="border-right border-left text-center"><?php echo substr($data['created_on'], 0, 10); ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['name']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['language']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo ucwords($data['day']); ?></td>
                                        <td class="border-right border-left text-center">
                                        <?php
                                          if($data['batch_time_mon'] == "" || $data['batch_time_mon'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Monday: </p>'.$data['batch_time_mon'];
                                          }

                                          if($data['batch_time_tues'] == "" || $data['batch_time_tues'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Tuesday: </p>'.$data['batch_time_tues'];
                                          }

                                          if($data['batch_time_wed'] == "" || $data['batch_time_wed'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Wednesday: </p>'.$data['batch_time_wed'];
                                          }

                                          if($data['batch_time_thurs'] == "" || $data['batch_time_thurs'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Thursday: </p>'.$data['batch_time_thurs'];
                                          }

                                          if($data['batch_time_fri'] == "" || $data['batch_time_fri'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Friday: </p>'.$data['batch_time_fri'];
                                          }

                                          if($data['batch_time_sat'] == "" || $data['batch_time_sat'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Saturday: </p>'.$data['batch_time_sat'];
                                          }

                                          if($data['batch_time_sun'] == "" || $data['batch_time_sun'] == "none"){
                                          }else{
                                            echo '<p class="text-dark font-weight-bold">Sunday: </p>'.$data['batch_time_sun'];
                                          }

                                        ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" value="<?php echo $data['id']; ?>" onclick="remove(this.value)">Delete</button>    
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info" value="<?php echo $data['id']; ?>" onclick="change(this.value)">Change</button>    
                                        </td>
                                      </tr> 
                                  <?php } ?>
                              </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
        </div>
      </div>
  </section>


  <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" >Update Batch Times</h5>
          
      </div>
      <div class="modal-body">
      <form action="change.php" method="post">

      <div class="form-row">
        <div class="col-md mb-3">
          <label class="font-weight-bold">Day</label>
          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="monday" id="monday" name="monday" onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Monday
            </label>
          </div>
          
          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="tuesday" id="tuesday" name="tuesday" onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Tuesday
            </label>
          </div>
            
          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="wednesday" id="wednesday" name="wednesday"  onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Wednesday
            </label>
          </div>

          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="thursday" id="thursday" name="thursday" onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Thursday
            </label>
          </div>
          
          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="friday" id="friday" name="friday"  onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Friday
            </label>
          </div>

          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="saturday" id="saturday" name="saturday"  onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Saturday
            </label>
          </div>

          <div class="form-check px-5">
            <input class="form-check-input" type="checkbox" value="sunday" id="sunday" name="sunday"  onclick="add_batch_time_modal(this.value);">
            <label class="form-check-label" for="flexCheckChecked">
              Sunday
            </label>
          </div>
        </div>
      </div>
                  
      <div class="form-row" id="batch_time">
        <div class="col-md mb-3" id="batch_div_mon_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Monday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_mon_select" aria-label=".form-select-lg example" name="time1" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_tues_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Tuesday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_tues_select" aria-label=".form-select-lg example" name="time2" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>
      
      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_wed_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Wednesday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_wed_select" aria-label=".form-select-lg example" name="time3" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_thurs_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Thursday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_thurs_select" aria-label=".form-select-lg example" name="time4" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_fri_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Friday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_fri_select" aria-label=".form-select-lg example" name="time5" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_sat_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Saturday</label>
            <select class="form-select form-control form-select-lg mb-3" id="batch_div_sat_select" aria-label=".form-select-lg example" name="time6" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
            </select>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md mb-3" id="batch_div_sun_modal" style="display:none">
          <label class="font-weight-bold">Select Batch Time For Sunday</label>
          <select class="form-select form-control form-select-lg mb-3" id="batch_div_sun_select" aria-label=".form-select-lg example" name="time7" required>
              <option selected="selected" value="none">Select Time</option>
              <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
              <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
              <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
              <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
              <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
              <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
              <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
              <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
              <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
              <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
              <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
              <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
              <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
              <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
              <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
              <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
              <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
              <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
              <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
              <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
              <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
              <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
          </select>
        </div>
      </div>
        
        <input type="hidden" id="change_id" name="remove_id">
        <input type="hidden"  name="task" value="change">
        <div class="form-row">
          <div class="col-md mb-2">
            <button type="submit" class="btn btn-info text-white">Update</button>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('remove')">Close</button>
      </div>
      </div>
  </div>
  </div>


  <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
            
        </div>
        <div class="modal-body">
            <h1 class="text-danger fw-bold" style="text-align: center;">Are you sure?</h1>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('remove')">No</button>
            <button type="button" class="btn btn-primary" onclick="submit('remove');">Yes</button>
        </div>
        </div>
    </div>
    </div>


    
    <div style="display: hidden">
        <form action="change.php" method="post" name="remove_form">
            <input type="hidden" id="remove_id" name="remove_id">
            <input type="hidden"  name="task" id="task">
        </form>
    </div>


  <script src="inc/js/my_script.js"></script>
  <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }

    
    function remove(id){
        $('#remove_id').val(id);
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#remove').modal('show');
    }

    function setOption(selectElement, value) {
        return [...selectElement.options].some((option, index) => {
            if (option.value == value) {
                selectElement.selectedIndex = index;
                return true;
            }
        });
    }

    function change(id){
        $('#change_id').val(id);
        send_php_req(id);
        document.getElementById("monday").checked = false;
        document.getElementById("thursday").checked = false;
        document.getElementById("tuesday").checked = false;
        document.getElementById("wednesday").checked = false;
        document.getElementById("friday").checked = false;
        document.getElementById("saturday").checked = false;
        document.getElementById("sunday").checked = false;

        document.getElementById('batch_div_mon_modal').style.display = "none";
        document.getElementById('batch_div_tues_modal').style.display = "none";
        document.getElementById('batch_div_wed_modal').style.display = "none";
        document.getElementById('batch_div_thurs_modal').style.display = "none";
        document.getElementById('batch_div_fri_modal').style.display = "none";
        document.getElementById('batch_div_sat_modal').style.display = "none";
        document.getElementById('batch_div_sun_modal').style.display = "none";

        var mon_flag_modal = false;
        var tues_flag_modal = false;
        var wed_flag_modal = false;
        var thurs_flag_modal = false;
        var fri_flag_modal = false;
        var sat_flag_modal = false;
        var sun_flag_modal = false;

        count_modal = 0;
    }

    function send_php_req(this_id){
      console.log("sending AJAX...");
      if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

        xmlhttp=new XMLHttpRequest();

      } else {// code for IE6, IE5

        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

      }

      xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          // fetching data from response
          var res_text = xmlhttp.responseText;
          res_text = JSON.parse(res_text);
          var day = res_text.day;
          var mon = res_text.batch_time_mon;
          var tues = res_text.batch_time_tues
          var wed = res_text.batch_time_wed
          var thurs = res_text.batch_time_thurs
          var fri = res_text.batch_time_fri
          var sat = res_text.batch_time_sat
          var sun = res_text.batch_time_sun
          day = day.split(" ");
          console.log(sun)
          // itearting over the days
          for(var i=0; i< day.length; i++){
            if(day[i] != " " && day[i] != ""){
              document.getElementById(day[i]).checked = true;
              // document.getElementById(day[i]).click();
              if(day[i] == "monday"){
                if(mon != "" && mon != " " && mon != "none"){
                  if (setOption(document.getElementById('batch_div_mon_select'), mon)){
                    document.getElementById('batch_div_mon_modal').style.display = "block";
                    mon_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "tuesday"){
                if(tues != "" && tues != " " && tues != "none"){
                  if (setOption(document.getElementById('batch_div_tues_select'), tues)){
                    document.getElementById('batch_div_tues_modal').style.display = "block";
                    tues_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "wednesday"){
                if(wed != "" && wed != " " && wed != "none"){
                  if (setOption(document.getElementById('batch_div_wed_select'), wed)){
                    document.getElementById('batch_div_wed_modal').style.display = "block";
                    wed_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "thursday"){
                if(thurs != "" && thurs != " " && thurs != "none"){
                  if (setOption(document.getElementById('batch_div_thurs_select'), thurs)){
                    document.getElementById('batch_div_thurs_modal').style.display = "block";
                    thurs_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "friday"){
                if(fri != "" && fri != " " && fri != "none"){
                  if (setOption(document.getElementById('batch_div_fri_select'), fri)){
                    document.getElementById('batch_div_fri_modal').style.display = "block";
                    fri_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "saturday"){
                if(sat != "" && sat != " " && sat != "none"){
                  if (setOption(document.getElementById('batch_div_sat_select'), sat)){
                    document.getElementById('batch_div_sat_modal').style.display = "block";
                    sat_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }else if(day[i] == "sunday"){
                if(sun != "" && sun != " " && sun != "none"){
                  if (setOption(document.getElementById('batch_div_sun_select'), sun)){
                    document.getElementById('batch_div_sun_modal').style.display = "block";
                    sun_flag_modal = true;
                    count_modal += 1;
                  }
                }
              }
            }
          }
          

          $('.imagepreview').attr('src', $(this).find('img').attr('src'));
          $('#change').modal('show');
        }

      }

      xmlhttp.open("GET","get_batch_detail.php?id="+this_id,true);

      xmlhttp.send();
    }

    function close_modal(tag){
        $('#'+tag).modal('hide');
    }
    
    function submit(task){
        $('#task').val(task);
        document.forms['remove_form'].submit();
    }

  </script>

  

</body>

</html>
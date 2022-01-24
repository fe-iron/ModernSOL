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

    $sql = 'SELECT * FROM batches where language="French"';
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
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a class="list active" onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french_classes.php" class="list active">French Classes</a>
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
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a class="list active" onclick="openLan1()">Classes</a>
            <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list active">French Classes</a>
                <a href="spnish_classes.php" class="list ">Spanish Classes</a>
                <a href="german_classes.php" class="list ">German Classes</a>
            </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
        </div>
      </div>
    </div>
    <!-- large-screen-sidebar-starts -->


    <div class="content">
      <?php include_once 'inc/header.php'; ?>
      <div class="container py-5 wishlist">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <nav class="navbar navbar-light border venue-registration border-bottom">
                          <a class="h4 text-dark font-weight-bold pt-2"> My French Batches</a>
                          <form class="form-inline">

                          </form>
                      </nav>
                      <?php 
                      while($row = mysqli_fetch_assoc($batches)){ ?>
                      
                      <div class="card-body border-bottom py-3"> <!-- Put The Php Loop Here -->
                          <!-- <a href="" class="text-decoration-none text-dark"> -->
                              <div class="row border-bottom">
                                  <div class="col-md"><h6>Batch Creation Date : <?php echo substr($row['created_on'], 0, 10); ?></h6></div>
                              </div>
                              <div class="row pt-3">
                                  <div class="col-md-4 mb-3">
                                      <img src="../images/map/french.png">
                                      
                                  </div>

                                  <div class="col-md">
                                      <h3><span><?php echo $row['name']; ?></span></h3>
                                      <!-- <p class="mb-1">Vanue Type : Villa</p> -->
                                      <h6><span class="badge badge-dark">Days Open: <?php echo ucwords($row['day']); ?></span></h6>
                                      <h5 class="text-dark">
                                      <?php
                                          if($row['batch_time_mon'] == "" || $row['batch_time_mon'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Monday:</span> '.$row['batch_time_mon']. '</p>';
                                          }

                                          if($row['batch_time_tues'] == "" || $row['batch_time_tues'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Tuesday:</span> '.$row['batch_time_tues'].'</p>';
                                          }

                                          if($row['batch_time_wed'] == "" || $row['batch_time_wed'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Wednesday:</span> '.$row['batch_time_wed'].'</p>';
                                          }

                                          if($row['batch_time_thurs'] == "" || $row['batch_time_thurs'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Thursday:</span> '.$row['batch_time_thurs'].'</p>';
                                          }

                                          if($row['batch_time_fri'] == "" || $row['batch_time_fri'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Friday:</span> '.$row['batch_time_fri'].'</p>';
                                          }

                                          if($row['batch_time_sat'] == "" || $row['batch_time_sat'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Saturday:</span> '.$row['batch_time_sat'].'</p>';
                                          }

                                          if($row['batch_time_sun'] == "" || $row['batch_time_sun'] == "none"){
                                          }else{
                                            echo '<p><span class="text-dark font-weight-bold">Sunday:</span> '.$row['batch_time_sun'].'</p>';
                                          }

                                        ?>
                                      </h5>
                                      <h5 class="text-dark"> <a href="classes.php?key=<?php echo $row['id']; ?>">My Classes</a></h5>
                                  </div>
                              </div>
                          <!-- </a>  -->
                      </div>
                    <?php } ?>
                  </div>
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
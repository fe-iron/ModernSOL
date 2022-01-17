<?php 
  session_start();
  include_once 'inc/head.php'; ?>
<?php

  include 'connection.php';
  include 'auth.php';
  $conn = OpenCon();

  $sql = 'SELECT * FROM batches where language="German"';
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
          <a href="index.php" class="list ">My Course</a>
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a class="list active" onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list active">German Classes</a>
                </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
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
          <a href="index.php" class="list ">My Course</a>
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a class="list active" onclick="openLan1()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list active">German Classes</a>
                </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
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
                            <a class="h4 text-dark font-weight-bold pt-2"> My German Batches</a>
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
                                        <img src="images/bg-images.jpg">
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
                                            echo '<p><span class="text-dark font-weight-bold">Thursday:</span> '.$data['batch_time_thurs'].'</p>';
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


</body>

</html>
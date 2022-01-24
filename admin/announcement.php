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

    if(isset($_POST['update'])){
        $announcement = $_POST['announancement'];
        $remove_id = $_POST['remove_id'];

        $sql = "UPDATE announancement SET announancement='$announcement' WHERE id=".$remove_id;    
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['msg'] = "Successfully Updated!";
        } else {
            $_SESSION['error'] = "Update Failed! Try again";
        }
    }

    if(isset($_POST['delete'])){
        $remove_id = $_POST['remove_id'];

        $sql = "DELETE FROM announancement WHERE id=".$remove_id;    
            
        if ($conn->query($sql) === TRUE) {
            $_SESSION['msg'] = "Successfully Deleted!";
        } else {
            $_SESSION['error'] = "Delete Failed! Try again";
        }
    }
    
    if(isset($_POST['submit'])){
        $announancement = $_POST['announancement'];
        $batch = $_POST['batch'];


        $query = "INSERT into `announancement` (announancement, batch_fk)
                VALUES ('$announancement', '$batch')";
        $result = $conn->query($query);

        if($result){
            $_SESSION['msg'] = "Successfully Updated your Announcement!";
        }else{
            $_SESSION['error'] = "Your announcement did not get updated! try again";
        }
    }

    $sql = "SELECT * FROM batches ORDER BY id DESC";
    $batches = $conn->query($sql);
    
    $sql = "SELECT * FROM announancement ORDER BY id DESC";
    $announcement = $conn->query($sql);

    $batch_name = array();

    while($data = mysqli_fetch_assoc($announcement)){ 
        $fk = $data['batch_fk'];
        
        $sql = "SELECT * FROM batches WHERE id=".$fk." LIMIT 1";
        $batch = $conn->query($sql);

        $row = mysqli_fetch_assoc($batch);
        array_push($batch_name, $row['name']);
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
          <a href="account.php" class="list">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a class="list" onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">German Classes</a>
                </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list active">Announcement</a>
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
          <a href="account.php" class="list">Profile</a>
          <a href="batches.php" class="list">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a  class="list " onclick="openLan1()">Classes</a>
            <div class="languages-dropdown" style="display: none;" id="open-classes1">
                <a href="french_classes.php" class="list ">French Classes</a>
                <a href="spnish_classes.php" class="list ">Spanish Classes</a>
                <a href="german_classes.php" class="list ">German Classes</a>
            </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list active">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
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
                <a class="h4 text-danger font-weight-bold pt-2">Make an Announcement</a>
                <form class="form-inline">
                  <a class="btn btn-danger mb text-white" href="#batches_tab">Previous Announcement</a>

                </form>
              </nav>
              <div class="card-body">
                <form action=" " method="post" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Announcement</label>
                      <textarea name="announancement" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">For Batch</label>
                      <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="batch">
                        <option selected="selected" value="none">Select Batch</option>
                        <?php 
                          if($batches->num_rows > 0){
                            while($data = mysqli_fetch_assoc($batches)){ 
                                echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                            }
                          }
                        ?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-row my-3">
                    <div class="col-md mb-2">
                      <button type="submit" class="btn btn-info text-white" name="submit">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" id="batches_tab">
            <div class="col-md-10 my-5">
                  <div class="card">
                      <nav class="navbar navbar-light border venue-registration border-bottom">
                          <a class="h4 text-dark font-weight-bold pt-2">Previous Announcement</a>
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
                                      <th scope="col" class="border-right text-center">Announcement</th>
                                      <th scope="col" class="border-right text-center">Batch Name</th>
                                      <th scope="col" class="border-right text-center">Remove</th>
                                      <th scope="col" class="border-right text-center">Change</th>
                                  </tr>
                                  </thead>
                                  <tbody> 
                                  <?php 
                                  $sql = "SELECT * FROM announancement ORDER BY id DESC";
                                  $announcement = $conn->query($sql);
                                  $count = 0;
                                  while($data = mysqli_fetch_assoc($announcement)){ 
                                      $b_name = $batch_name[$count];
                                      $count = $count + 1; ?>
                                      <tr class="border-bottom">
                                        <td class="border-right border-left text-center"><?php echo $count; ?></td>
                                        <td class="border-right border-left text-center"><?php echo substr($data['created_on'], 0, 10); ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['announancement']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo  $b_name; ?></td>
                                        
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
  </section>

  
  <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Batch Time</h5>
          
      </div>
      <div class="modal-body">
      <form action=" " method="post">

        <div class="form-row">
          <div class="col-md mb-3">
            <label class="font-weight-bold">New Announcement</label>
            <textarea name="announancement" class="form-control" cols="30" rows="10"></textarea>
          </div>
        </div>
        <input type="hidden" id="change_id" name="remove_id">
        <div class="form-row">
          <div class="col-md mb-2">
            <button type="submit" class="btn btn-info text-white" name="update">Update</button>
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
        <form action=" " method="post" name="remove_form">
            <input type="hidden" id="remove_id" name="remove_id">
            <input type="hidden" name="delete">

            <!-- <input type="hidden"  name="task" id="task"> -->
        </form>
    </div>

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

    function change(id){
        $('#change_id').val(id);
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#change').modal('show');
    }

    
    function close_modal(tag){
        $('#'+tag).modal('hide');
    }

    
    function submit(task){
        document.forms['remove_form'].submit();
    }
  </script>
</body>

</html>
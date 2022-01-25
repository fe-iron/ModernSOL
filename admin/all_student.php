<?php 
  session_start();
  include_once 'inc/head.php'; 
?>
<?php

    include 'connection.php';
    $conn = OpenCon();
    
    if(!isset($_SESSION['email'])){
      echo "<script>window.location.href='login.php';</script>";
      exit;
    }

    if(isset($_POST['remove_id'])){
        $remove_id = $_POST['remove_id'];

        $sql = "DELETE FROM students WHERE id=".$remove_id; 
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['msg'] = "Successfully Deleted!";
        } else {
            $_SESSION['error'] = "Delete Failed! Try again";
        }
    }

    $sql = 'SELECT * FROM students ORDER BY id DESC';
    $students = $conn->query($sql);
    
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
          <a class="list" onclick="openLan()">Classes</a>
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
          <a href="all_student.php" class="list active">All Students</a>
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
          <a class="list " onclick="openLan1()">Classes</a>
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
          <a href="all_student.php" class="list active">All Students</a>
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
            <div class="card">
                <nav class="navbar navbar-light border venue-registration border-bottom">
                    <a class="h4 text-dark font-weight-bold pt-2">French Students</a>
                    <form class="form-inline">
                    </form>
                </nav>
                <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="border">
                                <tr>
                                    <th scope="col" class="border-right text-center">Sr.</th>
                                    <th scope="col" class="border-right text-center">Date</th>
                                    <th scope="col" class="border-right text-center">Full Name</th>
                                    <th scope="col" class="border-right text-center">Father Name</th>
                                    <th scope="col" class="border-right text-center">Number</th>   
                                    <th scope="col" class="border-right text-center">DOB</th>   
                                    <th scope="col" class="border-right text-center">Email</th>  
                                    <th scope="col" class="border-right text-center">Course</th>  
                                    <th scope="col" class="border-right text-center">Aadhar</th>  
                                    <th scope="col" class="border-right text-center">Qualification</th>  
                                    <th scope="col" class="border-right text-center">Photo</th>  
                                    <th scope="col" class="border-right text-center">French Level</th>  
                                    <th scope="col" class="border-right text-center">German Level</th>  
                                    <th scope="col" class="border-right text-center">Spanish Level</th>  
                                    <th scope="col" class="border-right text-center">Country</th>  
                                    <th scope="col" class="border-right text-center">State</th>  
                                    <th scope="col" class="border-right text-center">City</th>  
                                    <th scope="col" class="border-right text-center">Gender</th>  
                                    <th scope="col" class="border-right text-center">Profession</th>  
                                    <th scope="col" class="border-right text-center">Address</th>  
                                    <th scope="col" class="border-right text-center">PIN Code</th>  
                                    <th scope="col" class="border-right text-center">Placement</th>  
                                    <th scope="col" class="border-right text-center">About Us</th>
                                    <th scope="col" class="border-right text-center">Batch Name</th>
                                    <th scope="col" class="border-right text-center">Action</th>      
                                </tr>
                                </thead>
                                <tbody> 
                                    <?php $count = 0;
                                    if($students->num_rows > 0){
                                    while($data = mysqli_fetch_assoc($students)){ 
                                        $count = $count + 1; ?>
                                        <tr class="border-bottom">
                                        <td class="border-right border-left text-center"><?php echo $count; ?></td>
                                        <td class="border-right border-left text-center"><?php echo substr($data['created_on'], 0, 10); ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['fname']." ".$data['lname']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['father_name']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['number']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['dob']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['email']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['course']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['aadhar']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['qualification']; ?></td>
                                        <td class="border-right border-left text-center"><a href="upload/students/<?php echo $data['file']; ?>"><?php echo $data['file']; ?></a></td>
                                        <td class="border-right border-left text-center"><?php echo $data['f_level']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['g_level']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['s_level']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['country']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['state']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['city']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['gender']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['profession']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['address']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['pin_code']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['placement']; ?></td>
                                        <td class="border-right border-left text-center"><?php echo $data['about_us']; ?></td>
                                        <td class="border-right border-left text-center"><?php 
                                            $result1 = "SELECT * FROM `batches` WHERE `id` = ".$data['batch_fk'];
                                            $result1 = $conn->query($result1);
                                            if($result1->num_rows > 0){
                                                while($row = mysqli_fetch_assoc($result1)){
                                                    $bat_name = $row['name'];
                                                }
                                            }
                                            echo $bat_name; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" value="<?php echo $data['id']; ?>" onclick="remove(this.value)">Delete</button>    
                                        </td>
                                        </tr> 
                                    <?php } }?>
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

    function close_modal(tag){
        $('#'+tag).modal('hide');
    }

    
    function submit(){
        document.forms['remove_form'].submit();
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
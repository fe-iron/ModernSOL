<?php 
    session_start();
    include 'auth.php';
    include_once'inc/head.php'; ?>
<?php

    include '../admin/connection.php';
    $conn = OpenCon();
    
    if(isset($_SESSION['email'])){
        $query = 'SELECT * FROM students where email="'.$_SESSION['email'].'"';
        $result = $conn->query($query);
        $flag = false;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()){
                $is_pass_set = $row['is_password_set'];

                if($is_pass_set){
                    $flag = true;
                }
            }

            if(!$flag){
                $_SESSION['error'] = "Change your password first!";
                header("Location: password-change.php");
            }
        }else{
            $_SESSION['error'] = "Login first to access index page";
            header("Location: login.php");
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
            <div class="pt-3" id="sidebar-here">
               <a href="index.php" class="list active">Home</a>
               <a href="account.php" class="list">Profile</a>
               <a href="contact.php" class="list">Contact Us</a>
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
          <a href="index.php" class="list active">Home</a>
          <a href="account.php" class="list">Profile</a>
          <a href="contact.php" class="list">Contact Us</a>
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
                        <a class="h4 text-dark font-weight-bold pt-2"> My Course</a>
                        <form class="form-inline">

                        </form>
                    </nav>
                    <?php 
                    $query = 'SELECT * FROM students where email="'.$_SESSION['email'].'"';
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()){ $course = $row['course']; ?>
                    <div class="card-body border-bottom py-3">
                            <div class="row border-bottom">
                                <div class="col-md"><h6>Registration Date : <?php echo substr($row['created_on'], 0, 10); ?></h6></div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-4 mb-3">
                                <?php 
                                    if($course == "French"){
                                        echo '<img src="../images/map/french.png">';
                                    }else if($course == "Spanish"){
                                        echo '<img src="../images/map/spanish.jpeg">';
                                    }else{
                                        echo '<img src="../images/map/german.png">';
                                    }
                                ?>
                                </div>

                                <div class="col-md">
                                    <?php $sql = "SELECT name FROM batches where id=" . $row['batch_fk'] . " LIMIT 1";
                                                    $batch_name = $conn->query($sql);
                                                    if($batch_name->num_rows > 0){
                                                        $data = mysqli_fetch_assoc($batch_name);
                                                        echo "<h3>Batch Name: ". $data['name']."<span></span></h3>";
                                                    }
                                    ?>
                                    <h4>Course: <?php echo $course; ?><span></span></h4>
                                    <!-- <p class="mb-1">Vanue Type : Villa</p> -->
                                    <h6><span class="badge badge-dark">5 Star</span></h6>
                                    <h5 class="text-dark"><?php 
                                        $s_level = $row['s_level'];
                                        $g_level = $row['g_level'];
                                        $f_level = $row['f_level'];

                                        if($s_level){
                                            echo "Spanish Level: ".$s_level;
                                        }else if($g_level){
                                            echo "German Level: ".$g_level;
                                        }else if($f_level){
                                            echo "French Level: ".$f_level;
                                        }
                                    ?></h5>
                                    <h5 class="text-dark"> <a href="classes.php?key=<?php echo $row['batch_fk']; ?>">My Classes</a></h5>
                                </div>
                            </div>
                    </div>

                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</section>

<!-- <script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script> -->

</body>

</html>
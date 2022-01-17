<?php 
    session_start();
    include 'auth.php';
    include_once'inc/head.php'; 
?>
<?php
    
    include 'connection.php';  
    $conn = OpenCon();
    if(isset($_SESSION['email'])){
        $sql = "SELECT * FROM students WHERE course='German'";
        $german_count = $conn->query($sql);
        $german_count = mysqli_num_rows($german_count);
    
        $sql = "SELECT * FROM students WHERE course='Spanish'";
        $spanish_count = $conn->query($sql);
        $spanish_count = mysqli_num_rows($spanish_count);
    
        $sql = "SELECT * FROM students WHERE course='French'";
        $french_count = $conn->query($sql);
        $french_count = mysqli_num_rows($french_count);
    
        $sql = "SELECT * FROM students";
        $total_regis = $conn->query($sql);
        $total_regis = mysqli_num_rows($total_regis); 
        
        $sql = "SELECT * FROM enquiry_form";
        $total_enquiry = $conn->query($sql);
        $total_enquiry = mysqli_num_rows($total_enquiry);
        
        $sql = "SELECT * FROM career";
        $career = $conn->query($sql);
        $career = mysqli_num_rows($career);
    }else{
        session_destroy();
        echo "<script>window.location.href='login.php';</script>";
        exit;
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
            <div class="pt-2" id="sidebar-here">
               <a href="index.php" class="list active">Home</a>
               <a href="account.php" class="list">Profile</a>
               <a href="batches.php" class="list">Batches</a>
               <a href="career.php" class="list">Career</a>
               <a class="list" onclick="openLan()">Classes</a>
               <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spanish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">German Classes</a>
                </div>
               <a href="e-form.php" class="list">Enquiry Form</a>
               <a href="announcement.php" class="list">Announcement</a>
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
            <div class="" id="sidebar-here">
                <a href="index.php" class="list active">Home</a>
                <a href="account.php" class="list">Profile</a>
                <a href="batches.php" class="list">Batches</a>
                <a href="career.php" class="list">Career</a>
                <a class="list " onclick="openLan1()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes1">
                    <a href="french_classes.php" class="list ">French Classes</a>
                    <a href="spnish_classes.php" class="list ">Spanish Classes</a>
                    <a href="german_classes.php" class="list ">German Classes</a>
                </div>
                <a href="e-form.php" class="list">Enquiry Form</a>
                <a href="announcement.php" class="list">Announcement</a>
            </div>
            </div>
            </div>
<!-- large-screen-sidebar-starts -->

<div class="content">
    <?php include_once'inc/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10"><p class="h4 text-dark font-weight-bold mt-5 text-center">Total Stats of ModernSOL</p></div>
        </div>

        <div class="row mx-5 my-5">
            <div class="col-md-3 col-sm-6">
                <div class="counter red">
                    <div class="counter-icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <h3>German Registration</h3>
                    <span class="counter-value"><?php echo $german_count; ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter green">
                    <div class="counter-icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <h3>French Registration</h3>
                    <span class="counter-value"><?php echo $french_count; ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter red">
                    <div class="counter-icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <h3>Spanish Registration</h3>
                    <span class="counter-value"><?php echo $spanish_count; ?></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter green">
                    <div class="counter-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <h3>Total Registration</h3>
                    <span class="counter-value"><?php echo $total_regis; ?></span>
                </div>
            </div>
        </div>

        <div class="row mx-5 my-5">
        <div class="col-md-3 col-sm-6">
            <div class="counter green">
                <div class="counter-icon">
                    <i class="fa fa-info-circle"></i>
                </div>
                <h3>Enquiry Forms</h3>
                <span class="counter-value"><?php echo $total_enquiry; ?></span>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-info-circle"></i>
                </div>
                <h3>Career</h3>
                <span class="counter-value"><?php echo $career; ?></span>
            </div>
        </div>
        
    </div>
    </div>
    
</div>
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('.counter-value').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            },{
                duration: 3500,
                easing: 'swing',
                step: function (now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>


</body>

</html>
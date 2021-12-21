<?php include_once'inc/head.php'; ?>
<?php

    include '../admin/connection.php';
    // include 'auth.php';    
    $conn = OpenCon();
    
    if(isset($_SESSION['email'])){
        $query = 'SELECT * FROM students where email="'.$_SESSION['email'].'"';
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                $is_pass_set = $row['is_password_set'];
                if(!$is_pass_set){
                    header("Location: password-change.php");
                }
            }else{
                header("Location: login.php");
            }
    }else{
        header("Location: login.php");
    }
?>

<link rel="stylesheet" type="text/css" href="inc/css/style.css">

<body>
    <section>

        <!-- large-screen-sidebarstarts -->
        <div class="sidebar">
            <div class="logo">
                <a class="pb-3" href="#"><h3 class="mt-4">ModernSOL</h3></a>
            </div>
            <div class="pt-3" id="sidebar-here">
               <a href="index.php" class="list active">My Course</a>
               <a href="account.php" class="list">Account</a>
           </div>
       </div>

       <!-- large-screen-sidebar-ends -->

       <!-- small-screen-sidebar starts -->
       <div class="small-screen-sidebar">
        <div id="mySidenav" class="sidenav">
           <div class="logo bg-color-sidenav">

               <!--  <a href="index.php"><img src="images/wmk-final.png" height="60" width="100"> <span class="float-right"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></span></a> -->

               <div class="d-flex bd-highlight">
                  <div class=" bd-highlight"><a href="index.php"><img src="images/wmk-final.png" height="45" width="90"></a></div>
                  <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>

              </div>

          </div>
          <div class="pt-3" id="sidebar-here">
          <a href="index.php" class="list active">My Course</a>
               <a href="account.php" class="list">Account</a>
       </div>
   </div>
</div>
<!-- large-screen-sidebar-starts -->

<div class="content">

    <?php include_once'inc/header.php'; ?>
    <div class="container py-5 wishlist">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <nav class="navbar navbar-light border venue-registration border-bottom">
                        <a class="h4 text-dark font-weight-bold pt-2"> My Course</a>
                        <form class="form-inline">

                        </form>
                    </nav>
                    <div class="card-body border-bottom py-3"> <!-- Put The Php Loop Here -->
                        <a href="" class="text-decoration-none text-dark">
                            <div class="row border-bottom">
                                <div class="col-md"><h6>Order Date : 20-2-2020</h6></div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-4 mb-3">
                                    <img src="images/bg-images.jpg">
                                </div>

                                <div class="col-md-4">
                                    <h3>Amanta Farm<span></span></h3>
                                    <p class="mb-1">Vanue Type : Villa</p>
                                    <h6><span class="badge badge-dark">5 Star</span></h6>
                                    <h5 class="text-dark">&#x20B9;25000</h5>
                                    
                                </div>

                                <div class="col-md-4">
                                    <!-- <h6 class="delete-box"><i class="far fa-trash-alt"></i> <span class="delete-box1">Delete From Wishlist</span></h6> -->
                                    <button class="btn btn-light float-right"><i class="far fa-trash-alt"></i> Delete From list</button>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
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

</body>

</html>
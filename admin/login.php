<?php
    ob_start();
    session_start();
    include 'connection.php';  
    $conn = OpenCon();
    

    if (isset($_POST['email'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['email']);
            //escapes special characters in a string
        $username = mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE email='$username'
            and password='".md5($password)."'";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        
        if($rows==1){
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
        }else{
            $_SESSION['error'] = "Email / Password does not match!";
        }
    }
?>

<?php include_once'inc/head.php'; ?>
<link rel="stylesheet" href="../bootstrap5-cdn/css/bootstrap.min.css">

    
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
.content{
    margin-left: 0px;
}
</style>

<style type="text/css">

.bg-warning{
    background-color: #ffb700!important;
}



body{
    font-family: 'Roboto Slab', serif;
}


.card-title {
    margin-bottom: 0rem;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 2rem 3.25rem;
}

.card-text{
    font-size: 12px;
}


.login_admin .navbar-brand{
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.login_admin .navbar-brand img{
    width: 65px;
}

.login_admin .navbar-brand p {
    font-size: 20px;
    margin-left: 10px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #10bcc5;
    line-height: 1.2;
}




@media (min-width: 700px){
    .open-nav
    {
        display: none;
    }


}


@media(max-width:700px){
        
.login_admin  .navbar-brand p {
    font-size: 12px;
    margin-left: 10px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #10bcc5;
    line-height: 1.2;
}


.login_admin  .navbar-brand img {
    width: 50px;
}
}

</style>

<body>

<section class="login_admin">
<div class="content">
<nav class="navbar navbar-light bg-danger    sticky-top">
    <a href="../" class="navbar-brand"><img src="../images/logo-2.png" width="50%" alt="">
    <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p>
    </a>
    <form class="form-inline">
        <div class="btn-group">
            <button type="button" class="btn btn-info text-white">
                LOGIN<span></span>
            </button>
        </div>
    </form>
</nav>

    <div class="container py-5 wishlist">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <nav class="navbar navbar-light border venue-registration border-bottom">
                        <a class="h4 text-dark font-weight-bold pt-2">Login With Email and Password</a>
                        <form class="form-inline">

                        </form>
                    </nav>
                    <div class="card-body border-bottom py-3"> <!-- Put The Php Loop Here -->
                        <form action=" " method="post" enctype="multipart/form-data">
                            <div class="row g-2 justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <img src="../images/login.svg" width="100%"  height="" alt="">
                                </div>
                            </div>
                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3 ">
                                    <div class="form-floating">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3 ">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInputGrid" placeholder="Enter Contact Number" name="email" required>
                                        <label for="floatingInputGrid">Email*</label>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingInputGrid" placeholder="Enter OTP" name="password" required>
                                        <label for="floatingInputGrid">Password*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3">
                                        <label for="floatingInputGrid">Forget Password ? <a href="password-change.php" style="text-decoration:none;">Change here</a></label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div class="">
                                        <button class="btn btn-info text-white" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="inc/js/my_script.js"></script>
</body>

</html>
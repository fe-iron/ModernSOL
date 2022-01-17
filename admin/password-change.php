<?php
include 'connection.php';
$conn = OpenCon();
session_start();

if (isset($_POST['new_p'])) {
    // removes backslashes
    $email = $_POST['email'];
    $new_p = $_POST['new_p'];
    $conf_p = $_POST['conf_p'];

    if ($conf_p == $new_p) {
        $new_p = md5($new_p);
        
        $result = mysqli_query($conn, "UPDATE admin SET password='$new_p' WHERE email='$email'");
        if ($result) {
            $_SESSION['msg'] = "Congratulations!! You have successfully changed your password";
            header("Location: login.php");
        } else {
            $_SESSION['error'] = "Password changed failed!";
        }
    } else {
        $_SESSION['error'] = "Your Passwords does not match! Try again";
    }
}
?>
<?php include_once 'inc/head.php'; ?>
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
                <a class="navbar-brand"><img src="../images/logo-2.png" width="50%" alt="">
                    <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p>
                </a>
                <form class="form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info text-white">
                            <a href="login.php" class="text-white">LOGIN</a><span></span>
                        </button>
                    </div>
                </form>
            </nav>

            <div class="container py-5 wishlist">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <nav class="navbar navbar-light border venue-registration border-bottom">
                                <a class="h4 text-dark font-weight-bold pt-2">Change your Password</a>
                                <form class="form-inline">

                                </form>
                            </nav>
                            <div class="card-body border-bottom py-3">
                                <form action=" " method="post">
                                    <div class="row g-2 justify-content-center">
                                        <div class="col-md-6 mb-3">
                                            <img src="../images/pass_change.svg" width="100%" height="" alt="">
                                        </div>
                                    </div>
                                    <div class="row g-2 justify-content-center">
                                        <div class="col-md mb-3 ">
                                            <div class="form-floating">
                                                <h4 class="mb-4 text-success"><?php
                                                                                if (isset($_SESSION['msg'])) {
                                                                                    echo $_SESSION['msg'];
                                                                                    unset($_SESSION['msg']);
                                                                                }
                                                                                ?>
                                                </h4>
                                                <h4 class="mb-4 text-danger"><?php
                                                                                if (isset($_SESSION['error'])) {
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
                                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="Enter Email Address" name="email" required>
                                                <label for="floatingInputGrid">Email*</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row g-2 justify-content-center">
                                        <div class="col-md mb-3">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingInputGrid" placeholder="Enter OTP" name="new_p" required>
                                                <label for="floatingInputGrid">New Password*</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2 justify-content-center">
                                        <div class="col-md mb-3">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingInputGrid" placeholder="Enter OTP" name="conf_p" required>
                                                <label for="floatingInputGrid">Confirm Password*</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-6 text-center">
                                            <div class="">
                                                <button class="btn btn-info text-white" type="submit">Change</button>
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
</body>

</html>
<?php include_once'inc/head.php'; ?>
<link rel="stylesheet" href="../bootstrap5-cdn/css/bootstrap.min.css">
    
<style>
.content{
    margin-left: 0px;
}
</style>
<style type="text/css">

.bg-warning{
    background-color: #ffb700!important;
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
a{
    text-decoration: none;
}


@media (min-width: 700px){
    .open-nav
    {
        display: none;
    }
}

</style>

<body>

    <section>

<div class="content">
    <nav class="navbar navbar-light bg-warning    sticky-top">
        <a class="navbar-brand"><img src="../images/new_logo-rm.png" width="30%" alt=""></a>
        <form class="form-inline">
            <div class="btn-group">
                <button type="button" class="btn btn-light">
                    <a href="login.php"> LOGIN</a><span></span>
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
                    <div class="card-body border-bottom py-3"> <!-- Put The Php Loop Here -->
                        <form action=" " method="post" enctype="multipart/form-data">
                            <div class="row g-2 justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <img src="../images/pass_change.svg" width="100%"  height="" alt="">
                                </div>
                            </div>
                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3 ">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Contact Number" name="number" required>
                                        <label for="floatingInputGrid">Old Password*</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingInputGrid" placeholder="Enter OTP" name="number" required>
                                        <label for="floatingInputGrid">New Password*</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 justify-content-center">
                                <div class="col-md mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingInputGrid" placeholder="Enter OTP" name="number" required>
                                        <label for="floatingInputGrid">Confirm Password*</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div class="">
                                        <button class="btn btn-warning text-white" type="button">Change</button>
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
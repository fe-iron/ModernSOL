<?php include_once 'inc/head.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">

<?php
    
    if(isset($_SESSION['email'])){
        $query = 'SELECT * FROM admin where email="'.$_SESSION['email'].'"';
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()){
                $photo = $row["file"];
            }
        }
    }
?>

<body>

<style type="text/css">

.bg-danger{
    background-color: #C52437!important;
}

    .card img{
        padding-top: 5px;
        height: 70px;
        width: 70px;
        margin: 0 auto;
        

    }


    .dropdown-menu .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem 3.25rem;
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


@media (min-width: 700px){
    .open-nav
    {
        display: none;
    }
}

</style>


<nav class="navbar navbar-light bg-danger  py-xl-4 py-md-4  sticky-top">
    <a class="navbar-brand"><span class="open-nav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>Dashboard</a>
    <form class="form-inline">
        <div class="btn-group">
            <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LOGOUT<span> <i class="fas fa-chevron-down "></i></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="card border-0" style="width: 18rem;">
                <?php if(!empty($photo)){?>
                    <img src="upload/admin/<?php echo $photo; ?>" class="card-img-top rounded-circle" alt="..." >
                <?php }else{ ?>
                  <img src="../images/avatar.png" class="card-img-top rounded-circle" alt="..." >
                <?php } ?>
                  <div class="card-body">
                    <h5 class="card-title text-center"><?php if(isset($_SESSION['username'])){echo $_SESSION['username']; } ?></h5>
                    <p class="card-text text-center"><?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?></p>

                    <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                  </div>
                </div>
            </div>
        </div>
    </form>
</nav>







<!-- 
    <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script> -->


<script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }





    function openLan(){
        var x = document.getElementById("open-classes");
        if(x.style.display==="none"){
            x.style.display = "block";
        }

        else{
            x.style.display = "none";
        }
    }



    function openLan1(){
        var y = document.getElementById("open-classes1");
        if(y.style.display==="none"){
            y.style.display = "block";
        }

        else{
            y.style.display = "none";
        }
    }




  </script>




</body>
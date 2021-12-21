<?php include_once 'inc/head.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">

<body>


<style type="text/css">

.bg-warning{
    background-color: #ffb700!important;
}

    .card img{
        padding-top: 5px;
        height: 50px;
        width: 55px;
        margin: 0 auto;
        

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


    <nav class="navbar navbar-light bg-warning  py-xl-4 py-md-4  sticky-top">
    <a class="navbar-brand"><span class="open-nav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>Dashboard</a>
    <form class="form-inline">
        <div class="btn-group">
            <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LOGOUT<span> <i class="fas fa-chevron-down "></i></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="card border-0" style="width: 18rem;">
                  <img src="images/naqui.png" class="card-img-top rounded-circle" alt="..." >
                 
                  <div class="card-body">
                    <h5 class="card-title text-center">Naqui Hasan</h5>
                    <p class="card-text text-center">example@gmail.com</p>

                    <a href="" class="btn btn-danger btn-block">Logout</a>
                    
                  </div>
                </div>
            </div>
        </div>
    </form>
</nav>
</body>
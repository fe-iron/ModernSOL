<style>
   .navbar {
    padding: 0.6rem 2rem;
    background-color: white;
    box-shadow: 0px 19px 46px -26px rgb(0 0 0 / 75%);
    -webkit-box-shadow: 0px 19px 46px -40px rgb(0 0 0 / 75%);
    -moz-box-shadow: 0px 19px 46px -26px rgba(0,0,0,0.75);
    color: black;
}


.navbar-light .navbar-nav .nav-link {
    color: rgb(145 144 141);
    font-weight: bold;
    letter-spacing: .4px;
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1rem;
    clear: both;
    font-weight: 600;
    color: #8d8b88;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}

.dropdown-menu {
    position: absolute;
    z-index: 1000;
    display: none;
    min-width: 10rem;
    padding: 0rem 0;
    margin: 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgb(255 255 255 / 15%);
    border-radius: 0rem;
}

.dropdown-menu img{
  width: 17px;
  margin-right: 5px;
}

.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
    color: rgb(255 183 0);
}

.dropdown-item:focus, .dropdown-item:hover {
    color: #ffffff;
    background-color: #ffb700;
    font-weight: bold;
    letter-spacing: .4px;
}

.navbar-brand h3{
  
  font-weight:600;
  color: #ed078b;

}


.navbar-brand img{
  width: 160px;
}

.navbar-text {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    /* padding-left: 1.3rem; */
}

/* .bg-light {
    --bs-bg-opacity: 1;
 --bs-light-rgb: none;
} */

.btn-info {
  
    background-color: #0099ff;
    border-color: #0099ff;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight:600;
    
}




@media(max-width:768px){
  .navbar{
      padding: 0.6rem 0rem;
    }
}



@media(min-width:992px){
  .navbar-text {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 1.3rem;
}

}



</style>





<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="images/new_logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      <ul class="navbar-nav   mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="about.php">  About Us</a></li>
            <li><a class="dropdown-item" href="why_learn_with_us.php">  Why Learn With Us</a></li>
            <li><a class="dropdown-item" href="course_detail.php">  Course Details</a></li>
            <li><a class="dropdown-item" href="mission.php">  Mission</a></li>
            <li><a class="dropdown-item" href="methodology.php"> Our Methodology</a></li>
            <li><a class="dropdown-item" href="faq.php"> FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Languages
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="french.php"> <img src="images/french-logo.png" alt=""> French</a></li>
            <li><a class="dropdown-item" href="german.php"> <img src="images/germen-logo.png" alt=""> Germen</a></li>
            <li><a class="dropdown-item" href="spanish.php"> <img src="images/spanish-logo.png" alt=""> Spanish</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="ile.php"> International language exams </a></li>
            <li><a class="dropdown-item" href="lang_level_test.php"> Language Level Test</a></li>
            <li><a class="dropdown-item" href="private_tution.php">Private Tuition</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="register.php" class="btn btn-dark text-white">Register!!</a>
      </span>
    </div>
  </div>
</nav>
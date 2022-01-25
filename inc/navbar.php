<style>
   .navbar {
    padding: 0.6rem 2rem;
    background-color: white;
    -webkit-box-shadow: 0px -2px 14px -4px rgb(173 163 173);
-moz-box-shadow: 0px -2px 14px -4px rgb(173 163 173);
box-shadow: 0px -2px 14px -4px rgb(173 163 173);
    color: black;
}


.navbar-light .navbar-nav .nav-link {
    color: black;
    font-weight: bold;
    letter-spacing: .4px;
    text-transform: uppercase;
}


.navbar-brand{
  display: flex;
  align-items: center;
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
    text-transform: uppercase;
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
    color: rgb(177 80 80);
}
.dropdown-item:focus, .dropdown-item:hover {
    color: #ffffff;
    background-color: #c52437;
    font-weight: bold;
    letter-spacing: .4px;
}

.navbar-brand h3{
  
  font-weight:600;
  color: #ed078b;

}


.navbar-brand img{
  width: 65px;
}


.navbar-brand p {
    font-size: 20px;
    margin-left: 10px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #10bcc5;
    line-height: 1.2;
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
    background-color: #10bcc5;
    border-color: #10bcc5;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    letter-spacing: 1.5px;
}




@media(max-width:768px){
  .navbar{
      padding: 0.6rem 0rem;
    }
}


@media(max-width:576px){

  .navbar-brand img{
       width: 50px;
  }
  .navbar-brand p {
    font-size: 12px;
    margin-left: 10px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #10bcc5;
    line-height: 1.2;
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
    <a class="navbar-brand" href="/">
      <img src="images/logo-2.png" alt="">
      <div>
        <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES <br></p>
        <p style="font-size: 10px;margin-bottom:0rem;color:grey;">An ISO 9001:2015 Certified Institute</p>
      </div>
    </a>
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
            <li><a class="dropdown-item" href="german.php"> <img src="images/germen-logo.png" alt=""> German</a></li>
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
          <a class="nav-link" href="career.php">Career</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="register.php" class="btn btn-info text-white">REGISTER</a>
      </span>
      <span class="navbar-text">
        <a href="user-profile/" class="btn btn-info text-white">LOGIN</a>
      </span>
    </div>
  </div>
</nav>
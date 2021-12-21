<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');


h1,h2,h3,h4,h5,h6{
  font-family: 'Roboto', sans-serif;
}

p,a,label,.accordion-body{
  font-family: 'Open Sans', sans-serif;
}


.top-header{
       background-color:#ffb700;
       padding: 0rem 1rem;
      
 }

.personal-info .nav-link{
  color: white;
  font-size: 16px;
  
}


.personal-info img, .social-links img{
   height:20px;
}

@media(max-width:768px){
  .social-links{
    display: none;
  }

  .personal-info .nav-link {
    color: white;
    font-size: 14px;
}
.top-header{
       background-color:#ffb700;
       padding: 0rem .5rem;
      
 }

 .top-header .nav-link {
    display: block;
    padding: 0.5rem 0.5rem;
    color: white;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
}

}


</style>


<section class="top-header">
  <div class="container-fluid">
    <div class="row">
			<div class="col-lg-9 col-md-9 col-12 personal-info">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="tel:9431204127"><img src="images/call-24.png" alt="call-icon"> <span class="pl-2"> +919717071885</span> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="mailto:info@modernsol.in"><img src="images/gmail-24.png" alt="call-icon"> <span class="pl-2"> info@modernsol.in</span></a>
					</li>

				</ul>
			</div>
      <div class="col-lg-3 col-md-3  social-links">
				<ul class="nav justify-content-end">
					<li class="nav-item facebook">
						<a class="nav-link" href="#"><img src="images/facebook-30.png" alt="facebook-icon"></a>
					</li>
					<li class="nav-item instagram">
						<a class="nav-link" href="#"><img src="images/instagram-24.png" alt="instagram-icon"></a>
					</li>
					<li class="nav-item twitter">
						<a class="nav-link" href="#"><img src="images/twitter-30.png" alt="twiiter-icon"></a>
					</li>

				</ul>
			</div>
		</div>
  </div>
</section>



<!-- <section class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      <ul class="navbar-nav   mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Departments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Memberships</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="" class="btn btn-outline-info">Sign In</a>
      </span>
    </div>
  </div>
</nav>
</section> -->
<style>

/* @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap'); */
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
/* @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); */


h1,h2,h3,h4,h5,h6{
  /* font-family: 'Roboto', sans-serif; */
  font-family: 'Roboto Slab', serif;
  /* font-family: 'Montserrat', sans-serif; */
}

p,a,label,.accordion-body, option{
  /* font-family: 'Open Sans', sans-serif; */
  font-family: 'Roboto Slab', serif;
  /* font-family: 'Montserrat', sans-serif; */
}

.welcome p , .about_content p, 
.mission_vision p,.methodology p, 
.accordion-body, .french_content p, 
.why_learn_french_content
p, .german_content p, .why-learn-german-content p, 
.spanish_content p, .why-learn-spanish-content p, 
.career_job p, .scop p, .mission_vision_inner p , .language_proficiency .card-header p{
 text-align: justify;
}




::placeholder{
  font-family: 'Roboto Slab', serif;
}

::selection {
    color: white;
		background: #31d2f2;
		/* WebKit/Blink Browsers */
	}

	::-moz-selection {
    color: white;
		background:#31d2f2;
		/* Gecko Browsers */
	}


  .form-control {
    display: block;
    width: 100%;
    padding: 0.8rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #10bcc5;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.form-select {
    display: block;
    width: 100%;
    padding: 0.795rem 2.25rem 0.795rem 0.75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #080808;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid #10bcc5;
    border-radius: 0rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.line_1{
  background-color: white;
  width: 100%;
  height: 2px;
}

.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #c52437;
    outline: 0;
    box-shadow: none;
}
.top-header{
       /* background-color:#ffb700; */
       background-color: #C52437;
       padding: 0rem 1rem;
      
 }

 .top-header .nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    
}

.personal-info .nav-link{
  color: white;
  font-size: 16px;
  
}


.personal-info img, .social-links img{
   height:20px;
}

#rupee:hover{
  color: blue!important;
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
  background-color: #C52437;
       padding: 0rem .5rem;
      
 }

 .top-header .nav-link {
    display: block;
    padding: 0.5rem 0rem;
    color: white;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
}

}

@media (max-width:576px){
  .top-header .nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
    justify-content: space-between;
}
}


</style>


<section class="top-header">
  <div class="container-fluid">
    <div class="row">
			<div class="col-lg-9 col-md-9 col-12 personal-info">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="tel:+919717071885"><img src="images/call-24.png" alt="call-icon"> <span class="pl-2"> +919717071885</span> </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="mailto:info@modernsol.in"><img src="images/gmail-24.png" alt="call-icon"> <span class="pl-2"> info@modernsol.in</span></a>
					</li>

				</ul>
			</div>
      <div class="col-lg-3 col-md-3  social-links">
				<ul class="nav justify-content-end">
          <li class="nav-item">
						<a class="nav-link" href="https://www.facebook.com/modernschooloflanguage/" target="_blank" style="color: white;" id="rupee" data-bs-toggle="modal" data-bs-target="#pay_now"><img src="images/icons/rupee.png" alt="payment-icon"> Pay Now</a>
					</li>
          <li class="nav-item facebook">
						<a class="nav-link" href="https://www.facebook.com/modernschooloflanguage/" target="_blank"><img src="images/facebook-30.png" alt="facebook-icon"></a>
					</li>
					<li class="nav-item instagram">
						<a class="nav-link" href="https://www.instagram.com/modernschooloflanguages/?utm_medium=copy_link" target="_blank"><img src="images/instagram-24.png" alt="instagram-icon"></a>
					</li>
					<li class="nav-item twitter">
						<a class="nav-link" href="https://twitter.com/Modernsol1" target="_blank"><img src="images/twitter-30.png" alt="twiiter-icon"></a>
					</li>

				</ul>
			</div>
		</div>
  </div>
</section>
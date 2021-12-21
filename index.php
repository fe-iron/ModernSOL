<?php include_once 'inc/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MSOL</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php include_once 'inc/header.php'; ?>
  <?php include_once 'inc/navbar.php'; ?>



  <section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/slider-1.png" class="d-block w-100" alt="slaider 1" class="img-fluid">
          <div class="carousel-caption">
            <h2>MODERN SCHOOL OF LANGUAGES</h2><br>
            <p>Learn a new language of your choice from the comfort of your home.</p><br>
            <a href="register.php" class="btn btn-outline-warning">Register Now!</a>

          </div>
        </div>
        <div class="carousel-item">
          <img src="images/slider-2.jpg" class="d-block w-100" alt="slider 2" class="img-fluid">
          <div class="carousel-caption">
            <h2>MODERN SCHOOL OF LANGUAGES</h2><br>
            <p>Learn a new language of your choice from the comfort of your home.</p><br>
            <a href="register.php" class="btn btn-outline-warning">Register Now!</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/slider-3.jpg " class="d-block w-100" alt="slider 3" class="img-fluid">
          <div class="carousel-caption">
            <h2>MODERN SCHOOL OF LANGUAGES</h2><br>
            <p>Learn a new language of your choice from the comfort of your home.</p><br>
            <a href="register.php" class="btn btn-outline-warning">Register Now!</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <section class="welcome">
    <div class="container">
      <div class="row">
        <div class="col-md mb-3">
          <h4 class="mb-1">Welcome To Modern School Of Languages</h4>
          <p>Learn a new language of your choice from the comfort of your home.</p>
          <p>At Modern School of Languages, Our aim is to provide you with the best possible learning environment at our school. Our team boasts of rich and varied experience in evolving the face of education at school and collegiate level. SOL is led by a group of young as well as experienced industry expert and teachers. The team is well equipped by research, IT infrastructure, product’s knowledge and domain expertise. We at MSOL, keep ourselves familiar and updated with the needs, demands and practices of education at large. </p>
          <p>We offer comprehensive online and offline Spanish, German and French classes focusing on more than just grammar and vocabulary. Our languages courses cover useful topics like ‘Life abroad’ so you can learn to speak confidently in any situation. </p>
        </div>
        <div class="col-md">
          <h4 class="mb-3">Fill Enquiry Form</h4>
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Your Name *</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Your Contact Number*</label>
              <input type="tel" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Your City*</label>
              <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Query*</label>
              <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-warning btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="languages-logo">
    <h2 class="text-center mb-1">Languages We Taught</h2>
    <p class="text-center mb-4 text-yellow">Learn a new language of your choice from the comfort of your home.</p>
    <div class="container">
      <div class="row">
        <div class="col-md mb-3">
          <a href="german.php">
          <div class="card">
            <img src="images/germen-logo.png" alt="germen logo">
            <div class="card-body">
              <h5>German Language Course</h5>
              <p>German is one of the major languages of the world. It is the most spoken native language within the European Union.Germen language is mainly spkoken in central Europe.</p>
            </div>
          </div>
          </a>
        </div>
        <div class="col-md mb-3">
          <a href="french.php">
          <div class="card">
            <img src="images/french-logo.png" alt="french logo">
            <div class="card-body">
              <h5>French Language Course</h5>
              <p>French is an official language in 29 countries across multiple continents. A French-speaking person or nation may be referred to as Francophone in both English and French</p>
            </div>
          </div>
          </a>
        </div>
        <div class="col-md mb-3">
           <a href="spanish.php">
           <div class="card">
            <img src="images/spanish-logo.png" alt="spanish logo">
            <div class="card-body">
              <h5>Spanish Language Course</h5>
              <p>Spanish is a language spoken by well over 400 million native speakers. And Spanish is spoken by 500 million people worldwide. It is third most spoken language</p>
            </div>
          </div>
           </a>
        </div>
      </div>
    </div>
  </section>


  <section class="why-learn">
    <div class="container">
      <h2 class="text-center mb-1">Why Learn With Us?</h2>
        <p class="text-center mb-4 text-yellow">We Give You the Reason to Learn Languages With Us</p>
      <div class="Clients">
        <div class="">
          <div class="owl-carousel owl-theme">
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images1.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>Learn from the best</h5>
                  <p>Qualified and experienced teachers leading your class</p>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images2.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>Small groups or private classes</h5>
                  <p>8 to 10 students so you can practice speaking and get feedback</p>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images3.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>Levels and Schedule</h5>
                  <p>A1 to C2 (Weekdays and Weekends)</p>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images4.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>Young or Adults</h5>
                  <p>Available for adults or juniors</p>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images5.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>LQuick Progress</h5>
                  <p>Taught with a communicative and interactive approach</p>
                </div>
              </div>
            </div>
            <div class="testimonial">
              <div class="card">
                <img src="images/learn-images6.jpg" alt="" class="mt-3">
                <div class="card-body">
                  <h5>Free class material</h5>
                  <p>Provided learning materials free</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include_once 'inc/footer.php'; ?>




  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="owl-carousel/owl.carousel.min.js"></script>

  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })
  </script>

</body>

</html>
<?php 
  session_start();
  include_once 'inc/head.php';
  include 'admin/connection.php';
  $conn = OpenCon();

  function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName){ 
    // Sender info  
    $from = $senderName." <".$senderEmail.">";  
    $headers = "From: $from"; 

    // It is mandatory to set the content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $returnpath = "-f" . $senderEmail; 
    
    // Send email 
    $mail = mail($to, $subject, $message, $headers, $returnpath);  
    
    // Return true if email sent, otherwise return false 
    if($mail){ 
       return true; 
    }else{ 
       return false; 
    } 
  }

  if(isset($_POST['enquiry'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if($course == "1" || $course == "4"){
        $course = "german";
    }else if($course == "2" || $course == "5"){
      $course = "french";
    }else if($course == "3" || $course == "6"){
      $course = "spanish";
    }

    if(isset($_POST['german_course'])){
      $g_level = $_POST['german_course']; 
    }else{
        $g_level = "";
    }
    
    if(isset($_POST['spanish_course'])){
        $s_level = $_POST['spanish_course'];
    }else{
        $s_level = "";
    }

    if(isset($_POST['french_course'])){
        $f_level = $_POST['french_course'];
    }else{
        $f_level = "";
    }
    
    $query = "INSERT into `enquiry_form` (name, number, email, course, g_level, f_level, s_level) 
                VALUES ('$name', '$number', '$email', '$course', '$g_level', '$f_level', '$s_level')";

    if($conn->query($query) === TRUE){
        
        // Email configuration 
        $to = $email;
        $from = 'info@modernsol.in';
        $fromName = 'Modern School Of Languages(SOL)'; 
        
        $subject = 'Thank you for Filling Enquiry Form with Modern SOL';  
        
        $htmlContent = ' 
            <center><h3>Thanks for Enquiry with Modern School of Languages</h3></center><hr/>
            <h4>These are the details that you have shared with us.</h4> <hr/>
            <p><b>Full Name:</b> '.$name.'</p>
            <p><b>Mobile Number:</b> '.$number.'</p>
            <p><b>Email:</b> '.$email.'</p>
            <p><b>Course:</b> '.$course.'</p>';
        if($s_level != ""){
          $htmlContent = $htmlContent . '<p><b>Spanish Level:</b> '.$s_level.'</p>';
        }else if($g_level != ""){
          $htmlContent = $htmlContent . '<p><b>German Level:</b> '.$g_level.'</p>';
        }else{
          $htmlContent = $htmlContent . '<p><b>French Level:</b> '.$f_level.'</p>';
        }
        
        // Call function and pass the required arguments 
        $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName); 
        $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
        
        // Email sending status 
        if($sendEmail){ 
            $_SESSION['msg'] = "Successfully saved your Form! and check your inbox/Spam for the confirmation mail.";
        }else{
            $_SESSION['msg'] = "Successfully saved your Form! and Email sending failed!";
        }
    }else{
        // echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION['error'] = "Form submission Failed! Try Again";
    }
  }

  // For free trials
  if(isset($_POST['free_trials'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    
    
    $query = "INSERT into `free_trials` (name, number, email) 
                VALUES ('$name', '$number', '$email')";

    if($conn->query($query) === TRUE){
        
        // Email configuration 
        $to = $email;
        $from = 'info@modernsol.in';
        $fromName = 'Modern School of Languages(SOL)'; 
        
        $subject = 'Thank you for registration for Free Trial with Modern SOL';  
        
        $htmlContent = ' 
            <center><h3>Thanks for Registration for the free trial with Modern School of Languages</h3></center><hr/>
            <h4>These are the details that you have shared with us.</h4> <hr/>
            <p><b>Full Name:</b> '.$name.'</p>
            <p><b>Mobile Number:</b> '.$number.'</p>
            <p><b>Email:</b> '.$email.'</p>';
        
        // Call function and pass the required arguments 
        $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName); 
        $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
        
        // Email sending status 
        if($sendEmail){ 
            $_SESSION['msg'] = "Successfully saved your Trial Form! and check your inbox/Spam for the confirmation mail.";
        }else{
            $_SESSION['msg'] = "Successfully saved your Trial Form! and Email sending failed!";
        }
    }else{
        echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION['error'] = "Form submission Failed! Try Again";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MSOL || Home</title>
  
</head>

<body>
  <?php include_once 'inc/header.php'; ?>
  <?php include_once 'inc/navbar.php'; ?>



  <section class="top-carousel">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/german-picture.jpg" class="d-block w-100" alt="slider 1" class="img-fluid">
          <div class="carousel-caption">
            <p>Learn a language of your choice from the comfort of your home.</p><br>
            <a href="#" class="btn btn-outline-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal1">BOOK FREE TRIAL</a>
            <a href="register.php" class="btn btn-outline-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">DOWNLOAD BROCHURE</a>

          </div>
        </div>
        <div class="carousel-item">
          <img src="images/sagrada-familia.jpg" class="d-block w-100" alt="slider 2" class="img-fluid">
          <div class="carousel-caption">
            <p>Learn a language of your choice from the comfort of your home.</p><br>
            <a href="#course" class="btn btn-outline-info text-white">Online Course</a>

          </div>
        </div>
        <div class="carousel-item">
          <img src="images/eiffel.jpg" class="d-block w-100" alt="slider 3" class="img-fluid">
          <div class="carousel-caption">
            <p>Learn a language of your choice from the comfort of your home.</p><br>
            <a href="#course" class="btn btn-outline-info text-white">Online Course</a>

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
          <p>Learn a language of your choice from the comfort of your home.</p>
          <p class="text-bs-justify">At Modern School of Languages, Our aim is to provide you with the best possible learning environment at our school. Our team boasts of rich and varied experience in evolving the face of education at school and collegiate level. MSOL is led by a group of young as well as experienced industry expert and teachers. The team is well equipped by research, IT infrastructure, product’s knowledge and domain expertise. We at MSOL, keep ourselves familiar and updated with the needs, demands and practices of education at large. </p>
          <p>We offer comprehensive online and offline Spanish, German and French classes focusing on more than just grammar and vocabulary. Our languages courses cover useful topics like ‘Life abroad’ so you can learn to speak confidently in any situation. </p>
          <!-- <p>don Quijote has always been committed to ensure our students' health and safety. After drafting and implementing a safety and hygiene protocol, all our classes and courses are back to normal since last June 29th.</p> -->
        </div>
        <div class="col-md">
          <h4 class="mb-3">Fill Enquiry Form</h4>
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
          <form action=" " method="post">
            <div class="form-row">
              <div class="col mb-3">
                <input type="text" class="form-control name" placeholder="Enter Your Name *" name="name" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <input type="tel" class="form-control phone" placeholder="Enter Phone Number *" name="number" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <input type="email" class="form-control email" placeholder="Enter Email Id *" name="email" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="course" onchange="showDiv(this)">
                  <option selected>Select Course</option>
                  <option value="1">German</option>
                  <option value="2">French</option>
                  <option value="3">Spanish</option>
                </select>
              </div>
            </div>

            <div class="form-row" id="german" style="display:none;">
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="german_course">
                    <option selected="selected" value="none">Select Germen Level</option>
                    <option value="German  - A1 (Beginner)">German  - A1 (Beginner)</option>
                    <option value="German - A2  (Elementary)">German - A2  (Elementary)</option>
                    <option value="German - B1 (Intermediate)">German - B1 (Intermediate)</option>
                    <option value="German – B2 (Upper intermediate)">German – B2 (Upper intermediate)</option>
                    <option value="German- A1+A2 (Internship Oriented)">German- A1+A2 (Internship Oriented)</option>
                    <option value="German B1+B2 (Job Oriented)">German B1+B2 (Job Oriented)</option>
                    <option value="German A1+A2+B1+B2">German A1+A2+B1+B2</option>
                    <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                    <option value="German Spoken Course">German Spoken Course </option>
                    <option value="Private Tuition">Private Tution </option>
                    <option value="Zertifikat Deutsch Preparation Course">Zertifikat Deutsch Preparation Course</option>
              </select>
            </div>

            <div class="form-row" id="french" style="display:none;">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="french_course">
                <option selected="selected" value="none">Select French Level</option>
                <option value="French  - A1 (Beginner)">French  - A1 (Beginner)</option>
                <option value="French - A2  (Elementary)">French - A2  (Elementary)</option>
                <option value="French - B1 (Intermediate)">French - B1 (Intermediate)</option>
                <option value="French – B2 (Upper intermediate)">French – B2 (Upper intermediate)</option>
                <option value="French- A1+A2 (Internship Oriented)">French- A1+A2 (Internship Oriented)</option>
                <option value="French B1+B2 (Job Oriented)">French B1+B2 (Job Oriented)</option>
                <option value="French A1+A2+B1+B2">French A1+A2+B1+B2</option>
                <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                <option value="French Spoken Course">French Spoken Course </option>
                <option value="Private Tuition">Private Tution </option>
                <option value="DELF Preparation Course">DELF Preparation Course</option>
            </select>
            </div>

            <div class="form-row" id="spanish" style="display:none;">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="spanish_course">
                  <option selected="selected" value="none">Select Spanish Level</option>
                  <option value="Spanish  - A1 (Beginner)">Spanish  - A1 (Beginner)</option>
                  <option value="Spanish - A2  (Elementary)">Spanish - A2  (Elementary)</option>
                  <option value="Spanish - B1 (Intermediate)">Spanish - B1 (Intermediate)</option>
                  <option value="Spanish – B2 (Upper intermediate)">Spanish – B2 (Upper intermediate)</option>
                  <option value="Spanish- A1+A2 (Internship Oriented)">Spanish- A1+A2 (Internship Oriented)</option>
                  <option value="Spanish B1+B2 (Job Oriented)">Spanish B1+B2 (Job Oriented)</option>
                  <option value="Spanish A1+A2+B1+B2">Spanish A1+A2+B1+B2</option>
                  <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                  <option value="Spanish Spoken Course">Spanish Spoken Course </option>
                  <option value="DELE Preparation Course">DELE Preparation Course</option>
                  <option value="Private Tuition">Private Tution </option>
                  <option value="SIELE Preparation Course">SIELE Preparation Course </option>
              </select>
            </div>

            <div class="form-row">
              <div class="col mb-2">
                <input type="submit" name="enquiry" value="Submit" class="btn btn-info text-white btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="languages-logo" id="course">
    <h2 class="text-center mb-1 text-white">Our Language Courses</h2>
    <p class="text-center mb-4 text-white">Learn a language of your choice from the comfort of your home.</p>
    <div class="container">
      <div class="row">
        <div class="col-md mb-3">
          <a href="german.php">
            <div class="card german">
              <img src="images/germen-logo.png" alt="germen logo">
              <div class="card-body">
                <h5>German Language Course</h5>
                <p class="text-white">German is one of the major languages of the world. It is the most spoken native language within the European Union.Germen language is mainly spkoken in central Europe.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md mb-3">
          <a href="french.php">
            <div class="card french">
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
            <div class="card spanish">
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
                  <p>6 to 8 students so you can practice speaking and get feedback</p>
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
                  <h5>Quick Progress</h5>
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


  <section class="student_testimonials pt-3 pb-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h2 class="">What Our Students Say</h2>
        </div>
      </div>
      <div class="row align-items-md-center text-white">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="carouselExampleCaptions" class="carousel slide"  data-interval="100" data-bs-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">The best thing about the course was the worksheets and assignments given by our teacher, which gave us the confidence to get a hang of the language. I would certainly recommend the course to others as well.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-9.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Aastha Chaturvedi</strong></h4>
                      <p class="testimonial_subtitle"><span>Research Analyst at WNS</span><br>
                        <span></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">The overall experience of learning a third language was very nice. Our instructor was very flexible and cooperative. Keeping in mind how difficult it is to catch a new language, the course, syllabus as well as our teacher made sure that we are comfortable and helped us progress slowly and confidently. I would definitely recommend this course to any other person who keeps a keen interest in learning a new language.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-1.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Rashika</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">Our professor was very patient with us while teaching the language as we had very silly doubts. It was a great experience and I would definitely recommend others to enroll.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-2.png" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>AVNI GINNARE</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">It's a fantastic course for beginners in Spanish language. Ones who are willing to learn would enjoy the expertise of the instructor. I will definitely recommend this course.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-3.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Raghav Sindhwani</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">The best thing about the course is the regular speaking practice sessions and extra doubt class that has helped us improve a lot.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-4.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Swarnali Nag</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">I loved how organised and planned the course was. The material was concise and helpful. The faculty was patient and understanding, and helped in providing a holistic learning experience.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-5.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>ROSHNEET KAUR</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">Great experience, Yeah I will highly recommend others to join the course.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-6.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Jeevesh Sahni</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">Spanish language is the best language it has a very good accent.its not that hard to learn.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-7.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Prashant Mishra</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="row p-4">
                  <div class="t-card">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p class="lh-lg mb-0">Yes, I would recommend the course as it was very interactive.</p>
                    <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-xs-12 pt-3 text-center img-part">
                      <div class="img-box mb-3">
                        <img src="images/student-testimonial/st-8.jpg" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-12 text-part">
                      <div class="arrow-down d-none d-lg-block"></div>
                      <h4 class="mt-3"><strong>Jyotsna Gupta</strong></h4>
                      <p class="testimonial_subtitle"><span>Student</span><br>
                        <!-- <span>Artc Cafe</span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="controls push-right">
            <a href="#carouselExampleCaptions" data-bs-slide="prev">
            <img src="images/icons/left.png" alt="left-arrow">
            </a>
            <a href="#carouselExampleCaptions" data-bs-slide="next">
            <img src="images/icons/right.png" alt="right-arrow">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include_once 'inc/footer.php'; ?>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Download Brochure</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action=" " method="post">
            <div class="form-row">
              <div class="col mb-3">
                <input type="text" class="form-control name" placeholder="Enter Your Name *" name="name" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <input type="tel" class="form-control phone" placeholder="Enter Phone Number *" name="number" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <input type="email" class="form-control email" placeholder="Enter Email Id *" name="email" required="" />
              </div>
            </div>
            <div class="form-row">
              <div class="col mb-3">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="course" onchange="showDiv1(this)">
                  <option selected>Select Course</option>
                  <option value="4">German</option>
                  <option value="5">French</option>
                  <option value="6">Spanish</option>
                </select>
              </div>
            </div>

            <div class="form-row" id="german1" style="display:none;">
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="german_course">
                <option selected="selected" value="none">Select Germen Level</option>
                    <option value="German  - A1 (Beginner)">German  - A1 (Beginner)</option>
                    <option value="German - A2  (Elementary)">German - A2  (Elementary)</option>
                    <option value="German - B1 (Intermediate)">German - B1 (Intermediate)</option>
                    <option value="German – B2 (Upper intermediate)">German – B2 (Upper intermediate)</option>
                    <option value="German- A1+A2 (Internship Oriented)">German- A1+A2 (Internship Oriented)</option>
                    <option value="German B1+B2 (Job Oriented)">German B1+B2 (Job Oriented)</option>
                    <option value="German A1+A2+B1+B2">German A1+A2+B1+B2</option>
                    <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                    <option value="German Spoken Course">German Spoken Course </option>
                    <option value="Private Tuition">Private Tution </option>
                    <option value="Zertifikat Deutsch Preparation Course">Zertifikat Deutsch Preparation Course</option>
              </select>
            </div>

            <div class="form-row" id="french1" style="display:none;">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="french_course">
                <option selected="selected" value="none">Select French Level</option>
                <option value="French  - A1 (Beginner)">French  - A1 (Beginner)</option>
                <option value="French - A2  (Elementary)">French - A2  (Elementary)</option>
                <option value="French - B1 (Intermediate)">French - B1 (Intermediate)</option>
                <option value="French – B2 (Upper intermediate)">French – B2 (Upper intermediate)</option>
                <option value="French- A1+A2 (Internship Oriented)">French- A1+A2 (Internship Oriented)</option>
                <option value="French B1+B2 (Job Oriented)">French B1+B2 (Job Oriented)</option>
                <option value="French A1+A2+B1+B2">French A1+A2+B1+B2</option>
                <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                <option value="French Spoken Course">French Spoken Course </option>
                <option value="Private Tuition">Private Tution </option>
                <option value="DELF Preparation Course">DELF Preparation Course</option>
            </select>
            </div>

            <div class="form-row" id="spanish1" style="display:none;">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="spanish_course">
            <option selected="selected" value="none">Select Spanish Level</option>
                <option value="Spanish  - A1 (Beginner)">Spanish  - A1 (Beginner)</option>
                <option value="Spanish - A2  (Elementary)">Spanish - A2  (Elementary)</option>
                <option value="Spanish - B1 (Intermediate)">Spanish - B1 (Intermediate)</option>
                <option value="Spanish – B2 (Upper intermediate)">Spanish – B2 (Upper intermediate)</option>
                <option value="Spanish- A1+A2 (Internship Oriented)">Spanish- A1+A2 (Internship Oriented)</option>
                <option value="Spanish B1+B2 (Job Oriented)">Spanish B1+B2 (Job Oriented)</option>
                <option value="Spanish A1+A2+B1+B2">Spanish A1+A2+B1+B2</option>
                <option value="Intensive Advanced Diploma">Intensive Advanced Diploma</option>
                <option value="Spanish Spoken Course">Spanish Spoken Course </option>
                <option value="DELE Preparation Course">DELE Preparation Course</option>
                <option value="Private Tuition">Private Tution </option>
                <option value="SIELE Preparation Course">SIELE Preparation Course </option>
            </select>
            </div>

            <div class="form-row">
              <div class="col mb-2">
                <input type="submit" name="enquiry" value="Submit" class="btn btn-info text-white btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade bookfreetrial" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Free Trial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action=" " method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Your Name *</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Your Contact Number*</label>
              <input type="tel" class="form-control" id="exampleInputPassword1" name="number" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Your Email*</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-info text-white btn-block" name="free_trials">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  
  <script src="owl-carousel/owl.carousel.min.js"></script>
  

  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
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


  <script>
    $(function() {
      if (localStorage.getItem('seen') != (new Date()).getDate()) {
        setTimeout(showpanel, 4000);
      }
    });

    function showpanel() {
      $('.reveal-modal').reveal({
        animation: 'fade',
        animationspeed: 800
      });

      localStorage.setItem('seen', (new Date()).getDate());
    }
  </script>

  <script type="text/javascript">
    function showDiv(select) {
      if (select.value == 1) {
        document.getElementById('german').style.display = "block";
      } else {
        document.getElementById('german').style.display = "none";
      }



      if (select.value == 2) {
        document.getElementById('french').style.display = "block";
      } else {
        document.getElementById('french').style.display = "none";
      }


      if (select.value == 3) {
        document.getElementById('spanish').style.display = "block";
      } else {
        document.getElementById('spanish').style.display = "none";
      }

    }


    function showDiv1(select) {
      if (select.value == 4) {
        document.getElementById('german1').style.display = "block";
      } else {
        document.getElementById('german1').style.display = "none";
      }



      if (select.value == 5) {
        document.getElementById('french1').style.display = "block";
      } else {
        document.getElementById('french1').style.display = "none";
      }


      if (select.value == 6) {
        document.getElementById('spanish1').style.display = "block";
      } else {
        document.getElementById('spanish1').style.display = "none";
      }

    }
  </script>



</body>

</html>
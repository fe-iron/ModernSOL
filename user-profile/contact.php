<?php 
    session_start();
    include 'auth.php';
    include_once'inc/head.php'; ?>

<?php
  include '../admin/connection.php';
  $conn = OpenCon();

  function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName){ 
        // Sender info  
        $from = $senderName." <".$senderEmail.">";  
        $headers = "From: $from"; 

        // Boundary  
        $semi_rand = md5(time());  
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
        
        // Headers for attachment  
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  

        // Multipart boundary  
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  

        
        $message .= "--{$mime_boundary}--"; 
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



  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $query = $_POST['query'];
        
    $query = "INSERT INTO student_contact (name, number, email, course, query)
                VALUES ('$name', '$number', '$email', '$course', '$query')";

    $result = $conn->query($query);
    if ($result) {
        $_SESSION['msg'] = "Successfully submitted your query, we'll get back to you soon!";
        $to = $email; 
        $from = 'info@modernsol.in';
        $fromName = 'Modern School Of Languages(MSOL)'; 
        
        $subject = 'Thank you for contacting Modern SOL';  
        
        $htmlContent = ' 
            <center><h3>We will be very happy to resolve your query as soon as possible</h3></center><hr/>
            <h4>These are the details that you have shared with us.</h4> <hr/>
            <p><b>Full Name:</b> '.$name.'</p>
            <p><b>Mobile Number:</b> '.$number.'</p>
            <p><b>Email:</b> '.$email.'</p>
            <p><b>Course:</b> '.$course.'</p>
            <p><b>Your Query:</b> '.$query.'</p>';

        // Call function and pass the required arguments 
        $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName); 
        $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName); 
    } else {
        $_SESSION['error'] = "Submission failed! Try again";
    }
  }

?>
<link rel="stylesheet" type="text/css" href="inc/css/style.css">

<body>

  <section>
    <!-- large-screen-sidebarstarts -->
    <div class="sidebar">
    <div class="logo">
            <a class="navbar-brand" href="index.php">
                <img src="../images/logo-2.png" alt="">
            <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
            </div>
      <div class="pt-3">
        <div class="pt-3">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list">Profile</a>
          <a href="contact.php" class="list active">Contact Us</a>
        </div>
      </div>
    </div>

    <!-- large-screen-sidebar-ends -->





    <!-- small-screen-sidebar starts -->
    <div class="small-screen-sidebar">
      <div id="mySidenav" class="sidenav">
      <div class="logo-small bg-color-sidenav">
            <div class="d-flex bd-highlight">
                <div class=" bd-highlight">
                    <a href="index.php" class="small-sidenavbar">
                    <img src="../images/logo-2.png">
                    <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
                </a>
                </div>
                <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
            </div>
            </div>
        <div class="pt-3" id="sidebar-here">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list">Profile</a>
          <a href="contact.php" class="list active">Contact Us</a>
        </div>
      </div>
    </div>
    <!-- large-screen-sidebar-starts -->


    <div class="content">

      <?php include_once 'inc/header.php'; ?>

      <div class="container py-5 personal-inforamtion">


        <div class="row justify-content-center">
          <div class="col-md-10">
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
            <div class="card shadow">
              <nav class="navbar navbar-light border personal-detail">
                <a class="h4 text-danger font-weight-bold pt-2">Contact Us</a>
              </nav>
              <div class="card-body">
                <form action=" " method="post">
                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Full Name</label>
                      <input type="text" class="form-control" placeholder="Full Name" 
                        value="<?php 
                            if(isset($_SESSION['username'])){
                                echo $_SESSION['username'];
                            }
                        ?>" 
                        name="name" required>
                    </div>

                    
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Contact Number</label>
                      <input type="tel" class="form-control" placeholder="Contact Number" maxlength="12" minlength="10"  name="number" required>
                    </div>

                  </div>
                  
                  <div class="form-row">

                    <div class="col-md mb-3">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" value="
                        <?php if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                              } else {
                                echo "Your Email";
                              } ?>" name="email" readonly>
                    </div>

                    <div class="col mb-3">
                        <label class="font-weight-bold">Course</label>
                        <select class="form-select form-control mb-3" aria-label="default select example" name="course" required>
                            <option selected value="none">Select Course</option>
                            <option value="German">German</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                        </select>
                    </div>
                    
                  </div>

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Your Query</label>
                      <textarea name="query" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                  </div>

                  <div class="form-row my-3">
                    <div class="col-md mb-2">
                      <button type="submit" class="btn btn-info text-white" name="submit">Send</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>




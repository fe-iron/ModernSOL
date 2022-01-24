<?php include_once 'inc/head.php'; ?>
<?php

    include 'admin/connection.php';
//   include 'auth.php';    
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
  

    if (isset($_POST['email'])){
        // removes backslashes
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $g_level = $_POST['german_level'];
        $s_level = $_POST['spanish_level'];
        $f_level = $_POST['french_level'];

        $query = "INSERT into `contact` (name, number, email, course, spanish_level, german_level, french_level) 
                VALUES ('$name', '$number', '$email', '$course', '$s_level', '$g_level', '$f_level')";
            
            //trying to get last inserted id

        if($conn->query($query) === TRUE){
            $to = $email; 
            $from = 'info@modernsol.in';
            $fromName = 'Modern School Of Languages(MSOL)'; 
            
            $subject = 'Thank you for registration with Modern SOL';  
            
            
            $htmlContent = ' 
                <center><h3>Thanks for Registration with Modern School of Languages</h3></center><hr/>
                <h4>These are the details that you have shared with us.</h4> <hr/>
                <p><b>Full Name:</b> '.$name.'</p>
                <p><b>Mobile Number:</b> '.$number.'</p>
                <p><b>Email:</b> '.$email.'</p>
                <p><b>Course:</b> '.$course.'</p>';
            if($s_level == "none"){
                $htmlContent = $htmlContent . '<p><b>Course Level:</b> '.$s_level.'</p>';
            }elseif($g_level == "none"){
                $htmlContent = $htmlContent . '<p><b>Course Level:</b> '.$g_level.'</p>';
            }else{
                $htmlContent = $htmlContent . '<p><b>Course Level:</b> '.$f_level.'</p>';
            }

            
            // Call function and pass the required arguments 
            $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName); 
            $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
            
            if ($sendEmail){
                $_SESSION['msg'] = "Submitted Successfully! and a copy is send to your email (check your spam too)";
            }
        }else{
            // echo "Error: " . $query . "<br>" . $conn->error;
            $_SESSION['error'] = "Something Went! Try Again";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css" />
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
    <?php include_once 'inc/navbar.php'; ?>

    <section class="contact-banner">
        <div class="container">
            <div class="row contact_inner_content">
                <div class="col-md">
                    <h2>Contact Us</h2>
                    <p>At Modern School of Languages, Our aim is to provide you with the best possible learning environment at our school</p>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="contact_content">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h2 class="mb-4">Contact Information</h2>

                    <div class="contact-info mb-5">
                        <img src="images/call.png" />
                        <p>
                            <span class="font-weight-bold">CALL</span><br />
                            <a href="tel:+919717071885" class="text-dark">+919717071885</a>,
                            <a href="tel:+916392353441" class="text-dark">+916392353441</a>
                        </p>
                    </div>

                    <div class="contact-info mb-5">
                        <img src="images/sms.png" />
                        <p>
                            <span class="font-weight-bold">EMAIL </span><br />
                            <a href="mailto:info@modernsol.in" class="text-dark">info@modernsol.in</a>
                        </p>
                    </div>

                    <div class="contact-info mb-5">
                        <img src="images/location.png" />
                        <p>
                            <span class="font-weight-bold">ADDRESS</span> <br />
                            Prop No. 151, Wazirabad, New Delhi-110084
                   </p>
                    </div>
                </div>

                <div class="col-md">
                    <h2 class="mb-4">Contact Form</h2>
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
                                <input type="text" class="form-control name" placeholder="Enter Your Name *" required="" name="name" />
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
                                    <option selected value="none">Select Course</option>
                                    <option value="German">German</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md mb-3" id="german" style="display:none;">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="german_level">
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

                        <div class="col-md mb-3" id="french" style="display:none;">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="french_level">
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

                        <div class="col-md mb-3" id="spanish" style="display:none;">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="spanish_level">
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
                                <input type="submit" name="submit" value="Submit" class="btn btn-info text-white btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <?php include_once 'inc/footer.php'; ?>




    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == "German") {
                document.getElementById('german').style.display = "block";
            } else {
                document.getElementById('german').style.display = "none";
            }
        

       
            if (select.value == "French") {
                document.getElementById('french').style.display = "block";
            } else {
                document.getElementById('french').style.display = "none";
            }

        
            if (select.value == "Spanish") {
                document.getElementById('spanish').style.display = "block";
            } else {
                document.getElementById('spanish').style.display = "none";
            }

        }
        
    </script>

</body>

</html>
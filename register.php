<?php 
    session_start();
    include_once 'inc/head.php'; ?>

<?php

    include 'admin/connection.php';  
    $conn = OpenCon();

    function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName, $files = array()){ 
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
  
        // Preparing attachment 
        if(!empty($files)){ 
           for($i=0;$i<count($files);$i++){ 
              if(is_file($files[$i])){ 
                    $file_name = basename($files[$i]); 
                    $file_size = filesize($files[$i]); 
                    
                    $message .= "--{$mime_boundary}\n"; 
                    $fp =    @fopen($files[$i], "rb"); 
                    $data =  @fread($fp, $file_size); 
                    @fclose($fp); 
                    $data = chunk_split(base64_encode($data)); 
                    $message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .  
                    "Content-Description: ".$file_name."\n" . 
                    "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .  
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
                } 
            } 
        } 
        
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
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $faname = $_POST['faname'];

        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];

        $number = $_POST['number'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        $profession = $_POST['profession'];
        $email = $_POST['email'];
        $batch = $_POST['batch'];

        $course = $_POST['course'];
        
        
        $qualification = $_POST['qualification'];
        $address = $_POST['address'];
        $pin = $_POST['pin'];

        $placement = $_POST['placement'];
        $about_us = $_POST['about_us'];
        
        if(isset($_POST['aadhar'])){
            $aadhar = $_POST['aadhar'];    
        }else{
            $aadhar = "";
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

        $query = "SELECT * FROM `students` WHERE email='$email'
            and batch_fk='$batch'";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        
        if($rows >= 1){
            $_SESSION['error'] = "You are already enrolled in this Batch! Try with a different email.";
        }else{
            $target_dir = "admin/upload/students/";
        
            $flag1 = false;
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png");

            //saving first image
            $img1 = $_FILES['file']['name'];
            // echo $_FILES['photo']['name'];
            $target_file1 = $target_dir . basename($_FILES["file"]["name"]);
            // Select file type
            $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            
            
            // Check extension
            if(in_array($imageFileType1,$extensions_arr) ){
            // Upload file
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img1)){
                    // Insert record
                    $flag1 = true;
                }
            }else{
                // echo $kyc;
                $_SESSION['error'] = 'Image Saving Failed! try again';
            }
            
            $demo_password = $number;

            $query = "INSERT into `students` (fname, lname, father_name, country, state, city, gender, dob, number, profession, email, course, aadhar, qualification, address, pin_code, file, placement, about_us, password, g_level, f_level, s_level, batch_fk) 
                    VALUES ('$fname', '$lname', '$faname', '$country', '$state', '$city', '$gender', '$dob', '$number', '$profession', '$email', '$course', '$aadhar', '$qualification', '$address', '$pin', '$img1', '$placement', '$about_us', '".md5($demo_password)."', '$g_level', '$f_level', '$s_level', '$batch')";

            if($conn->query($query) === TRUE){
                // Email configuration 
                $to = $email; 
                $from = 'info@modernsol.in';
                $fromName = 'Modern School Of Languages(SOL)'; 
                
                $subject = 'Thank you for registration with Modern SOL';  
                
                $htmlContent = ' 
                    <center><h3>Thanks for Registration with Modern School of Languages</h3></center><hr/>
                    <h4>These are the details that you have shared with us.</h4> <hr/>
                    <p><b>Full Name:</b> '.$fname.' '.$lname.'</p>
                    <p><b>Father Name:</b> '.$faname.'</p>
                    <p><b>Country:</b> '.$country.'</p>
                    <p><b>State:</b> '.$state.'</p>
                    <p><b>City:</b> '.$city.'</p>
                    <p><b>Gender:</b> '.$gender.'</p>
                    <p><b>Date of Birth:</b> '.$dob.'</p>
                    <p><b>Mobile Number:</b> '.$number.'</p>
                    <p><b>Profession:</b> '.$profession.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Course:</b> '.$course.'</p>
                    <p><b>Aadhar Number:</b> '.$aadhar.'</p>
                    <p><b>Highest Qualification:</b> '.$qualification.'</p>
                    <p><b>Address:</b> '.$address.'</p>
                    <p><b>Pin Code:</b> '.$pin.'</p>
                    <p><b>Would you like MSOL help you with placements:</b> '.$placement.'</p>
                    <p><b>How did you get to know about us?:</b> '.$about_us.'</p>';

                $htmlContent = $htmlContent .'<hr/>
                <p><b>Email: '.$email.'</b></p>Use the below credentials to login <br/>
                <p><b>Your Password: '.$demo_password.'</b></p>
                <p><b>To login please <a href="https://modernsol.in/user-profile/create-password.php">Click me</a></p>
                <p>We suggest you to please change your password on your first login</p>';
                
                // Attachment files 
                $files = array(
                    'admin/upload/students/'. $img1
                ); 
                
                // Call function and pass the required arguments 
                $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
                // $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
                $sendEmail = multi_attach_mail('differences690@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
                
                // Email sending status 
                if($sendEmail){ 
                    $_SESSION['msg'] = "Successfully registered! and check your inbox/Spam for the confirmation mail.";
                }else{ 
                    $_SESSION['msg'] = "Successfully registered! and Email sending failed!";
                }
            }else{
                // echo "Error: " . $query . "<br>" . $con->error;
                $_SESSION['error'] = "Registration Failed! Try Again";
            }
        }
    }

    $sql = "SELECT * FROM batches ORDER BY id DESC";
    $batches = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
    <?php include_once 'inc/navbar.php'; ?>

    <section class="register-banner">
        <div class="container">
            <div class="row register_inner_content">
                <div class="col-md">
                    <h2>Registration</h2>
                    <p>At Modern School of Languages, Our aim is to provide you with the best possible learning environment at our school</p>
                </div>
            </div>
        </div>
    </section>

    <section class="register-form">
        <div class="container">
            <h2 class="mb-1 text-center mb-4">Registration Form </h2>
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
            <div class="row">
                <div class="col-md">
                    <form action=" " method="post" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  placeholder="First Name" name="fname" required>
                                    <label for="floatingInputGrid">First Name</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                                    <label for="floatingInputGrid">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  placeholder="Enter Name" name="faname" required>
                                    <label for="floatingInputGrid">Father's Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="country" name="country" required>
                                    <label for="floatingInputGrid">Country*</label>    
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Date Of Birth" name="state" required>
                                    <label for="floatingInputGrid">State*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  placeholder="Enter Name" name="city" required>
                                    <label for="floatingInputGrid">City*</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="gender" required>
                                        <option value="none">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" required>
                                    <label for="floatingInputGrid">DOB*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" placeholder="Enter Name" name="number" required>
                                    <label for="floatingInputGrid">Contact Number</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Enter Name" name="profession" required>
                                    <label for="floatingInputGrid">Profession*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                    <label for="floatingInputGrid">Email Address*</label>
                                </div>
                            </div>

                            <div class="col-md mb-3">
                                    <select class="form-select form-control mb-3" aria-label="Default select example" name="batch" required>
                                        <option selected="selected" value="none">Select Batch*</option>
                                        <?php 
                                            while($data = mysqli_fetch_assoc($batches)){ 
                                                echo '<option value="'.$data['id'].'" >'.$data['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <select class="form-select" aria-label="Default select example" placeholder="name" onchange="showDiv(this)" name="course" required>
                                    <option selected value="none">Select Course</option>
                                    <option value="German">German</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                </select>
                            </div>
                            <div class="col-md mb-3" id="german" style="display:none;">
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

                            <div class="col-md mb-3" id="french" style="display:none;">
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

                            <div class="col-md mb-3" id="spanish" style="display:none;">
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
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingInputGrid" placeholder="number" name="aadhar">
                                    <label for="floatingInputGrid">Aadhar Number</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="qualification" name="qualification" required>
                                    <label for="floatingInputGrid">Highest Qualification*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Address" name="address" required>
                                    <label for="floatingInputGrid">Address*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="Pin Code" name="pin" required>
                                    <label for="floatingInputGrid">Pin Code*</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="upl-wrap">
                                    <input type="file" class="form-control" id="floatingInputGrid" placeholder="file" name="file" required>
                                    <span class="upload-img">Upload Photo</span>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <select class="form-select" aria-label="Default select example" placeholder="name"  name="placement" required>
                                    <option selected value="none">Would you like MSOL help you with placements</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <select class="form-select" aria-label="Default select example" placeholder="name" name="about_us" required>
                                    <option selected value="none">How did you get to know about us?</option>
                                    <option value="Google Search">Google Search</option>
                                    <option value="Reference from Friends and Family">Reference from Friends and Family</option>
                                    <option value="Facebook Page">Facebook Page</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="I am already a student">I am already a student</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3 text-center">
                                <div class="">
                                    <button class="btn btn-info text-white" type="submit">Register</button>
                                </div>
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
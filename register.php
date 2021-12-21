<?php include_once 'inc/head.php'; ?>
<?php

    include 'admin/connection.php';  
    $conn = OpenCon();

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#$%&';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

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
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $fname = $_POST['fname'];
        $dob = $_POST['dob'];
        $aadhar = $_POST['aadhar'];
        $qualification = $_POST['qualification'];
        $target_dir = "admin/upload/students/";
        

        $sql = "SELECT * FROM `students` WHERE number='$number'";
        $result = $conn->query($sql);
    
    
        if ($result->num_rows > 0) {
            $_SESSION['error'] = "A Student is already registered with this Number! Try with a different number";
        }else{
            $sql = "SELECT * FROM `students` WHERE email='$email'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $_SESSION['error'] = "A Student is already registered with this Email! Try with a different email";
            }else{
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
                    header("Location: register.php");
                }
                
                $demo_password = "";
                $demo_password = randomPassword();

                $query = "INSERT into `students` (name, fname, number, email, dob, course, aadhar, qualification, file, password) 
                VALUES ('$name', '$fname', '$number', '$email', '$dob', '$course', '$aadhar', '$qualification', '$img1', '$demo_password')";

                if($conn->query($query) === TRUE){
                    // $_SESSION['username'] = $name;
                    // $_SESSION['phone'] = $number;
                    // $_SESSION['email'] = $email;
                    
                    // Email configuration 
                    $to = $email; 
                    $from = 'info@modernsol.in';
                    $fromName = 'MOdern School Of Language(SOL)'; 
                    
                    $subject = 'Thank you for registration with Modern SOL';  
                    
                    $htmlContent = ' 
                        <center><h3>Thanks for Registration with Modern School of Language</h3></center><hr/>
                        <h4>These are the details that you have shared with us.</h4> <hr/>
                        <p><b>Full Name:</b> '.$name.'</p>
                        <p><b>Father Name:</b> '.$fname.'</p>
                        <p><b>Mobile Number:</b> '.$number.'</p>
                        <p><b>Email:</b> '.$email.'</p>
                        <p><b>password:</b> '.$demo_password.'</p>
                        <p><b>Date of Birth:</b> '.$dob.'</p>
                        <p><b>Aadhar Number:</b> '.$aadhar.'</p>
                        <p><b>Highest Qualification:</b> '.$qualification.'</p>
                        <p><b>Course:</b> '.$course.'</p>';

                    $htmlContent = $htmlContent .'<hr/>
                    <p><b>Email: '.$email.'</b></p>Use the below credentials to login <br/>
                    <p><b>Your Password: '.$demo_password.'</b></p>
                    <p><b>To login please <a href="https://apnaprachar.com/user-profile/password-change.php">Click me</a></p>
                    <p>We suggest you to please change your password on your first login</p>';
                    
                    // Attachment files 
                    $files = array(
                        'admin/upload/students/'. $img1
                    ); 
                    
                    // Call function and pass the required arguments 
                    $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
                    // $sendEmail = multi_attach_mail('differences690@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
                    
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
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Modern SOL</title>
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
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Name" name="name" required>
                                    <label for="floatingInputGrid">Applicant' Name*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Name" name="fname" required>
                                    <label for="floatingInputGrid">Father's Name*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="floatingInputGrid" placeholder="Enter Contact Number" name="number" required>
                                    <label for="floatingInputGrid">Contact Number*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="floatingInputGrid" placeholder="Enter Name" name="dob" required>
                                    <label for="floatingInputGrid">Date Of Birth*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInputGrid" placeholder="Enter Email Address" name="email" required>
                                    <label for="floatingInputGrid">Email Address*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <select class="form-select" aria-label="Default select example" name="course">
                                    <option selected value="none">Select Course</option>
                                    <option value="French">French</option>
                                    <option value="German">German</option>
                                    <option value="Spanish">Spanish</option>
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingInputGrid" placeholder="Enter Aadhar Number" name="aadhar" required>
                                    <label for="floatingInputGrid">Aadhar Number*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter your highest qualification" name="qualification">
                                    <label for="floatingInputGrid">Highest Qualification*</label>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <input type="file" class="form-control" placeholder="Enter Name" name="file">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3 text-center">
                                <div class="">
                                    <button class="btn btn-warning text-white" type="submit">Register</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'inc/footer.php'; ?>




</body>

</html>
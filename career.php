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
  

    if (isset($_POST['career'])){
        // removes backslashes
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $language = $_POST['language'];
        $mode_of_teaching = $_POST['mode_of_teaching'];
        $address = $_POST['address'];
        $country = $_POST['country'];

        $target_dir = "admin/upload/career/";
        
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png", "pdf", "docx");

        //saving first image
        $img1 = $_FILES['resume']['name'];
        // echo $_FILES['photo']['name'];
        $target_file1 = $target_dir . basename($_FILES["resume"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        
        // Check extension
        if(in_array($imageFileType1,$extensions_arr) ){
        // Upload file
            if(move_uploaded_file($_FILES['resume']['tmp_name'],$target_dir.$img1)){
                // Insert record
                $flag1 = true;
            }
        }else{
            // echo $kyc;
            $_SESSION['error'] = 'Resume upload Failed! try again';
        }

        $query = "INSERT into `career` (name, number, email, resume, language, mode_of_teaching, address, country) 
            VALUES ('$name', '$number', '$email', '$img1', '$language', '$mode_of_teaching', '$address', '$country')";

        if($conn->query($query) === TRUE){
            
            // Email configuration 
            $to = $email; 
            $from = 'info@modernsol.in';
            $fromName = 'Modern School Of Languages(SOL)'; 
            
            $subject = 'Thank you for applying with Modern SOL';  
            
            $htmlContent = ' 
                <center><h3>Thanks for apply in Modern School of Languages</h3></center><hr/>
                <h4>These are the details that you have shared with us.</h4> <hr/>
                <p><b>Full Name:</b> '.$name.'</p>
                <p><b>Mobile Number:</b> '.$number.'</p>
                <p><b>Email:</b> '.$email.'</p>
                <p><b>Your preferred language:</b> '.$language.'</p>
                <p><b>Teaching Mode:</b> '.$mode_of_teaching.'</p>
                <p><b>Address:</b> '.$address.'</p>
                <p><b>Country:</b> '.$country.'</p>
                <p>Your CV is attched with this mail</p>';

            
            // Attachment files 
            $files = array(
                'admin/upload/career/'. $img1
            ); 
            
            // Call function and pass the required arguments 
            $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
            $sendEmail = multi_attach_mail('ziaakbargrs@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
            
            // Email sending status 
            if($sendEmail){ 
                $_SESSION['msg'] = "Successfully applied! and check your inbox/Spam for the confirmation mail.";
            }else{ 
                $_SESSION['msg'] = "Successfully applied! and Email sending failed!";
            }
        }else{
            // echo "Error: " . $query . "<br>" . $con->error;
            $_SESSION['error'] = "Application Registration Failed! Try Again";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career</title>
    <link rel="stylesheet" href="css/career.css" />
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
    <?php include_once 'inc/navbar.php'; ?>

    <section class="register-banner">
        <div class="container">
            <div class="row register_inner_content">
                <div class="col-md">
                    <h2>Career</h2>
                    <p>Work with Modern School of Language.</p>
                    <a href="#apply" class="btn btn-info text-white">Apply</a>
                </div>
            </div>
        </div>
    </section>

    <section class="map">
        <div class="container">
        <h4 class="mb-4 text-success text-center"><?php 
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
            </h4>
            <h4 class="mb-4 text-danger text-center"><?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
            </h4>
            <h5 class="text-center">If you are interested in joining our school, we have a place for you. We are always looking for talented people. Please don’t hesitate to submit your CV.</h5>
            <h6 class="text-center text-danger mb-5">Check out Our Position Below</h6>
            <div class="row">
                <div class="col-md text-center upper-margin">
                   <img src="images/map/french.png" alt="" class="img-fluid">
                   <p>French Language</p>
                </div>

                <div class="col-md text-center upper-margin">
                <img src="images/map/german.png" alt="" class="img-fluid">
                   <p>German Language</p>
                </div>

                <div class="col-md text-center upper-margin">
                <img src="images/map/japan.png" alt="" class="img-fluid">
                   <p>Japanese Language</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md text-center">
                <img src="images/map/korean.png" alt="" class="img-fluid">
                   <p>Korean Language</p>
                </div>

                <div class="col-md text-center">
                <img src="images/map/mandarin.png" alt="" class="img-fluid">
                   <p>Mandarin Language</p>
                </div>

                <div class="col-md text-center">
                <img src="images/map/portugues.png" alt="" class="img-fluid">
                   <p>Portuguese Language</p>
                </div>

                <div class="col-md text-center">
                <img src="images/map/italian.png" alt="" class="img-fluid">
                   <p>Italian Language</p>
                </div>
            </div>
        </div>
    </section>

    

    <section class="register-form" id="apply">
        <div class="container">
            <h2 class="mb-1 text-center mb-4">Career Form </h2>
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <form action=" " method="post" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Applicant' Name</label>
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Name" name="name" required>
                            </div>
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Contact Number</label>
                                <input type="tel" class="form-control" placeholder="Enter Contact" name="number" required>
                            </div>
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Email Address</label>
                                <input type="email" class="form-control"  placeholder="Enter Email Id" name="email">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Lanaguage You Would Love to teach</label>
                                <select class="form-select" aria-label="Default select example" name="language" required>
                                    <option selected value="none">Select Course</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="japanese">Japanese</option>
                                    <option value="korean">Korean</option>
                                    <option value="mandarin">Mandarin</option>
                                    <option value="portuguese">Portuguese</option>
                                    <option value="italian">Italian</option>
                                </select>
                            </div>

                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Preferred Mode Of Teaching</label>
                                <select class="form-select" aria-label="Default select example" name="mode_of_teaching" required>
                                    <option selected value="none">Select Mode</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                    <option value="both">Both</option>
                                    
                                </select>
                            </div>

                        </div>
                        <div class="row g-2">
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Address</label>
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Address" name="address" required>
                            </div>
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Country</label>
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Enter Country" name="country" required>
                            </div>
                            <div class="col-md mb-4">
                                <label for="floatingInputGrid">Upload CV</label>
                                <input type="file" class="form-control" id="floatingInputGrid" placeholder="Upload Cv" name="resume" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <button class="btn btn-info text-white " type="submit" name="career">Submit</button>
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
<?php
    session_start();
    include 'admin/connection.php';
    $conn = OpenCon();

    if(isset($_POST['payment_id'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $payment = $_POST['payment'];
        $payment_id = $_POST['payment_id'];
        
        $query = "INSERT into `payments` (name, number, email, amount, payment_id) 
                    VALUES ('$name', '$number', '$email', '$payment', '$payment_id')";
    
        if($conn->query($query) === TRUE){
            header("Location: payment_success.php?id=".$payment_id."&amount=".$payment);
        }else{
            // echo "Error: " . $query . "<br>" . $conn->error;
            $_SESSION['error'] = "Form submission Failed! Contact Us!";
            header("Location: index.php");
        }
    }else{
        $_SESSION['error'] = "Please make payment first!";
        header("Location: index.php");  
    }
?>
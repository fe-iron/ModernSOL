<?php 
    session_start();
    require('connection.php');
    $con = OpenCon();

    if(isset($_POST['task'])){
        $remove_id = $_POST['remove_id'];
        if($_POST['task'] == 'remove'){
            $sql = "DELETE FROM batches WHERE id=".$remove_id;    
            
            if ($con->query($sql) === TRUE) {
                $_SESSION['msg'] = "Successfully Deleted!";
                header("Location: batches.php");
            } else {
                $_SESSION['error'] = "Delete Failed! Try again";
                header("Location: batches.php");
            }
        }else{
            $time = $_POST['time'];
            $sql = "UPDATE batches SET batch_time='$time' WHERE id=".$remove_id;    
            
            if ($con->query($sql) === TRUE) {
                $_SESSION['msg'] = "Successfully Updated!";
                header("Location: batches.php");
            } else {
                $_SESSION['error'] = "Update Failed! Try again";
                header("Location: batches.php");
            }
        }
    }
?>
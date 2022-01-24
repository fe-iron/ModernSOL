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
            if(isset($_POST['monday'])){
                $mond = $_POST['monday']; 
              }else{
                  $mond = ' ';
              }
              
              if(isset($_POST['tuesday'])){
                $tuesd = $_POST['tuesday']; 
              }else{
                  $tuesd = ' ';
              }
          
              if(isset($_POST['wednesday'])){
                $wednesd = $_POST['wednesday']; 
              }else{
                  $wednesd = ' ';
              }
          
              if(isset($_POST['thursday'])){
                $thursd = $_POST['thursday']; 
              }else{
                  $thursd = ' ';
              }
          
              if(isset($_POST['friday'])){
                $frid = $_POST['friday']; 
              }else{
                  $frid = ' ';
              }
              
              if(isset($_POST['saturday'])){
                $saturd = $_POST['saturday']; 
              }else{
                  $saturd = ' ';
              }
          
              if(isset($_POST['sunday'])){
                $sund = $_POST['sunday']; 
              }else{
                  $sund = ' ';
              }
          
              if(isset($_POST['time1'])){
                $batch_time1 = $_POST['time1']; 
              }else{
                  $batch_time1 = '';
              }
          
              if(isset($_POST['time2'])){
                $batch_time2 = $_POST['time2']; 
              }else{
                  $batch_time2 = '';
              }
          
              if(isset($_POST['time3'])){
                $batch_time3 = $_POST['time3']; 
              }else{
                  $batch_time3 = '';
              }
          
              if(isset($_POST['time4'])){
                $batch_time4 = $_POST['time4']; 
              }else{
                  $batch_time4 = '';
              }
          
              if(isset($_POST['time5'])){
                $batch_time5 = $_POST['time5']; 
              }else{
                $batch_time5 = '';
              }
          
              if(isset($_POST['time6'])){
                $batch_time6 = $_POST['time6']; 
              }else{
                  $batch_time6 = '';
              }
          
              if(isset($_POST['time7'])){
                $batch_time7 = $_POST['time7']; 
              }else{
                $batch_time7 = '';
              }
              
            $days = $mond . ' ' .$tuesd . ' ' .$wednesd . ' ' .$thursd . ' ' .$frid . ' ' .$saturd . ' ' .$sund;

            $sql = "UPDATE batches SET day='$days', batch_time_mon='$batch_time1', batch_time_tues='$batch_time2', batch_time_wed='$batch_time3', batch_time_thurs='$batch_time4', batch_time_fri='$batch_time5', batch_time_sat='$batch_time6', batch_time_sun='$batch_time7'
                    WHERE id=".$remove_id;
            
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
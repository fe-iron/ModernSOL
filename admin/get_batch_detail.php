<?php 
    session_start();
    require('connection.php');
    $conn = OpenCon();

    if(isset($_GET['id'])){
        $this_id = $_GET['id'];
    }else{
        $this_id = '';
    }
    
    $sql = "SELECT * FROM batches WHERE id=".$this_id;
    $batches = $conn->query($sql);

    $each_days = array();
    $each_time = array();

    $row = mysqli_fetch_assoc($batches);
    
    echo json_encode($row);
    exit;
?>
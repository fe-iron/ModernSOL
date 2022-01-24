<?php
    if(isset($_GET['id'])){
        $p_id = $_GET['id'];
    }else{
        $p_id = '';
    }

    if(isset($_GET['amount'])){
        $p_amount = $_GET['amount'];
    }else{
        $p_amount = '';
    }
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');

    .success {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Roboto Slab', serif;
    }
</style>





<?php include_once 'inc/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSOL || Payment Success</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <section class="success">
        <div class="container">
            <div class="row">
                <div class="col-md text-center">
                    <img src="images/logo-2.png" alt="logo" width="100px"> <br> <br>
                    <h3 class="text-success fw-bold mb-3">Your Payment Successfully Completed!!</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Payment Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Payment Id</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                <?php
                                    if($p_amount != ''){
                                        echo $p_amount."/-";
                                    }
                                ?>    
                                </th>
                                <td>Completed</td>
                                <td>
                                    <?php
                                        if($p_id != ''){
                                            echo $p_id;
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-info text-white">Go back to homepage</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
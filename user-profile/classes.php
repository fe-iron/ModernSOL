<?php include_once 'inc/head.php'; ?>
<?php

include '../admin/connection.php';
include 'auth.php';
$conn = OpenCon();
$session_email = $_SESSION['email'];

$sql = 'SELECT * FROM classes_details WHERE student_fk="$session_email"';
$student = $conn->query($sql);

if (isset($_SESSION['email'])) {
    $query = 'SELECT * FROM students where email="' . $_SESSION['email'] . '"';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $is_pass_set = $row['is_password_set'];

            if (!$is_pass_set) {
                $_SESSION['error'] = "Create new password first!";
                header("Location: password-change.php");
            } else {
                $course = $row["course"];
                $date = $row["created_on"];
                $date = substr($date, 0, 10);
                $s_level = $row["s_level"];
                $f_level = $row["f_level"];
                $g_level = $row["g_level"];
            }
        }
    } else {
        $_SESSION['error'] = "Login first to access index page";
        header("Location: login.php");
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
                <img src="../images/logo-2.jpeg" alt="">
            <p class="mb-0">MODERN SCHOOL <br> OF LANGUAGES</p></a>
            </div>
            <div class="pt-3" id="sidebar-here">
                <a href="index.php" class="list">My Course</a>
                <a href="account.php" class="list">Profile</a>
                <a href="#" class="list active" onclick="openLan()">Classes</a>
                <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="french.php" class="list active">Classes</a>
                    <a href="spanish.php" class="list active">Classes</a>
                    <a href="german.php" class="list active">Classes</a>
                </div>
            </div>
        </div>

        <!-- large-screen-sidebar-ends -->

        <!-- small-screen-sidebar starts -->
        <div class="small-screen-sidebar">
            <div id="mySidenav" class="sidenav">
                <div class="logo bg-color-sidenav">

                    <!--  <a href="index.php"><img src="images/wmk-final.png" height="60" width="100"> <span class="float-right"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></span></a> -->

                    <div class="d-flex bd-highlight">
                        <div class=" bd-highlight"><a href="index.php"><img src="images/logo.png" height="30" width="120"></a></div>
                        <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>

                    </div>

                </div>
                <div class="pt-3" id="sidebar-here">
                    <a href="index.php" class="list">My Course</a>
                    <a href="account.php" class="list">Profile</a>
                    <a href="#" class="list active" onclick="openLan()">Classes</a>
                    <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <div class="languages-dropdown" style="display: none;" id="open-classes">
                    <a href="classes.php" class="list ">French</a>
                    <a href="spanish.php" class="list active">Spanish</a>
                    <a href="german.php" class="list ">German</a>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- large-screen-sidebar-starts -->

        <div class="content">

            <?php include_once 'inc/header.php'; ?>
            <div class="container py-5 wishlist">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h4 class="text-danger text-center">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                            <h4 class="text-danger text-center"><?php
                                                                if (isset($_SESSION['error'])) {
                                                                    echo $_SESSION['error'];
                                                                    unset($_SESSION['error']);
                                                                }
                                                                ?>
                            </h4>
                            <div class="card">
                                <nav class="navbar navbar-light border venue-registration border-bottom">
                                    <a class="h4 text-dark font-weight-bold pt-2"> My Classes</a>
                                    <form class="form-inline">

                                    </form>
                                </nav>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="border">
                                                <tr>
                                                    <th scope="col" class="border-right text-center">Sr.</th>
                                                    <th scope="col" class="border-right text-center">Date</th>
                                                    <th scope="col" class="border-right text-center">Course Name</th>
                                                    <th scope="col" class="border-right text-center">Classes Link</th>
                                                    <th scope="col" class="border-right text-center">Attendance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 0;
                                                while ($data = mysqli_fetch_assoc($student)) {
                                                    $count = $count + 1; ?>
                                                    <tr class="border-bottom">
                                                        <td class="border-right border-left text-center"><?php echo $count; ?></td>
                                                        <td class="border-right border-left text-center"><?php echo $data['date']; ?></td>
                                                        <td class="border-right border-left text-center"><?php echo $data['class']; ?></td>
                                                        <td class="border-right border-left text-center"><?php echo $data['student_name']; ?></td>
                                                        <td class="border-right border-left text-center"><?php echo $data['father_name']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <script type="text/javascript">
        function openNav() {
            document.getElementById("mySidenav").style.width = "200px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

</body>

</html>
<?php
  session_start();

  if (isset($_GET['key'])) {
    $fk = $_GET['key'];
  } else {
    $fk = " ";
  }

  include_once 'inc/head.php';
  include 'connection.php';
  $conn = OpenCon();


  if (isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];

    $sql = "DELETE FROM classes WHERE id=" . $remove_id;

    if ($conn->query($sql) === TRUE) {
      $_SESSION['msg'] = "Successfully Deleted!";
    } else {
      $_SESSION['error'] = "Delete Failed! Try again";
    }
  }

  if (isset($_POST['submit_link'])) {
    $link = $_POST['link'];
    if (isset($_POST['classes_link_fk'])) {
      $fk = $_POST['classes_link_fk'];

      $dat = date('l');
      // $today_date = date('Y-m-d');
      $query = "INSERT into `classes` (link, batch_fk, day, date) 
                      VALUES ('$link', '$fk', '$dat', CURRENT_TIMESTAMP)";

      if ($conn->query($query) === TRUE) {
        $_SESSION['msg'] = "Successfully created new Class link!";
      } else {
        // echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION['error'] = "New class link creation failed! Try Again";
      }
    } else {
      $_SESSION['error'] = "Classes foreign key not found! Try again";
    }
  }

  $sql = "SELECT * FROM classes where batch_fk=" . $fk . " ORDER BY id DESC";
  $classes = $conn->query($sql);

  //   fetching for todays link
  $dat = date("Y-m-d");
  $sql = "SELECT * FROM classes where batch_fk='" . $fk . "' and `date`='" . $dat . "' ORDER BY id DESC LIMIT 1";
  $today_classes = $conn->query($sql);
  if($today_classes->num_rows > 0){
    $row = mysqli_fetch_assoc($today_classes);
    if (isset($row['link'])) {
      $today_link = $row['link'];
    }
  }

?>

<link rel="stylesheet" type="text/css" href="inc/css/style.css">

<body>

  <section>
    <!-- large-screen-sidebarstarts -->
    <div class="sidebar">
      <div class="logo">
        <a class="pb-3" href="#">
          <h3 class="mt-4"><img src="images/logo.png" height="45"></h3>
        </a>
      </div>
      <div class="pt-3">
        <div class="pt-3">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list">Profile</a>
          <a href="batches.php" class="list ">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a class="list active" onclick="openLan()">Classes</a>
          <div class="languages-dropdown" style="display: none;" id="open-classes">
            <a href="french_classes.php" class="list ">French Classes</a>
            <a href="spanish_classes.php" class="list ">Spanish Classes</a>
            <a href="german_classes.php" class="list ">German Classes</a>
          </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
        </div>
      </div>
    </div>


    <!-- small-screen-sidebar starts -->
    <div class="small-screen-sidebar">
      <div id="mySidenav" class="sidenav">
        <div class="logo bg-color-sidenav">

          <div class="d-flex bd-highlight">
            <div class=" bd-highlight"><a href="index.php"><img src="images/logo.png" height="30" width="120"></a></div>
            <div class="p-2 bd-highlight"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>

          </div>
        </div>
        <div class="pt-3" id="sidebar-here">
          <a href="index.php" class="list ">Home</a>
          <a href="account.php" class="list ">Profile</a>
          <a href="batches.php" class="list ">Batches</a>
          <a href="career.php" class="list">Career</a>
          <a href="contact.php" class="list">Contact</a>
          <a  class="list active" onclick="openLan1()">Classes</a>
          <div class="languages-dropdown" style="display: none;" id="open-classes1">
            <a href="french_classes.php" class="list ">French Classes</a>
            <a href="spnish_classes.php" class="list ">Spanish Classes</a>
            <a href="german_classes.php" class="list ">German Classes</a>
          </div>
          <a href="e-form.php" class="list">Enquiry Form</a>
          <a href="announcement.php" class="list">Announcement</a>
          <a href="student_contact.php" class="list">Student's Enquiry</a>
          <a href="payment.php" class="list">Payments</a>
        </div>
      </div>
    </div>
    <!-- large-screen-sidebar-starts -->


    <div class="content">

      <?php include_once 'inc/header.php'; ?>

      <div class="container py-5 personal-inforamtion">

        <div class="row justify-content-center">
          <div class="col-md-10">
            <h4 class="mx-4 text-success"><?php
                                          if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                          }
                                          ?>
            </h4>
            <h4 class="mx-4 text-danger"><?php
                                          if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                          }
                                          ?>
            </h4>
            <div class="card shadow">
              <nav class="navbar navbar-light border personal-detail">
                <a class="h4 text-danger font-weight-bold pt-2">Today's Classes</a>
                <form class="form-inline">
                  <a class="btn btn-danger mb text-white" href="#prev_classes">Previous Classes</a>

                </form>
              </nav>

              <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Class Link</h1>
                  <?php
                  if (isset($today_link)) { ?>
                    <p class="lead px-3"><a href="<?php echo $today_link; ?>" target="_blank"><?php echo $today_link; ?></a></p>
                  <?php } else { ?>
                    <p class="lead px-3">Your class link will appear here</p>
                  <?php } ?>
                </div>
              </div>

              <div class="card-body">
                <p class="text-dark text-center font-weight-bold">Update</p>
                <form action=" " method="post">

                  <div class="form-row">
                    <div class="col-md mb-3">
                      <label class="font-weight-bold">Today's Class Link</label>
                      <input type="text" name="link" class="form-control">
                    </div>
                  </div>
                  <input type="hidden" value="<?php if ($fk == " ") {
                                                echo "null";
                                              } else {
                                                echo $fk;
                                              } ?>" 
                                              name="classes_link_fk">
                  <div class="form-row my-3">
                    <div class="col-md mb-2">
                      <button type="submit" class="btn btn-info text-white" name="submit_link">Post Link</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
  


      <div class="row justify-content-center" id="prev_classes">
        <div class="col-md-10 my-5">
          <div class="card">
            <nav class="navbar navbar-light border venue-registration border-bottom">
              <a class="h4 text-dark font-weight-bold pt-2">Your Classes</a>
              <form class="form-inline">

              </form>
            </nav>
            <div class="card-body shadow">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="border">
                    <tr>
                      <th scope="col" class="border-right text-center">Sr.</th>
                      <th scope="col" class="border-right text-center">Date</th>
                      <th scope="col" class="border-right text-center">Day</th>
                      <th scope="col" class="border-right text-center">Link</th>
                      <th scope="col" class="border-right text-center">Remove</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 0;
                    while ($data = mysqli_fetch_assoc($classes)) {
                      $count = $count + 1; ?>
                      <tr class="border-bottom">
                        <td class="border-right border-left text-center"><?php echo $count; ?></td>
                        <td class="border-right border-left text-center"><?php echo substr($data['created_on'], 0, 10); ?></td>
                        <td class="border-right border-left text-center"><?php echo $data['day']; ?></td>
                        <td class="border-right border-left text-center"><?php echo $data['link']; ?></td>

                        <td>
                          <button type="button" class="btn btn-danger" value="<?php echo $data['id']; ?>" onclick="remove(this.value)">Delete</button>
                        </td>

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
  </section>


  <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Batch Time</h5>

        </div>
        <div class="modal-body">
          <form action="change.php" method="post">

            <div class="form-row">
              <div class="col-md mb-3">
                <label class="font-weight-bold">Select Batch Time</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="time" required>
                  <option selected="selected" value="none">Select Time</option>
                  <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                  <option value="10:30 AM - 12:30 PM">10:30 AM - 12:30 PM</option>
                  <option value="11:00 AM - 01:00 PM">11:00 AM - 01:00 PM</option>
                  <option value="11:30 AM - 01:30 PM">11:30 AM - 01:30 PM</option>
                  <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                  <option value="12:30 PM - 02:30 PM">12:30 PM - 02:30 PM</option>
                  <option value="01:00 PM - 03:00 PM">01:00 PM - 03:00 PM</option>
                  <option value="01:30 PM - 03:30 PM">01:30 PM - 03:30 PM</option>
                  <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                  <option value="02:30 PM - 04:30 PM">02:30 PM - 04:30 PM</option>
                  <option value="03:00 PM - 05:00 PM">03:00 PM - 05:00 PM</option>
                  <option value="03:30 PM - 05:30 PM">03:30 PM - 05:30 PM</option>
                  <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                  <option value="04:30 PM - 06:30 PM">04:30 PM - 06:30 PM</option>
                  <option value="05:00 PM - 07:00 PM">05:00 PM - 07:00 PM</option>
                  <option value="05:30 PM - 07:30 PM">05:30 PM - 07:30 PM</option>
                  <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                  <option value="06:30 PM - 08:30 PM">06:30 PM - 08:30 PM</option>
                  <option value="07:00 PM - 09:00 PM">07:00 PM - 09:00 PM</option>
                  <option value="07:30 PM - 09:30 PM">07:30 PM - 09:30 PM</option>
                  <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                  <option value="08:30 PM - 10:30 PM">08:30 PM - 10:30 PM</option>
                </select>
              </div>
            </div>
            <input type="hidden" id="change_id" name="remove_id">
            <input type="hidden" name="task" va;ue="change">
            <div class="form-row">
              <div class="col-md mb-2">
                <button type="submit" class="btn btn-info text-white">Update</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('remove')">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>

        </div>
        <div class="modal-body">
          <h1 class="text-danger fw-bold" style="text-align: center;">Are you sure?</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_modal('remove')">No</button>
          <button type="button" class="btn btn-primary" onclick="submit('remove');">Yes</button>
        </div>
      </div>
    </div>
  </div>



  <div style="display: hidden">
    <form action=" " method="post" name="remove_form">
      <input type="hidden" id="remove_id" name="remove_id">
    </form>
  </div>

  <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }


    function remove(id) {
      $('#remove_id').val(id);
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#remove').modal('show');
    }

    function change(id) {
      $('#change_id').val(id);
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#change').modal('show');
    }


    function close_modal(tag) {
      $('#' + tag).modal('hide');
    }


    function submit() {
      document.forms['remove_form'].submit();
    }
  </script>

</body>

</html>
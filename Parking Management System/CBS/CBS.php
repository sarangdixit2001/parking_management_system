<?php
include 'dbcon.php';
session_start();
if (!isset($_SESSION['username'])) {
  echo '<script>alert("Please Login !!")</script>';
  header("refresh:0 ; url=../Login_register/signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Check Slot</title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

     <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
     <title>CBS </title>

</head>


</script>

<body>



  <?php

  include 'dbcon.php';


  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phnumber = mysqli_real_escape_string($con, $_POST['phnumber']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $vehicle = mysqli_real_escape_string($con, $_POST['vehicle']);
    $hour = mysqli_real_escape_string($con, $_POST['hour']);


    $vehiclequery = " select * from cbs_slot_bookings where vehicle = '$vehicle'";
    $query = mysqli_query($con, $vehiclequery);

    $slotcount = mysqli_num_rows($query);

    $hourquery = " select * from cbs_slot_bookings where hour = '$hour'";
    $hquery = mysqli_query($con, $hourquery);

    $hourcount = mysqli_num_rows($hquery);


    $datequery = " select * from cbs_slot_bookings where date = '$date'";
    $dquery = mysqli_query($con, $datequery);

    $datecount = mysqli_num_rows($dquery);


    $timequery = " select * from cbs_slot_bookings where start_time = '$start_time'";
    $tquery = mysqli_query($con, $timequery);

    $timecount = mysqli_num_rows($tquery);
    

    if ($slotcount > 0 && $hourcount > 0 && $datecount > 0 && $timecount > 0) {
  ?>
      <script>
        alert("Slot already booked !!!!");
      </script>
      <?php


    } else {




      $insertquery = "INSERT into cbs_slot_bookings (`name`,`email`,`phnumber`,`location`,`date`, `start_time`, `vehicle`, `hour`) values('$name','$email','$phnumber','$location','$date','$start_time','$vehicle','$hour')";
      $iquery = mysqli_query($con, $insertquery);


      // $query = "SELECT * FROM `bookings`";
      // $result = mysqli_query($con, $query);

      // while ($fetch = mysqli_fetch_assoc($result)) {


      //   $update_query="UPDATE `bookings` SET `name`='$_SESSION[email]' WHERE `vehicle`='$fetch[vehicle]' ";
      //   $uquery= mysqli_query($con,$update_query);
      // }


      // $insertslot = "INSERT into slot (`Status`) VALUES('Available')";
      // $squery = mysqli_query($con, $insertslot);

      if ($con) {
      ?>
        <script>
          window.location.href = "./cbs_slot.php";
        </script>
      <?php
      } else {
      ?>
        <script>
          alert("Try again ");
        </script>
  <?php
      }
    }
  }

  ?>

  <div class="banner">

    <div class="navbar">
      <a href="home"><img src="../Images/logo.jpg" class="logo"></a>

      <text class="username">Hello! <?php echo $_SESSION['username'] ?></text>


      <ul>
      <li><a href="../Location/location.php">Book Slot</a></li>
                <div class="dropdown">
                    <li><a href="#">My Bookings</a></li>
                    <div class="dropdown-content">
                        <a id="big" href="../Bookings/cbs mybookings.php">My CBS Bookings Logs</a><br>
                        <a id="big" href="../Bookings/Clg rd mybookings.php">My College Rd Bookings Logs</a><br>
                        <a id="big" href="../Bookings/Nsk rd mybookings.php">My Nashik Rd Bookings Logs</a>
                    </div>
                </div>
                <li><a href="../contact/contact.php">Contact us</a></li>
               
                <li><a href="../Login_Register/logout.php">Logout</a></li>
                <style>
                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }

                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                        padding: 12px 16px;
                        z-index: 1;
                    }

                    .dropdown:hover .dropdown-content {
                        display: block;
                    }
                </style>
      </ul>
    </div>

    <section class="section-book">
      <div class="book">
        <div class="book__form">
          <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

            <h2 class="heading">
            <i class="bi bi-check2-circle"></i> CBS Check Slot Availability
            </h2>

            <div class="form__group">
              <label for="datetime-local" class="form__label"><i class="bi bi-calendar-event-fill"></i> &nbsp &nbsp Date</label>
              <input style="max-width: 100%;" class="form__input" name="date" type="date" placeholder="DD/MM/Year" id="datefield" required="" oninvalid="this.setCustomValidity('Please Enter Date ')" oninput="setCustomValidity('')">

            </div>


            <div class="form__group">
              <label for="datetime-local" class="form__label"><i class="bi bi-hourglass-top"></i> Select Hours<span style="color: #ff6347;">*<small>min 1 hr max 6 hr</small></span></label>
              <select class="form__input" name="hour" id="mySelect" onchange="myFunction()" required="" oninvalid="this.setCustomValidity('Please Select start time')" ">
                <option value=" S">Select</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
                <option value="3">3 hour</option>
                <option value="4">4 hour</option>
                <option value="5">5 hour</option>
                <option value="6">6 hour</option>
              </select>

            </div>

            <div class="form__group">
              <label for="datetime-local" class="form__label"><i class="bi bi-clock-fill"></i> Star Time </label>
              <input type="time" id="time1" class="form__input" name="start_time" required>
            </div>


            <div class="form__group">
              <label class="form__label"><i class="bi bi-caret-right-fill"></i> Vehicle No.<span style="color: #ff6347;">*<small>EG: MH 15 GH 6436</small></span> </label>
              <input placeholder="EG: MH 15 GH 6436" type="text" id="vehical_no" name="vehicle" class="form__input" maxlength="13" pattern="^[M,H]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$" required="" oninvalid="this.setCustomValidity('Please Enter as per example')" oninput="setCustomValidity('')">


            </div>
            <div>
              <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>" />
              <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
              <input type="hidden" name="phnumber" value="<?php echo $_SESSION['phnumber']; ?>" />
              <input type="hidden" name="location" value="CBS" >
            </div>

            <button class="btn" id="checkslot" name="submit" type="submit">Check Slot</button>

          </form>

        </div>

        <!-- <p style="text-align: center; color: #ff6347;">{{message}}</p> -->

      </div>
  </div>
  </section>

  </div>

  <script>
    // Use Javascript
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("min", today);
  </script>





</body>

</html>
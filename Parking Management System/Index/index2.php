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
     <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
    <title>Index2</title>
</head>


</script>

<body>



  <?php

  include 'dbcon.php';


  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phnumber = mysqli_real_escape_string($con, $_POST['phnumber']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $vehicle = mysqli_real_escape_string($con, $_POST['vehicle']);
    $hour = mysqli_real_escape_string($con, $_POST['hour']);


    $subjectquery = " select * from bookings where vehicle = '$vehicle'";
    $query = mysqli_query($con, $subjectquery);

    $subjectcount = mysqli_num_rows($query);

    if ($subjectcount > 10) {
  ?>
      <script>
        alert("Slot already booked !!!!");
      </script>
      <?php


    } else {




      $insertquery = "INSERT into bookings (`name`,`email`,`phnumber`,`date`, `start_time`, `vehicle`, `hour`) values('$name','$email','$phnumber','$date','$start_time','$vehicle','$hour')";
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
          window.location.href = "../Bookings/book_slot.php";
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
        <li><a href="../Index/index2.php">Book Slot</a></li>
        <li><a href="../Bookings/mybookings.php">My Bookings</a></li>
        <li><a href="../contact/contact.php">Contact us</a></li>
     
        <li><a href="../Login_Register/logout.php">Logout</a></li>
      </ul>
    </div>

    <section class="section-book">
      <div class="book">
        <div class="book__form">
          <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

            <h2 class="heading">
              Check Slot Availability
            </h2>

            <div class="form__group">
              <label for="datetime-local" class="form__label">Date</label>
              <input style="max-width: 100%;" class="form__input" name="date" type="date" placeholder="DD/MM/Year" id="datefield" required="" oninvalid="this.setCustomValidity('Please Enter Date ')" oninput="setCustomValidity('')">

            </div>


            <div class="form__group">
              <label for="datetime-local" class="form__label">Select Hours<span style="color: #ff6347;">*<small>min 1 hr max 6 hr</small></span></label>
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

            <div class="form__group" id=time>
              <label for="datetime-local" class="form__label">Star Time <span style="color: #ff6347;">*<small>After 7 AM Before 11 PM</small></span></label>
              <input type="time" id="time1" class="form__input" name="start_time" min="07:00" max="22:00" required>
            </div>


            <div class="form__group">
              <label class="form__label">Vehicle No.<span style="color: #ff6347;">*<small>EG: MH 15 GH 6436</small></span> </label>
              <input placeholder="EG: MH 15 GH 6436" type="text" id="vehical_no" name="vehicle" class="form__input" maxlength="13" pattern="^[M,H]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$" required="" oninvalid="this.setCustomValidity('Please Enter as per example')" oninput="setCustomValidity('')">


            </div>
            <div>
              <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>" />
              <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
              <input type="hidden" name="phnumber" value="<?php echo $_SESSION['phnumber']; ?>" />
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



  <!-- <script>
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      if (x == "1") {
        document.getElementById("time2").style.display = "hidden";
      } else {
        document.getElementById("time1").style.display = "visible";
      }

    }
  </script>

<style>
  #time{
    display: none;
  }
</style> -->


</body>

</html>
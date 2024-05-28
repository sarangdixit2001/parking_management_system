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
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     -->

     <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
    <title>Please Choose Location</title>
</head>


</script>

<body>


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
      </ul>
    </div>

    <section class="section-book">
      <div class="book">
        <div class="book__form">

          <h2 class="heading">
          <i class="bi bi-geo-alt-fill"></i> Select Location
          </h2>

          <div class="location">

            <a id="loc" href="../College Road/College Road.php"><i class="bi bi-geo-fill"></i> College Road</a><br><br>
            <a id="loc" href="../CBS/CBS.php"><i class="bi bi-geo-fill"></i> Cbs</a><br><br>
            <a id="loc" href="../Nashik Road/Nashik Road.php"><i class="bi bi-geo-fill"></i> Nashik Road</a><br>

          </div>

          <!-- <p style="text-align: center; color: #ff6347;">{{message}}</p> -->

        </div>
      </div>
    </section>

  </div>

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


</body>

</html>
<?php

require("dbcon.php");

session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {

    echo '<script>alert("Please Login Admin !!")</script>';
    header("refresh:0.1 ; url= admin_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
 
</head>
<body>
	<div class="banner">
		<div class="navbar">
			<a href="/"><img src="../Images/logo.jpg" class="logo" ></a>
			<ul>
            <li><a href="admin_panel.php">Home</a></li>
                <div class="dropdown">
                    <li><a href="#">Booking Logs</a></li>
                    <div class="dropdown-content">
                        <a href="./Manage Bookings/CBS Booking Logs.php">CBS Booking Logs</a>
                        <a href="./Manage Bookings/College Road Booking Logs.php">College Rd Booking Logs</a><br>
                        <a href="./Manage Bookings/Nashik Road Booking Logs.php">Nashik Rd Booking Logs</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li><a href="#">Slot Manager</a></li>
                    <div class="dropdown-content">
                        <a href="./Manage Slots/cbs slot manager.php">CBS Slot Manager</a>
                        <a href="./Manage Slots/Clg rd slot manager.php">College Rd Slot Manager</a><br>
                        <a href="./Manage Slots/Nsk rd slot manager.php">Nashik Rd Slot Manager</a>
                    </div>
                </div>
                <li><a href="./Manage_register/manage_registeration.php">Manage registeration</a></li>
                <li><a href="./Manage_contactus/manage_contactus.php">Manage Contact us</a></li>
                <li><a href="./logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Welcome Admin <br> <?php echo $_SESSION['AdminLoginId'] ?></h1>
			<p>EASY | SAFE | RELIABLE</p>
		</div>
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
    </style>.
	</body>
</html>


<!-- {% static 'Images/logo.jpg' %} -->
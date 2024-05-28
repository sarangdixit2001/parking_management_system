<?php

require("dbcon.php");

session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Please Login !!")</script>';
    header("refresh:0 ; url=../Login_register/signin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="../css/mybookings.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
    <title>My Bookings</title>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>


<header class="header">




</header>


<body>
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
        <divclass="bg-light">
            



            <div class="container mt-4 p-0">
                <table class="table table-hover text-center">
                    <thead class="bg-dark text-light">
                        <tr>

                            <th width="5%" scope="col" class="rounded-start">booking_id</th>
                            <th width="5%" scope="col">Start Time</th>
                            <th width="5%" scope="col">Start Date</th>
                            <th width="5%" scope="col">Hour</th>
                            <th width="15%" scope="col">Slot No.</th>
                            <th width="15%" scope="col">Charge</th>


                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php



                        $query = "SELECT * FROM `slot_bookings` ORDER BY booking_id DESC LIMIT 1 ";

                        $result = mysqli_query($con, $query);




                        while ($fetch = mysqli_fetch_assoc($result)) {

                            $charge = $fetch['hour'] * 30;



                            echo <<<product
                    <tr class="align-middle">
                    <td>$fetch[booking_id]</td>
                    <td>$fetch[user_id]</td>
                    <td>$fetch[slot_id]</td>

                    <td>$fetch[start_time]</td>
                    <td>$fetch[date]</td>
                    <td>$fetch[hour]</td>
                    <td>$_GET[rem]</td> 
                    <td>Rs.$charge</td>
        
                    
                    </tr>
                    product;
                        }


                        ?>


                    </tbody>
                </table>

            </div>
        </tbody>

            </table>
            </div>


    <div class="text-center">
        <div class="confirm-sign mb-3">
            <i class="fa fa-check" aria-hidden="true"></i>
        </div>
        <h1 class="display-4">Thank You!</h1>
        <p class="lead">Your SLOT has been Booked ! <br>(Please Take Screenshot of this page) <br>
            Having trouble? <a href="../contact/contact.php">Contact us</a>
        </p>
        <p class="lead">
            <!-- <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a> -->
            <a href="https://www.google.com/maps/place/RYK+Car+Parking/@19.9754536,73.7380587,13z/data=!4m9!1m2!2m1!1sparking!3m5!1s0x3bddeb9b2df7aab5:0xbe56d4d00776c6d3!8m2!3d20.0064066!4d73.7598578!15sCgdwYXJraW5nkgEQZnJlZV9wYXJraW5nX2xvdA" class="review-us btn btn-primary btn-sm" target="_blank">Review Us</a>
        </p>

    </div>










</body>

</html>
<?php

session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Please Login !!")</script>';
    header("refresh:0 ; url=../Login_register/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/contactus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    <link rel="icon" href="../Images/parklogo-removebg-preview.png" type="image/icon type">
   
    <title>Contact us</title>

</head>


<body>


    <?php

    include 'dbcon.php';


    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $subject = mysqli_real_escape_string($con, $_POST['subject']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $subjectquery = " select * from contact where subject = '$subject'";
        $query = mysqli_query($con, $subjectquery);

        $subjectcount = mysqli_num_rows($query);

        if ($subjectcount > 10) {
    ?>
            <script>
                alert("Subject already mentioned !!!!");
            </script>
            <?php


        } else {
            $insertquery = "insert into contact (name, email, mobile,  subject, message) values('$username','$email','$mobile','$subject','$message')";

            $iquery = mysqli_query($con, $insertquery);

            if ($con) {
            ?>
                <script>
                    alert("Your message is successfully deliverd");
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
            </ul>
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
        </div>
        <div class="container mt-4 p-0">


            <div>
                <h1><i class="bi bi-person-lines-fill"></i> Contact Us</h1>
            </div>
            <br />


            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <img  id="scroll" src="../Images/scroll-down.gif" width="80px" ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.querySelector("#scroll").addEventListener("click", () => {
                    window.scrollTo(0, document.body.scrollHeight);
                    
                })
            </script>



            <div class="col-md-6">

                <form action="  <?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="contact" method="POST">
                    <div class="form-group">

                        <label for="form-name">Name</label>
                        <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" class="form-control" id="form-name" placeholder="Name" pattern="[a-zA-Z'-'\s]*" required="" oninvalid="this.setCustomValidity('Please Enter Valid Name')" oninput="setCustomValidity('')">
                    </div>
                    <br>





                    <div class="form-group">
                        <label for="form-name" for="email">E-mail</label>
                        <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" placeholder="Enter your Email" class="form-control" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="form-name">Mobile No.</label>
                        <input type="text" name="mobile" value="<?php echo $_SESSION['phnumber'] ?>" id="mobile" class="form-control effect-16" placeholder="Enter your Mobile Number" pattern="^[7-9]\d{9}$" maxlength="10" required="" oninvalid="this.setCustomValidity('Please yaar enter number')" oninput="setCustomValidity('')">
                    </div>
                    <br>



                    <div class="form-group">
                        <label for="form-name">Subject</label>
                        <input type="text" name="subject" class="form-control" id="form-subject" placeholder="Subject" required="required" oninvalid="this.setCustomValidity('Please Enter Subject')" oninput="setCustomValidity('')">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="form-name">Your Message</label>
                        <textarea class="form-control" name="message" id="form-message" placeholder="Message" required="" oninvalid="this.setCustomValidity('Please Enter Message')" oninput="setCustomValidity('')"></textarea>

                    </div>
                    <br>
                    <button id="btn1" type="submit" name="submit" value="service" class="btn btn-info">Contact Us </button>

                </form>
                <br>

            </div>






            <div id="map1">
                <div>
                    <div>
                        <div id="googlemap" style="width:400px; height:150px;">
                            <div>
                                <iframe id="map2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29143.752120573798!2d73.70972267052838!3d19.978440220320984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeb9b2df7aab5%3A0xbe56d4d00776c6d3!2sRYK%20Car%20Parking!5e0!3m2!1sen!2sin!4v1652121855724!5m2!1sen!2sin" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="h3 px-3 pt-2 mb-0 text-danger"><i class="bi bi-person-rolodex"></i> Contact Info</div>
                <div class="card-body">
                    <ul>
                        <li>
                            Tel- 0235299999 <br>
                            E-mail - online.parkingsys.com
                        </li>
                    </ul>
                    <div class="card">
                        <div class="h3 px-3 pt-2 mb-0 text-danger"><i class="bi bi-map"></i> Address</div>
                        <div class="card-body">
                            <ul>
                                <li>
                                    2Q46+5WV, Prin. T.A.Kulkarni Vidyanagar, <br>
                                    College Rd, Nashik, <br>
                                    Maharashtra 422005
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>





</body>

</html>
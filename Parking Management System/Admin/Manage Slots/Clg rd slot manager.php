<?php

require("dbcon.php");

session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {

    echo '<script>alert("Please Login Admin !!")</script>';
    header("refresh:0.1 ; url= ../admin_login.php");
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
    <link rel="stylesheet" href="../admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    <link rel="icon" href="../../Images/parklogo-removebg-preview.png" type="image/icon type">
    <title>College Rd Slots</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>


<header class="header">




</header>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="/"><img src="../logo.jpg" class="logo"></a>
            <ul>
            <li><a href="../admin_panel.php">Home</a></li>
                <div class="dropdown">
                    <li><a href="#">Booking Logs</a></li>
                    <div class="dropdown-content">
                        <a href="../Manage Bookings/CBS Booking Logs.php">CBS Booking Logs</a>
                        <a href="../Manage Bookings/College Road Booking Logs.php">College Rd Booking Logs</a><br>
                        <a href="../Manage Bookings/Nashik Road Booking Logs.php">Nashik Rd Booking Logs</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li><a href="#">Slot Manager</a></li>
                    <div class="dropdown-content">
                        <a href="../Manage Slots/cbs slot manager.php">CBS Slot Manager</a>
                        <a href="../Manage Slots/Clg rd slot manager.php">College Rd Slot Manager</a><br>
                        <a href="../Manage Slots/Nsk rd slot manager.php">Nashik Rd Slot Manager</a>
                    </div>
                </div>
                <li><a href="../Manage_register/manage_registeration.php">Manage registeration</a></li>
                <li><a href="../Manage_contactus/manage_contactus.php">Manage Contact us</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>



        <div class="bg">
            <div class="container bg-dark text-light p-3 rounded my-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h2><i class="bi bi-card-checklist"></i> College Road Slot Manager</h2>


                </div>
            </div>
            <?php

            if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'unbook_fail') {
                    echo <<<alert
                                <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                                <strong> SET Fail! Server Down</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

            alert;
                }



                if ($_GET['alert'] == 'unbook_failed') {
                    echo <<<alert
                                <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                                <strong>Cannot set to Avalible Server Down</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

            alert;
                }
            } else if (isset($_GET['success'])) {

                if ($_GET['success'] == 'unbooked') {
                    echo <<<alert
                                <div class="container alert alert-success alert-dismissible text-center" role="alert">
                                <strong>Slot Set to Avaliable </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

            alert;
                }
            }

            ?>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <img id="scroll" src="../../Images/scroll-down.gif" width="80px" ">
                        </div>
                    </div>
                </div>
            </div>
         </div>
    
            <script>
                document.querySelector(" #scroll").addEventListener("click", ()=> {
                                window.scrollTo(0, document.body.scrollHeight);

                                })
                                </script>

            <div class="container mt-4 p-0">
                <table class="table table-hover text-center">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th width="10%" scope="col" class="rounded-start">Slot No.</th>


                            <th width="10%" scope="col">Status</th>
                            <th width="20%" scope="col" class="rounded-end">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php

                        $query = "SELECT * FROM `college_slot` WHERE `Status`='Booked' ";
                        $result = mysqli_query($con, $query);



                        while ($fetch = mysqli_fetch_assoc($result)) {

                            echo <<<product
                    <tr class="align-middle">
                    <td>$fetch[slot_number]</td>
                                 
                    <td>$fetch[Status]</td>
                    <td><button onclick="confirm_rem($fetch[slot_number])" class="btn btn-danger">Set Available</button>
                    </td>
                    </tr>
                    product;
                        }


                        ?>


                    </tbody>
                </table>

            </div>


            <script>
                function confirm_rem(id) {
                    if (confirm("Are you sure,you want to empty this slot?")) {
                        window.location.href = "Clg_crud.php?rem=" + id;
                    }
                }
            </script>

            <div class="container mt-4 p-0">
                <table class="table table-hover text-center">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th width="10%" scope="col" class="rounded-start">SLot Number</th>
                            <th width="15%" scope="col">Availability</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php

                        $query = "SELECT * FROM `college_slot`WHERE `Status`='Available' ";
                        $result = mysqli_query($con, $query);


                        while ($fetch = mysqli_fetch_assoc($result)) {

                            echo <<<product
                    <tr class="align-middle">
                    <th scope="row">$fetch[slot_number]</th>
                    <td>$fetch[Status]</td></tr>
                    product;
                        }


                        ?>


                    </tbody>

                </table>

            </div>



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
    </style>



</body>

</html>
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
    <title>Select Your Slot at College Rd</title>

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
                <li><a href="../Location/location.php">Book Slot</a></li>
                <div class="dropdown">
                    <li><a href="#">My Bookings</a></li>
                    <div class="dropdown-content">
                        <a href="../Bookings/cbs mybookings.php">My CBS Bookings Logs</a>
                        <a href="../Bookings/Clg rd mybookings.php">My College Rd Bookings Logs</a><br>
                        <a href="../Bookings/Nsk rd mybookings.php">My Nashik Rd Bookings Logs</a>
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


        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <img id="scroll" src="../Images/scroll-down.gif" width="80px" ">
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



                            <div class="container bg-dark text-light p-3 rounded my-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2><i class="bi bi-truck"></i> Slots At College Rd</h2>


                                </div>
                            </div>




                            <div class="container mt-4 p-0">
                                <table class="table table-hover text-center">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th width="10%" scope="col" class="rounded-start">SLot Number</th>
                                            <th width="15%" scope="col">Availability</th>
                                            <th width="10%" scope="col" class="rounded-end">Action</th>
                                        </tr>
                                    </thead>





                                    <tbody class="bg-white">
                                        <?php



                                        $query = "SELECT * FROM `college_slot`WHERE `Status`='Available' ";
                                        $result = mysqli_query($con, $query);
                                        $Order_id = mysqli_insert_id($con);

                                        while ($fetch = mysqli_fetch_assoc($result)) {

                                            echo <<<product
                                                <tr class="align-middle">
                                                <th scope="row">$fetch[slot_number]</th>
                                                <td>$fetch[Status]</td>       
                                                <td> <button onclick="confirm_rem($fetch[slot_number])" class="btn btn-primary">BOOK NOW</i></button>
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
                                    if (confirm("Are you sure,you want to book this slot?")) {

                                        window.location.href = "crud_college_road.php?rem=" + id;
                                    }
                                }
                            </script>


</body>

</html>
<?php

require("dbcon.php");

session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Please Login !!")</script>';
    header("refresh:0 ; url=../Login_register/signin.php");

}


if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `cbs_slot` WHERE `slot_number`='$_GET[rem]' ";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);
 
    $query="UPDATE `cbs_slot` SET `Status`='BOOKED' WHERE `slot_number`='$fetch[slot_number]'";
    if(mysqli_query($con,$query)){
        echo '<script>alert("Booking Successful !!! You Can Park now")  window.location.href = "crud_cbs.php?rem="; </script>';
        header("refresh:0.1 ; url=./final.php?rem=$_GET[rem]");
    }
    else{
        header("location: final.php?alert=booked_failed");
    }
}
else{
    echo"none";
}
?>



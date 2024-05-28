<?php

require("dbcon.php");

session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {

    echo '<script>alert("Please Login Admin !!")</script>';
    header("refresh:0.1 ; url= ../admin_login.php");
}

function book($img){
    if(unlink($img)){
        
        header("location: manage_bookings.php?alert=unbook_fail");
        exit;

    }
    
}


if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `slot` WHERE `slot_number`='$_GET[rem]' ";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);


    book($fetch['start_time']);

    $query="UPDATE `slot` SET `Status`='Available' WHERE `slot_number`='$fetch[slot_number]'";
    if(mysqli_query($con,$query)){
        header("location: manage_bookings.php?success=unbooked");
    }
    else{
        header("location: manage_bookings.php?alert=unbooked_failed");
    }
}

?>
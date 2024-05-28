<?php

require("dbcon.php");

session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginid'])) {

    echo '<script>alert("Please Login Admin !!")</script>';
    header("refresh:0.1 ; url= ../admin_login.php");
}

function row_remove($img){
    if(unlink($img)){
        
        header("location: manage_registeration.php?alert=img_rem_fail");
        exit;

    }
    
}


if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `contact` WHERE `id`='$_GET[rem]' ";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);


    row_remove($fetch['time']);

    $query="DELETE FROM `contact` WHERE `id`='$_GET[rem]'";
    if(mysqli_query($con,$query)){
        header("location: manage_contactus.php?success=removed");
    }
    else{
        header("location: manage_contactus.php?alert=remove_failed");
    }
}

?>
<?php
session_start();
require_once('include/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");

if(isset($_POST['form_submit'])){
    $full_name = $db_handle->checkValue($_POST['full_name']);
    $email = $db_handle->checkValue($_POST['email']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $message = $db_handle->checkValue($_POST['message']);

    $insert_form = $db_handle->insertQuery("INSERT INTO `contact`(`name`, `email`, `contact_no`, `message`, `inserted_at`) VALUES ('$full_name','$email','$phone','$message','$inserted_at')");
    if($insert_form){
        echo "<script>alert('Your message has been sent. Thank you!')
        window.location.href = 'Home';
</script>";
    }
}


if(isset($_POST['subscription_data'])){
    $email = $db_handle->checkValue($_POST['email']);
    $subs = $db_handle->insertQuery("INSERT INTO `subscription_data`(`subs_email`, `inserted_at`) VALUES ('$email','$inserted_at')");
    if($subs){
        echo "<script>alert('You are now registered with us. Thank you!')
        window.location.href = 'Home';
</script>";
    }
}
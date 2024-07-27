<?php

include("connection.php");

session_start();


$id = $_POST['id'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$confirmation = $_POST['confirmation'];


if ($name != '' && $dob != '' && $gender != '' && $email != '' && $phone != '' && $address != '' && $confirmation != '') {

$sql = "UPDATE admission SET name = '$name', dob = '$dob', gender = '$gender', email = '$email', phone = '$phone', address = '$address', confirmation = '$confirmation' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data Updated';
        header('Location: view.php');
        // echo 'Data Inserted';
    } else {
        echo 'something went wrong';
    }
}else{

    // header('Location: edit-data.php?='.$id);

    if($name != ''){
        $_SESSION['name'] = $_POST['name'];
    }else{
        unset ($_SESSION['name_err']);
        $_SESSION['name_err'] = 'Name field is required';
    }
    if($dob != ''){
        $_SESSION['dob'] = $_POST['dob'];
    }else{
        unset ($_SESSION['dob_err']);
        $_SESSION['dob_err'] = 'DOB field is required';
    }
    if($gender != ''){
        $_SESSION['gender'] = $_POST['gender'];
    }else{
        unset ($_SESSION['gender_err']);
        $_SESSION['gender_err'] = 'Gender field is required';
    }
    if($email != ''){
        $_SESSION['email'] = $_POST['email'];
    }else{
        unset ($_SESSION['email_err']);
        $_SESSION['email_err'] = 'Email field is required';
    }
    if($phone != ''){
        $_SESSION['phone'] = $_POST['phone'];
    }else{
        unset ($_SESSION['phone_err']);
        $_SESSION['phone_err'] = 'Phone field is required';
    }
    if($address != ''){
        $_SESSION['address'] = $_POST['address'];
    }else{
        unset ($_SESSION['address_err']);
        $_SESSION['address_err'] = 'Address field is required';
    }
    if($confirmation != ''){
        unset ($_SESSION['confirmation_err']);
        $_SESSION['confirmation_err'] = 'Confirmation field is required';
    }else{
        $_SESSION['confirmation'] = $_POST['confirmation'];
    }

    header('Location: edit-data.php?id='.$id);
    
}

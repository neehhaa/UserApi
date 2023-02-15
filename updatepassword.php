<?php

    require 'connection.php';

    $current = md5($_POST['current']);
    $new = md5($_POST['new']);
    $email = $_POST['email'];

    $checkuser = "SELECT * FROM user WHERE email = '$email' and password = '$current'";
    $result = mysqli_query($conn,$checkuser);
    
    if($result > 0){

        $updatePass = mysqli_query($conn,"UPDATE user SET password = '$new' WHERE email = '$email'");

        if($updatePass > 0){
            $response['error'] = "200";
            $response['message'] = "PASSWORD UPDATED";
        }
        else{
            $response['error'] = "400";
            $response['message'] = "PASSWORD UPDATE FAILED";
        }
    }else{
        $response['error'] = "400";
        $response['message'] = "USER DOESN'T EXIST";
    }
    echo json_encode($response);
?>
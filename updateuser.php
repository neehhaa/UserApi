<?php

    require 'connection.php';

    $id = $_REQUEST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $update_query = "UPDATE user SET username ='$username', email = '$email' WHERE id = '$id'";
    $result = mysqli_query($conn,$update_query);

    if($result > 0){
        $response['error'] = "200";
        $response['message'] = "USER UPDATED";
    }else{
        $response['error'] = "400";
        $response['message'] = "USER UPDATE FAILED";
    }
    echo json_encode($response);
?>
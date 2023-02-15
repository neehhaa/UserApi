<?php

    require 'connection.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUser = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn,$checkUser);

    if(mysqli_num_rows($result) > 0){
        $checkUserQuery = "SELECT id, username, email FROM user WHERE email = '$email' and password = '$password'";
        $resultant = mysqli_query($conn,$checkUserQuery);

        if(mysqli_num_rows($resultant) > 0){
            while($row = $resultant -> fetch_assoc()){
                $response['user'] = $row;
            }
            $response['error'] = "200";
            $response['message'] = "LOGIN SUCCESS";
        }
        else{
            $response['user'] = (object)[];
            $response['error'] = "400";
            $response['message'] = "WRONG CREDENTIALS";
        }
    }else{
        $response['user'] = (object)[];
        $response['error'] = "400";
        $response['message'] = "USER DONT EXIST";
    }

    echo json_encode($response);
?>
<?php
    require 'connection.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkUser = "SELECT * FROM user WHERE email = '$email'";
    $checkQuery = mysqli_query($conn,$checkUser);


    if(mysqli_num_rows($checkQuery) > 0){
        echo "USER ALREADY EXIST";
    }
    else{
        $insertQuery = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')";
        $result = mysqli_query($conn, $insertQuery);

        if($result){
            echo "registeration successful";
        }else{
            echo "registration failed";
        }
    }
?>
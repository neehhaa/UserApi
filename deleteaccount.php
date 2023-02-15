<?php
    require 'connection.php';

    $id = $_POST['id'];

    $deleteuser = mysqli_query($conn,"DELETE FROM user WHERE id = '$id'");

    if($deleteuser > 0){
        $response['error'] = "200";
        $response['message'] = "ACCOUNT HAS BEEN DELETED";
    }else{
        $response['error'] = "200";
        $response['message'] = "ACCOUNT NOT DELETED";
    }
    echo json_encode($response);
?>
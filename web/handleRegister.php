<?php
session_start();
include('firebasedb.php'); 

if(isset($_POST['register_btn'])) {
    $name = $_POST['users_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'phoneNumber' => $phone,
        'password' => $password,
        'displayName' => $name,
    ];

    $createdUser = null;
    echo "got here";
    try {
      $createdUser = $auth->createUser($userProperties);
    } catch (GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
    }

    if($createdUser) {
        $_SESSION['status'] = "User created successfully.";
        header('Location: register.php');
        exit();
    }
    else {
        $_SESSION['status'] = "User not created.";
        header('Location: register.php');
        exit();
    }
}
?>
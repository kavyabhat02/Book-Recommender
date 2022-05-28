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

    echo print_r($userProperties);
    $createdUser = $auth->createUser($userProperties);

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
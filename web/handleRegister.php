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
        'emailVerified' => false,
        'phoneNumber' => $phone,
        'password' => $password,
        'displayName' => $name,
    ];

    $createdUser = $auth->createUser($userProperties);

    echo "created user";
    
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
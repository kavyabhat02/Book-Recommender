<?php
session_start();
include('firebasedb.php'); 
echo "here";
if(isset($_POST['register_btn'])) {
    echo "inside";
    $name = $_POST['users_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $phone,
        'password' => '+91'.$password,
        'displayName' => $name,
    ];
    
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
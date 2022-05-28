<?php
session_start();
include('firebasedb.php'); 
if(isset($_POST['register_btn'])) {
    $name = $_POST['users_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    $request = \Kreait\Auth\Request\CreateUser::new()
    ->withUnverifiedEmail($email)
    ->withPhoneNumber('+91'.$phone)
    ->withClearTextPassword($password)
    ->withDisplayName($name);

    $createdUser = $auth->createUser($request);

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
<?php
session_start();

$email = "";
$errors = array();

$connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password1 = mysqli_real_escape_string($connect, $_POST['password']);
    $password2 = mysqli_real_escape_string($connect, $_POST['repeat']);

    if (empty($email)) {
        array_push($errors, "Email is required");
     }
    if (empty($password1)) {
        array_push($errors, "Password is required"); 
    }
   if($password1 != $password2) {
    array_push($errors, "Passwords do not match");
   }


$check = "SELECT * FROM `user` WHERE email = '$email' LIMIT 1;";
$result = mysqli_query($connect, $check);
$user = mysqli_fetch_assoc($result);

if($user)//provrava da li user postoji
 {
     if ($user['email'] === $email) {
         array_push($errors, "Email already exists");
     }
 }
if (count($errors) == 0) {
    $password = md5($password1);
    //md5 eknriptuje, u hash

$query = "INSERT INTO `user` (email, `password`) VALUES ('$email', '$password');";
mysqli_query($connect, $query);
$_SESSION['email'] = $email;
$_SESSION['succecss'] = "You are now logged in";
header("Location: ../../index.php");

}

}
?>
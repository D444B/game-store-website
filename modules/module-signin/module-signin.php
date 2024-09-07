<?php
$connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = md5(mysqli_real_escape_string($connect,$_POST['password']));

    // umesto regex-a
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
      }

    if ($email != "" && $password != ""){

        $query = "SELECT COUNT(*) AS currentUser from `user` where email ='" . $email . "' AND `password` ='" . $password . "'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);

    $query2 = "SELECT * FROM `user` where email ='" . $email . "' AND `password` ='" . $password . "'";
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_array($result2);

//----------------------------
$x = $_SERVER['PHP_SELF'];
$msg = '';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$count = $row['currentUser'];
if (@$_SESSION['signedin']) {
    if (@$_GET['leave'] == 1) {
        $_SESSION['signedin'] = 0;
       
        //header("Location: ../../index.php");
        header("location: $x");
        exit;
    }
} else {
if ($_POST) {
    // if( $_POST['email'] == 'korisnik@mail.com' && $_POST['password'] == 'korisnik')
    
    if($count > 0){
        $_SESSION['signedin'] = 1;
        $_SESSION['user_id'] = $row2['user_id'];
    if( $_POST['email'] == 'admin@admin.com' && $_POST['password'] == 'admin'){
        $_SESSION['admin'] = 1;
    }
    } else {
        $msg = "You have entered incorrect data.";
    }
//    header("Location: ../../index.php");
//    exit;
}
}
}
}?>
<?php
$_page_output = [
    'page_title' => 'Signin',
    'js' => [
        'module-signin.js'
    ],
    'css' => [
        'module-signin.css'
    ],
    'template' => 'module-signin.php'
];
?>
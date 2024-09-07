<?php
session_start();
session_destroy();
// if (isset($_SESSION['admin'])){
//     unset($_SESSION['admin']);
// }
header("Location: ../../index.php");
exit;

$_page_output = [
    'page_title' => 'Logout',
    'js' => [
        'module-logout.js'
    ],
    'css' => [
        'module-logout.css'
    ],
    'template' => 'module-logout.php'
];


?>
<?php
// OVDE NE SME DA BUDE ROOT, VEC DA DODELIM DRUGOM NALOGU PRIVILEGIJE

// $server = 'localhost';
// $user = 'root';
// $password = 'root';
// $db = 'game_store';
// $connect = mysqli_connect($server, $user, $password, $db);

$connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");


$sql = "SELECT game.game_id, game.name, company.name AS company_name FROM `game` LEFT JOIN `company` ON `game`.company_id = company.company_id;";
$category = mysqli_query($connect, $sql) or die();
?>
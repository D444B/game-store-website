<?php
// OVDE NE SME DA BUDE ROOT, VEC DA DODELIM DRUGOM NALOGU PRIVILEGIJE
$connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");
if (mysqli_connect_errno()) {
    echo "Error: " . mysqli_connect_error();
}
?>

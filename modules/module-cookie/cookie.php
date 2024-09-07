<?php
$cookie_name = "time";
$cookie_value = date("H:i:s");
setcookie($cookie_name, $cookie_value, time() + 86400, "/");
?>

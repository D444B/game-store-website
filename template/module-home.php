<?php
include(DIR_TEMPLATE . "page-htmlopen.php");
//KREIRANJE TABELE
include(DIR_MODULES . "/module-database/database.php");
include(DIR_MODULES . "/module-createtable/createtable.php");
//COOKIE
include(DIR_MODULES . "/module-cookie/cookie.php");
include(DIR_TEMPLATE . "home-content.php");
include(DIR_TEMPLATE . "page-htmlclose.php");
?>
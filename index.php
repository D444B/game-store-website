<?php
session_start();

define('DIR_ROOT', './');
define('DIR_MODULES', './modules');
define('DIR_PUBLIC', DIR_ROOT . 'public/');
define('DIR_CSS', DIR_PUBLIC . 'css/');
define('DIR_IMAGES', DIR_PUBLIC . '.images/');
define('DIR_JS', DIR_PUBLIC . 'js/');
define('DIR_TEMPLATE', DIR_ROOT . 'template/');
$_system_error = [];
$_system_message = [];

// $_system_module = $_GET['module'] ?? '';
// $_system_module_name = $_system_module == '' ? 'home' : $_system_module;

$_system_module = $_GET['module'] ?? '';
if ($_system_module == '') {
    $_system_module = 'home';
    $_system_module_name = 'home';
}
else {
    $_system_module_name = $_system_module;
}


$_system_module_filename = sprintf(
    '%s/module-%s/module-%s.php',
    DIR_MODULES,
    $_system_module,
    $_system_module_name
);

// print($_system_module_filename); 
// print(file_exists($_system_module_filename));
// exit;

if (!file_exists($_system_module_filename)) {
    $_system_module_filename = sprintf(
        '%s/modules-error404/module-error404.php',
        DIR_MODULES
    );
}
    

include($_system_module_filename);

include(DIR_TEMPLATE . "page-header.php");
include(DIR_TEMPLATE . $_page_output['template']);
include(DIR_TEMPLATE . "page-footer.php");

// include(DIR_TEMPLATE . "page-htmlopen.php");
// include(DIR_TEMPLATE . "page-header.php");
// //KREIRANJE TABELE
// include(DIR_MODULES . "/module-database/database.php");
// include(DIR_MODULES . "/module-createtable/createtable.php");
// //NAVBAR
// include(DIR_TEMPLATE . "navbar.php");
// //COOKIE
// include(DIR_MODULES . "/module-cookie/cookie.php");
// include(DIR_TEMPLATE . "home-content.php");
// include(DIR_TEMPLATE . "page-footer.php");
// include(DIR_TEMPLATE . "page-htmlclose.php");
?>

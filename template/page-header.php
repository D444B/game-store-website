<!DOCTYPE html>
<html lang="en">

<head>
    <!-- BOOTSTRAP, MOZDA BI VALJALO DA SE DOWNLOADUJE UMESTO PREKO INTERNETA -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php foreach ($_page_output['js'] as $js_filename) : ?>
        <script src="<?= DIR_JS . $js_filename ?>"></script>
    <?php endforeach; ?>



    <link rel="stylesheet" type="text/css" href="./public/css/style.css">

    <?php if (!empty($_page_output['css'])) : ?>
        <?php foreach ($_page_output['css'] as $css_filename) : ?>
            <link rel="stylesheet" href="./public/css/<?= $css_filename ?>">
    <?php endforeach;
    endif; ?>

    <title>Game Store</title>
</head>

<body>
    <div class="container-fluid">
        <div class="header">
            <h1>Game Store</h1>
        </div>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        include(DIR_TEMPLATE . "navbar.php");
        ?>
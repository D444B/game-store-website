<div class="row justify-content-center">
    <div class="nav col-sm-6 col-md-7 offset-1">
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./index.php?module=store">Store</a></li>
            <li><a href="./index.php?module=buy">Buy</a></li>
            <li><a href="./index.php?module=contact">Contact</a></li>
            <li><a href="./index.php?module=about">About</a></li>
            <?php if (@$_SESSION['admin'] == 1) { ?>
                <li><a href="./index.php?module=admin">Admin</a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="sign col-sm-5 col-md-4">
        <ul>
            <?php
        //    include(DIR_MODULES . "/module-signin/module-signin.php");
           // include './modules/module-signin/module-signin.php';
            ?>
            <?php
            if (@$_SESSION['signedin'] == 1) {
            ?>
                <li><a href="./index.php?module=profile">Profile</a></li>
                <hr>
                <li><a href="./modules/module-logout/module-logout.php">Log out</a>
                <li>
                <?php
            } else {

                ?>
                <li><a href="./index.php?module=signin">Sign in</a></li>
                <hr>
                <li><a href="./index.php?module=register">Register</a></li>
            <?php
            }
            ?>



        </ul>
    </div>
</div>
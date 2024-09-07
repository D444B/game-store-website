<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    $connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");
    $sql = "SELECT profile_image.profile_image FROM profile_image WHERE `user_id` = " . "\"" . $_SESSION['user_id'] . "\"" . " ;";
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<div class="content">


    <div class="section1 col-sm-11"></div>

    <br />


    <form class="form3" name="profile" method="post" enctype="multipart/form-data">


        <div class="abouttxt form-group row justifty-content-center">
            <div class="row">
                <input class="col-sm-4 offset-2" type="file" name="profilePhoto">
                <input class="btn btn-primary formsubmit col-sm-2" type="submit" value="Upload" name="upload">
            </div>
            <br />
            <?php if (isset($_SESSION['user_id']) && !empty($user)) {
                if (file_exists('./profilephoto/' . implode($user[0]))) { ?>
                    <img src="<?php echo './profilephoto/' . implode($user[0]); ?>" id="avatar" class="avatar" alt="profilephoto">
                <?php }
            } else { ?>
                <img src="./public/images/avatar.png" id="avatar" class="avatar" alt="profilephoto">
            <?php
            } ?>
            <?php
            if (isset($_COOKIE['time'])) {
                echo "<p>You have visited the index page at exactly " . $_COOKIE['time'] . " local time, today.</p>";
            } else {
                echo "<p>You have not visited the index page yet, visit it to see the visit time here in the future!</p>";
            }



            //  NE RADI, PROVERITI KASNIJE
            $connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");
            $sql2 = "SELECT `user`.email FROM `user` WHERE `user_id` = " . "\"" . $_SESSION['user_id'] . "\"" . " ;";
            $result2 = mysqli_query($connect, $sql2);
            $user2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            echo "<p>" . implode($user2[0]) . "</p>";


            ?>

        </div>


    </form>

</div>
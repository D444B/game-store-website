<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// $connect = mysqli_connect("localhost", "korisnik", "singidunum", "game_store");

// if(isset($_POST['upload'])) {
//    // ODAVDE RADI
  
//        // ODAVDE NISTA NE RADI TRENTUNO
// $profileImageName = time() . '-' . $_FILES["profilePhoto"]["name"];

// $dir = "../profilephoto/";
// $file = $dir . basename($profileImageName);

// if($_FILES['profilePhoto']['size'] > 20000000) {
//     echo "<p>Image should not be greater than 20000kb</p>";
// }
//     if (file_exists($file)) {
//        echo "<p>File already exists</p>";
//     }
    
// if(empty($error)) {
//     if(move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $file)) {
//         $sql = "INSERT INTO profile_image SET profile_image.profile_image = '$profileImageName', `user_id` = " . "\"" . $_SESSION['user_id'] . "\"". "  ON DUPLICATE KEY UPDATE `profile_image` = '$profileImageName';";
//         if (mysqli_query($connect, $sql)) {
//             echo "<p>Image uploaded saved<p>";
//         } else {
//             echo "<p>there was an error in the database</p>";
//             }
        
//         } else {
//             echo "<p>Error uploading the file</p>";
//         }

//     }
// }

// header("Location: ../../index.php?module=profile");

?>
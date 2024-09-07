<?php
$sql = "CREATE TABLE IF NOT EXISTS `profile_image` (
    `profile_image_id` int unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int unsigned NOT NULL,
    `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`profile_image_id`),
    UNIQUE KEY `uq_profile_image_user_id` (`user_id`),
    KEY `fk_profile_image_user_id` (`user_id`),
    CONSTRAINT `fk_profile_image_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
  );";
$category = mysqli_query($connect, $sql) or die();
?>



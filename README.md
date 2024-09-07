# game-store-website

This project uses HTML, CSS, JavaScript, PHP and SQL. It was a university project. On launch it creates tables using SQL if it doens't already exist in the same folder as index.php (and it was initally made to run with the SQL engine that HeidiSQL uses by default). There is an admin page which requires logging in with an  admin password which can be found in modules/module-signin/module-signing.php file and the default is "admin@admin.com" for email and "admin" for password. On the admin page you can add and remove games that will appear in the store (in the buy dropdown menu) and download some data as json. To use the admin account you need to have an account in the user table with the email admin@admin.com and a MD5 generated hash of the word admin (you can use online generators).  

All images were replace with a placeholder image. Submitting the contact form does nothing.

It doens't connect to the root SQL user, so it requires additional work to create a new SQL user that matches the required username and password to use SQL for this project or to change it within the code.

The required card number in the buy menu is just a 16 digit requirement, you can add any number you want, there is no real transactions being made. This website also uses cookies which was a project requirement.

Bootstrap is used as well (the version wasn't updated to the latest before uploading). The website is responsive.

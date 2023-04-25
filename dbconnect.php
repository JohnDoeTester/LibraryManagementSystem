<?php

session_start();

define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'library_system');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //db connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

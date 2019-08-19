
<?php
$connection = mysqli_connect('localhost', 'root', '');  
$connection->set_charset("utf8"); 
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'db_devhelp');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
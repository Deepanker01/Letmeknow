<?php
session_start();
$name = $_SESSION['name'];
echo " Hope to see you again". $name;
session_unset();
session_destroy();

echo "<br><br><a href='login.php'> CLICK HERE TO LOGIN </a>";
?>
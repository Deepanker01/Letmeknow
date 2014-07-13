<?php
include "conn.php";
session_start();
							$id = 	$_SESSION['userid'];
								$name = $_SESSION['name'];


$res = mysql_query("SELECT * from `user` where User_id_stu = $id");
while($row = mysql_fetch_array($res))
{


?>
<html>
<nav>
	<a href="index2.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profile.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="status.php"> CHECK APPLICATION STATUS </a> &nbsp &nbsp &nbsp<a href="logout.php"> LOGOUT </a>
</nav>
Hello <?php echo $name ?> <br> <br>

NAME: <?php echo $row['name'] ?> <br><br>

EMAIL: <?php echo $row['email'] ?><br><br>
<!-- PASS:  -->

COLLEGE: <?php echo $row['college'] ?><br><br><br>
LOCATION: <?php echo $row['location'] ?><br><br>
PHONE: <?php echo $row['phone'] ?><br><br>

<a href="change.php"> CLICK TO CHANGE </a>
</html>

<?php
}

?>
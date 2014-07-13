<?php
include "conn.php";
session_start();
							$id = 	$_SESSION['userid'];
								$name = $_SESSION['name'];


$res = mysql_query("SELECT * from `organisers` where org_id = $id");
while($row = mysql_fetch_array($res))
{


?>
<html>
<nav>
	<a href="index3.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profileO.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="postopp.php"> POST AND OPPORTUNITY </a> &nbsp &nbsp &nbsp<a href="logout.php"> LOGOUT </a>
</nav>
Hello <?php echo $name ?> <br> <br>

NAME: <?php echo $row['name'] ?> <br><br>

EMAIL: <?php echo $row['email'] ?><br><br>
<!-- PASS:  -->

COMPANY: <?php echo $row['compname'] ?><br><br><br>
WEBSITE:  <?php echo $row['website'] ?><br><br><br>
LOCATION: <?php echo $row['location'] ?><br><br>
PHONE: <?php echo $row['phone'] ?><br><br>
POINTS: <?php echo $row['points'] ?><br><br>

<a href="changeO.php"> CLICK TO CHANGE </a>
</html>

<?php
}

?>
<?php
include "conn.php";
session_start();
							$id = 	$_SESSION['userid'];
								$name = $_SESSION['name'];

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['cname']) && isset($_POST['location']) && isset($_POST['phone']) && isset($_POST['web']))
{
	$newname = $_POST['name'];
	$newemail = $_POST['email'];
	$newcompname = $_POST['compname'];
	$newlocation = $_POST['location'];
	$newphone = $_POST['phone'];
	$newweb = $_POST['web'];

$result = mysql_query("UPDATE `user` SET `name`='$newname',`email`='$newemail',`location`='$newlocation',`phone`='$newphone',`compname`='$newcompname', `website` = '$newweb' WHERE org_id = '$id'");

if($result)
	echo "VALUES CHANGED";
$_SESSION['name'] = $newname;
if((!empty($_POST['pass'])) &&(!empty($_POST['cpass'])))
{
if(isset($_POST['pass']) && isset($_POST['cpass']))
{
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
		if(!strcmp($pass,$cpass))
		{	echo "password match";

			$result2 = mysql_query("UPDATE `user` SET `pass`= '$pass' where User_id_stu = '$id'");
			if($result2)
			{
				echo "<script> alert('password changed');</script>";
			}
		}
		else
			echo "<script> alert('password don't match');</script>";
}
}
}	


$res = mysql_query("SELECT * from `organisers` where org_id = $id");
while($row = mysql_fetch_array($res))
{


?>
<html>
<!-- check this bitch -->

				<style>
				#passchange
				{
				visibility: hidden;
				}
				</style>

				<script type="text/javascript">
				function showit()
				{
				var a = document.getElementById('passchange');
				a.style.visibility = 'visible';
				}
				function hideit()
				{
					var b = document.getElementById('passchange');
					b.style.visibility = 'hidden';

				}
				</script>


<!-- check the above fucking thing bitch!!!
 -->
 <nav>
	<a href="index3.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profileO.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="postopp.php"> POST AND OPPORTUNITY </a> &nbsp &nbsp &nbsp<a href="logout.php"> LOGOUT </a>
</nav>

Hello <?php echo $_SESSION['name']; ?> <br> <br>
<form action="change.php" method="post">
NAME: <input type="text" name = "name" value="<?php echo $row['name'] ?>"> <br><br>

EMAIL: <input type="email" name="email" value="<?php echo $row['email'] ?>"><br><br>
<!-- PASS:  -->
<a onclick = "showit()" id="passschange2"> CLICK TO CHANGE CHANGE PASSWORD </a> <br><br>
<div id="passchange">
NEW PASSWORD <input type="password" name = "pass" > <br><br>
CONFIRM NEW PASSWORD: <input type="password" name = "cpass" > <br><br>
<a onclick = "hideit()" id="passchange3"> CLICK TO HIDE IT </a> <br> <br>
</div>

COMPANY NAME: <input type="text" name="cname" value="<?php echo $row['compname'] ?>"><br><br><br>
COMPANY WEBSITE: <input type="text" name="web" value="<?php echo $row['website'] ?>"><br><br><br>

LOCATION: <input type="text" name="location" value="<?php echo $row['location'] ?>"><br><br>
PHONE: <input type="text" name="phone" value="<?php echo $row['phone'] ?>"><br><br>
<input type="submit">
</form>
</html>

<?php
}

?>
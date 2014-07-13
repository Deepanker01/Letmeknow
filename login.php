<?php
include "conn.php";
		if(isset($_POST['email']) && isset($_POST['pass']) &&(!empty($_POST['role'])))
			{
			$email = $_POST['email'];
			$pass = md5($_POST['pass']);
			$role = $_POST['role'];

			echo $email;
			echo $role;
			
						if($role=="student")
						{
						$sql = "SELECT * from `user` where email='$email'";
						$res = mysql_query($sql);
						if($res)
						{
						while($row = mysql_fetch_array($res))
							{
								if(mysql_num_rows($res)>0)
								{
									echo $row['pass'];
									echo $id = $row['User_id_stu'];
									session_start();
								$_SESSION['userid'] = $id;
								$_SESSION['email'] = $row['email'];
								$_SESSION['name'] = $row['name'];
								$_SESSION['points'] = $row['points'];
											$_SESSION['role'] = $role;

									echo "<script> window.location = 'index2.php'</script>";
								}	
							} 
						}
							else
								echo "<br>NOT FOUND";
						}

				if($role=="org")
				{
				echo "hi";
				$sql2 = "SELECT * from `organisers` where email='$email'";
				$res2 = mysql_query($sql2);
				
				if($res2)
				{
				echo "hi2";
				while($row2 = mysql_fetch_array($res2))
			{	

				if(mysql_num_rows($res2)>0)
				{
		
				
				echo $row2['password'];
				
				echo $row2['org_id'];
				session_start();
								$_SESSION['userid'] = $row2['org_id'];
								$_SESSION['email'] = $row2['email'];
								$_SESSION['name'] = $row2['name'];
								$_SESSION['points'] = $row2['points'];
								$_SESSION['role'] = $role;

				echo "<script> window.location = 'index3.php'</script>";
				
				}
else
{
echo "password do not match";
}				
			}
		}
			else
			echo "<br>NOT FOUND";
				}

			}




?>


<html>

<h1> LOGIN HERE </h1>

	<form action = "login.php" method = "post">
		EMAIL : <input type = "email" name = "email" required = "true" placeholder = "Enter your Email">
		<br> <br>
		PASSWORD: <input type = "password" name= "pass" required = "true" placeholder = "Enter your Password">
		<br> <br>
		LOGIN AS <br>
		STUDENT <input type="radio" name="role" value="student"> <br>
		<br>
		ORGANISER <input type="radio" name="role" value="org"> <br>
<br>
		<input type = "submit">
	</form>

	<a href="registerO.php">REGISTER AS ORGANISATION</a> <br>
	<a href="registerS.php">REGISTER AS STUDENT</a>


</html>
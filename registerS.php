
<?php
include "conn.php";
include "core.php";



if(!loggedin())
{
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])&&isset($_POST['repass']) && isset($_POST['cname']) && isset($_POST['location']) && isset($_POST['phone']))
			{							
			$name = mysql_real_escape_string($_POST['name']);
			$email = mysql_real_escape_string($_POST['email']);
			$pass = mysql_real_escape_string(md5($_POST['pass']));
			$pass_again=mysql_real_escape_string(md5($_POST['repass']));
			$college = mysql_real_escape_string($_POST['cname']);
		    $loc = mysql_real_escape_string($_POST['location']);
			$phone = mysql_real_escape_string($_POST['phone']);
			
			
			
			if($pass!=$pass_again)
{
echo "<script> alert('Password do not Match ! Please enter same Passwords'); </script>";
}
else
{
$query2="SELECT email FROM user";
$query_run2=mysql_query($query2);

while($row4 = mysql_fetch_array($query_run2))
{
if($row4['email'] == $_POST['email'])
{
echo "<script>";
echo "alert('Email already exists')";
echo "</script>";
}
}


// 					//file upload part with getting url in database
				



// 				$allowedExts = array("gif", "jpeg", "jpg", "png");
// $temp = explode(".", $_FILES["logo"]["name"]);
// $extension = end($temp);

// if ((($_FILES["logo"]["type"] == "image/gif")|| ($_FILES["logo"]["type"] == "image/jpeg")|| ($_FILES["logo"]["type"] == "image/jpg")|| ($_FILES["logo"]["type"] == "image/pjpeg")|| ($_FILES["logo"]["type"] == "image/x-png")|| ($_FILES["logo"]["type"] == "image/png"))
// && ($_FILES["logo"]["size"] <(1024*1000))
// && in_array($extension, $allowedExts)) 
// {
//   if ($_FILES["logo"]["error"] > 0) {
//     echo "Error: " . $_FILES["logo"]["error"] . "<br>";
//       }
// 	else
// 		{
//              	$name=@$_FILES['logo']['name'];
// 					$size=$_FILES['logo']['size'];
// 					$tmp_name=@$_FILES['logo']['tmp_name'];

//                         echo "Upload: " . $_FILES["logo"]["name"] . "<br>";
//                         echo "Type: " . $_FILES["logo"]["type"] . "<br>";
//                         echo "Size: " . ($_FILES["logo"]["size"] / 1024) . " kB<br>";
//                         echo "Stored in: " . $_FILES["logo"]["tmp_name"];

// 						$location='logo/'; 
// 							if(@move_uploaded_file($tmp_name,$location.$name))
// 							{
// 							echo "<br>".$location.$name."<br>";
// 							$logo=$location.$name;

// 							echo 'UPLOADED SUCCESSFULLY';
// 							echo $location.$name;

// 							}

// 				}
// } 
// else 
// {
// 	echo "Invalid file"."<br>";
// }

//echo 'OK'; 


//file upload part ends here



//Email Part

$pass=md5($pass); // encrypted password
$activation=md5($email.time()); // encrypted email+timestamp
$count=mysql_query("SELECT User_id_stu FROM user WHERE email='$email'");
// email check
if(mysql_num_rows($count) < 1)
{
echo "lol";
$sql="INSERT INTO `user`(`User_id_stu`, `name`, `email`, `pass`,`location`, `phone`,`college`,`points`,`status`,`activation`) VALUES ('','$name','$email','$pass','$loc','$phone','$college',100,'0','$activation')";
mysql_query($sql);
// sending email
$to=$email;
$subject="Email verification from Let Me Know\r\n";
$body="Hi,  ".$name. "!  Please verify your email and get started using LET ME KNOW Account . Your Entries are monitored so please do not try to use fake details for account. However your password is encrypted for your security.\r\n";
$body.="http://127.0.0.1/deepanker/activationS.php?passkey=$activation";

mail($to,$subject,$body);
echo " <script> alert('Registration successful, please Activate through your Email within 24 Hours. Check Spam Folder Also'); </script>"; 
echo " <script> alert('Check Your Spam Folder if you don't receive the mail.'); </script>"; 

echo " <script> window.location = 'login.php'; </script>"; 

}
else
{
$msg= 'The email is already taken, please try new.'; 
}

}



}
else
{
echo "<script>";
echo "alert('please do fill all details');";
echo "</script>";
}
}
else
{
echo "<script>you are already registered and logged in</script>";
}

				
		
?>
			
			
			
			
		

<html>

<h1> LOGIN HERE </h1>

	<form action = "registerS.php" method = "post">
		NAME: <input type = "text" name= "name" required = "true" placeholder = "Enter your  Name">
	<br> <br>

		EMAIL : <input type = "email" name = "email" required = "true" placeholder = "Enter your Email">
		<br> <br>
		PASSWORD: <input type = "password" name= "pass" required = "true" placeholder = "Enter your Password">
	<br> <br>
PASSWORD: <input type = "password" name= "repass" required = "true" placeholder = "Enter your Password">
	<br> <br>
				
		PROFILE IMAGE UPLOAD : <input type= "file" name="logo" >
	<br> <br>
		LOCATION: <input type = "text" name= "location" required = "true" placeholder = "Enter your Location">
	<br> <br>
		PHONE: <input type = "text" name= "phone" required = "true" placeholder = "Enter your Contact Number">
	<br> <br>
		COLLEGE/ORGANISATION: <input type = "text" name= "cname" required = "true" placeholder = "Enter your College/Organisation">
	<br> <br>

		<input type = "submit">
		
	</form>

	

</html>
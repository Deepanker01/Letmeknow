<?php
include "conn.php";
include "core.php";



if(!loggedin())
{
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cname']) && isset($_POST['website']) && isset($_POST['location']) && isset($_POST['phone']))
			{							
			$name = mysql_real_escape_string($_POST['name']);
			$email = mysql_real_escape_string($_POST['email']);
			$pass = mysql_real_escape_string(md5($_POST['pass']));
			$pass_again=mysql_real_escape_string(md5($_POST['repass']));
			$cname = mysql_real_escape_string($_POST['cname']);
			$web = mysql_real_escape_string($_POST['website']);
			$loc = mysql_real_escape_string($_POST['location']);
			$phone = mysql_real_escape_string($_POST['phone']);
			
			
			
			if($pass!=$pass_again)
{
echo "<script> alert('Password do not Match ! Please enter same Passwords'); </script>";
}
else
{
$query2="SELECT email FROM organisers";
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

$pass=md5($pass); // encrypted password
$activation=md5($email.time()); // encrypted email+timestamp
$count=mysql_query("SELECT org_id FROM organisers WHERE email='$email'");
// email check
if(mysql_num_rows($count) < 1)
{
$sql="INSERT INTO `organisers`(`org_id`, `name`, `email`, `password`, `compname`, `website`, `location`, `phone`, `points`,`status`,`activation`) VALUES ('','$name','$email','$pass','$cname','$web','$loc','$phone',100,'0','$activation')";
mysql_query($sql);
// sending email
$to=$email;
$subject="Email verification\r\n";
$body="Hi,  ".$name. "!  Please verify your email and get started using LET ME KNOW Account . Your Entries are monitored so please do not try to use fake details for account. However your password is encrypted for your security.\r\n";
$body.="http://letmeknow.grayslab.com/activationO.php?passkey=$activation";

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

	<form action = "registerO.php" method = "post">
		NAME: <input type = "text" name= "name" required = "true" placeholder = "Enter your  Name">
	<br> <br>

		EMAIL : <input type = "email" name = "email" required = "true" placeholder = "Enter your Email">
		<br> <br>
	

		PASSWORD: <input type = "password" name= "pass" required = "true" placeholder = "Enter your Password">
	<br> <br>
		RE-PASSWORD: <input type = "password" name= "repass" required = "true" placeholder = "Enter your Password">
	<br> <br>
		COMPANY NAME: <input type = "text" name= "cname" required = "true" placeholder = "Enter your Company Name">
	<br> <br>
		WEBSITE: <input type = "text" name= "website" required = "true" placeholder = "Enter your Company Website">
	<br> <br>
		LOCATION: <input type = "text" name= "location" required = "true" placeholder = "Enter your Company Location">
	<br> <br>
		PHONE: <input type = "text" name= "phone" required = "true" placeholder = "Enter your Company Contact Number">
	<br> <br>

		<input type = "submit">
		
	</form>

	

</html>
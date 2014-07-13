<?php
session_start();
include "conn.php";
//include "core.php";

								echo $stuid = $_SESSION['userid'];
								echo $_SESSION['email']; 
								echo $_SESSION['name'];
								
								echo $_SESSION['role'];
								echo "<br><br><br>";

 if(isset($_GET['id']))
 {
 $var = $_GET['id'];
 $_SESSION['id'] = $var;
}
else
{
$var = $_SESSION['id'];
}
//$var=2;

//echo $var;
include "conn.php";
//assigning just for sample, will come from request and previous session respectively


$user = $_SESSION['userid'];

$sql = "SELECT * from `add_opp` where id= $var";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	 $name_org =  $row['name_org']."<br>";
	 $type_org = $row['type_org']."<br>";
	 $name_opp = $row['name_opp']."<br>";
	 $email = $row['email']."<br>";
	 $eligibility = $row['eligibility']."<br>";
	 $pincode = $row['pincode']."<br>";
	 $country = $row['country']."<br>";
	 $app_enddate = $row['app_enddate']."<br>";
	 $description = $row['description']."<br>";
	 $summary = $row['summary']."<br>";
	 $ref = $row['reference'] . "<br>";
}
if($ref=="1")
{	$sql2 = "SELECT * from `internships` where user_id = $var";
$result2 = mysql_query($sql2);

while($row2 = mysql_fetch_array($result2))
{
	 $type = $row2['type']."<br>";
//	 $venue = $row2['venue']."<br>";
	 //$city = $row2['city']."<br>";
	 $location = $row2['location'];
	 $duration = $row2['duration'];
	// $event_date = $row2['event_date']."<br>";
	
}
}

else if($ref=="2")
{	$sql2 = "SELECT * from `events` where user_id = $var";
$result2 = mysql_query($sql2);

while($row2 = mysql_fetch_array($result2))
{
	 $type = $row2['type']."<br>";
	 $venue = $row2['venue']."<br>";
	 $city = $row2['city']."<br>";
	 $location = $row2['location'];
	 $duration = $row2['duration'];
	 $event_date = $row2['event_date']."<br>";
	
}
}

else if($ref=="3")
{	$sql2 = "SELECT * from `sponsored_programs` where user_id = $var";
$result2 = mysql_query($sql2);

while($row2 = mysql_fetch_array($result2))
{
	 $type = $row2['type']."<br>";
	 $venue = $row2['venue']."<br>";
	 $city = $row2['city']."<br>";
	 //$location = $row2['location'];
	// $duration = $row2['duration'];
	 $event_date = $row2['event_date']."<br>";
	
}
}

else if($ref=="4")
{	$sql2 = "SELECT * from `miscellaneous` where user_id = $var";
$result2 = mysql_query($sql2);

while($row2 = mysql_fetch_array($result2))
{
	 $type = $row2['type']."<br>";
	 // $venue = $row2['venue']."<br>";
	 // $city = $row2['city']."<br>";
	 $location = $row2['location'];
	// $duration = $row2['duration'];
	 $event_date = $row2['date_occ']."<br>";
	
}
}


$result4 = mysql_query("SELECT points from `user` where User_id_stu = '$stuid'");
    		while($row4 = mysql_fetch_array($result4))
			{   echo "CURRR POINTS ARE : ";
				echo $curr_points = $row4['points'];
			}
 if(isset($_POST['submit']))
    {
    	if($curr_points>=10)
    	{
    		
			
			$curr_points = $curr_points - 10;

    	//The form has been submitted, prep a nice thank you message
    	$output = '<h1>Thanks for your file and message! Greetings From Let Me Know</h1>';
    	//Set the form flag to no display (cheap way!)
    	$flags = 'style="display:none;"';

    	//Deal with the email
    	$to = $email;
    	$subject = 'APPLICATION FOR THE OPPORTUNITY YOU POSTED ON LET ME KNOW';

    	$message = "Here is the Application by ". $_SESSION['name'] . " with Email Id as " .$_SESSION['email']." Who wants to apply at your firm for the opportunity posted as " .$name_opp. "Personal Message from the applicant :     " .strip_tags($_POST['message']) . " Link for the opportunity is http://127.0.0.1/deepanker/samplefetch.php?id=".$var;
    	@$attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
    	$filename = $_FILES['file']['name'];

    	$boundary =md5(date('r', time())); 

    	$headers = "From: Let Me Know\r\nReply-To: webmaster@example.com";
    	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

    	$message="This is a multi-part message in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";

    	mail($to, $subject, $message, $headers);
   
  $result3 = mysql_query("UPDATE `user` SET `points`='$curr_points' WHERE User_id_stu = '$stuid'");

if($result3)
{	echo "<script> alert('10 POINTS DEDUCTED');</script>";
}
else
echo "KUCH NHI HUA";



    }
    else
    	echo "<script> alert( 'POINTS KAM HAIN') </script>";

}
?>
<html>
<nav>
	<a href="index2.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profile.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="status.php"> CHECK APPLICATION STATUS </a> &nbsp &nbsp &nbsp <a href="logout.php">LOGOUT </a>
</nav>
<h2>LET ME KNOW </h2>
<h5> NAME OF OPPORTUNITY : <span style="color:red"><?php echo $name_opp; ?> </span> </h5>

<h5> NAME OF ORGANISATION : <span style="color:red"><?php echo $name_org; ?> </span> </h5>

<h5> TYPE OF ORGANISATION : <span style="color:red"><?php echo $type_org; ?> </span> </h5>

<h5> ELIGIBILITY : <span style="color:red"><?php echo $eligibility; ?> </span> </h5>


<h5> PINCODE : <span style="color:red"><?php  if(isset($pincode))echo $pincode; ?> </span> </h5>

<h5> COUNTRY : <span style="color:red"><?php if(isset($pincode)) echo $country; ?> </span> </h5>

<h5> CITY : <span style="color:red"><?php if(isset($city)) echo $city; ?> </span> </h5>

<h5> EVENT DATE : <span style="color:red"><?php if(isset($event_date)) echo $event_date; ?> </span> </h5>

<h5> DEADLINE : <span style="color:red"><?php echo $app_enddate; ?> </span> </h5>

<h5> DESCRIPTION : <span style="color:red"><?php echo $description; ?> </span> </h5>

<h5> SUMMARY : <span style="color:red"><?php echo $summary; ?> </span> </h5>

WANT TO APPLY NOW? SEND A MAIL <br>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
<p><label for="message">Message</label> <textarea name="message" id="message" cols="20" rows="8"></textarea></p>
<p><label for="file">File</label> <input type="file" name="file" id="file"></p>

<p><input type="submit" name="submit" id="submit" value="send"></p>

<!-- it should send a mail with user email id in the body and few more lines. subject: application via lmk attachments and to the email fetched from the db
 -->
</html>
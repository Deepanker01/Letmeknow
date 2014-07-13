<?php
include "conn.php";

if(isset($_GET['hello']))
{
	doc();
}
function doc()
{
// $sql = "SELECT * from `add_opp` where id= 2";
// $result = mysql_query($sql);
// while($row = mysql_fetch_array($result))
// {
// 	echo $name_org =  $row['name_org']."<br>";
// 	echo $type_org = $row['type_org']."<br>";
// 	echo $name_opp = $row['name_opp']."<br>";
// 	echo $email = $row['email']."<br>";
// 	echo $eligibility = $row['eligibility']."<br>";
// 	echo $pincode = $row['pincode']."<br>";
// 	echo $country = $row['country']."<br>";
// 	echo $app_enddate = $row['app_enddate']."<br>";
// 	echo $description = $row['description']."<br>";
// 	echo $summary = $row['summary']."<br>";
// }
	
	echo "hello World";
}
?>

<html>

<a href = "samplefetch.php?id=2"> HEllo </a>
</html>
<?php

$q = $_GET['q'];

require "conn.php";
$q=trim($q);

$sql="SELECT * FROM add_opp where keywords like '%$q%' " ;

$result = mysql_query($sql);


	if($result === FALSE) {
	    die(mysql_error()); // TODO: better error handling
	}
	

while($row = mysql_fetch_array($result))
  {
  $id=$row['id'];
  echo '<a href="samplefetch.php?id='.$id.'">'.$row['name_opp'].'</a>'."<br>";
  
  }
  
 

?>
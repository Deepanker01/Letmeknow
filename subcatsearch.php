<?php

$q = $_GET['q'];

require "conn.php";


$sql="SELECT * FROM internships join add_opp on internships.type='$q' and internships.user_id=add_opp.id" ;

$result = mysql_query($sql);


echo "<table border='1' cellpadding='11' id='table' style=' height: 10%; width: 100%' ;float:center;'>
<tr>
<th>Name</th>
<th>Organisation</th>
<th>Branch</th>
<th>Location</th>
<th>Type</th>
<th>Duration</th>	
<th>Deadline</th>
<th>start_date</th>
<th>end_date</th>
<th>stipend</th>

</tr>";
	if($result === FALSE) {
	    die(mysql_error()); // TODO: better error handling
	}
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name_opp'] . "</td>";
  echo "<td>" . $row['name_org'] . "</td>";
  echo "<td>" . $row['inter_bra'] . "</td>";
  echo "<td>". $row['location']. "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['duration'] . "</td>";
  echo "<td>" . $row['deadline'] . "</td>";
  echo "<td>" . $row['opp_start_date'] . "</td>";
  echo "<td>" . $row['opp_end_date'] . "</td>";
  echo "<td>" . $row['stipend'] . "</td>";
  }
  
  
echo "</table>";

?>
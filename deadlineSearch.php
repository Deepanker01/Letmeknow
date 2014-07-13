<?php

$q = $_GET['q'];

require "conn.php";


$sql="SELECT * FROM add_opp WHERE deadline < '$q'" ;

$result = mysql_query($sql);


echo "<table border='1' cellpadding='11' id='table' style=' height: 10%; width: 100%' ;float:center;'>
<tr>
<th>Name</th>
<th>Orgaisation</th>
<th>Type</th>
<th>Start date</th>
<th>End Date</th>	
<th>Deadline</th>
<th>Website</th>
<th>Stipend</th>

</tr>";
	if($result === FALSE) {
	    die(mysql_error()); // TODO: better error handling
	}
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name_opp'] . "</td>";
  echo "<td>" . $row['name_org'] . "</td>";
  if ($row['reference']=='1')
echo "<td>"."Internship"."</td>";
else if($row['reference']=='2')
  echo "<td>"."Event". "</td>";
else if($row['reference']=='3')
  echo "<td>"."Sponsered Program". "</td>";
else if($row['reference']=='4')
  echo "<td>"."Miscellaneus". "</td>";
  echo "<td>" . $row['opp_start_date'] . "</td>";
  echo "<td>" . $row['opp_end_date'] . "</td>";
  echo "<td>" . $row['deadline'] . "</td>";
  echo "<td>" . $row['website_opp'] . "</td>";
  echo "<td>" . $row['stipend'] . "</td>";
  }
  
  
echo "</table>";

?>
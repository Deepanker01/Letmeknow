<html>
<head>
</head>
<script>
function getVote($value) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll2").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sub_categories.php?internship="+$value,true);
  xmlhttp.send();
}
</script>
</html>


<?php

$vote = $_REQUEST['vote'];



if ($vote == "internships") 
 { 
  
  
  echo '<input type="radio" name="internship" value="1" onclick="getVote(this.value)">1.Engineering<br>';
 
  echo '<input type="radio" name="internship" value="2" onclick="getVote(this.value)">2.Commerce and Arts<br>';
  echo '<input type="radio" name="internship" value="3" onclick="getVote(this.value)">3.Business and Management<br>';
  echo '<input type="radio" name="internship" value="4" onclick="getVote(this.value)">4.Miscellaneus<br>';

  
  }
else if ($vote == "sponsered_programs") {
  
  }

else if ($vote == "sponsered_programs") {
  
  
  }
else if ($vote == "events") {
  
  }
else  {

  }
?>
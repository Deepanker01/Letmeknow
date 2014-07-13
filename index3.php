<?php
include "conn.php";
?>

<html>
<style>
a
{
	text-decoration: none;
	color: green;
}
a:visited
{
	color: red;
}

a:hover
{
color: yellow;

}
</style>
<h2 align="center">LET ME KNOW</h2>
<nav>
	<a href="index3.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profileO.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="postopp.php"> POST AN OPPORTUNITY </a> &nbsp &nbsp &nbsp<a href="logout.php"> LOGOUT </a>
</nav>
<?php
echo "<br><br>LISTED OPPORTUNITIES <br> <br><br>";
echo "<br><br>EVENTS <br> <br><br>";

$res = mysql_query("SELECT * FROM `events`");
// $i=5;
// while($i>0)
// {
//echo $i;
 while($row = mysql_fetch_array($res))
{  $id  = $row['user_id'];
$name = $row['name'];
// echo "
// <a href='samplefetch.php?id=".$id."'>" .$name . "</a>";
echo "<br>";
?>

<h2 onclick = " alert(name click');"> <?php echo $name ?> </h2>
<h3><a style="underline:none" href="samplefetch.php?id=<?php echo $id ?>"> <?php echo $name ?> </a></h3>

<hr>
<?php
}
?>

<?php
echo "<br><br>INTERNSHIPS <br> <br><br>";

$res2 = mysql_query("SELECT * FROM `internships`");
// $i=5;
// while($i>0)
// {
//echo $i;
 while($row2 = mysql_fetch_array($res2))
{  $id  = $row2['user_id'];
$name = $row2['name'];
// echo "
// <a href='samplefetch.php?id=".$id."'>" .$name . "</a>";
echo "<br>";
?>

<h2 onclick = " alert(name click');"> <?php echo $name ?> </h2>
<h3><a style="underline:none" href="samplefetch.php?id=<?php echo $id ?>"> <?php echo $name ?> </a></h3>

<hr>
<?php
}
?>

<?php
echo "<br><br>MISCELLANEUS <br> <br><br>";

$res2 = mysql_query("SELECT * FROM `miscellaneus`");
// $i=5;
// while($i>0)
// {
//echo $i;
 while($row2 = mysql_fetch_array($res2))
{  $id  = $row2['user_id'];
$name = $row2['name'];
// echo "
// <a href='samplefetch.php?id=".$id."'>" .$name . "</a>";
echo "<br>";
?>

<h2 onclick = " alert('name click');"> <?php echo $name ?> </h2>
<h3><a style="underline:none" href="samplefetch.php?id=<?php echo $id ?>"> <?php echo $name ?> </a></h3>

<hr>
<?php
}
?>

<?php
echo "<br><br>SPONSORED PROGRAMS <br> <br><br>";

$res2 = mysql_query("SELECT * FROM `sponsered_programs`");
// $i=5;
// while($i>0)
// {
//echo $i;
 while($row2 = mysql_fetch_array($res2))
{  $id  = $row2['user_id'];
$name = $row2['name'];
// echo "
// <a href='samplefetch.php?id=".$id."'>" .$name . "</a>";
echo "<br>";
?>

<h2 onclick = " alert('name click');"> <?php echo $name ?> </h2>
<h3><a style="underline:none" href="samplefetch.php?id=<?php echo $id ?>"> <?php echo $name ?> </a></h3>

<hr>
<?php
}
?>
 <script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","nameSearch.php?q="+str,true);
xmlhttp.send();
}
</script>
 <script>
function showUser2(str)
{
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","orgSearch.php?q="+str,true);
xmlhttp.send();
}
</script>


 <script>
function showUser3(str)
{
if (str=="")
  {
  document.getElementById("txtHint3").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","deadlineSearch.php?q="+str,true);
xmlhttp.send();
}


 </script>

 <script>
function keywordSearch(str)
{
if (str=="")
  {
  document.getElementById("keyword").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("keyword").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","keywordsSearch.php?q="+str,true);
xmlhttp.send();
}


 </script>
 <script>
function showUser4(str)
{
if (str=="")
  {
  document.getElementById("txtHint4").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint4").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","catSearch.php?q="+str,true);
xmlhttp.send();
}
</script>
 <script>
function showUser5(str)
{
if (str=="")
  {
  document.getElementById("txtHint5").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
    document.getElementById("txtHint5").innerHTML=xmlhttp.responseText;
      }
   }
xmlhttp.open("GET","subcatSearch.php?q="+str,true);
xmlhttp.send();
}
</script>
<form method="GET"> 

Filters :
Keyword search:
Enter keywords like eg :"profile","with stipend","work at home"
<input type="text" onkeyup="keywordSearch(this.value)">
</form>
<div id="keyword"></div>


<form method="GET">
<h1>Search Options</h1> 

Filters :
search opportunity  by: Categories
<select  onchange="showUser4(this.value)">
<option value="">select your category</option>
<option value="1">internships</option>
<option value="2">events</option>
<option value="3">sponsered programs</option>
<option value="4">miscellaneus</option>
</select>


</form>
<div id="txtHint4">Your opportunities will be listed here </div>
<form method="GET">
<h1>Search Options</h1>

Filters :
search opportunity  by: Subcategories
<select  onchange="showUser5(this.value)">
<option value="">select your category</option>
<option value="engineering">Engineering</option>
<option value="commerce_and_arts">Commerce and Arts</option>
<option value="business_and_management">Buisness and Management</option>
<option value="miscellaneus">Miscellaneus</option>
</select>

</form>
<div id="txtHint5">Your opportunities will be listed here </div>

<form method="GET">
<h1>Advance Search Options</h1>

Filters :
search opportunity  by: name 
<input type = "text" placeholder = " Search for your Opportunity"  onkeyup="showUser(this.value)">

</form>
<div id="txtHint">Your opportunities will be listed here </div>
<form method="GET">
Filters :
search opportunity  by: Organisation 
<input type = "text" placeholder = " Search for your Opportunity"  onkeyup="showUser2(this.value)">

</form>
<div id="txtHint2">Your opportunities will be listed here </div>
<form method="GET">
Filters :
search opportunity  by: Deadline 
<input type = "date" placeholder = " Search for your Opportunity"  onkeyup="showUser3(this.value)">

</form>
<div id="txtHint3">Your opportunities will be listed here </div>






</html>





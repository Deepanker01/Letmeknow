<html>
<head>
</head>

</html>


<?php
$vote = $_REQUEST['internship'];



if ($vote == "1") {
  
  
  echo '<select name="branch">';
  echo '<option value="cse">Computer Science</option>';
  echo '<option value="mac">Machanical</option>';
  echo '<option value="che">Chemical</option>';
  echo '<option value="met">Metallurgical</option>'
  echo '<option value="civil">Civil</option>';
  echo '<option value="eee">Electronics and Electrical(EEE)</option>';
  echo '<option value="ece">Electronics and Communication</option>';
  echo '<option value="it">Information Technology</option>';
  echo '<option value="ae">Aeronautical Engineering</option>';
 echo ' any other :<input type="text" name="other_branch">';
 
  
echo '</select>';

echo '<br><br><br><br>';


echo 'Duration :(in months) :<input type="text" name="duration"><br>';
<?

 
  
  
  }
else if ($vote == "2") {
  
  }

else if ($vote == "3") {
 
  
  }
else if ($vote == "4") {
  
  }
else  {

  }
?>
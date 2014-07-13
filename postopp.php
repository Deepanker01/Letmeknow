<?php
include "conn.php";
session_start();

 echo $orgid = $_SESSION['userid'] ;
 echo "<br>";

echo $orgemail = $_SESSION['email'];
echo "<br>";

echo $orgname = $_SESSION['name'] ;
	 	
echo "<br>";

$presult = mysql_query("SELECT points from `organisers` where org_id = '$orgid'");
while($prow = mysql_fetch_array($presult))
{
	$curr_points = $prow['points'];
}
echo " Your current points are". $curr_points ; echo "<br>";

if(isset($_POST['name_org'])&&isset($_POST['type_org'])&&isset($_POST['name_opp'])&&isset($_POST['email'])&&isset($_POST['email2'])&&isset($_POST['eligibility'])
&&isset($_POST['loc'])&&isset($_POST['featured'])&&isset($_POST['flag'])&&isset($_POST['app_date'])&&isset($_POST['app_enddate'])&&isset($_POST['start_date'])&&isset($_POST['end_date'])
&&isset($_POST['deadline'])&&isset($_POST['summary'])&&isset($_POST['description'])&&isset($_POST['pincode'])&&(isset($_POST['web_opp']))&&(isset($_POST['stipend']))||(isset($_POST['keywords'])))
{
					$name_org=$_POST['name_org'];
					$type_org=$_POST['type_org'];

					$s=implode(',',$type_org);
					echo $s.'<br>';

					$name_opp=$_POST['name_opp'];
					$email=$_POST['email'];
					$email2=$_POST['email2'];
					$eligibility=$_POST['eligibility'];
					$eligi=implode(',',$eligibility);
					echo $eligi;

					$loc=$_POST['loc'];
					$featured=$_POST['featured'];
					$flag=$_POST['flag'];
					$app_date=$_POST['app_date'];
					$app_enddate=$_POST['app_enddate'];
					$start_date=$_POST['start_date'];
					$end_date=$_POST['end_date'];
					$deadline=$_POST['deadline'];
					$summary=$_POST['summary'];
					$description=$_POST['description'];
					$country=$_POST['country'];
					$pincode=$_POST['pincode'];
					$web_opp=$_POST['web_opp'];
					$stipend=$_POST['stipend'];
					
					
					$keywords=$_POST['keywords'];
					
					$rand=rand(1000000000,9999999999);


					
					//points deduction
					$curr_points = $curr_points - 10;
								$red = mysql_query("UPDATE `organisers` SET points = '$curr_points' where org_id = '$orgid'");
								if($red)
								{
									echo "<script> alert('POINTS DEDUCTED'); </script>";
								}
							
					

					//file upload part with getting url in database
				



				$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["logo"]["name"]);
$extension = end($temp);

if ((($_FILES["logo"]["type"] == "image/gif")|| ($_FILES["logo"]["type"] == "image/jpeg")|| ($_FILES["logo"]["type"] == "image/jpg")|| ($_FILES["logo"]["type"] == "image/pjpeg")|| ($_FILES["logo"]["type"] == "image/x-png")|| ($_FILES["logo"]["type"] == "image/png"))
&& ($_FILES["logo"]["size"] <(1024*1000))
&& in_array($extension, $allowedExts)) 
{
  if ($_FILES["logo"]["error"] > 0) {
    echo "Error: " . $_FILES["logo"]["error"] . "<br>";
      }
	else
		{
             	$name=@$_FILES['logo']['name'];
					$size=$_FILES['logo']['size'];
					$tmp_name=@$_FILES['logo']['tmp_name'];

                        echo "Upload: " . $_FILES["logo"]["name"] . "<br>";
                        echo "Type: " . $_FILES["logo"]["type"] . "<br>";
                        echo "Size: " . ($_FILES["logo"]["size"] / 1024) . " kB<br>";
                        echo "Stored in: " . $_FILES["logo"]["tmp_name"];

						$location='logo/'; 
							if(@move_uploaded_file($tmp_name,$location.$name))
							{
							echo "<br>".$location.$name."<br>";
							$logo=$location.$name;

							echo 'UPLOADED SUCCESSFULLY';
							echo $location.$name;

							}

				}
} 
else 
{
	echo "Invalid file"."<br>";
}

//echo 'OK'; 


//file upload part ends here



//if(!empty($name_org)&&!empty($type_org)&&!empty($name_opp)&&!empty($email)&&!empty($eligibility)&&!empty($location)&&!empty($featured)&&!empty($flag)&&!empty($appl_date)&&!empty($app_enddate)&&!empty($start_date)&&!empty($end_date)&&!empty($deadline)&&!empty($summary)&&!empty($description))
//{




// nested if else if radio button slected is insternship with in internship ... nested selection for engineering commerce ...end so on radio buttons.
if(isset($_POST['vote']))
{

		if($_POST['vote']=="internships")
					{
						if(isset($_POST['internship']))
							{
								$internship=$_POST['internship'];
								while(true)
								{
								$result=mysql_query("select * from add_opp where id='$rand'");
								
								
										if(mysql_num_rows($result)==0)
										{
											$query="INSERT INTO `add_opp`(`id`,`name_org`,`type_org`,`name_opp`, `logo`, `email`, `email2`,`eligibility`, `location`,`pincode`,`country`,`featured_opt`, `flag`, `app_date`, `app_enddate`, `opp_start_date`, `opp_end_date`, `deadline`, `description`, `summary`,`reference`,`website_opp`,`stipend`,`email_status`,`org_id`,`keywords`) VALUES ('$rand','$name_org','$s','$name_opp','$logo','$email','$email2','$eligi','$loc','$pincode','$country','$featured','$flag','$app_date','$app_enddate','$start_date','$end_date','$deadline','$description','$summary','1','$web_opp','$stipend','0','$orgid','$keywords')";
											$r=mysql_query($query);
												if($r)
													{
														echo "successfully inserted"."<br>";
													}
												else
													{
														echo '1 .innsertion doesnt work'.'<br>';
													}
											break;
										}
										else
										{
										$rand=rand(1000000000,9999999999);
										
										}
								}



									if($internship=='engineering')
										{
										     echo "1"."<br>";
													if(isset($_POST['eng_branch'])||isset($_POST['eng_other_branch'])||isset($_POST['eng_duration'])||isset($_POST['eng_url']))
													    {
														echo "2"."<br>";
																	$eng_branch=$_POST['eng_branch'];
																	$eng_other_branch=$_POST['eng_other_branch'];
																	$eng_duration=$_POST['eng_duration'];
																	$eng_url=$_POST['eng_url'];
																	$eng_location=$_POST['eng_location'];
																	if($eng_branch!='')
																       {
																	   echo "3"."<br>";
																		$eng_query_intern="INSERT INTO `internships`(`user_id`, `duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$eng_duration','$eng_branch','$eng_location','$internship','$eng_url','$name_opp','$keywords')";
																		$t=mysql_query($eng_query_intern);
																		if($t)
																          {
																            echo "engineering query works"."<br>";
																          }
																		  else
																		  {
																			echo "eng query not working";
																		  }
																        }
																    else if($eng_other_branch!='')
																			{
																			$eng_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$eng_duration','$eng_other_branch','$eng_location','$internship','$eng_url','$name_opp','$keywords')";
																			$t=mysql_query($eng_query_intern);
																			if($t)
																			{
																			echo "engineering query works"."<br>";
																			}
																			}
																			}
									    }

									else if($internship=='commerce_and_arts')
										{
											if(isset($_POST['com_branch'])||isset($_POST['com_other_branch'])||isset($_POST['com_duration'])||isset($_POST['com_url']))
												{
													$com_branch=$_POST['com_branch'];
													$com_other_branch=$_POST['com_other_branch'];
													$com_location=$_POST['com_location'];
													$com_duration=$_POST['com_duration'];
													$com_url=$_POST['com_url'];
															if($com_branch!='')
																{
																  $com_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$com_duration','$com_branch','$com_location','$internship','$com_url','$name_opp','$keywords')";
																  $t=mysql_query($com_query_intern);
															         if($t)
																       {
																        echo 'comm query worked!'.'<br>';
																       }
																}
															else if($com_other_branch!='')
																{
																	$com_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$com_duration','$com_other_branch','$com_location','$internship','$com_url','$name_opp',`$keywords`)";
																	$t=mysql_query($com_query_intern);
																	if($t)
																	{
																	echo "comm query works"."<br>";
																	}
																	}
												}
										}


								else if($internship=='business_and_management')
									{
										if(isset($_POST['man_branch'])||isset($_POST['man_other_branch'])||isset($_POST['man_duration'])||isset($_POST['man_url']))
											{
												$man_branch=$_POST['man_branch'];
												$man_other_branch=$_POST['man_other_branch'];
												$man_location=$_POST['man_location'];
												$man_duration=$_POST['man_duration'];
												$man_url=$_POST['man_url'];
													if($man_branch!='')
														{
															$com_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$man_duration','$man_branch','$man_location','$internship','$man_url','$name_opp','$keywords')";
															$t=mysql_query($com_query_intern);
																if($t)
																	{
																echo 'man query worked!'.'<br>';
																	}
														}
													else if($man_other_branch!='')
														{
															$man_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$man_duration','$man_other_branch','$man_location','$internship','$man_url','$name_opp','$keywords')";
															$t=mysql_query($man_query_intern);
																if($t)
																	{
																echo "man query works"."<br>";
																	}
														}
											}
									}	
							    else if($internship=='miscellaneus')
								    {
										if(isset($_POST['mis_branch'])||isset($_POST['mis_other_branch'])||isset($_POST['mis_duration'])||isset($_POST['mis_url']))
											{


												$mis_branch=$_POST['mis_branch'];
												$mis_other_branch=$_POST['mis_other_branch'];
												$mis_duration=$_POST['mis_duration'];
												$mis_location=$_POST['mis_location'];
												$mis_url=$_POST['mis_url'];
													if($mis_branch!='')
														{
															$mis_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$mis_duration','$mis_branch','$mis_location','$internship','$mis_url','$name_opp','$keywords')";
															$t=mysql_query($mis_query_intern);
																if($t)
																	{
																		echo 'mis query worked!'.'<br>';
																	}
														}
													else if($mis_other_branch!='')
														{
															$com_query_intern="INSERT INTO `internships`(`user_id`,`duration`, `inter_bra`, `location`, `type`, `any_url`,`name`,`keywords`) VALUES ('$rand','$mis_duration','$mis_other_branch','$mis_location','$internship','$mis_url','$name_opp','$keywords')";
															$t=mysql_query($mis_query_intern);
															if($t)
																{
																echo "mis query works"."<br>";
																}
														}
											}
									}
								else
								{
								echo "none selected. Please select atleast one internship"."<br>";
								}
							}


					}
         else if($_POST['vote']=="events")
				    {


						if(isset($_POST['events']))
							{
								$event=$_POST['events'];
								while(true)
								{
								$result=mysql_query("select * from add_opp where id='$rand'");
								
								
										if(mysql_num_rows($result)==0)
										{
											$query="INSERT INTO `add_opp`(`id`,`name_org`,`type_org`,`name_opp`, `logo`, `email`, `email2`,`eligibility`, `location`,`pincode`,`country`,`featured_opt`, `flag`, `app_date`, `app_enddate`, `opp_start_date`, `opp_end_date`, `deadline`, `description`, `summary`,`reference`,`website_opp`,`stipend`,`email_status`,`org_id`,`keywords`) VALUES ('$rand','$name_org','$s','$name_opp','$logo','$email','$email2','$eligi','$loc','$pincode','$country','$featured','$flag','$app_date','$app_enddate','$start_date','$end_date','$deadline','$description','$summary','2','$web_opp','$stipend','0','$orgid','$keywords')";
											$r=mysql_query($query);
												if($r)
													{
														echo "successfully inserted"."<br>";
													}
												else
													{
														echo '1 .innsertion doesnt work'.'<br>';
													}
											break;
										}
										else
										{
										$rand=rand(1000000000,9999999999);
										
										}
								}
										if($event=='webinars')
											{
													if(isset($_POST['web_city'])&&isset($_POST['web_person'])&&isset($_POST['web_date'])&&isset($_POST['web_url'])&&isset($_POST['web_name'])&&isset($_POST['web_venue']))
															{
																$web_city=$_POST['web_city'];
																$web_person=$_POST['web_person'];
																$web_url=$_POST['web_url'];
																$web_date=$_POST['web_date'];
																$web_name=$_POST['web_name'];
																$web_venue=$_POST['web_venue'];
																
																$web_query="INSERT INTO `events`(`user_id`,`type`, `event_name`, `venue`, `city`, `event_date`, `contact_person`, `any_url`,`name`,`keywords`) VALUES ('$rand','$event','$web_name','$web_venue','$web_city','$web_date','$web_person','$web_url','$name_opp','$keywords')";
																	$t=mysql_query($web_query);
																		if($t)
																			{
																		echo "webinar query works";
																			}
															}
											}

										else if($event=='compititions')
											{
													if(isset($_POST['comp_city'])&&isset($_POST['comp_person'])&&isset($_POST['comp_date'])&&isset($_POST['comp_url'])&&isset($_POST['comp_name'])&&isset($_POST['comp_venue']))
															{
																		$comp_city=$_POST['comp_city'];
																		$comp_person=$_POST['comp_person'];
																		$comp_url=$_POST['comp_url'];
																		$comp_date=$_POST['comp_date'];
																		$comp_name=$_POST['comp_name'];
																		$comp_venue=$_POST['comp_venue'];
																		$comp_query="INSERT INTO `events`(`user_id`,`type`, `event_name`, `venue`, `city`, `event_date`, `contact_person`, `any_url`,`name`,`keywords`) VALUES ('$rand','$event','$comp_name','$comp_venue','$comp_city','$comp_date','$comp_person','$comp_url','$name_opp',`$keywords`)";
																		$t=mysql_query($comp_query);
																		if($t)
																		{
																		echo "compitions query works";
																		}
															}
											}
									   else if($event=='miscellaneus')
											{
													if(isset($_POST['mis_city'])&&isset($_POST['mis_person'])&&isset($_POST['mis_date'])&&isset($_POST['mis_url'])&&isset($_POST['mis_name'])&&isset($_POST['mis_venue']))
															{
																		$mis_city=$_POST['mis_city'];
																		$mis_person=$_POST['mis_person'];
																		$mis_url=$_POST['mis_url'];
																		$mis_date=$_POST['mis_date'];
																		$mis_name=$_POST['mis_name'];
																		$mis_venue=$_POST['mis_venue'];
																		$mis_query="INSERT INTO `events`(`user_id`,`type`, `event_name`, `venue`, `city`, `event_date`, `contact_person`, `any_url`,`name`,`keywords`) VALUES ('$rand','$event','$mis_name','$mis_venue','$mis_city','$mis_date','$mis_person','$mis_url','$name_opp','$keywords')";
																		$t=mysql_query($mis_query);
																		if($t)
																		{
																		echo "miscellaneus query works";
																		}
															}
										    }
										else if($event=="workshops")
											{
															if(isset($_POST['work_city'])&&isset($_POST['work_person'])&&isset($_POST['work_date'])&&isset($_POST['work_url'])&&isset($_POST['work_name'])&&isset($_POST['work_venue']))
															{
															$work_city=$_POST['work_city'];
															$work_person=$_POST['work_person'];
															$work_url=$_POST['work_url'];
															$work_date=$_POST['work_date'];
															$work_name=$_POST['work_name'];
															$work_venue=$_POST['work_venue'];
															$work_query="INSERT INTO `events`(`user_id`,`type`, `event_name`, `venue`, `city`, `event_date`, `contact_person`, `any_url`,`name`,`keywords`) VALUES ('$rand','$event','$work_name','$work_venue','$work_city','$work_date','$work_person','$work_url','$name_opp','$keywords')";
															$t=mysql_query($work_query);
															if($t)
															{
															echo "workshop query works";
															}
															}
											}
							}
					}
         else if($_POST['vote']=="sponsered_programs")
					{
							if(isset($_POST['sponsered']))
								{


					while(true)
								{
								$result=mysql_query("select * from add_opp where id='$rand'");
								
								
										if(mysql_num_rows($result)==0)
										{
											$query="INSERT INTO `add_opp`(`id`,`name_org`,`type_org`,`name_opp`, `logo`, `email`, `email2`,`eligibility`, `location`,`pincode`,`country`,`featured_opt`, `flag`, `app_date`, `app_enddate`, `opp_start_date`, `opp_end_date`, `deadline`, `description`, `summary`,`reference`,`website_opp`,`stipend`,`email_status`,`org_id`,`keywords`) VALUES ('$rand','$name_org','$s','$name_opp','$logo','$email','$email2','$eligi','$loc','$pincode','$country','$featured','$flag','$app_date','$app_enddate','$start_date','$end_date','$deadline','$description','$summary','3','$web_opp','$stipend','0','$orgid','$keywords')";
											$r=mysql_query($query);
												if($r)
													{
														echo "successfully inserted"."<br>";
													}
												else
													{
														echo '1 .innsertion doesnt work'.'<br>';
													}
											break;
										}
										else
										{
										$rand=rand(1000000000,9999999999);
										
										}
								}
											
										
											if(isset($_POST['sponsered'])||isset($_POST['spon_venue'])||isset($_POST['spon_date'])||isset($_POST['spon_url']))
													{
															$sponsered=$_POST['sponsered'];
															$spon_venue=$_POST['spon_venue'];
															$spon_date=$_POST['spon_date'];
															$spon_url=$_POST['spon_url'];
															$query_sponsered="INSERT INTO `sponsered_programs`(`user_id`, `url`, `type`, `venue`, `date`,`name`,`keywords`) VALUES ('$rand','$spon_url','$sponsered','$spon_venue','$spon_date','$name_opp','$keywords')";
															$t=mysql_query($query_sponsered);
															if($t)
															{
															echo "sponsered  query works"."<br>";
															}
													}

														
				               }
							 else
								{
								echo "please select a sponsered type"."<br>";
								}
					}			  
					
		else if($_POST['vote']=="miscellaneus")
					{
							


								while(true)
								{
								$result=mysql_query("select * from add_opp where id='$rand'");
								
								
										if(mysql_num_rows($result)==0)
										{
											$query="INSERT INTO `add_opp`(`id`,`name_org`,`type_org`,`name_opp`, `logo`, `email`, `email2`,`eligibility`, `location`,`pincode`,`country`,`featured_opt`, `flag`, `app_date`, `app_enddate`, `opp_start_date`, `opp_end_date`, `deadline`, `description`, `summary`,`reference`,`website_opp`,`stipend`,`email_status`,`org_id`,`keywords`) VALUES ('$rand','$name_org','$s','$name_opp','$logo','$email','$email2','$eligi','$loc','$pincode','$country','$featured','$flag','$app_date','$app_enddate','$start_date','$end_date','$deadline','$description','$summary','4','$web_opp','$stipend','0','$orgid','$keywords')";
											$r=mysql_query($query);
												if($r)
													{
														echo "successfully inserted"."<br>";
													}
												else
													{
														echo '1 .innsertion doesnt work'.'<br>';
													}
											break;
										}
										else
										{
										$rand=rand(1000000000,9999999999);
										
										}
								}
											if(isset($_POST['misc'])||isset($_POST['misc_venue'])||isset($_POST['misc_date'])||isset($_POST['misc_url'])||isset($_POST['misc_contact'])||isset($_POST['misc_contact']))
													{		
															$misc_name=$name_opp;
															$miscellaneus=$_POST['misc'];
															$misc_venue=$_POST['misc_venue'];
															$misc_date=$_POST['misc_date'];
															$misc_url=$_POST['misc_url'];
															$misc_contact=$_POST['misc_contact'];
															$misc_desc=$_POST['misc_desc'];
															$query_miscellaneus="INSERT INTO `miscellaneus`(`user_id`, `type`,`misc_name`,`date _occ`, `location`, `contact_person`, `url`, `description`,`name`,`keywords`) VALUES ('$rand','$miscellaneus','$misc_name','$misc_date','$misc_venue','$misc_contact','$misc_url','$misc_desc','$name_opp','$keywords')";
															$t=mysql_query($query_miscellaneus);
															if($t)
															{
															echo "main miscellaneus query works"."<br>";
															}
															else
															{
															echo "main miscelleneus doesnt work"."<br>";
															}
													}

					}				
     }
			   	
}


?>


<html>
<head>
<link rel="stylesheet" href="style.css">
<a name="top"></a>
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
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","categories.php?vote="+$value,true);
  xmlhttp.send();
}
</script>
</head>
</body>
<body>
</body>
<nav>
	<a href="index3.php"> HOME </a> &nbsp &nbsp &nbsp <a href="profileO.php"> PROFILE </a> &nbsp &nbsp &nbsp 
	<a href="postopp.php"> POST AN OPPORTUNITY </a> &nbsp &nbsp &nbsp<a href="logout.php"> LOGOUT </a>
</nav>
<h2>Add Opportunity</h2>
        

    
       
            <form enctype="multipart/form-data" action="postopp.php" method="POST">
                <!-- <h3>Opportunity details</h3> -->
                   


              
                    Organization :<input type="text" name="name_org" value=""/>
                  
                <br><br>				
				
               
               Type of organisation :  
			   <select name="type_org[]" multiple>
					
                        <option value="" selected >use ctrl to select multiple options</option>
                        <option value="University">University</option>
						<option value="Company">Company</option>
						<option value="Reaserch Organisation">Reaserch Organisation</option>
						<option value="NGO/Non-profit/Social Enterprise">NGO/Non-profit/Social Enterprise</option>
						<option value="VCs/Funnds/Investors">VCs/Funnds/Investors</option>
						<option value="Professional Association">Professional Association</option>
						<option value="Start-Up">Start-Up</option>
						<option value="Government Body">Government Body</option>
						<option value="International Agency">International Agency</option>
                 </select>
                
               <br><br>				
              
                
                
                
                    Name of Opportunity :<input type="text" name="name_opp" value=""/>                    
                    <br><br>Please enter the full name of the opportunity that you want to publicize on Let Me Know
                
                <br/><br/>

                
                
                    Choose Logo :<input type="file" name="logo" value="" id="image"/><br><br>
                    Upload a logo on the server. Upload files in jpg,jpeg,png,gif formats only. Max. file size is 1 MB.</div> 
                

                <br> <br>
                    Contact Email Address :<input type="text" name="email" value=""/>
                <br>
					 Contact Email Address :<input type="text" name="email2" value=""/>
                
                <br/>
                <h3 style="color:#2A7BAB">Category and Sub Category</h3>
                
				
				<p>Select from the following sub categories</p>
                <br/>
				
   

                        </div><br/>
             
Internships :<input type="radio" name="vote" value="internships"><br>


  <input type="radio" name="internship" value="engineering">1.Engineering<br>
 
 
 
  <select name="eng_branch">
  <option value="" selected>Select your branch </option>
  <option value="cse">Computer Science</option>
  <option value="mac">Machanical</option>
  <option value="che">Chemical</option>
  <option value="met">Metallurgical</option>
  <option value="civil">Civil</option>
 <option value="eee">Electronics and Electrical(EEE)</option>
  <option value="ece">Electronics and Communication</option>
  <option value="it">Information Technology</option>
  <option value="ae">Aeronautical Engineering</option>
 
 
  
</select>
any other :<input type="text" name="eng_other_branch"><br>
<br><br><br><br>

Venue :<textarea name="eng_location"></textarea><br>
Duration :(in months) :<input type="text" name="eng_duration"><br>
Any_url :<input type="text" name="eng_url"><br>

  <input type="radio" name="internship" value="commerce_and_arts">2.Commerce and Arts<br>
  
  <select name="com_branch">
  <option value="" selected>Select your branch </option>
  <option value="cse">Computer Science</option>
  <option value="mac">Machanical</option>
  <option value="che">Chemical</option>
  <option value="met">Metallurgical</option>
  <option value="civil">Civil</option>
 <option value="eee">Electronics and Electrical(EEE)</option>
  <option value="ece">Electronics and Communication</option>
  <option value="it">Information Technology</option>
  <option value="ae">Aeronautical Engineering</option>
 
 
  
</select>
any other :<input type="text" name="com_other_branch"><br>
<br><br><br><br>

Venue :<textarea name="com_location"></textarea><br>
Duration :(in months) :<input type="text" name="com_duration"><br>
Any_url :<input type="text" name="com_url"><br>
  <input type="radio" name="internship" value="business_and_management">3.Business and Management<br>
 
 
  <select name="man_branch">
  <option value="" selected>Select your branch </option>
  <option value="Administrative Management">Administrative Management</option>
  <option value="Agriculture Business Management">Agriculture Business Management</option>
  <option value="Apparel Management">Apparel Management</option>
  <option value="Automobile Marketing">Automobile Marketing</option>
  <option value="Aviation Management">Aviation Management</option>
 <option value="Banking and Finance">Banking and Finance</option>
  <option value="Banking and Insurance">Banking and Insurance</option>
  <option value="Banking Management">Banking Management</option>
  <option value="Business Analytics">Business Analytics</option>
  <br>
  
 any other :<input type="text" name="man_other_branch">
 
  
</select>

<br><br><br><br>

Venue :<textarea name="man_location"></textarea><br>
Duration :(in months) :<input type="text" name="man_duration"><br>
Any_url :<input type="text" name="man_url"><br>




 <input type="radio" name="internship" value="miscellaneus">4.Miscellaneus<br>
 
 

 any other :<input type="text" name="mis_other_branch"><br>
<br><br><br><br>

Venue :<textarea name="mis_location"></textarea><br>
Duration :(in months) :<input type="text" name="mis_duration"><br>
Any_url :<input type="text" name="mis_url"><br>;
				
				<hr>
				
				Sponsered_Programs :<input type="radio" name="vote" value="sponsered_programs"><br>
				
				<input type="radio" name="sponsered" value="fellowship">Fellowship<br>
				<input type="radio" name="sponsered" value="scholarship">Scholarship<br>
				<input type="radio" name="sponsered" value="miscellaneus">Miscellaneus<br>
				
				Any_url :<input type="text" name="spon_url"><br>
				Date :<input type="date" name="spon_date"><br>
				Venue :<textarea name="spon_venue"></textarea><br>
				<hr>
	Miscellaneus :<input type="radio" name="vote" value="miscellaneus"><br>
				
				<input type="radio" name="misc" value="liberal">Liberal<br>
				<input type="radio" name="misc" value="arts">Arts<br>
				<input type="radio" name="misc" value="science">Science<br>
				
				Any_url :<input type="text" name="misc_url"><br>
				Date :<input type="date" name="misc_date"><br>
				Venue :<textarea name="misc_venue"></textarea><br>
				Contact_person :<input type="text" name="misc_contact"><br>
				Description :<textarea name="misc_desc"></textarea>
				<hr>			
			
				
				Events :<input type="radio" name="vote" value="events" ><br>
              <input type="radio" name="events" value="webinars">Webinar Sessions<br>
	                    

 Name of Webinar Session:<input type="text" name="web_name"><br>
				  City              :    <input type="text" name="web_city"><br>
					Date of Event :				 <input type="date" name="web_date"><br>
					contact person:				 <input type="text" name="web_person"><br>
					venue :				 <input type="text" name="web_venue"><br>
					Any url : <input type="text" name="web_url"><br>
						
			  <input type="radio" name="events" value="compititions">Compititions<br>
			  
			      Name of Compititions:<input type="text" name="comp_name"><br>
				  City              :    <input type="text" name="comp_city"><br>
					Date of Event :				 <input type="date" name="comp_date"><br>
					contact person:				 <input type="text" name="comp_person"><br>
					venue :				 <input type="text" name="comp_venue"><br>
					Any url : <input type="text" name="comp_url"><br>
				  
			  <input type="radio" name="events" value="workshops">Workshops<br>
			  
			  
			  
				 Name of WorkShops:<input type="text" name="work_name"><br>
				  City              :    <input type="text" name="work_city"><br>
					Date of Event :				 <input type="date" name="work_date"><br>
					contact person:				 <input type="text" name="work_person"><br>
					venue :				 <input type="text" name="work_venue"><br>
					Any url : <input type="text" name="work_url"><br>
				
				Miscellaneus :<input type="radio" name="vote" value="miscellaneus"><br>
				
				
				 Name:<input type="text" name="mis_name" ><br>
				  City              :    <input type="text" name="mis_city"><br>
					Date of Event :				 <input type="date" name="mis_date"><br>
					contact person:				 <input type="text" name="mis_person"><br>
					venue :				 <input type="text" name="mis_venue"><br>
					Any url : <input type="text" name="mis_url"><br>
				
<hr>

		 <label for="eligibility" >Eligibility</label>
               
                    <input type="checkbox" name="eligibility[]" value="Undergradlevel">Undergradlevel</br></br>
					 <input type="checkbox" name="eligibility[]" value="Gradlevel">Gradlevel</br></br>
					  <input type="checkbox" name="eligibility[]" value="Postgradlevel">Postgradlevel</br></br>
					   <input type="checkbox" name="eligibility[]" value="Students">Students</br></br>
					
                   
                    <div class="desc">Tell your applicants who is eligible to apply for your opportunity</div>
                </div>
<br>
  <hr>             
			   Location:

                    <input type="radio" name="loc" value="india"/>India<br>
                    <input type="radio" name="loc" value="other" />Other<br>            
                    <input type="radio" name="loc" value="online" id="online" />Virtual/Online <br>
                    <br/>
                    Pincode :<input type="text" name="pincode" id="pincode"/>
                    If other country :<select id="countries" name="country">
                        <option value='-1' selected='selected'>Select Country</option>
                    <option value='USA'>USA</option>
					<option value='CHINA'>CHINA</option>
					<option value='RUSSIA'>RUSSIA</option>
                    <option value='IRAN'>IRAN</option>
					<option value='BRAZIL'>BRAZIL</option>
                    </select>


     <hr>               
<br>                 
                Featured :
                        <select name="featured" id="featured" class="rt"> 
                            <option value="No" >No</option> 
                            <option value="YES">Yes</option>                                 
                        </select>
                    </div>
<hr>
                   Flag :<br>
                        <select name="flag">
                                 <option value="-1" selected> Select Flag</option>						
                                 <option value="1" label="Published"  value="published">Published</option>
                                <option value="2" label="User Submitted" value="user_submitted">User Submitted</option> 
                                <option value="3" label="Under Review" value="under_review">Under Review</option>
                                
                        </select>
                    </div>
                   
                <h3 style="color:#2A7BAB">Key Dates and Deadlines</h3>
                <br/><p style="color:#999999">Enter deadline for application and the start and end dates if applicable. At least one date is required. </p>
                
				Application Date :<input type="date" name="app_date"></br>
				Application End_Date :<input type="date" name="app_enddate"></br>
				
				
				<div class="element-container">
                    <label for="start_date">Start Date of Internship/Job/Event </label>
                    <input type="date" name="start_date" value=""/>
                </div>

                <div class="element-container">
                    <label for="end_date">End Date of Internship/Job/Event</label>
                    <input type="date" name="end_date" value="" id="end_date"/>
                </div>

                <div class="element-container">
                    <label for="deadline">Deadline </label>
                    <input type="date" name="deadline" value=""/>
                </div>
				
				Website of opportunity :<input type="text" name="web_opp"><br>
				Stipend of opportunity :<input type="text" name="stipend"><br>
				
				Keywords for better search of your opportunity eg. "profile","job","with stipend":<textarea name="keywords"></textarea>
				

                <h3 style="color:#2A7BAB">Description</h3>
                <br/><p style="color:#999999">In the description, do not repeat anything that you have already entered in the form above. An ideal description should cover the following details: a short brief about your organization and the opportunity, a pitch telling prospective participants why they should apply, details of the application process, any extra eligibility criteria, information about any registration fee, awards and other benefits if any). Use the text editor below to write a description for this entry</p><br/>
                <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded --> 
                <textarea  name="description" rows="30" cols="100" style="width: 80%">
                    
                </textarea>          

                <h3 style="color:#2A7BAB">Summary</h3>
                <br/><p style="color:#999999">Summary is a quick snapshot of your opportunity and will be used on our homepage, email newsletter etc. Enter a summary for this entry</p><br/>

                <textarea  id="summary" class="summary" name="summary" rows="3" cols="100" st
				yle="width: 80%"></textarea> 
                
				
				<input type="submit" value="Submit Form">                        
            </form>
			<a href="#top">TOP</a>
        </div>

    </div>
    <br/>


    
	
	
	<div class="form-container">
        <p>We thank you for advertising with us!<br><br>
            Your opportunity will be reviewed by our Content Team and will be published on our website within 24 hours. In case it does not happen, do write to us at <b>cm@letmeknow.in</b> to know the reason for delay. We may withhold your post from publishing if we find it containing inappropriate or malicious content.<br> <br>
            For any feedback, you can write to us at <b>feedback@letmeknow.in</b>
            Keep visiting <a href="http://www.letmeknow.in">Let Me Know! </a></p>
    </div>
    <br/>
   
</div>
</html>

<!-- things to be added.
 --><!-- 1. Website of Opportunity (Validated)
2. Stipend of Opportunity 
3. Date Added ( Add the current date, and everytime it is edited, add the current date only)
-There is an option in phpmyadmin for a column to have default value: usme current timestamp aati  hai ek. default set kar de.
4. Posted By: Just the session variable name of the person posting it.
5. Email Sent ( Status message that tells that email has been sent to the person posting it. Session variable me le le user profile se jo logged in hoga. Name ) -->
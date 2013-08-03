<?php

include("functions.php");
header_content();
echo '<title>Institute Registration</title>';
?>
<?php
if(isset($_POST['submit']))
{
 $name=$_POST['coll_name'];
 $shrt_name=$_POST['coll_short_name'];
 $coll_code=$_POST['coll_code'];
 
 $app_no=$_POST['app_no'];
 
 $eng=$_POST['eng'];
 $med=$_POST['mec'];
 $man=$_POST['man'];
 
 $eng_courses=array();
 $med_courses=array();
 $man_courses=array();
 
 if(isset($_POST['eng']))
  {
 foreach($_POST['engineering'] as $option)
  {
  $eng_courses[]=$option;
  }
  for($i=1;$i<sizeof($eng_courses);$i++)
   {
    $eng_courses[0].="<br /><br />* ".$eng_courses[$i];
   }
   $eng_courses[0]="* ".$eng_courses[0];
  }
 if(isset($_POST['med']))
  {  
 foreach($_POST['medical'] as $option)
  {
   $med_courses[]=$option;
  }
  for($i=1;$i<sizeof($med_courses);$i++)
   {
    $med_courses[0].="<br /><br />* ".$med_courses[$i];
   }
   $med_courses[0]="* ".$med_courses[0];
  }
 if(isset($_POST['man']))
  {
 foreach($_POST['management'] as $option)
  {
   $man_courses[]=$option;
  }
  for($i=1;$i<sizeof($man_courses);$i++)
   {
    $man_courses[0].="<br /><br />* ".$man_courses[$i];
   }
   $man_courses[0]="* ".$man_courses[0];
  }
 
 
 
 $affiliated=$_POST['affiliated'];
 $category=$_POST['category'];
 $type=$_POST['type'];
 
 
 $audit=$_POST['audit'];
 $cant=$_POST['cant'];
 $comp=$_POST['comp'];
 $medi=$_POST['medi'];
 $gm=$_POST['gm'];
 $lab=$_POST['lab'];
 $lib=$_POST['lib'];
 $spo=$_POST['spo'];
 $host=$_POST['host'];
 
 $intake=$_POST['students_intake'];
 $address=$_POST['coll_address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $pincode=$_POST['pincode'];
 $contact=$_POST['contact'].$_POST['contact2'];
 $fax=$_POST['fax'].$_POST['fax2'];
 
 $username=$_POST['username'];
 $password=$_POST['pass'];
 
 $train=$_POST['train'];
 $bus=$_POST['bus'];
 
 $email=$_POST['emailid'];
 $website=$_POST['website'];
 
 $established=$_POST['yoo'];
 $director=$_POST['director'];
 
 
 $ap_id="AP".$shrt_name.$app_no;

//TO CHECK WHETHER THE REPETITIVE REGISTRATION OF COLLEGES//////////////////////////////////
 $error=0;
$select1=mysql_query("SELECT * from college_info WHERE coll_code='$coll_code' or  email='$email' or address='$address' or phone='$contact' or fax='$fax' or website='$website' ");
while($row1=mysql_fetch_array($select1))
 {
 $error=1;
 }
$select2=mysql_query("SELECT username from college_info WHERE username='$username' ");
$select3=mysql_query("SELECT username from users WHERE username='$username' ");
if(!mysql_num_rows($select2))
 $error=2;
if(!mysql_num_rows($select3))
 $error=2;
 
  //TO CHECK WHETHER THE REPETITIVE REGISTRATION OF COLLEGES//////////////////////////////////
 //to upload the file of the college///////////////
 echo "<center>";
 $allowedExtensions=array("jpeg","png","gif","jpg");
 $fileExtension=end(explode(".",$_FILES["file"]["name"]));
 //echo $_FILES["file"]["tmp_name"];
 if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png" || $_FILES["file"]["type"]=="image/gif" || $_FILES["file"]["type"]=="image/jpg")&&
 $_FILES["file"]["size"] < 2000000 && in_array($fileExtension,$allowedExtensions))
  {
   if($_FILES["file"]["error"] >0 )
    {
	 $error=3;
	}
   else
    {
	 move_uploaded_file($_FILES["file"]["tmp_name"], "logos/".$ap_id.".png" );
	}
  }
 else
  {
   $error=4;
  }
 //to upload the logo of the college///////////////

if($error==1)
 {
  echo '<center><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;<font class=error >College Information already exists!!!</font></center><br />';
  register_form("0");
 }

else if($error==2)
{
  echo '<center><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;<font class=error >Username already exists!!!</font></center><br />';
  register_form("0");
}
else if($error==3)
{
  echo "<center><p class=error >Error Code:".$_FILES["file"]["error"]."</p></center>";
  register_form("0");
}
else if($error==4)
{
   echo "<center><p class=error ><img src=images/sad.png width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;Unexpected Error in Image upload!!! <br />Please choose a proper one!</p></center>";
   register_form("0");
}
else
 {
  $password=md5($password);
  $c_date=r_time_stamp(time());
  mysql_query("INSERT  INTO `college_info` SET username='$username', name='$name',shrt_name='$shrt_name', coll_code='$coll_code',engineering='$eng',medical='$med',management='$man',auditorium='$audit',canteen='$cant',computer_labs='$comp',medical_facility='$medi', email='$email',gym='$gm',laboratories='$lab',library='$lib',sports='$spo',hostels='$host',intake='$intake',address='$address',city='$city',state='$state',pincode='$pincode',phone='$contact',fax='$fax',train='$train',bus='$bus',website='$website',year_of_opening='$established',director='$director', date_created='$c_date', date_modified='$c_date',category='$category', type='$type', affiliated='$affiliated', app_no='$app_no', eng_courses='$eng_courses[0]', med_courses='$med_courses[0]', man_courses='$man_courses[0]', ap_id='$ap_id' , password='$password'");
  
  
  echo "<br /><br /><b>Your Application No:</b> ".$app_no."<div class=note >(keep this for future reference)</div><p class=success ><img src=images/congratulations.png /></br>Thank You!!!<br />Your application is approved/rejected within 24hrs. <br />Check your status after 24hrs!!!</p>";
 echo "<br /><br /><br />";
 feedback();
 echo '</center>';
 }
}
else
{
register_form("0");
}

?>
<?php
include("footer.php");
?>
<?php
echo '<title>Institute Registration</title>';
include("header.php");
?>
<?php
echo '<div id=page_container>
<div id=content>';
if(isset($_POST['submit']))
{
 $name=$_POST['coll_name'];
 $id=$_POST['coll_id'];
 
 $eng=$_POST['eng'];
 $med=$_POST['mec'];
 $man=$_POST['man'];
 
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
 
 $train=$_POST['train'];
 $bus=$_POST['bus'];
 
 $email=$_POST['emailid'];
 $website=$_POST['website'];
 
 $yop=$_POST['yoo'];
 $director=$_POST['director'];
//TO CHECK WHETHER THE REPETITIVE REGISTRATION OF COLLEGES//////////////////////////////////
 $error=0;
$select1=mysql_query("SELECT * from college_info WHERE id='$id' or email='$email' or address='$address' or phone='$contact' or fax='$fax' or website='$website' or director='$director' ");
while($row1=mysql_fetch_array($select1))
 {
 $error=1;
 }
 
if($error)
 {
  echo '<center><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;<font class=error >College Information already exists!!!</font></center><br />';
  register_form("0");
 }
else
 {
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
	 echo "<p class=error >Error Code:".$_FILES["file"]["error"]."</p>";
	}
   else
    {
	 move_uploaded_file($_FILES["file"]["tmp_name"], "logos/".$id.".png" );
	}
  }
 else
  {
   echo "<p class=error >Unexpected Error!!!</p>";
  }
 //to upload the file of the college///////////////
 $c_date=r_time_stamp(time());
 mysql_query("INSERT  INTO `college_info` SET name='$name',id='$id',engineering='$eng',medical='$mec',management='$man',auditorium='$audit',canteen='$cant',computer_labs='$comp',medical_facility='$medi', email='$email',gym='$gm',laboratories='$lab',library='$lib',sports='$spo',hostels='$host',intake='$intake',address='$address',city='$city',state='$state',pincode='$pincode',phone='$contact',fax='$fax',train='$train',bus='$bus',website='$website',year_of_opening='$yop',director='$director', date_created='$c_date', date_modified='$c_date'");
 echo "<p class=success ><img src=images/congratulations.png /></br>Thank You!!!<br />College has been successfully registerd.</p></center><br /><br /><br /><br /><br /><br /><br />";
 }
}
else
{
register_form("0");
}
echo '</div></div>';
?>
<?php
include("footer.php");
?>
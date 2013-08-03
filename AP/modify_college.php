<?php
include("functions.php");
header_content();
echo '<title>College Details Modification</title>';
?>
<?php
echo '<div id=modify_college >';
if(isset($_GET['c']) && !(isset($_POST['submit'])))
{
 register_form($_GET['c']);
}
else
{
if(isset($_POST['submit']))
{
 //echo $_GET['c'];
 $name=$_POST['coll_name'];
 $shrt_name=$_POST['coll_short_name'];
 $coll_code=$_POST['coll_code'];
 
 
 $eng=$_POST['eng'];
 if(isset($_POST['mec']))
  $med=1;
 if(isset($_POST['man']))
  $man=1;
 
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
  for($i=1;$i<sizeof($med_courses); $i++)
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
  for($i=1;$i<sizeof($man_courses); $i++)
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
 
 $train=$_POST['train'];
 $bus=$_POST['bus'];
 
 $email=$_POST['emailid'];
 $website=$_POST['website'];
 
 $established=$_POST['yoo'];
 $director=$_POST['director'];
 
 $crpass=$_POST['crpass'];
 $npass=$_POST['npass'];


 //to upload the file of the college///////////////
 echo "<center>";
 if($_FILES["file"]["name"]!="")
  {
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
	 move_uploaded_file($_FILES["file"]["tmp_name"], "logos/".$_GET['c'].".png" );
	 echo "<p class=success >File successfully uploaded!!!</p>";
	}
  }
 else
  {
   echo "<p class=error >Unexpected Error!!!</p>";
  }
 }
 //to upload the file of the college///////////////
 $m_date=r_time_stamp(time());
 $q="UPDATE `college_info` SET ";
 if($name!="")
  {
   $q.=" name='$name', ";
  }
 if($shrt_name!="")
  {
   $q.=" shrt_name='$shrt_name', ";
  }
 if($coll_code!="")
  {
   $q.=" coll_code='$coll_code', ";
  }
 if($eng==1)
  {
   $q.=" engineering='$eng', ";
  }
 if($med==1)
  {
   $q.=" medical='$med', ";
  }
 if($man==1)
  {
   $q.=", management='$man', ";
  }
  
 $q.="auditorium='$audit',canteen='$cant',computer_labs='$comp',medical_facility='$medi', gym='$gm',laboratories='$lab',library='$lib',sports='$spo',hostels='$host' ,intake='$intake',category='$category', type='$type',state='$state',year_of_opening='$established', ";
 if($email!="")
  {
   $q.=" email='$email', ";
  }
 if($affiliated!="")
  {
   $q.=" affiliated='$affiliated', ";
  }
 if($address!="")
  {
   $q.=" address='$address', ";
  }
 if($city!="")
  {
   $q.=" city='$city', ";
  }
 if($pincode!="")
  {
   $q.=" pincode='$pincode', ";
  }
 if($contact!="")
  {
   $q.=" phone='$contact', ";
  }
 if($fax!="")
  {
   $q.=" fax='$fax', ";
  }
 if($train!="")
  {
   $q.=" train='$train', ";
  }
 if($bus!="")
  {
   $q.=" bus='$bus', ";
  }
 if($website!="")
  {
   $q.=" website='$website', ";
  }
 if($director!="")
  {
   $q.=" director='$director', ";
  }
  if($crpass!="")
   {
    $crpass=md5($crpass);
	$sl=mysql_query("SELECT * from college_info WHERE ap_id='$_GET[c]' and password='$crpass' ");
  while($rws=mysql_fetch_array($sl))
   {
	  $npass=md5($npass);
	  $q.=" password='$npass',  ";
   }
   }
   
  $q.=" date_modified='$m_date', eng_courses='$eng_courses[0]', med_courses='$med_courses[0]', man_courses='$man_courses[0]' WHERE ap_id='$_GET[c]' ";
  

  
 //mysql_query("INSERT  INTO `college_info` SET name='$name',shrt_name='$shrt_name', coll_code='$coll_code',engineering='$eng',medical='$mec',management='$man',auditorium='$audit',canteen='$cant',computer_labs='$comp',medical_facility='$medi', email='$email',gym='$gm',laboratories='$lab',library='$lib',sports='$spo',hostels='$host',intake='$intake',address='$address',city='$city',state='$state',pincode='$pincode',phone='$contact',fax='$fax',train='$train',bus='$bus',website='$website',year_of_opening='$established',director='$director', date_created='$c_date', date_modified='$c_date',category='$category', type='$type', affiliated='$affiliated', app_no='$app_no', eng_courses='$eng_courses[0]', med_courses='$med_courses[0]', man_courses='$man_courses[0]', ap_id='$ap_id' ");
 
 //mysql_query("UPDATE `college_info` SET name='$name', engineering='$eng', medical='$med', management='$man',auditorium='$audit',canteen='$cant',computer_labs='$comp',medical_facility='$medi', email='$email',gym='$gm',laboratories='$lab',library='$lib',sports='$spo',hostels='$host',intake='$intake',address='$address',city='$city',state='$state',pincode='$pincode',phone='$contact',fax='$fax',train='$train',bus='$bus',website='$website',year_of_opening='$yop',director='$director', date_modified='$m_date', rank='$rank', eng_courses='$eng_courses[0]', med_courses='$med_courses[0]', man_courses='$man_courses[0]' WHERE ap_id='$_GET[c]' ");
 //echo $q;
 mysql_query($q);
 echo "<br /><br /><p class=success ><img src=images/congratulations.png /></br>Details have been successfully saved!!!</p></center><br /><br />";
}
else
{
  echo '<center><h1>Modify a college</h1></center>';
  echo '<p>Please choose the options accordingly to reach the appropriate college. Select one or more choices to filter the colleges more precisely.</p><br />';
  search_form("change","0");
 if(isset($_POST['sub']))
  {
 $state;
 echo '<br /><center><p style="color:green;" >Search results for : </p><p id=s_query >';
 if($_POST['clg_name']!=-1)
  {
   echo "<b>College::</b><i class=query_values >".$_POST['clg_name']."</i>";
  }
 if($_POST['clg_shrt_name']!=-1)
  {
   echo "<b> Short name::</b><i class=query_values >".$_POST['clg_shrt_name']."</i>";
  }
 if($_POST['clg_director']!=-1)
  {
   echo "<b> Director::</b><i class=query_values >".$_POST['clg_director']."</i>";
  }
 if($_POST['city']!=-1)
  {
   echo "<b> City::</b><i class=query_values >".$_POST['city']."</i>";
  }
 if($_POST['state']!=-1)
  {
   $p=mysql_query("SELECT * from states WHERE Sno='$_POST[state]' ");
    while($row=mysql_fetch_array($p))
	 {
      echo "<b> State::</b><i class=query_values >".$row[state]."</i>";
	 }
  }
 if($_POST['pincode']!=-1)
  {
   echo "<b> Pincode::</b><i class=query_values >".$_POST['pincode']."</i>";
  }
 if($_POST['yop']!=-1)
  {
   echo "<b> Year of Opening::</b><i class=query_values >".$_POST['yop']."</i>";
  }
echo "</p>";
$arr=array($_POST['clg_name'] , $_POST['clg_shrt_name'] , $_POST['clg_director'] , $_POST['yop'] , $_POST['city'] , $_POST['state'] , $_POST['pincode'] );

$f=1;
$err=1;
$coun=0;
  if($arr[0]==-1 && $arr[1]==-1 && $arr[2]==-1 && $arr[3]==-1 && $arr[4]==-1 && $arr[5]==-1 && $arr[6]==-1)
   {
    $err=1;
   }
   else
    {
//$cs=mysql_query(sprintf("SELECT * from college_info WHERE %s ",implode(' AND ', $arr)));
	$query="SELECT * from college_info ";
	if($arr[0]!=-1 || $arr[1]!=-1 || $arr[2]!=-1 || $arr[3]!=-1 || $arr[4]!=-1 || $arr[5]!=-1 || $arr[6]!=-1)
	 {
	  $query.=" WHERE ";
	 }
	$count=0;
	if($arr[0]!=-1)
	 {
	  $query.=" name='$arr[0]' ";
	  $count=1;
	 }
	if($arr[1]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" shrt_name='$arr[1]' ";
	  	  $count=1;
	 }
	if($arr[2]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" director='$arr[2]' ";
	  	  $count=1;
	 }
	if($arr[3]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" yop='$arr[3]' ";
	  	  $count=1;
	 }
	if($arr[4]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" city='$arr[4]' ";
	  	  $count=1;
	 }
	if($arr[5]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" state='$arr[5]' ";
	  	  $count=1;
	 }
	if($arr[6]!=-1)
	 {
	  if($count>0)
	   {
	    $query.=" AND ";
	   }
	  $query.=" pincode='$arr[6]' ";
	 }
	$cs=mysql_query($query);
	//$cs=mysql_query("SELECT * FROM college_info WHERE IF('$arr[0]'!='-1',name = '$arr[0]',1)  AND IF('$arr[1]'!='-1',id = '$arr[1]',1)  AND IF('$arr[2]'!='-1',director = '$arr[2]',1)  AND IF('$arr[3]!='-1',year_of_opening = '$arr[3]',1)  AND IF('$arr[4]'!='-1',city = '$arr[4]',1)  AND IF('$arr[5]'!='-1',state = '$arr[5]',1)  AND IF('$arr[6]'!='-1',pincode = '$arr[6]',1) ");
    //$cs=mysql_query("SELECT * from college_info WHERE name='$arr[0]' and id='$arr[1]'  and director='$arr[2]' and year_of_opening='$arr[3]' and city='$arr[4]' and state='$arr[5]' and pincode='$arr[6]' ");
	echo "<br /><table name=search_results class=search_results cellpadding=8 >";
	while($rows=mysql_fetch_array($cs))
	 {
	  $err=0;
	  if($f==1)
	   {
	  echo '<tr align=center ><th>#</th><th>Name</th><th>Code</th><th>Stream</th><th>Modify</th></tr>';
	   $f=0;
	   }
	  $coun++;
	  echo '<tr id='.$rows[id].'><td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[shrt_name].'</td><td>';
	  if($rows[engineering]==1)
	   echo 'Engineering ';
	  if($rows[medical]==1)
	   echo 'Medical ';
	  if($rows[management]==1)
	   echo 'Management.';
	  echo '</td><td><a target="_blank" href=modify_college.php?c='.$rows[ap_id].' style="color:white;"><big><u><b>Details</b></u></big></a></td></tr>';
	 }
	 echo '</table></center><br />';
	}

if($err)
 {
  echo '<div class=error >College not found!!!</div><br />';
  $err=0;
 }
  }
  echo '<br /><br />';
}
}
echo '<br /><br />';
feedback();
echo '</div>';
?>
<?php
include("footer.php");
?>
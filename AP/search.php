<?php
include("header.php");
?>
<?php
echo '<div id=page_container><div id=content>';
include("side_menu.php");
echo '<div id=article>';
if($_GET['stream']=="eng")
{
 echo '<h2>Engineering Colleges</h2>';
}
else if($_GET['stream']=="med")
{
 echo '<h2>Medical Colleges</h2>';
}
else if($_GET['stream']=="man")
{
 echo '<h2>Management Colleges</h2>';
}
else
{
 echo '<h2>All Colleges</h2>';
}
echo '<p>Please choose the options accordingly to reach the appropriate college. Select one or more choices to filter the colleges more precisely.</p><br />';
search_form("normal",$_GET['stream']);
$query_success=0;
if(isset($_POST['sub']))
{
 echo '<br /><p>Search results for : </p><p id=s_query >';
 if($_POST['clg_name']!=-1)
  {
   echo "<b>College::</b><i class=query_values >".$_POST['clg_name']."</i>";
   $query_success=1;
  }
 if($_POST['clg_id']!=-1)
  {
   echo "<b> College Code::</b><i class=query_values >".$_POST['clg_id']."</i>";
   $query_success=1;
  }
 if($_POST['clg_director']!=-1)
  {
   echo "<b> Director::</b><i class=query_values >".$_POST['clg_director']."</i>";
   $query_success=1;
  }
 if($_POST['city']!=-1)
  {
   echo "<b> City::</b><i class=query_values >".$_POST['city']."</i>";
   $query_success=1;
  }
 if($_POST['state']!=-1)
  {
   $p=mysql_query("SELECT * from states WHERE Sno='$_POST[state]' ");
   $query_success=1;
    while($row=mysql_fetch_array($p))
	 {
      echo "<b> State::</b><i class=query_values >".$row[state]."</i>";
	 }
  }
 if($_POST['pincode']!=-1)
  {
   echo "<b> Pincode::</b><i class=query_values >".$_POST['pincode']."</i>";
   $query_success=1;
  }
 if($_POST['yop']!=-1)
  {
   echo "<b> Year of Opening::</b><i class=query_values >".$_POST['yop']."</i>";
   $query_success=1;
  }
if($query_success==1)
 echo "</p>";
 
$arr=array($_POST['clg_name'] , $_POST['clg_id'] , $_POST['clg_director'] , $_POST['yop'] , $_POST['city'] , $_POST['state'] , $_POST['pincode'] );

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
	  $query.=" id='$arr[1]' ";
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
	  $query.=" year_of_opening='$arr[3]' ";
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
	 
	if($_GET['stream']=="eng")
	 {
	  $query.=" AND engineering=1 ";
	 }
	else if($_GET['stream']=="med")
	 {
	  $query.=" AND medical=1 ";
	 }
	else if($_GET['stream']=="man")
	 {
	  $query.=" AND management=1 ";
	 }
	$cs=mysql_query($query);
	//$cs=mysql_query("SELECT * FROM college_info WHERE IF('$arr[0]'!='-1',name = '$arr[0]',1)  AND IF('$arr[1]'!='-1',id = '$arr[1]',1)  AND IF('$arr[2]'!='-1',director = '$arr[2]',1)  AND IF('$arr[3]!='-1',year_of_opening = '$arr[3]',1)  AND IF('$arr[4]'!='-1',city = '$arr[4]',1)  AND IF('$arr[5]'!='-1',state = '$arr[5]',1)  AND IF('$arr[6]'!='-1',pincode = '$arr[6]',1) ");
    //$cs=mysql_query("SELECT * from college_info WHERE name='$arr[0]' and id='$arr[1]'  and director='$arr[2]' and year_of_opening='$arr[3]' and city='$arr[4]' and state='$arr[5]' and pincode='$arr[6]' ");
	$res_count=mysql_num_rows($cs);
if($res_count!=0)
 {
  echo '<div align=center style="size:13px;color:green;">';
  if($res_count>1)
   echo 'Total ';
  else
   echo 'Only ';
   echo $res_count;
  if($res_count>1)
   echo ' colleges ';
  else
   echo ' college ';
  echo 'found!</div>';
    if($res_count>=2)
   echo '<span style="color:blue;font-size:15px;" >* Select any two colleges to compare!</span>';
 }
	while($rows=mysql_fetch_array($cs))
	 {
	  $err=0;
	  if($f==1)
	   {
	   	  echo "<br /><table name=search_results class=search_results cellpadding=8 >";
	      echo '<tr align=center >';
		  
		  if($res_count>=2)
		   echo '<th>*</th>';
		   
		  echo '<th>#</th><th>Name</th><th>Code</th><th>Stream</th><th>More</th></tr>';
	   $f=0;
	   }
	  $coun++;
	  echo '<tr id='.$rows[id].' >';
	  if($res_count>=2)
	   echo '<td><input type=checkbox id=c name=c value='.$r[id].' onclick=return(check_two(this)) /></td>';
	   
	   echo '<td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[id].'</td><td>';
	  if($rows[engineering]==1)
	   echo 'Engineering ';
	  if($rows[medical]==1)
	   echo 'Medical ';
	  if($rows[management]==1)
	   echo 'Management.';
	  echo '</td><td><a target="_blank" href=view_college.php?c1='.$rows[id].' style="color:white;"><u><b color=white ><big>Details</big></b></u></a></td></tr>';
	 }
	 if($err==0)
	  {
	   echo '</table>';
	   if($res_count>=2)
	    echo '<br /><div onclick=return(select_two()) id=compare >COMPARE</div>';
	  echo '<br /><br />';
	  }
	}

if($err)
 {
  echo '<div class=error ><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;College not found!!!</div><br /><br /><br />';
  $err=0;
 }
}
else
{
echo '<br /><br /><br /><br /><br /><br />';
}
feedback();
echo '</div></div></div>';
?>
<?php
include("footer.php");
?>
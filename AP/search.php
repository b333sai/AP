<?php
include("header.php");
?>
<?php
echo '<div id=page_container><div id=content>';
include("side_menu.php");
echo '<div id=article>';
 echo '<p>Please choose the options accordingly to reach the appropriate college. Select one or more choices to filter the colleges more precisely.</p>';
search_form("normal");
if(isset($_POST['sub']))
{
 $state;
 echo '<br /><p style="color:green;" >Search results for : </p><p id=s_query >';
 if($_POST['clg_name']!=-1)
  {
   echo "<b>College::</b><i class=query_values >".$_POST['clg_name']."</i>";
  }
 if($_POST['clg_id']!=-1)
  {
   echo "<b> College Code::</b><i class=query_values >".$_POST['clg_id']."</i>";
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
	  echo '<tr align=center ><th>Select</th><th>Sno.</th><th>Name</th><th>Code</th><th>Stream</th><th>Visit</th></tr>';
	   $f=0;
	   }
	  $coun++;
	  echo '<tr id='.$rows[id].'><td align=center ><input type=checkbox name='.$rows[id].' value='.$rows[id].' onclick=return(clg_select();) /></td><td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[id].'</td><td>';
	  if($rows[engineering]==1)
	   echo 'Engineering ';
	  if($rows[medical]==1)
	   echo 'Medical ';
	  if($rows[management]==1)
	   echo 'Management.';
	  echo '</td><td><a target="_blank" href=view_college.php?c1='.$rows[id].'>Details</a></td></tr>';
	 }
	 echo '</table><br /><br />';
	}

if($err)
 {
  echo '<div class=error ><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;College not found!!!</div><br /><br /><br />';
  $err=0;
 }
}
else
{
echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
}
go_top();
echo '</div></div></div>';
?>
<?php
include("footer.php");
?>
<?php
include("header.php");
?>
<?php
echo '<div id=page_container><div id=content>';
include("side_menu.php");
echo '<div id=article>';
search_form();
if(isset($_POST['sub']))
{
 echo '<br /><p style="color:green;" >Search results for : </p><p id=s_query >';
 if($_POST['clg_name']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[clg_name]' ");
   while($r=mysql_fetch_array($s))
    {	
   echo "<b>College::</b><i class=query_values >".$r[name]."</i>";
    }
  }
 if($_POST['clg_id']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[clg_id]' ");
   while($r=mysql_fetch_array($s))
    {
   echo "<b> College Code::</b><i class=query_values >".$r[id]."</i>";
    }
  }
 if($_POST['clg_director']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[clg_director]' ");
   while($r=mysql_fetch_array($s))
    {
   echo "<b> Director::</b><i class=query_values >".$r[director]."</i>";
    }
  }
 if($_POST['city']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[city]' ");
   while($r=mysql_fetch_array($s))
    {
   echo "<b> City::</b><i class=query_values >".$r[city]."</i>";
    }
  }
 if($_POST['state']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[state]' ");
   while($r=mysql_fetch_array($s))
    {
	 $s2=mysql_query("SELECT * from states WHERE Sno='$r[state]' ");
	  while($r2=mysql_fetch_array($s2))
	   {
        echo "<b> State::</b><i class=query_values >".$r2[state]."</i>";
       }
    }
  }
 if($_POST['pincode']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[pincode]' ");
   while($r=mysql_fetch_array($s))
    {
   echo "<b> Pincode::</b><i class=query_values >".$r[pincode]."</i>";
    }
  }
 if($_POST['yop']!=-1)
  {
   $s=mysql_query("SELECT * from college_info WHERE id='$_POST[yop]' ");
   while($r=mysql_fetch_array($s))
    {
   echo "<b> Year of Opening::</b><i class=query_values >".$r[year_of_opening]."</i>";
    }
  }
echo "</p>";
$arr=array($_POST['clg_name'] , $_POST['clg_id'] , $_POST['clg_director'] , $_POST['yop'] , $_POST['city'] , $_POSt['state'] , $_POST['pincode'] );

for($i=0;$i<7;$i++)
 {
  for($j=0;$j<7;$j++)
   {
    if($arr[$i]==$arr[$j] && $i!=$j)
	 {
	  $arr[$j]=-1;
	 }
   }
 }
echo "<br /><table name=search_results class=search_results cellpadding=8 >";
$f=1;
$err=1;
$count=0;
for($i=0;$i<7;$i++)
 {
  if($arr[$i]!=-1)
   {
    $cs=mysql_query("SELECT * from college_info WHERE id='$arr[$i]' ");
	while($rows=mysql_fetch_array($cs))
	 {
	  $err=0;
	  if($f==1)
	   {
	  echo '<tr align=center ><th>Select</th><th>Sno.</th><th>Name</th><th>Code</th><th>Stream</th><th>Visit</th></tr>';
	   $f=0;
	   }
	  $count++;
	  echo '<tr id='.$rows[id].'><td align=center ><input type=checkbox name='.$rows[id].' value='.$rows[id].' onclick=return(clg_select();) /></td><td>'.$count.'</td><td>'.$rows[name].'</td><td>'.$rows[id].'</td><td>';
	  if($rows[engineering]==1)
	   echo 'Engineering ';
	  if($rows[medical]==1)
	   echo 'Medical ';
	  if($rows[management]==1)
	   echo 'Management.';
	  echo '</td><td><a target="_blank" href=view_college.php?c1='.$arr[$i].'>Details</a></td></tr>';
	 }
    }
 }
echo '</table><br /><br />';
if($err)
 {
  echo '<p class=error align=center >College not found!!!</p><br /><br /><br />';
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
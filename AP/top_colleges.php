<?php
include("header.php");
?>
<?php
echo '<div id=page_container><div id=content>';
include("side_menu.php");
if($_GET['stream']=="engineering")
{
echo '<script>
onload=high_side(0);
</script>';
echo '<title>Top Engineering Colleges</title>';
echo "<h2>Top Engineering Colleges</h2>";
echo '<div id=article >';

$q="engineering=1 ";
}
else if($_GET['stream']=="medical")
{
echo '<script>
onload=high_side(1);
</script>';
echo '<title>Top Medical Colleges</title>';
echo "<h2>Top Medical Colleges</h2>";
echo '<div id=article >';
$q="medical=1 ";
}
else if($_GET['stream']=="management")
{
echo '<script>
onload=high_side(2);
</script>';
echo '<title>Top Management Colleges</title>';
echo "<h2>Top Management Colleges</h2>";
echo '<div id=article >';
$q="management=1 ";
}
else
{
echo '<script>
onload=high_side(3);
</script>';
echo '<title>Top Colleges</title>';
echo "<h2>Mostly viewed colleges</h2>";
echo '<div id=article >';
}
$query="SELECT * from college_info ";
if(!($_GET['stream']=="most_viewed"))
 {
  $query.="WHERE ";
 }
$query.=$q;
if(isset($_GET['next']))
{
 $query.=" rank='$next' ";
}
if($_GET['stream']=="most_viewed")
{
 $query.=" order by views DESC";
}
else
{
 $query.=" order by rank ";
}

$s=mysql_query($query);
$res_count=mysql_num_rows($s);
echo "<br /><p>Showing results: </p>";
if($res_count!=0)
 {
  echo '<p align=center style="size:13px;color:green;">';
  if($res_count>1)
   echo 'Total ';
  else
   echo 'Only ';
   echo $res_count;
  if($res_count>1)
   echo ' colleges ';
  else
   echo ' college ';
  echo 'found!</p>';
  if($res_count>=2)
   echo '<span style="color:blue;font-size:15px;" >* Select any two colleges to compare!</span>';
 }
else
{
 echo '<p class=error ><img src="images/sad.png" title=sorry width=30 height=30 />&nbsp;&nbsp;No results found!!!</p>';
}
echo '<table class=search_results cellpadding=8 >';
$count=0;
$f=1;
while($r=mysql_fetch_array($s))
 {
	  if($f==1)
	   {
	  echo '<tr align=center >';
	  if($res_count>=2)
	   echo '<th>*</th>';
	  
	  echo '<th>#</th><th>Name</th><th>Code</th>';
	  if($_GET['stream']=="most_viewed")
	   {
	    echo '<th>Views</th>';
	   }
	  else
	   {
	    echo '<th>Rank</th>';
	   }
	  echo '<th>More</th></tr>';
	   $f=0;
	   }
	  $count++;
	  echo '<tr id='.$r[id].' >';
	  if($res_count>=2)
	   echo '<td><input type=checkbox id=c name=c value='.$r[id].' onclick=return(check_two(this)) /></td>';
	   
	   echo '<td>'.$count.'</td><td>'.$r[name].'</td><td>'.$r[id].'</td>';
	  if($_GET['stream']=="most_viewed")
	   {
	    echo '<td>'.$r[views].'</td>';
	   }
	  else
	   {
	    echo '<td>'.$r[rank].'</td>';
	   }
	  echo '<td><a target="_blank" href=view_college.php?c1='.$r[id].' style="color:white;" ><u><b color=white ><big>Details</big></b></u></a></td></tr>';
 }

echo '</table><br />';
if($res_count>=2)
 echo '<div onclick=return(select_two()) id=compare >COMPARE</div><br />';
 
if($res_count>=10)
 go_top();
else
echo '<br /><br /><br /><br />';


feedback();
echo '</div>';
echo '</div></div>';
?>
<?php
include("footer.php");
?>
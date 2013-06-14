<?php
include("header.php");
 echo '<script>
onload=high(1);
</script>';
?>
<?php
echo '<div id=page_container ><div id=content>';
include("side_menu.php");
echo '<div id=article >';
echo '<h2>';
if($_POST[stream]=="eng")
 {
 echo 'Engineering';
 }
else if($_POST[stream]=="med")
{
 echo 'Medical';
}
else if($_POST[stream]=="man")
{
 echo 'Management';
}
echo ' Colleges</h2>';
echo '<p>Choose the stream to see the results!</p>';
echo '<center><div id=choice >
 <h4>Select</h4>
 </br><form action=colleges.php method=post>
 <table id="table1" >
 
 <tr>
 <td id=choices ><label ><input type=radio name=stream id=stream1 value=eng onclick=submit() />Engineering</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream2 value=med   onclick=submit() />Medical</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream3 value=man   onclick=submit() />Management</label></td>
 
 </tr></table></form></div></center>';

if(isset($_POST[stream]))
 {
 echo '<p>Search results: </p>';
 $q="SELECT * from college_info WHERE";
if($_POST[stream]=="eng")
 {
  $q.=" engineering=1 ";
 }
else if($_POST[stream]=="med")
{
 $q.=" medical=1 ";
}
else if($_POST[stream]=="man")
{
 $q.=" management=1 ";
}
$cs=mysql_query($q);
$res_count=mysql_num_rows($cs);
if($res_count!=0)
 {
  echo '<br /><div align=center style="size:13px;color:green;">';
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
   
 $f=1;
 $coun=0;
	while($rows=mysql_fetch_array($cs))
	 {
	  $err=0;
	  if($f==1)
	   {
	   	  echo "<br /><table name=search_results class=search_results cellpadding=8 >";
	      echo '<tr align=center >';
		  
		  if($res_count>=2)
		   echo '<th>*</th>';
		   
		  echo '<th>#</th><th>Name</th><th>Code</th><th>More</th></tr>';
	   $f=0;
	   }
	  $coun++;
	  echo '<tr id='.$rows[id].' >';
	  if($res_count>=2)
	   echo '<td><input type=checkbox id=c name=c value='.$rows[ap_id].' onclick=return(check_two(this)) /></td>';
	   
	   echo '<td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[coll_code].'</td><td><a target="_blank" href=view_college.php?c1='.$rows[ap_id].' style="color:white;"><u><b color=white ><big>Details</big></b></u></a></td></tr>';
	 }

	   echo '</table>';
	   if($res_count>=2)
	    echo '<br /><div onclick=return(select_two()) id=compare >COMPARE</div>';
	  echo '<br /><br /><br /><br />';
 }
else
{
  echo '<br /><br /><div class=error ><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;Zero colleges found!!!</div><br /><br /><br /><br /><br />';
}

}
else
{
 echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
}
feedback();
echo '</div>';
echo '</div></div>';
?>
<?php
include("footer.php");
?>

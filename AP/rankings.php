<?php
include("functions.php");
header_content();
 echo '<title>Rankings</title>';

 echo '<script>
onload=high(1);
</script>';

?>
<?php
 echo '<center><h2>Rankings Of Colleges</h2></center>';
	   ?>
<?php
 include("side_menu.php");
 ?>
<?php
 echo '<div id=article >';
 echo '<p>Know about the ranks of various colleges in India depending of your choice of the stream.</p><p>Choose the branch and know the results.</p>';
 echo '<center><div id=choice >
 <h4>Select your stream</h4>
 </br>
 <table id="table1" >
 <form action=rankings.php method=get >
 <tr>
 <td id=choices ><label ><input type=radio name=stream id=stream1 value=eng onclick="submit();" />Engineering</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream2 value=med onclick="submit();" />Medical</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream3 value=man onclick="submit();" />Management</label></td>
 </form>
 </tr></table></div></center>';
 if(isset($_GET['stream']))
 {
 $query="SELECT * from college_info  ";
 if($_GET['stream']=="eng")
  {
   $query.="WHERE engineering=1 ";
  }
 else if($_GET['stream']=="med")
  {
   $query.="WHERE medical=1 ";
  }
 else
  {
   $query.="WHERE management=1 ";
  }
 $select=mysql_query($query);
 $res_count=mysql_num_rows($select);
 $f=1;
 $coun=0;
	while($rows=mysql_fetch_array($select))
	 {
	  if($f==1)
	   {
	      echo '<br /><div class=success >Results: </div>';
	   	  echo "<br /><table name=search_results class=search_results cellpadding=8 >";
	      echo '<tr align=center ><th>#</th><th>Name</th><th>Code</th><th>Stream</th><th>Rank</th><th>Visit</th></tr>';
	   $f=0;
	   }
	  $coun++;
	  echo '<tr id='.$rows[id].' ><td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[id].'</td><td>';
	  if($rows[engineering]==1)
	   echo 'Engineering ';
	  if($rows[medical]==1)
	   echo 'Medical ';
	  if($rows[management]==1)
	   echo 'Management.';
	  echo '</td><td>'.$rows[rank].'</td><td><a target="_blank" href=view_college.php?c1='.$rows[id].'>Details</a></td></tr>';
	 }
echo '</table><br /><br />';
 if($res_count>=5)
  go_top();
}

 echo '<br /><br /><br /><br /><br />';


  feedback();
 echo '</div>';

?>
<?php
 include("footer.php");
?>
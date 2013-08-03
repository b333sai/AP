<?php
include("functions.php");
header_content();
?>
<?php
 echo '<script>
onload=high(0);
</script>';



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



/////search form///////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div id=search align=center >
	  <table name=search_table cellspacing=10 >
	  <form action=search.php';
echo '?stream='.$_GET['stream'];
echo ' method=post name=csearch id=c_search >';
 
      //queries for requesting the dropdown data
 	  $q_n="select distinct name from college_info WHERE ";
	  $q_c="select distinct city from college_info  WHERE ";
	  $q_shrt="select distinct shrt_name from college_info  WHERE ";
	  $q_d="select distinct director from college_info  WHERE ";
	  $q_yoo="select distinct year_of_opening from college_info  WHERE ";
	  $q_s="select distinct state from college_info  WHERE ";
	  $q_p="select distinct pincode from college_info  WHERE  ";
	  if($_GET['stream']=="eng")
	   {
	    $q_n.=" engineering=1 ";
		$q_c.=" engineering=1 ";
		$q_shrt.=" engineering=1 ";
		$q_d.="  engineering=1 ";
		$q_yoo.=" engineering=1 ";
		$q_s.="engineering=1 ";
		$q_p.=" engineering=1 ";
	   }
	  if($_GET['stream']=="med")
	   {
	    $q_n.=" medical=1 ";
		$q_c.=" medical=1 ";
		$q_shrt.=" medical=1 ";
		$q_d.=" medical=1 ";
		$q_yoo.=" medical=1 ";
		$q_s.=" medical=1 ";
		$q_p.=" medical=1 ";
	   }
	  if($_GET['stream']=="man")
	   {
	    $q_n.=" management=1";
		$q_c.=" management=1 ";
		$q_shrt.="  management=1 ";
		$q_d.="  management=1 ";
		$q_yoo.="  management=1 ";
		$q_s.="  management=1 ";
		$q_p.="  management=1 ";
	   }
	   	$q_n.=" order by name";
		$q_c.=" order by city";
		$q_shrt.=" order by shrt_name";
		$q_d.=" order by director";
		$q_yoo.=" order by year_of_opening";
		$q_s.=" order by state";
		$q_p.=" order by pincode";
     //queries for requesting the dropdown data
	 
	
$not_set=1;
$name_set=0;
$s_name_set=0;
$director_set=0;
$city_set=0;
$state_set=0;
$pincode_set=0;
$year_set=0;

// if(isset($_POST['clg_name']) && ($_POST['clg_name']!=-1))
// {
 //echo '<script>alert("college2");</script>';
		// $q_c.=" and name='$_POST[clg_name]' ";
		// $q_shrt.=" and name='$_POST[clg_name]' ";
		// $q_d.=" and name='$_POST[clg_name]' ";
		// $q_yoo.=" and name='$_POST[clg_name]' ";
		// $q_s.=" and name='$_POST[clg_name]' ";
		// $q_p.=" and name='$_POST[clg_name]' ";
	// $not_set=0;
	// $name_set=1;
// }
// else if(isset($_POST['clg_shrt_name']) && ($_POST['clg_shrt_name']!=-1))
// {
//echo '<script>alert("short name");</script>';
		// $q_n.=" and shrt_name='$_POST[clg_shrt_name]' ";
		// $q_c.=" and shrt_name='$_POST[clg_shrt_name]' ";
		// $q_d.=" and shrt_name='$_POST[clg_shrt_name]' ";
		// $q_yoo.="  and shrt_name='$_POST[clg_shrt_name]' ";
		// $q_s.=" and shrt_name='$_POST[clg_shrt_name]' ";
		// $q_p.=" and shrt_name='$_POST[clg_shrt_name]' ";
			// $not_set=0;
			// $s_name_set=1;
// }
// else if(isset($_POST['clg_director']) && ($_POST['clg_director']!=-1))
// {
 //echo '<script>alert("director");</script>';
 		// $q_n.=" and director='$_POST[clg_director]' ";
		// $q_c.=" and director='$_POST[clg_director]' ";
		// $q_shrt.=" and director='$_POST[clg_director]' ";
		// $q_yoo.=" and director='$_POST[clg_director]' ";
		// $q_s.=" and director='$_POST[clg_director]' ";
		// $q_p.=" and director='$_POST[clg_director]' ";
			// $not_set=0;
			// $director_set=1;
// }
// else if(isset($_POST['city']) && ($_POST['city']!=-1))
// {
 //echo '<script>alert("city");</script>';
  		// $q_n.=" and city='$_POST[city]' ";
		// $q_d.=" and city='$_POST[city]' ";
		// $q_shrt.=" and city='$_POST[city]' ";
		// $q_yoo.=" and city='$_POST[city]' ";
		// $q_s.=" and city='$_POST[city]' ";
		// $q_p.=" and city='$_POST[city]' ";
			// $not_set=0;
			// $city_set=1;
// }
// else if(isset($_POST['state']) && ($_POST['state']!=-1))
// {
 //echo '<script>alert("state");</script>';
  		// $q_n.=" and state='$_POST[state]' ";
		// $q_d.=" and state='$_POST[state]' ";
		// $q_shrt.=" and state='$_POST[state]' ";
		// $q_yoo.=" and state='$_POST[state]' ";
		// $q_c.=" and state='$_POST[state]'  ";
		// $q_p.=" and state='$_POST[state]' "; 
			// $not_set=0;
			// $state_set=1;
// }
// else if(isset($_POST['pincode']) && ($_POST['pincode']!=-1))
// {
 //echo '<script>alert("pincode");</script>';
  		// $q_n.=" and pincode='$_POST[pincode]' ";
		// $q_d.=" and pincode='$_POST[pincode]' ";
		// $q_shrt.=" and pincode='$_POST[pincode]' ";
		// $q_yoo.=" and pincode='$_POST[pincode]' ";
		// $q_c.=" and pincode='$_POST[pincode]' ";
		// $q_s.=" and pincode='$_POST[pincode]' ";
			// $not_set=0;
			// $pincode_set=1;
// }
// else if(isset($_POST['yoo']) && ($_POST['yoo']!=-1))
// {
 //echo '<script>alert("year");</script>';
   		// $q_n.=" and year_of_opening='$_POST[yoo]' ";
		// $q_d.=" and year_of_opening='$_POST[yoo]' ";
		// $q_shrt.=" and year_of_opening='$_POST[yoo]' ";
		// $q_p.=" and year_of_opening='$_POST[yoo]'  ";
		// $q_c.=" and year_of_opening='$_POST[yoo]' ";
		// $q_s.=" and year_of_opening='$_POST[yoo]' ";
			// $not_set=0;
			// $year_set=1;
// }
// else
// {
// ;
// }


//javascript:alert(\'hai\');
echo '
      <tr>
	  <td rowspan=7 valign=top ><input type=submit id=submit name=submit value=Search /></td>
	  <td>by</td>
	  <td colspan=5 >  
	  <select name=clg_name  style="width:500px;" title=COLLEGE >';

	  echo '<option value=-1 >--college--</option>';

	  $s1=mysql_query($q_n);
	  while($r1=mysql_fetch_array($s1))
	   {
	       echo '<option  name=clg_name value="'.$r1[name].'" >'.$r1[name].'</option>';
	   }

	   
	  echo '</select>
	  </td>
	  </tr>';
	  
	  
echo '<tr>
	  <td>by</td>
	  <td>  
	  <select name=clg_shrt_name title="SHORT NAME" class=sel >';
	  echo '<option value=-1 >--short name--</option>';
	  
	  $s1=mysql_query($q_shrt);  
	  while($r1=mysql_fetch_array($s1))
	   {
	   echo '<option name=clg_shrt_name value="'.$r1[shrt_name].'" >'.$r1[shrt_name].'</option>';
	   }


	  echo '</select>
	  </td>';
	  
	  echo '
	  <td>by</td>
	  <td><select name=clg_director title=DIRECTOR  class=sel >';

	  echo '<option value=-1 >--director--</option>';
	  $s1=mysql_query($q_d);
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=clg_director value="'.$r1[director].'" >'.$r1[director].'</option>';
	   }

	  echo '</select>
	  </td>';
	  
	  
	  echo '
	  <td>by</td>
	  <td><select  name=yop title="YEAR OF OPENING" class=sel  >';
	  echo '<option value=-1 >--established year--</option>';
	  $s1=mysql_query($q_yoo);  
	  while($r1=mysql_fetch_array($s1))
	   {
	   	    echo '<option name=yop value="'.$r1[year_of_opening].'" >'.$r1[year_of_opening].'</option>';
	   }

	  echo '</select>
	  </td>
	  </tr>';
	  
	  
echo '<tr>
	  <td>by</td>
	  <td>  
	  <select  name=city title=CITY  class=sel >';
	  echo '<option value=-1 >--city--</option>';
	  $s1=mysql_query($q_c);
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=city value="'.$r1[city].'" >'.$r1[city].'</option>';
	   }

	  echo '</select>
	  </td>';
	  
	  echo '<td>by</td>
	  <td><select  name=state title=STATE  class=sel >';
	  echo '<option value=-1 >--state--</option>';
	  $s1=mysql_query($q_s); 
	  while($r1=mysql_fetch_array($s1))
	   {
	   	 $s2=mysql_query("SELECT state from states WHERE Sno='$r1[state]' ");
		while($r2=mysql_fetch_array($s2))
		 {		
	   	 echo '<option name=state value="'.$r1[state].'" >'.$r2[state].'</option>';
		 }
	   }

	  echo '</select>
	  </td>';
	  
	  
	  echo '<td>by</td>
	  <td><select  name=pincode title=PINCODE  class=sel >';

	  echo '<option value=-1 >--pincode--</option>';
	  $s1=mysql_query($q_p); 
	  while($r1=mysql_fetch_array($s1))
	   {
	   echo '<option name=pincode value="'.$r1[pincode].'" >'.$r1[pincode].'</option>';
	   }

	  echo '</select>
	  </td>
	  </tr>';
	  echo '</form></table>
	  </div>';
/////search form///////////////////////////////////////////////////////////////////////////////////////////////////////////







$query_success=0;
if(isset($_POST['submit']))
{
//header('Location: '.$_SERVER['REQUEST_URI']);
//echo '<script>Location.reload(true);</script>';
 echo '<br /><p>Search results for : </p><p id=s_query >';
 if($_POST['clg_name']!=-1)
  {
   echo "<b>College::</b><i class=query_values >".$_POST['clg_name']."</i>";
   $query_success=1;
  }
 if($_POST['clg_shrt_name']!=-1)
  {
   echo "<b> Short Name::</b><i class=query_values >".$_POST['clg_shrt_name']."</i>";
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
   echo "<b> Established year::</b><i class=query_values >".$_POST['yop']."</i>";
   $query_success=1;
  }
if($query_success==1)
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
	$query="SELECT * from college_info  WHERE ";

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
  echo 'found!</div><br />';
    if($res_count>=2)
   echo '<span style="color:blue;font-size:15px;" >* Select any two colleges to compare!</span>';
   
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
	   echo '<td><input type=checkbox id=c name=c value='.$rows[ap_id].' disabled/></td>';
	   
	   echo '<td>'.$coun.'</td><td>'.$rows[name].'</td><td>'.$rows[coll_code].'</td><td><a target="_blank" href=view_college.php?c1='.$rows[ap_id].' style="color:white;"><u><b color=white ><big>Details</big></b></u></a></td></tr>';
	 }
	 echo '</table>';
	 if($err==0)
	  {	   
	   if($res_count>=2)
	    echo '<br /><div onclick=return(select_two()) id=compare >COMPARE</div>';
	  echo '<br /><br />';
	  }	 
 }

	}

if($err)
 {
  echo '<br /><div class=error ><img src="images/sad.png" width=30 height=30 valign=bottom />&nbsp;&nbsp;&nbsp;College not found!!!</div><br /><br /><br />';
  //if($_SESSION['load_count']==1)
  //{
   //echo '<script>alert(\'second\');</script>';
    //echo '<script>alert('.$_SESSION['load_count'].');</script>';
   //$_SESSION['load_count']=0;
   //echo '<script>alert('.$_SESSION['load_count'].');</script>';
  //}
  $err=0;
 }
}

else
{
echo '<br /><br /><br /><br /><br /><br />';
}
feedback();
echo '</div>';
?>
<?php
 //echo '<script>alert('.$_SESSION['load_count'].');</script>';
// if($not_set==0 && $_SESSION['load_count']==0 )
// {
 // $_SESSION['load_count']=1;
 //echo '<script>alert('.$_SESSION['load_count'].');</script>';
 // echo '<script>document.getElementById(\'c_search\').submit();</script>';
// }

// if($not_set==1 && $_SESSION['load_count']==1 )
// {
 // $_SESSION['load_count']=1;
 // echo '<script>alert('.$_SESSION['load_count'].');</script>';
// echo '<script>document.getElementById(\'c_search\').submit();</script>';
// }


include("footer.php");
?>
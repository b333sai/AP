<?php
include("functions.php");
header_content();

?>
<?php

include("side_menu.php");
echo '<div id=article>';
echo '<div id=view_college>';
echo '<p class=success align=center >College Details</p>';
echo '<table name=college_view class=college_view cellspacing=10 cellpadding=3 border=1 >';
mysql_query("UPDATE `college_info` SET views=views+1 WHERE ap_id='$_GET[c1]'  ");
$select=mysql_query("SELECT * from college_info WHERE ap_id='$_GET[c1]' ");
while($row=mysql_fetch_array($select))
 {
  echo '<tr><td colspan=2 style="background-color:grey;color:white;"><b>Basic Information</b></td></tr>';
  echo '<tr><td class=left_e >Name:</td><td>'.$row[name].'</td></tr>';
  echo '<tr><td class=left_e >Short Name:</td><td>'.$row[shrt_name].'</td></tr>';
  echo '<tr><td class=left_e >College code:</td><td>'.$row[coll_code].'</td></tr>';
  echo '<tr><td class=left_e >Director:</td><td>'.$row[director].'</td></tr>';
  echo '<tr><td class=left_e >College Logo:</td><td><img width=100 height=100 src="logos/'.$row[ap_id].'.png" title='.$row[ap_id].' alt='.$row[ap_id].'/></td></tr>';
  echo '<tr><td class=left_e >Establishment Year:</td><td>'.$row[year_of_opening].'</td></tr>';
  echo '<tr><td class=left >Affiliated to:</td><td>'.$row[affiliated].'</td></tr>';
   echo '<tr><td class=left >Category:</td><td>'.$row[category].'</td></tr>';
   echo '<tr><td class=left >Type:</td><td>'.$row[type].'</td></tr>';

   
  echo '<tr><td class=left_e >Amenities:</td><td><table><tr><td>';
  if($row[auditorium])
   {
  echo '<td><label for="audit"><span id=auditorium title=AUDITORIUM></span></label></td>';
   }
  if($row[canteen])
   {
    echo '<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>';
   }
  if($row[computer_labs])
   {
    echo '<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>';
   }
  if($row[medical_facility])
   {
    echo '<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>';
   }
  if($row[gym])
   {
    echo '<td><label for="gm"><span id=gym title=GYM></span></label></td>';
   }
  if($row[laboratories])
   {
    echo '<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>';
   }
  if($row[library])
   {
    echo '<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>';
   }
  if($row[sports])
   {
    echo '<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>';
   }
  if($row[hostels])
   {
    echo '<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td>';
   }
   echo '</td></tr></table></td></tr>';
  
  echo '<tr><td class=left_e >Students Intake:</td><td>';
  if($row[intake]==90)
   {
    echo '10-100';
   }
   else if($row[intake]==100)
    echo '100-200';
   else if($row[intake]==300)
    echo '200-500';
   else if($row[intake]==500)
    echo '500-100';
   else
    echo 'above 1000';
	echo ' students</td></tr>';
	
  echo '<tr style="background-color:grey;color:white;" id=cou_plus ><td colspan=2 ><img src="images/down.png" id=cou_img height=23 width=23 />&nbsp;&nbsp;<b style="vertical-align:top;" >Course Details</b></td></tr>';
  echo '<tr class=cou ><td colspan=2 ><table><tr>';
  if($row[engineering])
   {
  echo '<td class=courses ><b><u>Engineering</u></b><br />';
  echo '<font class=course_details >'.$row[eng_courses].'</font>';
  echo '</td>';
   }
  if($row[medical])
   {
  echo '<td class=courses ><b><u>Medical</u></b><br /><font class=course_details >'.$row[man_courses].'</font></td>';
   }
  if($row[management])
   {
  echo '<td class=courses ><b><u>Management</u></b><br /><font class=course_details >'.$row[man_courses].'</font></td>';
   }
   echo '</tr></table></td></tr>';

   
   
	
  echo '<tr style="background-color:grey;color:white;" id=con_plus ><td colspan=2 ><img src="images/down.png" id=con_img height=23 width=23 />&nbsp;&nbsp;<b style="vertical-align:top;" >Contact Details</b></td></tr>';
  echo '<tr  class=con  ><td class=left_e >Address:</td><td>'.$row[address].'</td></tr>';
  echo '<tr  class=con ><td class=left_e >City:</td><td>'.$row[city].'</td></tr>';
  //USING JOIN
  $sle=mysql_query("SELECT a.state FROM states a, college_info b WHERE b.ap_id='$_GET[c1]' AND b.state=a.Sno ");
  //USING JOIN
  while($rs=mysql_fetch_array($sle))
  {
  echo '<tr class=con ><td class=left_e >State:</td><td>'.$rs[state].'</td></tr>';  
  }
  // $sel=mysql_query("SELECT * from states WHERE Sno='$row[state]' ");
  // while($r=mysql_fetch_array($sel))
   // {
  // echo '<tr class=con ><td class=left_e >State:</td><td>'.$r[state].'</td></tr>';
   // }
  echo '<tr class=con ><td class=left_e >Pincode:</td><td>'.$row[pincode].'</td></tr>';
  echo '<tr class=con ><td class=left_e >Contact:</td><td>+91 - ('.substr($row[phone],0,2).') - '.substr($row[phone],2,strlen($row[phone])).'</td></tr>';
  if($row[fax]!="")
   {
  echo '<tr class=con ><td class=left_e >Fax:</td><td>+91 - ('.substr($row[fax],0,2).') - '.substr($row[fax],2,strlen($row[fax])).'</td></tr>';
   }
  if($row[train]!="")
   {
  echo '<tr class=con ><td class=left_e >Nearest Railway Station:</td><td>'.$row[train].'</td></tr>';
  }
  echo '<tr class=con ><td class=left_e >Nearest Bus Station:</td><td>'.$row[bus].'</td></tr>';
  echo '<tr class=con ><td class=left_e >Email:</td><td><a href=mailto:'.$row[email].' target="_blank"  title='.$row[email].' alt=.'.$row[ap_id].' >'.$row[email].'</a></td></tr>';
  if($row[website]!="")
   {
  echo '<tr class=con ><td class=left_e >Website:</td><td><a href='.$row[website].' target="_blank" alt='.$row[id].' title="'.$row[ap_id].'" >'.$row[website].'</a></td></tr>';
   }
  echo '<tr><td colspan=2  style="background-color:grey;color:white;"><b>Site Information</b></td></tr>';
  echo '<tr><td class=left_e >Views:</td><td>'.$row[views].'</td></tr>';
  echo '<tr><td class=left_e >Rank:</td><td>'.$row[rank].'</td></tr>';
  echo '</div>';
 }
echo '</table>';
echo '</div><br />';
feedback();
echo '</div>';
?>
<?php
include("footer.php");
?>
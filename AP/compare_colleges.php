<?php
include("header.php");
?>
<?php
echo '<title>Compare colleges</title>';
echo '<div id=page_container><div id=content>';
echo '<div id=main_article>';
echo '<center><h2>Comparision</h2><br />';
if(isset($_GET['c1']) && isset($_GET['c2']))
{
mysql_query("UPDATE `college_info` SET views=views+1 WHERE ap_id='$_GET[c1]'  ");
mysql_query("UPDATE `college_info` SET views=views+1 WHERE ap_id='$_GET[c2]'  ");
 echo '<table id=comparision name=comparision cellspacing=10 cellpadding=3 border=2 >';
 $q1="SELECT * from college_info WHERE ap_id='$_GET[c1]'";
 $q2="SELECT * from college_info WHERE ap_id='$_GET[c2]'";
 $s1=mysql_query($q1);
 $s2=mysql_query($q2);
 
 while($r1=mysql_fetch_array($s1))
  {
    while($r2=mysql_fetch_array($s2))
     {
  echo '<tr style="background-color:grey;color:white;" ><td><b>Basic Information</b></td><td align=center >A</td><td align=center >B</td></tr>';
  echo '<tr><td class=left_e >Name:</td><td>'.$r1[name].'</td><td>'.$r2[name].'</td></tr>';
  echo '<tr><td class=left_e >Short Name:</td><td>'.$r1[shrt_name].'</td><td>'.$r2[shrt_name].'</td></tr>';
  echo '<tr><td class=left_e >College code:</td><td>'.$r1[coll_code].'</td><td>'.$r2[coll_code].'</td></tr>';
  echo '<tr><td class=left_e >Director:</td><td>'.$r1[director].'</td><td>'.$r2[director].'</td></tr>';
  echo '<tr><td class=left_e >College Logo:</td><td><img width=100 height=100 src="logos/'.$r1[ap_id].'.png" title='.$r1[ap_id].' alt='.$r1[ap_id].'/></td><td><img width=100 height=100 src="logos/'.$r2[ap_id].'.png" title='.$r2[ap_id].' alt='.$r2[ap_id].'/></td></tr>';
  echo '<tr><td class=left_e >Establishment Year:</td><td>'.$r1[year_of_opening].'</td><td>'.$r2[year_of_opening].'</td></tr>';
  echo '<tr><td class=left >Affiliated to:</td><td>'.$r1[affiliated].'</td><td>'.$r2[affiliated].'</td></tr>';
   echo '<tr><td class=left >Category:</td><td>'.$r1[category].'</td><td>'.$r2[category].'</td></tr>';
   echo '<tr><td class=left >Type:</td><td>'.$r1[type].'</td><td>'.$r2[type].'</td></tr>';
   
   
   
  echo '<tr><td class=left_e >Amenities:</td><td><table><tr><td>';
  if($r1[auditorium])
   {
  echo '<td><label for="audit"><span id=auditorium title=AUDITORIUM></span></label></td>';
   }
  if($r1[canteen])
   {
    echo '<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>';
   }
  if($r1[computer_labs])
   {
    echo '<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>';
   }
  if($r1[medical_facility])
   {
    echo '<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>';
   }
  if($r1[gym])
   {
    echo '<td><label for="gm"><span id=gym title=GYM></span></label></td>';
   }
  if($r1[laboratories])
   {
    echo '<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>';
   }
  if($r1[library])
   {
    echo '<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>';
   }
  if($r1[sports])
   {
    echo '<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>';
   }
  if($r1[hostels])
   {
    echo '<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td>';
   }
   echo '</td></tr></table></td>';
   
   
   
     echo '<td><table><tr><td>';
  if($r2[auditorium])
   {
  echo '<td><label for="audit"><span id=auditorium title=AUDITORIUM></span></label></td>';
   }
  if($r2[canteen])
   {
    echo '<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>';
   }
  if($r2[computer_labs])
   {
    echo '<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>';
   }
  if($r2[medical_facility])
   {
    echo '<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>';
   }
  if($r2[gym])
   {
    echo '<td><label for="gm"><span id=gym title=GYM></span></label></td>';
   }
  if($r2[laboratories])
   {
    echo '<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>';
   }
  if($r2[library])
   {
    echo '<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>';
   }
  if($r2[sports])
   {
    echo '<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>';
   }
  if($r2[hostels])
   {
    echo '<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td>';
   }
   echo '</td></tr></table></td></tr>';
   
   
     echo '<tr><td class=left_e >Students Intake:</td><td>';
  if($r1[intake]==90)
   {
    echo '10-100';
   }
   else if($r1[intake]==100)
    echo '100-200';
   else if($r1[intake]==300)
    echo '200-500';
   else if($r1[intake]==500)
    echo '500-100';
   else
    echo 'above 1000';
	echo ' students</td>';
	
  echo '<td>';
  if($r2[intake]==90)
   {
    echo '10-100';
   }
   else if($r2[intake]==100)
    echo '100-200';
   else if($r2[intake]==300)
    echo '200-500';
   else if($r2[intake]==500)
    echo '500-100';
   else
    echo 'above 1000';
	echo ' students</td></tr>';
	
   echo '<tr style="background-color:grey;color:white;" id=cou_plus ><td colspan=3 ><img src="images/down.png" id=cou_img height=23 width=23 />&nbsp;&nbsp;<b style="vertical-align:top;" >Course Details</b></td></tr>';
  echo '<tr class=cou ><td></td><td><table><tr>';
  if($r1[engineering])
   {
  echo '<td class=courses ><b><u>Engineering</u></b><br />';
  echo '<font class=course_details >'.$r1[eng_courses];
  echo '</font></td>';
   }
  if($r1[medical])
   {
  echo '<td class=courses ><b><u>Medical</u></b><br /><font class=course_details >'.$r1[man_courses].'</font></td>';
   }
  if($r1[management])
   {
  echo '<td class=courses ><b><u>Management</u></b><br /><font class=course_details >'.$r1[man_courses].'</font></td>';
   }
   echo '</tr></table></td>';

  echo '<td><table><tr>';
  if($r2[engineering])
   {
  echo '<td class=courses ><b><u>Engineering</u></b><br />';
  echo '<font class=course_details >'.$r2[eng_courses];
  echo '</font></td>';
   }
  if($r2[medical])
   {
  echo '<td class=courses ><b><u>Medical</u></b><br /><font class=course_details >'.$r2[man_courses].'</font></td>';
   }
  if($r2[management])
   {
  echo '<td class=courses ><b><u>Management</u></b><br /><font class=course_details >'.$r2[man_courses].'</font></td>';
   }
   echo '</tr></table></td></tr>';
   
   
   
  echo '<tr style="background-color:grey;color:white;" id=con_plus ><td colspan=3 ><img src="images/down.png" id=con_img height=23 width=23 />&nbsp;&nbsp;<b style="vertical-align:top;" >Contact Details</b></td></tr>';
  echo '<tr class=con ><td class=left_e >Address:</td><td>'.$r1[address].'</td><td>'.$r2[address].'</td></tr>';
  echo '<tr class=con ><td class=left_e >City:</td><td>'.$r1[city].'</td><td>'.$r2[city].'</td></tr>';
  $sel1=mysql_query("SELECT * from states WHERE Sno='$r1[state]' ");
  $sel2=mysql_query("SELECT * from states WHERE Sno='$r2[state]' ");
  while($ro1=mysql_fetch_array($sel1))
   {
    while($ro2=mysql_fetch_array($sel2))
    {
  echo '<tr class=con ><td class=left_e >State:</td><td>'.$ro1[state].'</td><td>'.$ro2[state].'</td></tr>';
    }
   }
  echo '<tr class=con ><td class=left_e >Pincode:</td><td>'.$r1[pincode].'</td><td>'.$r2[pincode].'</td></tr>';
  echo '<tr class=con ><td class=left_e >Contact:</td><td>+91 - ('.substr($r1[phone],0,2).') - '.substr($r1[phone],2,strlen($r1[phone])).'</td><td>+91 - ('.substr($r2[phone],0,2).') - '.substr($r2[phone],2,strlen($r2[phone])).'</td></tr>';
  
  
  
  echo '<tr class=con ><td class=left_e >Fax:</td>';
  if($r1[fax]!="")
   {
  echo '<td>+91 - ('.substr($r1[fax],0,2).') - '.substr($r1[fax],2,strlen($r1[fax])).'</td>';
   }
  if($r2[fax]!="")
   {
  echo '<td>+91 - ('.substr($r2[fax],0,2).') - '.substr($r2[fax],2,strlen($r2[fax])).'</td>';
   }
   echo '</tr>';
   
   
  echo '<tr class=con ><td class=left_e >Nearest Railway Station:</td>'; 
  if($r1[train]!="")
   {
  echo '<td>'.$r1[train].'</td>';
   }
  if($r2[train]!="")
   {
  echo '<td>'.$r2[train].'</td>';
   }
  echo '</tr>'; 
   
   
  echo '<tr class=con ><td class=left_e >Nearest Bus Station:</td><td>'.$r2[bus].'</td><td>'.$r2[bus].'</td></tr>';
  
  
  echo '<tr class=con ><td class=left_e >Email:</td><td><a href=mailto:'.$r1[email].' target="_blank"  title='.$r1[email].' alt=.'.$r1[ap_id].' >'.$r1[email].'</a></td><td><a href=mailto:'.$r2[email].' target="_blank"  title='.$r2[email].' alt=.'.$r2[ap_id].' >'.$r2[email].'</a></td></tr>';
  
  
  
  echo '<tr class=con ><td class=left_e >Website:</td>';
  if($r1[website]!="")
   {
  echo '<td><a href='.$r1[website].' target="_blank" alt='.$r1[id].' title="'.$r1[ap_id].'" >'.$r1[website].'</a></td>';
   }
  if($r2[website]!="")
   {
  echo '<td><a href='.$r2[website].' target="_blank" alt='.$r2[id].' title="'.$r2[ap_id].'" >'.$r2[website].'</a></td>';
   }
  echo '</tr>';
   
   
   
  echo '<tr><td colspan=3  style="background-color:grey;color:white;"><b>Site Information</b></td></tr>';
  echo '<tr><td class=left_e >Views:</td><td>'.$r1[views].'</td><td>'.$r2[views].'</td></tr>';
  echo '<tr><td class=left_e >Rank:</td><td>'.$r1[rank].'</td><td>'.$r2[rank].'</td></tr>';
   

   
/*
echo '<tr><td class=left >Streams:</td><td>';
  if($r1[engineering])
   {
  echo 'Engineering';
   }
  if($r1[medical])
   {
    echo ' - Medical';
   }
  if($r1[management])
   {
    echo ' - Management';
   }
   echo '</td>';
   echo '<td>';
  if($r2[engineering])
   {
  echo 'Engineering';
   }
  if($r2[medical])
   {
    echo ' - Medical';
   }
  if($r2[management])
   {
    echo ' - Management';
   }
   echo '</td></tr>';
   
   echo '<tr><td class=left >Amenities:</td><td><table><tr><td>';
  if($r1[auditorium])
   {
  echo '<td><label for="audit"><span id=auditorium title=AUDITORIUM></span></label></td>';
   }
  if($r1[canteen])
   {
    echo '<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>';
   }
  if($r1[computer_labs])
   {
    echo '<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>';
   }
  if($r1[medical_facility])
   {
    echo '<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>';
   }
  if($r1[gym])
   {
    echo '<td><label for="gm"><span id=gym title=GYM></span></label></td>';
   }
  if($r1[laboratories])
   {
    echo '<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>';
   }
  if($r1[library])
   {
    echo '<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>';
   }
  if($r1[sports])
   {
    echo '<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>';
   }
  if($r1[hostels])
   {
    echo '<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td>';
   }
   echo '</td></tr></table></td>';
   
   
   
  echo '<td><table><tr><td>';
  if($r2[auditorium])
   {
  echo '<td><label for="audit"><span id=auditorium title=AUDITORIUM></span></label></td>';
   }
  if($r2[canteen])
   {
    echo '<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>';
   }
  if($r2[computer_labs])
   {
    echo '<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>';
   }
  if($r2[medical_facility])
   {
    echo '<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>';
   }
  if($r2[gym])
   {
    echo '<td><label for="gm"><span id=gym title=GYM></span></label></td>';
   }
  if($r2[laboratories])
   {
    echo '<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>';
   }
  if($r2[library])
   {
    echo '<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>';
   }
  if($r2[sports])
   {
    echo '<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>';
   }
  if($r2[hostels])
   {
    echo '<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td>';
   }
   echo '</td></tr></table></td></tr>';
   
   
     echo '<tr><td class=left >Students Intake:</td><td>';
  if($r1[intake]==90)
   {
    echo '10-100';
   }
   else if($r1[intake]==100)
    echo '100-200';
   else if($r1[intake]==300)
    echo '200-500';
   else if($r1[intake]==500)
    echo '500-100';
   else
    echo 'above 1000';
	echo ' students</td>';
	echo '<td>';
  if($r2[intake]==90)
   {
    echo '10-100';
   }
   else if($r2[intake]==100)
    echo '100-200';
   else if($r2[intake]==300)
    echo '200-500';
   else if($r2[intake]==500)
    echo '500-100';
   else
    echo 'above 1000';
	echo ' students</td>';
	echo '</tr>';
	
  echo '<tr><td class=left >Address:</td><td>'.$r1[address].'</td><td>'.$r2[address].'</td></tr>';
  echo '<tr><td class=left >City:</td><td>'.$r1[city].'</td><td>'.$r2[city].'</td></tr>';
  $sel1=mysql_query("SELECT * from states WHERE Sno='$r1[state]' ");
  $sel2=mysql_query("SELECT * from states WHERE Sno='$r2[state]' ");
  while($r3=mysql_fetch_array($sel1))
   {
    while($r4=mysql_fetch_array($sel2))
	 {
      echo '<tr><td class=left >State:</td><td>'.$r3[state].'</td><td>'.$r4[state].'</td></tr>';
     }
   }
  echo '<tr><td class=left >Pincode:</td><td>'.$r1[pincode].'</td><td>'.$r2[pincode].'</td></tr>';
  echo '<tr><td class=left >Contact:</td><td>+91 - ('.substr($r1[phone],0,2).') - '.substr($r1[phone],2,strlen($r1[phone])).'</td><td>+91 - ('.substr($r2[phone],0,2).') - '.substr($r2[phone],2,strlen($r2[phone])).'</td></tr>';
  
  echo '<tr><td class=left >Fax:</td>';
    if($r1[fax]!="")
   {
  echo '<td>+91 - ('.substr($r1[fax],0,2).') - '.substr($r1[fax],2,strlen($r1[fax])).'</td>';
   }
    if($r2[fax]!="")
   {
  echo '<td>+91 - ('.substr($r2[fax],0,2).') - '.substr($r2[fax],2,strlen($r2[fax])).'</td>';
   }
  echo '</tr>';
  
  
  echo '<tr><td class=left >Nearest Railway Station:</td>';
  if($r1[train]!="")
   {
  echo '<td>'.$r1[train].'</td>';
  }
  if($r2[train]!="")
   {
  echo '<td>'.$r2[train].'</td>';
  }
  echo '</tr>';
  
  
  echo '<tr><td class=left >Nearest Bus Station:</td><td>'.$r1[bus].'</td><td>'.$r2[bus].'</td></tr>';
  echo '<tr><td class=left >Email:</td><td><a href=mailto:'.$r1[email].' target="_blank"  title='.$r1[email].' alt=.'.$r1[id].' >'.$r1[email].'</a></td><td><a href=mailto:'.$r2[email].' target="_blank"  title='.$r2[email].' alt=.'.$r2[id].' >'.$r2[email].'</a></td></tr>';
  
  
  echo '<tr><td class=left >Website:</td>';
  if($r1[website]!="")
   {
  echo '<td><a href='.$r1[website].' target="_blank" alt='.$r1[id].' title='.$r1[id].' >'.$r1[website].'</td>';
   }
  if($r2[website]!="")
   {
  echo '<td><a href='.$r2[website].' target="_blank" alt='.$r2[id].' title='.$r2[id].' >'.$r2[website].'</td>';
   }
  echo '</tr>';
  echo '<tr><td class=left >Views:</td><td>'.$r1[views].'</td><td>'.$r2[views].'</td></tr>';
  echo '<tr><td class=left >Rank:</td><td>'.$r1[rank].'</td><td>'.$r2[rank].'</td></tr>';*/
   
     }//end of second while
  }//end of first while
 echo '</table></center><br />';
 go_top();
}
else
{
 echo '<p class=error>Sorry!!!Please select two collges to compare.</p>';
}
echo '<center>';
feedback();
echo '</center>';
echo '<br /></div>';
echo '</div></div>';
?>
<?php
include("footer.php");
?>
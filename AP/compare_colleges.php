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
 echo '<table id=comparision name=comparision cellspacing=10 cellpadding=3 border=2 >';
 echo '<tr><th>&nbsp;</th><th>A</th><th>B</th></tr>';
 $q1="SELECT * from college_info WHERE id='$_GET[c1]'";
 $q2="SELECT * from college_info WHERE id='$_GET[c2]'";
 $s1=mysql_query($q1);
 $s2=mysql_query($q2);
 
 while($r1=mysql_fetch_array($s1))
  {
    while($r2=mysql_fetch_array($s2))
     {
      echo '<tr><td class=left >College Name:</td><td>'.$r1[name].'</td><td>'.$r2[name].'</td></tr>';
	  echo '<tr><td class=left >College code:</td><td>'.$r1[id].'</td><td>'.$r2[id].'</td></tr>';
      echo '<tr><td class=left >Director:</td><td>'.$r1[director].'</td><td>'.$r2[director].'</td></tr>';
      echo '<tr><td class=left >College Logo:</td><td><img width=50 height=50 src="logos/'.$r1[id].'.png" title='.$r1[id].' alt='.$r1[id].'/></td><td><img width=50 height=50 src="logos/'.$r2[id].'.png" title='.$r2[id].' alt='.$r2[id].'/></td></tr>';
      echo '<tr><td class=left >Year of Opening:</td><td>'.$r1[year_of_opening].'</td><td>'.$r2[year_of_opening].'</td></tr>';
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
  echo '<tr><td class=left >Rank:</td><td>'.$r1[rank].'</td><td>'.$r2[rank].'</td></tr>';
   
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
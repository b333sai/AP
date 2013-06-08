<?php
include("header.php");
?>
<?php
echo '<div id=page_container><div id=content>';
include("side_menu.php");
echo '<div id=article>';
echo '<div id=view_college>';
echo '<p class=success align=center >College Details</p>';
echo '<table name=college_view class=college_view cellspacing=10 cellpadding=3 border=1 >';
mysql_query("UPDATE `college_info` SET views=views+1 WHERE id='$_GET[c1]'  ");
$select=mysql_query("SELECT * from college_info WHERE id='$_GET[c1]' ");
while($row=mysql_fetch_array($select))
 {
  echo '<tr><td class=left >Name:</td><td>'.$row[name].'</td></tr>';
  echo '<tr><td class=left >College code:</td><td>'.$row[id].'</td></tr>';
  echo '<tr><td class=left >Director:</td><td>'.$row[director].'</td></tr>';
  echo '<tr><td class=left >College Logo:</td><td><img width=50 height=50 src="logos/'.$row[id].'.png" title='.$row[id].' alt='.$row[id].'/></td></tr>';
  echo '<tr><td class=left >Year of Opening:</td><td>'.$row[year_of_opening].'</td></tr>';

  echo '<tr><td class=left >Streams:</td><td>';
  if($row[engineering])
   {
  echo 'Engineering';
   }
  if($row[medical])
   {
    echo ' Medical';
   }
  if($row[management])
   {
    echo ' Management';
   }
   echo '</td></tr>';


   
  echo '<tr><td class=left >Amenities:</td><td><table><tr><td>';
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
  
  echo '<tr><td class=left >Students Intake:</td><td>';
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
  echo '<tr><td class=left >Address:</td><td>'.$row[address].'</td></tr>';
  echo '<tr><td class=left >City:</td><td>'.$row[city].'</td></tr>';
  $sel=mysql_query("SELECT * from states WHERE Sno='$row[state]' ");
  while($r=mysql_fetch_array($sel))
   {
  echo '<tr><td class=left >State:</td><td>'.$r[state].'</td></tr>';
   }
  echo '<tr><td class=left >Pincode:</td><td>'.$row[pincode].'</td></tr>';
  echo '<tr><td class=left >Contact:</td><td>+91 - ('.substr($row[phone],0,2).') - '.substr($row[phone],2,strlen($row[phone])).'</td></tr>';
  if($row[fax]!="")
   {
  echo '<tr><td class=left >Fax:</td><td>+91 - ('.substr($row[fax],0,2).') - '.substr($row[fax],2,strlen($row[fax])).'</td></tr>';
   }
  if($row[train]!="")
   {
  echo '<tr><td class=left >Nearest Railway Station:</td><td>'.$row[train].'</td></tr>';
  }
  echo '<tr><td class=left >Nearest Bus Station:</td><td>'.$row[bus].'</td></tr>';
  echo '<tr><td class=left >Email:</td><td><a href=mailto:'.$row[email].' target="_blank"  title='.$row[email].' alt=.'.$row[id].' >'.$row[email].'</a></td></tr>';
  if($row[website]!="")
   {
  echo '<tr><td class=left >Website:</td><td><a href='.$row[website].' target="_blank" alt='.$row[id].' title='.$row[id].' >'.$row[website].'</td></tr>';
   }
  echo '<tr><td class=left >Views:</td><td>'.$row[views].'</td></tr>';
  echo '<tr><td class=left >Rank:</td><td>'.$row[rank].'</td></tr>';

 }
echo '</table>';
echo '</div><br />';
go_top();
echo '</div></div></div>';
?>
<?php
include("footer.php");
?>
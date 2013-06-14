<?php
function go_top()
{
 echo '<center><a href="#" ><div id=go_top align=left >TOP</div></a><br /></center>';
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function r_time_stamp($date)
  {
   $time=date("d",$date).",".date("F",$date).",".date("Y",$date).", ".date("H",$date).":".date("i",$date).":".date("s",$date);
   return $time;
  }
 
function date_time($date)
  {
   $time=date("d",$date)."".date("m",$date)."".date("Y",$date)."".date("H",$date)."".date("i",$date)."".date("s",$date);
   return $time;
  }
  
  
  
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function register_form($v)
{

if($v!="0")
{
$s=mysql_query("SELECT * FROM college_info WHERE ap_id='$v' ");
 echo '<div id=reg align=center >';
 echo '<h2>MODIFY COLLEGE</h2><br />';
 echo '<span  class=remove_style ><b>AP ID:</b> '.$v.'</span>';
 echo '<form name=register method=post action="modify_college.php?c='.$v.'"  onsubmit="return(valid(1));" enctype="multipart/form-data" >';

}
else
{
 echo'<div id=reg align=center >
<h2>REGISTRATION</h2><br />';
$app_no=date_time(time());
echo '<div class=remove_style >&nbsp;&nbsp;&nbsp;&nbsp;<b>Applicaton No: </b>'.$app_no.'</div>';
echo '<form name=register method=post action=coll_register.php onsubmit="return(valid(0));" enctype="multipart/form-data" >';
}
echo '<table cellspacing=10 id=reg_table >';
echo '<tr><td align=right class=left >';
if($v!="0")
{
while($row=mysql_fetch_array($s))
 {
  echo 'Institute Name:</td><td align=left class=right ><input type=text name=coll_name size='.(strlen($row[name])-4).'   class=right placeholder="'.$row[name].'" ></td></tr>';
  echo '<tr><td align=right  class=left >Short name:</td><td align=left  class=right ><input type=text name=coll_short_name size='.(strlen($row[shrt_name])).'  class=right placeholder="'.$row[shrt_name].'" ></td></tr>';
  echo '<tr><td align=right  class=left >College code:</td><td align=left  class=right ><input type=text name=coll_code size='.strlen($row[coll_code]).' placeholder="'.$row[coll_code].'" class=right ></td></tr>';
  
  
  echo '<tr><td align=right  class=left >Streams:</td>
<td align=left  class=right >
<input type=checkbox name=eng value=1  id=stream1 ';
if($row[engineering])
 {
  echo "checked";
 }
 echo '/><label for=stream1 >Engineering</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=mec value=1 id=stream2 ';
if($row[medical])
 {
  echo "checked";
 }
 echo '/><label for="stream2" >Medical</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=man value=1 id=stream3 ';
if($row[management])
 {
  echo "checked";
 } 
 echo '/><label for="stream3">Management</label></td>
</tr>';

echo '<tr><td></td><td><table><tr>';
echo '<td id=engg ><select name="engineering[ ]" id=engineering style="width:180px" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=1 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td id=medic ><select name="medical[ ]"  id=medicl style=" width:180px;" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=2 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course]. '" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td id=manage ><select name="management [ ]"  id=management style=" width:180px;" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=3 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '</tr></table></td></tr>';


echo '<tr><td class=left >Affiliated to:</td><td class=right ><input type=text name=affiliated  placeholder="'.$row[affiliated].'" /></td></tr>';
echo '<tr><td class=left >Category:</td><td class=right ><select name=category ><option value=-1 >--select--</option><option value="Mens College" ';
if($row[category]=="Mens College")
 echo 'selected ';
echo '>Mens</option><option value="Womens College" ';
if($row[category]=="Womens College")
 echo 'selected ';
 echo '>Womens</option><option value="Co-Education College" ';
if($row[category]=="Co-Education College")
 echo 'selected ';
echo '>Co-Education</option></select></td></tr>';


echo '<tr><td class=left >Type:</td><td class=right ><select name=type><option value=-1 >--select--</option><option value="Government" ';
if($row[type]=="Government")
 echo 'selected ';
echo '>Government</option><option value="Private" ';
if($row[type]=="Private")
 echo 'selected ';
echo '>Private</option></select></td></tr>';

echo '<tr><td align=right  class=left >Amenities:</td>
<td align=left  class=right >

<table name=amenities >
<tr>
<td><label for="audit"><span id=auditorium title=AUDITORIUM ></span></label></td>
<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>
<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>
<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>
<td><label for="gm"><span id=gym title=GYM></span></label></td>
<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>
<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>
<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>
<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td></tr>
<tr>

<td align=center ><input type=checkbox name=audit title=AUDITORIUM id=audit value=1 ';
if($row[auditorium])
 {
  echo "checked";
 }
echo '/></td>
<td align=center ><input type=checkbox name=cant title=CANTEEN id=cant value=1 ';
if($row[canteen])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=comp title="COMPUTER LABS" id=comp value=1 ';
if($row[computer_labs])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=medi title="MEDICAL" id=med value=1 ';
if($row[medical_facility])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=gm title=GYM id=gm value=1 ';
if($row[gym])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=lab title=LABORATORIES id=lab value=1 ';
if($row[laboratories])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=lib title=LIBRARY id=lib value=1 ';
if($row[library])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=spo title=SPORTS id=spo value=1 ';
if($row[sports])
 {
  echo "checked";
 }
 echo '/></td>
<td align=center ><input type=checkbox name=host title=HOSTELS id=host value=1 ';
if($row[hostels])
 {
  echo "checked";
 }
 echo '/></td>
</tr>
</table>

</td>
</tr>';


echo '<tr><td align=right  class=left >Student intake:</td>
<td align=left  class=right ><select name=students_intake >
<option name=intake value=-1 class=right ';
if($row[sports])
 {
  echo "selected";
 }
echo '>select</option>
<option name=intake value=90  class=right ';
if($row[intake]==90)
 {
  echo "selected";
 }
 echo '>10-100</option>
<option name=intake value=100  class=right ';
if($row[intake]==100)
 {
  echo "selected";
 }
echo '>100-200</option>
<option name=intake value=300  class=right ';
if($row[intake]==300)
 {
  echo "selected";
 }
 echo '>200-500</option>
<option name=intake value=500  class=right ';
if($row[intake]==500)
 {
  echo "selected";
 }
 echo '>500-1000</option>
<option name=intake value=1000  class=right ';
if($row[intake]==1000)
 {
  echo "selected";
 }
 echo '>above 1000</option>
</select></td></tr>';


echo '<tr><td align=right  class=left >Address:</td><td align=left  class=right ><textarea rows=3 columns=6 id=addr name=coll_address class=right placeholder="'.$row[address].'" ></textarea></td></tr>';


echo '<tr><td align=right  class=left >City:</td><td align=left  class=right ><input type=text name=city  class=right size='.(strlen($row[city])).' placeholder="'.$row[city].'" /></td></tr>';

echo '<tr><td align=right  class=left >State:</td><td align=left  class=right >
<select name=state ><option value=-1  id=right >select</option>';
$result=mysql_query("SELECT * from states ");
$p=1;
while($r=mysql_fetch_array($result))
{
 $len=strlen($row[state]);
 $f=substr($row[state],0,2);
 $l=substr($row[state],$len-2,2);
 $name=$f.$l;
 echo "<option name=state class=right value=".$p." ";
 if($row[state]==$p)
  {
   echo 'selected';
  }
  echo ">".$r[state]."</option>";
 $p++;
}
echo '</select></td></tr>';



echo '<tr><td align=right  class=left >Pincode:</td><td align=left  class=right ><input type=text name=pincode  class=right size=6 maxlength=6 placeholder="'.$row[pincode].'" /></td></tr>';

echo '<tr><td align=right  class=left >Contact:</td><td align=left  class=right >+91 - (<input type=text name=contact  class=right size=1  maxlength=2 placeholder="'.substr($row[phone],0,2).'" />) - <input type=text name=contact2 class=right size=8 maxlength=8 placeholder="'.substr($row[phone],2,(strlen($row[phone])-2)).'" /></td></tr>';

echo '<tr><td align=right  class=left >Fax:</td><td align=left  class=right >+91 - (<input type=text name=fax  class=right size=1  maxlength=2 placeholder="'.substr($row[fax],0,2).'" />) - <input type=text name=fax2 class=right size=8 maxlength=8 placeholder="'.substr($row[fax],2,(strlen($row[fax])-2)).'" /></td></tr>';


echo '<tr><td align=right  class=left >Nearest Railway station:</td><td align=left  class=right ><input type=text name=train  class=right size='.(strlen($row[train])).' placeholder="'.$row[train].'" /></td></tr>';

echo '<tr><td align=right  class=left >Nearest Bus Station:</td><td align=left  class=right ><input type=text name=bus  class=right size='.(strlen($row[bus])).' placeholder="'.$row[bus].'" /></td></tr>';


echo '<tr><td align=right  class=left >Email:</td><td align=left  class=right ><input type=email name=emailid  class=right size='.(strlen($row[email])-5).' placeholder="'.$row[email].'" /></td></tr>';

echo '<tr><td align=right  class=left >Website:</td><td align=left ><input type=url name=website class=right  size='.strlen($row[website]).'  placeholder="'.$row[website].'" /><font color=grey >(Ex: http://www.google.com)</font> </td></tr>';


echo '<tr><td align=right  class=left >Logo:</td><td align=left ><img src="logos/'.$row[ap_id].'.png" width=50 height=50 /><input type="file" name="file" accept="image/*" /></td></tr>';



echo '<tr><td align=right class=left >Established Year:</td><td><select name=yoo >';
echo '<option name=yoo class=right value=-1 >select</option>';
for($i=1700;$i<=2013 ;$i++)
 {
  echo '<option class=right value='.$i.' ';
  if($row[year_of_opening]==$i)
   {
    echo 'selected';
   }
   echo '>'.$i.'</option>';
 }
echo '</select></td></tr>';



echo '<tr><td align=right  class=left >Name of the Director:</td><td align=left  class=right ><input type=text name=director  class=right size='.strlen($row[director]).' placeholder="'.$row[director].'" /></td></tr>';

//echo '<tr><td align=right  class=left >Rank:</td><td align=left  class=right ><input type=text name=rank  class=right size='.strlen($row[rank]).' placeholder='.$row[rank].' /></td></tr>';

echo '<tr ><td colspan=2><hr width=900 /></td></tr>';


echo '<tr><td align=center ><span id=compare class="left change_pass" >Change password</span></td><td align=right ><span id=close class="cp left" onclick="close_pass()" >Close</span></td></tr>';
echo '<tr><td align=right  class="left cp"  >Current Password:</td><td class="right cp"  ><input type=password name=crpass maxlength=15 id=crpassword /></td></tr>';

echo '<tr><td align=right  class="left cp"  >New Password:</td><td class="right cp"  ><input type=password name=npass maxlength=15 id=password /><span class=note > (length should lie between 9 and 15)</span></td></tr>';

echo '<tr><td class="left cp" >Confirm New Password:</td><td  class="right cp"  ><input type=password name=cnpass id=cpassword maxlength=15 /></td></tr>';


echo '<tr><td><br /></td><td align=left ><br /><input type=submit name=submit  id=submit value=Submit /><input type=reset name=reset value=Reset id=reset align=right /></td></tr>';
 echo '<script>hide_show_courses();</script>';
 }
}
else
{
 echo '<font color=red>*</font>Institute Name:</td><td align=left class=right ><input type=text name=coll_name size=75  placeholder="Name of the Institute..." class=right   required></td></tr>';
 echo '<tr><td class=left ><font color=red>*</font>Short Name:</td><td align=left class=right ><input type=text name=coll_short_name size=20  placeholder="Short notation..." class=right  required></td></tr>';

 echo '<tr><td align=right  class=left >College code:</td><td align=left  class=right ><input type=text name=coll_code size=30 placeholder="College code..." class=right ></td></tr>';
 echo '<tr><td align=right  class=left ><font color=red>*</font>Streams:</td>
<td align=left  class=right >
<input type=checkbox name=eng value=1 id=stream1 onload=show_eng() ><label for=stream1>Engineering</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=mec value=1 id=stream2  /><label for="stream2">Medical</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=man value=1 id=stream3  /><label for="stream3">Management</label></td>
</tr>';

echo '<tr><td></td><td><table><tr>';
echo '<td id=engg ><select name="engineering[ ]" id=engineering style="width:180px" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=1 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td id=medic ><select name="medical[ ]" id=medicl style=" width:180px;" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=2 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course]. '" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td id=manage ><select name="management [ ]" id=management style=" width:180px;" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=3 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '</tr></table></td></tr>';


echo '<tr><td class=left ><font color=red >*</font>Affiliated to:</td><td class=right ><input type=text name=affiliated  required/></td></tr>';
echo '<tr><td class=left ><font color=red >*</font>Category:</td><td class=right ><select name=category ><option value=-1 >--select--</option><option value="Mens College" >Mens</option><option value="Womens College">Womens</option><option value="Co-Education College" >Co-Education</option></select></td></tr>';
echo '<tr><td class=left ><font color=red >*</font>Type:</td><td class=right ><select name=type><option value=-1 >--select--</option><option value="Government">Government</option><option value="Private" >Private</option></select></td></tr>';
echo '<tr><td align=right  class=left ><font color=red>*</font>Amenities:</td>
<td align=left  class=right >

<table name=amenities >
<tr>
<td><label for="audit"><span id=auditorium title=AUDITORIUM ></span></label></td>
<td><label for="cant"><span id=canteen title="CANTEEN" ></span></label></td>
<td><label for="comp"><span id=computerlabs title="COMPUTER LABS" ></span></label></td>
<td><label for="med"><span id=medical title=MEDICAL ></span></label></td>
<td><label for="gm"><span id=gym title=GYM></span></label></td>
<td><label for="lab"><span id=laboratory title=LABORATORIES ></span></label></td>
<td><label for="lib"><span id=library title=LIBRARY ></span></label></td>
<td><label for="spo"><span id=sports title=SPORTS ></span></label></td>
<td><label for="host"><span id=hostel title=HOSTELS ></span></label></td></tr>
<tr>

<td align=center ><input type=checkbox name=audit title=AUDITORIUM id=audit value=1 /></td>
<td align=center ><input type=checkbox name=cant title=CANTEEN id=cant value=1/></td>
<td align=center ><input type=checkbox name=comp title="COMPUTER LABS" id=comp value=1 /></td>
<td align=center ><input type=checkbox name=medi title="MEDICAL" id=med value=1 /></td>
<td align=center ><input type=checkbox name=gm title=GYM id=gm value=1 /></td>
<td align=center ><input type=checkbox name=lab title=LABORATORIES id=lab value=1 /></td>
<td align=center ><input type=checkbox name=lib title=LIBRARY id=lib value=1 /></td>
<td align=center ><input type=checkbox name=spo title=SPORTS id=spo value=1 /></td>
<td align=center ><input type=checkbox name=host title=HOSTELS id=host value=1 /></td>
</tr>
</table>

</td>
</tr>';
echo '<tr><td align=right  class=left ><font color=red>*</font>Student intake:</td>
<td align=left  class=right ><select name=students_intake >
<option value=-1 class=right >select</option>
<option value=90  class=right >10-100</option>
<option value=100  class=right >100-200</option>
<option value=300  class=right >200-500</option>
<option value=500  class=right >500-1000</option>
<option value=1000  class=right >above 1000</option>
</select></td></tr>';
echo '<tr><td align=right  class=left ><font color=red>*</font>Address:</td><td align=left  class=right ><textarea rows=3 columns=6 id=addr name=coll_address class=right   required></textarea></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>City:</td><td align=left  class=right ><input type=text name=city  class=right size=20    required/></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>State:</td><td align=left  class=right >
<select name=state ><option value=-1  id=right required>select</option>';
$result=mysql_query("SELECT * from states ");
$p=1;
while($row=mysql_fetch_array($result))
{
 $len=strlen($row[state]);
 $f=substr($row[state],0,2);
 $l=substr($row[state],$len-2,2);
 $name=$f.$l;
 echo "<option class=right value=".$p." >".$row[state]."</option>";
 $p++;
}
echo '</select></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Pincode:</td><td align=left  class=right ><input type=text name=pincode  class=right size=6 maxlength=6 required/></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Contact:</td><td align=left  class=right >+91 - (<input type=text name=contact  class=right size=1  maxlength=2 required/>) - <input type=text name=contact2 class=right size=8 maxlength=8 required/></td></tr>';

echo '<tr><td align=right  class=left >Fax:</td><td align=left  class=right >+91 - (<input type=text name=fax  class=right size=1  maxlength=2 />) - <input type=text name=fax2 class=right size=8 maxlength=8 /></td></tr>';


echo '<tr><td align=right  class=left >Nearest Railway station:</td><td align=left  class=right ><input type=text name=train  class=right size=20  /></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Nearest Bus Station:</td><td align=left  class=right ><input type=text name=bus  class=right size=20    required/></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>Email:</td><td align=left  class=right ><input type=email name=emailid  class=right size=20   required/></td></tr>';

echo '<tr><td align=right  class=left >Website:</td><td align=left ><input type=url name=website class=right  size=20 /><font color=grey >(Ex: http://www.google.com)</font> </td></tr>';



echo '<tr><td align=right  class=left ><font color=red>*</font>Logo:</td><td align=left ><input type="file" name="file" accept="image/*"   required/><div class=note >(Size < 2MB | Type: jpeg/jpg/png/gif only)</div></td></tr>';



echo '<tr><td align=right class=left ><font color=red>*</font>Establishment Year:</td><td>
<select name=yoo ><option class=right value=-1 >select</option>';
for($i=1700;$i<=2013 ;$i++)
 {
  echo '<option class=right value="'.$i.'" >'.$i.'</option>';
 }
echo '</select></td></tr>';



echo '<tr><td align=right  class=left ><font color=red>*</font>Name of the Director:</td><td align=left  class=right ><input type=text name=director  class=right size=20  required/></td></tr>';

echo '<tr ><td colspan=2><hr width=900 /></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Password:</td><td class=right ><input type=password name=pass maxlength=15 id=password required/><span class=note > (length should lie between 9 and 15)</span></td></tr>';
echo '<tr><td class=left ><font color=red>*</font>Confirm Password:</td><td class=right ><input type=password name=cpass id=cpassword maxlength=15 required/></td></tr>';

echo '<tr><td><input type=hidden name=app_no value='.$app_no.' /></td></tr>';
echo '<tr><td><br /></td><td align=left ><br /><input type=submit name=submit  id=submit value=Submit /><input type=reset name=reset value=Reset id=reset align=right /></td></tr>';
}


echo '</table>
</form></div>';
}

function modify_college()
{
 
}


function select_branch()
{
 echo '<center><div id=choice >
 <h4>Select to Search</h4>
 </br>
 <table id="table1" >
 
 <tr>
 <td id=choices ><label ><input type=radio name=stream id=stream1 onclick="change_loc(1);" />Engineering</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream2 onclick="change_loc(2);" />Medical</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream3 onclick="change_loc(3);" />Management</label></td>
 
 </tr></table></div></center>';
}

function search_form($v,$s)
{
if($v=="change")
 {
echo '<div id=search align=center >
	  <table name=search_table cellspacing=10 >
	  <form action=modify_college.php';
echo ' method=post name=csearch  >';
 }
else
 {
  echo '<div id=search align=center >
	  <table name=search_table cellspacing=10 >
	  <form action=search.php';
if($s!="0")
{
 echo '?stream='.$s;
}
echo ' method=post name=csearch >';
 }
echo '<tr>
	  <td rowspan=7 valign=top ><input type=submit id=submit name=sub value=Search /></td>
	  <td>by</td>
	  <td colspan=5 >  
	  <select name=clg_name title=COLLEGE ><option name=clg_name value=-1 >--college--</option>';
	  $q="SELECT * from college_info ";
	  if($v=="eng")
	   {
	    $q.=" WHERE engineering=1 ";
	   }
	  if($v=="med")
	   {
	    $q.=" WHERE medical=1 ";
	   }
	  if($v=="man")
	   {
	    $q.=" WHERE management=1 ";
	   }
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[name])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[name];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=clg_name value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  </tr>
	  
	  <tr>
	  <td>by</td>
	  <td>  
	  <select name=clg_shrt_name title="SHORT NAME" class=sel ><option value=-1 name=clg_shrt_name >--short name--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[shrt_name])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[shrt_name];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=clg_shrt_name value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=clg_director title=DIRECTOR  class=sel ><option value=-1>--director--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[director])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[director];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=clg_director value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=yop title="YEAR OF OPENING" class=sel  ><option value=-1>--established year--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[year_of_opening])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[year_of_opening];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=yop value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  </tr>
	  
	  
	  <tr>
	  <td>by</td>
	  <td>  
	  <select name=city title=CITY  class=sel ><option value=-1>--city--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[city])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[city];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=city value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=state title=STATE  class=sel ><option value=-1>--state--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[state])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[state];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	    $s2=mysql_query("SELECT * from states WHERE Sno='$arr1[$i]' ");
		while($r2=mysql_fetch_array($s2))
		 {		
	   	 echo '<option name=state value="'.$arr1[$i].'" >'.$r2[state].'</option>';
		 }
		}
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=pincode title=PINCODE  class=sel ><option value=-1>--pincode--</option>';
	  $s1=mysql_query($q);
	  $arr1=array();
	  $size=0;	  
	  while($r1=mysql_fetch_array($s1))
	   {
	   $err=0;
        for($i=0;$i<$size;$i++)
		 {
		  if($arr1[$i]==$r1[pincode])
		   {
		    $err=1;
			break;
		   }
		 }
		if($err==0)
		 {
		  $arr1[]=$r1[pincode];
		  $size++;
		 }
	   }
	   for($i=0;$i<$size;$i++)
	    {
	   	 echo '<option name=pincode value="'.$arr1[$i].'" >'.$arr1[$i].'</option>';
		}
	  echo '</select>
	  </td>
	  </tr>
	  
	  
	  </form></table>
	  </div>';
}
function feedback()
{
echo '<p class=note >Please do give us <a href="feedback.php" target=_blank title=feedback style="color:red;font-size: 20px;">here</a> your feedback about the changes you feel to be added on the website. Comments are always welcome!</p>';
}
?>
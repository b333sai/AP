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
 echo '/><label for="stream3">Management</label></td></tr>';

echo '<tr><td></td><td class="right" ><table id="courses_table" ><tr>';
echo '<td id=engg><select name="engineering[ ]" id=engineering  style="width: 200px;" multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=1 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td  id=medic ><select name="medical[ ]"  style="width: 200px;"  id=medicl multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=2 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course]. '" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '<td id=manage ><select name="management [ ]"  style="width: 200px;"  id=management  multiple>';
$select=mysql_query("SELECT * from courses WHERE stream=3 ");
while($rows=mysql_fetch_array($select))
 {
  echo '<option  value="'.$rows[course].'" title="'.$rows[course].'" >'.$rows[course].'</option>';
 }
echo '</select></td>';
echo '</tr></table></td></tr>';


echo '<tr><td class=left >Affiliated to:</td><td class=right ><input class=right type=text name=affiliated  placeholder="'.$row[affiliated].'" /></td></tr>';
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


echo '<tr><td align=right  class=left >Address:</td><td align=left  class=right ><textarea rows=6 cols=30 id=addr name=coll_address class=right placeholder="'.$row[address].'" ></textarea></td></tr>';

echo '<tr><td align=right  class=left >State:</td><td align=left  class=right >
<select name=state ><option value=-1  id=right >--SELECT--</option>';
$result=mysql_query("SELECT DISTINCT state from cities ORDER BY state");
$p=1;
while($r=mysql_fetch_array($result))
{
 //$len=strlen($row[state]);
 //$f=substr($row[state],0,2);
 //$l=substr($row[state],$len-2,2);
 //$name=$f.$l;
 echo "<option name=state class=right value=".$p." ";
 if($row[state]==$p)
  {
   echo 'selected';
  }
  echo ">".$r[state]."</option>";
 $p++;
}
echo '</select></td></tr>';


echo '<tr><td align=right  class=left >City:</td><td align=left  class=right >
<select name=city ><option value=-1  id=right >--SELECT--</option>';
$result=mysql_query("SELECT DISTINCT city from cities ORDER BY city");
while($r=mysql_fetch_array($result))
{
 //$len=strlen($row[city]);
 //$f=substr($row[state],0,2);
 //$l=substr($row[state],$len-2,2);
 //$name=$f.$l;
 echo "<option name=city class=right value=".$p." ";
 if($row[city]==$r[city])
  {
   echo 'selected';
  }
  echo ">".$r[city]."</option>";
}
echo '</select></td></tr>';



echo '<tr><td align=right  class=left >Pincode:</td><td align=left  class=right ><input type=text name=pincode  class=right size=6 maxlength=6 placeholder="'.$row[pincode].'" /></td></tr>';

echo '<tr><td align=right  class=left >Contact:</td><td align=left  class=right >+91 - (<input type=text name=contact  class=right id="two_digit"  maxlength=2 placeholder="'.substr($row[phone],0,2).'" />) - <input type=text name=contact2 class=right size=6 maxlength=8 placeholder="'.substr($row[phone],2,(strlen($row[phone])-2)).'" /></td></tr>';

echo '<tr><td align=right  class=left >Fax:</td><td align=left  class=right >+91 - (<input type=text name=fax  class=right id="two_digit"  maxlength=2 placeholder="'.substr($row[fax],0,2).'" />) - <input type=text name=fax2 class=right size=6 maxlength=8 placeholder="'.substr($row[fax],2,(strlen($row[fax])-2)).'" /></td></tr>';


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
echo '<tr><td align=right  class="left"  ><span class="cp" >Current Password:</span></td><td class="right cp"  ><input type=password class=cp name=crpass maxlength=15 id=crpassword /></td></tr>';

echo '<tr><td align=right  class="left"  ><span class="cp" >New Password:</span></td><td class="right "  ><input type=password class=cp name=npass maxlength=15 id=password /><span class="note cp" > (length should lie between 9 and 15)</span></td></tr>';

echo '<tr><td class="left cp" ><span class="cp" >Confirm New Password:</span></td><td  class="right"  ><input type=password name=cnpass id=cpassword class=cp maxlength=15 /></td></tr>';


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


echo '<tr><td class=left ><font color=red >*</font>Affiliated to:</td><td class=right ><input type=text name=affiliated class=right required/></td></tr>';
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
echo '<tr><td align=right  class=left ><font color=red>*</font>Address:</td><td align=left  class=right ><textarea rows=6 cols=30 id=addr name=coll_address class=right ></textarea></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>State:</td><td align=left  class=right >
<select name=state ><option value=-1  id=right >--SELECT--</option>';
$result=mysql_query("SELECT DISTINCT state from cities ORDER BY state");
while($r=mysql_fetch_array($result))
{
 //$len=strlen($row[state]);
 //$f=substr($row[state],0,2);
 //$l=substr($row[state],$len-2,2);
 //$name=$f.$l;
 echo "<option name=state class=right value=".$p." ";
  echo ">".$r[state]."</option>";
}
echo '</select></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>City:</td><td align=left  class=right >
<select name=city ><option value=-1  id=right >--SELECT--</option>';
$result=mysql_query("SELECT DISTINCT city from cities ORDER BY city");
while($r=mysql_fetch_array($result))
{
 echo "<option name=city class=right value=".$p." ";
 echo ">".$r[city]."</option>";
}
echo '</select></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Pincode:</td><td align=left  class=right ><input type=text name=pincode  class=right size=3 maxlength=6 required/></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Contact:</td><td align=left  class=right >+91 - (<input type=text name=contact  id=two_digit  class=right  maxlength=2 required/>) - <input type=text name=contact2 class=right size=6 maxlength=8 required/></td></tr>';

echo '<tr><td align=right  class=left >Fax:</td><td align=left  class=right >+91 - (<input type=text name=fax  class=right id=two_digit  maxlength=2 />) - <input type=text name=fax2 class=right size=6 maxlength=8 /></td></tr>';


echo '<tr><td align=right  class=left >Nearest Railway station:</td><td align=left  class=right ><input type=text name=train  class=right size=20  /></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Nearest Bus Station:</td><td align=left  class=right ><input type=text name=bus  class=right size=20    required/></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>Email:</td><td align=left  class=right ><input type=email name=emailid  class=right size=20  required/></td></tr>';

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


echo '<tr><td class=left ><font color=red>*</font> Username:</td><td class=right ><input type=text name=username id=user_id required/></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>Password:</td><td class=right ><input type=password name=pass maxlength=15 id=password onkeyup="reg_validate_password(pass,cpass,reg_p_warning,c_h_warning,match_image)"  onfocus="reg_validate_password(pass,cpass,reg_p_warning,c_h_warning,match_image)"  onchange="reg_validate_password(pass,cpass,reg_p_warning,c_h_warning,match_image)" required/><span id=reg_p_warning > (length should lie between 9 and 15)</span></td></tr>';
echo '<tr><td class=left ><font color=red>*</font>Confirm Password:</td><td class=right ><input type=password name=cpass id=cpassword maxlength=15 onkeyup="confirm_password(cpass,pass,c_h_warning,match_image)"  onfocus="confirm_password(cpass,pass,c_h_warning,match_image)" onchange="confirm_password(cpass,pass,c_h_warning,match_image)"required/><span id=c_h_warning > Passwords doesn\'t match!!!</span><img src="images/correct.png" valign=middle width=24 height=24 id=match_image style="display:none;" /></td></tr>';

echo '<tr><td><input type=hidden name=app_no value='.$app_no.' /></td></tr>';
echo '<tr><td><br /></td><td align=left ><br /><input type=submit name=submit  id=submit value=Submit /><input type=reset name=reset value=Reset id=reset align=right /></td></tr>';
}


echo '</table>
</form></div>';
}

function modify_college()
{
 
}
function login_form($page_name)
{
 echo '<div align=right  ><span id=login_box style="position:absolute;right:0px;top:10px;" ><a href="javascript:void(0);" onclick="hide_show_login(0)" style="display:block;" >Login</a></span><form action='.$page_name.' method=post name=form_login id=login_form onsubmit="return(check_login())" >
 <div style="text-align:center;color:red;display:none;font-size: 15px;" id=login_error >Invalid username/password!!!</div>
 
 <label>Username: <input type=text maxlength=26 name=username required/></label><br />
 <label>Password: <input type=password maxlength=15 name=password onkeyup="validate_password(this,h_warning);"    required/></label><br /><span align=left id=h_warning style="color:red;display:none;font-size:15px;" >Invalid password</span><br />
 
 <center><input type=submit name=login_submit style="font-size:20px;color:blue;"  value=Submit />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=button style="font-size:20px;color:red;" name=close id=close_login onclick="hide_show_login(0)" value=Cancel /></center>
 </form>
</div>';
}
function logout_form()
{
 echo '<div align=right style="position:absolute;right:0px;top:10px;color:green;" ><span style="color:green;" >'.$_SESSION['uid'].'<div ><form action=index.php method=post ><input type=submit name=logout value=Logout /></form></div></div>';
}
function header_content()
{
session_start();
include("header.php");
$pageName = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(isset($_POST['login_submit']))
   {
    //echo '<script>window.location="'.$_POST['p_name'].'";</script>';
    $pass=md5($_POST['password']);
	$s1=mysql_query("SELECT username FROM college_info WHERE username='$_POST[username]' and password='$pass'");
	$exist=mysql_num_rows($s1);
	if($exist>0)
	 {
	  $_SESSION['uid']=$_POST['username'];
	   $tim=r_time_stamp(time());
	   mysql_query("UPDATE `college_info` SET last_login='$tim' WHERE ap_id='$_POST[username]' and password='$pass' ");
	  //echo '<script>$("#login_box").hide();</script>';
	  $err=0;
	 }
	else
	 {
	  $s2=mysql_query("SELECT * FROM users WHERE username='$_POST[username]' and password='$pass' ");
	  $exist=mysql_num_rows($s2);
	if($exist>0)
	 {
	  $_SESSION['uid']=$_POST['username'];
	  while($rs=mysql_fetch_array($s2))
	   {
	    $_SESSION['uname']=$rs['name'];
	   }
	   $tim=r_time_stamp(time());
	   mysql_query("UPDATE `users` SET last_login='$tim' WHERE username='$_POST[username]' and password='$pass' ");
	  //echo '<script>$("#login_box").hide();</script>';
	  $err=0;
	 }
	  else
	   {
	  $err=1;
	   }
	 }
   }
   if(isset($_POST['logout']))
    {
	$tim=r_time_stamp(time());
	  	   mysql_query("UPDATE `college_info` SET last_logout='$tim' WHERE ap_id='$_SESSION[uid]' ");
		   mysql_query("UPDATE `users` SET last_logout='$tim' WHERE username='$_SESSION[uid]' ");
	  session_destroy();
	     login_form($pageName);
	}
  else if(isset($_SESSION['uid']))
	  {
	   logout_form();
	  }
 else
  {
	     login_form($pageName);
  }
  	if($err==1)
	 {
	  echo '<script>hide_show_login(1);</script>';
	 }
}

function student_registration()
{
echo '<table id=student_registration cellpadding=5 cellspacing=5 >';
echo '<form action=student_register.php name=s_register method=post onsubmit="return(validate_student_register());" >';
echo '<tr><td class=s_left ><label for=st_name >Name:</label></td><td class=s_right ><input type=text name=s_name id=st_name size=30 placeholder="Your Nme...." required/></td></tr>';
echo '<tr><td class=s_left ><label for=st_c_name >College Name:</label></td><td class=s_right ><input type=text name=s_c_name id=st_c_name size=50  placeholder="Your College Name...." required/></td></tr>';
echo '<tr><td class=s_left ><label for=st_edu >Education:</label></td><td class=s_right ><input type=text name=s_edu id=st_edu size=30  placeholder="Your Education...." required/></td></tr>';
echo '<tr><td class=s_left ><label for=st_email >Email:</td><td class=s_right ><input type=email name=s_email id=st_email size=30 onkeyup="validate_email(this,e_warning)"  placeholder="Your Email Id...." required/><span id="e_warning" style="color:red;display:none;font-size:15px;" >Invalid email!</span></td></tr>';

//echo '<script>alert('.$COU.');</script>';
//echo '<tr><td class=s_left ><label for=st_city >City:</td><td class=s_right ><input type=text name=s_city id=st_city size=20  placeholder="Your City...." required/></td></tr>';
echo '<tr><td class=s_left >State:</td><td class=s_right >
<select name=s_state ><option value=-1 >--SELECT--</option>';
$result=mysql_query("SELECT DISTINCT state from cities ORDER BY state ");
$p=1;
while($r=mysql_fetch_array($result))
{
 $len=strlen($row[state]);
 $f=substr($row[state],0,2);
 $l=substr($row[state],$len-2,2);
 $name=$f.$l;
 echo "<option value=".$p."> $r[state]</option>";
 $p++;
}
echo '</select></td></tr>';
echo '<tr><td class=s_left ><label for=st_city >City:</label></td><td><select name=s_city id=st_city>';
echo '<option value=-1>--SELECT--</option>';
$citi=mysql_query("SELECT DISTINCT city FROM CITIES ORDER BY city");
$COU=0;
while($ct=mysql_fetch_array($citi))
 {
  echo '<option value='.$ct[city].'>'.$ct[city].'</option>';
  $COU++;
 }
echo '</select></td>';

echo '<tr ><td colspan=2  style="border-bottom: 1px dotted green;" ></td></tr>';
echo '<tr><td class=s_left ><font color=red >*</font><label for=st_uname>Username:</td><td class=s_right ><input type=text name=s_uname id=st_uname  placeholder="Choose an easy one..." required/></td></tr>';
echo '<tr><td class=s_left ><label for=st_pass ><font color=red >*</font>Password:</td><td class=s_right ><input type=password name=s_pass id=st_pass maxlength=15 onchange="reg_validate_password(this,s_cpass,reg_p_warning,c_h_warning,match_image);" onfocus="reg_validate_password(this,s_cpass,reg_p_warning,c_h_warning,match_image);"  onkeyup="reg_validate_password(this,s_cpass,reg_p_warning,c_h_warning,match_image);"  placeholder=" Ex: S@i9b.eoc" required/><span id=reg_p_warning > (length should lie between 9 and 15)</span></td></tr>';
echo '<tr><td class=s_left ><label for=st_cpass ><font color=red >*</font>Confirm Password:</td><td class=s_right ><input type=password name=s_cpass maxlength=15 id=st_cpass  onchange="confirm_password(this,s_pass,c_h_warning,match_image);"        onfocus="confirm_password(this,s_pass,c_h_warning,match_image);"       onkeyup="confirm_password(this,s_pass,c_h_warning,match_image);" required/><span id=c_h_warning > Passwords doesn\'t match!!!</span><img src="images/correct.png" valign=middle width=24 height=24 id=match_image style="display:none;" /></td></tr>';
echo '<tr><td></td></tr>';
echo '<tr><td></td></tr>';
echo '<tr><td colspan=2 ><input type=submit name=st_reg_submit  id=submit value=Submit style="margin-left: 150px;" /><input type=reset name=reset value=Reset id=reset onclick="javascript:$(\'#c_h_warning\').hide();$(\'#match_image\').hide();$(\'#reg_p_warning\').css(\'color\',\'#d7d7d7\');" /></td></tr>';
echo '</form>';
echo '</table>';
echo '<br /><br /><br /><br />';
}


function select_branch()
{
 echo '<center><div id=choice >
 <h4>Select to Search</h4>
 </br>
 <table id="table1" >
 
 <tr>
 <td id=choices ><label ><input type=radio name=stream id=stream_1 onclick="change_loc(1);" />Engineering</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream_2 onclick="change_loc(2);" />Medical</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream_3 onclick="change_loc(3);" />Management</label></td>
 
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
 
      //queries for requesting the dropdown data
 	  $q_n="select distinct name from college_info";
	  $q_c="select distinct city from college_info";
	  $q_shrt="select distinct shrt_name from college_info";
	  $q_d="select distinct director from college_info";
	  $q_yoo="select distinct year_of_opening from college_info";
	  $q_s="select distinct state from college_info";
	  $q_p="select distinct pincode from college_info";
	  if($v=="eng")
	   {
	    $q_n.=" WHERE engineering=1 order by name";
		$q_c.=" WHERE engineering=1 order by city";
		$q_shrt.=" WHERE engineering=1 order by shrt_name";
		$q_d.=" WHERE engineering=1 order by director";
		$q_yoo.=" WHERE engineering=1 order by year_of_opening";
		$q_s.=" WHERE engineering=1 order by state";
		$q_p.=" WHERE engineering=1 order by pincode";
	   }
	  if($v=="med")
	   {
	    $q_n.=" WHERE medical=1 order by name";
		$q_c.=" WHERE medical=1 order by city";
		$q_shrt.=" WHERE medical=1 order by shrt_name";
		$q_d.=" WHERE medical=1 order by director";
		$q_yoo.=" WHERE medical=1 order by year_of_opening";
		$q_s.=" WHERE medical=1 order by state";
		$q_p.=" WHERE medical=1 order by pincode";
	   }
	  if($v=="man")
	   {
	    $q_n.=" WHERE management=1 order by name";
		$q_c.=" WHERE management=1 order by city";
		$q_shrt.=" WHERE management=1 order by shrt_name";
		$q_d.=" WHERE management=1 order by director";
		$q_yoo.=" WHERE management=1 order by year_of_opening";
		$q_s.=" WHERE management=1 order by state";
		$q_p.=" WHERE management=1 order by pincode";
	   }
     //queries for requesting the dropdown data
//javascript:alert(\'hai\');
echo '
      
      <tr>
	  <td rowspan=7 valign=top ><input type=submit id=submit name=sub value=Search /></td>
	  <td>by</td>
	  <td colspan=5 >  
	  <select name=clg_name title=COLLEGE ><option name=clg_name value=-1  >--college--</option>';	   
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
	  <select  onchange="submit_form(csearch);" name=clg_shrt_name title="SHORT NAME" class=sel ><option value=-1 name=clg_shrt_name >--short name--</option>';
	  $s1=mysql_query($q_shrt);  
	  while($r1=mysql_fetch_array($s1))
	   {
	   echo '<option name=clg_shrt_name value="'.$r1[shrt_name].'" >'.$r1[shrt_name].'</option>';
	   }
	  echo '</select>
	  </td>';
	  
	  echo '
	  <td>by</td>
	  <td><select name=clg_director title=DIRECTOR  class=sel ><option value=-1>--director--</option>';
	  $s1=mysql_query($q_d);
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=clg_director value="'.$r1[director].'" >'.$r1[director].'</option>';
	   }
	  echo '</select>
	  </td>';
	  
	  
	  echo '
	  <td>by</td>
	  <td><select name=yop title="YEAR OF OPENING" class=sel  ><option value=-1>--established year--</option>';
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
	  <select name=city title=CITY  class=sel ><option value=-1>--city--</option>';
	  $q_c="select distinct city from college_info";
	  $s1=mysql_query($q_c);	  
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=city value="'.$r1[city].'" >'.$r1[city].'</option>';
	   }
	  echo '</select>
	  </td>';
	  
	  echo '<td>by</td>
	  <td><select name=state title=STATE  class=sel ><option value=-1>--state--</option>';
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
	  <td><select name=pincode title=PINCODE  class=sel ><option value=-1>--pincode--</option>';
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
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////THIS FUNCTION DISPLAYS THE FEEDBACK FORM LINK///////////////////////////////////////////////////////
function feedback()
{
echo '<p class=note >Please do give us <a href="feedback.php" target=_blank title=feedback style="color:red;font-size: 20px;">here</a> your feedback about the changes you feel to be added on the website. Comments are always welcome!</p>';
}
////////////////////////THIS FUNCTION DISPLAYS THE FEEDBACK FORM LINK///////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




?>
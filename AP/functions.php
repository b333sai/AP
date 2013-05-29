<?php
function go_top()
{
 echo '<center><a href="#" ><div id=go_top align=left >TOP</div></a><br /></center>';
}

 function r_time($date)
  {
   $time=date("d",$date).",".date("F",$date).",".date("Y",$date).", ".date("H",$date).":".date("i",$date).":".date("s",$date);
   return $time;
  }

function register_form()
{
echo'<div id=register align=center >
<h1>REGISTRATION</h1><br />
<form name=register method=post action=coll_register.php onsubmit="return(valid());" enctype="multipart/form-data" >

<table cellspacing=10 >';


echo '<tr><td align=right class=left ><font color=red>*</font>Institute Name:</td><td align=left class=right ><input type=text name=coll_name size=45  placeholder="Name of the Institute" class=right   required ></td></tr>
<tr><td align=right  class=left ><font color=red>*</font>College code:</td><td align=left  class=right ><input type=text name=coll_id size=30 placeholder="College Id" class=right required></td></tr>

<tr><td align=right  class=left ><font color=red>*</font>Streams:</td>
<td align=left  class=right >
<input type=checkbox name=eng value=1 id=stream1 ><label for=stream1>Engineering</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=mec value=2 id=stream2  /><label for="stream2">Medical</label>&nbsp;&nbsp;&nbsp;
<input type=checkbox name=man value=3 id=stream3  /><label for="stream3">Management</label></td>
</tr>



<tr><td align=right  class=left ><font color=red>*</font>Amenities:</td>
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
</tr>




<tr><td align=right  class=left ><font color=red>*</font>Student intake:</td>
<td align=left  class=right ><select name=students_intake >
<option name=intake value=-1 class=right >select</option>
<option name=intake value=90  class=right >10-100</option>
<option name=intake value=100  class=right >100-200</option>
<option name=intake value=300  class=right >200-500</option>
<option name=intake value=500  class=right >500-1000</option>
<option name=intake value=1000  class=right >above 1000</option>
</select></td></tr>

<tr><td align=right  class=left ><font color=red>*</font>Address:</td><td align=left  class=right ><textarea rows=3 columns=6 id=addr name=coll_address class=right  required ></textarea></td></tr>

<tr><td align=right  class=left ><font color=red>*</font>City:</td><td align=left  class=right ><input type=text name=city  class=right size=20   required /></td></tr>

<tr><td align=right  class=left ><font color=red>*</font>State:</td><td align=left  class=right >
<select name=state ><option value=-1  id=right >select</option>';
$result=mysql_query("SELECT * from states ");
$p=1;
while($row=mysql_fetch_array($result))
{
 $len=strlen($row[state]);
 $f=substr($row[state],0,2);
 $l=substr($row[state],$len-2,2);
 $name=$f.$l;
 echo "<option name=state class=right value=".$p.">".$row[state]."</option>";
 $p++;
}

echo '<tr><td align=right  class=left ><font color=red>*</font>Pincode:</td><td align=left  class=right ><input type=text name=pincode  class=right size=6 maxlength=6   required /></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Contact:</td><td align=left  class=right >+91 - <input type=text name=contact  class=right size=10  maxlength=10  required /></td></tr>';

echo '<tr><td align=right  class=left >Fax:</td><td align=left  class=right >+91 - <input type=text name=fax  class=right size=10  maxlength=10  /></td></tr>';

echo '<tr><td align=right  class=left >Nearest Railway station:</td><td align=left  class=right ><input type=text name=train  class=right size=20  /></td></tr>';

echo '<tr><td align=right  class=left ><font color=red>*</font>Nearest Bus Station:</td><td align=left  class=right ><input type=text name=bus  class=right size=20   required /></td></tr>';


echo '<tr><td align=right  class=left ><font color=red>*</font>Email:</td><td align=left  class=right ><input type=email name=emailid  class=right size=20   required /></td></tr>';

echo '<tr><td align=right  class=left >Website:</td><td align=left ><input type=url name=website class=right  size=20 required /><font color=grey >(Ex: http://www.google.com)</font> </td></tr>';



echo '<tr><td align=right  class=left ><font color=red>*</font>file:</td><td align=left ><input type="file" name="file" accept="image/*"  required /></td></tr>';



echo '<tr><td align=right class=left ><font color=red>*</font>Year of Opening:</td><td><select name=yoo >';
echo '<option name=yoo class=right value=-1 >select</option>';
for($i=1900;$i<=2013 ;$i++)
 {
  echo '<option class=right value='.$i.'>'.$i.'</option>';
 }
echo '</select></td></tr>';



echo '<tr><td align=right  class=left ><font color=red>*</font>Name of the Director:</td><td align=left  class=right ><input type=text name=director  class=right size=20  required  /></td></tr>';



echo '<tr><td><br /></td><td align=left ><br /><input type=submit name=submit  id=submit value=Submit /><input type=reset name=reset value=Reset id=reset align=right /></td></tr>

</table>
</form></div>';
}


function select_branch()
{
 echo '<center><div id=choice >
 <h2>Select your stream</h2>
 </br>
 <table id="table1" >
 
 <tr>
 <td id=choices ><label ><input type=radio name=stream id=stream1 onclick="change_loc(1);" />Engineering</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream2 onclick="change_loc(2);" />Medical</label></td>
 
 <td id=choices ><label><input type=radio name=stream id=stream3 onclick="change_loc(3);" />Management</label></td>
 
 </tr></table></div></center>';
}

function search_form()
{
echo '<div id=search >
	  <table name=search_table cellspacing=10 >
	  <form action=search.php method=post name=csearch onsubmit=get_search_data(); >
	  
	  <tr>
	  <td rowspan=7 valign=top ><input type=submit id=submit name=sub value=Search /></td>
	  <td>by</td>
	  <td colspan=5 >  
	  <select name=clg_name title=COLLEGE ><option name=clg_name value=-1 >--college--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=clg_name value='.$r1[id].'>'.$r1[name].'</option>';
	   }
	  echo '</select>
	  </td>
	  </tr>
	  
	  <tr>
	  <td>by</td>
	  <td>  
	  <select name=clg_id title="COLLEGE CODE" class=sel ><option value=-1 name=clg_id >--college code--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option name=clg_id value='.$r1[id].'>'.$r1[id].'</option>';
	   }
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=clg_director title=DIRECTOR  class=sel ><option value=-1>--director--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option value='.$r1[id].'>'.$r1[director].'</option>';
	   }
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=yop title="YEAR OF OPENING" class=sel  ><option value=-1>--year of opening--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option value='.$r1[id].'>'.$r1[year_of_opening].'</option>';
	   }
	  echo '</select>
	  </td>
	  </tr>
	  
	  
	  <tr>
	  <td>by</td>
	  <td>  
	  <select name=city title=CITY  class=sel ><option value=-1>--city--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option value='.$r1[id].'>'.$r1[city].'</option>';
	   }
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=state title=STATE  class=sel ><option value=-1>--state--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    $s2=mysql_query("SELECT * from states WHERE Sno='$r1[state]' ");
		while($r2=mysql_fetch_array($s2))
		 {
	      echo '<option value='.$r1[id].'>'.$r2[state].'</option>';
		 }
	   }
	  echo '</select>
	  </td>
	  <td>by</td>
	  <td><select name=pincode title=PINCODE  class=sel ><option value=-1>--pincode--</option>';
	  $s1=mysql_query("SELECT * from college_info");
	  while($r1=mysql_fetch_array($s1))
	   {
	    echo '<option value='.$r1[id].'>'.$r1[pincode].'</option>';
	   }
	  echo '</select>
	  </td>
	  </tr>
	  
	  
	  </table>
	  </form></div>';
}
?>
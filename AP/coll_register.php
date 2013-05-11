<?php
echo '<head><title>Institute Registration</title></head>';
include("header.php");
?>
<?php
echo '<div id=page_container>
<div id=content><center>
<h1>Registration</h1>
</br>
<form name=register method=post action=coll_register.php >

<table cellspacing=10 >
<tr><td align=right id=left >Institute Name:</td><td align=left id=right ><input type=text name=coll_name size=45  id=right /></td></tr>

<tr><td align=right  id=left >Institute Id:</td><td align=left  id=right ><input type=text name=coll_id size=30 id=right /></td></tr>

<tr><td align=right  id=left >Streams:</td>
<td align=left  id=right ><input type=checkbox name=stream value=engineering />Engineering&nbsp;&nbsp;&nbsp;<input type=checkbox name=stream value=medical />Medical&nbsp;&nbsp;&nbsp;<input type=checkbox name=stream value=management />Management</td>
</tr>

<tr><td align=right  id=left >Student intake:</td>
<td align=left  id=right ><select>
<option name=intake value=-1 id=right >select</option>
<option name=intake value=90  id=right >10-100</option>
<option name=intake value=100  id=right >100-200</option>
<option name=intake value=300  id=right >200-500</option>
<option name=intake value=500  id=right >500-1000</option>
<option name=intake value=1000  id=right >above 1000</option>
</select></td></tr>

<tr><td align=right  id=left >Address:</td><td align=left  id=right ><input type=text name=coll_address  id=right size=45/></td></tr>

<tr><td align=right  id=left >State:</td><td align=left  id=right >
<select name=state ><option value=-1  id=right >select</option>';
$result=mysql_query("SELECT * from states ");
while($row=mysql_fetch_array($result))
{
 $len=strlen($row[state]);
 $f=substr($row[state],0,2);
 $l=substr($row[state],$len-2,2);
 $name=$f.$l;
 echo "<option  id=right value=".$name." >".$row[state]."</option>";
}

echo '</select></td></tr>

<tr><td align=right  id=left >City:</td><td align=left  id=right ><input type=text name=city  id=right size=30/></td></tr>

<tr><td align=right  id=left >Pincode:</td><td align=left  id=right ><input type=text name=pincode  id=right size=6/></td></tr>


<tr><td align=right  id=left >Contact no:</td><td align=left  id=right ><input type=text name=coll_name  id=right size=30/></td></tr>

<tr><td></td><td align=left ><input type=submit name=submit  id=submit value=Submit /></td><td align=left ><input type=reset name=reset value=Reset id=reset align=right /></td></tr>

</table>
</form></center>
</div></div>';
?>
<?php
include("footer.php");
?>
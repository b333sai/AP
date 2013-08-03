<?php
include("functions.php");
header_content();
 echo '<title>Register</title>';

  echo '<script>
onload=high(6);
</script>';

?>
<?php
 include("side_menu.php");
echo '<div id=article>';
echo '<h2>Student Registration</h2><br />';
if(isset($_POST['st_reg_submit']))
{
 $name=$_POST['s_name'];
 $c_name=$_POST['s_c_name'];
 $education=$_POST['s_edu'];
 $email=$_POST['s_email'];
 $city=$_POST['s_city'];
 $state=$_POST['s_state'];
 
 $username=$_POST['s_uname'];
 $password=$_POST['s_pass'];
 $c_password=$_POST['s_cpass'];
 
 $sel=mysql_query("SELECT username from users WHERE username='$username' or emailid='$email' ");
 $sel2=mysql_query("SELECT username from college_info WHERE username='$username' or emailid='$email' ");
 $exist=mysql_num_rows($sel);
 $exist2=mysql_num_rows($sel2);
 if($exist!=0 || $exist2!=0)
 {
  echo '<div class=error ><img src="images/sad.png" width=30 height=30 valign=middle /> Sorry! Username/Email Id is already in use!</div>';
  student_registration();
 }
 else if($cpass!=$pass)
  {
   echo '<script>alert(\"Passwords doesn\'t match!!!\");</script>';
   student_registration();
  }
 else
  {
   $sl=mysql_query("SELECT state from STATES where sno='$state' ");
   while($rs=mysql_fetch_array($sl))
   {
    $state=$rs[state];
   }
   $password=md5($password);
   echo 'hai';
   $date=r_time_stamp(time());
   mysql_query("INSERT INTO `users` SET name='$name', username='$username', password='$password', college_name='$c_name', qualification='$education', emailid='$email', state='$state', city='$city', date_created='$date', date_modified='$date'   ")or die(mysql_error(). "Sorry!");
   echo '<p class=success align=center ><img src="images/congratulations.png" /><br />Congratulations! You have been registered successfully!</p>';
   echo '<br /><br /><br /><br /><br /><br /><br /><br />';
  }
 
 //
}
else
{
 student_registration();
}
feedback();
echo '</div>';
?>
<?php
include("footer.php");
?>
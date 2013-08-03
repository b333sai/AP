<?php
include("functions.php");
header_content();

include("side_menu.php");
echo '<div id=article align=center >';
if(isset($_POST[submit]))
{
 $s=mysql_query("SELECT * from ap_feedback WHERE name='$_POST[g_name]' and email='$_POST[e_mail]' and comment='$_POST[comments]' ");
 $exists=mysql_num_rows($s);
 if($exists==0)
  {
 $sel=mysql_query("SELECT * from ap_feedback");
 $number=mysql_num_rows($sel)+1;
 $date_posted=r_time_stamp(time());
 mysql_query("INSERT INTO `ap_feedback` SET sno='$number', name='$_POST[g_name]', email='$_POST[e_mail]', comment='$_POST[comments]', date_posted='$date_posted' ");
 echo '<br /><br /><br /><br /><p align=center ><img src="images/thanks.jpg" /></p><p class=success align=center >Feedback received!!!</p><br /><br /><br />';
  }
 else
  {
   echo '<br /><br /><br /><br /><p class=error>Sorry! You cannot repost same information!!!</p><br /><br /><br /><br /><br /><br /><br /><br /><br />';
  }
}
else
{
echo '<h2>Feedback form</h2>';
$val="h_warning";
echo '<p>Your feedback is very important, helping us to make things better. We do not post any span emails to your email id. So, please provide a valid one giving us a chance to thank you!</p><br />';
echo '<table id=feedback name=feed_back cellpadding=5 cellspacing=10 >';
echo '<form action=feedback.php method=post name=feed_form >';
echo '<tr><td style=" color: #0072a6;" ><label for=name >Name:</label></td><td class=right ><input type=text maxlength=100 id=name size=40  name=g_name placeholder="Your name..." required/></td></tr>';
echo '<tr><td style=" color: #0072a6;"  ><label for=email >Email Id:</label></td><td class=right ><input type=email id=email maxlength=100 size=40  name=e_mail placeholder="Your email id..." onkeyup="validate_email(this,h_warning)"  required/><span id=h_warning style="display:none;color: red;">Invalid email!!!</span></td></tr>';
echo '<tr><td style=" color: #0072a6;"  valign=top ><label for=comments >Comments:</label></td><td class=right ><textarea id=comments rows=7   name=comments cols=40  required ></textarea></td></tr>';

echo '<tr><td></td><td><input type=submit name=submit value=Post /><input type=reset name=reset value=Reset style="margin-left: 100px;"  /></td></tr>';
echo '</form></table>';
}
echo '<br /><br /><br /></div>';



?>
<?php
include("footer.php");
?>
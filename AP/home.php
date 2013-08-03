<?php
 echo '
 <center><h2>Welcome to the Admission Portal - 2013</h2></center>';
 include("side_menu.php");

 
 echo '<div id=article>';

 echo '<br />';
 select_branch();
 // $con=mysql_connect('localhost','root','iiitdm') or die("Could not connect".mysql_error());
 // $db_list = mysql_list_dbs($con);

// while ($db = mysql_fetch_object($db_list))
// {
  // echo $db->Database . "<br />";
// }

 echo '<br /><p style="text-indent:50px;" >Got bored Googling various sites hanging here and there? If so, you are at the right point. Just be cool and search your college.</p>
 <p>Best site over all providing the utmost information about almost all the colleges in India in Engineering, Medical and Management streams till 2013. Provides you the complete information about a college before joining them. Know about any college in the country which is registered nationally.</p><br /><br /><br /><br />';

 //go_top();
 feedback();
 echo '</div>';
?>
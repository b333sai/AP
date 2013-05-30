<?php
 echo '<title>Statistics</title>';
 include("header.php");
 echo '<script>
onload=high(2);
</script>';
?>
<?php
 echo '<div id=page_container>
       <div id=content >
	   <center><h2>Statistics Of Colleges</h2></center>';
	   ?>
<?php
 include("side_menu.php");
 ?>
<?php
 echo '<div id=article ><br />';
 select_branch();
 echo '<br /><p>This page lets you know about the statistics of various colleges in India depending of your choice of the stream within an academic year.</p><p>Choose the branch and know the results.</p></br></br></br></br></br></br><br/>';
 feedback();
 go_top();
 echo '</div>';
 echo '</div></div>';
?>
<?php
 include("footer.php");
?>
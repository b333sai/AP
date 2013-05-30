<?php
 echo '<title>Rankings</title>';
 include("header.php");
 echo '<script>
onload=high(1);
</script>';
?>
<?php
 echo '<div id=page_container onload="high(1);">
       <div id=content >
	   <center><h2>Rankings Of Colleges</h2></center>';
	   ?>
<?php
 include("side_menu.php");
 ?>
<?php
 echo '<div id=article ><br />';
 select_branch();
 echo '<br /><p>This page lets you know about the ranks of various colleges in India depending of your choice of the stream.</p><p>Choose the branch and know the results.</p><br /><br /><br /><br /><br /><br />';
 feedback();
 go_top();
 echo '</div>';
 echo '</div></div>';
?>
<?php
 include("footer.php");
?>
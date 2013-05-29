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
	   <center><h1>Rankings Of Colleges</h1></center>';
	   ?>
<?php
 include("side_menu.php");
 ?>
<?php
 echo '<div id=article >';
 select_branch();
 echo '<p>This page lets you know about the ranks of various colleges in India depending of you choice of the stream.</p><p>Choose the branch and know the results.</p></br></br></br></br></br></br><br/>';
 go_top();
 echo '</div>';
 echo '</div></div>';
?>
<?php
 include("footer.php");
?>
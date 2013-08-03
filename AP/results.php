<?php
include("functions.php");
header_content();
 echo '<script>
onload=high(3);
</script>';
?>
<?php
include("side_menu.php");
echo '<div id=article >';
echo '<h2>Results</h2>';
echo '<p>This page gives you the links to various examination results across India.</p>';
echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
feedback();
echo '</div>';
?>
<?php
include("footer.php");
?>
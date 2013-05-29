<?php
//THIS IS THE STARTING PAGE OF THE WEBSITE////////////////////////////////////////////////////////////////////////////////////
session_start();
?>
<?php

//THIS IS TO INCLUDE THE HEADER COMMON TO ALL THE FILES///////////////////////////////////////////////////////////////////////
 include("header.php");
 echo '<script>
onload=high(0);
</script>';
?>
<?php
//THIS IS TO WRITE THE REMAINING CONTENT.
 echo '<div id=page_container >
 <div id=content >';//TO INCLUDE THE MAIN CONTAINER OF ALL THE PAGES AND CONTENT DIV TO SUPPORT THE CONTENT
 include("home.php");
 echo "</div></div>";
?>
<?php
//THIS IS TO INCLUDE THE FOOTER PART//////////////////////////////////////////////////////////////////////////////////////////
 include("footer.php");
?>
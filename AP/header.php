<!--This document includes all the necessary files which are all common in every page of the site-->
<!DOCTYPE html 
      PUBLIC "-//W3C//DTD HTML 4.01//EN"
      "http://www.w3.org/TR/html4/strict.dtd">
<?php
 echo '<html lang="en-US" ><body >';
 echo '<head>
  <link rel="shortcut icon" href="favicon.ico">';
 
 //To include all the style sheets    
  echo "<link rel=stylesheet type=text/css href=css/style.css />";
 //To include all the style sheets
 
 
 //To include all the associated scripts
  echo "<script src=script/jquery.js ></script>";
  echo "<script src=script/script.js ></script>";
 //To include all the associated scripts
 
 
 echo "</head>";
 
 echo '<div id=container ><div id="header" ><center></br><a href="index.php" >Admission Portal</a>
       </br><font size=4 >A complete information of all the colleges in India till 2013</font></center></div>';
?>
<?php
 include("connect.php");
 include("top_menu.php");
 include("functions.php");
?>
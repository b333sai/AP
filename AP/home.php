<?php
 echo '
 <center><h1>Welcome to the admission portal - 2013</h1></br></center>';
 include("side_menu.php");
 echo '<div id=article>
 <center><div id=choice >
 <h2>Select your stream</h2>
 </br>
 <table id="table1" >
 <tr><td><input type=radio name=stream id=stream1 /><label for="stream1" onmouseover="highlight()" onmouseout="de_highlight()" />Engineering</td>
 
 <td><input type=radio name=stream id=stream2 /><label for="stream2" onmouseout="de_highlight()" onmouseover="highlight()" >Medical</label></td>
 
 <td><input type=radio name=stream id=stream3 /><label for="stream3" onmouseout="de_highlight()" onmouseover="highlight()" >Management</label></td>
 
 </tr></table></div></center>
 <p>Best site over all providing the utmost information about almost all the colleges in India in Engineering, Medical and Management streams.</p><p>This site provides you the complet information about a college before joining them.</p><p>Best site over all providing the utmost information about almost all the colleges in India in Engineering, Medical and Management streams.</p><p>This site provides you the complet information about a college before joining them.</p></div>';
?>
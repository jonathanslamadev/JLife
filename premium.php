<? session_start(); 
if (!isset($_SESSION['user_id'])) 
{
$_SESSION["page_go"] = $_SERVER['REQUEST_URI'];
$_SESSION["index_error"] = "Vous devez vous identifier pour accéder à cette page";
echo '<meta http-equiv="refresh" content="0; url=index.php" />';
exit;
} 
else 
{
$user_id = $_SESSION['user_id'];
}
?>
<?php
$test = "connect.inc.php"; 
include($test); 
$test = "Interface/haut_gauche.php"; 
include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
?>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/premium.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td height="10"></td></tr>
<tr><td width="10"></td><td align="justify"><font face="Arial Rounded MT Bold" style="color:#636563;font-size:18px;">L’« Accès Premium » n’est pas encore disponible pour le moment.
Bientôt vous pourrez profiter des avantages et services mis à votre disposition sur l’ « Accès Premium ».</font></td><td width="10"></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include ($test);?>
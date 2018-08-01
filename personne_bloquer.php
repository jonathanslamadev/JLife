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
<?
if (!empty($_GET["id"]) && (func_number($_GET["id"]) == 0))
{
		$id_adeblok = $_GET["id"];
		$sql_oui = "SELECT user_bloker FROM user WHERE user_id='$user_id'";
		$res_oui = mysql_query($sql_oui);
		$tmp_oui = mysql_fetch_row($res_oui);
		$tableau_bloker = explode('f', $tmp_oui[0]);
		$tablo_save = "";
		for ($i = 1; $i != sizeof($tableau_bloker); $i++)
		{
			if ($tableau_bloker[$i] != $id_adeblok)
				$tablo_save .= "f" . $tableau_bloker[$i];
		}
		$sql_up_oui = mysql_query("UPDATE user SET user_bloker='$tablo_save' WHERE user_id='$user_id'");
}
?>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_289268">
   <div class="roundedcornr_top_289268"><div></div></div>
      <div class="roundedcornr_content_289268" align="center">
         <font face="Arial Rounded MT Bold" size="+1" style="color:#636563;">Membre(s) bloqué(s) </font>
      </div>
   <div class="roundedcornr_bottom_2892"><div></div></div>
</div></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<?
$sql_personne_bloker = "SELECT user_bloker FROM user WHERE user_id='$user_id'";
$res_personne_bloker = mysql_query($sql_personne_bloker);
$num_row_bloker = mysql_num_rows($res_personne_bloker);
$tmp_bloker = mysql_fetch_row($res_personne_bloker);
if (empty($tmp_bloker[0]))
{
 echo "<tr><td align=center height=50 valign=middle><font color=#FF0000 style='font-size:18px'><b>Vous n'avez bloqué aucun membre</b></font></td></tr>";
}
else
{
	echo "<tr><td colspan=3 height=20></td></tr>";
	$tableau_bloker = explode('f', $tmp_bloker[0]);
	for ($i = 1; $i != sizeof($tableau_bloker); $i++)
		{
			$id_bloker = $tableau_bloker[$i];
			$sql_result = "SELECT user_pseudo, user_id, user_sex, user_ville, user_age FROM user WHERE user_id='$id_bloker'";
			$res_result = mysql_query($sql_result);
			$tmp_result = mysql_fetch_row($res_result);
			if ($tmp_result[2] == "Homme")
				$color_sex = "#0061B5";
			else
				$color_sex = "#FF7FAA";
	$onclick = "document.location.href='auth_profil.php?id=$tmp_result[1]'";
				?>
				<tr onClick="<? echo $onclick;?>" style="border:1px solid #000000" style="cursor:pointer" onMouseOver="this.style.background='#DEE7F7'" onMouseOut="this.style.background='#f7f7f7'">
				<?
			echo "<td width=10></td><td align=left width=100><font color=$color_sex><b>$tmp_result[0]</b></font></td><td align=left><font color=$color_sex><b>$tmp_result[4] ans</b></font></td><td align=left><font color=$color_sex><b>$tmp_result[3]</b></font></td><td align=left><a href='personne_bloquer.php?id=$id_bloker' class='valid_ecole'><b>Débloquer</b></a></td></tr>";
		}
}
?>


</table>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include ($test); ?>
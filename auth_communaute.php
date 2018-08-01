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
<?php
if (isset($_GET["id"]) && !empty($_GET["id"]) && (func_number($_GET["id"]) == 0))
		{
			$visite_id = $_GET["id"];
			$sqlprend = "SELECT user_sex, user_pseudo FROM user WHERE user_id='$visite_id'";
			$resprend = mysql_query($sqlprend);
			$tmpprend = mysql_fetch_row($resprend);
			$user_pseudo = $tmpprend[1];
			if ($tmpprend[0] == "Homme")
				$color_sex = "#0061B5";
			else
				$color_sex = "#FF7FAA";
		}
?>
<table id="Table_01" width="680" height="49" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom"><a href="<? echo "auth_profil.php?id=$visite_id"; ?>">
			<img src="images/menuht_01.gif"  alt="Profil" border="0"></a></td>
		<td valign="bottom"><a href="<? echo "auth_detail.php?id=$visite_id"; ?>">
			<img src="images/salife.gif"  alt="Ma life" border="0"></a></td>
		<td width="112" height="49">&nbsp;
			</td>
		<td valign="bottom"><a href="<? echo "auth_ecole.php?id=$visite_id"; ?>">
			<img src="images/menuht_04.gif" alt="Ecole" border="0"></a></td>
		<td valign="bottom"><a href="<? echo "auth_vacance.php?id=$visite_id"; ?>">
			<img src="images/menuht_05.gif" alt="Vacances" border="0"></a></td>
		<td valign="bottom"><a href="<? echo "auth_communaute.php?id=$visite_id"; ?>">
			<img src="images/menuhtsvl_06.gif" alt="Communaute" border="0"></a></td>
	</tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
  <!--DWLayoutTable-->
  <tr>
    <td width="310" height="153" valign="top"><?php
$sql = "SELECT origine, religion, synagogue, association, fete, bar_syna, bar_orchestre, marrier_destination, marrier_synagogue, marrier_orchestre FROM questionnaire_communaute WHERE user_id=$visite_id";
$res = mysql_query($sql);
$num_rows = mysql_num_rows($res);
if ($num_rows == 0)
	{
		
	}
else
{
	$tmp = mysql_fetch_row($res);
	$origine = $tmp[0];
	$religion = $tmp[1];
	$synagogue = $tmp[2];
	$association = $tmp[3];
	$fete = $tmp[4];
	$bar_syna = $tmp[5];
	$bar_orchestre = $tmp[6];
	$marrier_destination = $tmp[7];
	$marrier_synagogue = $tmp[8];
	$marrier_orchestre = $tmp[9];
	$synagogue = stripslashes($synagogue);
	$association = stripslashes($association);
	$bar_syna = stripslashes($bar_syna);
	$bar_orchestre = stripslashes($bar_orchestre);
	$marrier_destination = stripslashes($marrier_destination);
	$marrier_synagogue = stripslashes($marrier_synagogue);
	$marrier_orchestre = stripslashes($marrier_orchestre);
	if (empty($origine) || $origine == "choisissez")
		$origine = "&nbsp;";
	if (empty($religion) || $religion == "choisissez")
		$religion = "&nbsp;";
	if (empty($fete) || $fete == "choisissez")
		$fete = "&nbsp;";
	if (empty($synagogue))
		$synagogue = "&nbsp;";
	if (empty($association))
		$association = "&nbsp;";
	if (empty($bar_syna))
		$bar_syna = "&nbsp;";
	if (empty($bar_orchestre))
		$bar_orchestre = "&nbsp;";
	if (empty($marrier_destination))
		$marrier_destination = "&nbsp;";
	if (empty($marrier_synagogue))
		$marrier_synagogue = "&nbsp;";
	if (empty($marrier_orchestre))
		$marrier_orchestre = "&nbsp;";
}
?>
<table width=299 cellpadding="0" cellspacing="0" style="margin-top:5px; margin-left:5px;">
<?
echo "<tr><td align=center class=infos_titre height=35 valign=top colspan='3'><font color=$color_sex style='font-family:Arial Rounded MT Bold;font-size:32px;'>$user_pseudo</font> <font color=#0061B5> </font></td></tr>";
$sql = "SELECT nom, validation, commentaire, id FROM photos_profil WHERE user_id=$visite_id";
$res = mysql_query($sql);
$nb_row = mysql_num_rows($res);
if ($nb_row == 0)
	{
		if ($tmpprend[0] == "Homme")
			$chemin_tof = "picts/nophotoG.gif";
		else
			$chemin_tof = "picts/nophotoF.gif";
		echo "<tr><td height=20 align=center colspan='3' class=infos_photo><img src=$chemin_tof alt='Nophoto'></td></tr>";
		echo "<tr><td colspan='3' align='center' class=infos_photo></td></tr>";
	}
else
	{
		$tmp = mysql_fetch_row($res);
		if ($tmp[1] == "2")
			{
				$tmp[0] = stripslashes($tmp[0]);
				$chemin_profil = "vignette_profil/" . $tmp[0];
				if (!file_exists($chemin_profil))
				creation_vignette($tmp[0], 250, 220, "photos_profil/", "vignette_profil/", "");
				?>
				<tr><td height=20 colspan='3' align='center' class=infos_photo><? echo "<a href='auth_commentaire_photos.php?id=$visite_id&id_photo=$tmp[3]'>";?><img src="<? echo $chemin_profil;?>" alt='Ajouter un commentaire' border="0"></a></td></tr>
				<?
				echo "<tr><td colspan='3' align='center' class=infos_photo></td></tr>";
			}
		if ($tmp[1] == "1")
			{
				if ($tmpprend[0] == "Homme")
					$chemin_tof = "picts/validationG.gif";
				else
					$chemin_tof = "picts/validationF.gif";
				echo "<tr><td height=20 colspan='3' align='center' class=infos_photo><img src=$chemin_tof alt='Photo en validation'></td></tr>";
				echo "<tr><td colspan='3' align='center' height='10' class=infos_photo style='padding-top:1px;'></td></tr>";
			}
	}
$sql_check_connected = mysql_query("SELECT user_id FROM timestamp_user WHERE user_id='$visite_id'");
$num_rows_sel = mysql_num_rows($sql_check_connected);
if ($num_rows_sel >= 1)
echo "<tr><td height=10 colspan=3 align=center><img src='images/online.gif' alt='Online' border='0'/></td></tr>";
else
echo "<tr><td height=10 colspan=3 align=center><img src='images/offline.gif' alt='Offline' border='0'/></td></tr>";
?>
<tr><td align=center class=qst_comTitre height="25" colspan="3">Ses photos :</td></tr>
<tr>
<?
$sql = "SELECT nom, validation, id FROM photos_communaute WHERE user_id=$visite_id";
$res = mysql_query($sql);
$i = 0;
$j = 3;
while ($tmp = mysql_fetch_row($res))
{
	if ($tmp[1] == "1")
		{
			if ($tmpprend[0] == "Homme")
				$chemin = "picts/validationG_espace.gif";
			else
				$chemin = "picts/validationF_espace.gif";
		}
	else
	{
		$tmp[0] = stripslashes($tmp[0]);
		$chemin = "vignette_communaute/" . $tmp[0];
		if (!file_exists($chemin))
			creation_vignette($tmp[0], 100, 120, "photos_communaute/", "vignette_communaute/", "");
	}
	if ($i == 0)
		$my_class = "salut_photo";
	else
		$my_class = "salut3_photo";
	$onclick = "document.location.href='auth_commentaire_communaute.php?id=$visite_id&id_photo=$tmp[2]'";
	?>
	<td height=20 align=center class="<? echo $my_class;?>" style="cursor:pointer" onMouseOver="this.style.background='#6BBEE7'" onMouseout="this.style.background='#f7f7f7'" onclick="<? echo $onclick;?>"><img src="<? echo $chemin;?>" height=70 width=100 alt="<? echo $tmp_photo[1];?>"></td>
	<?
	$i++;
if ($i == $j)
		{
			$i = 0;
			echo "</tr><tr>";
		}
}
?>
</table>
    </td>
    <td width="360" valign="top"><table cellspacing="0" cellpadding="0" width="325" style="margin-top:5px; margin-left:5px;">
<tr><td align="center" class="qst_comTitre" height="25" colspan="2">Questionnaire Communauté</td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Mon origine :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($origine)) echo $origine; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Je suis :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($religion)) echo $religion; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Ma synagogue :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($synagogue)) echo $synagogue; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Mes associations :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($association)) echo $association; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Ma fête religieuse préférée :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($fete)) echo $fete; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<?
if ($tmpprend[0] == "Homme")
$phrase = "Bar ";
else
$phrase = "Bat ";
?>
<tr><td align=left class=qst_comTitre height="25">Les souvenirs de sa <? echo $phrase; ?> Mitzvah :</td></tr>
<tr><td align=left class=qst_ecoleInfos>
<? if (isset($bar_syna))
{
	echo nls2p($bar_syna);
}
else
echo "&nbsp;";
?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">Lieu de mon mariage :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($marrier_destination)) echo $marrier_destination; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">La synagogue de mon mariage :</td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($marrier_synagogue)) echo $marrier_synagogue; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
<tr><td align=left class=qst_comTitre height="25">La soirée de mon mariage : </td></tr>
<tr><td align=left class=qst_ecoleInfos><? if (isset($marrier_orchestre)) echo $marrier_orchestre; else echo "&nbsp;";?></td></tr>
<tr><td height=5></td></tr>
</table>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
<table width=670 cellpadding="0" cellspacing="0" style="margin-top:10px; margin-left:5px; margin-right:5px;">
<? if(isset($mess_parcours))
	{
		echo "<tr><td valign='center' align='center' colspan='2' height='50'><font size='+1'><em>$mess_parcours</em></font></td></tr>";
	}
 ?>
<tr><td><div class="roundedcornr_box_471183">
   		<div class="roundedcornr_top_471183"><div></div></div>
      	<div class="roundedcornr_content_471183" align="left">
         <font face="Arial Rounded MT Bold" size="+1" style="color:#FFFFFF;">Ses Parcours</font>
      </div>
   <div class="roundedcornr_bottom_5323"><div></div></div>
</div></td></tr>
</table>
<table width=670 cellpadding="0" cellspacing="0" style="margin-left:5px; margin-right:5px; border-top:1px solid #6BBEE7;border-left:1px solid #6BBEE7;border-right:1px solid #6BBEE7;">
<tr valign="middle" bgcolor="#ADEBF7" height="25" align="center"><td><b>Pays</b></td><td><b>Ville</b></td><td><b>Centre Communautaire<br />& Evènement</b></td><td><b>Nom</b></td><td><b>Durée</b></td><td><b><? 
if ($_SESSION["user_premium"] == "42") {
	echo "Joindre le parcours";
}
else
	echo "&nbsp;";
?></b></td></tr>

<?
//------------------------------ Debut Affichage des parcours --------------------------------------
$sql = "SELECT pays, ville, lieu, nom, mois_entree, annee_entree, mois_sortie, annee_sortie, id FROM groupe_communaute WHERE user_id=$visite_id Order by annee_sortie DESC, mois_sortie DESC, annee_entree DESC, mois_entree DESC, pays DESC, ville DESC, nom DESC";
$res = mysql_query($sql);
$i = 0;
while ($tmp = mysql_fetch_row($res))
{
	$tmp[0] = strtolower($tmp[0]);
	$tmp[0] = ucfirst($tmp[0]);
	$tmp[1] = strtolower($tmp[1]);
	$tmp[1] = ucfirst($tmp[1]);
	$tmp[2] = strtolower($tmp[2]);
	$tmp[2] = ucfirst($tmp[2]);
	//$tmp[3] = strtolower($tmp[3]);
	//$tmp[3] = ucfirst($tmp[3]);
	$tmp[1] = stripslashes($tmp[1]);
	$tmp[3] = stripslashes($tmp[3]);
	$color = "#F7F7F7";
	change_date($tmp[4], $tmp[5], $tmp[6], $tmp[7]);
	$onclick = "window.open('visite_communaute.php?nom=$tmp[3]')"
	?>
	<tr bgcolor="#f7f7f7" valign=middle height=20 align=center  style="cursor:pointer" onMouseOver="this.style.background='#6BBEE7'" onMouseOut="this.style.background='#f7f7f7'" >
	<?
	echo "<td align=center style='border-bottom:1px #6BBEE7 solid;' onclick='$onclick'>$tmp[0]</td><td style='border-bottom:1px #6BBEE7 solid;' onclick='$onclick'>&nbsp;&nbsp;$tmp[1]</td><td style='border-bottom:1px #6BBEE7 solid;'>$tmp[2]</td><td style='border-bottom:1px #6BBEE7 solid;' onclick='$onclick'>$tmp[3]</td><td style='border-bottom:1px #6BBEE7 solid;' onclick='$onclick'>$tmp[4] $tmp[5] à $tmp[6] $tmp[7]</td><td style='border-bottom:1px #6BBEE7 solid;'>";
	if ($_SESSION["user_premium"] == "42") {
		echo "<a href=fiche_communaute.php?joindre=$tmp[8] class=inscrip>Joindre</a>";
	}
	else
		echo "&nbsp;";
	echo "</td></tr>";
	$i++;
}

// ------------------------- Fin Affichage des parcours ---------------------------------------

function change_date(&$mois_entree, &$annee_entree, &$mois_sortie, &$annee_sortie)
{
	if ($mois_entree == "1")
	$mois_entree = "Janvier";
	if ($mois_entree == "2")
	$mois_entree = "Février";
	if ($mois_entree == "3")
	$mois_entree = "Mars";
	if ($mois_entree == "4")
	$mois_entree = "Avril";
	if ($mois_entree == "5")
	$mois_entree = "Mai";
	if ($mois_entree == "6")
	$mois_entree = "Juin";
	if ($mois_entree == "7")
	$mois_entree = "Juillet";
	if ($mois_entree == "8")
	$mois_entree = "Août";
	if ($mois_entree == "9")
	$mois_entree = "Septembre";
	if ($mois_entree == "10")
	$mois_entree = "Octobre";
	if ($mois_entree == "11")
	$mois_entree = "Novembre";
	if ($mois_entree == "12")
	$mois_entree = "D&eacute;cembre";
	if ($mois_sortie == "1")
	$mois_sortie = "Janvier";
	if ($mois_sortie == "2")
	$mois_sortie = "Février";
	if ($mois_sortie == "3")
	$mois_sortie = "Mars";
	if ($mois_sortie == "4")
	$mois_sortie = "Avril";
	if ($mois_sortie == "5")
	$mois_sortie = "Mai";
	if ($mois_sortie == "6")
	$mois_sortie = "Juin";
	if ($mois_sortie == "7")
	$mois_sortie = "Juillet";
	if ($mois_sortie == "8")
	$mois_sortie = "Août";
	if ($mois_sortie == "9")
	$mois_sortie = "Septembre";
	if ($mois_sortie == "10")
	$mois_sortie = "Octobre";
	if ($mois_sortie == "11")
	$mois_sortie = "Novembre";
	if ($mois_sortie == "12")
	$mois_sortie = "D&eacute;cembre";
}
?>
</table>
<tr><td colspan="5"><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
    </td>
  </tr>
</table>
<? $test = "Interface/bas.php"; include ($test);?>
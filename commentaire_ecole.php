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
?>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<?
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
if (isset($_GET["id"]) && !empty($_GET["id"]) && (func_number($_GET["id"]) == 0) && isset($_GET["valid"]) && !empty($_GET["valid"]) && ($_GET["valid"] == "oui" || $_GET["valid"] == "non"))
		{
			$id_com = $_GET["id"];
			$valid = $_GET["valid"];
			$sql = "SELECT p.id FROM photos_ecole p, commentaire_ecole v WHERE p.user_id='$user_id' AND p.validation=2 AND v.id_photo=p.id AND v.id=$id_com";
			$res = mysql_query($sql);
			$num_rows = mysql_num_rows($res);
			if ($num_rows == 1)
				{
					$tmp = mysql_fetch_row($res);
					if ($valid == "non")
					{
						$sql_del = "DELETE FROM commentaire_ecole WHERE id=$id_com AND id_photo=$tmp[0]";
						$res_del = mysql_query($sql_del);
						$sql_updown = "UPDATE photos_ecole SET commentaire= commentaire - 1 WHERE id=$tmp[0] AND user_id='$user_id'";
						$res_updown = mysql_query($sql_updown);
					}
					if ($valid == "oui")
					{
						$sql_updown = "UPDATE commentaire_ecole SET validation=2 WHERE id=$id_com AND id_photo='$tmp[0]'";
						$res_updown = mysql_query($sql_updown);
					}
				}
		}
$test = "Interface/haut_gauche.php"; 
include($test);
?>
<?
if (!empty($_POST["add_description"]))
{
	$desc = $_POST["description"];
	$id_photo = $_POST["id_photo"];
	$flag_test = verif_str($desc);
	if ($flag_test == 2)
		$tab_message = "Les caractères < >" . " sont interdits!";
	else if ($flag_test == 0 && (func_number($id_photo) == 0))
		{
			$desc = addslashes($desc);
			$sql = "UPDATE photos_ecole SET descrip='$desc' WHERE id='$id_photo' AND user_id='$user_id'";
			$res = mysql_query($sql);
		}
	else
		{
			$tab_message = "Erreur";
		}
}

?>
<table width="680" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_289268">
   <div class="roundedcornr_top_289268"><div></div></div>
      <div class="roundedcornr_content_289268" align="center">
         <font face="Arial Rounded MT Bold" style="color:#636563;font-size:18px;"><a href=commentaire_photos.php class="inscrip">Photo Principale</a></font>
      </div>
   <div class="roundedcornr_bottom_2892"><div></div></div>
</div></td></tr>
</table>
<table width="680" cellpadding="0" cellspacing="0">
<tr><td width="220" valign="top" style="border:1px solid #00CF31" bgcolor="#52E373" align="center"><a href="commentaire_ecole.php" class=commentaire><font face="Arial Rounded MT Bold" style="color:#FFFFFF;font-size:18px;">Ecoles</font></a></td><td width="1"></td>
<td width="220" valign="top" style="border:1px solid #FF9A00" bgcolor="#FFBA42" align="center"><a href="commentaire_vacance.php" class=commentaire><font face="Arial Rounded MT Bold" style="color:#FFFFFF;font-size:18px;">Vacances</font></td>
<td width="1"></td>
<td width="220" valign="top" style="border:1px solid #0079C6" bgcolor="#299AD6" align="center"><a href="commentaire_communaute.php" class=commentaire><font face="Arial Rounded MT Bold" style="color:#FFFFFF;font-size:18px;">Ma Communauté</font></td>
</tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr>
<?
$sql_test = "SELECT nom, validation, id, descrip FROM photos_ecole WHERE user_id=$user_id AND validation='2'";
$res_test = mysql_query($sql_test);
$i = 0;
$j = 5;
while ($tmp = mysql_fetch_row($res_test))
{
	if ($tmp[1] == "1")
		$chemin = "picts/validation.jpg";
	else
		{
			$tmp[0] = stripslashes($tmp[0]);
			$chemin = "vignette_ecole/" . $tmp[0];
			$chemin_pasvignette = "photos_ecole/" . $tmp[0];
			if (!file_exists($chemin))
				creation_vignette($tmp[0], 100, 120, "photos_ecole/", "vignette_ecole/", "");
		}
	if ($i == 0)
			$my_class = "salut_photo";
		else
			$my_class = "salut3_photo";
	$onclick = "document.location.href='commentaire_ecole.php?id=$tmp[2]'";
	$tmp[3] = stripslashes($tmp[3]);
	?>
	<a href="<? echo $chemin_pasvignette;?>" rel="lightbox[ecole]" title="<? echo $tmp[3];?>"></a>
	<?
		?>
	<td height=20 align=center class="<? echo $my_class;?>" style="cursor:pointer" onMouseOver="this.style.background='#52E373'" onMouseout="this.style.background='#f7f7f7'" onClick="<? echo $onclick;?>"><img src="<? echo $chemin;?>"></td>
	<?
	$i++;
if ($i == $j)
		{
			$i = 0;
			echo "</tr><tr>";
		}
}
echo "</tr>";
echo "</table>";

?>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<?
if (!empty($_GET["id"]) && (func_number($_GET["id"]) == 0))
{
	$id_photoooo = $_GET["id"];
	$sqlrajout = " AND id=$id_photoooo";
}
else if (!empty($id_photo))
{
	$sqlrajout = " AND id=$id_photo";
}
else
{
	$sqlrajout = " ORDER BY RAND()";
}
$sql = "SELECT nom, validation, commentaire, id, descrip FROM photos_ecole WHERE user_id='$user_id' AND validation=2";
$sql .= $sqlrajout;
$res = mysql_query($sql);
$num_rows = mysql_num_rows($res);
if ($num_rows != 0)
	{
		$tmp = mysql_fetch_row($res);
		if ($tmp[1] != '2')
			$tab_message = "Votre photo est en cours de validation";
		else
			{
				$sql_nb_avalid = "SELECT id FROM commentaire_ecole WHERE validation='1' AND id_photo=$tmp[3]";
				$res_now = mysql_query($sql_nb_avalid);
				$num_rows_now = mysql_num_rows($res_now);
				$tmp[2] -= $num_rows_now;
				$tmp[0] = stripslashes($tmp[0]);
				$tmp[4] = stripslashes($tmp[4]);
				$chemin_ecole = "photos_ecole/" . $tmp[0];
				echo '<form name="add_desc" method="post" action="commentaire_ecole.php">';
				?>
				<input type="hidden" name="id_photo" value="<? echo $tmp[3];?>" />
				<tr><td width="250" align="left" valign="top" height="100"><? echo "<br><br><br>&nbsp;<font color=#737531><b>$tmp[2] "; if ($tmp[2] <= 1) echo "commentaire validé</b>"; else echo "<b>commentaires validés</b>"; echo "</font><br>&nbsp;<font color=#184D9C>"; if ($num_rows_now <= 1) {echo "<a href=verif_commentaire_ecole.php?id=$tmp[3] class=new_comm><b>$num_rows_now  commentaire en attente</b></a>";} else {echo "<a href=verif_commentaire_ecole.php?id=$tmp[3] class=new_comm><b>$num_rows_now commentaires en attente</b></a>";} echo "<br>&nbsp;<a id='entremenu' href='javascript:montrer()' class=new_desc><b>Ma description</a></b>";
				echo '<div id="menu" style="background-color:#F7F7F7"><br>&nbsp;<textarea name=description rows=4 cols=25></textarea><br><br>&nbsp;&nbsp;&nbsp;<input type="submit" name="add_description" class="bouton" value="Ajouter"/></div>';
				?></td><td valign=bottom align="left" height="320"><a href="<? echo $chemin_ecole;?>" rel="lightbox[ecole]" title="<? echo $tmp[4];?>"><img src="<? echo $chemin_ecole; ?>"  alt='Cliquez et faites défiler les photos' height="300" border="0" /></a></td></tr>
				<tr><td height="10"><? echo "</form>";?></td></tr>
				</table>
				<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
				<?
				if (!empty($tmp[4]))
				{
					echo "<tr><td width=250></td><td valign=top align=left style='border:1px solid #A5B2C6'>&nbsp;$tmp[4]</td><td width=30></td></tr><tr><td height=10></td></tr></table><table width=680 cellpadding=0 cellspacing=0 bgcolor=#f7f7f7>";
				}
				$sqlcomm = "SELECT p.id, p.user_id, p.id_photo, p.commentaire, p.validation, p.creation, u.user_pseudo, u.user_sex FROM commentaire_ecole p, user u WHERE p.user_id=u.user_id AND p.id_photo=$tmp[3] AND validation=2 ORDER by -(p.creation)";
				$rescomm = mysql_query($sqlcomm);
				$num_comm = mysql_num_rows($rescomm);
				if ($num_comm > 0)
					{
						while ($tmp_comm = mysql_fetch_row($rescomm))
							{
								$tmp_comm[3] = stripslashes($tmp_comm[3]);
								$sql_ami_photo = "SELECT nom, commentaire, validation FROM photos_profil WHERE user_id='$tmp_comm[1]'";
								$res_ami_photo = mysql_query($sql_ami_photo);
								$num_photos = mysql_num_rows($res_ami_photo);
							if ($num_photos == 0)
								{
									if ($tmp_comm[7] == "Homme")
										$chemin = "picts/nophotoG.gif";
									else
										$chemin = "picts/nophotoF.gif";
								}
							else
								{
									$tmp_photo = mysql_fetch_row($res_ami_photo);
									if ($tmp_photo[2] == '1')
										{
											if ($tmp_comm[7] == "Homme")
												$chemin = "picts/validation1.gif";
											else
												$chemin = "picts/validation2.gif";
										}
									else
										{
											$tmp_photo[0] = stripslashes($tmp_photo[0]);
											$chemin = "photos_profil/" . $tmp_photo[0];
										}
								}
							if ($tmp_comm[7] == "Homme")
								$color = "#0061B5";
							else
								$color = "#FF7FAA";
							$tableau_final = explode(' ', $tmp_comm[5]);
							$tablo_date = explode('-', $tableau_final[0]);
							change_date($tablo_date[1]);
							$str_date = $tablo_date[2] . " " . $tablo_date[1] . " " . $tablo_date[0];
							$onclick = "document.location.href='auth_ecole.php?id=$tmp_comm[1]'";
							?>
							<tr><td colspan="2" align="left" class="qst_ecoleTitre"><? echo "&nbsp;&nbsp;Envoyé par <font color=$color>$tmp_comm[6]</font> le $str_date à $tableau_final[1]</font><font style='padding-left:150px'><a href='commentaire_ecole.php?valid=non&id=$tmp_comm[0]' class=inscrip>Supprimer</font>";?></td></tr>
	<tr style="cursor:pointer" onMouseOver="this.style.background='#D6FFD6'" onMouseout="this.style.background='#f7f7f7'" onClick="<? echo $onclick;?>"><td align=left class=salutgauche width="50"><img src="<? echo $chemin;?>" height=60 width=60 alt="<? echo $tmp_comm[0];?>"></td><td align=left class=salut3 valign="top" width="90%"><? echo $tmp_comm[3];?></td></tr>
	<tr><td colspan="2" height="10"></td></tr>
									<?
							}
					}
			}
	}
else
	{
		$tab_message = "Vous n'avez pas encore de photo principale cliquer ici pour en ajouter une -> ";
	}
?>
</table>
		<body onLoad="zero()" onafterupdate="zero()">
		<style type="text/css">
	#menu {
		display: block;
		background-color:#000000;
	}
	#smenu {
		display: none;
	}
	</style>
	<script type="text/javascript">
	function zero() 
	{
			document.getElementById("menu").id = "smenu";
			}
function montrer() 
{
			document.getElementById("smenu").id = "menu";
			document.getElementById("entremenu").href = "javascript:cacher()";
}
function cacher() 
		{
			document.getElementById("menu").id = "smenu";
			document.getElementById("entremenu").href = "javascript:montrer()";
		}
	</script>
<? function change_date(&$mois_entree)
{
	if ($mois_entree == "01")
	$mois_entree = "Janvier";
	if ($mois_entree == "02")
	$mois_entree = "Février";
	if ($mois_entree == "03")
	$mois_entree = "Mars";
	if ($mois_entree == "04")
	$mois_entree = "Avril";
	if ($mois_entree == "05")
	$mois_entree = "Mai";
	if ($mois_entree == "06")
	$mois_entree = "Juin";
	if ($mois_entree == "07")
	$mois_entree = "Juillet";
	if ($mois_entree == "08")
	$mois_entree = "Août";
	if ($mois_entree == "09")
	$mois_entree = "Septembre";
	if ($mois_entree == "10")
	$mois_entree = "Octobre";
	if ($mois_entree == "11")
	$mois_entree = "Novembre";
	if ($mois_entree == "12")
	$mois_entree = "Decembre";
} $test = "Interface/bas.php"; include ($test); ?>
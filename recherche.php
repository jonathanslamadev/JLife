<? session_start(); if (!isset($_SESSION['user_id'])) {	echo "Invalid Session. Please log again.";exit; } else {$user_id = $_SESSION['user_id']; $user_pseudo = $_SESSION['pseudo'];}?>
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
//--------------------------- DEBUT RECUP GET -------------------------------------//
if (!empty($_GET["rech"]) && $_GET["rech"] == 1)
{
	if (isset($_GET["nom"]))
	{
		$nom = $_GET["nom"];
		if (!empty($nom))
		{
			$flag = verif_nom($nom);
			if ($flag == 3)
			$tab_error['nom'] = "Votre nom est trop long";
			if ($flag == 1)
			$tab_error['nom'] = "Caracteres non autorises < > *";
		}
	}
	if (isset($_GET["prenom"]))
	{
		$prenom = $_GET["prenom"];
		if (!empty($prenom))
			{
			$flag = verif_nom($prenom);
			if ($flag == 3)
			$tab_error['prenom'] = "Votre prenom est trop long";
			if ($flag == 1)
			$tab_error['prenom'] = "Caracteres non autorises < > *";
		}
	}
	if (isset($_GET["pseudo"]))
	{
		$pseudo = $_GET["pseudo"];
		if (!empty($pseudo))
		{
			$flag = verif_pass($pseudo);
			if ($flag == 3)
			$tab_error['pseudo'] = "Votre pseudo est trop long";
			if ($flag == 1)
			$tab_error['pseudo'] = "Caracteres non autorises < > *";
		}
	}
	if (isset($_GET["pays"]))
	{
		$pays = $_GET["pays"];
		if ($pays == "")
		$tab_error['pays'] = "Probleme pays";
	}
	if (isset($_GET["ville"]))
	{
		$ville = $_GET["ville"];
		if (!empty($ville))
		{
			$flag = verif_ville($ville);
			if ($flag == 3)
			$tab_error['ville'] = "Nom de ville trop longue";
			if ($flag == 1)
			$tab_error['ville'] = "Caracteres non autorises < > *";
		}
	}
	if (isset($_GET["age_entre"]))
	{
		$age_entre = $_GET["age_entre"];
		if ($age_entre == "")
		$tab_error['age'] = "Age probleme..";
		if ($age_entre < '7' && $age_entre > 95)
			$tab_error['age'] = "Age probleme..";
	}
	if (isset($_GET["age_sortie"]))
	{
		$age_sortie = $_GET["age_sortie"];
		if ($age_sortie == "")
		$tab_error['age'] = "Age probleme..";
		if ($age_sortie < '7' && $age_sortie > 95)
			$tab_error['age'] = "Age probleme..";
	}
	if (isset($age_entre) && isset($age_sortie))
		{
			if ($age_entre > $age_sortie)
				$tab_error['age'] = "Age probleme..";
		}
	if (isset($_GET["situation"]))
	{
		$situation = $_GET["situation"];
	}
if (isset($_GET["sexe"]) && ($_GET["sexe"] == 'Les deux' || $_GET["sexe"] == 'Femme' || $_GET["sexe"] == 'Homme'))
$sexe = $_GET["sexe"];
if (isset($_GET["photo"]) && ($_GET["photo"] == 'Les deux' || $_GET["photo"] == 'oui' || $_GET["photo"] == 'non'))
$photo = $_GET["photo"];
if (isset($_GET["lettre"]))
	{
		$lettre = $_GET["lettre"];
		if ($lettre >= '0' && $lettre <= '9' || strlen($lettre) != 0)
		{
		}
		else
			$tab_error['nom'] = "probleme d'affichage";
	}
else
$tab_error['nom'] = "probleme d'affichage";
if (!empty($_GET["nombre_enregistrement"]) && (func_number($_GET["nombre_enregistrement"]) == 0))		$nombre_enregistrement = $_GET["nombre_enregistrement"];
else
$tab_error['nom'] = "probleme d'affichage";
}
// ------------------------- FIN RECUP GET --------------------------------------------//

// ------------------- DEBUT RECUP GET ------------------------------------------------------//


if (isset($_GET["submit"]) || isset($_GET["rech"]))
{
	if (isset($_GET["nom"]))
	{
	$nom = $_GET["nom"];
	if (!empty($nom))
	{
		$flag = verif_nom($nom);
		if ($flag == 3)
		$tab_error['nom'] = "Votre nom est trop long";
		if ($flag == 1)
		$tab_error['nom'] = "Caracteres non autorises < > *";
	}
}
if (isset($_GET["prenom"]))
{
	$prenom = $_GET["prenom"];
	if (!empty($prenom))
		{
		$flag = verif_nom($prenom);
		if ($flag == 3)
		$tab_error['prenom'] = "Votre prenom est trop long";
		if ($flag == 1)
		$tab_error['prenom'] = "Caracteres non autorises < > *";
	}
}
if (isset($_GET["pseudo"]))
{
	$pseudo = $_GET["pseudo"];
	if (!empty($pseudo))
	{
		$flag = verif_pass($pseudo);
		if ($flag == 3)
		$tab_error['pseudo'] = "Votre pseudo est trop long";
		if ($flag == 1)
		$tab_error['pseudo'] = "Caracteres non autorises < > *";
	}
}
if (isset($_GET["pays"]))
{
	$pays = $_GET["pays"];
	if ($pays == "")
	$tab_error['pays'] = "Probleme pays";
}
if (isset($_GET["Ville"]))
{
	$ville = $_GET["Ville"];
	if (!empty($ville))
	{
		$flag = verif_ville($ville);
		if ($flag == 3)
		$tab_error['ville'] = "Nom de ville trop longue";
		if ($flag == 1)
		$tab_error['ville'] = "Caracteres non autorises < > *";
	}
}
if (isset($_GET["age_entre"]))
{
	$age_entre = $_GET["age_entre"];
	if ($age_entre == "")
	$tab_error['age'] = "Age probleme..";
	if ($age_entre < '7' && $age_entre > 95)
		$tab_error['age'] = "Age probleme..";
}
if (isset($_GET["age_sortie"]))
{
	$age_sortie = $_GET["age_sortie"];
	if ($age_sortie == "")
	$tab_error['age'] = "Age probleme..";
	if ($age_sortie < '7' && $age_sortie > 95)
		$tab_error['age'] = "Age probleme..";
}
if (isset($age_entre) && isset($age_sortie))
	{
		if ($age_entre > $age_sortie)
			$tab_error['age'] = "Age probleme..";
	}
if (isset($_GET["situation"]))
{
	$situation = $_GET["situation"];
}
if (isset($_GET["sexe"]) && ($_GET["sexe"] == 'Les deux' || $_GET["sexe"] == 'Femme' || $_GET["sexe"] == 'Homme'))
$sexe = $_GET["sexe"];
if (isset($_GET["photo"]) && ($_GET["photo"] == 'Les deux' || $_GET["photo"] == 'oui' || $_GET["photo"] == 'non'))
$photo = $_GET["photo"];
if (!isset($tab_error))
	{	
		$str_select = "";
		if (!empty($nom))
			{
				$str_select .= " AND user_nom LIKE '%$nom%'";
			}
		if (!empty($prenom))
			{
				$str_select .= " AND user_prenom LIKE '%$prenom%'";
			}
		if (!empty($pseudo))
			{
				$str_select .= " AND user_pseudo LIKE '%$pseudo%'";
			}
		if (!empty($pays) && $pays != "TOUS")
			{
				$str_select .= " AND user_pays='$pays'";
			}
		if (!empty($ville))
			{
				$str_select .= " AND user_ville LIKE '%$ville%'";
			}
		if (!empty($age_entre) & !empty($age_sortie))
			{
				$str_select .= " AND user_age BETWEEN '$age_entre' AND '$age_sortie'";
			}
		if (!empty($situation) && $situation != "Tous")
			{
				$str_select .= " AND user_situation='$situation'";
			}
		if (!empty($sexe) && $sexe != "Les deux")
			{
				$str_select .= " AND user_sex='$sexe'";
			}
		if (isset($lettre) && isset($nombre_enregistrement) && $photo != "oui")
			{
				$begin = $lettre * 2 * 10;
				$end = $begin + 20;
				$sql = "SELECT user_pseudo, user_age, user_ville, user_id, user_job, user_sex, user_premium FROM user WHERE user_active='1'";
				$sql .= $str_select . " ORDER BY user_premium DESC, user_pseudo";
				$sqlfinal = $sql . " LIMIT 20 OFFSET $begin";
				$res = mysql_query($sqlfinal);
				$enregistrement_total_sans_photo = $nombre_enregistrement;
				$flag_arret_lettre = check_sans_photo($enregistrement_total_sans_photo);
			}
		else if (isset($lettre) && isset($nombre_enregistrement) && $photo == "oui")
			{
				if (!empty($nom))
					$str_select .= " AND u.user_nom LIKE '%$nom%'";
				if (!empty($prenom))
					$str_select .= " AND u.user_prenom LIKE '%$prenom%'";
				if (!empty($pseudo))
					$str_select .= " AND u.user_pseudo LIKE '%$pseudo%'";
				if (!empty($pays) && $pays != "TOUS")
					$str_select .= " AND u.user_pays='$pays'";
				if (!empty($ville))
					$str_select .= " AND u.user_ville LIKE '%$ville%'";
				if (!empty($age_entre) & !empty($age_sortie))
					$str_select .= " AND u.user_age BETWEEN '$age_entre' AND '$age_sortie'";
				if (!empty($situation) && $situation != "Tous")
					$str_select .= " AND u.user_situation='$situation'";
				if (!empty($sexe) && $sexe != "Les deux")
					$str_select .= " AND u.user_sex='$sexe'";
				$begin = $lettre * 16;
				$end = $begin + 16;
				$sql = "SELECT u.user_pseudo, u.user_sex, p.nom, u.user_id, p.user_id, u.user_age, u.user_ville, u.user_premium FROM user u, photos_profil p WHERE p.validation=2 AND p.user_id=u.user_id AND u.user_active='1'";
				$sql .= $str_select . " ORDER BY user_premium DESC, user_pseudo";
				$sqlfinal = $sql . " LIMIT 16 OFFSET $begin";
				$res = mysql_query($sqlfinal);
				$enregistrement_total_avec_photo = $nombre_enregistrement;
				$flag_arret_lettre = check_avec_photo($enregistrement_total_avec_photo);
			}
		else
		{
			$lettre = 0;
			if ($photo == "oui")
			{
				if (!empty($nom))
					$str_select .= " AND u.user_nom LIKE '%$nom%'";
				if (!empty($prenom))
					$str_select .= " AND u.user_prenom LIKE '%$prenom%'";
				if (!empty($pseudo))
					$str_select .= " AND u.user_pseudo LIKE '%$pseudo%'";
				if (!empty($pays) && $pays != "TOUS")
					$str_select .= " AND u.user_pays='$pays'";
				if (!empty($ville))
					$str_select .= " AND u.user_ville LIKE '%$ville%'";
				if (!empty($age_entre) & !empty($age_sortie))
					$str_select .= " AND u.user_age BETWEEN '$age_entre' AND '$age_sortie'";
				if (!empty($situation) && $situation != "Tous")
					$str_select .= " AND u.user_situation='$situation'";
				if (!empty($sexe) && $sexe != "Les deux")
					$str_select .= " AND u.user_sex='$sexe'";
				$sql = "SELECT u.user_pseudo, u.user_sex, p.nom, u.user_id, p.user_id, u.user_age, u.user_ville, u.user_premium FROM user u, photos_profil p WHERE p.validation=2 AND p.user_id=u.user_id AND u.user_active='1'";
				$sql .= $str_select . " ORDER BY user_premium DESC, user_pseudo";
				$res = mysql_query($sql);
				$enregistrement_total_avec_photo = mysql_num_rows($res);
				if ($enregistrement_total_avec_photo > 16)
				{
					$sqlfinal = $sql . " LIMIT 0, 16";
					$res = mysql_query($sqlfinal);
					$flag_arret_lettre = check_avec_photo($enregistrement_total_avec_photo);
				}
			}
			else
			{
				$sql = "SELECT user_pseudo, user_age, user_ville, user_id, user_job, user_sex, user_premium FROM user WHERE user_active='1'";
				$sql .= $str_select . " ORDER BY user_premium DESC, user_pseudo";
				$res = mysql_query($sql);
				$enregistrement_total_sans_photo = mysql_num_rows($res);
				if ($enregistrement_total_sans_photo > 20)
				{
					$sqlfinal = $sql . " LIMIT 0, 20";
					$res = mysql_query($sqlfinal);
					$flag_arret_lettre = check_sans_photo($enregistrement_total_sans_photo);
				}
			}
		}
		if (!empty($photo))
			{
				if ($photo == "oui")
					{
						?>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
						<tr><td><img src="images/rapide_01.gif" border="0" alt="" /><a href="recherche.php"><img src="images/rapide_02.gif" border="0" alt="" /></a></td></tr>
						</table>
						<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="margin-right:0.8em;">
						
						<tr><td height="20" class=qst_profilTitre valign="middle" align="center" style="padding-top:1px;" colspan="4"><b>Voici le resultat de votre recherche : </b><? echo $enregistrement_total_avec_photo;?></td></tr>
						<tr>
						<?
							$flag = 0;
							while ($tmp = mysql_fetch_row($res))
								{
									if ($flag == 4)
										{
											echo "</tr><tr>";
											$flag = 0;
										}
											$tmp[2] = stripslashes($tmp[2]);
											$tmp[0] = stripslashes($tmp[0]);
											$chemin = "vignette_ami/" . $tmp[2];
											if (!file_exists($chemin))
											creation_vignette($tmp[2], 150, 135, "photos_profil/", "vignette_ami/", "");
											if ($flag == 0)
												$my_class = "salut";
											else
												$my_class = "salut3";
											if ($tmp[1] == "Homme")
												$color = "#0061B5";
											else
												$color = "#FF7FAA";
									$onclick = "window.open('auth_profil.php?id=$tmp[3]')";
										if ($tmp[7] == "42")
										{
											if ($tmp[1] == "Homme")
												$color_prem = "#C6DBFF";
											else
												$color_prem = "#FFE3D6";
										}
									else
										{
											$color_prem = "#f7f7f7";
										}
											?>
											<td height="20" align="center" bgcolor="<? echo $color_prem;?>" class="<? echo $my_class;?>" style="cursor:pointer" onMouseOver="this.style.background='#DEE7F7'" onMouseout="this.style.background='<? echo $color_prem;?>'" onclick="<? echo $onclick;?>"><img src="<? echo $chemin;?>" alt="<? echo $tmp[2];?>" border="0"><br /><? echo "<font color=$color><b>$tmp[0]</b>"; echo "<b> $tmp[5] ans</b>"; echo "<br>"; echo "<b>$tmp[6]</b>";?></td>
											<?
											$flag++;
								}
					if ($enregistrement_total_avec_photo > 16)
							{
								echo "<tr bgcolor=#9CAAC6><td align=center colspan=5 height=20 valign=middle>";
								$i = 0;
								if ($lettre == $flag_arret_lettre)
									$value_prec = "Précédent";
								else if ($lettre == 0)
									$value_suiv = "Suivant";
								else
									$value_precsuiv = "Precedent .. Suivant";
								$flag_arret_lettre += 1;
								while ($i != $flag_arret_lettre)
									{
										if ($i == 0)
										{
										 echo "<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>$i</a>";
										}
										else
										 echo " - <a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>$i</a>";
										$i++;
									}
								if (isset($value_prec))
										{
											$value = $lettre - 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>$value_prec</a>";
										}
								if (isset($value_suiv))
										{
											$value = $lettre + 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>$value_suiv</a>";
										}
								if (isset($value_precsuiv))
										{
											$value_prectest = $lettre - 1;
											$value_suivtest = $lettre + 1;
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_prectest&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>Précédent</a>";
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_suivtest&nombre_enregistrement=$enregistrement_total_avec_photo' class=suiv_prec>Suivant</a>";
										}
								echo "</td></tr>";
							}
						?>
						</table>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em">
<tr><td><div class="roundedcornr_box_511462">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_511462">
      </div>
   <div class="roundedcornr_bottom_511462"><div></div></div>
</div></td></tr>
</table>
						<?
						$test = "Interface/bas.php"; include($test);
						exit;
					}
				else if ($photo == "non")
					{
						?>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
						<tr><td><img src="images/rapide_01.gif" border="0" alt="" /><a href="recherche.php"><img src="images/rapide_02.gif" border="0" alt="" /></a></td></tr>
						</table>
						<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="margin-right:0.8em;">
						
						<tr><td height="30" class=qst_profilTitre valign="middle" align="center" style="padding-top:1px;" colspan="4"><b>Voici le resultat de votre recherche : </b><? echo $enregistrement_total_sans_photo;?></td></tr>
						<tr class=qst_profilInfos><td height="20" valign="middle" style="padding-top:1px;border-left:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;" width="150" align="left"><b>&nbsp;&nbsp;Pseudo</b></td><td width="150" style="border-bottom:1px solid #A5B2C6;" align="left"><b>Age</b></td><td width="300" style="border-bottom:1px solid #A5B2C6;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ville</b></td><td width="150" style="border-right:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;" align="left"><b>Activité</b></td></tr>
						<?
							while ($tmp = mysql_fetch_row($res))
								{
									if ($tmp[5] == "Homme")
									$color = "#0061B5";
								else
									$color = "#FF7FAA";
									if ($tmp[6] == "42")
										{
											if ($tmp[5] == "Homme")
												$color_prem = "#C6DBFF";
											else
												$color_prem = "#FFE3D6";
										}
									else
										{
											$color_prem = "#f7f7f7";
										}
								$onclick = "window.open('auth_profil.php?id=$tmp[3]')";
								?>
						<tr bgcolor="<? echo $color_prem;?>" valign=middle height=20 align=center  style="cursor:pointer" onMouseOver="this.style.background='#DEE7F7'" onMouseOut="this.style.background='<? echo $color_prem;?>'" onclick="<? echo $onclick;?>">
								<?
									echo "<td width=150 class=recherche_bas align=left><font color=$color><b>$tmp[0]</b></font></td><td width=30 class=recherche_bas2 align=left><font color=$color><b>$tmp[1]</b></font></td><td width=300 class=recherche_bas2 align=left><font color=$color><b>$tmp[2]</b></font></td><td width=100 style='border-bottom:1px solid #A5B2C6;border-right:1px solid #A5B2C6;' align=left><font color=$color><b>$tmp[4]</b></font></td></tr>";
								}
						if ($enregistrement_total_sans_photo > 20)
							{
								echo "<tr bgcolor=#9CAAC6><td align=center colspan=5 height=20 valign=middle>";
								$i = 0;
								if ($lettre == $flag_arret_lettre)
									$value_prec = "Précédent";
								else if ($lettre == 0)
									$value_suiv = "Suivant";
								else
									$value_precsuiv = "Precedent .. Suivant";
								$flag_arret_lettre += 1;
								while ($i != $flag_arret_lettre)
									{
										if ($i == 0)
										{
										 echo "<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$i</a>";
										}
										else
										 echo " - <a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$i</a>";
										$i++;
									}
								if (isset($value_prec))
										{
											$value = $lettre - 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$value_prec</a>";
										}
								if (isset($value_suiv))
										{
											$value = $lettre + 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$value_suiv</a>";
										}
								if (isset($value_precsuiv))
										{
											$value_prectest = $lettre - 1;
											$value_suivtest = $lettre + 1;
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_prectest&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>Précédent</a>";
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_suivtest&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>Suivant</a>";
										}
								echo "</td></tr>";
							}
						?>
						</table>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em">
<tr><td><div class="roundedcornr_box_511462">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_511462">
      </div>
   <div class="roundedcornr_bottom_511462"><div></div></div>
</div></td></tr>
</table>
						<?
						$test = "Interface/bas.php"; include($test);
						exit;
					}
				else if ($photo == "Les deux")
					{
					?>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
						<tr><td><img src="images/rapide_01.gif" border="0" alt="" /><a href="recherche.php"><img src="images/rapide_02.gif" border="0" alt="" /></a></td></tr>
						</table>
						<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="margin-right:0.8em;">
						
						<tr><td height="30" class=qst_profilTitre valign="middle" align="center" style="padding-top:1px;" colspan="5"><b>Voici le resultat de votre recherche : </b><? echo $enregistrement_total_sans_photo;?></td></tr>
						<tr class=qst_profilInfos><td height="20" valign="middle" style="padding-top:1px;border-left:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;" width="150" align="left"><b>&nbsp;&nbsp;Pseudo</b></td><td width="150" style="border-bottom:1px solid #A5B2C6;" align="left"><b>Age</b></td><td width="300" style="border-bottom:1px solid #A5B2C6;" align="left"><b>&nbsp;Ville</b></td><td width="200" style="border-bottom:1px solid #A5B2C6;" align="left"><b>Activité</b></td><td width="10" style="border-right:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;" align="left"><b>Photos</b></td></tr>
						<?
						while ($tmp = mysql_fetch_row($res))
								{
								$sql4 = "SELECT nom FROM photos_profil WHERE user_id='$tmp[3]' AND validation='2'";
									
									$res4 = mysql_query($sql4);
									$tmp4 = mysql_fetch_row($res4);
									$num_rows4 = mysql_num_rows($res4);
									if ($num_rows4 == 0)
									$phrase = "non";
									else
									$phrase = "oui";
									if ($tmp[6] == "42")
										{
											if ($tmp[5] == "Homme")
												$color_prem = "#C6DBFF";
											else
												$color_prem = "#FFE3D6";
										}
									else
										{
											$color_prem = "#f7f7f7";
										}
								$onclick = "window.open('auth_profil.php?id=$tmp[3]')";
								?>
						<tr bgcolor="<? echo $color_prem;?>" valign=middle height=20 align=center  style="cursor:pointer" onMouseOver="this.style.background='#DEE7F7'" onMouseOut="this.style.background='<? echo $color_prem;?>'" onclick="<? echo $onclick;?>">
								<?
									if ($tmp[5] == "Homme")
										$color = "#0061B5";
									else
										$color = "#FF7FAA";
									echo "<td width=150 class=recherche_bas align=left><font color=$color><b>$tmp[0]</b></font></td><td width=30 class=recherche_bas2 align=left><font color=$color><b>$tmp[1]</b></font></td><td width=300 class=recherche_bas2 align=left><font color=$color><b>$tmp[2]</b></font></td><td width=200 class=recherche_bas2 align=left><font color=$color><b>$tmp[4]</b></font><td width=10 style='border-bottom:1px solid #A5B2C6;border-right:1px solid #A5B2C6;' align=left><font color=$color><b>$phrase</b></font></td></tr>";
								}
						if ($enregistrement_total_sans_photo > 20)
							{
								echo "<tr bgcolor=#9CAAC6><td align=center colspan=5 height=20 valign=middle>";
								$i = 0;
								if ($lettre == $flag_arret_lettre)
									$value_prec = "Précédent";
								else if ($lettre == 0)
									$value_suiv = "Suivant";
								else
									$value_precsuiv = "Precedent .. Suivant";
								$flag_arret_lettre += 1;
								while ($i != $flag_arret_lettre)
									{
										if ($i == 0)
										{
										 echo "<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$i</a>";
										}
										else
										 echo " - <a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$i&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$i</a>";
										$i++;
									}
								if (isset($value_prec))
										{
											$value = $lettre - 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$value_prec</a>";
										}
								if (isset($value_suiv))
										{
											$value = $lettre + 1;
											echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>$value_suiv</a>";
										}
								if (isset($value_precsuiv))
										{
											$value_prectest = $lettre - 1;
											$value_suivtest = $lettre + 1;
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_prectest&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>Précédent</a>";
										echo "&nbsp;&nbsp;&nbsp;<a href='recherche.php?rech=1&nom=$nom&prenom=$prenom&pseudo=$pseudo&pays=$pays&ville=$ville&age_entre=$age_entre&age_sortie=$age_sortie&situation=$situation&sexe=$sexe&photo=$photo&lettre=$value_suivtest&nombre_enregistrement=$enregistrement_total_sans_photo' class=suiv_prec>Suivant</a>";
										}
								echo "</td></tr>";
							}
						?>
						
						</table>
						<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em">
<tr><td><div class="roundedcornr_box_511462">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_511462">
      </div>
   <div class="roundedcornr_bottom_511462"><div></div></div>
</div></td></tr>
</table>
						<?
						$test = "Interface/bas.php"; include($test);
						exit;
					}
					
			}
		//echo $sql;
	}
}
?>
<? // ------------------------------------ RECHERCHE PRINCIPAL AFFICHAGE ---------------------------- // ?>
<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td><img src="images/rechercherapide.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="margin-right:0.8em;">
<tr><td height="1"></td></tr>
<form name="subscribe_rech" action="recherche.php" method="get">
</table>

<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td height=20 class="espace_haut" width="120"></td><td valign="top" class="espace_haut"></td><td valign="top" class="espace_haut"></td></tr>
<tr><td class="espace_haut" align="center">Nom :</td><td class="espace_haut" align="left">
	 <?php
if (isset($tab_error['nom']))
{
echo '<input type="text" class="error" name="nom" size="20" maxlength="50"></td>';
echo "<td class='espace_haut' valign='top' align='center'><font style='color:#FF0000;'><em>".$tab_error['nom']."</em></td>";
}
else
{
if (isset($nom))
{
?>
<input type=text value="<? echo $nom; ?>" name=nom size=20 maxlength=50></td>
<?
echo '<td class="espace_haut" valign="top"><div id="nombox" size="20"></div></td>';
}
else
{
echo '<input type="text" name="nom" size="20" maxlength="50"></td>';
echo '<td class="espace_haut" valign="top"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">Prénom :</td><td class="espace_haut" align="left">
	  <?php
if (isset($tab_error['prenom']))
{
echo '<input type="text" class="error" name="prenom" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['prenom']."</em></td>";
}
else
{
if (isset($prenom))
{
?>
<input type=text value="<? echo $prenom ;?>" name=prenom size=20 maxlength=50></td>
<?
echo '<td valign="top" class="espace_haut"><div id="prenombox" size="20"></td>';
}
else
{
echo "<input type='text' name='prenom' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">Pseudo :</td><td class="espace_haut" align="left">
<?php
if (isset($tab_error["pseudo"]))
{
echo '<input type="text" class="error" name="pseudo" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['pseudo']."</em></td>";
}
else
{
if (isset($pseudo) && $pseudo != $user_pseudo)
{
?>
<input type=text value="<? echo $pseudo ;?>" name=pseudo size=20 maxlength=50></td>
<?
echo '<td valign="top" class="espace_haut"><div id="pseudobox" size="20"></td>';
}
else
{
echo "<input type='text' name='pseudo' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">Pays :</td><td class="espace_haut" align="left">
<select name="pays">
<option value="TOUS" SELECTED>TOUS</option>
<option value="AFRIQUE DU SUD"   >AFRIQUE DU SUD</option>
<option value="ALBANIE"   >ALBANIE</option>
<option value="ALGERIE"   >ALGERIE</option>
<option value="ALLEMAGNE"   >ALLEMAGNE</option>
<option value="ANDORRE"   >ANDORRE</option>
<option value="ARGENTINE"   >ARGENTINE</option>
<option value="ARMENIE"   >ARMENIE</option>
<option value="AUSTRALIE"   >AUSTRALIE</option>
<option value="AUTRICHE"   >AUTRICHE</option>
<option value="BAHAMAS"   >BAHAMAS</option>
<option value="BELGIQUE"   >BELGIQUE</option>
<option value="BIELORUSSIE"   >BIELORUSSIE</option>
<option value="BIRMANIE"   >BIRMANIE</option>
<option value="BOLIVIE"   >BOLIVIE</option>
<option value="BOSNIE HERZEGOVINE"   >BOSNIE HERZEGOVINE</option>
<option value="BRESIL"   >BRESIL</option>
<option value="BULGARIE"   >BULGARIE</option>
<option value="CAMBODGE"   >CAMBODGE</option>
<option value="CAMEROUN"   >CAMEROUN</option>
<option value="CANADA"   >CANADA</option>
<option value="CHILI"   >CHILI</option>
<option value="CHINE"   >CHINE</option>
<option value="CHYPRE"   >CHYPRE</option>
<option value="COLOMBIE"   >COLOMBIE</option>
<option value="CONGO"   >CONGO</option>
<option value="COREE DU NORD"   >COREE DU NORD</option>
<option value="COREE DU SUD"   >COREE DU SUD</option>
<option value="COSTA RICA"   >COSTA RICA</option>
<option value="COTE D IVOIRE"   >COTE D IVOIRE</option>
<option value="CROATIE"   >CROATIE</option>
<option value="CUBA"   >CUBA</option>
<option value="DANEMARK"   >DANEMARK</option>
<option value="EGYPTE"   >EGYPTE</option>
<option value="EMIRATS ARABES UNIS"   >EMIRATS ARABES UNIS</option>
<option value="EQUATEUR"   >EQUATEUR</option>
<option value="ESPAGNE"   >ESPAGNE</option>
<option value="ESTONIE"   >ESTONIE</option>
<option value="ETATS UNIS"   >ETATS UNIS</option>
<option value="ETHIOPIE"   >ETHIOPIE</option>
<option value="FIJI"   >FIJI</option>
<option value="FINLANDE"   >FINLANDE</option>
<option value="FRANCE">FRANCE</option>
<option value="GABON"   >GABON</option>
<option value="GHANA"   >GHANA</option>
<option value="GRECE"   >GRECE</option>
<option value="GUADELOUPE"   >GUADELOUPE</option>
<option value="GUATEMALA"   >GUATEMALA</option>
<option value="GUINEE"   >GUINEE</option>
<option value="GUYANE"   >GUYANE</option>
<option value="HAITI"   >HAITI</option>
<option value="HONGRIE"   >HONGRIE</option>
<option value="INDE"   >INDE</option>
<option value="INDONESIE"   >INDONESIE</option>
<option value="IRAK"   >IRAK</option>
<option value="IRAN"   >IRAN</option>
<option value="IRLANDE"   >IRLANDE</option>
<option value="ISLANDE"   >ISLANDE</option>
<option value="ISRAEL"   >ISRAEL</option>
<option value="ITALIE"   >ITALIE</option>
<option value="JAMAIQUE"   >JAMAIQUE</option>
<option value="JAPON"   >JAPON</option>
<option value="JORDANIE"   >JORDANIE</option>
<option value="KENYA"   >KENYA</option>
<option value="KOSOVO"   >KOSOVO</option>
<option value="KOWEIT"   >KOWEIT</option>
<option value="LAOS"   >LAOS</option>
<option value="LA REUNION"   >LA REUNION</option>
<option value="LETTONIE"   >LETTONIE</option>
<option value="LIBAN"   >LIBAN</option>
<option value="LIBERIA"   >LIBERIA</option>
<option value="LIBYE"   >LIBYE</option>
<option value="LITUANIE"   >LITUANIE</option>
<option value="LUXEMBOURG"   >LUXEMBOURG</option>
<option value="MADAGASCAR"   >MADAGASCAR</option>
<option value="MALAISIE"   >MALAISIE</option>
<option value="MALAWI"   >MALAWI</option>
<option value="MALDIVES"   >MALDIVES</option>
<option value="MALI"   >MALI</option>
<option value="MALTE"   >MALTE</option>
<option value="MAROC"   >MAROC</option>
<option value="MARTINIQUE"   >MARTINIQUE</option>
<option value="MAURICE"   >MAURICE</option>
<option value="MAURITANIE"   >MAURITANIE</option>
<option value="MAYOTTE"   >MAYOTTE</option>
<option value="MEXIQUE"   >MEXIQUE</option>
<option value="MICRONESIE"   >MICRONESIE</option>
<option value="MOLDAVIE"   >MOLDAVIE</option>
<option value="MONACO"   >MONACO</option>
<option value="NAMIBIE"   >NAMIBIE</option>
<option value="NICARAGUA"   >NICARAGUA</option>
<option value="NIGER"   >NIGER</option>
<option value="NIGERIA"   >NIGERIA</option>
<option value="NORVEGE"   >NORVEGE</option>
<option value="NOUVELLE CALEDONIE"   >NOUVELLE CALEDONIE</option>
<option value="NOUVELLE ZELANDE"   >NOUVELLE ZELANDE</option>
<option value="OMAN"   >OMAN</option>
<option value="OUGANDA"   >OUGANDA</option>
<option value="PAKISTAN"   >PAKISTAN</option>
<option value="PANAMA"   >PANAMA</option>
<option value="PAPOUASIE NOUVELLE GUINEE"   >PAPOUASIE NOUVELLE GUINEE</option>
<option value="PARAGUAY"   >PARAGUAY</option>
<option value="PAYS-BAS"   >PAYS-BAS</option>
<option value="PEROU"   >PEROU</option>
<option value="PHILIPPINES"   >PHILIPPINES</option>
<option value="POLOGNE"   >POLOGNE</option>
<option value="POLYNESIE FRANCAISE"   >POLYNESIE FRANCAISE</option>
<option value="PORTUGAL"   >PORTUGAL</option>
<option value="PUERTORICO"   >PUERTORICO</option>
<option value="REPUBLIQUE DOMINICAINE"   >REPUBLIQUE DOMINICAINE</option>
<option value="REPUBLIQUE TCHEQUE"   >REPUBLIQUE TCHEQUE</option>
<option value="ROUMANIE"   >ROUMANIE</option>
<option value="ROYAUME UNI"   >ROYAUME UNI</option>
<option value="RUSSIE"   >RUSSIE</option>
<option value="RWANDA"   >RWANDA</option>
<option value="SENEGAL"   >SENEGAL</option>
<option value="SERBIE"   >SERBIE</option>
<option value="SEYCHELLES"   >SEYCHELLES</option>
<option value="SINGAPOUR"   >SINGAPOUR</option>
<option value="SLOVAQUIE"   >SLOVAQUIE</option>
<option value="SLOVENIE"   >SLOVENIE</option>
<option value="SOMALIE"   >SOMALIE</option>
<option value="SOUDAN"   >SOUDAN</option>
<option value="SRILANKA"   >SRILANKA</option>
<option value="SUEDE"   >SUEDE</option>
<option value="SUISSE"   >SUISSE</option>
<option value="TAIWAN"   >TAIWAN</option>
<option value="TCHAD"   >TCHAD</option>
<option value="THAILANDE"   >THAILANDE</option>
<option value="TUNISIE"   >TUNISIE</option>
<option value="TURQUIE"   >TURQUIE</option>
<option value="UKRAINE"   >UKRAINE</option>
<option value="URUGUAY"   >URUGUAY</option>
<option value="VENEZUELA"   >VENEZUELA</option>
<option value="VIETNAM"   >VIETNAM</option>
<option value="YEMEN"   >YEMEN</option>
<option value="YOUGOSLAVIE"   >YOUGOSLAVIE</option>
<option value="ZAIRE"   >ZAIRE</option></select></td><td class="espace_haut"></td>
</tr>
<tr><td class="espace_haut" align="center">Ville :</td><td class="espace_haut" align="left">
<?php 
if (isset($tab_error['ville']))
{
echo '<input type="text" class="error" name="Ville" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['ville']."</em></td>";
}
else
{
if (isset($ville))
{
?>
<input type=text name=Ville value="<? echo $ville;?>" size=20 maxlength=50></td>
<?
echo '<td valign="top" class="espace_haut"></td>';
}
else
{
echo "<input type='text' name='Ville' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}

?></tr>
<tr><td class="espace_haut" align="center" valign="top">Age entre :</td><td class="espace_haut" align="left"><select name="age_entre">
<?php
$i = 7;
if (isset($age_entre))
$flag = 1;
else
$flag = 0;
while ($i != 95)
{
	if ($flag == 1 && $age_entre == $i)
		echo "<option SELECTED value=$i>$i</option>";
	else
		{
			if ($i == 16 && $flag != 1)
				echo "<option SELECTED value=$i>$i</option>";
			else
			echo "<option value=$i>$i</option>";
		}
	$i++;
}
?>
</select><font style="padding-left:10px;">et &nbsp;&nbsp;&nbsp;<select name="age_sortie">
<?php
$i = 7;
if (isset($age_sortie))
$flag = 1;
else
$flag = 0;
while ($i != 95)
{
	if ($flag == 1 && $age_sortie == $i)
		echo "<option SELECTED value=$i>$i</option>";
	else
		{
			if ($i == 50 && $flag != 1)
				echo "<option SELECTED value=$i>$i</option>";
			else
			echo "<option value=$i>$i</option>";
		}
	$i++;
}
?>
</select></font></td><td class="espace_haut"><? if(isset($tab_error["age"]))echo $tab_error["age"];?></td></tr>
 <tr><td class="espace_haut" align="center">Situation :</td><td class="espace_haut" align="left">
<select name="situation">
<option value="Tous" selected="selected">Tous</option>
<option value="Célibataire">Célibataire</option>
<option value="En Couple">En Couple</option>
<option value="Marié">Marié</option>
<option value="Divorcé">Divorcé</option>
<option value="Confidentiel">Confidentiel</option>
</select>
</td>
<? 
if (isset($tab_error['situation']))
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['situation']."</em></td>";
else
echo "<td class='espace_haut' align='center'>";
?>
</tr>
<tr><td class="espace_haut" align="center">Je recherche :</td><td class="espace_haut" align="left">
<select name="sexe">
<?
echo "<option value=Homme>Homme</option>";
	echo "<option value=Femme >Femme</option>";
	echo "<option value='Les deux' SELECTED>Les deux</option>";
?>
</select>
</td><td class="espace_haut"></td></tr>
<tr><td class="espace_haut" align="center">Photos :</td><td class="espace_haut" align="left">
<select name="photo">
<option value=oui>Oui</option>
<option value=non>Non</option>
<option value="Les deux" SELECTED>Les deux</option>
</select>
</td><td class="espace_haut"></td></tr>
<tr><td class="espace_haut" height=60 valign="center" colspan="3" align="center"><input type="submit" name="submit" value="Lancer la recherche" /></td></tr>
</form>
<table width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td><div class="roundedcornr_box_511462">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_511462">
      </div>
   <div class="roundedcornr_bottom_511462"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include ($test);?>
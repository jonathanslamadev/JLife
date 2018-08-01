<?php 
$test = "connect.inc.php"; include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
$test = "Interface/haut.php"; include($test);
$test = "funct/verif.js"; include($test);
?>
<?
if (isset($_POST["email"]))
{
{
	$email = $_POST["email"];
	if ($email == "")
	$tab_error['email'] = "E-mail obligatoire";
	else
	{
		$flag = verif_email($email);
		if ($flag == 4)
		$tab_error['email'] = "E-mail trop court";
		if ($flag == 3)
		$tab_error['email'] = "E-mail trop long";
		if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $email))
		$tab_error['email'] = "E-mail invalide";
		if ($flag == 2)
		$tab_error['email'] = "E-mail d&eacute;j&agrave; pris";
	}
}
if (isset($_POST["pass1"]))
{
	$pass1 = $_POST["pass1"];
	if ($pass1 == "")
	$tab_error['pass1'] = "Mot de passe obligatoire";
	else
	{
		$flag = verif_pass($pass1);
		if ($flag == 1)
		$tab_error['pass1'] = "Mot de passe invalide";
		if ($flag == 2)
		$tab_error['pass1'] = "Mot de passe trop court";
		if ($flag == 3)
		$tab_error['pass1'] = "Mot de passe trop long";
	}
}
if (isset($_POST["pass2"]))
{
	$pass2 = $_POST["pass2"];
	if ($pass2 == "")
	$tab_error['pass2'] = "Confirmation Obligatoire";
	else if ($pass1 != $pass2)
	$tab_error['pass2'] = "les mots de passe sont différents";
}
if (isset($_POST["sexe"]))
$sexe = $_POST["sexe"];
else
$tab_error['sexe'] = "Veuillez choisir votre sex.";
if (isset($_POST["nom"]))
{
	$nom = $_POST["nom"];
	if ($nom == "")
	$tab_error['nom'] = "Votre nom est obligatoire";
	else
	{
		$flag = verif_nom($nom);
		if ($flag == 3)
		$tab_error['nom'] = "Votre nom est trop long";
		if ($flag == 1)
		$tab_error['nom'] = "Caracteres non autorises < > *";
	}
}

if (isset($_POST["prenom"]))
{
	$prenom = $_POST["prenom"];
	if ($prenom == "")
	$tab_error['prenom'] = "Votre prenom est obligatoire";
	else
	{
		$flag = verif_nom($prenom);
		if ($flag == 3)
		$tab_error['prenom'] = "Votre prenom est trop long";
		if ($flag == 1)
		$tab_error['prenom'] = "Caracteres non autorises < > *";
	}
}
if (isset($_POST["pseudo"]))
{
	$pseudo = $_POST["pseudo"];
	if ($pseudo == "")
	$tab_error['pseudo'] = "Pseudo obligatoire";
	
	else
	{
		$flag = verif_pass($pseudo);
		if ($flag == 1)
		{
		$tab_error['pseudo'] = "Pseudo invalide";
		}
		else if (strlen($pseudo) < 2)
		{
		$tab_error['pseudo'] = "Pseudo trop court";
		}
		else if ($flag == 3)
		{
		$tab_error['pseudo'] = "Pseudo trop long";
		}
		else
			{
				$result = mysql_query("SELECT user_pseudo FROM user WHERE user_pseudo='$pseudo'");
				$my_num_rows = mysql_num_rows($result);
				if ($my_num_rows > 0)
						{
							$tab_error['pseudo'] = "Pseudo d&eacute;j&agrave; pris";
						}
			}
	}
}
if (isset($_POST["Adresse"]))
{
	$adresse = $_POST["Adresse"];
	if ($adresse != "")
	{
		$flag = verif_adresse($adresse);
		if ($flag == 3)
		$tab_error['adresse'] = "Votre adresse est trop longue";
		if ($flag == 1)
		$tab_error['adresse'] = "Caracteres non autorises < > *";
	}
}

if (isset($_POST["Codepostal"]))
{
	$Codepostal = $_POST["Codepostal"];
	if ($Codepostal != "")
	{
		$flag = verif_Codepostal($Codepostal);
		if ($flag == 3)
		$tab_error['Codepostal'] = "Votre code postal est trop court";
		if ($flag == 1)
		$tab_error['Codepostal'] = "Votre code postal est invalide";
	}
}
if (isset($_POST["pays"]))
{
	$pays = $_POST["pays"];
	if ($pays == "")
	$tab_error['pays'] = "Probleme pays";
}
if (isset($_POST["Ville"]))
{
	$ville = $_POST["Ville"];
	if ($ville == "")
	$tab_error['ville'] = "Votre ville est obligatoire";
	else
	{
		$flag = verif_ville($ville);
		if ($flag == 3)
		$tab_error['ville'] = "Nom de ville trop longue";
		if ($flag == 1)
		$tab_error['ville'] = "Caracteres non autorises < > *";
	}
}
if (isset($_POST["jour"]))
{
$jour = $_POST["jour"];
if ($jour == "")
$tab_error['jour'] = "FAKE JOUR";
}
if (isset($_POST["mois"]))
{
$mois = $_POST["mois"];
if ($mois == "")
$tab_error['mois'] = "FAKE mois";
}

if (isset($_POST["annee"]))
{
$annee = $_POST["annee"];
if ($annee == "")
$tab_error['annee'] = "FAKE annee";
}
if (isset($_POST["profession"]))
{
	$profession = $_POST["profession"];
	if ($profession == "Choisissez")
	$tab_error['profession'] = "Veuillez choisir une profession";
}

if (isset($_POST["situation"]))
{
	$situation = $_POST["situation"];
	if ($situation == "Choisissez")
	$tab_error['situation'] = "Veuillez choisir une situation";
}
if (isset($_POST["confirmation"]))
$confirmation = $_POST["confirmation"];
else
$tab_error['confirmation'] = "Vous devez confirmez";
if (isset($_POST["reglement"]))
$reglement = $_POST["reglement"];
else
$tab_error['reglement'] = "Vous devez accepter notre reglement";
if (isset($_POST["newsletter"]))
$newsletter = $_POST["newsletter"];
else
$newsletter = "0";
?>
<?
if (isset($tab_error))
{
}
else
{
$naissance = "";
$naissance .= $annee;
$naissance .= "-";
$naissance .= $mois;
$naissance .= "-";
$naissance .= $jour;

$test_age_youpi = $jour . '/' . $mois . '/'. $annee;
$age = Age($test_age_youpi);



//$jourtoday = date("d",time()); 
//$moistoday = date("m",time()); 
//$anneetoday = date("Y",time()); 
//if ($jourtoday >= $jour and $moistoday = $mois or $moistoday > $mois) 
//$age = $anneetoday - $annee; 
//else 
//$age = $anneetoday - $annee - 1; 

$code = "";
$letter = "abcdefghijklmnopqrstuvwxyz";
$letter .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$letter .= "0123456789";
for($cnt = 0; $cnt < 12; $cnt++)
{
$code .= $letter[rand(0, 61)];
}

$test = '<table cellpadding="0" cellspacing="0" width="900">
<tr><td height="30" valign=top>Bonjour '; $test .= $pseudo . ',</td></tr>
<tr><td>Votre inscription sur J Life a bien &eacute;t&eacute; valid&eacute;e. </td></tr>
<tr><td height=10></td></tr>
<tr><td>Bienvenue sur J Life , le site des retrouvailles et des rencontres de la communaut&eacute;, </td></tr>
<tr><td height="25" valign="bottom">Votre fiche a bien &eacute;t&eacute; cr&eacute;&eacute;e sur <b>J Life</b> mais elle n\'est pas encore visible par les autres membres</td></tr>
<tr><td height="25" valign="bottom">Pour la rendre visible et pour certifier que cette adresse e-mail est bien la vôtre, merci de ' . "<a href='http://www.jlife.fr/activation.php?code=" . $code . '\'><b>cliquer sur ce lien d\'activation</b></a><br>Copier et coller le lien si vous n\'arrivez pas a cliquer dessus http://www.jlife.fr/activation.php?code=' . $code . ' </td></tr>
<tr><td height="50" valign="bottom">Vous pouvez d&egrave;s maintenant ' . "<a href='http://www.jlife.fr/'>" . '<b>vous connecter sur votre espace</b></a> J Life et...</td></tr>
<tr><td height="25" valign="bottom"><b>-retrouver</b> vos anciens copains de classes, vos amours de vacances, des ami(e)s perdus de vue…</td></tr>
<tr><td height="25" valign="bottom"><b>-publier</b> vos photos d\'&eacute;coles, vacances, de mouvements de jeunesse, mariages, bar mitzvah…</td></tr>
<tr><td height="25" valign="bottom"><b>-enrichir</b> quand vous le souhaitez votre parcours avec de nouveaux &eacute;tablissements, de nouvelles destinations pass&eacute;es et ou &agrave; venir…</td></tr>
<tr><td height="25" valign="bottom"><b>-raconter</b> &agrave; vos anciens amis ce que vous êtes devenu(e) aujourd’hui.</td></tr>
<tr><td height="40" valign="bottom">.. Et profiter des nombreux services que vous propose J Life.</td></tr>
<tr><td height="40" valign="bottom">Un petit rappel (conservez cet email) :</td></tr>
<tr><td height="25" valign="bottom">Identifiant : <font color=#FF0000><b>' . $email . '</b></font></td></tr>
<tr><td height="25" valign="bottom">Mot de passe : <font color=#FF0000><b>' . $pass1 . '</b></font></td></tr>
<tr><td height="50" valign="bottom">Merci de votre confiance.</td></tr>
<tr><td height="50" valign="bottom">L’&eacute;quipe de J Life,</td></tr></table>';
$entete = 'MIME-Version: 1.0' . "\n";
$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$entete .= "From: JLife <contact@jlife.fr>" . "\n";
$entete .= "Reply-To: contact@jlife.fr" . "\n";
$nom = ucfirst(strtolower($nom));
$prenom = ucfirst(strtolower($prenom));
$ville = ucfirst(strtolower($ville));
$nom = addslashes($nom);
$prenom = addslashes($prenom);
$pseudo = addslashes($pseudo);
$ville = addslashes($ville);
$adresse = addslashes($adresse);
$profession = addslashes($profession);
$sql = "INSERT INTO user (user_mail, user_pass, user_nom, user_prenom, user_pseudo, user_sex, user_naissance, user_age, user_pays, user_ville, user_adresse, user_codepostal, user_job, user_situation, user_active, user_code, user_firsttime, user_newsletter, user_lastconnection)
VALUES ('".$email."', '".$pass1."', '".$nom."', '".$prenom."', '".$pseudo."', '".$sexe."', '".$naissance."','".$age."','".$pays."','".$ville."','".$adresse."','".$Codepostal."', '".$profession."', '".$situation."','0','".$code."', NOW(), '".$newsletter."', NOW())";
if (!(mail($email, "JLife - Inscription", $test, $entete)))
 {
	echo ('Erreur lors de l\'envoie du mail.<br>');
 }
else
{
$res = mysql_query($sql);
if (!$res)
{
echo "Erreur lors de la requete, ignorer le mail que vous allez recevoir.";
echo ('<a href="index.php"> Retour</a>');
}
else
{
if (isset($_POST["id_membre"]) && !empty($_POST["id_membre"]) && (func_number($_POST["id_membre"]) == 0) && !empty($_POST["code_membre"]))
{
	$code = $_POST["code_membre"];
	$id = $_POST["id_membre"];
	$code = mysql_real_escape_string($code);
}
if (!empty($code) && !empty($id))
{
$sql_user_id_new = "SELECT user_id FROM user WHERE user_mail='$email' AND user_pass='$pass1'";
$res_user_id_new = mysql_query($sql_user_id_new);
$tmp_user_id_new = mysql_fetch_row($res_user_id_new);
$sqlami1 = "SELECT user_amis FROM user WHERE user_id='$tmp_user_id_new[0]'";
$resami1 = mysql_query($sqlami1);
$tmpami1 = mysql_fetch_row($resami1);
$sqlami2 = "SELECT user_amis FROM user WHERE user_id='$id'";
$resami2 = mysql_query($sqlami2);
$tmpami2 = mysql_fetch_row($resami2);
$tableau_test_ami = explode('f', $tmpami1[0]);
for ($i = 0; $i != sizeof($tableau_test_ami); $i++)
	{
		if ($tableau_test_ami[$i] == $id)
			{
				$tab_error['amis'] = "C'est deja votre ami";
				break;
			}
	}
if (!isset($tab_error['amis']))
	{
		$final_res_ami1 = "";
		$final_res_ami2 = "";
		$final_res_ami1 .= $tmpami1[0] . "f" . "$id";
		$final_res_ami2 .= $tmpami2[0] . "f" . "$tmp_user_id_new[0]";
		$sql_upd_ami1 = "UPDATE user SET user_amis='$final_res_ami1' WHERE user_id='$tmp_user_id_new[0]'";
		$sql_upd_ami2 = "UPDATE user SET user_amis='$final_res_ami2' WHERE user_id='$id'";
		mysql_query($sql_upd_ami1); mysql_query($sql_upd_ami2);
	}
}
?>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td>
<div class="roundedcornr_box_142272">
   <div class="roundedcornr_top_142272">
   <div></div>
   </div>
      <div class="roundedcornr_content_142272" align="center"><font style="color:#636563; font-size:20px"><b><? 
	  	echo "<br> <br> Inscription r&eacute;alis&eacute;e avec succ&egrave;s! <br> Bienvenue ".$prenom." ".$nom.". <br> Un mail de confirmation vous a &eacute;t&eacute; envoy&eacute;";
		echo ' &agrave; l\'adresse '.$email.' <br>Veuillez activer votre compte<br><br>';
?>
</b></font>
      </div>
      <div class="roundedcornr_bottom_142272"><div></div></div>
</div>
</td></tr>
</table>
<?
$test = "Interface/bas.php";
include ("$test");
exit;

}
}
}
}
?>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<form name="subscribe" action="inscription.php" method="post">
<tr><td><img src="images/inscription.gif" border="0" alt="" /></td></tr>
</table>
<?
if (isset($_POST["id_membre"]) && !empty($_POST["id_membre"]) && (func_number($_POST["id_membre"]) == 0) && !empty($_POST["code_membre"]))
{
	$code = $_POST["code_membre"];
	$id = $_POST["id_membre"];
	$code = mysql_real_escape_string($code);
}


if (isset($_GET["id"]) && !empty($_GET["id"]) && (func_number($_GET["id"]) == 0) && !empty($_GET["code"]))
{
	$code = $_GET["code"];
	$id = $_GET["id"];
	$code = mysql_real_escape_string($code);
}

	if (!empty($code) && !empty($id))
		{
			$sql_check_parrain = "SELECT user_pseudo, user_sex FROM user WHERE user_id='$id' AND user_code='$code'";
			$res_check_parrain = mysql_query($sql_check_parrain);
			$num_rows_parrain = mysql_num_rows($res_check_parrain);
			if ($num_rows_parrain > 0)
				{
					$tmp_check_parrain = mysql_fetch_row($res_check_parrain);
					$tmp_check_parrain[0] = stripslashes($tmp_check_parrain[0]);
					$sql_ami_photo = "SELECT nom, commentaire, validation FROM photos_profil WHERE user_id='$id'";
				$res_ami_photo = mysql_query($sql_ami_photo);
				$num_photos = mysql_num_rows($res_ami_photo);
				$tmp_photo = mysql_fetch_row($res_ami_photo);
				$tmp_photo[0] = stripslashes($tmp_photo[0]);
				if ($tmp_check_parrain[1] == "Homme")
					$color_sex = "#0061B5";
					else
					$color_sex = "#FF7FAA";
				if ($num_photos == '0' && $tmp_check_parrain[1] == "Homme")
					$chemin = "picts/nophotoG_ami.gif";
				else if ($num_photos == '0' && $tmp_check_parrain[1] == "Femme")
					$chemin = "picts/nophotoF_ami.gif";
				else
					{
				if ($tmp_photo[2] == "1")
					{
						if ($tmp_ami[2] == "Homme")
							$chemin = "picts/validationG_ami.gif";
						else
							$chemin = "picts/validationF_ami.gif";
					}
				else 
					{
					$chemin = "vignette_ami/" . $tmp_photo[0];
					if (!file_exists($chemin))
						creation_vignette($tmp_photo[0], 150, 135, "photos_profil/", "vignette_ami/", "");
					}
			}
	?>
	<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;" bgcolor="#f7f7f7">
	<tr><td height="5"></td></tr>
	<tr><td width="30"></td><td valign="top" width="120" style="border-top:1px solid #A5B2C6;border-left:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;"><img src="<? echo $chemin;?>" alt=""></td><td align="left" style="border-top:1px solid #A5B2C6;border-right:1px solid #A5B2C6;border-bottom:1px solid #A5B2C6;" valign="top"><? echo "<a href='http://www.jlife.fr/visite_fiche.php?id=$id' target='_blank'><font color=$color_sex size=+1><b>&nbsp;$tmp_check_parrain[0]</b></font></a>";?> <b>est membre de JLife et aimerait que tu l'y rejoignes.
L’inscription est gratuite et quelques secondes suffisent pour s’inscrire.</b></td></tr>
	</table>
	<?
		echo "<input type='hidden' name='id_membre' value='$id'/>";
		echo "<input type='hidden' name='code_membre' value='$code'/>";
		}
}
if (!isset($_POST["email"]) && !isset($_GET["email"]))
{
	$email = "";
}
?>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td height=20 class="espace_haut"></td><td valign="top" class="espace_haut"></td><td valign="top" class="espace_haut"></td></tr>
<tr><td class="espace_haut" align="center">*E-mail :</td><td class="espace_haut" align="left">
<?
if (isset($tab_error['email']))
{
	echo '<input type="text" name="email" size="20" class=error maxlenght="25"/></td>';
	echo "<td align=center class='espace_haut'><font style='color:#FF0000;'> <em>".$tab_error['email']."</em></td> ";
}
else
	{
		if (isset($email))
		{
		echo "<input type='text' value='$email' name='email' size='20' maxlenght='25' class=good></td>";
		echo '<td align=center valign="top" class="espace_haut"></td>';
		}
		else{?>
		<input type="text" name="email" size="20" maxlenght="25"/>
		</td><td align=center valign="top" class="espace_haut"></td>
		<? }
}
?>
<tr><td class="espace_haut" align="center">*Mot de Passe :</td><td class="espace_haut" align="left">
<?php
if (isset($tab_error['pass1']))
{
echo '<input type="password" name="pass1" class="error" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'> <em>".$tab_error['pass1']."</em></td>";
}
else
{
if (isset($pass1))
{
echo "<input type='password' name='pass1' value='$pass1' size='20' maxlength='50' class=good></td>";
echo '<td valign="top" class="espace_haut">&nbsp;</td>';
}
else
{
echo '<input type="password" name="pass1" size="20" maxlength="50"></td>';
echo '<td valign="top" class="espace_haut">&nbsp;</td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">*Confirmation :</td><td class="espace_haut" align="left">
	<?php
if (isset($tab_error['pass2']))
{
echo '<input type="password" name="pass2" class="error" size="20" maxlength="50" ></td>';
echo "<td class='espace_haut' valign='top' align='center'><font style='color:#FF0000;'><em>".$tab_error['pass2']."</em></td>";
}
else
{
if (isset($pass2))
{
echo "<input type='password' name='pass2' value='$pass2' size='20' maxlength='50' class=good></td>";
echo '<td valign="top" class="espace_haut"><div id="pass2box" size="25"></div></td>';
}
else
{
echo '<input type="password" name="pass2" size="20" maxlength="50"></td>';
echo '<td valign="top" class="espace_haut"><div id="pass2box" size="25"></div></td>';
}
}
?>
</tr>
<tr><td class="espace_haut" align="center">*Je suis :</td><td class="espace_haut" align="left">
  <?php
if (isset($tab_error['sexe']))
{
echo '<input type="radio" name="sexe" value="Homme" id="radio1" class="nobordercolor1"/> <label for="radio1">Homme</label>&nbsp;<input type="radio" name="sexe" value="Femme" id="radio2" class="nobordercolor1"/> <label for="radio2">Femme</label></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['sexe']."</em></td>";
}
else
{
if (isset($sexe))
{
	if ($sexe == "Homme")
		{
			echo '<input type="radio" name="sexe" checked value="Homme" id="radio1" class="nobordercolor1"/> <label for="radio1">Homme</label>&nbsp;<input type="radio" name="sexe" value="Femme" id="radio2" class="nobordercolor1"/> <label for="radio2">Femme</label></td><td valign="top" class="espace_haut"></td>';
		}
	if ($sexe == "Femme")
		{
			echo '<input type="radio" name="sexe" value="Homme" id="radio1" class="nobordercolor1"/> <label for="radio1">Homme</label>&nbsp;<input type="radio" name="sexe" checked value="Femme" id="radio2" class="nobordercolor1"/> <label for="radio2">Femme</label></td><td valign="top" class="espace_haut"></td>';
		}
}
else
{
echo '<input type="radio" name="sexe" value="Homme" id="radio1" class="nobordercolor1"/> <label for="radio1">Homme</label>&nbsp;<input type="radio" name="sexe" value="Femme" id="radio2" class="nobordercolor1"/> <label for="radio2">Femme</label></td><td valign="top" class="espace_haut"></td>';
}
}
?>
</tr>
<tr><td class="espace_haut" align="center">*Nom :</td><td class="espace_haut" align="left">
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
echo "<input type=text value=\"$nom\" name=nom size=20 maxlength=50 class=good></td>";
echo '<td class="espace_haut" valign="top"><div id="nombox" size="20"></div></td>';
}
else
{
echo '<input type="text" name="nom" size="20" maxlength="50"></td>';
echo '<td class="espace_haut" valign="top"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">*Pr&eacute;nom :</td><td class="espace_haut" align="left">
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
echo "<input type=text value=\"$prenom\" name=prenom size=20 maxlength=50 class=good></td>";
echo '<td valign="top" class="espace_haut"><div id="prenombox" size="20"></td>';
}
else
{
echo "<input type='text' name='prenom' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">*Pseudo :</td><td class="espace_haut" align="left">
<?php
if (isset($tab_error["pseudo"]))
{
echo '<input type="text" class="error" name="pseudo" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['pseudo']."</em></td>";
}
else
{
if (isset($pseudo))
{
echo "<input type=text value=\"$pseudo\" name=pseudo size=20 maxlength=50 class=good></td>";
echo '<td valign="top" class="espace_haut"><div id="pseudobox" size="20"></td>';
}
else
{
echo "<input type='text' name='pseudo' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">Adresse :</td><td class="espace_haut" align="left">
<?php
if (isset($tab_error['adresse']))
{
echo '<input type="text" name="Adresse" class="error" size="20" maxlength="50"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['adresse']."</em></td>";
}
else
{
if (isset($adresse))
{
echo "<input type=text name=Adresse value=\"$adresse\" size=20 maxlength=50></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
else
{
echo "<input type='text' name='Adresse' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="center">Code Postal :</td><td class="espace_haut" align="left">
<?php
if (isset($tab_error['Codepostal']))
{	  
echo '<input type="text" name="Codepostal" class="error" size="3" maxlength="5"></td>';
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['Codepostal']."</em></td>";
}
else
{
if (isset($Codepostal))
{
echo "<input type='text' name='Codepostal' size='3' maxlength='5' value='$Codepostal'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
else
{
echo "<input type='text' name='Codepostal' size='3' maxlength='5'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}
	?>
<tr><td class="espace_haut" align="center">*Pays :</td><td class="espace_haut" align="left">
<select name="pays">
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
<option value="FRANCE" SELECTED  >FRANCE</option>
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
<tr><td class="espace_haut" align="center">*Ville :</td><td class="espace_haut" align="left">
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
echo "<input type=text name=Ville value=\"$ville\" size=20 maxlength=50 class=good></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
else
{
echo "<input type='text' name='Ville' size='20' maxlength='50'></td>";
echo '<td valign="top" class="espace_haut"></td>';
}
}

?></tr>
<tr><td class="espace_haut" align="center">*Date de naissance :</td><td class="espace_haut" align="left">
<select name="jour">
 <?php
$i = 0;
$tab[0] = "01";
$tab[1] = "02";
$tab[2] = "03";
$tab[3] = "04";
$tab[4] = "05";
$tab[5] = "06";
$tab[6] = "07";
$tab[7] = "08";
$tab[8] = "09";
$tab[9] = "10";
$tab[10] = "11";
$tab[11] = "12";
$tab[12] = "13";
$tab[13] = "14";
$tab[14] = "15";
$tab[15] = "16";
$tab[16] = "17";
$tab[17] = "18";
$tab[18] = "19";
$tab[19] = "20";
$tab[20] = "21";
$tab[21] = "22";
$tab[22] = "23";
$tab[23] = "24";
$tab[24] = "25";
$tab[25] = "26";
$tab[26] = "27";
$tab[27] = "28";
$tab[28] = "29";
$tab[29] = "30";
$tab[30] = "31";
if (isset($jour))
$flag = 1;
else
$flag = 0;
while ($i != 31)
{
	if ($flag == 1 && $jour == $tab[$i])
		echo "<option SELECTED value=$tab[$i]>$tab[$i]</option>";
	else
		echo "<option value=$tab[$i]>$tab[$i]</option>";
	$i++;
}
?>
</select>
<select name="mois">
<?
$tab_value[0] = "01";  $tab[0] = "Janvier";
$tab_value[1] = "02";  $tab[1] = "F&eacute;vrier";
$tab_value[2] = "03";  $tab[2] = "Mars";
$tab_value[3] = "04";  $tab[3] = "Avril";
$tab_value[4] = "05";  $tab[4] = "Mai";
$tab_value[5] = "06";  $tab[5] = "Juin";
$tab_value[6] = "07";  $tab[6] = "Juillet";
$tab_value[7] = "08";  $tab[7] = "Août";
$tab_value[8] = "09";  $tab[8] = "Septembre";
$tab_value[9] = "10";  $tab[9] = "Octobre";
$tab_value[10] = "11"; $tab[10] = "Novembre";
$tab_value[11] = "12"; $tab[11] = "D&eacute;cembre";
$i = 0;
if (isset($mois))
$flag = 1;
else
$flag = 0;
while ($i != 12)
{
	if ($flag == 1 && $mois == $tab_value[$i])
		echo "<option SELECTED value='$tab_value[$i]'>$tab[$i]</option>";
	else
		echo "<option value='$tab_value[$i]'>$tab[$i]</option>";
	$i++;
}
?>
 </select>
 <select name="annee">
 <?
 if (!isset($annee))
 	$annee = 1980;
for ($i = 1920; $i != 2011; $i++)
{
if ($i == $annee)
echo "<option selected value='$i'>$i</option>";
else
echo "<option value='$i'>$i</option>";
}
 ?>
 </select>
 </td><td class="espace_haut"></td>
 </tr>
 <tr><td class="espace_haut" align="center">*Activit&eacute; :</td><td class="espace_haut" align="left">
	<select name="profession">
<option value="Choisissez" selected="selected">Choisissez</option>
<?
$tab[0] = "Je le garde pour moi";
$tab[1] = "Acteur";
$tab[2] = "Agent d’assurance";
$tab[3] = "Agent de voyage";
$tab[4] = "Agent hospitalier";
$tab[5] = "Agent immobilier";
$tab[6] = "Artiste peintre";
$tab[7] = "Assistant social";
$tab[8] = "Assistante/Secr&eacute;taire";
$tab[9] = "Avocat";
$tab[10] = "Cadre administratif";
$tab[11] = "Cadre bancaire";
$tab[12] = "Cadre commercial";
$tab[13] = "Cadre finance";
$tab[14] = "Cadre RH";
$tab[15] = "Chasseur de têtes";
$tab[16] = "Coiffeur";
$tab[17] = "Commerçant";
$tab[18] = "Comptable";
$tab[19] = "Consultant";
$tab[20] = "Cuisinier";
$tab[21] = "Dentiste";
$tab[22] = "Dirigeant/Cadre sup&eacute;rieur";
$tab[23] = "Ecrivain";
$tab[24] = "Editeur";
$tab[25] = "Employ&eacute; service client";
$tab[26] = "Enseignant";
$tab[27] = "Esth&eacute;ticienne";
$tab[28] = "Etudiant";
$tab[29] = "Fleuriste";
$tab[30] = "Fonctionnaire";
$tab[31] = "Graphiste";
$tab[32] = "Infirmier";
$tab[33] = "Ing&eacute;nieur";
$tab[34] = "Ing&eacute;nieur informatique";
$tab[35] = "Journaliste";
$tab[36] = "Juriste";
$tab[37] = "Kin&eacute;sith&eacute;rapeute";
$tab[38] = "M&eacute;decin";
$tab[39] = "Militaire";
$tab[40] = "Musicien";
$tab[41] = "Ouvrier";
$tab[42] = "Personnel a&eacute;rien naviguant";
$tab[43] = "Policier";
$tab[44] = "Pompier";
$tab[45] = "Publicitaire";
$tab[46] = "Restaurateur";
$tab[47] = "Retrait&eacute;";
$tab[48] = "Sans emploi";
$tab[49] = "Serveur";
$tab[50] = "Sportif";
$tab[51] = "Technicien";
$tab[52] = "Autres";
$i = 0;
if (isset($profession) && $profession != "choisissez")
$flag = 1;
else
$flag = 0;
while ($i != 53)
{
	if ($flag == 1 && $profession == $tab[$i])
		echo "<option SELECTED value='$tab[$i]'>$tab[$i]</option>";
	else
		echo "<option value='$tab[$i]'>$tab[$i]</option>";
	$i++;

}
?>
</select></td>
<? 
if (isset($tab_error['profession']))
echo "<td class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['profession']."</em></td>";
else
echo "<td class='espace_haut' align='center'>";
?>
</tr>
 <tr><td class="espace_haut" align="center">*Situation :</td><td class="espace_haut" align="left">
<select name="situation">
<option value="Choisissez" selected="selected">Choisissez</option>
<?
$tab[0] = "C&eacute;libataire";
$tab[1] = "En Couple";
$tab[2] = "Mari&eacute;";
$tab[3] = "Divorc&eacute;";
$tab[4] = "Confidentiel";
$i = 0;
if (isset($situation) && $situation != "choisissez")
$flag = 1;
else
$flag = 0;
while ($i != 5)
{
	if ($flag == 1 && $situation == $tab[$i])
		echo "<option SELECTED value='$tab[$i]'>$tab[$i]</option>";
	else
		echo "<option value='$tab[$i]'>$tab[$i]</option>";
	$i++;

}
?>
</select>
</td>
<? 
if (isset($tab_error['situation']))
echo "<td valign='top' class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['situation']."</em></td>";
else
echo "<td class='espace_haut' align='center'>";
?>
<td height="40" valign="top"></td>
</tr>
 <tr><td class="espace_haut" align="center"></td><td class="espace_haut" align="left">
<?php
if (isset($tab_error['confirmation']))
{
echo "<INPUT type='checkbox' name='confirmation' value='1' class='nobordercolor1'>Je confirme que les donn&eacute;es fournies sont exactes</td><td class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['confirmation']."</em></td>";
}
else
{
echo '<INPUT type="checkbox" name="confirmation" value="1" class="nobordercolor1">Je confirme que les donn&eacute;es fournies sont exactes</td><td class="espace_haut" valign="top"></td>';
}
?>
  </tr>
 <tr><td class="espace_haut" align="center"></td><td class="espace_haut" align="left">
<?php
if (isset($tab_error['reglement']))
{
echo "<INPUT type='checkbox' name='reglement' value='2' class='nobordercolor1'>J'ai lu le <a href='http://www.jlife.fr/condition_gen.php' target='_blank' class='jaimegrave'><b>r&eacute;glement</b></a> en entier et je l'accepte</td><td class='espace_haut' align='center'><font style='color:#FF0000;'><em>".$tab_error['reglement']."</em></div></td>";
}
else
{
echo "<INPUT type='checkbox' name='reglement' value='2' class='nobordercolor1'>J'ai lu le <a href='http://www.jlife.fr/condition_gen.php' target='_blank' class='jaimegrave'><b>r&eacute;glement</b></a> en entier et je l'accepte</td><td class='espace_haut'></td>";
}
?>
  </tr>
 <tr></td><td class="espace_haut" align="center">
<td class="espace_haut" align="left"><INPUT type=checkbox CHECKED name='newsletter' value='1' class="nobordercolor1">Je veux recevoir la newsletter</td><td class="espace_haut">
  </tr>
  <tr><td height=10 class="espace_haut"></td>
<td class="espace_haut" align="left" height=60 valign="center"><input type="submit" name="submit" value="Valider mon inscription" /></td><td height=10 class="espace_haut"></td></tr>
</form>
</table>
<? $test = "Interface/bas.php"; include($test) ?>;
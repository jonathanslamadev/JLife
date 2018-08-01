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
$sql_oui = "SELECT user_nom, user_prenom, user_code, user_pseudo, user_sex FROM user WHERE user_id='$user_id'";
$res_oui = mysql_query($sql_oui);
$tmp_oui = mysql_fetch_row($res_oui);
$nom = $tmp_oui[1] . " ". $tmp_oui[0];
$user_code = $tmp_oui[2];
if ($tmp_oui[4] == "Homme")
$color_sex = "#0061B5";
else
$color_sex = "#FF7FAA";
if (isset($_GET["nom"]))
{
	$nom = $_GET["nom"];
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
if (isset($_GET["personnalite"]))
	{
			$personnalite = $_GET["personnalite"];
			if (empty($personnalite))
				$tab_error["personnalite"] = "Veuillez rentrer au moins une adresse e-mail";
			else
				{
					$flag_test = test_questionnaire_detail($personnalite, 10000000000);
					if ($flag_test == 1)
					$tab_error["personnalite"] = "Le texte saisie est trop long. Veillez à respecter le nombre de caractères établi.";
					else if ($flag_test == 2)
						$tab_error["personnalite"] = "Les caractères < > \\ / ' \" sont interdits!";
					else
						$tab_email = explode(',', $personnalite);
				}
	}
if (isset($_GET["message"]))
	{
			$message = $_GET["message"];
			$message = stripslashes($message);
			$flag_test = test_questionnaire_detail($message, 10000000000);
			if ($flag_test == 1)
			$tab_error["message"] = "Le texte saisie est trop long. Veillez à respecter le nombre de caractères établi.";
			else if ($flag_test == 2)
				$tab_error["message"] = "Les caractères < > sont interdits!";
	}
}
if (!isset($tab_error) && isset($personnalite))
	{
		$test = '<table cellpadding="0" cellspacing="0" width="900">
<tr><td height="30" valign=top>Bonjour ,</td></tr>
<tr><td>' . $nom . ' vous invite à découvrir J Life, le nouveau site de rencontres et de retrouvailles de la communauté juive.</td></tr>
<tr><td>J Life vous propose de replonger dans le passé, de vivre le présent et de dessiner votre futur en couleurs...</td></tr>
<tr><td height="25" valign="bottom">A travers vos parcours, vous pourrez reprendre contact avec des personnes perdues de vue et découvrir celles qui partageront votre avenir. J Life vous permet de créer ou d’adhérer à des groupes qui correspondent à votre expérience, à votre vie actuelle ou à vos projets...</td></tr>
<tr><td height="10" valign="bottom"></td></tr>
<tr><td height="25" valign="bottom">Retrouvez et rencontrez vos ami(e)s ou votre âme sœur à travers trois univers : <font color=#00CF00><b>écoles</b></font>, <font color=#FF9E00><b>vacances</b></font> et <font color=#299AD6><b>vie communautaire</b></font>. Partagez vos souvenirs et vos envies, faites évoluer votre réseau d’amis, publiez vos photos, déposez des commentaires ou encore envoyez des messages aux autres membres...</td></tr>
<tr><td height="25" valign="bottom">On rêve tous de retrouver un regard croisé sur la plage, dans les couloirs de l’école ou à un mariage… Et qui n’a jamais souhaité voir à l’avance les personnes qui partageront sa future destination de vacances, sa prochaine année scolaire ou sa nouvelle synagogue... C’est maintenant possible avec J Life...<br><br>Découvrez sans plus tarder tous les services de J Life.</td></tr>
<tr><td height="35" valign="bottom" align=center><b>L’INSCRIPTION EST GRATUITE et ne prend que quelques minutes ! </b></td></tr>
<tr><td align=center>' . "<a href='http://www.jlife.fr/inscription.php?id=$user_id&code=$user_code'>" . '<b>Je m\'inscris</b></a></td></tr>';
$test .= '<tr><td height="25" valign="bottom">A bientôt,</td></tr>
<tr><td height="25" valign="bottom">L’équipe de J Life</td></tr>
<tr><td height="25" valign="bottom">Message de ' . "<font color=$color_sex><b>$tmp_oui[3]</b></font>". '</b> : ' . $message . '</td></tr>
</table>';
$entete = 'MIME-Version: 1.0' . "\n";
$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$entete .= "From: JLife <contact@jlife.fr>" . "\n";
$entete .= "Reply-To: contact@jlife.fr" . "\n";
$objet = $nom . " vous invite à découvrir J Life";
$message_good = "";
$message_false = "";

for ($i = 0; $i != sizeof($tab_email); $i++)
	{
		if (!(@mail($tab_email[$i], $objet, $test, $entete)))
			{
				if (empty($message_false))
					$message_false .= $tab_email[$i];
				else
					$message_false .= ", " . $tab_email[$i];
			}
		else
			{
				if (empty($message_good))
					$message_good .= $tab_email[$i];
				else
					$message_good .= ", " . $tab_email[$i];
			}
	}
}
?>

<table width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/inviter_ami.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" border="0" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<form name="subscribe" action="inviter_amis.php" method="get">
<tr><td height="15"></td></tr>
<tr><td width="10"></td><td align="justify"><font face="Arial Rounded MT Bold" style="color:#636563;font-size:18px;">Remplissez ce formulaire pour inviter vos amis à vous rejoindre et à découvrir J Life. 
</font></td><td width="10"></td></tr>
</table>
<?
if (!empty($message_good))
	{
		echo "<table width='670' border='0' cellpadding='0' cellspacing='0' bgcolor='#f7f7f7'>";
		echo "<tr><td height=10></td></tr>";
		echo "<tr><td align=center><font color=#8CBE4A><b>Le message d’invitation a bien été envoyé à vos amis : 
 $message_good</b></td></tr>";
		echo "</table>";
	}
if (!empty($message_false))
	{
		echo "<table width='670' border='0' cellpadding='0' cellspacing='0' bgcolor='#f7f7f7'>";
		echo "<tr><td height=10></td></tr>";
		echo "<tr><td align=center><font color=#FF0000><b>Le message d’invitation n'a pas été envoyé à vos amis : 
 $message_false</b></td></tr>";
 		$personnalite = $message_false;
		echo "</table>";
	}
?>
<table width="670" border="0" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td class="espace_haut" align="right">Votre nom :</td><td class="espace_haut" align="left">
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
echo "<input type=text value=\"$nom\" name=nom size=20 maxlength=50 class=good READONLY></td>";
echo '<td class="espace_haut" valign="top"><div id="nombox" size="20"></div></td>';
}
else
{
echo '<input type="text" name="nom" size="20" maxlength="50"></td>';
echo '<td class="espace_haut" valign="top"></td>';
}
}
?></tr>
<tr><td class="espace_haut" align="right" valign="top">Adresse E-mail de vos amis : <br /><em>(Séparées  par des virgules)</em></td><td class="espace_haut" align="left">
<?php
if (isset($tab_error["personnalite"]))
{
	echo "<textarea id=personnalite name=personnalite rows=2 cols=30 class='error'></textarea>";
}
else if (isset($personnalite))
{
	
	echo "<textarea id=personnalite name=personnalite rows=2 cols=30>$personnalite</textarea>";
}
else
	echo "<textarea id=personnalite name=personnalite rows=2 cols=30></textarea>";
?>
</td></tr>
<tr><td class="espace_haut" align="right" valign="top">Votre message : <br /><em>(Facultatif)</em></td><td class="espace_haut" align="left">
<?php
if (isset($tab_error["message"]))
{
	echo "<textarea id=message name=message rows=5 cols=30 class='error'></textarea>";
}
else if (isset($message))
{
	$message = stripslashes($message);
	echo "<textarea id=message name=message rows=5 cols=30>$message</textarea>";
}
else
	echo "<textarea id=message name=message rows=5 cols=30></textarea>";
?>
</td></tr>
<tr height="70" valign="middle"><td class=espace_haut align="center" colspan="2"><input type="submit" name="inviter_amis" value="Validez"></td></tr>
</form>
</table>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include($test);?>
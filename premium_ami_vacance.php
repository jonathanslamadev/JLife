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
	if ($_SESSION["user_premium"] != "42")
		echo '<meta http-equiv="refresh" content="0; url=fiche_perso.php" />';
	$user_id = $_SESSION['user_id'];
}
?>
<?php 
$test = "connect.inc.php"; 
include($test);
$test = "Interface/haut_gauche.php"; 
include($test);
?>

<?php
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
?>
<body onLoad="document.prev_ami.sujet_prev.focus()">
<?
if (!empty($_POST["salut"]))
{
	$nom_vac = $_POST["nom_vac"];
	$spec = $_POST["spec"];
	$id_ami_envoi = $_POST["amis"];
	if (isset($_POST["sujet_prev"]))
		{
			$sujet_prev = $_POST["sujet_prev"];
			$flag_test = test_questionnaire_detail($sujet_prev, 250);
			if ($flag_test == 1)
			$tab_error["sujet_prev"] = "Le texte saisie est trop long.";
			else if ($flag_test == 2)
				$tab_error["sujet_prev"] = "Les caractères < >" . " sont interdits!";
		}
	else
		$sujet_prev = "";
	if (func_number($id_ami_envoi) == 0)
		{
			$result = mysql_query("SELECT user_pseudo, user_id, user_sex, user_premium, user_mail FROM user WHERE user_id='$id_ami_envoi'");
			if (mysql_num_rows($result) == 1)
				{
					$tmp_amiiii = mysql_fetch_row($result);
					$myNewMessage = "<form name='modif_vac_parcours' action='fiche_vacance.php#en_bas' method='post'>" . "<b>Date d'entrée : </b>" . '<select name="mois_entree" class="select_form">';
					$tab_value[0] = "01";  $tab[0] = "Janvier";
					$tab_value[1] = "02";  $tab[1] = "Février";
					$tab_value[2] = "03";  $tab[2] = "Mars";
					$tab_value[3] = "04";  $tab[3] = "Avril";
					$tab_value[4] = "05";  $tab[4] = "Mai";
					$tab_value[5] = "06";  $tab[5] = "Juin";
					$tab_value[6] = "07";  $tab[6] = "Juillet";
					$tab_value[7] = "08";  $tab[7] = "Août";
					$tab_value[8] = "09";  $tab[8] = "Septembre";
					$tab_value[9] = "10";  $tab[9] = "Octobre";
					$tab_value[10] = "11"; $tab[10] = "Novembrer";
					$tab_value[11] = "12"; $tab[11] = "Décembre";
					$i = 0;
					$flag = 0;
					while ($i != 12)
					{
						if ($flag == 0 && $tab[$i] == "Septembre")
							$myNewMessage .= "<option SELECTED value='$tab_value[$i]'>$tab[$i]</option>";
						else
							$myNewMessage .= "<option value='$tab_value[$i]'>$tab[$i]</option>";
						$i++;
					}
					$myNewMessage .= "</select>&nbsp;&nbsp;<select name='annee_entree' class='select_form'>";
					for ($i = 1920; $i != 2010; $i++)
					{
						if ($i == 1995 && $flag == 0)
							$myNewMessage .= "<option selected value='$i'>$i</option>";
						else
						$myNewMessage .= "<option value='$i'>$i</option>";
					}
					$myNewMessage .= "</select><br><br>";
					$myNewMessage .= "<b>Date de sortie : </b>"; 
					$myNewMessage .= '<select name="mois_sortie" class="select_form">';
					$tab_value[0] = "01";  $tab[0] = "Janvier";
					$tab_value[1] = "02";  $tab[1] = "Février";
					$tab_value[2] = "03";  $tab[2] = "Mars";
					$tab_value[3] = "04";  $tab[3] = "Avril";
					$tab_value[4] = "05";  $tab[4] = "Mai";
					$tab_value[5] = "06";  $tab[5] = "Juin";
					$tab_value[6] = "07";  $tab[6] = "Juillet";
					$tab_value[7] = "08";  $tab[7] = "Août";
					$tab_value[8] = "09";  $tab[8] = "Septembre";
					$tab_value[9] = "10";  $tab[9] = "Octobre";
					$tab_value[10] = "11"; $tab[10] = "Novembrer";
					$tab_value[11] = "12"; $tab[11] = "Décembre";
					$i = 0;
					$flag = 0;
					while ($i != 12)
					{
						if ($flag == 0 && $tab[$i] == "Juillet")
							$myNewMessage .= "<option SELECTED value='$tab_value[$i]'>$tab[$i]</option>";
						else
							$myNewMessage .= "<option value='$tab_value[$i]'>$tab[$i]</option>";
						$i++;
					}
					$myNewMessage .= '</select>&nbsp;&nbsp;<select name="annee_sortie" class="select_form">';
					for ($i = 1920; $i != 2010; $i++)
					{
						if ($i == 1996 && $flag == 0)
						$myNewMessage .= "<option selected value='$i'>$i</option>";
						else
						$myNewMessage .= "<option value='$i'>$i</option>";
					}
					$myNewMessage .= "</select></form>";
					$myNewMessage = htmlentities($myNewMessage);
					$mySelect = "SELECT id FROM groupe_vacance WHERE ville='$nom_vac' AND pays='$spec' AND user_id='$user_id'";
					$resSElect = mysql_query($mySelect);
					$tmp_fetch = mysql_fetch_row($resSElect);
					$message = "<vacance>$tmp_fetch[0]";
					 $sql = "INSERT INTO message (message_sujet, message_txt, message_from, message_to, message_date, message_read, message_flag) VALUES ('".$sujet_prev."', '".$message."', '".$user_id."','".$id_ami_envoi."',NOW(), '0', '1')";
					$res = mysql_query($sql);
					if ($tmp_amiiii[3] == "42")
					{
					$my_super_id = mysql_insert_id();
					$sql_premium_lol = mysql_query("SELECT user_pseudo, user_sex, user_premium FROM user WHERE user_id='$user_id'");
					$res_premium_lol = mysql_fetch_row($sql_premium_lol);
					if ($tmp_amiiii[2] == "Homme")
					$color_sex = "#0061B5";
					else
					$color_sex = "#FF7FAA";
					if ($res_premium_lol[1] == "Homme")
					$color_sex_ami = "#0061B5";
					else
					$color_sex_ami = "#FF7FAA";
					$entete = 'MIME-Version: 1.0' . "\n";
					$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
					$entete .= "From: JLife <contact@jlife.fr>" . "\n";
					$entete .= "Reply-To: contact@jlife.fr" . "\n";
					$test3 = '<table cellpadding="0" cellspacing="0" width="900">
					<tr><td height="30" valign=top>Bonjour '; $test3 .= "<font color=$color_sex><b>$tmp_amiiii[0]</b></font>" . ',</td></tr>
					<tr><td>Tu as reçu un message de la part de ' . "<font color=$color_sex_ami><b>$res_premium_lol[0]</b></font>" . ' qui veut t\'inviter &agrave; son groupe.</td></tr>
					<tr><td height=10></td></tr>
					<tr><td>' . "<a href='http://www.jlife.fr/mess_recu.php?action=look&id=$my_super_id&envoi_id=$user_id#jlife' class=jaimegrave>" . '<b>Clique ici</b></a> pour lire ton message, et acc&eacute;der directement &agrave; ta bo&icirc;te de r&eacute;ception<br>Copier et coller le lien si vous n\'arrivez pas a cliquer dessus http://www.jlife.fr/mess_recu.php?action=look&id='. $my_super_id . '&envoi_id='. $user_id. '#jlife</td></tr>
<tr><td height="50" valign="bottom">L’&eacute;quipe de J Life,</td></tr></table>';
mail($tmp_amiiii[4], "$res_premium_lol[0] souhaite que tu rejoignes son groupe", $test3, $entete); 
}
					
					
					$tab_message = "<font face='Arial Rounded MT Bold' style='color:#636563;font-size:18px;'>Invitation envoyée à " . $tmp_amiiii[0] . "</font>";
				}
			else
				$tab_message = "Ami inexistant";
		}
	else
		$tab_message = "Ami inexistant";
}
if (!empty($_GET["spec"]) && !empty($_GET["nom_vac"]))
	{
		$spec = $_GET["spec"];
		$nom_vac = $_GET["nom_vac"];
		$sql = "SELECT user_amis FROM user WHERE user_id='$user_id'";
		$res = mysql_query($sql);
		$tmp = mysql_fetch_row($res);
		if (!empty($tmp[0]))
			{
				echo "<form name='prev_ami' action='premium_ami_vacance.php' method='POST'>";
				$tab_amis = explode('f', $tmp[0]);
				?>
				<table width="670" cellpadding="0" cellspacing="0">
				<tr><td><img src="images/premium.gif" border="0" alt="" /></td></tr>
				</table>
				<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
				<tr><td class="espace_haut" align="center">A : </td><td class="espace_haut" align="left">
				<?
				echo "<select name='amis'>";
				for ($i = 1; $i != sizeof($tab_amis); $i++)
					{
						$res_pseudo = mysql_query("SELECT user_pseudo, user_sex FROM user WHERE user_id='$tab_amis[$i]'");
						$tmp_pseudo = mysql_fetch_row($res_pseudo);
						if ($tmp_pseudo[1] == "Homme")
							$cadepend = "select_ami_h";
						else
							$cadepend = "select_ami_f";
						echo "<option value=$tab_amis[$i] class=$cadepend>$tmp_pseudo[0]</option>";
					}
					echo "<input type='hidden' value='$spec' name='spec'>";
					echo "<input type='hidden' value='$nom_vac' name='nom_vac'>";
				?>
				
				&nbsp;<b>Choisissez le destinataire dans la liste de vos amis</b></td></tr>
				<tr><td class="espace_haut" align="center">Sujet : </td><td class="espace_haut" align="left"><input id=sujet_prev type="text" name="sujet_prev" size="70" maxlength="150" value="Rejoins mon groupe <?=$spec . "&nbsp;" .  $nom_vac;?>" onBlur="document.focus()"></td></tr>
				<tr><td class="espace_haut" align="center" colspan="2"><input type="submit" value="Envoyer un message à mon ami" class="bouton" name="salut"></td></tr>
				</table>
				<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
				<?
				$test = "Interface/bas.php";
				include ($test);
				exit;
			}
	}
?>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/premium.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td height="30" align="center" valign="middle"><b><? if (isset($tab_message)) echo $tab_message; else echo "Vous n'avez pas d'amis!";
?></b></td></tr>
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
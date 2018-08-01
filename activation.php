<?php session_start();
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
$test = "connect.inc.php"; include($test);
$test = "funct/verif.js"; include($test);
?>
<?php
if (isset($_GET["code"]))
$code = $_GET["code"];
if (isset($_POST['code'])) 
{
	$code = $_POST['code'];
	$pass = $_POST['pass'];
	$sql = "SELECT user_active FROM user WHERE user_code='$code' AND user_pass='$pass'";
	$res = mysql_query($sql);
	if (!$res) 
	{
		echo "Erreur lors de la requete";
	}
	$tmp = mysql_fetch_array($res);
	if ($tmp[0] == "1")
		$error = "Votre compte a d&eacute;j&agrave; &eacute;t&eacute; activ&eacute;";
	else if (mysql_num_rows($res) == 0) 
		$error = "Mot de passe ou code d'activation incorrect.";
	else
	{
	$sql = "UPDATE user SET user_active='1', user_premium='42' WHERE user_code='$code'";
	$res = mysql_query($sql);
	if (!$res) 
	{
		echo "Erreur lors de la requete";
	}
	else
	{
	$sql = "SELECT user_mail, user_pass, user_nom, user_prenom, user_pseudo, user_id, user_sex, user_situation FROM user WHERE user_code='$code' AND user_pass='$pass'";
	$res = mysql_query($sql);
	$tmp = mysql_fetch_array($res);
	if (!$res)
	{
		echo "Erreur lors de la requete";
	}
	$test = '<table cellpadding="0" cellspacing="0" width="900">
	<tr><td height="30" valign=top>Bonjour '; $test .= $tmp[4] . ',</td></tr>
	<tr><td>Votre inscription sur J Life s\'est effectu&eacute;e avec succ&egrave;s.</td></tr>
	<tr><td height=10></td></tr>
	<tr><td height="40" valign="bottom">Un petit rappel (conserver cet email) :</td></tr>
<tr><td height="25" valign="bottom">Identifiant : <font color=#FF0000><b>' . $tmp[0] . '</b></font></td></tr>
<tr><td height="25" valign="bottom">Mot de passe : <font color=#FF0000><b>' . $tmp[1] . '</b></font></td></tr><tr><td height="40" valign="bottom">Rendez-vous a l\'adresse suivante <a href="http://www.jlife.fr">http://www.jlife.fr</a> pour vous connecter</td></tr>
	<tr><td height="50" valign="bottom">Merci de votre confiance.</td></tr>
<tr><td height="50" valign="bottom">L’&eacute;quipe de J Life,</td></tr></table>';
$entete = 'MIME-Version: 1.0' . "\n";
$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$entete .= "From: JLife <contact@jlife.fr>" . "\n";
$entete .= "Reply-To: contact@jlife.fr" . "\n";
if (!(mail($tmp[0], "Jlife - Activation", $test, $entete)))
	 {
		echo ('Erreur lors de l\'envoie du mail.<br>');
 	}
	else
		{
			$good = "Votre compte est operationel, vous pouvez vous connecter a J Life. Merci.";
			$_SESSION['user_id'] = $tmp[5];
			$_SESSION['token'] = md5($tmp[1]);
			$_SESSION["derniere_connexion"] = 0;
			$_SESSION["sex"] = $tmp[6];
			$_SESSION["situation"] = $tmp[7];
			$_SESSION["pseudo"] = stripslashes($tmp[4]);
			$date = date("d-m-Y");
			$heure = date("H:i:s");
			$date_actuelle = $date . " " . $heure;
			$sql = "UPDATE user SET user_lastconnection='$date_actuelle', user_premium='42' WHERE user_id=$succ[0]";
			$res = mysql_query($sql);
			$objet = "Bienvenue sur J life";
			$message = "Vous pouvez dès maintenant profiter de tous nos services...<br>Faites de nouvelles rencontres et retrouvez vos ami(e)s en remplissant les parcours de nos trois univers.<br>Dites à vous ami(e)s de vous rejoindre en allant dans la rubrique <a href='inviter_ami.php' class=jaimegrave>« inviter un ami ».</a><br>Toute l’équipe de J Life vous remercie de votre confiance.<br>A bientôt et n’oubliez pas que la vie est faite de rencontres et de retrouvailles!";
			$message = addslashes($message);
			$sql_mess = "INSERT INTO message (message_sujet, message_txt, message_from, message_to, message_date, message_read, message_flag) VALUES ('".$objet."', '".$message."', '1','".$tmp[5]."',NOW(), '0', '1')";
			$res_mess = mysql_query($sql_mess);
			echo '<meta http-equiv="refresh" content="0; url=fiche_perso.php" />';
			//$test = "index3.php";
			//include ($test);
		}

	}
	}
}
?>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
	color: #FFFFFF;
}
-->
</style>
<? $test = "Interface/haut.php"; include($test);?>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<form name="Form1" action="activation.php" method="post">
<tr><td>
<div class="roundedcornr_box_142272">
   <div class="roundedcornr_top_142272">
   <div></div>
   </div>
      <div class="roundedcornr_content_142272" align="center"><font style="color:#636563; font-size:18px;"><b>Activer votre compte</b></font>
      </div>
      <div class="roundedcornr_bottom_14227"><div></div></div>
</div>
</td></tr>
</table>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td height=20 class="espace_haut"></td><td valign="top" class="espace_haut"></td></tr>
<? if (isset($code))
{
	?>
	<tr><td class="espace_haut" align="center">Code d'activation : </td><td class="espace_haut" align="left"><input type="text" name="code" value="<? echo $code;?>"></td></tr>
	<?
}
else
{
?>
<tr><td class="espace_haut" align="center">Code d'activation : </td><td class="espace_haut" align="left"><input type="text" name="code"></td></tr>
<?
}
?>

<tr><td class="espace_haut" align="center">Mot de passe : </td><td class="espace_haut" align="left"><input type="password" name="pass"></td></tr>
</table>
<table valign=top width="670" cellpadding="0" cellspacing="0" style="margin-right:0.8em;">
<tr><td height="50" class=espace_haut  align="center"><input type="submit" name="Submit" value="Valider" /></td></tr>
<tr><td></td></tr>
<tr><td>
<div class="roundedcornr_box_142272">
   <div class="roundedcornr_top_14272">
   <div></div>
   </div>
      <div class="roundedcornr_content_142272" align="center">
  <?
  if (isset($error))
  {
 	echo '<font color="red">*';
	echo $error;
	echo '</font>';
  }
  if (isset($good))
  {
  	echo '<font color="#CCFFFF">*';
	echo $good;
	echo '</font>';
  }
  ?>
      </div>
      <div class="roundedcornr_bottom_142272"><div></div></div>
</div></td></tr>
</table>
</form>
      </div>
   <div class="roundedcornr_bottom_142272"><div></div></div>
</div>
<?
$test = "Interface/bas.php";
include ($test);
?>


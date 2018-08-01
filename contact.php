<? session_start();
$test = "connect.inc.php"; 
include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
if (!isset($_SESSION['user_id'])) 
{	
	$test = "Interface/haut.php"; 
	include($test);
} 
else 
{
	$user_id = $_SESSION['user_id'];
	$test = "Interface/haut_gauche.php"; 
	include($test);
}
?>
<?
if (isset($_POST["email"]))
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
	}
	if (isset($_POST["etat"]))
		{
			$etat = $_POST["etat"];
			$etat = mysql_real_escape_string($etat);
		}
	if (isset($_POST["question"]))
		{
			$question = $_POST["question"];
			$question = mysql_real_escape_string($question);
		}
	if (isset($_POST["message"]))
		{
			$message = $_POST["message"];
			$flag_test = verif_str($message);
			if ($flag_test == 1)
				$tab_error["message"] = "Pas de texte.";
			else if ($flag_test == 2)
				$tab_error["message"] = "Les caractères < >" . " sont interdits!";
		}
	else
		$tab_error["message"] = "Ce champs est obligatoire";
	if (!isset($tab_error))
		{
			$entete = 'MIME-Version: 1.0' . "\n";
			$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			$entete .= "From: $email <$email>" . "\n";
			$entete .= "Reply-To: $email" . "\n";
			$email_contact = "contact@jlife.fr";
			if (!(mail($email_contact, $question, $message, $entete)))
			$tab_message = "<font color=#FF0000><b>Votre message n'a pas été envoyé</b></font>";
			else
				{
					$entete = 'MIME-Version: 1.0' . "\n";
					$entete .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
					$entete .= "From: JLife <contact@jlife.fr>" . "\n";
					$entete .= "Reply-To: contact@jlife.fr" . "\n";
					$tab_message = "<font color=#FF0000><b>Votre message a bien été envoyé</b></font>";
					@mail($email, $question, "Le service technique de j life a bien pris en compte votre demande, celle-ci sera traité dans les plus brefs délais.<br><br><br>L’équipe de J Life.", $entete);
				}
		}
}
?>
<table valign=top width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/contact.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<form name="subscribe" action="contact.php" method="post">
<tr><td width="10" height="90" valign="bottom"></td><td align="left"><font face="Arial Rounded MT Bold" style="color:#636563;font-size:18px;">Vous souhaitez nous contacter sur ces sujets, envoyez nous un message. Notre service client s'engage à vous répondre dans les plus brefs délais.
</font></td></tr>
<?
if (isset($tab_message))
	{
		echo "<tr><td colspan='2' align='center'>$tab_message</td></tr>";
	}
?>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td class="espace_haut" align="right" width="200">Vous êtes : </td><td class="espace_haut" align="left">
		<select name="etat" class="select_form">
<?
if (isset($_GET["flag"]))
$etat = "Professionnel";
$tab[0] = "Particulier";
$tab[1] = "Professionnel";
$i = 0;	
if (isset($etat) && $etat != "choisissez")
$flag = 1;
else
$flag = 0;
while ($i != 2)
{
	if ($flag == 1 && $etat == $tab[$i])
		echo "<option SELECTED value='$tab[$i]'>$tab[$i]</option>";
	else
		echo "<option value='$tab[$i]'>$tab[$i]</option>";
	$i++;
}
?>
		</select></td></tr>
<tr><td class="espace_haut" align="right" width="200">Votre question : </td><td class="espace_haut" align="left">
		<select name="question" class="select_form">
<?
if (isset($_GET["flag"]) && empty($question))
$question = "Vous souhaiter passer votre publicité sur notre site";
$tab[0] = "Vous avez rencontré un problème technique";
$tab[1] = "Vous avez une remarque, une critique, une suggestion pour améliorer notre site";
$tab[2] = "Vous souhaitez nous faire part d'un commentaire ou d'une question";
$tab[3] = "Vous souhaitez nous signaler un abus";
$tab[4] = "Vous ne trouvez pas un établissement, une destination, un centre communautaire";
$tab[5] = "Vous souhaiter passer votre publicité sur notre site";
$tab[6] = "Vous souhaiter nous signaler une erreur sur le site";
$tab[7] = "Vous souhaitez supprimer votre compte";
$tab[8] = "Vous ne voulez plus recevoir d'e-mails";
$tab[9] = "Vous avez perdu votre mot de passe ou identifiant";
$i = 0;	
if (isset($question) && $question != "choisissez")
$flag = 1;
else
$flag = 0;
while ($i != 10)
{
	if ($flag == 1 && $question == $tab[$i])
		echo "<option SELECTED value='$tab[$i]'>$tab[$i]</option>";
	else
		echo "<option value='$tab[$i]'>$tab[$i]</option>";
	$i++;
}
?>
		</select></td></tr>
<tr><td class="espace_haut" align="right">*E-mail :</td><td class="espace_haut" align="left">
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
<tr><td class="espace_haut" align="right" valign="top">Message :</td>
<td class="espace_haut" align="left">
<?
if (isset($tab_error["message"]))
{
	echo '<textarea cols="30" rows="6" name="message" class="error"></textarea></td><td class="espace_haut" align="center" valign="top">';
	echo "<font color='#FF0000'>";
	echo $tab_error["message"];
	echo "</font>";
}
else
{
	if (isset($message))
		{
			$message = stripslashes($message);
			echo "<textarea cols='30' rows='6' name='message'>$message</textarea></td><td class='espace_haut' align='left'>";
		}
		else
		{
		echo "<textarea cols='30' rows='6' name='message'></textarea></td><td class='espace_haut' align='left'>";
		}
}
?></td><td align=center valign="top" class="espace_haut"></td>
</tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td align="center" height=60 valign="center"><input type="submit" name="submit" value="Envoyer" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include $test;?>
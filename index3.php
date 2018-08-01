<?php session_start(); $test = "connect.inc.php"; include($test);  ?>
<?php
if (isset($_POST["email_cadre"]))
{
	$email = $_POST["email_cadre"];
	if ($email == "")
	$tab_inscription = "Veuillez rentrer votre E-mail";
	else
	{
		$sql = "SELECT user_mail FROM user WHERE user_mail='$email'";
		$res = mysql_query($sql);
		if (mysql_num_rows($res) != 1)
		$tab_inscription = "E-mail incorrecte";
		else
			{
				if (isset($_POST["mdp_cadre"]))
				{
					$mdp = $_POST["mdp_cadre"];
					if ($mdp == "")
					$tab_inscription = "Veuillez rentrer votre mot de passe";
					else
					{
					$sql = "SELECT user_id, user_code, user_active, user_premium FROM user WHERE user_mail='$email' AND user_pass='$mdp'";
					$res = mysql_query($sql);
					$succ = mysql_fetch_row($res);
					if (mysql_num_rows($res) != 1)
					$tab_inscription = "Votre mot de passe est incorrecte";
					else if ($succ[2] == "0")
					$tab_inscription = "Ce compte est non-actif";
					else if ($succ[2] == "42")
					$tab_inscription = "Ce compte a été supprimé";
					else
						{
						$date = date("d-m-Y");
						$heure = date("H:i:s");
						$date_actuelle = $date . " " . $heure;
						$sql = "UPDATE user SET user_lastconnection='$date_actuelle' WHERE user_id=$succ[0]";
						$res = mysql_query($sql);
						$_SESSION["user_premium"] = 0;
						$_SESSION['user_id'] = $succ[0];
						$_SESSION['token'] = md5($succ[1]);
						$_SESSION["derniere_connexion"] = 0;
						$_SESSION["user_premium"] = $succ[3];
						$sql = mysql_query("SELECT user_sex, user_situation, user_pseudo FROM user WHERE user_id=$succ[0]");
						$res = mysql_fetch_row($sql);
						$_SESSION["sex"] = $res[0];
						$_SESSION["situation"] = $res[1];
						$_SESSION["pseudo"] = $res[2];
						if (isset($_POST["memoriser_mdp"]))
						{
							setcookie("email_cookie",$email, time()-2592000);
							setcookie("mdp", $mdp, time()-2592000);
							setcookie("email_cookie",$email, time()+2592000);
							setcookie("mdp", $mdp, time()+2592000);
						}
						else
						{
							setcookie("email_cookie",$email, time()-2592000);
							setcookie("mdp", $mdp, time()-2592000);
						}
						//setcookie("email", $email, time()+3600,"/",".jlife.fr",1);
						//$test = "Interface/haut.php"; include($test);
						
						$myIp = $_SERVER['REMOTE_ADDR'];
						if ($myIp == "41.202.110.66")
							exit;
						mysql_query("UPDATE user SET ip='$myIp' WHERE user_id='$succ[0]'");
						
						
						if (!empty($_SESSION["page_go"]))
						{
							$coucou = $_SESSION["page_go"];
							$_SESSION["page_go"] = "";
							echo "<meta http-equiv=refresh content='0; url=$coucou' />";
							exit;
						}
						else
							echo '<meta http-equiv="refresh" content="0; url=fiche_perso.php" />';
							exit;
						}
					}
				}
			}
	}
if (isset($tab_inscription))
{
	$_SESSION["index_error"] = $tab_inscription;
	echo '<meta http-equiv="refresh" content="0; url=index.php" />';
	/*echo "<table cellspacing=0 cellspading=0 align=center width=670>";
	echo "<tr><td align=center><div class='roundedcornr_box_901891'>
   <div class='roundedcornr_top_901891'><div></div></div>
      <div class='roundedcornr_content_901891'>
         <b>".$tab_inscription."</b>
      </div>
   <div class='roundedcornr_bottom_901891'><div></div></div>
</div></td></tr>";
	echo "</table>";
	include("Interface/bas.php");
	exit;*/
}
}
?>
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
<table id="Table_01" width="680" height="49" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom"><a href="fiche_perso.php">
			<img src="images/menuht_01.gif"  alt="Profil" border="0"></a></td>
		<td valign="bottom"><a href="fiche_detail.php">
			<img src="images/menuht_02.gif"  alt="Ma life" border="0"></a></td>
		<td width="112" height="49" valign="bottom">
		<? 
		if ($_SESSION["user_premium"] == "42")
		{
			?>
			<a href="fiche_premium.php"><img src="images/menuhtsvl_03.gif" alt="Premium J life" border="0"></td>
			<?
		}
		else
			echo "&nbsp;</td>";
		?>
		<td valign="bottom"><a href="fiche_ecole.php">
			<img src="images/menuht_04.gif" alt="Ecole" border="0"></a></td>
		<td valign="bottom"><a href="fiche_vacance.php">
			<img src="images/menuht_05.gif" alt="Vacances" border="0"></a></td>
		<td valign="bottom"><a href="fiche_communaute.php">
			<img src="images/menuht_06.gif" alt="Communaute" border="0"></a></td>
	</tr>
</table>

<script language="javascript">
function urlDecode(u)
{
    var h = "0123456789ABCDEFabcdef"; 
       var d = "";
       var i = 0;
       while (i < u.length) 
    {
        var c = u.charAt(i);
           if (c == "+") 
        {
            d += " ";
               i++;
           }
        else if (c == "%")
        {
            if (i < (u.length-2) && h.indexOf(u.charAt(i+1)) != -1 && h.indexOf(u.charAt(i+2)) != -1 ) 
            {
                d += unescape( u.substr(i,3) );
                i += 3;
            }
        }
        else
        {
            d += c;
               i++;
        }
    }
    return d;
}

function trim(string) {
        return string.replace(/^\s*|\s*$/g, "");
}



function change_ecole() //fonction qui affichera le texte
{
var Chaine;
var newLink;
var splitedChaine;
var testChaine;
Chaine = document.prem_form_ecole.nom.options //on spécifie la liste a traiter
[document.prem_form_ecole.nom.selectedIndex].text;//on récupere le texte de cette liste

testChaine = document.getElementById('nom_ecole').options[document.getElementById('nom_ecole').selectedIndex].value;
splitedChaine = Chaine.split(urlDecode(testChaine));
newLink = "<a href='premium_ami_ecole.php?spec=" +  splitedChaine[0] + "&nom=" + testChaine + "' class='prem_lien_ecole'><b>Inviter un ami &agrave; joindre le groupe " + '<font color="#009A31">"</font><font color=#009A31>' + Chaine.valueOf() + '</font><font color="#009A31">"</font>' + "</b></a>";
document.getElementById("div_test").innerHTML = newLink.valueOf();
}

function change_vac() //fonction qui affichera le texte
{
var Chaine;
var newLink;
var splitedChaine;
var testChaine;
Chaine = document.prem_form_vac.nom_vac.options //on spécifie la liste a traiter
[document.prem_form_vac.nom_vac.selectedIndex].text;//on récupere le texte de cette liste

testChaine = document.getElementById('nom_vac').options[document.getElementById('nom_vac').selectedIndex].value;

splitedChaine = Chaine.split(urlDecode(testChaine));
newLink = "<a href='premium_ami_vacance.php?spec=" +  trim(splitedChaine[0]) + "&nom_vac=" + testChaine + "' class='prem_lien_vac'><b>Inviter un ami &agrave; joindre le groupe " + '<font color="#FF7D00">"</font><font color=#FF7D00>' + Chaine.valueOf() + '</font><font color="#FF7D00">"</font>' + "</b></a>";
document.getElementById("div_test_vac").innerHTML = newLink.valueOf();
}
function change_com() //fonction qui affichera le texte
{
var Chaine ="";
var newLink="";
var splitedChaine="";
var testChaine="";
Chaine = document.prem_form_com.nom_com.options //on spécifie la liste a traiter
[document.prem_form_com.nom_com.selectedIndex].text;//on récupere le texte de cette liste

testChaine = document.getElementById('nom_com').options[document.getElementById('nom_com').selectedIndex].value;




splitedChaine = Chaine.split(urlDecode(testChaine));

newLink = "<a href='premium_ami_communaute.php?spec=" +  splitedChaine[0] + "&nom_com=" + testChaine + "' class='prem_lien_com'><b>Inviter un ami &agrave; joindre le groupe " + '<font color="#085DD6">"</font><font color=#085DD6>' + Chaine.valueOf() + '</font><font color="#085DD6">"</font>' + "</b></a>";
document.getElementById("div_test_com").innerHTML = newLink.valueOf();
}

</script>
<script language="javascript" type="text/javascript">
function check()
{
if (document.prem_form_ecole.prem_question_ecole.value == "1")
{
	var salut = "./prem_liste_ecole.php?nom=" + document.prem_form_ecole.nom.value;
	window.open(salut);
}
else if (document.prem_form_ecole.prem_question_ecole.value == "2")
{
var salut = "./prem_liste_ecole_2.php?nom=" + document.prem_form_ecole.nom.value;
window.open(salut);
}
else if (document.prem_form_ecole.prem_question_ecole.value == "3")
{
var salut = "./prem_liste_ecole_3.php?nom=" + document.prem_form_ecole.nom.value;
window.open(salut);
}
else
alert("...");
}

function check_vac()
{
if (document.prem_form_vac.prem_question_vac.value == "1")
{
	var salut = "./prem_liste_vacance.php?nom=" + document.prem_form_vac.nom_vac.value;
	window.open(salut);
}
else if (document.prem_form_vac.prem_question_vac.value == "2")
{
var salut = "./prem_liste_vacance_2.php?nom=" + document.prem_form_vac.nom_vac.value;
window.open(salut);
}
else if (document.prem_form_vac.prem_question_vac.value == "3")
{
var salut = "./prem_liste_vacance_3.php?nom=" + document.prem_form_vac.nom_vac.value;
window.open(salut);
}
else
alert("...");
}

function check_com()
{
if (document.prem_form_com.prem_question_com.value == "1")
{
	var salut = "./prem_liste_communaute.php?nom=" + document.prem_form_com.nom_com.value;
	window.open(salut);
}
else if (document.prem_form_com.prem_question_com.value == "2")
{
var salut = "./prem_liste_communaute_2.php?nom=" + document.prem_form_com.nom_com.value;
window.open(salut);
}
else if (document.prem_form_com.prem_question_com.value == "3")
{
var salut = "./prem_liste_communaute_3.php?nom=" + document.prem_form_com.nom_com.value;
window.open(salut);
}
else
alert("...");
}
</script>

<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="padding-left:35px;">
<tr><td height="200">
<table cellpadding="0" cellspacing="0" width="300" cellpadding="0" cellspacing="0">
<tr><td align="center">
<FIELDSET style="border:1px solid #A5B2C6;background-color:#BDCFE7;">
<LEGEND align="left"><font color="#39A2D6" style="font-size:25px;" face="Arial Rounded MT Bold, Arial, Verdana">Applications Premium</font></LEGEND>
      <table cellpadding="0" cellspacing="0" width="610">
	  <tr><td height="20"></td></tr>
	<TR style="cursor:pointer" >
		<TD align="left" width="500"><LABEL for="login5"><a href="prem_modif_top_amis.php" class="prem_lien_red"><b>Modifier mon top Amis</b></a></LABEL></TD>
	</TR>
	<TR style="cursor:pointer" >
		<TD align="left" width="500"><LABEL for="login5"><a href="prem_musique.php" class="prem_lien_red"><b>Ajouter une musique</b></a></LABEL></TD>
	</TR>
	<TR  style="cursor:pointer" >
		<TD align="left" width="500"><LABEL for="login5"><a href="prem_stats_visites.php" class="prem_lien_red"><b>Statistiques visites</b></a></LABEL></TD>
	</TR>
	<TR  style="cursor:pointer" >
		<TD align="left" width="100%" style="cursor:pointer" ><LABEL for="login5"><a href="prem_rech_groupe.php" class="prem_lien_red"><b>Recherche par groupe</b></a></LABEL></TD>
	</TR>
	</table>
</FIELDSET>
</td>
</tr>
</table>
</td></tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="padding-left:35px;">
<td height="200">
<table cellpadding="0" cellspacing="0" width="300" cellpadding="0" cellspacing="0">
<tr><td>
<FIELDSET style="border:1px solid #00CF00;background-color:#D6FFD6;">
<LEGEND align="left"><font color="#009A31" style="font-size:25px" face="Arial Rounded MT Bold, Arial, Verdana">&Eacute;coles</font></LEGEND>
      <table cellpadding="0" cellspacing="0" width="610">
	  <form name="prem_form_ecole" method="get" action="javascript:void(0);" onSubmit="return check();">
	  <tr><td></td></tr>
	<TR>
		<TD align="left" width="100%"><LABEL for="login5"><a href="prem_rech_ecole.php" class="prem_lien_ecole"><b>Mes recherches sauvegard&eacute;es &Eacute;cole</b></a></LABEL></TD>
	</TR>
	<tr><td height="10"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="prem_question_ecole" style="background-color:#52E373;border:1px solid #00CF00;font-size:14px;color:#FFFFFF; font-family:Verdana;"><option style="color:#FFFFFF;" value="1">Les membres qui ont &eacute;t&eacute; &agrave; la m&ecirc;me &eacute;cole que moi</b></option>
		<option style="color:#FFFFFF;" value="2">Les membres qui sont dans la m&ecirc;me &eacute;cole que moi</b></option>
		<option style="color:#FFFFFF;" value="3">Les membres qui seront dans la m&ecirc;me &eacute;cole que moi</b></option>
		</select></TD>
	</TR>
	<tr><td height="5"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="nom" id="nom_ecole" style="background-color:#52E373;border:1px solid #00CF00;font-size:14px;color:#FFFFFF; font-family:Verdana;" onChange="change_ecole();">
		<?
		$sql_ecole = "SELECT nom, id, enseignement FROM groupe_ecole WHERE user_id='$user_id' GROUP BY nom ORDER by enseignement, nom";
		$res_ecole = mysql_query($sql_ecole);
		$i = 0;
		while ($tmp_ecole = mysql_fetch_row($res_ecole))
			{
				$tmp_ecole[0] = stripslashes($tmp_ecole[0]);
				if ($i == 0) {
					$oldValue = "<a href='premium_ami_ecole.php?spec=$tmp_ecole[2]&nom=$tmp_ecole[0]' class='prem_lien_ecole'><b>Inviter un ami &agrave; joindre le groupe "		. '<font color="#009A31">"</font><font color=#009A31>';
					$oldValue .= $tmp_ecole[2] . " " . $tmp_ecole[0] . '</font><font color="#009A31">"</font>';
					$oldValue .= "</b></a>";
					$i++;
				}
				$value = urlencode($tmp_ecole[0]);
				echo '<option style="color:#FFFFFF;" value='.$value.'>' . $tmp_ecole[2] . " " . $tmp_ecole[0] .'</option>';
			} 
		?>
		</select></TD><div id="div_test" style="padding-top:20px;"><?=$oldValue?></div>
	</TR>
	<tr><td></td><td><input type="submit" name="submit_ecole_prem" value="Consulter" style="background-color:#009933;color:#FFFFFF;border:1px solid #FFFFFF;"/></td></tr>
	</form>
	</table>
</FIELDSET>
</td>
</tr>
</table>
</td></tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="padding-left:35px;">
<tr><td height="200">
<table cellpadding="0" cellspacing="0" width="300" cellpadding="0" cellspacing="0">
<tr><td>
<fieldset style="border:1px solid #FFA208;background-color:#FFD4AA;">
<legend align="left"><font color="#FF7D00" style="font-size:25px" face="Arial Rounded MT Bold, Arial, Verdana">Vacances</font></legend>
      <table cellpadding="0" cellspacing="0" width="610">
	  <form name="prem_form_vac" method="get" action="javascript:void(0);" onSubmit="return check_vac();">
	  <tr><td></td></tr>
	<TR>
		<TD align="left" width="100%"><LABEL for="login5"><a href="prem_rech_vacance.php" class="prem_lien_vac"><b>Mes recherches sauvegard&eacute;es Vacances</b></a></LABEL></TD>
	</TR>
	<tr><td height="10"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="prem_question_vac" style="background-color:#FFAE52;border:1px solid #FFA208;font-size:14px;color:#FFFFFF; font-family:Verdana;"><option style="color:#FFFFFF;" value="1">Les membres qui ont fait les m&ecirc;mes vacances que moi</b></option>
		<option style="color:#FFFFFF;" value="2">Les membres qui font les m&ecirc;mes vacances que moi</b></option>
		<option style="color:#FFFFFF;" value="3">Les membres qui feront fait les m&ecirc;mes vacances que moi</b></option>
		</select></TD>
	</TR>
	<tr><td height="5"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="nom_vac" id="nom_vac" style="background-color:#FFAE52;border:1px solid #FFA208;font-size:14px;color:#FFFFFF; font-family:Verdana;" onChange="change_vac();">
		<?
		$sql_vac = "SELECT pays, id, ville FROM groupe_vacance WHERE user_id='$user_id' GROUP BY ville ORDER by pays, ville";
		$res_vac = mysql_query($sql_vac);
		$i = 0;
		$oldValue_vac = "";
		while ($tmp_vac = mysql_fetch_row($res_vac))
			{
				if ($i == 0) {
					$oldValue_vac = "<a href='premium_ami_vacance.php?spec=$tmp_vac[0]&nom_vac=$tmp_vac[2]' class='prem_lien_vac'><b>Inviter un ami &agrave; joindre le groupe "		. '<font color="#FF7D00">"</font><font color=#FF7D00>';
					$oldValue_vac .= $tmp_vac[0] . " " . $tmp_vac[2] . '</font><font color="#FF7D00">"</font>';
					$oldValue_vac .= "</b></a>";
					$i++;
				}
				$tmp_vac[0] = stripslashes($tmp_vac[0]);
				$value = urlencode($tmp_vac[2]);
				echo '<option style="color:#FFFFFF;" value='.$value.'>' . $tmp_vac[0] . " " . $tmp_vac[2] .'</option>';
			} 
		?>
		</select></TD><div id="div_test_vac" style="padding-top:20px;"><?=$oldValue_vac?></div>
	</TR>
	<tr><td></td><td><input type="submit" name="submit_vac_prem" value="Consulter" style="background-color:#FF7D00;color:#FFFFFF;border:1px solid #FFFFFF;"/></td></tr>
	</form>
	</table>
	
</fieldset>
</td>
</tr>
</table>
</td></tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" style="padding-left:35px;">
<tr><td height="200">
<table cellpadding="0" cellspacing="0" width="300" cellpadding="0" cellspacing="0">
<tr><td>
<FIELDSET style="border:1px solid #108ACE;background-color:#CEFFFF;">
<LEGEND align="left"><font color="#085DD6" style="font-size:25px" face="Arial Rounded MT Bold, Arial, Verdana">Communaut&eacute;</font></LEGEND>
      <table cellpadding="0" cellspacing="0" width="610">
	   <form name="prem_form_com" method="get" action="javascript:void(0);" onSubmit="return check_com();">
	  <tr><td></td></tr>
	<TR>
		<TD align="left" width="100%"><LABEL for="login5"><a href="prem_rech_communaute.php" class="prem_lien_com"><b>Mes recherches sauvegard&eacute;es Communaut&eacute;</b></a></LABEL></TD>
	</TR>
	<tr><td height="10"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="prem_question_com" style="background-color:#2AAAFF;border:1px solid #108ACE;font-size:14px;color:#FFFFFF; font-family:Verdana;"><option style="color:#FFFFFF;" value="1">Les membres qui ont partag&eacute; le m&ecirc;me parcours communautaire que moi</b></option>
		<option style="color:#FFFFFF;" value="2">Les membres qui partagent le m&ecirc;me parcours communautaire que moi</b></option>
		<option style="color:#FFFFFF;" value="3">Les membres qui partageront le m&ecirc;me parcours communautaire que moi</b></option>
		</select></TD>
	</TR>
	<tr><td height="5"></td></tr>
	<TR>
		<TD align="left" width="100%"><select name="nom_com" id="nom_com" style="background-color:#2AAAFF;border:1px solid #108ACE;font-size:14px;color:#FFFFFF; font-family:Verdana;" onChange="change_com();">
		<?
		$sql_com = "SELECT lieu, id, nom FROM groupe_communaute WHERE user_id='$user_id' GROUP BY nom ORDER by lieu, nom";
		$res_com = mysql_query($sql_com);
		$oldValue_com = "";
		$i = 0;
		while ($tmp_com = mysql_fetch_row($res_com))
			{
				$tmp_com[0] = stripslashes($tmp_com[0]);
				$value = urlencode($tmp_com[2]);
				//$value = urlencode($tmp_com[2]);
				if ($i == 0) {
					$oldValue_com = "<a href='premium_ami_communaute.php?spec=$tmp_com[0]&nom_com=$tmp_com[2]' class='prem_lien_com'><b>Inviter un ami &agrave; joindre le groupe "		. '<font color="#085DD6">"</font><font color=#085DD6>';
					$oldValue_com .= $tmp_com[0] . " " . $tmp_com[2] . '</font><font color="#085DD6">"</font>';
					$oldValue_com .= "</b></a>";
					$i++;
				}
				echo '<option style="color:#FFFFFF;" value='.$value.'>' . $tmp_com[0] . " " . $tmp_com[2] .'</option>';
			} 
		?>
		</select></TD><div id="div_test_com" style="padding-top:20px;"><?=$oldValue_com?></div>
	</TR>
	<tr><td></td><td><input type="submit" name="submit_com_prem" value="Consulter" style="background-color:#085DD6;color:#FFFFFF;border:1px solid #FFFFFF;"/></td></tr>
	</form>
	</table>
	
</FIELDSET>
</td>
</tr>
</table>
</td></tr>
</table>
<table width="680" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include($test); ?>
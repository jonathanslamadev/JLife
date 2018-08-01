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
$test = "Interface/haut_gauche.php"; 
include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
?>
<style type="text/css">
#dhtmltooltip{
position: absolute;
width: 150px;
border: 2px solid white;
padding: 2px;
visibility: hidden;
z-index: 100;
color:#FFFFFF;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}
</style>
<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>
<?
if (!empty($_GET["evenement_id"]) && (func_number($_GET["evenement_id"]) == 0))
{
$evenement_id_coucou = $_GET["evenement_id"];
if (isset($_GET["participant"]) && $_GET["participant"] == $user_id && $_SESSION["user_premium"] == "42")
		{
			$sql_inscrib = "SELECT evenement_participant FROM admin_evenement WHERE id_evenement='$evenement_id_coucou'";
			$res_inscrib = mysql_query($sql_inscrib);
			$num_row_test = mysql_num_rows($res_inscrib);
			if ($num_row_test <= 0)
				$tab_error = "Cet &eacute;v&egrave;nement n'existe pas.";
			$tmp_inscrib = mysql_fetch_row($res_inscrib);
			$tab_ami_common = explode("f", $tmp_inscrib[0]);
			$str_recup_nom = "";
			for ($i = 0, $v = 0; $i != sizeof($tab_ami_common); $i++)
				{
					if ($tab_ami_common[$i] == $user_id)
					{
						$tab_error = "Vous faites d&eacute;j&agrave; parti de cet &eacute;v&egrave;nement.";
						break;
					}
				}
				if (!isset($tab_error))
					{
						$tmp_inscrib[0] .= "f" . $user_id;
						$update_m3h = mysql_query("UPDATE admin_evenement SET evenement_participant ='$tmp_inscrib[0]' WHERE id_evenement=$evenement_id_coucou");
					}
		}
		if (isset($_GET["retirer"]) && $_GET["retirer"] == $user_id && $_SESSION["user_premium"] == "42")
		{
			$sql_inscrib = "SELECT evenement_participant FROM admin_evenement WHERE id_evenement='$evenement_id_coucou'";
			$res_inscrib = mysql_query($sql_inscrib);
			$num_row_test = mysql_num_rows($res_inscrib);
			if ($num_row_test <= 0)
				$tab_error = "Cet &eacute;v&egrave;nement n'existe pas.";
			$tmp_inscrib = mysql_fetch_row($res_inscrib);
			$tab_ami_common = explode("f", $tmp_inscrib[0]);
			$str_recup_nom = "";
			$tab_save = "";
			for ($i = 0, $v = 0; $i != sizeof($tab_ami_common); $i++)
				{
					if ($tab_ami_common[$i] != $user_id)
					{
						$tab_save .= "f" . $tab_ami_common[$i];
					}
				}
				if (!isset($tab_error))
					{

						$update_m3h = mysql_query("UPDATE admin_evenement SET evenement_participant ='$tab_save' WHERE id_evenement=$evenement_id_coucou");
					}
		}
}
?>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/agenda_events.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
  <!--DWLayoutTable-->
  <tr>
    <td width="190" height="337" valign="top" style="padding-right:10px;"><table width="190" border="0" cellpadding="0" cellspacing="0" >
      <!--DWLayoutTable-->
	  <?
	  $sql_find_evenement = mysql_query("SELECT id_evenement, evenement_nom, evenement_description, evenement_date, evenement_participant, evenement_photo_nom FROM admin_evenement ORDER by evenement_date ASC");
	  	$i = 0;
		$final = mysql_num_rows($sql_find_evenement);
	  while ($tmp_find = mysql_fetch_row($sql_find_evenement))
	  	{
			$onclick = "document.location.href='evenement.php?evenement_id=$tmp_find[0]'";
			$tmp_find[1] = stripslashes($tmp_find[1]);
			$tmp_find[2] = stripslashes($tmp_find[2]);
			$tmp_find[5] = stripslashes($tmp_find[5]);
			$flag = 0;
			if ($i == 0 && !isset($evenement_id_coucou))
				{
					$evenement_nom_retien = $tmp_find[1];
					$chemin_evenement = "photos_evenement/" . $tmp_find[5];
					$evenement_descrip_retien = $tmp_find[2];
					$evenement_id_coucou = $tmp_find[0];
					$flag = 1;
				}
			if (isset($evenement_id_coucou) && $evenement_id_coucou == $tmp_find[0])
				{
					$evenement_nom_retien = $tmp_find[1];
					$chemin_evenement = "photos_evenement/" . $tmp_find[5];
					$evenement_descrip_retien = $tmp_find[2];
					$flag = 2;
				}
			if ($flag == 1 || $flag == 2)
			{
			?>
				<tr bgcolor='#00B6FF' style='cursor:pointer' onclick="<? echo $onclick;?>">
			<?
			}
			else
				{
				?>
			<tr bgcolor='#BDCFE7' style='cursor:pointer' onMouseOver="this.style.background='#00B6FF'" onMouseOut="this.style.background='#BDCFE7';" onclick="<? echo $onclick;?>">
			<?
				}
			$my_evenement_date = explode('-', $tmp_find[3]);
			$i++;
			if ($final == $i)
				echo "<td height='30' align='left' style='border:1px solid #FFFFFF;'><font color='#000000' style='font-size:12px;'>&nbsp;<b>$my_evenement_date[2]/$my_evenement_date[1]/$my_evenement_date[0]</b></font><font color='#FFFFFF' style='font-size:12px;'><b> - $tmp_find[1]</b></font></td></tr>";
			else
			echo "<td height='30' align='left' style='border-left:1px solid #FFFFFF;border-right:1px solid #FFFFFF;border-top:1px solid #FFFFFF;'><font color='#000000' style='font-size:12px;'>&nbsp;<b>$my_evenement_date[2]/$my_evenement_date[1]/$my_evenement_date[0]</b></font><font color='#FFFFFF' style='font-size:12px;'><b> - $tmp_find[1]</b></font></td></tr>";
			
		}
	  ?>
	   <tr>
        <td width="190" height="100%"></td>
      </tr>
	  
	  <?
	  	$sql_photos_secondaire = mysql_query("SELECT evenement_photo_nom FROM admin_evenement_photos WHERE id_evenement='$evenement_id_coucou'");
		while ($tmp_sec = mysql_fetch_row($sql_photos_secondaire))
			{
				$chemin_evenement_sec = "photos_evenement/" . $tmp_sec[0];
				?>
				<tr><td height="5" bgcolor='#BDCFE7'></td></tr>
				<tr bgcolor='#BDCFE7' style='cursor:pointer' onMouseOver="this.style.background='#00B6FF'" onMouseOut="this.style.background='#BDCFE7';"><td align=center><a href="<? echo $chemin_evenement_sec;?>" rel="lightbox[roadtrip]" title="<? echo $evenement_nom_retien;?>"><img src="<? echo $chemin_evenement_sec;?>" height="100" border="0"/></a></td></tr>
				<tr><td height="5" bgcolor='#BDCFE7'></td></tr>
				<?
			}
	  ?>
    </table>    </td>
    <td width="480" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr><td align="center" height="30" valign="middle"><font face="Arial Rounded MT Bold" style="color:#636563;font-size:18px;"><? echo $evenement_nom_retien;?></font></td></tr>
	  <tr><td align="center"><a href="<? echo $chemin_evenement;?>" rel="lightbox" title="<? echo $evenement_nom_retien;?>"><img src="<? echo $chemin_evenement;?>" height='200' border="0"/></a></td></tr>
	  	<tr><td align="left"><b><? echo nls2p($evenement_descrip_retien);?></b></td></tr>
		<tr><td>
    </table>
    </td>
  </tr>
</table>
<? if ($_SESSION["user_premium"] == "42")
{
?>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr bgcolor="#C6D3E7"><td align="center" height="20" valign="middle"><font color="#FFFFFF" style="font-size:16px;"><b><a href="evenement.php?evenement_id=<?=$evenement_id_coucou;?>&amp;participant=<?=$user_id;?>#jlife" class="prem_lien_utiles" id="jlife">Cliquez ici pour participer a l'&eacute;v&egrave;nement</a></b></font></td></tr>
<?
}
else
{
?>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr bgcolor="#C6D3E7"><td align="center" height="20" valign="middle"><font color="#108ACE" style="font-size:17px;" face="Verdana"><b>La liste des participants</b></font></td></tr>
<?
}
if (isset($tab_error))
	{?>
<tr bgcolor="#C6D3E7"><td align="center" height="20"><font color="#FF0000" style="font-size:12px;"><b><? echo $tab_error;?></b></font></td></tr>
	<? }
	$sql_inscrib = "SELECT evenement_participant FROM admin_evenement WHERE id_evenement='$evenement_id_coucou'";
	$res_inscrib = mysql_query($sql_inscrib);
	$num_row_test = mysql_num_rows($res_inscrib);
	if ($num_row_test <= 0)
		$tab_error = "Cet ev&egrave;nement n'existe pas.";
	$tmp_inscrib = mysql_fetch_row($res_inscrib);
	$tab_ami_common = explode("f", $tmp_inscrib[0]);
	$newFlag = 0;
	if (sizeof($tab_ami_common) >= 1)
		echo "<tr bgcolor=#C6D3E7><td>";
	for ($i = 1; $i != sizeof($tab_ami_common); $i++)
		{
			if ($tab_ami_common[$i] == $user_id) {
				$newFlag = 1;
			}
			$sql_recup_nom = mysql_query("SELECT user_pseudo, user_age, user_sex, user_ville, user_id, user_prenom, user_situation FROM user WHERE user_id='$tab_ami_common[$i]'");
			$tmp_recup_nom = mysql_fetch_row($sql_recup_nom);
			$sql_ami_photo = "SELECT nom, commentaire, validation FROM photos_profil WHERE user_id='$tab_ami_common[$i]'";
		$res_ami_photo = mysql_query($sql_ami_photo);
		$num_photos = mysql_num_rows($res_ami_photo);
		$tmp_photo = mysql_fetch_row($res_ami_photo);
		if ($num_photos == 0 && $tmp_recup_nom[2] == "Homme")
			$chemin = "picts/nophotoG_ami.gif";
		else if ($num_photos == 0 && $tmp_recup_nom[2] == "Femme")
			$chemin = "picts/nophotoF_ami.gif";
		else
			{
				if ($tmp_photo[2] == '1')
					{
						if ($tmp_recup_nom[2] == "Homme")
							$chemin = "picts/validationG_page_ami.gif";
						else
							$chemin = "picts/validationF_page_ami.gif";
					}
				else
					{
						$tmp_photo[0] = stripslashes($tmp_photo[0]);
						$chemin = "vignette_ami/" . $tmp_photo[0];
						if (!file_exists($chemin))
						creation_vignette($tmp_photo[0], 150, 135, "photos_profil/", "vignette_ami/", "");
					}
			}
			if ($tmp_recup_nom[2] == "Homme")
			{
				$class_sex = "homme";
				$color = "#0061B5";
			}
			else
			{
				$class_sex = "femme";
				$color = "#FF7FAA";
			}
			echo "&nbsp;";
			?>
			<a href='auth_profil.php?id=<?= $tmp_recup_nom[4];?>' class=<?=$class_sex;?> onMouseover="ddrivetip('<img src=<?=$chemin;?> height=50 width=50 alt=<?=$tmp_photo[0];?>>&nbsp;<? echo  $tmp_recup_nom[5] . ",&nbsp;&nbsp;" . $tmp_recup_nom[1] ." ans&nbsp;&nbsp;$tmp_recup_nom[6]&nbsp;&nbsp;&agrave;&nbsp;" . $tmp_recup_nom[3];?>','<? echo $color;?>', 400)" onMouseout="hideddrivetip()"><?=$tmp_recup_nom[0];?></a><?
		}
	if (sizeof($tab_ami_common) >= 1)
		echo "</td></tr>";
	if ($newFlag == 1 && $_SESSION["user_premium"] == "42")
		{
			?>
			<tr bgcolor="#C6D3E7"><td align="center" height="20" valign="middle"><a href="evenement.php?evenement_id=<?=$evenement_id_coucou;?>&amp;retirer=<?=$user_id;?>&#jlife" class="prem_lien_utiles" id="jlife"><b>Se retirer de l'&eacute;v&egrave;nement</b></a></td></tr>
			<?
		}
?>
</table>

<? $test = "Interface/bas.php" ; include ($test); ?>
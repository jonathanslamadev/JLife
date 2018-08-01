<?php  session_start();?>
<?php 
$test = "connect.inc.php"; 
include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
$test = "Interface/haut.php"; 
include($test);
?>
<script type="text/javascript">
function envoieRequete(url,id)
{
 var xhr_object = null;
 var position = id;
 if(window.XMLHttpRequest) xhr_object = new XMLHttpRequest();
 else
 if (window.ActiveXObject) xhr_object = new ActiveXObject("Microsoft.XMLHTTP");

 // On ouvre la requete vers la page désirée
 xhr_object.open("GET", url, true);
 xhr_object.onreadystatechange = function(){
 if ( xhr_object.readyState == 4 )
 {
 // j'affiche dans la DIV spécifiées le contenu retourné par le fichier
 document.getElementById(position).innerHTML = xhr_object.responseText;
 }
 }
 // dans le cas du get
 xhr_object.send(null);

 }
 </script> 
<script type="text/javascript" src="js/ajaxBox.js">
</script>
<script type="text/javascript">
		var pldBoxContent = new Moobox({
				fadePower : '0.5'
			});
</script>

<?php 
if (!empty($_SESSION["index_error"]))
	{
		echo '<table width="668" border="0" cellpadding="0" cellspacing="0">';
		?>
		<tr>
        <td align=center><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_885585"><div></div></div>
      <div class="roundedcornr_content_885585" style="font-size:18px; color:#FF0029" align="center"><b><?php  echo $_SESSION["index_error"]; $_SESSION["index_error"] = "";?>
	  </b>
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></div></td></tr>
<tr><td>&nbsp;</td></tr>
		<?php  
}
?>
<table width="668" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="326" height="144" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="326" height="144"><img src="images/acroche.gif" alt="J Life le site de rencontre et de retrouvailles juives"/></td></tr><tr><td align="center" valign="bottom" height="75">
<a href="http://www.jlife.fr/inscription.php"><img src="images/inscrpition.gif" alt="Inscrivez-vous gratuitement sur J Life" border="0" /></a></td></tr></td>
      </tr>
    </table>    </td>
    <td width="342" valign="top" style="padding-left:10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="342" height="144">
        	<SCRIPT LANGUAGE="JavaScript1.1">
sas_pageid='4741/29710';		// Page : skyboard/1-jlife.fr/LB + IMU + Flash Transparent + Intromercial/rg
sas_formatid=439;			// Format : IMU 300x250
sas_target='indexjlife';			// Targeting
SmartAdServer(sas_pageid,sas_formatid,sas_target);
</SCRIPT>
		</td>
      </tr>
	  
    </table>
    </td>
  </tr>
</table>
<br>


<table id="Table_01" width="700" height="146" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6"><img src="images/ecoles_01.jpg" width="700" height="19" alt="Top 5 Ecoles J Life" /></td>
  </tr>
  <tr>
    <td width="211" rowspan="6"><img src="images/ecoles_02.jpg" width="211" height="122" alt="Top 5 Ecoles J Life" /></td>
    <td colspan="2" bgcolor="#FFFFFF" valign="bottom"><div class="roundedcornr_box_933827" >
   <div class="roundedcornr_top_933827"><div></div></div>
      <div class="roundedcornr_content_933827" align="center"><font face="Verdana, Arial, Helvetica, sans-serif" color="#006600"><b>TOP 5 ECOLES</b></font></div>
   <div class="roundedcornr_bottom_83717"><div></div></div>
</div></td>
 <?php 
$sql = "SELECT id, user_id, nom FROM photos_ecole WHERE taille < 300000 AND validation='2' ORDER BY RAND() LIMIT 2";
$res = mysql_query($sql);
$num_rows = mysql_num_rows($res);
if ($num_rows != 0)
	{
		$i = 0;
		$v = 0;
		while ($tmp = mysql_fetch_row($res))
			{
				$tmp[2] = stripslashes($tmp[2]);
				$chemin = "photos_ecole/";
				$chemin .= $tmp[2];
				$tableau[$i++] = $chemin;
				$table_id[$v++] = $tmp[1];
			}
	}
?>
    <td width="134" rowspan="6" bgcolor="#FFFFFF" align="center"><?php  echo "<a href='visite_fiche.php?id=$table_id[0]'>"; ?><img src="<?php  echo $tableau[0];?>" width='100' height='73' border="0" alt="<?php  echo $tmp[2];?>"/></td>
    <td width="106" rowspan="6" bgcolor="#FFFFFF" align="right"><?php  echo "<a href='visite_fiche.php?id=$table_id[1]'>"; ?><img src="<?php  echo $tableau[1];?>" width='100' height='73' border="0" alt="<?php  echo $tmp[2];?>"/></td>
    <td width="41" rowspan="6"><img src="images/ecoles_06.jpg" width="41" height="122" alt="Top 5 Ecoles J Life" /></td>
  </tr>
 <?php 
$requete = "SELECT g.nom, COUNT(DISTINCT u.user_id) As Nombre, g.id FROM groupe_ecole g, user u WHERE g.user_id > 1 AND g.user_id=u.user_id GROUP BY g.nom ORDER by Nombre DESC, g.nom ASC LIMIT 0,5";
$res = mysql_query($requete);
$i = 1;
while ($file = mysql_fetch_row($res))
{
	$max = 20;
	if (strlen($file[0]) >= $max)
		{
			$file[0] = substr($file[0],0,$max); 
			$espace = strrpos($file[0]," "); 
			$file[0] = substr($file[0], 0, $espace) . "...";
		}
	$onclick = "document.location.href='visite_groupe_ecole.php?nom=$file[0]&top=$i'";
	?>
		<tr bgcolor="#FFFFFF" style="cursor:pointer;" onMouseOver="this.style.background='#D6FFD6'" onMouseOut="this.style.background='#FFFFFF'" onclick="javascript:pldBoxContent.openBox('visite_groupe_ecole.php?id=<?php echo "$file[2]&nom=$file[0]&top=$i";?>')">
	<?php 
echo "<td align=left width=138 style='border-bottom:1px solid #00FF66;' valign='middle'><span class='ecoleIndex'>&nbsp;&nbsp;&nbsp;".$file[0]."</h1></span></td><td align=right width=70 style='border-bottom:1px solid #00FF66;'><span style='color:#52E373;font-size:11px;border-right:1px solid #00FF66;'>&nbsp;</span></td></tr>";
	$i++;
}
?>
  <tr>
    <td colspan="6"><img src="images/ecoles_07.jpg" width="700" height="13" alt="" /></td>
  </tr>
</table>
<table id="Table_02" width="700" height="146" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6"><img src="images/vacances_01.jpg" width="700" height="19" alt="Top 5 Vacances J Life" /></td>
  </tr>
  <tr>
    <td width="211" rowspan="6"><img src="images/vacances_02.jpg" width="211" height="122" alt="Top 5 Vacances J Life" /></td>
    <td colspan="2" bgcolor="#FFFFFF" valign="bottom"><div class="roundedcornr_box_905892">
   <div class="roundedcornr_top_905892"><div></div></div>
      <div class="roundedcornr_content_905892" align="center"><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF6600"><b>TOP 5 VACANCES</b></font></div>
   <div class="roundedcornr_bottom_83717"><div></div></div>
</div></td>
 <?php 
$sql = "SELECT id, user_id, nom FROM photos_vacance WHERE taille < 300000 AND validation='2' ORDER BY RAND() LIMIT 2";
$res = mysql_query($sql);
$num_rows = mysql_num_rows($res);
if ($num_rows != 0)
	{
		$i = 0;
		$v = 0;
		while ($tmp = mysql_fetch_row($res))
			{
				$tmp[2] = stripslashes($tmp[2]);
				$chemin = "photos_vacance/";
				$chemin .= $tmp[2];
				$tableau[$i++] = $chemin;
				$table_id[$v++] = $tmp[1];
			}
	}
?>
    <td width="134" rowspan="6" bgcolor="#FFFFFF" align="center"><?php  echo "<a href='visite_fiche.php?id=$table_id[0]'>"; ?><img src="<?php  echo $tableau[0];?>" width='100' height='73' border="0" alt="<?php  echo $tmp[2];?>"></td>
    <td width="106" rowspan="6" bgcolor="#FFFFFF" align="right"><?php  echo "<a href='visite_fiche.php?id=$table_id[1]'>"; ?><img src="<?php  echo $tableau[1];?>" width='100' height='73' border="0" alt="<?php  echo $tmp[2];?>"></td>
    <td width="41" rowspan="6"><img src="images/vacances_06.jpg" width="41" height="122" alt="Top 5 Vacances J Life" /></td>
  </tr>
  <?php 
$requete = "SELECT g.ville, COUNT(DISTINCT u.user_id) As Nombre, g.id FROM groupe_vacance g, user u WHERE g.user_id > 1 AND g.user_id=u.user_id GROUP BY g.ville ORDER by Nombre DESC, g.ville ASC LIMIT 0,5";
$res = mysql_query($requete);
$i = 1;
while ($file = mysql_fetch_row($res))
{
	$max = 20;
	if (strlen($file[0]) >= $max)
		{
			$file[0] = substr($file[0],0,$max); 
			$espace = strrpos($file[0]," "); 
			$file[0] = substr($file[0], 0, $espace) . "...";
		}
	$onclick = "document.location.href='visite_groupe_vacance.php?id=$file[0]&top=$i'";
	?>
	<tr valign="top" bgcolor="#FFFFFF" style="cursor:pointer" onMouseOver="this.style.background='#FFD77B'" onMouseOut="this.style.background='#FFFFFF'" onclick="javascript:pldBoxContent.openBox('visite_groupe_vacance.php?id=<?php echo "$file[2]&nom=$file[0]&top=$i";?>')">
	<?php 
	echo "<td align=left width=138 style='border-bottom:1px solid #FF9900;' valign='middle'><span class='vacIndex'>&nbsp;&nbsp;&nbsp;".$file[0]."</span></td><td align=right width=70 style='border-bottom:1px solid #FF9900;'><span style='color:#FF9900;font-size:11px;border-right:1px solid #FF9900;'>&nbsp;</span></td></tr>";
	$i++;
}
?>
  <tr>
    <td colspan="6"><img src="images/vacances_07.jpg" width="700" height="13" alt="Top 5 Vacances J Life" /></td>
  </tr></table><table id="Table_03" width="700" height="146" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6"><img src="images/communaut_01.jpg" width="700" height="19" alt="Top 5 Communaute J Life" /></td>
  </tr>
  <tr>
    <td width="211" rowspan="6"><img src="images/communaut_02.jpg" width="211" height="122" alt="Top 5 Communaute J Life" /></td>
    <td colspan="2" bgcolor="#FFFFFF" valign="bottom"><div class="roundedcornr_box_230453">
   <div class="roundedcornr_top_230453"><div></div></div>
      <div class="roundedcornr_content_230453" align="center"><font face="Verdana, Arial, Helvetica, sans-serif" color="#1E62B4"><b>TOP 5 COMMUNAUTE</b></font></div>
   <div class="roundedcornr_bottom_83717"><div></div></div>
</div></td>
<?php 
$sql = "SELECT id, user_id, nom FROM photos_communaute WHERE taille < 300000 AND validation='2' ORDER BY RAND() LIMIT 2";
$res = mysql_query($sql);
$num_rows = mysql_num_rows($res);
if ($num_rows != 0)
	{
		$i = 0;
		$v = 0;
		while ($tmp = mysql_fetch_row($res))
			{
				$tmp[2] = stripslashes($tmp[2]);
				$chemin = "photos_communaute/";
				$chemin .= $tmp[2];
				$tableau[$i++] = $chemin;
				$table_id[$v++] = $tmp[1];
				
			}
	}
?>
    <td width="134" rowspan="6" bgcolor="#FFFFFF" align="center"><?php  echo "<a href='visite_fiche.php?id=$table_id[0]'>"; ?><img src="<?php  echo $tableau[0];?>" width='100' height='73' border="0" alt="<?php echo $tmp[2];?>"></td>
    <td width="106" rowspan="6" bgcolor="#FFFFFF" align="right"><?php  echo "<a href='visite_fiche.php?id=$table_id[1]'>"; ?><img src="<?php  echo $tableau[1];?>" width='100' height='73' border="0" alt="<?php echo $tmp[2];?>"></td>
    <td width="41" rowspan="6"><img src="images/communaut_06.jpg" width="41" height="122" alt="Top 5 Communaute J Life" /></td>
  </tr>
  <?php 
$requete = "SELECT g.nom, COUNT(DISTINCT u.user_id) As Nombre, g.id FROM groupe_communaute g, user u WHERE g.user_id > 1 AND g.user_id=u.user_id GROUP BY g.nom ORDER by Nombre DESC, g.nom ASC LIMIT 0,5";
$res = mysql_query($requete);
$i = 1;
while ($file = mysql_fetch_row($res))
{
	$max = 20;
	if (strlen($file[0]) >= $max)
		{
			$file[0] = substr($file[0],0,$max); 
			$espace = strrpos($file[0]," "); 
			$file[0] = substr($file[0], 0, $espace) . "...";
		}
	$onclick = "document.location.href='visite_groupe_communaute.php?id=$file[0]&top=$i'";
	?>
		<tr valign="top" bgcolor="#FFFFFF" style="cursor:pointer" onMouseOver="this.style.background='#CCFFFF'" onMouseOut="this.style.background='#FFFFFF'" onclick="javascript:pldBoxContent.openBox('visite_groupe_communaute.php?id=<?php echo "$file[2]&nom=$file[0]&top=$i";?>')">
	<?php 
	echo "<td align=left width=138 style='border-bottom:1px solid #6BBEE7;' valign='middle'><span class='comIndex'>&nbsp;&nbsp;&nbsp;".$file[0]."</span></td><td align=right width=70 style='border-bottom:1px solid #6BBEE7;'><span style='color:#FF9900;font-size:11px;border-right:1px solid #6BBEE7;'>&nbsp;</span></td></tr>";
	$i++;
}
?>
  <tr>
    <td colspan="6"><img src="images/communaut_07.jpg" width="700" height="13" alt="Top 5 Communaute J Life" /></td>
  </tr>
</table>
<?php include("Interface/bas_index.php");?>

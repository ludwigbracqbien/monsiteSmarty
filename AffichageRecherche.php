<?php 
error_reporting(0);
include_once('includes/header.inc.php');
include_once('includes/connexion.inc.php');
session_start();
?>
	 <script language="JavaScript">// SCRIPT AFFICHAGE DES IMAGES AU CLIC
function display_photo(p_name,p_w,p_h,p_legend) {
   if (self.innerWidth) {
      winwidth = self.innerWidth;
      winheight = self.innerHeight;
   }
   else if (document.documentElement && document.documentElement.clientWidth) {
      winwidth = document.documentElement.clientWidth;
      winheight = document.documentElement.clientHeight;
   }
   else if (document.body) {
      winwidth = document.body.clientWidth;
      winheight = document.body.clientHeight;
   }
   if (Number(p_w) < winwidth) winwidth = Number(p_w);
   if (Number(p_h) < winheight) winheight = Number(p_h);
   winwidth += 8; winheight += 40;
 pwin=window.open("","","toolbar=0,location=0,directories=0,status=0,menubar=0,resizable=1,scrollbars=yes,copyhistory=0,width="+winwidth+",height="+winheight+",left=10,top=10" );
   pwin.document.write("<html><head>" );
   pwin.document.write("<title>Zoom</title>" );
   pwin.document.write("<style type=text/css>" );
   pwin.document.write("body {" );
   pwin.document.write("margin:0;" );
   pwin.document.write("padding:0;" );
   pwin.document.write("color:white;" );
   pwin.document.write("background-color:black; }" );
   pwin.document.write("</style>" );
   pwin.document.write("</head>" );
   pwin.document.write("<body>" );
   pwin.document.write("<img src="+p_name+" width="+p_w+" height="+p_h+">" );
   pwin.document.write("<table noborder width=100%><tr>" );
   pwin.document.write("<form><td align=left>"+p_legend+"</td>" );
   pwin.document.write("<td align=right><input type='button' value='Fermer' onClick='window.close()'></td>" );
   pwin.document.write("</tr></table></form>" );
   pwin.document.write("</body></html>" );
}
</script>
<?php


if(isset($_POST['recherche']))//PASSAGE PAR POST (provient de la page d'index)
$MotCle=$_POST['recherche'];
else							//PASSAGE PAR GET(Transfert du mot clé à travers la pagination)
$MotCle=$_GET['recherche2'];

$sql2="select COUNT(*) from articles where Titre LIKE '%$MotCle%' OR Texte LIKE '%$MotCle%' AND Statut='1'";
$req2=mysql_query($sql2);
while ($donnees2 = mysql_fetch_array($req2) ) 
				{	
					$NbOccure=$donnees2[0];
				}

				
if(($MotCle!="")&&($NbOccure!=0))
{

?>
<div class="span8">
          	<!-- notifications -->
      	
          	<!-- contenu -->
     <center><img src="img/Recherche.png"></center>
	 <br><br><br><br>
<?php


$page=(isset($_GET['page'])) ? $_GET['page'] : 1;

$nbArticleParPage=2;

$nbTotalDePAge= ceil($NbOccure/$nbArticleParPage);
$debut=($page - 1 )* $nbArticleParPage;


$sql="select Titre,Texte,Date,ID_article from articles where Titre LIKE '%$MotCle%' OR Texte LIKE '%$MotCle%' AND Statut='1'ORDER BY Date DESC LIMIT $debut,$nbArticleParPage";







/*


$sql="select Titre,Texte,Date,ID_article from articles where Titre LIKE '%$MotCle%' OR Texte LIKE '%$MotCle%' AND Statut='1' ORDER BY Date DESC";
*/
$req1=mysql_query($sql);
while ($donnees1 = mysql_fetch_array($req1) ) 
				{							
					echo'<center>';
						echo '<img src="img/ligne.jpg">';
						echo'<td><tr width="250">';
						echo'<table border=5><tr><td>';
						$VarId=$donnees1["ID_article"];
						//$VarId=(int)$VarId++;
						//echo "Admin/img/$VarId.jpg";
						$VarId=$donnees1["ID_article"];
						$Link="Admin/img/$VarId.jpg";
						?>
						<a href="javascript:display_photo('<?php echo $Link;?>','1160','828','<?php echo $donnees1["Titre"];?>')">
						<img src=<?php echo $Link;?> style="width:100px; height:100px;">
						</a>
						
						<?php
						
						echo'</td></tr></table>';
						echo'</center>';
						
						
						echo '<br>';
						echo '<center>';
																	
						echo	"<h3>";		
						echo	$Titre=$donnees1["Titre"];
						echo	"</h3>";	
						echo 	'<br>';	
						echo 	'<p>';							
						echo	$Texte=$donnees1["Texte"];
						echo 	'</p>';	
						echo 	'<br>';				
						
						echo 	'<br>';	
						echo 	'<br>';
						echo 	'<strong>Ecrit le : </strong>';	
						echo 	'<br>';	
								$Dat=$donnees1["Date"];
								list($annee, $mois,$jour ) = explode('-', $Dat);
						echo 	'<p><em>';
						echo	$DateBonFormat=$jour."/".$mois."/".$annee;
						echo 	'</p></em>';
						?><table ><tr><td>
						<form action="articles.php?id=<?php echo $donnees1['ID_article']?>">
						<input type="submit" class="btn2" value="Modifier">
						</form>
						</td><td>
						<form action="Admin/SupressionArticles.php?id=<?php echo $donnees1['ID_article']?>">
						<input type="submit" class="btn2" value="Supprimer">
						</form>
						</td></tr></table><?php
						echo 	'<br>';	
						
						echo 	'<br>';								
						
						echo '</center>';
						
						
				}
				
	?>			
				
				
			<br><br><br><center>
<div class="badge">
<table><tr>

<td>
<?php
if($page==1)
{			
echo"<a href=AffichageRecherche.php?page=$page&recherche2=$MotCle><img src='img/flecheG.jpg'></a>";
}
else																		//IMG FLECHE G
{
$page--;
echo"<a href=AffichageRecherche.php?page=$page&recherche2=$MotCle><img src='img/flecheG.jpg'></a>";
$page++;
}
?>

<?php
echo'</td><td>';
echo'PAGES :';		
echo'</td><td width=5>  </td>';
for($i=1;$i<=$nbTotalDePAge;$i++)			//NUMEROS DE PAGES
{

if($i==$page)
{
echo'<td>';						
echo"<a href=AffichageRecherche.php?page=$i&recherche2=$MotCle><font color=green size=3>$i</font></a>";
echo'</td>';
echo'<td width=5>';
echo'</td>';
}
else
{
echo'<td>';						
echo"<a href=AffichageRecherche.php?page=$i&recherche2=$MotCle>$i</a>";
echo'</td>';
echo'<td width=5>';
echo'</td>';
}
}
echo'<td>';


if($page==$nbTotalDePAge)
{			
echo"<a href=AffichageRecherche.php?page=$page&recherche2=$MotCle><img src='img/flecheD.jpg'></a>";
}
else	
{

$page++;

echo"<a href=AffichageRecherche.php?page=$page&recherche2=$MotCle><img src='img/flecheD.jpg'></a>";
}
echo'</td>';
?>
</tr>
</table>
</div></center>	
						
				
			
          </div>
		  <?php
 include_once('includes/menu.inc.php');         
       ?>  
<?php
include_once('includes/pied_pages.inc.php');
}
else
{?>
 
		<SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = 'index.php?TestRecherche=1'
		</SCRIPT>
	
 
<?php	
}
?>
      

    </div>

  </body>
</html>
			
				
				
				
				
				


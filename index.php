<?php
include_once('includes/header.inc.php');
include_once('includes/connexion.inc.php');
error_reporting(0);
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

   
function loadPage() {
self.location.href="http://index.php";
}

}

</script>
<?php
if(isset($_SESSION['nom']))
{	
	?> 
    <div class="span8">
		<!-- notifications -->
				
		<!-- contenu -->      
		<center>
			<a href="#" class="info"><img src="img/Lesarticles.png"><span>Voici l'intégralité des articles disponibles, ils sont paginé par 2, vous pouvez les modifier ou les supprimer</span></a>
		 
		</center>
		<br><br><br><br>	  
		<?php	  
			  
		$page=(isset($_GET['page'])) ? $_GET['page'] : 1;// Si la valeur de la page n'est pas dans l'url on l'affecte à 1

		if(isset($_POST['nbArtParPage'])) //Si la variable $_POST['nbArtParPage'] existe on la tranfére dans une variable de session pour la garder pour les pages suivantes
		{									// (procédé pour la fonctionnalité du nombre d'articles par page)
			$_SESSION['nbArtParPage']=$_POST['nbArtParPage'];
			$nbArticleParPage=$_SESSION['nbArtParPage'];
		}
		else
		{
			if(!isset($_SESSION['nbArtParPage'])) //Si la variable $_SESSION['nbArtParPage'] n'existe pas on fixe le nombre d'article arbitrairement à 2
			{
				$nbArticleParPage=2;
			}
			else									//Sinon on récupére la varible contenu dans notre variable de session pour l'exploiter
			{
				$nbArticleParPage=$_SESSION['nbArtParPage'];
			}
		}

		$sql=("SELECT COUNT(*) AS nbarticle FROM articles WHERE Statut=1");  //Requete de contage d'occurence similaire dans la base de données
		$result=mysql_query($sql); //On exécute la requete
		$data=mysql_fetch_array($result); //On mets en forme le résultat dans un tableau
		$total=$data['nbarticle']; //on extrait le résultat

		$nbTotalDePAge= ceil($total/$nbArticleParPage);
		$debut=($page - 1 )* $nbArticleParPage;

		$sql2=("Select ID_article,Texte,Titre,DATE_FORMAT(Date,'%d/%m/%Y') as Date_fr FROM articles WHERE Statut=1 ORDER BY Date DESC LIMIT $debut,$nbArticleParPage");
		$result2=mysql_query($sql2);

		echo'<center>';
		echo'<img src="img/ligne.jpg">';
		echo'</center>';
		
		while ($donnees1 = mysql_fetch_array($result2) ) //On parcourt les résultats,tout en affichant chaque articles 
			{	
				echo'<center>';
				echo'<td><tr width="250">';
				echo'<table border=5><tr><td>';
				$VarId=$donnees1["ID_article"];
				$Link="Admin/img/$VarId.jpg";
				?>
				<a href="javascript:display_photo('<?php echo $Link;?>','750','750','<?php echo $donnees1["Titre"];?>')"> <!-- Affichage de l'image associé avec agrandissement au clic --> 
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
				echo 	'Ecrit le : ';	
				echo 	'<br>';			
				echo 	'<p><em>';
				echo	$Dat=$donnees1["Date_fr"];
				echo 	'</p></em>';
				?><table ><tr><td>
				<a href="articles.php?id=<?php echo $donnees1['ID_article']?>" class="btn2">Modifier </a href></td><td><!-- Modifier l'article --> 
				<a href="Admin/SupressionArticles.php?id=<?php echo $donnees1['ID_article']?>" class="btn2">Supprimer </a href><!-- Supprimer l'article --> 
				</td></tr></table><?php
				echo 	'<br>';							
				echo 	'<br>';								
				echo '<img src="img/ligne.jpg">'; //Ligne de séparation d'articles
				echo '</center>';								
			}				
		?>
		<br><br><br><center>
		<div class="badge">
		<table><tr>
		<td>
		<?php									//Mécanisme de pagination avec affichage de fléche et de numéro
		if($page==1)
		{			
			echo"<a href=index.php?page=$page><img src='img/flecheG.jpg'></a>";
		}
		else																		//IMG FLECHE Gauche pour reculer d'une page, si possible
		{
			$page--;
			echo"<a href=index.php?page=$page><img src='img/flecheG.jpg'></a>";
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
				echo"<a href=index.php?page=$i><font color=green size=3>$i</font></a>";
				echo'</td>';
				echo'<td width=5>';
				echo'</td>';
			}
			else
			{
				echo'<td>';						
				echo"<a href=index.php?page=$i>$i</a>";
				echo'</td>';
				echo'<td width=5>';
				echo'</td>';
			}
		}
		echo'<td>';


		if($page==$nbTotalDePAge)
		{			
			echo"<a href=index.php?page=$page><img src='img/flecheD.jpg'></a>";
		}
		else																				//IMG FLECHE Droite pour avancer d'une page, si possible 
		{
			$page++;
			echo"<a href=index.php?page=$page><img src='img/flecheD.jpg'></a>";
		}
		echo'</td>';
		?>
		</tr>
		</table>
		</div>
		</center>
		<div align="center">
		<div class="badge">
		<table>
		<tr><td>
		Nombre d'articles par page :
		</td></tr><tr><td>
		<FORM method="post" name="nbArt" action="index.php?page=1">
		<SELECT name="nbArtParPage"  action="" onchange="btnvalider.click();" style="width:60px"><!-- PERMET DE SELECTIONNER LE NOMBRE D'ARTICLES PAR PAGE, avec validation auto, sans bouton apparent. --> 
		<OPTION>
		<OPTION>1
		<OPTION>2
		<OPTION>3
		<OPTION>4
		<OPTION>5
		</SELECT>
		<input type="submit" id="monBouton" name="btnvalider" value="Valider">
		<script language="javascript" type="text/javascript">
			document.getElementById('monBouton').style.display = 'none';
		</script>
		</FORM>
		</td></tr></table>
		</div></div>
		<br><br><br><br>         
		</div>
			  <?php
	}
	else
	{


		echo"<img src=img/Desole.png></td><td>";


	}
	include_once('includes/menu.inc.php');         
	include_once('includes/pied_pages.inc.php');
	?>     
</div>

</body>

</html>
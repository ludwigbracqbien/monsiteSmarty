<?php 
error_reporting(0);
include_once('includes/header.inc.php');
include_once('includes/connexion.inc.php');
$IdArt=$_GET['IdArtCom']; //Récupération du l'ID de l'article, avec passage par l'Url.
 //Récupération du Nb de Com Associé à l'article, avec passage par l'Url.
?>
<script language="JAVASCRIPT">// SCRIPT AFFICHAGE DES IMAGES AU CLIC ET SCRIPT VERIFICATION DU FORMULAIRE
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
function validationFormulaire()
{
var Pseudo=document.forms["comment"]["Pseudo"].value;
var Mail=document.forms["comment"]["Mail"].value;
var Com=document.forms["comment"]["Com"].value;

if((Pseudo.length==0)&&(Mail.length==0)&&(Com.length==0))
{
alert('Vous n\'avez pas écrit de pseudo,d\'adresse mail, et de commentaire !');
return false;
}
 
if((Pseudo.length==0)&&(Mail.length==0))
{
alert('Vous n\'avez pas écrit de pseudo,et d\'adresse mail!');
return false;
} 
 
if((Pseudo.length==0)&&(Com.length==0))
{
alert('Vous n\'avez pas écrit de pseudo, et de commentaire !');
return false;
} 
  
 
if((Mail.length==0)&&(Com.length==0))
{
alert('Vous n\'avez pas écrit d\'adresse mail, et de commentaire !');
return false;
} 
  
if(Pseudo.length==0)
{
alert('Vous n\'avez pas saisi de pseudo!');
return false;
}
 
if(Mail.length==0)
{
alert('Vous n\'avez pas saisi d\'adresse mail!');
return false;
} 

if(Com.length==0)
{
alert('Vous n\'avez pas saisi de commentaire!');
return false;
} 
}   
   

</script>
<?php

echo"<div class=span8>";						//Requete d'affichage de l'article ciblé par les commentaires
$sql2=("Select ID_article,Texte,Titre,DATE_FORMAT(Date,'%d/%m/%Y') as Date_fr FROM articles WHERE ID_article=$IdArt");
$result2=mysql_query($sql2);
echo'<center>';
echo'<img src="img/ligne.jpg">';
echo'</center>';
	while ($donnees1 = mysql_fetch_array($result2) ) //On parcourt le résultat en affichant les données
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
		echo 	'Ecrit le : ';	
		echo 	'<br>';			
		echo 	'<p><em>';
		echo	$Dat=$donnees1["Date_fr"];
		echo 	'</p></em>';
		echo 	'<br>';							
		echo 	'<br>';	
		echo '<img src="img/ligne.jpg">'; //Ligne de séparation d'articles
		echo '</center>';									
	}
	
$sql2="select COUNT(*) from commentaires where ID_article_Com='$VarId'";  //Requete de récupération du nombres de Com par article
$req2=mysql_query($sql2);
while ($donnees2 = mysql_fetch_array($req2) ) 
	{	
		$NbCom=$donnees2[0];
	}	
	
if($NbCom>0)  //On vérifie le nombre de commentaires pour savoir si on les affiches ou pas
{
?>
	<h2>Commentaires:</h2>
<?php							//Requete d'affichage des commentaires correspondant à l'article
	$sql=("Select Commentaire,Mail,pseudo,DATE_FORMAT(Date_Com,'%d/%m/%Y') as Date_fr FROM commentaires WHERE ID_article_Com=$IdArt");
	$result=mysql_query($sql);
	echo"<center>";
	echo"<div class=Commentaires>";
	while ($donnees = mysql_fetch_array($result) ) 
		{		
			echo"<i>Commentaire de<strong> $donnees[pseudo] </strong>le $donnees[Date_fr] :</i>";
			echo"<br>";		
			echo"<i>Contact: $donnees[Mail] </i>";
			echo"<br><br>";					
			echo"$donnees[Commentaire]";					
			echo"<br>";
			echo"<img src=img/LigneBlanche.png>";
			echo"<br>";
		}
	echo"</div>";
	echo"</center>";
}
?>
						<!-- Formulaire d'ajout de commentaires !-->
<h2>Ajouter un commentaire:</h2>
<div class="badge">
<form method="post" name="comment" action="Admin/AjoutCommentaire.php" onsubmit="javascript:return validationFormulaire();">
<dd>Pseudo :</dd>
<dd><input type="text" name="Pseudo"></dd><br>
<dd>Mail:</dd>
<dd><input type="text" name="Mail"></dd><br>
<dd>Commentaire:</dd>
<dd><textarea name="Com" style="width: 400px; height: 200px;"></textarea></dd>
<input type="hidden" name="idart" value="<?php echo $IdArt;?>">
<dd><input type="submit" value="Envoyer"></dd>
</form>
</div>

<?php		
		
echo"</div>"; 	
include_once('includes/menu.inc.php'); 
      
include_once('includes/pied_pages.inc.php');

?>



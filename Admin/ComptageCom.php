<?php 
error_reporting(0);

include_once('../includes/connexion.inc.php');


$sql2="select COUNT(*) from commentaires where ID_article_Com='$VarId'";  //Requete de récupération du nombres de Com par article
$req2=mysql_query($sql2);
while ($donnees2 = mysql_fetch_array($req2) ) 
	{	
		$NbOccure=$donnees2[0];
	}
echo"<center>";				
if($NbOccure==0)//Aucun Commentaire existant
{
	echo"<a href=Commentaires.php?IdArtCom=$VarId>0 commentaires</a >"; 
	
}
else // Un ou des commentaires existant
{	
	echo"<a href=Commentaires.php?IdArtCom=$VarId>$NbOccure commentaires</a >";
	
}
echo"</center>";


?>
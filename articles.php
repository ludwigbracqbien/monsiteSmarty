<?php
include_once('includes/header.inc.php');
include_once('includes/connexion.inc.php');
require_once('libs/Smarty.class.php');//On inclut la classe Smarty
error_reporting(0);

?>

<?php
$smarty=new Smarty();   //On instancie un objet de type Smarty
$id=NULL;	//Initialisation de la variable a NULL

if(isset($_GET['id']))  //Si la variable $_GET['id'] existe
{
$id=$_GET['id'];
$sql="SELECT * FROM articles WHERE ID_article=$id";
$req1=mysql_query($sql);



while ($donnees1 = mysql_fetch_array($req1) ) //Extraction des données
				{	
					$Titre=$donnees1["Titre"];
					$Texte=$donnees1["Texte"];
					$Statut=$donnees1["Statut"];
					
				}
$smarty->assign("Titre",$Titre); //Assignation des variables vers Smarty
$smarty->assign("Texte",$Texte);	
$smarty->assign("Statut",$Statut);		
}
$smarty->assign("id",$id);
$smarty->display('templates/articles.tpl');//Affichage de la page Smarty
include_once('includes/menu.inc.php');         
include_once('includes/pied_pages.inc.php');

      

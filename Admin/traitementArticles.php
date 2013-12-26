<?php
error_reporting(0);
include_once('..//includes/connexion.inc.php');

//Récupération des variables en POST
$Text=$_POST['texte'];
$Publication=$_POST['publication'];
$Titre=$_POST['titre'];
	

if(empty($_POST['image']))
{
	$erreur_image=$_FILES['image']['error'];  //ok
	
	}
else
{
	$erreur_image=""; //Pas bon
	
	}
	
if(isset($_POST['titre']))		//Si la variable $_POST['titre'] existe
{	
	if(isset($_POST['publication'])) //Si la variable $_POST['publication'] existe (Récupération ou pas du formulaire)
			$Etat=1;
		else
			$Etat=0;
			
	$Date=date("Y-m-d");	//Mise en forme de la date
	if(isset($_GET['id']))  //Si la variable $_GET['id'] existe ( CAS ARTICLE EXISTANT)
		{
			$id=$_GET['id'];				//Requete de mise à jour de l'article
			$sql=("UPDATE articles SET ID_article='$id', Titre='$Titre',Texte='$Text',Date='$Date',Statut='$Etat' WHERE ID_article='$id'");
			mysql_query($sql);	
			move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) ."/img/$id.jpg");
		}
	else		//CAS ARTICLE INEXISTANT			
		{	
			if(isset($_POST['publication']))
				$Etat=1;
			else
				$Etat=0;
						//Requete d'insertion (CREATION DE L'ARTICLE)
		$sql=("INSERT INTO articles (Titre,Texte,Date,Statut) VALUES('$Titre','$Text','$Date','$Etat')");
		print_r($sql);
		mysql_query($sql);
		$id=mysql_insert_id(); //Récupération de l'ID associé		
		move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) ."/img/$id.jpg");// Copie de l'image vers le serveur		
		}	
}	
?>		
		
		 <SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = '..//index.php'; // Redirection JavaScript
		</SCRIPT>
	



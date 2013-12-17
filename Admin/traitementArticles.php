<?php
error_reporting(0);
include_once('..//includes/connexion.inc.php');

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
	

	
	
if(isset($_POST['titre']))
{	
if(isset($_POST['publication']))
			$Etat=1;
		else
			$Etat=0;
			
$Date=date("Y-m-d");
if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$sql=("UPDATE articles SET ID_article='$id', Titre='$Titre',Texte='$Text',Date='$Date',Statut='$Etat' WHERE ID_article='$id'");
		mysql_query($sql);	
		move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) ."/img/$id.jpg");
		
	
	
	}
  else
   {
	
	if(isset($_POST['publication']))
			$Etat=1;
		else
			$Etat=0;
		$sql=("INSERT INTO blog.articles (Titre,Texte,Date,Statut) VALUES('$Titre','$Text','$Date','$Etat')");
		
		mysql_query($sql);
		$id=mysql_insert_id();		
		move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) ."/img/$id.jpg");
		
    }
	
}

	
	
?>		
		
		 <SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = '..//index.php';
		</SCRIPT>
	



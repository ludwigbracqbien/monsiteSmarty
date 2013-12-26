<?php
include_once('..//includes/connexion.inc.php');
session_start();

$mail=$_POST['mail'];
$Passwd=$_POST['passwd'];

$sql="select COUNT(*) from utilisateurs where email='$mail' AND mot_de_passe='$Passwd'";// Vérification du nombre d'occurence, si ==1 Connexion autorisé
$req=mysql_query($sql);
while ($donnees = mysql_fetch_array($req) ) 
	{	
		 $NbOccure=$donnees[0];
	}
if($NbOccure==1)//CONNEXION OK
{							//Requete pour rechercher le nom et le prenom de l'user
	$sql2="select * from utilisateurs where email='$mail' AND mot_de_passe='$Passwd'";

	$req2=mysql_query($sql2);
	while ($donnees2 = mysql_fetch_array($req2) ) 
		{	
			$_SESSION['nom']=$donnees2['nom'];				//CREATION VARS SESSION
			$_SESSION['prenom']=$donnees2['prenom'];
		}
}
?>

<SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = '..//index.php'//Redirection en JavaScript
</SCRIPT>




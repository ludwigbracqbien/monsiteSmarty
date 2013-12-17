<?php
include_once('..//includes/connexion.inc.php');
session_start();

$mail=$_POST['mail'];
$Passwd=$_POST['passwd'];

$sql="select COUNT(*) from utilisateurs where email='$mail' AND mot_de_passe='$Passwd'";

$req=mysql_query($sql);

while ($donnees = mysql_fetch_array($req) ) 
				{	
					echo $NbOccure=$donnees[0];
				}
if($NbOccure==1)//CONNEXION OK
{
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
		window.location = '..//index.php'//A REFAIRE EN HEADER
</SCRIPT>




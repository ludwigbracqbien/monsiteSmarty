<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Petit blog pour m'initier à PHP">
    <meta name="author" content="Ludwig Bracqbien">
<?php
session_start();
?>
<SCRIPT LANGUAGE="JavaScript">
function validationFormulaire()
{
var x=document.forms["saisie"]["mail"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
var mdp=document.forms["saisie"]["passwd"].value;

if ((atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)&&(mdp.length==0))
  {
  alert(' Votre adresse mail n\'a pas un format valide! \n  Absence de mot de passe!');
  return false;
  }

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Votre adresse mail n'a pas un format valide");
  return false;
  }

if(mdp.length==0)
	{
	alert("Veuillez saisir un mot de passe");
	return false;

	}
}
</SCRIPT>






    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="rcss/main.css" rel="stylesheet">
	 <link href="css/perso.css" rel="stylesheet">
  </head>

  <body>
  
    <div class="container">

      <div class="content">
      
        <div class="page-header well">
			<center>
			<table><tr><td>
          <div align="left"><img src="img/Ban2Stat.jpg" style="width:900px; height:150px;"></div>
		  </td><td>&nbsp;&nbsp;</td><td>
		  <?php
		  if(!isset($_SESSION['nom']))
				{
		  ?>
		  <form name="saisie" method="post" action="Admin/TraitementAuthentification.php" onsubmit="return validationFormulaire();">
				<font face="Bauhaus 93"color="blue">Mail :</font>
				<input type="text" name="mail" >
				<font face="Bauhaus 93" color="blue">Mot de passe :</font>
				<input type="password" name="passwd">
				<input type="submit" value="Se connecter" class="bouton1">
		  
		  <?php
				}
		  
		  ?>
		  </td></tr></table>
		  </center>
		  
        </div>
        
        <div class="row">
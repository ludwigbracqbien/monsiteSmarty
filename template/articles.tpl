<head>
{literal}
<SCRIPT LANGUAGE="JavaScript">{* fonctions JavaScript  *}
function validationFormulaire()
{
var titre=document.forms["saisie"]["titre"].value;
var texte=document.forms["saisie"]["texte"].value;
var img=document.forms["saisie"]["image"].value;

if((titre.length==0)&&(texte.length==0)&&(img.length==0))
{
var reponse=confirm('Vous n\'avez pas écrit de titre,de texte, et pas selectionné d\'image. \n Voullez-vous continuer?');
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}

if((titre.length==0)&&(texte.length==0))
{
var reponse=confirm('Vous n\'avez pas écrit de titre, et de texte. \n Voullez-vous continuer?');
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}

if((titre.length==0)&&(img.length==0))
{
var reponse=confirm('Vous n\'avez pas écrit de titre, et pas selectionné d\'image. \n Voullez-vous continuer?');
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}

if((texte.length==0)&&(img.length==0))
{
var reponse=confirm('Vous n\'avez pas écrit de texte, et pas selectionné d\'image. \n Voullez-vous continuer?');
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}



if(titre.length==0)
{
var reponse=confirm("Vous n'avez pas écrit de titre, voullez-vous continuer?");
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}
if(texte.length==0)
{
var reponse=confirm("Vous n'avez pas écrit de texte, voullez-vous continuer?");
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}
if(img.length==0)
{
var reponse=confirm("Vous n'avez pas chargé de photo, voullez-vous continuer?");
if (reponse==true)
  {
  return true;
  }
else
  {
  return false;
  } 
}

return true;
}
</SCRIPT>
{/literal}
</head>
<body>
				{* Cas d'une modification, donc d'un élément deja existant  *}
{if $id!=""}

		<div class="span8">
          	<!-- notifications -->
          	<div class="badge">
          	<!-- contenu -->
         <form method="post" name="saisie" action="Admin/traitementArticles.php?id={$id}" onsubmit="return validationFormulaire();"enctype="multipart/form-data">
		 <dd>Titre :</dd>
		 <dd><input type="text" name="titre"value="{$Titre}"></dd>
		 
		 <dd>Texte :</dd>
		 <dd><textarea name='texte'style='width: 400px; height: 200px;'>{$Texte}</textarea></dd>
		 <table><tr><td>
		  <dd>Image :</dd>
		 <dd><input type="file" name="image" id="image"></dd>
		 </td><td width="150"><center>
		<img src="Admin/img/{$id}.jpg" style="height:100px; width:100px;"> 
		
		 
		 </td></center></tr></table>
		<br>
		
		
		{*Verification de l'etat actuel, deja publie ou pas *}
	<dd>Publié :</dd>
		{if $Statut==1}
		
		 <dd><input type="checkbox" checked="checked" name="publication"></dd>		
		{else}	
		 <dd><input type="checkbox"name="publication"></dd>
		{/if}
		
		 <br>
		 <dd>Validation :</dd>
		
		 <dd><input type="submit" name="validation" value="Modifier" class="btn btn-large btn-primary"></dd>
		 
		</form>
			</div>

          </div>
	
		{* Cas d'un ajout, donc element inexistant *}
{else}

          <div class="span8">
          	<!-- notifications -->
          	<div class="badge">
          	<!-- contenu -->
         <form method="post" name="saisie" action="Admin/traitementArticles.php" onsubmit="return validationFormulaire();" enctype="multipart/form-data">
		 <dd>Titre :</dd>
		 <dd><input type="text" name="titre"></dd>
		 
		 <dd>Texte :</dd>
		 <dd><textarea name="texte" style="width: 400px; height: 200px;"></textarea></dd>
		 
		  <dd>Image :</dd>
		 <dd><input type="file" name="image" ></dd>
		 
		<br>
		 <dd>Publié :</dd>
		 <dd><input type="checkbox" name="publication"></dd>
		
		 <br>
		 <dd>Validation :</dd>
		
		 <dd><input type="submit" name="validation" value="Valider" class="btn btn-large btn-primary"></dd>
		 
		</form>
			</div>

          </div>

{/if}	 

	
   

  </body>
</html>
<?php /* Smarty version Smarty-3.1.15, created on 2013-12-26 21:23:10
         compiled from "templates\articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:477152b069278c9630-52098089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a13290464b079a06a34ffbb8cfe7f5974c023a' => 
    array (
      0 => 'templates\\articles.tpl',
      1 => 1388089378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '477152b069278c9630-52098089',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b069279f5869_99216250',
  'variables' => 
  array (
    'id' => 0,
    'Titre' => 0,
    'Texte' => 0,
    'Statut' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b069279f5869_99216250')) {function content_52b069279f5869_99216250($_smarty_tpl) {?><head>
<SCRIPT LANGUAGE="JavaScript">


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
</head>
<body>
				
<?php if ($_smarty_tpl->tpl_vars['id']->value!='') {?>

		<div class="span8">
          	<!-- notifications -->
          	<div class="badge">				
          	<!-- contenu -->
         <form method="post" name="saisie" action="Admin/traitementArticles.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onsubmit="javascript:return validationFormulaire();"enctype="multipart/form-data">
		 <dd>Titre :</dd>
		 <dd><input type="text" name="titre"value="<?php echo $_smarty_tpl->tpl_vars['Titre']->value;?>
"></dd>
		 
		 <dd>Texte :</dd>
		 <dd><textarea name='texte'style='width: 400px; height: 200px;'><?php echo $_smarty_tpl->tpl_vars['Texte']->value;?>
</textarea></dd>
		 <table><tr><td>
		  <dd>Image :</dd>
		 <dd><input type="file" name="image" id="image"></dd>
		 </td><td width="150"><center>
		<img src="Admin/img/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.jpg" style="height:100px; width:100px;"> 
		
		 
		 </td></center></tr></table>
		<br>
		
		
		
	<dd>Publié :</dd>
		<?php if ($_smarty_tpl->tpl_vars['Statut']->value==1) {?>
		
		 <dd><input type="checkbox" checked="checked" name="publication"></dd>		
		<?php } else { ?>	
		 <dd><input type="checkbox"name="publication"></dd>
		<?php }?>
		
		 <br>
		 <dd>Validation :</dd>
		
		 <dd><input type="submit" name="validation" value="Modifier" class="btn btn-large btn-primary"></dd>
		 
		</form>
			</div>

          </div>
	
		
<?php } else { ?>

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

<?php }?>	 

	
   

  </body>
</html><?php }} ?>

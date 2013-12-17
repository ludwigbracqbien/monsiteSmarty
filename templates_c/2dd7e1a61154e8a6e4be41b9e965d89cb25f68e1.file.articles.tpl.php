<?php /* Smarty version Smarty-3.1.15, created on 2013-12-03 14:04:47
         compiled from "template\articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108865294b9ebcb81a1-67558861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dd7e1a61154e8a6e4be41b9e965d89cb25f68e1' => 
    array (
      0 => 'template\\articles.tpl',
      1 => 1386075854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108865294b9ebcb81a1-67558861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294b9ebd65186_68159760',
  'variables' => 
  array (
    'id' => 0,
    'Titre' => 0,
    'Texte' => 0,
    'Statut' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294b9ebd65186_68159760')) {function content_5294b9ebd65186_68159760($_smarty_tpl) {?><head>

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

</head>
<body>
				
<?php if ($_smarty_tpl->tpl_vars['id']->value!='') {?>

		<div class="span8">
          	<!-- notifications -->
          	<div class="badge">
          	<!-- contenu -->
         <form method="post" name="saisie" action="Admin/traitementArticles.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onsubmit="return validationFormulaire();"enctype="multipart/form-data">
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

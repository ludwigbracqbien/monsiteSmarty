<?php /* Smarty version Smarty-3.1.15, created on 2013-11-26 18:20:38
         compiled from "template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122665294cdd39590b4-10035701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1330b55f35665f430ce9b8167feebce9b68bc0a' => 
    array (
      0 => 'template\\index.tpl',
      1 => 1385486437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122665294cdd39590b4-10035701',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294cdd3a4aa80_25774850',
  'variables' => 
  array (
    'TestConnecte' => 0,
    'TabDonnees' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294cdd3a4aa80_25774850')) {function content_5294cdd3a4aa80_25774850($_smarty_tpl) {?>
 <script language="JavaScript">// SCRIPT AFFICHAGE DES IMAGES AU CLIC
function display_photo(p_name,p_w,p_h,p_legend) {
   if (self.innerWidth) {
      winwidth = self.innerWidth;
      winheight = self.innerHeight;
   }
   else if (document.documentElement && document.documentElement.clientWidth) {
      winwidth = document.documentElement.clientWidth;
      winheight = document.documentElement.clientHeight;
   }
   else if (document.body) {
      winwidth = document.body.clientWidth;
      winheight = document.body.clientHeight;
   }
   if (Number(p_w) < winwidth) winwidth = Number(p_w);
   if (Number(p_h) < winheight) winheight = Number(p_h);
   winwidth += 8; winheight += 40;
 pwin=window.open("","","toolbar=0,location=0,directories=0,status=0,menubar=0,resizable=1,scrollbars=yes,copyhistory=0,width="+winwidth+",height="+winheight+",left=10,top=10" );
   pwin.document.write("<html><head>" );
   pwin.document.write("<title>Zoom</title>" );
   pwin.document.write("<style type=text/css>" );
   pwin.document.write("body {" );
   pwin.document.write("margin:0;" );
   pwin.document.write("padding:0;" );
   pwin.document.write("color:white;" );
   pwin.document.write("background-color:black; }" );
   pwin.document.write("</style>" );
   pwin.document.write("</head>" );
   pwin.document.write("<body>" );
   pwin.document.write("<img src="+p_name+" width="+p_w+" height="+p_h+">" );
   pwin.document.write("<table noborder width=100%<?php ?>><tr>" );
   pwin.document.write("<form><td align=left>"+p_legend+"</td>" );
   pwin.document.write("<td align=right><input type='button' value='Fermer' onClick='window.close()'></td>" );
   pwin.document.write("</tr></table></form>" );
   pwin.document.write("</body></html>" );
}

// conteneur de l'image zoomée
document.write('<div id="zoomde_image" style="position:absolute; visibility:hidden; left:-286px; top:0px; z-index:1000">');
document.write('<img id="imgzoomde_image" src="" style="position:absolute; left:-150px; top:20px; z-index:2000;" />');
document.write('</div>');
// affiche l'image au niveau du curseur
function overImage(imgUrl) {
    document.getElementById("zoomde_image").style.visibility = "visible";
    document.getElementById("imgzoomde_image").src = imgUrl;
    document.onmousemove = moveImage;
}
// masque l'image
function outImage() {
    document.getElementById("zoomde_image").style.visibility = "hidden";
    document.getElementById("imgzoomde_image").src = "";
    document.onmousemove = "";
}
// permet d'afficher l'image lorsque la souris bouge dans l'image
function moveImage(event) {
    // position
    var x = event.pageX + 5;
    var y = event.pageY + 5;
    // placement
    document.getElementById("zoomde_image").style.left = x + "px";
    document.getElementById("zoomde_image").style.top = y + "px";
}
</script>



<?php if ($_smarty_tpl->tpl_vars['TestConnecte']->value!='') {?>
	<div class="span8">
          	<!-- notifications -->
          	
          	<!-- contenu -->
     <center>
	 <a href="#" class="info"><img src="img/Lesarticles.png"><span>Voici l'intégralité des articles disponibles, ils sont paginé par 2, vous pouvez les modifier ou les supprimer</span></a>
	 
	 </center>
	 <br><br><br><br>
	 <center>
	 <img src="img/ligne.jpg">
	 </center>
	 
<?php  $_smarty_tpl->tpl_vars['donnees'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnees']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TabDonnees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnees']->key => $_smarty_tpl->tpl_vars['donnees']->value) {
$_smarty_tpl->tpl_vars['donnees']->_loop = true;
?>

						<center>
						<td><tr width="250">
						<table border="5"><tr><td>
						<a href="javascript:display_photo('<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Link'];?>
','750','750','<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Titre'];?>
')">
						<img src="<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Link'];?>
" style="width:100px; height:100px;">
						</a>
														
						</td></tr></table>
						</center>										
					    <br>
						<center>																	
						<h3>	
						<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Titre'];?>

						</h3>	
						<br>
						<p>						
						<?php echo $_smarty_tpl->tpl_vars['donnees']->value['Texte'];?>

						</p>
						<br>			
						
						<br>
						<br>
						Ecrit le : 	
						<br>
						<p><em>
						<?php echo $_smarty_tpl->tpl_vars['donnees']->value["Date_fr"];?>

						</p></em>
						
						
						<table border="2"><tr><td>
						<a href="articles.php?id=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['ID_article'];?>
">Modifier </a href></td><td>
						<a href="Admin/SupressionArticles.php?id=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['ID_article'];?>
">Supprimer </a href>
						</td></tr></table>
						<br>	
						
						<br>								
						<img src="img/ligne.jpg">
						</center>




<?php } ?>
	 
	 
	 
	 
	 
	 
	 
	 
	 
<?php }?>

<?php }} ?>

{literal}
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
   pwin.document.write("<table noborder width=100%><tr>" );
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
{/literal}


{if $TestConnecte!=""}
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
	 
{foreach $TabDonnees as $donnees}

						<center>
						<td><tr width="250">
						<table border="5"><tr><td>
						<a href="javascript:display_photo('{$donnees['Link']}','750','750','{$donnees['Titre']}')">
						<img src="{$donnees['Link']}" style="width:100px; height:100px;">
						</a>
														
						</td></tr></table>
						</center>										
					    <br>
						<center>																	
						<h3>	
						{$donnees['Titre']}
						</h3>	
						<br>
						<p>						
						{$donnees['Texte']}
						</p>
						<br>			
						
						<br>
						<br>
						Ecrit le : 	
						<br>
						<p><em>
						{$donnees["Date_fr"]}
						</p></em>
						
						
						<table border="2"><tr><td>
						<a href="articles.php?id={$donnees['ID_article']}">Modifier </a href></td><td>
						<a href="Admin/SupressionArticles.php?id={$donnees['ID_article']}">Supprimer </a href>
						</td></tr></table>
						<br>	
						
						<br>								
						<img src="img/ligne.jpg">
						</center>




{/foreach}
	 
	 
				<br><br><br><center>
				<div class="badge">
				<table><tr>

				<td>
				{if $page==1}
				<a href="index.php?page={$page}"><img src='img/flecheG.jpg'></a>
				{else}
				<a href="index.php?page={$page}"><img src='img/flecheG.jpg'></a>								
				{/if}
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
{/if}


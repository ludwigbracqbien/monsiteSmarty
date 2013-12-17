 <?php
include_once('includes/header.inc.php');
include_once('includes/connexion.inc.php');
require_once("libs/smarty.class.php");//On inclut la classe Smarty
//error_reporting(0);
$smarty=new Smarty();
//$smarty->assign("Titre",$Titre);


if(isset($_SESSION['nom']))
{	
	

		

$page=(isset($_GET['page'])) ? $_GET['page'] : 1;

$nbArticleParPage=2;

$sql=("SELECT COUNT(*) AS nbarticle FROM articles WHERE Statut=1");
$result=mysql_query($sql);
$data=mysql_fetch_array($result);
$total=$data['nbarticle'];

$nbTotalDePAge= ceil($total/$nbArticleParPage);
$debut=($page - 1 )* $nbArticleParPage;

$sql2=("Select ID_article,Texte,Titre,DATE_FORMAT(Date,'%d/%m/%Y') as Date_fr FROM articles WHERE Statut=1 ORDER BY Date DESC LIMIT $debut,$nbArticleParPage");
$result2=mysql_query($sql2);
$Tabdonnees=array();
$i=0;
while ($donnees1 = mysql_fetch_array($result2) ) 
				{	
				
						$VarId=$donnees1["ID_article"];
						$Tabdonnees[]=$donnees1;
						$Tabdonnees[$i]['Link']="Admin/img/$VarId.jpg";
						
						
						
						
						
		
				$i++;
				//print_r($Tabdonnees);
				}
$smarty->assign("TabDonnees",$Tabdonnees);
$smarty->assign("page",$page);

if($page==1)
{			
}
else																		//IMG FLECHE G
{
$page--;
$smarty->assign("page",$page);
$page++;
}
?>

<?php
echo'</td><td>';
echo'PAGES :';		
echo'</td><td width=5>  </td>';
for($i=1;$i<=$nbTotalDePAge;$i++)			//NUMEROS DE PAGES
{

if($i==$page)
{
echo'<td>';						
echo"<a href=index.php?page=$i><font color=green size=3>$i</font></a>";
echo'</td>';
echo'<td width=5>';
echo'</td>';
}
else
{
echo'<td>';						
echo"<a href=index.php?page=$i>$i</a>";
echo'</td>';
echo'<td width=5>';
echo'</td>';
}
}
echo'<td>';


if($page==$nbTotalDePAge)
{			
echo"<a href=index.php?page=$page><img src='img/flecheD.jpg'></a>";
}
else	
{

$page++;

echo"<a href=index.php?page=$page><img src='img/flecheD.jpg'></a>";
}
echo'</td>';
?>
</tr>
</table>
</div></center>
<?php







//FIN PARTIE		
				
				
			
				


		 
            
          ?>
		  <br><br><br><br>
          
		  
		  </div>
		  <?php
}
else
{


echo"<img src=img/Desole.png></td><td>";


}
*/

}
$smarty->assign("TestConnecte",$_SESSION['nom']);
$smarty->display('template/index.tpl');

 include_once('includes/menu.inc.php');         
       ?>  
<?php
include_once('includes/pied_pages.inc.php');


?>
      

    </div>

  </body>

</html>
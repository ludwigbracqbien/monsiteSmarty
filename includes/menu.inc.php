<?php
	if(isset($_SESSION['nom']))											
	{
	?>
 <nav class="span4">

 
 <div class="navbar-inner">
            
			<h3>Menu</h3>
            
            <ul>
			<a href="#" class="info"><img src="img/imgConnecter.jpg"><span>Bonjour <?php echo $_SESSION['prenom']." ".$_SESSION['nom'];  ?></span></a>
			
				<div class="badge">
				<?php
				
				echo  "Bienvenue ".$_SESSION['prenom']." ".$_SESSION['nom']."   ";
				
				?>
				</div>
				<br><br>
			
                <li><a href="index.php">Accueil</a></li>               
				<li><a href="articles.php">Rédiger un article</a></li>
				<li><a href="..//Admin/Deconnexion.php">Se déconnecter</a></li>
				<br><br>
				<li>Rechercher sur le site :</li>     
				<form method="post" action="AffichageRecherche.php" enctype="application/x-www-form-urlencoded">
				<input type="text"name="recherche">
				
				<input type="submit" value="Rechercher"class="btn">
				
				</form>
				<?php
				if(isset($_GET['TestRecherche']))
				{
					unset($_GET['TestRecherche']);
					echo'Désolé aucun éléments ne corresponds à votre demande';

				}
	}
	else
	{
	
	
	}
				?>
				
				
            </ul>
    </div>         
          </nav>
  </div>
  </div>
 
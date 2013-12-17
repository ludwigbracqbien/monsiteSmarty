<?php
				date_default_timezone_set('Europe/Paris');
				mysql_connect("127.0.0.1","root","")
				or die("erreur de connexion au serveur: ". mysql_error());
				mysql_select_db("blog");
				
?>
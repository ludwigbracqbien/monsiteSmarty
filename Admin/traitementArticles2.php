<?php
//error_reporting(0);
include_once('..//includes/connexion.inc.php');
$Text = $_POST['texte'];
$Publication = $_POST['publication'];
$Titre = $_POST['titre'];
if (!empty($_POST['image'])) {
        $erreur_image = $_FILES['image']['error'];
    } else {
        $erreur_image = "";
    }

$Date = date("Y-m-d");
if (isset($_POST['titre']) && ($erreur_image != "")) {
    if (isset($_POST['publication']))
        $Etat = 1;
    else
        $Etat = 0;
    $sql = ("INSERT INTO blog.articles (Titre,Texte,Date,Statut) VALUES('$Titre','$Text','$Date','$Etat')");
    mysql_query($sql);


    $id = mysql_insert_id();

    move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
}
?>		

<!-- <SCRIPT LANGUAGE=JAVASCRIPT>
window.location = '..//index.php';
</SCRIPT> -->




<?php
require("libs/smarty.class.php");//On inclut la classe Smarty

$monTexte="<p>Ma premi&eacute;re page smarty</p>";

$smarty=new Smarty();

$smarty->assign("monTexte",$monTexte);

$smarty->display("smarty.tpl");
?>
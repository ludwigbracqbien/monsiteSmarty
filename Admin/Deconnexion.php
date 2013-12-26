<?php
error_reporting(0);
session_start();

//Processus permettant la destruction complète de la session à la déconnexion
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
}
session_destroy();

?>

<SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = '..//index.php';
		</SCRIPT>
	
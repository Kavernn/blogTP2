<?php

//Destruction de ma variable de session lors de la déconnexion + redirection vers la page de login
session_start();
session_regenerate_id();
$_SESSION = array();
session_destroy();
header("location: index.php");

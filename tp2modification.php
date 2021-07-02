<?php

header("location: indexlogin.php");

if (isset($_POST['contenu'])) {
    $unsafe_contenu = $_POST['contenu'];


    require 'tp2db.php';
    $pdo = creerPDO();

    $requete_sql = "UPDATE Article SET Contenu=:contenu WHERE Id=1";

    $pdo_statement = $pdo->prepare($requete_sql);
    $pdo_statement->execute(['contenu' => $unsafe_contenu]);



}


?>




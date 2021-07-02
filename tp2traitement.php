<?php

$erreur = "Erreur !";

if (isset($_POST['identifiant']) && isset($_POST['password'])) {
    $unsafe_identifiant = $_POST['identifiant'];
    $unsafe_motdepasse = $_POST['password'];


    require 'tp2db.php';
    $pdo = creerPDO();
    $requete_sql = "SELECT Identifiant, MotDePasse FROM tp2db.Personne WHERE Identifiant=:identifiant";
    $pdo_statement = $pdo->prepare($requete_sql);
    $pdo_statement->execute(['identifiant' => $unsafe_identifiant]);

    if ($pdo_statement->rowCount() === 1) {
        $ligne = $pdo_statement->fetch();
        $hash = $ligne['MotDePasse'];

        if (password_verify($unsafe_motdepasse, $hash) === true) {
            session_start();
            session_regenerate_id();

            $_SESSION['Identifiant'] = $ligne['Identifiant'];




            header("location: indexlogin.php");
            die();

        } elseif (password_verify($unsafe_motdepasse, $hash) === false) {

            //Redirection vers la page principale en cas d'erreur de mot de passe avec ma variable de session
            session_start();
            session_regenerate_id();
            $_SESSION["erreur"] = $erreur;
            header('location: index.php');
            die();

        }

        }
    else {
        //Même chose sauf que la il va prendre aussi en cas de tout autre mauvais login (identifiant, mot de passe, ou les 2). À noter que je suis conscient qu'ici c'est pas très sexy, il y a clairement répétition, mais c'est la seule façon que j'ai réussi à faire fonctionner la redirection advenant que le mot de passe ET l'identifiant soit erroné.
        session_start();
        session_regenerate_id();
        $_SESSION["erreur"] = $erreur;

        header("location: index.php");
        die();

    }
}

?>





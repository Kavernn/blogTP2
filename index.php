

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="tp2.css" type="text/css">
    <title>Blog</title>
</head>
<body>
<section>
    <table>
     <?php require 'tp2lecture.php'
     ?>
    </table>

<div class="formulaire">
<form action="tp2traitement.php" method="POST">
    <!-- Initialisation de la variable de session qui va me donner le message d'erreur si le login n'a pas fonctionné + la classe css du p qui va mettre le texte en rouge-->
    <?php
    session_start();
    session_regenerate_id();
    if(isset($_SESSION["erreur"])){
        $erreur = $_SESSION["erreur"];
        echo '<p class="erreur-tag">'.$erreur.'</p>';
    }
    ?>
   <p> <label for="idIdentifiant">Identifiant: </label>

    <input type="text" name="identifiant" id="idIdentifiant">
   </p>
    <p>
    <label for="idPassword">Mot de passe: </label>
    <input type="password" name="password"  id="idPassword">
    </p>
    <input type="submit" value="Connexion">


</form>
</div>
</section>
</body>
</html>


<?php
//Destruction de ma variable de session ici aussi
$_SESSION = array();
session_destroy();
?>

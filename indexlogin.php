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

        <?php
        require 'tp2db.php';


        $pdo = creerPDO();
        $requete_sql = "SELECT Entete, Contenu, Pied FROM tp2db.Article WHERE Id=1";
        $pdo_statement = $pdo->prepare($requete_sql);
        $pdo_statement->execute([]);

        session_start();
        session_regenerate_id();




        foreach($pdo_statement as $ligne) {

            echo '<div class="bg-blog">';
            echo '<h2>' . $ligne['Entete'] . '</h2>';
            ?>
            <!-- Je met le contenu de la base de donné dans un textarea pour que l'utilisateur connecté puisse le modifier-->
            <form method="POST" action="tp2modification.php">
        <textarea name="contenu" rows="10" cols="100"><?php echo $ligne['Contenu']

  ?></textarea>

        <?php
            echo '<footer>' . $ligne['Pied'] . '</footer>';
            ?>

                <input  type="submit" value="Soumettre les modifications"/>
            </form>

           <?php echo '</div>';

        }


        ?>


    <div class="formulaire">

        <!-- Utilisation de ma variable de session afin de dire bonjour au bon utilisateur -->
    <form method="POST" action="tp2deconnexion.php">
        <p><?php echo 'Bonjour ' . $_SESSION['Identifiant']; ?>
        </p>
        <input type="submit" value="Déconnexion" />
    </form>
    </div>
</section>
</body>
</html>
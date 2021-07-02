
<?php
        require 'tp2db.php';
        $pdo = creerPDO();
        $requete_sql = "SELECT Entete, Contenu, Pied FROM tp2db.Article WHERE Id=1";
        $pdo_statement = $pdo->prepare($requete_sql);
        $pdo_statement->execute([]);


        foreach($pdo_statement as $ligne) {

            echo '<div class="bg-blog">';
            echo '<h1 class="header-blog">' . $ligne['Entete'] . '</h1>';
            echo '<p class="p-blog">' . htmlspecialchars($ligne['Contenu']) . '</p>';
            echo '<footer class="footer-blog">' . $ligne['Pied'] . '</footer>';
            echo '</div>';

        }

 ?>
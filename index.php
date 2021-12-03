<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>accueil</title>
        <link rel="stylesheet" a href="Sindex.css">
    </head>
    <body>
        <header>
            <div class="forum">
            <h1><img src='https://habbofont.net/font/habbo_new/index.gif'></h1> 
<?php
            session_start();
            if(isset($_SESSION["id"])){
                echo "<a href='profil.php'><img src='https://habbofont.net/font/habbo_new/profil+utilisateur.gif'></a>";
                echo "<a href='deconnexion.php'><img src='https://habbofont.net/font/habbo_new/deconnexion.gif'></a>";
                echo "<a href='https://github.com/anicet-beloucif/moduleconnexion.git'><img src='https://habbofont.net/font/habbo_new/github.gif'></a>";
            }
            else{
                echo "<a href='connexion.php'><img src='https://habbofont.net/font/habbo_new/connexion.gif'></a>";
                echo "<a href='inscription.php'><img src='https://habbofont.net/font/habbo_new/inscription.gif'></a>";
                echo "<a href='https://github.com/anicet-beloucif/moduleconnexion.git'><img src='https://habbofont.net/font/habbo_new/github.gif'></a>";
            }
?>
                <br>
                </div>
            </ul>
        </header>
    </body>
</html>

<style>
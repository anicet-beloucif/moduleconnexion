<?php

//Connexion à la BDD
session_start();
$id = $_SESSION["id"];
$bdd = mysqli_connect("localhost","root","root","moduleconnexion"); 

//Sélection du bon utilisateur (id identique)
$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");

//Affichage des informations retournées sous forme de tableau via la fonction MYSQLI_ASSOC
$res= mysqli_fetch_all($req,MYSQLI_ASSOC);
$login = $res[0]['login'];
$prenom = $res[0]['prenom'];
$nom = $res[0]['nom'];
$password = $res[0]['password']; 

//Mise à jour des informations de l'utilisateur en fonction de l'envoi du formulaire
if (isset($_POST['env']))
{
    $nom1 = $_POST['nom'];
    $prenom1 = $_POST['prenom'];
    $password1 = $_POST['password'];
    $login1 = $_POST['login'];
    $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1', prenom='$prenom1', nom='$nom1', password='$password1' WHERE  id = $id ");
    header("Location: profil.php");
} 


?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Profil</title>
    <link rel="stylesheet" href="Sprofil.css">
</head>
<body>
<header>
<p class="categorie"><a href="inscription.php"><img src="https://habbofont.net/font/habbo_new/inscription.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/github.gif"></a></p>
<p class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Habbo-logo.png/320px-Habbo-logo.png"<p>
<p class="categorie"> <a href="index.php"><img src="https://habbofont.net/font/habbo_new/accueil.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/deconnexion.gif"></a></p>
</header>
<div class="form">
<h1><img src="https://habbofont.net/font/habbo_new/modification+USER.gif"></h1>
    <form name="formu" action="" method="post">
        <label for ="login"><img src="https://habbofont.net/font/habbo_new/changer+de+log.gif"></label>
        <br>
        <input id="login" name="login" value="<?php echo $login?>" type="text" placeholder="username"/>
        <br><br>
        <label for ="prenom"><img src="https://habbofont.net/font/habbo_new/changer+de+prenom.gif"></label>
        <br>
        <input name="prenom" value="<?php echo $prenom?>" type="text" placeholder="prenom" />
        <br><br>
        <label for ="nom"><img src="https://habbofont.net/font/habbo_new/changer+de+nom.gif"></label>
        <br>
        <input name="nom" value="<?php echo $nom?>" type="text" placeholder="nom" />
        <br><br>
        <label for ="password"><img src="https://habbofont.net/font/habbo_new/changer+de+mot+de+passe.gif"></label>
        <br>
        <input name="password" value="<?php echo $password?>" type="password" placeholder="Ton mdp"/>
        <br><br>
        <input name="env" type="submit" value="Appliquer les modifications">
    </form>
</div>
</body>
</html>
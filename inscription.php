<?php
        session_start();
        $login ="";
        $prenom ="";
        $nom ="";
        $password="";

// Connexion à la base de données
        $db = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion');
if ($db->connect_error) {
    die("Connexion échouée: " . $db->connect_error);
}
echo "Connexion à la base de données réussie";

    if(isset($_POST['submit']))
{
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $conf = $_POST['pswrepeat'];

    if (!empty($login) && !empty($prenom) &&!empty($nom) && !empty($password)){
        $checkuser=mysqli_query($db, "SELECT * FROM utilisateurs WHERE '$login'=login");
        $usercount=mysqli_fetch_all($checkuser);
        if (count($usercount) == 0) {
            if ($password == $conf) {
    echo 'Enregistrement confirmé ! veuillez vous connecter';
    $result = mysqli_query($db,"insert into utilisateurs(login,prenom,nom,password) values('$login','$prenom','$nom','$password')");}
        else {echo 'Les mots de passes ne sont pas identiques';}}
        else {echo 'Cet identifiant est déjà utilisé';}}
        else {echo 'Tout les champs doivent etre remplis';}
    }

?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Sinscription.css">
</head>
<header>
<p class="categorie"><a href="inscription.php"><img src="https://habbofont.net/font/habbo_new/inscription.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/github.gif"></a></p>
<p class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Habbo-logo.png/320px-Habbo-logo.png"<p>
<p class="categorie"> <a href="index.php"><img src="https://habbofont.net/font/habbo_new/accueil.gif"></a></p>



</header>





<form method="post" action="">

    <div class="container">
        <h1><img src="https://habbofont.net/font/habbo_new/formulaire.gif"></h1>
        <p>Merci de remplir ce formulaire afin de vous inscrire.</p>
        

        <label for="login" class="items"><b><img src="https://habbofont.net/font/habbo_new/login.gif"></b></label>
        <input type="text" placeholder="Entrer votre login" name="login" id="login" required>

        <label for="prenom"><b><img src="https://habbofont.net/font/habbo_new/prenom.gif"></b></label>
        <input type="text" placeholder="Entrer votre prénom" name="prenom" id="prenom" required>

        <label for="nom"><b><img src="https://habbofont.net/font/habbo_new/nom.gif"></b></label>
        <input type="text" placeholder="Entrer votre nom" name="nom" id="nom" required>

        <label for="password"><b><img src="https://habbofont.net/font/habbo_new/mot+de+passe.gif"></b></label>
        <input type="password" placeholder="Entrer votre mot de passe" name="password" id="password" required>

        <label for="pswrepeat"><b><img src="https://habbofont.net/font/habbo_new/confirmation.gif"></b></label>
        <input type="password" placeholder="Entrer à nouveau votre mot de passe" name="pswrepeat" id="pswrepeat" required>
        

        <button type="submit" class="registerbtn" name="submit">Je m'inscris</button>
    </div>

</form>
</html>
<?php
$connect= mysqli_connect("localhost","root","root","moduleconnexion");

if(isset($_POST['login']) && isset($_POST['password'])){
    $login=$_POST['login'];
    $password=$_POST['password'];
    $sql=mysqli_query ($connect,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");
    $res= mysqli_fetch_all($sql); 
    var_dump($res);
}
    if (empty($res)) {
    }
     else {
         if($res[0][4] == $password){
            session_start();
            if ( $password == 'admin' && $login == 'admin'){
                echo 'Connecté en tant que ADMIN';
                header ("location:admin.php");
    
            }else {
                echo $res[0][2] .' est connecté, en attente de redirection...';
                $_SESSION["id"] = $res[0][0];
                header ("refresh:4;url=profil.php");
               

            }
            }
             else {
             echo "Connexion Impossible. Veuillez vérifier que le login et le mot de passe correspondent à un compte existant";
         }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Sconnexion.css">
    <title>connexion</title>
</head>
<header>
<p class="categorie"><a href="inscription.php"><img src="https://habbofont.net/font/habbo_new/inscription.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/github.gif"></a></p>
<p class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Habbo-logo.png/320px-Habbo-logo.png"<p>
<p class="categorie"> <a href="index.php"><img src="https://habbofont.net/font/habbo_new/accueil.gif"></a></p>
</header>
<body>

<div class="form">
    <h1><img src="https://habbofont.net/font/habbo_new/connexion.gif"></h1>
<form method="post" action="">
<label for="login"><b><img src="https://habbofont.net/font/habbo_new/login.gif"></b></label>
    <input class ="inputswag" name="login" type="text" placeholder="Veuillez renseigner votre login"required />
    <label for="password"><b><img src="https://habbofont.net/font/habbo_new/mot+de+passe.gif"></b></label>
    <input class ="inputswag" name="password" type="password" placeholder="Veuillez renseigner votre mot de passe" required />
    <input type=submit value="Envoyer" name="env">


</div>
</form>
</body>
</html>
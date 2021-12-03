<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Sadmin.css">

    </head>
    <header>
<p class="categorie"><a href="inscription.php"><img src="https://habbofont.net/font/habbo_new/inscription.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/github.gif"></a></p>
<p class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Habbo-logo.png/320px-Habbo-logo.png"<p>
<p class="categorie"> <a href="index.php"><img src="https://habbofont.net/font/habbo_new/accueil.gif"></a></p>
<p class="categorie"> <a href="deconnexion.php"><img src="https://habbofont.net/font/habbo_new/deconnexion.gif"></a></p>
</header>
    <body>
        <?php
        $bdd = mysqli_connect("localhost","root","root","moduleconnexion"); 

        $req= mysqli_query($bdd,"SELECT * FROM utilisateurs");  

        $res= mysqli_fetch_all($req, MYSQLI_ASSOC);  

        ?>
        <div class="liste">
        <h1><img src="https://habbofont.net/font/habbo_new/espace+administrateur.gif"></h1>
    </li>
        <table>
            <thead>

                    <?php
                    echo '<tr>';                        
                    foreach($res[0] as $key => $value){        

                            echo "<th>$key</th>";          

                    }
                    echo '</tr>';
                    ?>
            </thead>
<?php
                foreach($res as $key => $value){ 

                    echo '<tr>';

                    foreach ($value as $key1 => $value1) 
                    {
                        echo "<td>$value1</td>";  
                    }

                        echo '</tr>'; 
                }
?>
        </table>
        <br>
            </div>
    </body>
</html>
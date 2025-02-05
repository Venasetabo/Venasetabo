<?php

include_once "dbconf.php";
session_start();
if (!isset($_SESSION['email']) AND !isset($_SESSION['nom'])) {
   header("location:connexion.php");
   
}

$email = $_SESSION['email'];
$nom = $_SESSION['nom'];
// $id_pub = $_SESSION['id_pub'];

$select = mysqli_query($conx,"SELECT * FROM publication WHERE id_candidat = '$email' || nom_candidat = '$nom' ");

$selectfeed = mysqli_query($conx,"SELECT * FROM feedback ");
$countfeed = mysqli_num_rows($selectfeed);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLICATIONS-DE-<?php echo  $_SESSION['nom']; ?> </title>
</head>
<body>
    <button><a href="image.php">publier</a></button>
    <button><a href="publications.php">voir plus</a></button>
<?php  
if (mysqli_num_rows($select)>0) {

    $number = 0;
foreach ($select as $pub) {

    $number++;

    ?> 
    <div >
        <h1>Publication <?php echo $number  ?></h1>
        <div>Auteur : <?php echo $pub['nom_candidat'];   ?> </div>
        <div>titre:<?php  echo $pub['titre']  ?> </div>
        <div>description:<?php echo $pub['descript']; ?> </div>
        <div>description: <img src="POST_IMAGES_UPLOADED/<?php echo $pub['pub_image'];  ?>" alt="pub_image"> </div>
        <div>publié à:<?php  echo substr($pub['pu_at'],10) ?> <br>
        publié le:<?php  echo $pub['pu_at']; ?> </div>
        <button><a href="pub_del.php?id=<?php  echo $pub['id_pub']; ?>">supprimer</a></button>

        <button>commentaires(<?php echo $countfeed; ?>)</button>
        
    </div>
    <?php
}
}else {
    echo "veuillez publier tes propres articles mr:".$nom;
    echo '<button><a href="article.php">add</a></button> ';
}
    
    ?><br>
        <br>
    <button><a href="deconx.php">SE DECONNECTER</a></button>

</body>
</html>
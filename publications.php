<?php
include_once "dbconf.php";

session_start();
if (!isset($_SESSION['email']) AND !isset($_SESSION['nom'])) {
   header("location:connexion.php");
}
// $email = $_SESSION['email'];
$nom = $_SESSION['nom'];
$email = $_SESSION['email'];
// $id_pub = $_SESSION['id_pub'];

// $feedback=  $_SESSION['commentaire'];

$select = mysqli_query($conx,"SELECT * FROM publication");


$selectLIKE = mysqli_query($conx,"SELECT * FROM publication");
$countLIKE = mysqli_num_rows($selectLIKE);


//NOMBRE DE COMMENTAIRES PAR PUBLICATION

//  if (isset($_GET['id'])) {

$select_commentaire = mysqli_query($conx,"SELECT * FROM feedback"); 
$countfeed = mysqli_num_rows($select_commentaire);              

// } 

// $select = $pdo->prepare("SELECT * FROM publication WHERE id_pub = ?");
// $select->execute(array($id_pub));

// $id_feedback = $_SESSION['id_feedback'];

// $selectfeed = mysqli_query($conx,"SELECT * FROM feedback WHERE  id_pub = '$select['id_pub']'");


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLICATIONS</title>
</head>
<body>
    <button><a href="image.php">publier</a></button>

<?php  
$number = 0;
if (mysqli_num_rows($select)>0 ) {
    # code...
foreach ($select as $pub) {

    $number++;

    ?> 
    
    <div >
        <h1>Publication <?php echo $number  ?></h1>
        <div> Auteur: <?php echo $pub['nom_candidat'];   ?> </div>
        <div>titre:<?php  echo $pub['titre']  ?> </div>
        <div>description:<?php echo $pub['descript']; ?> </div><br><br>
        <div>image: <br><img src="POST_IMAGES_UPLOADED/<?php echo $pub['pub_image'];  ?>" alt="pub_image"></div>
        <div>publié à:<?php  echo substr($pub['pu_at'],10) ?> <br>
        publié le:<?php  echo substr($pub['pu_at'],6)?> </div>
        <button><a href="commenter.php?id=<?php echo $pub['id_pub']?>">commenter</a></button>
        <button><a href="feedback.php?id=<?php echo $pub['id_pub']?>">(<?php echo $countfeed; ?> )</a></button>

        <button type="submit" name="submit"><a href="liker.php?t=like&id=<?php  echo $pub['id_pub']?>">Liker</a></button>
        <a href="likes.php?id=<?php echo $pub['id_pub'] ?>"><?=  $countLIKE ?></a>
       
    </div>
    <?php
}  
}else {
    echo "AUCUNE PUB VEUILLER CREER LA VOTRE";
}
    
    ?><br>
        <br>
    <button><a href="deconx.php">SE DECONNECTER</a></button>

</body>
</html>

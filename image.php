<?php
         include_once "dbconf.php";
         session_start();
$message = NULL;
if (isset($_POST['submit'])) {
   
    $description =mysqli_real_escape_string($conx, $_POST['descript']);
    $titre = mysqli_real_escape_string($conx,$_POST['titre']);
    $email = $_SESSION['email'];
    $nom  =   $_SESSION['nom'];
    $image = $_FILES['image'];
    $imagenom = $_FILES['image']['name'];
    $imagetmp = $_FILES['image']['tmp_name'];
    $imagesize = $_FILES['image']['size'];
    $imagetype = $_FILES['image']['type'];
    $imageError = $_FILES['image']['error'];

    $imageext = explode('.',$imagenom);
    $imageActualEXt = strtolower(end($imageext));
    $extension_allowed = array('png','jpg','jpeg','pdf');

    if (in_array($imageActualEXt,$extension_allowed)) {
        if ($imageError==0) {
            if ($imagesize<1000000) {
                
                $imageNewName = uniqid('',true).".".$imageActualEXt;
                $imageDestination = 'POST_IMAGES_UPLOADED/'.$imageNewName;
                $telechargement = move_uploaded_file($imagetmp,$imageDestination);

                $rquete = mysqli_query($conx,"INSERT INTO publication (id_pub,titre,descript,pub_image,id_candidat,nom_candidat) VALUES(NULL,'$titre','$description','$imageNewName','$email','$nom')");
                if ($telechargement and  $rquete) {
                    $message1 = "Enregistrement est passé avec succès 💪";
                    $message2 = "Enregistrement est passé avec succès💪";
                    $message = addcslashes($message1,$message2);
                    header("location:publication.php?$message");
                    $_SESSION['id_pub'] = $_POST['id_pub'];
                }

            }
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data">
        <h1>création de l'espace membre</h1>
        <?php
        if ($message) {
            ?>
         <p> <?php echo $message;  ?> </p>
          <?php 
        }
        ?>
        <input type="text" name="titre" placeholder="Inserez votre titre ici..."><br>
            <textarea   name="descript" placeholder="Inserez votre description ici...">

            </textarea><br>
        <input type="file" name="image"><br>
        <button type="submit" name="submit">save</button>
    </form>
</body>
</html>
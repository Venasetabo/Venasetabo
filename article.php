
<?php

 session_start();

 if (!isset($_SESSION['email']) AND !isset($_SESSION['nom'])) {
    header("location:connexion.php");
 
 }
         include_once "dbconf.php";
         $php_errormsg = null;
   
   if (isset($_POST["submit"])) {

    $titre = $_POST['titre'];
    $description =$_POST['description'];
    $id_candidat = $_SESSION['email'];
    $nom_candidat = $_SESSION['nom'];

    $imagename =$_FILES['pub_image']['name'];
    $imagesize = $_FILES['pub_image']['size'];
    $imagetype = $_FILES['pub_image']['type'];
    $imageError = $_FILES['pub_image']['error'];
    $imagetmpname = $_FILES['pub_image']['tmp_name'];

    $imageExt = explode('.',$imagename);
    $imageActualExt = strtolower(end($imageExt));
    $ext_allowed = array('png','jpeg','jpg');
    
    if (empty($titre) || empty($description) || empty($imagename)) {
      $php_errormsg = "Veuillez remplir tous les champs";
    }else {

     if (in_array($imageActualExt,$ext_allowed)) {
        if ($imageError == 0) {

            if ($imagesize < 1000000 ) {
                
                $imageNewName = uniqid('',true).".".$imageActualExt;
                $imageDestination = "POST_IMAGES_UPLOADED/".$imageNewName;
               $uploaded = move_uploaded_file($imagetmpname,$imageDestination);
                $query = "insert into publication (id_pub,titre,descript,pub_image,id_candidat,nom_candidat) VALUES(NULL,'$titre','$description','$imageNewName','$id_candidat','$nom_candidat')";
                $resultat = mysqli_query($conx,$query);
        if ($resultat AND $query) {

            header("location:publication.php");
            $_SESSION['titre'] = $_POST['titre'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['id_pub'];   

        }

            }
            


        }
    }


       
    }

    
   }
   
   ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLICATION </title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data">
        <Fieldset>
            <LEGend>
                <H1>PUBLIER VOTRE ARTICLE Mr <?php echo $_SESSION['nom'] ?></H1>
                <P><?php
        if ($php_errormsg) {
             
            echo $php_errormsg;

        }
        ?></P>
        <input type="text" name="titre" placeholder="titre"><br>
        <textarea  name="description"   placeholder="description du message..." id="" cols="30">

        </textarea><br>
        <input type="file" name="pub_image">

        <button type="submit" name="submit">Save</button>
    </LEGend>
        </Fieldset>
    </form>
   
</body>
</html>
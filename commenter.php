<?php
         include_once "dbconf.php";
         $php_errormsg = null;
         session_start();
         $id = $_GET['id'];
   if (isset($_POST["submit"])) {
    $commentaire = $_POST['commentaire'];
    $id_candidat = $_SESSION['email'];
    $nom_candidat = $_SESSION['nom'];
    $id_pub =  $_SESSION['id_pub'];
    $id_feedback = $_POST['id_feedback'];
    $commenter = mysqli_query($conx,"insert into feedback (id_feedback,commentaire,nom_candidat,id_pub) VALUES('$id_feedback','$commentaire','$nom_candidat','$id')"); 
    if ($commenter) {
        header("location:publications.php");

        $_SESSION['commentaire'] = $_POST['commentaire'];
        $id_candidat = $_SESSION['email'];
        $nom_candidat = $_SESSION['nom'];
        $id_pub =  $_SESSION['id_pub'];   
        $_SESSION['id_feedback'] = $_POST['id_feedback'];   
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
    <form  method="post">
        <Fieldset>
  
            <LEGend>
                <H1>VOTRE  AVIS SUR L'ARTICLE  Mr <?php echo $_SESSION['nom'] ?></H1>
                <P><?php
        if ($php_errormsg) {
             
            echo $php_errormsg;

        }
        ?></P>
        <input type="hidden" name="id_feedback">
            <textarea  name="commentaire"  placeholder="description du message..." id="" cols="30">
            </textarea><br>
      
        <button type="submit" name="submit">Save</button>
    </LEGend>
        </Fieldset>
    </form>
   
</body>
</html>
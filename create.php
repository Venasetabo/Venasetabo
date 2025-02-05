
<?php

         include_once "dbconf.php";
         $php_errormsg = null;
         $domaine = '.com';
   
   if (isset($_POST["submit"])) {
       $nom = $_POST['nom'];
       $postnom = $_POST['postnom'];
       $email = $_POST['email'];
       $email = $_POST['email'];
       $password = $_POST['password'];

       $imagename = $_FILES['image']['name'];
       $imagetmpname = $_FILES['image']['tmp_name'];
       $imageError = $_FILES['image']['error'];
       $imageSize= $_FILES['image']['size'];
       $imageType = $_FILES['image']['type'];

       $imageExt = explode('.',$imagename);
       $imageActualExt = strtolower(end($imageExt));
       $imageExtAllowed = array('png','jpg','jpeg');
       
       # code...
       if (empty($nom) || empty($postnom) || empty($email) || empty($password) || empty($imagename)) {

           $php_errormsg = "veuillez tous remplir";

       }else{
          $control_exist = mysqli_query($conx,"SELECT * FROM candidat WHERE email = '$email' ");

          if (mysqli_num_rows($control_exist) > 0 ) {

            $php_errormsg = "L'email $email existe déjà !";
          }else{

            if ($imageError == 0) {
                if (in_array($imageActualExt,$imageExtAllowed)) {
                   
                    $imageNewName = uniqid('',true).'.'.$imageActualExt;
                    $imageDestination = "USER_IMAGE_UPLOADED/".$imageNewName;
                    $uploaded = move_uploaded_file($imagetmpname,$imageDestination);
                    $query = "insert into candidat (id_candidat,nom,postnom,email,password,profil) VALUES(NULL,'$nom','$postnom','$email','$password','$imageNewName')";
                        $resultat = mysqli_query($conx,$query);

                    if ($uploaded AND $resultat) {
                        
                        
                            echo "vous pouvez desormais se connecter votre compte est disponible, il y a un moment ";
                            // header("Location:connexion.php");
                        
                                }


                }else {
                    $php_errormsg = "Image extension not allowed in our website";
                }
                

                
            }else {
                $php_errormsg ="There is an error try to download the new image";
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
    <title>CREATION DU COMPTE</title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data" >
        <Fieldset>
            <LEGend>
        <H1>INSCRIPTION</H1>
        <P><?php
        if ($php_errormsg) {
             
            echo $php_errormsg;


        }
        ?></P>
        <input type="text" name="nom"        placeholder="nom"><br>
        <input type="text"    name="postnom"             placeholder="postnom"><br>
        <input type="email"     name="email"   placeholder="email"><br>
        <input type="password"    name="password"   placeholder="password">
        <input type="file" name="image" id="">
        <h1>vous avez déjà un compte<a href="connexion.php"><strong>connexion</strong></a></h1>
        <button type="submit" name="submit">Save</button>

    </LEGend>
        </Fieldset>
    </form>
   
</body>
</html>
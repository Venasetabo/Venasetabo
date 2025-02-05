
<?php
         include_once "dbconf.php";
         $php_errormsg = null;
         session_start();

   if (isset($_POST["submit"])) {
     
       $email = $_POST['email'];
       $nom = $_POST['nom'];
    //    $password = $_POST['password'];
       
       # code...
       if (empty($email) || empty($nom)) {

           $php_errormsg = "veuillez tous remplir";

       }else{
          $control_exist = mysqli_query($conx,"SELECT * FROM candidat WHERE email = '$email' AND nom = '$nom'");

                if (mysqli_num_rows($control_exist) > 0 ) {

                  $_SESSION['email'] = $_POST['email'];
                  $_SESSION['nom'] = $_POST['nom'];

                  header("location:publication.php?utilisateur = $_SESSION[nom] ");
                
            }else {

                $php_errormsg = "introuvable !";

            }
   }
} 
   ?> 
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION DU COMPTE</title>
</head>
<body>
   <form method="POST">
    <h1>CONNEXION</h1>
    <?php
    if ($php_errormsg) {
    # code...
    ?>
    <P><?php  echo $php_errormsg;  ?></P>
    
    <?php
    }
    
    ?>
       <div>
       <label for="email">votre email</label>
       <input type="email" name="email" id="email"> 
       </div>
       <div>
       <label for="password">votre nom</label>
       <input type="text" name="nom" id="password"> 
       </div>
       <div>
       <button type="submit" name="submit">LOGIN</button><a href="create.php">créer un compte</a>
       </div>
   </form>
</html>
<style>
    body{
        marigin
    }
</style>
<?php

include_once "dbconf.php";
$message = NULL;
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    if (empty($_POST['nom']) || empty($_POST['postnom'])) {
        
     $message = "Veuillez remplir tous les champs !!";
  
    }else {
        session_start();
    
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['postnom'] = $_POST['postnom'];
        header("Location:step1.php");
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
    <form  method="post"><br><br>
    <center>1</center>
    <h1>INSCRIPTION</h1>
   <?php
    if ($message) {
        ?>
         <p><?php echo $message; ?></p>
        <?php
        
    }
    
    ?>
        <label for="nom">NOM</label><br>
        <input type="text" name="nom" id="nom"><br>
        <label for="postnom">POSTNOM</label><br>
        <input type="text" name="postnom" id="postnom"><br>
        <button type="submit" name="submit">SUIVANT</button>
    </form>
    
</body>
</html>
<style>
    body{
        background: #000;
        background: #123456;
        background: #6D7B8D;
        background: #36454F;
        font-family:verdana, 'sans serif';
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        padding:0;
        margin:0;
        box-sizing:border-box;
    }form{
        width: 40%;
        height:400px;
        position:absolute;
        bottom:340px;
        background: #dcdcdc;
        background: #98AFC7;
        background: #778899;
        background: #566D7E;
        background: #2B547E;
        background: #36454F;
        background: #123456;
        background: #151B54;
        background: #BDEDFF;
        background: #50C878;
        background: #36454F;
        background: #6D7B8D;
        justify-content:center;
        align-items:center;
        text-align:center;
        display:block;
        border-radius:15px;
    }form:AFTER{
        /* content:""; */
        width:100%;
        height:450px;
        height:380px;
        position:absolute;
        margin-right:130px;
        border-radius:15px;
        background: linear-gradient(#50C878,#566D7E);
        /* bottom:340px;
         display: none; 
        top:0;
        right:0;
        left:0; 
        transform:rotate(130deg); */
    }form input{
        width: 50%;
        height:20px;
        padding:10px;
        margin:10px;
        border-radius:20px;
        border:2px solid green;
        outline:none;
    }form input{
        
        }form button{
        width: 20%;
        height:30px;
        bottom:0px;
        right:0;
        margin:10px;
        position:absolute;
        border-radius:15px;
        outline:none;
        border:none;
    }p{
        color:red;
        font-size:20px;
        background:rgb(107, 70, 70);
    }center{
        color:blue;
        font-size:20px;
    }
</style>
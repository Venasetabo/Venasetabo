<?php

include_once "dbconf.php";

session_start();
$nom = $_SESSION['nom'];
$id = $_GET['id'];

if (isset($_GET['id'],$_GET['t'])) {

    $id = (int)$_GET['id'];
    $t = (int)$_GET['t'];
    $sessionid = 4;

    // $check = $conx->query("SELECT id_pub FROM publication WHERE id_pub  = '$id'");

      if ($t == 0) {
        $insertion = $conx->query("INSERT INTO likes (id_pub,id_candidat) VALUES('$id','$nom')");
        if ($insertion){
          header("location:publications.php?$nom.VOUS-AVEZ-AIME-L-ID.$id");
        }
    }
}
// <a href="like.php?id=<?php  echo $pub['id_pub']?#>">Liker</a><a href="feedback.php"><#?php echo count($nombre_com);?#></a>

?>
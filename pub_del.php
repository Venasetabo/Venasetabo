<?php

include_once "dbconf.php";
$id = $_GET['id'];
   $description = $_SESSION['description'];
   $id_candidat = $_SESSION['email'];
   $nom_candidat = $_SESSION['nom'];

$pud_del = mysqli_query($conx,"DELETE FROM publication WHERE id_pub = '$id'");
if ($pud_del) { 
   header("location:publication.php?suppression-de-publication-id=$id");
}
?>
<?php

include('connect.php');


$id = $_POST['id'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];
$msg = $_POST['message'];

$sql = "UPDATE contact
        SET nom=?, email=?, sujet=?, msg=?
        WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($id,$nom,$email,$sujet,$msg));
header("location: afficher_contenu.php");

?>
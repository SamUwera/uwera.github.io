<?php
session_start();
$errmsg_arr = array();
$errflag = false;
$dbhost  = "localhost";
$dbname  = "formulaire";
$dbuser  = "root";
$dbpass  = "";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);




$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];
$msg = $_POST['msg'];

if($nom == '') {
    $errmsq_arr[] = 'Vous devez introduire votre nom';
    $errflag = true;
}
if($email == '') {
    $errmsq_arr[] = 'Vous devez introduire votre mail';
    $errflag = true;
}
if($sujet == '') {
    $errmsq_arr[] = 'Vous devez introduire votre objet';
    $errflag = true;
}
if($msg == '') {
    $errmsq_arr[] = 'Vous devez introduire votre message';
    $errflag = true;
}
if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.html");
    exit();
}

$sql = "INSERT INTO contact (nom,email,sujet,message) VALUES (:sas,:asas,:asafs,:zsas)";
$q = $conn->prepare($sql);
$q->execute(array(':sas'=>$nom,':asas'=>$email,'asafs'=>$sujet,':zsas'=>$msg));
header("location: index.html");
?>
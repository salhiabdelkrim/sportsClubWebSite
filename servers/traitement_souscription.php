<?php
session_start();
//accés à la base de données 
$serveur = "localhost";    // Adresse du serveur
$utilisateur = "root";     // Nom d'utilisateur MySQL
$motDePasse = "";          // Mot de passe MySQL
$baseDeDonnees = "my_site_db";  // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion ->connect_error){
    echo "Echec lors de la connexion à MySQL : (".$connexion-> connect_errno .") ".$connexion->connect_error; 
}

$client_id = isset($_POST["client_id"]) && ctype_alnum($_POST["client_id"]) ? $_POST["client_id"] : die("ID client invalide !");
$activity_id = isset($_POST["activity_id"]) &&  ctype_alnum($_POST["activity_id"]) ? $_POST["activity_id"] : die("ID activité invalide !");
$souscription_date = isset($_POST["souscription_date"]) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["souscription_date"]) ? $_POST["souscription_date"] : die("Date invalide !");



    /* client n'est pas membre  */
if(isset($_SESSION["etat0"]) && $_SESSION["etat0"]=="Vous devez d'abord vous inscrire !!"){ 
    header("Location: ../signup.php");
    exit(0);
    /* client a deja cette activite */
}elseif ( isset($_SESSION["etat"]) && $_SESSION["etat"] == "Vous avez déjà souscrit à cette activité !!" ) {
    header("Location: ../subscribe.php");
    exit(0);
}else{
    $connexion->query("INSERT INTO subscription VALUES ('$client_id','$activity_id' ,'$souscription_date')");
    $_SESSION['etat']="Bienvenue, activité ajoutée avec succés !!";
    $connexion->close();
    header("Location: ../subscribe.php");
}



?>
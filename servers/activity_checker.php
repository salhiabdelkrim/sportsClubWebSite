<?php
session_start();
//accés à la base de données 
$serveur = "localhost";    // Adresse du serveur
$utilisateur = "root";     // Nom d'utilisateur MySQL
$motDePasse = "";          // Mot de passe MySQL
$baseDeDonnees = "my_site_db";  // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

//Récupérer la valeur du champ 'activity_id'
$activity_id = isset($_POST['activity_id']) ? trim($_POST['activity_id']) : '';
$idClient = isset($_POST['client_id']) ? trim($_POST['client_id']) : '';

if (!empty($idClient) && !empty($activity_id)) {
      //Échapper les caractères spéciaux pour éviter les injections SQL
      $activity_id = mysqli_real_escape_string($connexion, $activity_id);
      $idClient = mysqli_real_escape_string($connexion, $idClient);

      //on vérifie est ce que le client est déjà inscrit 
      $query1 = "SELECT * FROM client WHERE  client_id = '$idClient'";
      $result1 = mysqli_query($connexion, $query1); 
      if ($result1) {
        //Vérifie s'il y a des lignes dans le résultat
        if (mysqli_num_rows($result1) == 0) {
            $_SESSION["etat0"]="Vous devez d'abord vous inscrire !!";
        } else {
            unset($_SESSION['etat0']);
        }
        //Libérer le résultat de la requête
        mysqli_free_result($result1);
    } else {
        // Affiche une erreur si la requête a échoué
        echo "Erreur dans la requête : " . mysqli_error($connexion);
    }

      // Exécuter une requête pour vérifier si le username existe avec la meme activité 
      $query = "SELECT * FROM subscription WHERE idActivity = '$activity_id' AND idClient = '$idClient'";
      $result = mysqli_query($connexion, $query); 
      if ($result) {
        // Vérifie s'il y a des lignes dans le résultat
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["etat"]="Vous avez déjà souscrit à cette activité !!";
            echo json_encode(array('existe'=> 1 )); // L'utilisateur existe
        } else {
            unset($_SESSION['etat']);
            echo json_encode(array('existe'=> 0)); // L'utilisateur n'existe pas
        }
    } else {
        // Affiche une erreur si la requête a échoué
        echo "Erreur dans la requête : " . mysqli_error($connexion);
    }
     // Libérer le résultat de la requête
    if ($result) {
        mysqli_free_result($result);
    } 
 } else {
    echo json_encode(["error" => "Le champ username ou activité est vide ou manquant."]);
} 
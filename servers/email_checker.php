<?php
session_start();

//accés à la base de données 
$serveur = "localhost";    // Adresse du serveur
$utilisateur = "root";     // Nom d'utilisateur MySQL
$motDePasse = "";          // Mot de passe MySQL
$baseDeDonnees = "my_site_db";  // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

//On vérifie la connexion
 if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
//Récupérer la valeur du champ 'email'
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if (!empty($email)) {
    //Échapper les caractères spéciaux pour éviter les injections SQL
    $email = mysqli_real_escape_string($connexion, $email);

    //Exécuter une requête pour vérifier si le username existe
    $query = "SELECT * FROM client WHERE email = '$email'";
    $result = mysqli_query($connexion, $query); 
    if ($result) {
      //Vérifie s'il y a des lignes dans le résultat
      if (mysqli_num_rows($result) > 0) {
          $rep =true;
      } else {
          $rep =false;
      }
  } else {
      //Affiche une erreur si la requête a échoué
      echo "Erreur dans la requête : " . mysqli_error($connexion);
  }
  header('Content-Type: application/json');
  //Vérifier si une ligne a été retournée
  if ($rep){
      echo json_encode(array('existe'=> 1)); // L'utilisateur existe
  } else {
      echo json_encode(array('existe'=> 0)); // L'utilisateur n'existe pas
  }

   //Libérer le résultat de la requête
  if ($result) {
      mysqli_free_result($result);
  } 
} else {
  echo json_encode(["error" => "Le champ email est vide ou manquant."]);
} 

//Fermer la connexion
$connexion->close();
?>
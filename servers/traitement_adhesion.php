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
$firstname= isset($_POST["firstname"]) && ctype_alpha($_POST["firstname"]) ? $_POST["firstname"] : die("Prénom invalide !");
$lastname= isset($_POST["lastname"]) && ctype_alpha($_POST["lastname"]) ? $_POST["lastname"] : die("Nom invalide !");
$sexe= isset($_POST["sexe"]) ? $_POST["sexe"] : "NULL";
$age=  isset($_POST["age"]) ? $_POST["age"] : die("age invalide !");
$email=isset($_POST["email"]) ? $_POST["email"] : die("Email invalide !"); 



if (!empty($client_id)) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $client_id = mysqli_real_escape_string($connexion, $client_id);
    
    // Exécuter une requête pour vérifier si le username existe
    $query = "SELECT * FROM client WHERE client_id = '$client_id'";
    $result = mysqli_query($connexion, $query); 
     if (mysqli_num_rows($result) > 0) {
      $_SESSION["etat0"]="le nom d'utilisateur ou l'email est déjà utilisé !!";
      // Vérifie s'il y a des lignes dans le résultat
        header("Location: ../signup.php");
        }
      else{ 
        $connexion->query("INSERT INTO client VALUES ('$client_id','$firstname' ,'$lastname','$sexe','$age','$email')");
        $_SESSION["etat"]="Bienvenue , adhésion enregistrée !!";
        $connexion->close();
        header("Location: ../subscribe.php");
       } 
    
}
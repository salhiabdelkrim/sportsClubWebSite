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
}else{
    //Récupérer la valeur du champ 'email'
$client_id = isset($_POST['client_id']) ? trim($_POST['client_id']) : '';

if (empty($client_id)) {
    echo json_encode(["error" => "Aucun ID client fourni."]);
    exit;
}
//Requête pour récupérer les activités souscrites
$sql = "SELECT a.name, a.saison
        FROM subscription s
        INNER JOIN activity a ON s.idActivity = a.activity_id
        WHERE s.idClient = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("s", $client_id);
$stmt->execute();
$result = $stmt->get_result();

$activities = [];
while ($row = $result->fetch_assoc()) {
    $activities[] = [
        "name" => $row['name'],
        "saison" => $row['saison']
    ];
}

//Retourner les activités en JSON
echo json_encode($activities);


}
?>
<?php
session_start();
unset($_SESSION['etat0']);
unset($_SESSION['etat']);
//accés à la base de données 
$serveur = "localhost";    // Adresse du serveur
$utilisateur = "root";     // Nom d'utilisateur MySQL
$motDePasse = "";          // Mot de passe MySQL
$baseDeDonnees = "my_site_db";  // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion ->connect_error){
    echo "Echec lors de la connexion à MySQL : (".$connexion-> connect_errno .") ".$connexion->connect_error; 
}else{
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/membres_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/script_membres.js"></script>
        <title>PlayTogether - Nos membres</title>
    </head>
    <body>
        <!-- affichage du header  -->
        <?php include 'header.php'; ?>
        <section class="articles">
            <h1>Nos Membres</h1>
           
            <div class="grid">
               <!--  Affichage dynamique de la liste des membres enregistrée  dans la base de données "my_site_db" -->
                <?php
                    $sql="SELECT c.client_id, c.firstname, c.lastname, c.sex, c.age FROM client c";
                    $results=$connexion->query($sql);
                    $compteur=1;
                    if (mysqli_num_rows($results) > 0) {
                    while($row = $results->fetch_assoc()){
                        $_SESSION["membre"]=$row['client_id'];
                        echo "
                            <div class='membre'> 
                                <h3>Membre {$compteur}</h3>
                                <ul class='affichage1'>
                                    <li><strong>Nom :</strong> {$row['lastname']}</li>
                                    <li><strong>Prénom :</strong> {$row['firstname']}</li>
                                    <li><strong>Sexe :</strong> {$row['sex']}</li>
                                    <li><strong>Âge :</strong> {$row['age']}</li>
                                </ul>
                                
                                <button class='activ' data-client-id='{$row['client_id']}'>Ses Activités</button>
                            </div>";
                        $compteur++;
                    }
                }else{
                    echo "<p>AUCUN MEMBRE .</p>";
                }
                }
                ?>
                
                
            </div>
        </section>
        <!-- le contenu de cette section est généré par le fichier "script_membres.js" -->
        <section class="activities">
        <span id="fermeture">✖</span>
        <h1 >Activités souscrites </h1>
        <p>aucune activité souscrite </p>
        <ul class="affichage" >
        
        </ul>
    </section>
    </body>
</html>
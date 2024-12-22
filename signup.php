<?php
session_start();
unset($_SESSION['etat']);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/signup_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/script_signup.js"></script>
        <title>PlayTogether - Rejoindre l'Univers</title>
    </head>
    <body>
        <!-- affichage du header  -->
        <?php include 'header.php'; ?>
        <section>
            <h2>Inscription</h2>
            <!-- Affichage du message selon le traitement réalisé par l'utilisateur  -->
            <?php if (isset($_SESSION["etat0"]) && ($_SESSION["etat0"]== "Vous devez d'abord vous inscrire !!" || $_SESSION["etat0"]=="le nom d'utilisateur ou l'email est déjà utilisé !!" 
            || $_SESSION["etat0"]== "Bienvenue , adhésion enregistrée !!" ) ) echo "<p>$_SESSION[etat0]</p>";   ?>
            <form id="adhesion_form" action="./servers/traitement_adhesion.php" method="POST">
                <div>
                <label for="id_client">Nom d'utilisateur :</label>
                <input type="text" id="id_client" name="client_id" placeholder="Entrez votre Nom d'utilisateur">
                </div>
                <i id="defaut1"></i>
                <div>
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom">
                </div>
                <i id="defaut2"></i>
                <div>
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" placeholder="Entrez votre nom de famille">
                </div>
                <i id="defaut3"></i>
                <div>
                <label for="sexe">Sexe :</label>
                <div>
                    <label for="homme">Homme :</label>
                    <input id="homme" type="radio" name="sexe" value="homme">
                    <label for="femme">Femme :</label>
                    <input id="femme" type="radio" name="sexe" value="femme">
                </div>
                </div>
                <i id="defaut4"></i>
                <div>
                <label for="age">&Acircge :</label>
                <input type="number" id="age" name="age" placeholder="Entrez votre âge">
                </div>
                <i id="defaut5"></i>
                <div>
                <label for="email">Courriel :</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre adresse courriel" >
                </div>
                <i id="defaut6"></i>
                
                <div>
                <input type="submit" name="submit" value="S'enregistrer">
                <input type="reset" name="reset"> 
                </div>
                
                
            </form>
        
    </body>
</html>

<?php 

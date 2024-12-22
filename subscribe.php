<?php
session_start();
unset($_SESSION['etat0']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/subscribe_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/script_subscribe.js"></script>
        <title>PlayTogether - Adhésion</title>
    </head>
    <body>
        <!-- affichage du header  -->
        <?php include 'header.php'; ?>
        <!-- Affichage du message selon le traitement réalisé par l'utilisateur  -->
        <?php if (isset($_SESSION["etat"]) && ($_SESSION["etat"]== "Vous avez déjà souscrit à cette activité !!" || $_SESSION["etat"]=="Bienvenue , adhésion enregistrée !!"
        || $_SESSION['etat']=="Bienvenue, activité ajoutée avec succés !!")) echo "<h4 id='hide'>$_SESSION[etat]</h4>";  ?>
        <section class="articles">
            <h1>Nos Activités sportives</h1>
           
            <div class="grid">
                <div class="kayak"> 
                    <img src="./PICS/kayak.jpg" alt="KAYAK">
                    <h3>- KAYAK - </h3>
                    <ul>
                        <li><strong>ID :</strong> KAY001</li>
                        <li><strong>Description :</strong>Activité nautique idéale pour explorer les lacs et rivières tout en développant la force et l’endurance.</li>
                        <li><strong>Prix d'adhésion :</strong>50 $/mois</li>
                        <li><strong>Saison :</strong>Printemps, Été</li>
                    </ul>
                    <button class="ajout_panier">Ajouter au panier</button>
                </div>
                <div>
                    <img src="./PICS/hockey.jpg" alt="HOCKEY" >
                    <h3> - HOCKEY -</h3>
                    <ul>
                        <li><strong>ID :</strong> HOC002</li>
                        <li><strong>Description :</strong>Sport d'équipe rapide et intense, joué sur glace, idéal pour améliorer l’agilité et l’esprit collectif.</li>
                        <li><strong>Prix d'adhésion :</strong>75 $/mois</li>
                        <li><strong>Saison :</strong>Hiver</li>
                    </ul>
                    <button class="ajout_panier">Ajouter au panier</button>
                </div>
                <div>
                    <img src="./PICS/soccer.png" alt="SOCCER" >
                        <h3> - SOCCER -</h3>
                        <ul>
                            <li><strong>ID :</strong> SOC003</li>
                            <li><strong>Description :</strong>Activité populaire, mêlant stratégie et endurance, pour des matchs dynamiques sur terrain extérieur ou intérieur.</li>
                            <li><strong>Prix d'adhésion :</strong>40 $/mois</li>
                            <li><strong>Saison :</strong>Printemps, Été, Automne</li>
                        </ul>
                        <button class="ajout_panier">Ajouter au panier</button>
                </div>
                <div>
                <img src="./PICS/baseball.jpg" alt="BASEBALL" >
                    <h3> - BASEBALL -</h3>
                    <ul>
                        <li><strong>ID :</strong> BAS004</li>
                        <li><strong>Description :</strong>Sport collectif axé sur la coordination et la précision, pratiqué sur des terrains adaptés.</li>
                        <li><strong>Prix d'adhésion :</strong>45 $/mois</li>
                        <li><strong>Saison :</strong>Printemps, Été</li>
                    </ul>
                    <button class="ajout_panier">Ajouter au panier</button>
                </div> 
                <div>
                    <img src="./PICS/footing.jpg" alt="FOOTING" >
                    <h3> - FOOTING -</h3>
                    <ul>
                        <li><strong>ID :</strong> FOO005</li>
                        <li><strong>Description :</strong>Activité individuelle ou en groupe pour améliorer la condition physique et réduire le stress.</li>
                        <li><strong>Prix d'adhésion :</strong>20 $/mois</li>
                        <li><strong>Saison :</strong>Toute l'année</li>
                    </ul>
                    <button class="ajout_panier">Ajouter au panier</button>
                </div>
                <div>
                    <img src="./PICS/tennis.png" alt="TENNIS">
                    <h3> - TENNIS -</h3>
                    <ul>
                        <li><strong>ID :</strong> TEN006</li>
                        <li><strong>Description :</strong>Sport individuel ou en duo, parfait pour développer la coordination, la concentration et la stratégie.</li>
                        <li><strong>Prix d'adhésion :</strong>60 $/mois</li>
                        <li><strong>Saison :</strong>Printemps, Été, Automne</li>
                    </ul>
                    <button class="ajout_panier">Ajouter au panier</button>
                </div>
            </div>
        </section>
        <section class="confirmation">
        <span>✖</span>
        <h1 >Souscription</h1>
       
        <form action="./servers/traitement_souscription.php" method="POST" id="souscription_form">
            <div>
            <label for="activity_id">L'activité souhaitée:</label>
            <select name="activity_id" id="activity_id">
                <option value="KAY001">KAYAK</option>
                <option value="HOC002">HOCKEY</option>
                <option value="SOC003">SOCCER</option>
                <option value="BAS004">BASEBALL</option>
                <option value="FOO005">FOOTING</option>
                <option value="TEN006">TENNIS</option>
            </select>
            </div>
            <i id="erreur0"></i>
            <div>
            <label for="client_id">Identifiant du client :</label>
            <input type="text" name="client_id" id="client_id" placeholder="Nom d'utilisateur">
            </div>
            <i id="erreur1"></i>
            <div>
            <label for="souscription_date">Date de début :</label>
            <input type="date" name="souscription_date">
            </div>
            <i id="erreur2"></i>
            <input type="submit" value="Souscrire">
        </form>
    </section>
    
</body>
</html>
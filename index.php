<?php
session_start();
unset($_SESSION['etat0']);
unset($_SESSION['etat']);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/index_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/myscript.js"></script>
        <title>PlayTogether</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <section class="articles">
            <h1>Découvrez Notre Univers</h1>
            <p>
                Avec <strong>PlayTogether</strong> Vivez des expériences uniques et enrichissantes avec nos activités! Découvrez, 
                apprenez et amusez-vous dans un cadre convivial et stimulant. Rejoignez-nous dès
                 aujourd’hui
            </p>
        </section>
        <section class="articles">
            <h1>Découvrez Nos Activités</h1>
            <div class="grid">
                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';"> 
                    <img src="./PICS/kayak.jpg" alt="KAYAK">
                    <h3>- KAYAK - </h3>
                </div>
                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/hockey.jpg" alt="HOCKEY" >
                    <h3> - HOCKEY -</h3>
                </div>
                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/soccer.png" alt="SOCCER" >
                    <h3> - SOCCER -</h3>
                </div>
                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/baseball.jpg" alt="BASEBALL" >
                    <h3> - BASEBALL -</h3>
                </div> 
                <div>
                    <h1><a href="activities.php">Voir plus ...</a></h1>
                </div>
            </div>
        </section>    
    </body>
</html>
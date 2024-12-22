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
        <link rel="stylesheet" href="./styles/activities_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/myscript.js"></script>
        <title>PlayTogether - Nos activités</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <section class="articles">
            <h1>Pour aimer le sport </h1>
            <div class="grid">

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';"> 
                    <img src="./PICS/kayak.jpg" alt="KAYAK">
                    <h3>- KAYAK - </h3>
                    <p>Le kayak est une petite embarcation légère propulsée par une pagaie double, utilisée principalement pour la navigation sur des rivières, des lacs ou en mer. Il existe différents types de kayaks, adaptés à la randonnée, à la course ou aux eaux vives. Conçu pour être stable et maniable, le kayak est souvent fabriqué en matériaux légers comme le plastique ou la fibre de carbone.</p>
                </div>

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/hockey.jpg" alt="HOCKEY" >
                    <h3> - HOCKEY -</h3>
                    <p>Le hockey est un sport collectif où deux équipes s'affrontent pour marquer des buts en envoyant une balle ou un palet dans le but adverse à l'aide de bâtons. Il se joue sur une patinoire (hockey sur glace) ou sur un terrain (hockey sur gazon). Ce sport exige rapidité, agilité et une coordination parfaite entre les joueurs.</p>
                </div>

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/soccer.png" alt="SOCCER" >
                    <h3> - SOCCER -</h3>
                    <p>Le soccer, ou football, est un sport collectif où deux équipes de 11 joueurs s'affrontent pour marquer des buts en envoyant un ballon dans le but adverse. Le jeu se pratique sur un terrain rectangulaire, et les joueurs utilisent principalement leurs pieds pour contrôler et passer le ballon. C'est l'un des sports les plus populaires au monde, apprécié pour sa simplicité et son aspect dynamique.</p>
                </div>

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/baseball.jpg" alt="BASEBALL" >
                    <h3> - BASEBALL -</h3>
                    <p>Le baseball est un sport collectif où deux équipes de neuf joueurs s'affrontent sur un terrain en forme de diamant. L'objectif est de frapper une balle lancée par l'adversaire avec une batte et de courir autour de quatre bases pour marquer des points. Ce sport combine stratégie, puissance et précision, et est très populaire en Amérique du Nord et au Japon.</p>
                </div>

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/footing.jpg" alt="FOOTING" >
                    <h3> - FOOTING -</h3>
                    <p>Le footing est une activité physique consistant à courir à un rythme modéré sur une certaine distance ou durée. Pratiqué principalement en extérieur, il est accessible à tous, sans besoin d'équipement complexe. C'est un excellent moyen d'améliorer sa condition physique, de renforcer le cœur et de réduire le stress.</p>
                </div>

                <div role="button" tabindex="0" onclick="window.location.href='subscribe.php';">
                    <img src="./PICS/tennis.png" alt="TENNIS" >
                    <h3> - TENNIS -</h3>
                    <p>Le tennis est un sport de raquette joué entre deux joueurs (simple) ou deux équipes de deux joueurs (double) qui s'affrontent pour envoyer une balle au-dessus d'un filet, dans le camp adverse. Le but est de marquer des points en faisant rebondir la balle dans les limites du terrain de l'adversaire. Ce sport demande agilité, précision et endurance.</p>
                </div>
            
            </div>
        </section> 

    </body>
</html>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/header.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   
        <script src="./script/myscript.js"></script>
        <title>Header</title>
    </head>
    <body>
          
        <header>
            <a href="index.php">
            <img src="./PICS/logoSansFond.png" alt="PlayTogether" height="130"></a>
            <a id="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </a> 
        </header>
        <nav id="side-menu">
            <span>✖</span>
            <ul>
                <li> <a href="index.php">Accueil</a></li>
                <li><a href="signup.php">Rejoindre l'équipe</a></li>
                <li><a href="subscribe.php">Choisir une activité</a></li>
                <li class="hide"><a href="membres.php">Nos équipes</a></li>
                <li><a href="activities.php">Nos activités</a></li>
            </ul>
        </nav>

        
    </body>
</html>
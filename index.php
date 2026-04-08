<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Players - Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
       
    <div class="header">  
        
        <div class="titre">
            <h1>Football Players Manager</h1>
            <p>Gérez votre base de données de joueurs de football</p>
        </div>
        <div class="menu">
            <div class="menu_items">
                 <a href="index.php">Accueil</a>
                 <img src="img/home.png" alt="">
            </div>
            <div class="menu_items">
                 <a href="players.php">Liste des joueurs</a>
                 <img src="img/list.png" alt="">
            </div>
            <div class="menu_items">
                 <a href="add_player.php">Ajouter un joueur</a>
                 <img src="img/addPlayer.png" alt="">
            </div>
           
            
            
        </div>

         
    </div>
     
        <div class="form-container">
            <h2>Bienvenue dans votre gestionnaire de joueurs !</h2>
            <p style="margin-top: 20px;">Cette application vous permet de :</p>
            <ul style="margin: 20px 0 0 30px;">
                <li> Visualiser tous les joueurs</li>
                <li> Ajouter de nouveaux joueurs</li>
                <li> Modifier les informations des joueurs</li>
                <li> Supprimer des joueurs</li>
            </ul>
            
            <?php
           /* $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM players");
            $row = mysqli_fetch_assoc($result);*/
            ?>
            <p style="margin-top: 30px; font-size: 1.2em; text-align: center;">
                <strong><?php/* echo $row['total'];*/ ?></strong> joueurs enregistrés
            </p>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="players.php" class="btn btn-add">Voir la liste des joueurs →</a>
            </div>
        </div>
         <div class="form-container-2">
            <h2>Bienvenue dans votre gestionnaire de joueurs !</h2>
            <p style="margin-top: 20px;">Cette application vous permet de :</p>
            <ul style="margin: 20px 0 0 30px;">
                <li> Visualiser tous les joueurs</li>
                <li> Ajouter de nouveaux joueurs</li>
                <li> Modifier les informations des joueurs</li>
                <li> Supprimer des joueurs</li>
            </ul>
            
            <?php
           /* $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM players");
            $row = mysqli_fetch_assoc($result);*/
            ?>
            <p style="margin-top: 30px; font-size: 1.2em; text-align: center;">
                <strong><?php/* echo $row['total'];*/ ?></strong> joueurs enregistrés
            </p>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="players.php" class="btn btn-add">Voir la liste des joueurs →</a>
            </div>
        </div>
       <!-- 
        <footer>
            <p>&copy; 2026 Football Players Manager - Tous droits réservés</p>
        </footer>
        -->
        <!-- Bouton de déconnexion multicolore en bas à droite -->
<a href="logout.php" class="logout-btn">
    🔓 SE DÉCONNECTER
</a>

<style>
    .logout-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        text-decoration: none;
        font-family: Arial, sans-serif;
        font-weight: bold;
        font-size: 18px;
        padding: 14px 28px;
        border-radius: 50px;
        color: white;
        text-align: center;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, red, orange, yellow, green, blue, indigo, violet);
        background-size: 300% 300%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        animation: colorChange 3s ease infinite;
    }

    @keyframes colorChange {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .logout-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }
</style>
    </div>
</body>
</html>
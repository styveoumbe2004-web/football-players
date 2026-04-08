<?php
include 'config.php';

// Récupérer l'historique des clubs pour chaque joueur
$stmt = $pdo->query("
    SELECT ph.*, p.first_name, p.last_name 
    FROM player_history ph 
    JOIN players p ON ph.player_id = p.id 
    ORDER BY p.last_name, ph.start_date
");
$history = $stmt->fetchAll();

// Grouper par joueur
$players_history = [];
foreach($history as $record) {
    $players_history[$record['player_id']]['name'] = $record['first_name'] . ' ' . $record['last_name'];
    $players_history[$record['player_id']]['clubs'][] = $record;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique - FootballPlayers Hub</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-futbol"></i>
                <span>FootballPlayers Hub</span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.html"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="players.php"><i class="fas fa-users"></i> Joueurs</a></li>
                <li><a href="transfers.php"><i class="fas fa-exchange-alt"></i> Transferts</a></li>
                <li><a href="statistics.php"><i class="fas fa-chart-line"></i> Statistiques</a></li>
                <li><a href="history.php" class="active"><i class="fas fa-history"></i> Historique</a></li>
                <li><a href="add_player.php" class="btn-add"><i class="fas fa-plus"></i> Ajouter</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="page-header">
            <h1><i class="fas fa-history"></i> Historique des carrières</h1>
            <p>Parcours complet des joueurs à travers les clubs</p>
        </div>

        <div class="history-container">
            <?php foreach($players_history as $player_id => $player): ?>
            <div class="history-card">
                <div class="history-header">
                    <h3><?php echo $player['name']; ?></h3>
                </div>
                <div class="timeline">
                    <?php foreach($player['clubs'] as $club): ?>
                    <div class="timeline-item">
                        <div class="timeline-date">
                            <?php echo date('Y', strtotime($club['start_date'])); ?> - 
                            <?php echo $club['end_date'] ? date('Y', strtotime($club['end_date'])) : 'Présent'; ?>
                        </div>
                        <div class="timeline-content">
                            <div class="club-name">
                                <i class="fas fa-building"></i>
                                <strong><?php echo $club['club']; ?></strong>
                            </div>
                            <div class="club-stats">
                                <span><i class="fas fa-futbol"></i> <?php echo $club['appearances']; ?> matchs</span>
                                <span><i class="fas fa-chart-line"></i> <?php echo $club['goals']; ?> buts</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>FootballPlayers Hub</h4>
                <p>Votre source de confiance pour les données footballistiques</p>
            </div>
            <div class="footer-section">
                <h4>Liens rapides</h4>
                <ul>
                    <li><a href="players.php">Joueurs</a></li>
                    <li><a href="transfers.php">Transferts</a></li>
                    <li><a href="statistics.php">Statistiques</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Suivez-nous</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 FootballPlayers Hub. Tous droits réservés.</p>
        </div>
    </footer>

    <style>
        .history-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .history-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .history-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 1rem 1.5rem;
        }
        
        .history-header h3 {
            color: white;
            margin: 0;
        }
        
        .timeline {
            padding: 2rem;
            position: relative;
        }
        
        .timeline:before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        
        .timeline-item {
            position: relative;
            padding-left: 60px;
            margin-bottom: 2rem;
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            left: 22px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #667eea;
            border: 2px solid white;
            box-shadow: 0 0 0 2px #667eea;
        }
        
        .timeline-date {
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .timeline-content {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
        }
        
        .club-name {
            margin-bottom: 0.5rem;
        }
        
        .club-name i {
            color: #667eea;
            margin-right: 8px;
        }
        
        .club-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.9rem;
            color: #666;
        }
        
        .club-stats i {
            margin-right: 5px;
            color: #667eea;
        }
        
        @media (max-width: 768px) {
            .timeline:before {
                left: 20px;
            }
            
            .timeline-item {
                padding-left: 40px;
            }
            
            .timeline-item:before {
                left: 14px;
            }
            
            .club-stats {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>

    <script src="script.js"></script>
</body>
</html>

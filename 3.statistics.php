<?php
include 'config.php';

// Récupérer les statistiques par joueur
$stmt = $pdo->query("
    SELECT s.*, p.first_name, p.last_name 
    FROM statistics s 
    JOIN players p ON s.player_id = p.id 
    ORDER BY s.season DESC, s.goals DESC
");
$stats = $stmt->fetchAll();

// Grouper par joueur
$players_stats = [];
foreach($stats as $stat) {
    $players_stats[$stat['player_id']]['name'] = $stat['first_name'] . ' ' . $stat['last_name'];
    $players_stats[$stat['player_id']]['stats'][] = $stat;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - FootballPlayers Hub</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <li><a href="statistics.php" class="active"><i class="fas fa-chart-line"></i> Statistiques</a></li>
                <li><a href="history.php"><i class="fas fa-history"></i> Historique</a></li>
                <li><a href="add_player.php" class="btn-add"><i class="fas fa-plus"></i> Ajouter</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="page-header">
            <h1><i class="fas fa-chart-line"></i> Statistiques des joueurs</h1>
            <p>Performances saison par saison</p>
        </div>

        <div class="stats-container">
            <?php foreach($players_stats as $player_id => $player_data): ?>
            <div class="stats-card">
                <div class="stats-header">
                    <h3><?php echo $player_data['name']; ?></h3>
                </div>
                <div class="stats-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Saison</th>
                                <th>Club</th>
                                <th>Matchs</th>
                                <th>Buts</th>
                                <th>Passes D.</th>
                                <th>Cartons J.</th>
                                <th>Cartons R.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($player_data['stats'] as $stat): ?>
                            <tr>
                                <td><?php echo $stat['season']; ?></td>
                                <td><?php echo $stat['club']; ?></td>
                                <td><?php echo $stat['appearances']; ?></td>
                                <td><strong><?php echo $stat['goals']; ?></strong></td>
                                <td><?php echo $stat['assists']; ?></td>
                                <td><?php echo $stat['yellow_cards']; ?></td>
                                <td><?php echo $stat['red_cards']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <!-- Même footer -->
    </footer>

    <script src="script.js"></script>
</body>
</html>
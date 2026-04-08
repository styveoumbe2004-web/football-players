<?php
include 'config.php';

// Récupérer tous les transferts avec les infos joueurs
$stmt = $pdo->query("
    SELECT t.*, p.first_name, p.last_name 
    FROM transfers t 
    JOIN players p ON t.player_id = p.id 
    ORDER BY t.transfer_date DESC
");
$transfers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferts - FootballPlayers Hub</title>
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
                <li><a href="transfers.php" class="active"><i class="fas fa-exchange-alt"></i> Transferts</a></li>
                <li><a href="statistics.php"><i class="fas fa-chart-line"></i> Statistiques</a></li>
                <li><a href="history.php"><i class="fas fa-history"></i> Historique</a></li>
                <li><a href="add_player.php" class="btn-add"><i class="fas fa-plus"></i> Ajouter</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="page-header">
            <h1><i class="fas fa-exchange-alt"></i> Historique des transferts</h1>
            <p>Suivez tous les mouvements du marché</p>
        </div>

        <div class="transfers-list">
            <?php foreach($transfers as $transfer): ?>
            <div class="transfer-card">
                <div class="transfer-player">
                    <h3><?php echo $transfer['first_name'] . ' ' . $transfer['last_name']; ?></h3>
                </div>
                <div class="transfer-details">
                    <div class="transfer-club from">
                        <i class="fas fa-sign-out-alt"></i>
                        <span><?php echo $transfer['from_club']; ?></span>
                    </div>
                    <div class="transfer-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="transfer-club to">
                        <i class="fas fa-sign-in-alt"></i>
                        <span><?php echo $transfer['to_club']; ?></span>
                    </div>
                </div>
                <div class="transfer-info">
                    <span class="transfer-date"><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($transfer['transfer_date'])); ?></span>
                    <span class="transfer-fee"><i class="fas fa-euro-sign"></i> <?php echo number_format($transfer['transfer_fee'], 0, ',', ' '); ?> M</span>
                    <span class="transfer-type"><i class="fas fa-tag"></i> <?php echo $transfer['transfer_type']; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <!-- Même footer que sur les autres pages -->
    </footer>

    <script src="script.js"></script>
</body>
</html>
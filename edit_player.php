<?php include 'config.php';
$id = intval($_GET['id']);
$message = '';

$result = mysqli_query($conn, "SELECT * FROM players WHERE id = $id");
$player = mysqli_fetch_assoc($result);

if (!$player) {
    header('Location: players.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $birth_date = $_POST['birth_date'];
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $height = intval($_POST['height']);
    $weight = intval($_POST['weight']);
    $foot = mysqli_real_escape_string($conn, $_POST['foot']);
    $current_club = mysqli_real_escape_string($conn, $_POST['current_club']);
    $jersey_number = $_POST['jersey_number'] ? intval($_POST['jersey_number']) : 'NULL';
    
    $sql = "UPDATE players SET 
            first_name='$first_name', 
            last_name='$last_name', 
            nationality='$nationality',
            birth_date='$birth_date',
            position='$position',
            height=$height,
            weight=$weight,
            foot='$foot',
            current_club='$current_club',
            jersey_number=$jersey_number
            WHERE id=$id";
    
    if(mysqli_query($conn, $sql)) {
        $message = '<div class="message success">✅ Joueur modifié avec succès !</div>';
        $result = mysqli_query($conn, "SELECT * FROM players WHERE id = $id");
        $player = mysqli_fetch_assoc($result);
    } else {
        $message = '<div class="message error">❌ Erreur : ' . mysqli_error($conn) . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un joueur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>⚽ Modifier un joueur</h1>
            <p>Modifiez les informations du joueur</p>
        </header>
        
        <nav>
            <a href="index.php">🏠 Accueil</a>
            <a href="players.php">📋 Liste des joueurs</a>
            <a href="add_player.php">➕ Ajouter un joueur</a>
        </nav>
        
        <?php echo $message; ?>
        
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Prénom *</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($player['first_name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Nom *</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($player['last_name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Date de naissance *</label>
                    <input type="date" name="birth_date" value="<?php echo $player['birth_date']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Nationalité *</label>
                    <input type="text" name="nationality" value="<?php echo htmlspecialchars($player['nationality']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Position *</label>
                    <select name="position" required>
                        <option value="Gardien" <?php echo $player['position'] == 'Gardien' ? 'selected' : ''; ?>>🧤 Gardien</option>
                        <option value="Défenseur" <?php echo $player['position'] == 'Défenseur' ? 'selected' : ''; ?>>🛡️ Défenseur</option>
                        <option value="Milieu" <?php echo $player['position'] == 'Milieu' ? 'selected' : ''; ?>>⚡ Milieu</option>
                        <option value="Attaquant" <?php echo $player['position'] == 'Attaquant' ? 'selected' : ''; ?>>🎯 Attaquant</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Taille (cm)</label>
                    <input type="number" name="height" value="<?php echo $player['height']; ?>" min="150" max="220">
                </div>
                
                <div class="form-group">
                    <label>Poids (kg)</label>
                    <input type="number" name="weight" value="<?php echo $player['weight']; ?>" min="50" max="120">
                </div>
                
                <div class="form-group">
                    <label>Pied fort</label>
                    <select name="foot">
                        <option value="Droit" <?php echo $player['foot'] == 'Droit' ? 'selected' : ''; ?>>Droit</option>
                        <option value="Gauche" <?php echo $player['foot'] == 'Gauche' ? 'selected' : ''; ?>>Gauche</option>
                        <option value="Ambidextre" <?php echo $player['foot'] == 'Ambidextre' ? 'selected' : ''; ?>>Ambidextre</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Club actuel *</label>
                    <input type="text" name="current_club" value="<?php echo htmlspecialchars($player['current_club']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Numéro de maillot</label>
                    <input type="number" name="jersey_number" value="<?php echo $player['jersey_number']; ?>" min="1" max="99">
                </div>
                
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-submit">💾 Enregistrer les modifications</button>
                    <a href="players.php" class="btn btn-back">↩️ Annuler</a>
                </div>
            </form>
        </div>
        
        <footer>
            <p>&copy; 2024 Football Players Manager - Tous droits réservés</p>
        </footer>
    </div>
</body>
</html>
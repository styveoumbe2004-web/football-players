<?php
include 'config.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nationality = $_POST['nationality'];
    $birth_date = $_POST['birth_date'];
    $position = $_POST['position'];
    $height = !empty($_POST['height']) ? $_POST['height'] : 'NULL';
    $weight = !empty($_POST['weight']) ? $_POST['weight'] : 'NULL';
    $foot = $_POST['foot'];
    $current_club = $_POST['current_club'];
    $jersey_number = !empty($_POST['jersey_number']) ? $_POST['jersey_number'] : 'NULL';
    
    $sql = "INSERT INTO players (first_name, last_name, nationality, birth_date, position, height, weight, foot, current_club, jersey_number) 
            VALUES ('$first_name', '$last_name', '$nationality', '$birth_date', '$position', $height, $weight, '$foot', '$current_club', $jersey_number)";
    
    if(mysqli_query($conn, $sql)) {
        $message = '<p style="color:green; background:#d4edda; padding:10px; border-radius:5px;">✅ Joueur ajouté avec succès !</p>';
    } else {
        $message = '<p style="color:red; background:#f8d7da; padding:10px; border-radius:5px;">❌ Erreur : ' . mysqli_error($conn) . '</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #1a472a; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; }
        input, select { width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ddd; border-radius: 5px; }
        label { font-weight: bold; }
        button { background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #219a52; }
        .btn-back { background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px; }
        h1 { color: #1a472a; }
    </style>
</head>
<body>
<div class="container">
    <h1>⚽ Ajouter un joueur</h1>
    
    <?php echo $message; ?>
    
    <form method="POST" action="">
        <label>Prénom *</label>
        <input type="text" name="first_name" required>
        
        <label>Nom *</label>
        <input type="text" name="last_name" required>
        
        <label>Date de naissance *</label>
        <input type="date" name="birth_date" required>
        
        <label>Nationalité *</label>
        <input type="text" name="nationality" required>
        
        <label>Position *</label>
        <select name="position" required>
            <option value="">Sélectionnez</option>
            <option value="Gardien">🧤 Gardien</option>
            <option value="Défenseur">🛡️ Défenseur</option>
            <option value="Milieu">⚡ Milieu</option>
            <option value="Attaquant">🎯 Attaquant</option>
        </select>
        
        <label>Taille (cm)</label>
        <input type="number" name="height" placeholder="ex: 178">
        
        <label>Poids (kg)</label>
        <input type="number" name="weight" placeholder="ex: 73">
        
        <label>Pied fort</label>
        <select name="foot">
            <option value="Droit">Droit</option>
            <option value="Gauche">Gauche</option>
            <option value="Ambidextre">Ambidextre</option>
        </select>
        
        <label>Club actuel *</label>
        <input type="text" name="current_club" required>
        
        <label>Numéro de maillot</label>
        <input type="number" name="jersey_number" min="1" max="99">
        
        <button type="submit">✅ Ajouter le joueur</button>
        <br>
        <a href="players.php" class="btn-back">↩️ Retour à la liste</a>
    </form>
</div>
</body>
</html>
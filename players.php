
<?php   
 session_start();  
$host = '127.0.0.1';
$dbname = 'football-players';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM players ORDER BY id";
    $result = $pdo->query($sql);
} catch(Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des joueurs</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f0f0f0; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; background: white; border-collapse: collapse; }
        th { background: #4CAF50; color: white; padding: 10px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f5f5f5; }
    </style>
</head>
<body>
    <h1>⚽ Liste des joueurs de football</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Âge</th>
                <th>Taille (m)</th>
                <th>Poste</th>
                <th>Nationalité</th>
                <th>Diplômes</th>
                <th>Ancien Club</th>
                <th>Club Actuel</th>
                <th>Salaire</th>
                <th>Matchs</th>
                <th>Buts</th>
                <th>Passes D.</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['height'] ?></td>
                <td><?= htmlspecialchars($row['position']) ?></td>
                <td><?= htmlspecialchars($row['nationalite']) ?></td>
                <td><?= htmlspecialchars($row['diplomes']) ?></td>
                <td><?= htmlspecialchars($row['ancien_club']) ?></td>
                <td><?= htmlspecialchars($row['club_actuel']) ?></td>
                <td><?= htmlspecialchars($row['salaire']) ?></td>
                <td><?= $row['matchs_joues'] ?></td>
                <td><?= $row['buts'] ?></td>
                <td><?= $row['passes_decisives'] ?></td>
            </tr>

        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>


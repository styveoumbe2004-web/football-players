<?php
include 'config.php';

$stmt = $pdo->query("SELECT first_name, last_name, position, current_club FROM players ORDER BY id DESC LIMIT 3");
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($players);
?>
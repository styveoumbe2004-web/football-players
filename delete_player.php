<?php include 'config.php';
$id = intval($_GET['id']);

$sql = "DELETE FROM players WHERE id = $id";

if(mysqli_query($conn, $sql)) {
    header('Location: players.php?msg=deleted');
} else {
    echo "Erreur : " . mysqli_error($conn);
}
?>
<?php
// Récupérer l'ID du joueur à bloquer depuis la requête Ajax
if(isset($_POST['player_id'])) {
    $player_id = $_POST['player_id'];

    // Database connection settings
    $dbhost = 'localhost';
    $dbname = 'quizzbd';
    $dbuser = 'root';
    $dbpswd = '';

    // Establish database connection
    try {
        $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la Base de données !");
    }

    // Requête pour mettre à jour le statut du joueur en 'blocked'
    $stmt = $connect->prepare("UPDATE joueur SET status = 'blocked' WHERE Id_joueur = ?");
    $stmt->execute([$player_id]);

    // Répondre à la requête Ajax
    echo "Le joueur a été bloqué avec succès.";
} else {
    // Répondre à la requête Ajax en cas de problème
    echo "Une erreur est survenue lors du blocage du joueur.";
}
?>

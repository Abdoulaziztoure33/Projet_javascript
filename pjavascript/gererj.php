<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joueurs</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="center">
        <div class="box">
        <h1>Liste des Joueurs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Points</th>
            <th>Action</th>
        </tr>
        <?php 
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

        // Fetch players from database
        $stmt = $connect->query("SELECT * FROM joueur");
        $players = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if $players is not empty
        if (!empty($players)) {
            foreach ($players as $player): ?>
            <tr>
                <td><?php echo $player['Id_joueur']; ?></td>
                <td><?php echo $player['Nom']; ?></td>
                <td><?php echo $player['Prenom']; ?></td>
                <td><?php echo $player['Points']; ?></td>
                <td>
                    <!-- Block button -->
                    <?php if ($player['status'] != 'blocked'): ?>
                        <button onclick="blockPlayer(<?php echo $player['Id_joueur']; ?>)">Bloquer</button>
                    <?php endif; ?>
                    <!-- Unblock button -->
                    <?php if ($player['status'] == 'blocked'): ?>
                        <button onclick="unblockPlayer(<?php echo $player['Id_joueur']; ?>)">Débloquer</button>
                    <?php endif; ?>
                    <!-- Delete button -->
                    <button onclick="deletePlayer(<?php echo $player['Id_joueur']; ?>)">Supprimer</button>
                </td>
            </tr>
            <?php endforeach;
        } else {
            echo "<tr><td colspan='5'>Aucun joueur trouvé.</td></tr>";
        }
        ?>
    </table>
        </div>
    </div>
    

    <script>
        function blockPlayer(playerId) {
            // Implement Ajax request to block the player
            $.post("bloquerj.php", { player_id: playerId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }

        function unblockPlayer(playerId) {
            // Implement Ajax request to unblock the player
            $.post("debloquerj.php", { player_id: playerId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }

        function deletePlayer(playerId) {
            // Implement Ajax request to delete the player
            $.post("supprimerj.php", { player_id: playerId }, function(data) {
                console.log(data); // You can handle the response here
            });
        }
    </script>
</body>
</html>




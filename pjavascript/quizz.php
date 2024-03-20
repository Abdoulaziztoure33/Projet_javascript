<?php
$dbhost = 'localhost';
$dbname = 'quizzbd';
$dbuser = 'root';
$dbpswd = '';

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

// Requête SQL pour sélectionner toutes les questions et leurs réponses correspondantes
$sql = "SELECT q.Libellés AS question, r.Libellés_r AS réponse
        FROM question q
        INNER JOIN reponse r ON q.Id_question = r.Id_question";

// Exécution de la requête
$result = $connect->query($sql);

// Vérification s'il y a des résultats
if ($result && $result->rowCount() > 0) {
    // Affichage des questions et réponses
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>question: " . $row['question'] . "</p>";
        
        // Requête pour récupérer les réponses correspondant à la question actuelle
        $sql_reponse = "SELECT Libellés_r FROM reponse WHERE Id_question = :Id_question";
        $stmt_reponse = $connect->prepare($sql_reponse);
        $stmt_reponse->bindParam(':Id_question', $row['Id_question'], PDO::PARAM_INT);
        $stmt_reponse->execute();
        
        // Vérification s'il y a des réponses
        if ($stmt_reponse->rowCount() > 0) {
            echo "<p>Réponses:</p>";
            echo "<ul>";
            while ($row_reponse = $stmt_reponse->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row_reponse['Libellés_r'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucune réponse trouvée pour cette question.</p>";
        }
        echo "<hr>";
    }
    
}
// Fermeture de la connexion à la base de données
$connect = null;
?>

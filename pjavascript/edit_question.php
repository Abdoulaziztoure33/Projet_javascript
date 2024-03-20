<?php
$dbhost = 'localhost';
$dbname = 'quizzbd';
$dbuser = 'root';
$dbpswd = '';

// Vérifier si l'ID de la question est passé en paramètre dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de la question non spécifié.");
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_GET['id'];
    $nouveauLibelle = $_POST['nouveau_libelle'];

    try {
        $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
        
        // Préparer la requête SQL pour mettre à jour le libellé de la question
        $sql = "UPDATE question SET Libellés = :nouveau_libelle WHERE Id_question = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':nouveau_libelle', $nouveauLibelle, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger vers la page de gestion des questions après modification
            header("Location: gerer.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la question.";
        }
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la Base de données !");
    }
}

// Récupérer les détails de la question à partir de la base de données
try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

    $id = $_GET['id'];

    // Requête SQL pour sélectionner la question à modifier
    $sql = "SELECT * FROM question WHERE Id_question = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Vérifier si la question existe
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $libelleQuestion = $row['Libellés'];
    } else {
        die("Question non trouvée dans la base de données.");
    }
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Question</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
<div class="center">
    <div class="box">
    <h2>Modifier Question</h2>
        <form method="post">
            <label for="nouveau_libelle">Nouveau Libellé:</label><br>
            <input type="text" id="nouveau_libelle" name="nouveau_libelle" value="<?php echo $libelleQuestion; ?>"><br><br>
            <input type="submit" value="Modifier" class="boutton">
        </form>
    </div>

</div>


</body>
</html>

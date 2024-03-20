<?php
require_once("connexion.php"); // Assuming "connexion.php" contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Points'], $_POST['Type_Question'], $_POST['Libellés'])) {
        $Points = $_POST['Points'];
        $Type_Question = $_POST['Type_Question'];
        $Libellés = $_POST['Libellés'];
        $query = $connect->prepare("INSERT INTO question(Points,Type_Question,Libellés) VALUES (?,?,?)");
        $testquery = $query->execute([ $Points, $Type_Question, $Libellés]);
        if ($testquery) {
            echo "Données insérées avec succès";
        } else {
            echo "Erreur";
        }
    } else {
        echo "Erreur";
    }
    $query = $connect->query("SELECT * FROM question ");
    $list = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="center">
        <div class="box">
            <h2>Ajoutez une question</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div>
                    <label for="Points">Points:</label>
                    <input type="text" id="Points" name="Points" required>
                </div>
                <div>
                    <label for="Type_Question">Type de question</label>
                    <input type="text" id="Type_Question" name="Type_Question" required>
                </div>
                <div>
                    <label for="Libellés">Libellés</label>
                    <input type="text" id="Libellés" name="Libellés" required>
                </div>
                <input type="submit" value="Soumettre" class="boutton">
            </form>
        </div>
    </div>
</body>
</html>
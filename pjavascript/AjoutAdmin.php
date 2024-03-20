<?php
require_once("connexion.php"); // Assuming "connexion.php" contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'], $_POST['Prenom'], $_POST['Email'], $_POST['Mot_de_passe'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['Email'];
        $motdepasse = $_POST['Mot_de_passe'];
        $query = $connect->prepare("INSERT INTO administrateur(nom,Prenom,Mot_de_passe,Email) VALUES (?,?,?,?)");
        $testquery = $query->execute([$nom, $prenom, $motdepasse, $email]);
        if ($testquery) {
            echo "Données insérées avec succès";
        } else {
            echo "Erreur";
        }
    } else {
        echo "Erreur";
    }
    $query = $connect->query("SELECT * FROM administrateur ");
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
            <h2>Ajoutez un joueur</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div>
                    <label for="Prenom">Prenom</label>
                    <input type="text" id="Prenom" name="Prenom" required>
                </div>
                <div>
                    <label for="Email">Email</label>
                    <input type="text" id="Email" name="Email" required>
                </div>
                <div>
                    <label for="Mot_de_passe">Mot de passe</label>
                    <input type="text" id="Mot_de_passe" name="Mot_de_passe" required>
                </div>
                <input type="submit" value="Soumettre" class="boutton">
            </form>
        </div>
    </div>
</body>
</html>
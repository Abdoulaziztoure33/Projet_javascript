<?php
$dbhost = 'localhost';
$dbname = 'quizzbd';
$dbuser = 'root';
$dbpswd = '';

try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

// Récupérer les données du formulaire
if(isset($_POST['Email'], $_POST['Motdepasse'])) {
    $email = $_POST['Email'];
    $motdepasse = $_POST['Motdepasse'];

    // Vérifier l'authentification de l'utilisateur
    $query = "SELECT type FROM joueur WHERE email = :email AND motdepasse = :motdepasse";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // L'utilisateur est authentifié avec succès
        if($user['type'] == 'admin') {
            // Rediriger l'utilisateur vers la page admin.php
            header("Location: admin.php");
            exit();
        } elseif($user['type'] == 'joueur') {
            // Rediriger l'utilisateur vers la page joueur.php
            header("Location: joueur.php");
            exit();
        } else {
            // Type d'utilisateur inconnu
            echo "Type d'utilisateur inconnu.";
        }
    } else {
        // Échec de l'authentification
        echo "Identifiant ou mot de passe incorrect.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        
        <h1>connexion</h1>
        <div>
            <article>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Beatae est laboriosam vel, quo esse nulla aliquam architecto 
                rerum provident magnam delectus sit enim reiciendis in blanditiis
                exercitationem itaque quos officia.
            </article>
        </div>
    </div>
    <div class="center">
       <div class="boite">
        <form  method="post" class="formAJ">
            <div>
                <label for="Email">Email : </label>
                <input type="text" id="Email"  placeholder="exemple0@email.com" required>
            </div>
            <div>
                <label for="Motdepasse">Mot de passe : </label>
                <input type="password" id="Motdepasse" required>
            </div>

            <div>
                <input type="submit" value="Se connecter" class="boutton_soumission">
            </div>
            
        </form>
       </div>
    </div>
    <footer class="footer">
        <article>Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Quod qui at velit repudiandae quas ullam praesentium dolorem earum 
             voluptatum hic veniam debitis, natus illo deserunt distinctio. 
             Consectetur cumque odit eius?
        </article>
    </footer>
</body>
</html>
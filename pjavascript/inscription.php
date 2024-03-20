<?php
require_once("connexion.php");
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if(isset($_POST ['Nom'], $_POST['Prenom'],$_POST['Email'],$_POST['Mot_de_passe'])){
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['Email'];
        $motdepasse = $_POST['Mot_de_passe'];
        $query = $connect -> prepare ("INSERT INTO joueur(Nom,Prenom,Mot_de_passe,Email) VALUES (?,?,?,?)");
        $testquery = $query -> execute([$nom,$prenom,$motdepasse,$email]);
        if($testquery){
            echo "Données insérés avec succés";
        }
        else{
            echo"Erreur";
        }
    } else{
        echo"Erreur dihjzdhkjzd";
    }

}

$query = $connect -> query ("SELECT * FROM joueur ");
$list = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="head">
        
        <h1>Inscription joueur</h1>
        <div>
            <article>Bienvenue sur la page d'inscription joueur de Quizz IAM. 
                Veuillez vous identifier afin d'executer pleinement votre de joueur dans ce quizz...</article>
        </div>
    </div>
    <div class="center">
        <div class="boite">
        <form method="post" class="formAJ">
    <div>
        <label for="Email">Email : </label>
        <input type="text" id="Email" name="Email" placeholder="exemple0@email.com" required>
    </div>
        
    <div>
        <label for="Nom">Nom : </label>
        <input type="text" id="Nom" name="Nom" required>
    </div>
    <div>
        <label for="Prenom"> Prenom : </label>
        <input type="text" id="Prenom" name="Prenom" required>
    </div>
    <div>
        <label for="Mot_de_passe">Mot de passe : </label>
        <input type="password" id="Mot_de_passe" name="Mot_de_passe" required>
    </div>
    <div>
        <button type="submit" class="boutton_soumission">S'inscrire</button>
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
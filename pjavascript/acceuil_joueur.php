<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style2.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="head">
            <img src="images/IAM-1568x1109.png" alt=""  class="logo">
            <div class="recherche">
                <input type="text" name="recherche" placeholder="rechercher..." required>
                <input type="submit" value=">" class="boutton">
            </div>
        <div class="Theader">
            <h1>Acceuil</h1>
        </div>
        <div class="nav">
                <a href="inscriptionJoueurs.php">Inscription</a>
                <a href="acceuil_admin.php">admin</a>>
                <a href="contact.php">Nous contacter</a>
                <a href="index.php">connexion</a>
        </div>
    </div>
        
        <div class="center">
            <div class="box">
                <h2>Commencer le jeu :</h2>
                <a href="quizz.html" class="boutton">Lancer une partie</a>
            </div>
            <div class="box">
                <h1>Quiz</h1>
                <div id="question-container"></div>
                <span id="timer">Temps restant : </span>
                <button id="next-btn">Suivant</button>
                <div id="result-container"></div>
            </div>
        </div>
        <footer class="footer">
            <article>
                Explorez une vaste gamme de quiz, soigneusement élaborés pour satisfaire tous les intérêts et niveaux de compétence. <br>
                Que vous soyez passionné par la science, la culture générale, la technologie, l'histoire, les langues, ou d'autres domaines encore, notre collection diversifiée de quiz vous offre une opportunité sans fin de découvrir de nouveaux sujets et de défier votre esprit.
            </article>
            <p>© 2024 Quiz App. Tous droits réservés.</p>
        </footer>
</html>

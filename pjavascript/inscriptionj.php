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
        
        <h1>Inscription Joueurs</h1>
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
        <form action="bd.php" method="post" class="formAJ">
            <div>
                <label for="Email">Email : </label>
                <input type="text" id="Email"  placeholder="exemple0@email.com" required>
            </div>
            <div>
                <label for="Nom">Nom : </label>
                <input type="text" id="Nom" required>
            </div>
            <div>
                <label for="Prenom"> Prenom : </label>
                <input type="text" id="Prenom" required>
            </div>
            <div>
                <label for="Motdepasse">Mot de passe : </label>
                <input type="password" id="Motdepasse" required>
            </div>
            <div>
                <label><input type="checkbox">J'accepte les conditions d'utlisation.</label>
            </div>
            <div>
                <a href="https://youtu.be/LvvD9RSp6c8?si=0i4NcOQr0pPoRLDP">Conditions d'utlisation.</a>
                <input type="submit" value="Soumettre" class="boutton_soumission">
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
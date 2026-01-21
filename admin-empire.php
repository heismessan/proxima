
<?php
include 'db.php';
$db = ConnectionDB();


if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $nom = $_POST['nom'];
    $img = $_POST["img"];
    $type = $_POST['type'];
    $descriptions = $_POST['descriptions'];
    $secteur = $_POST['secteur'];
    $pays = $_POST["pays"];
    $lien = $_POST['lien'];
    $citation = $_POST['citation'];
    $db->prepare("INSERT INTO empires (nom, img, types, descriptions, secteur, pays, lien, citation) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)")->execute([$nom, $img, $type, $descriptions, $secteur, $pays, $lien, $citation]);
    header("Location: admin-empire.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <header>
        <nav class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>      
                <div class="logo">
                    <img src="/styles/logo-white.svg" alt="logo du média" height="" width="40">
                </div>
                <a href="search.php" class="icone"><img src="./styles/recherche.svg" alt="icône de recherche"></a>
                <div class="menu-items">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="empires.php">Empires</a></li>
                    <li><a href="maitrises.php">Maîtrises</a></li>
                    <li><a href="opportunite.php">Opportunités</a></li>
                    <li><a href="ressources.php">Ressources</a></li>
                    <li><a href="interview.php">Interviews</a></li>
                    <li><a href="admin-maitrise.php">Admin Maitrises</a></li>
                    <li><a href="admin-empire.php">Admin Empires</a></li>
                    <li><a href="admin-opport.php">Admin Opportunité</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </div>      
            </div>
        </nav>
    </header>
    
    <h1>EMPIRES</h1>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="nom" required>
        <input type="text" name="img" placeholder="image" required>
        <select name="type" id="">
            <option value="Entrepreneur">Entrepreneur</option>
            <option value="Entreprise">Entreprise</option>
        </select> <br>
        <textarea name="descriptions" id="" placeholder="descriptions" rows="25" cols="45"></textarea><br>
        <input type="text" name="secteur" placeholder="secteur" required> <br>
        <input type="text" name="pays" required placeholder="pays"> <br>
        <input type="text" name="lien" placeholder="lien social">
        <input type="text" name="citation" placeholder="citation">
        <button type="submit">Publier</button>
    </form>
</body>
</html>
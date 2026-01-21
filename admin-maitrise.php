<?php
include 'db.php';
$db = ConnectionDB();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nom = $_POST["idée"];
    $content = $_POST["content"];
    $img = $_POST['lien'];
    $recap = $_POST["recap"];
    $categorie = $_POST["categorie"];
    $db->prepare("INSERT INTO maitrises(nom, contenu, img, recap, categorie)  
        VALUES (?,?,?,?,?)")->execute([$nom, $content, $img, $recap, $categorie]);
    header("Location: admin-maitrise.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    <h1>ADMIN MAITRISES</h1>
    <form action="" method="post">
        <input type="text" name="idée" placeholder="nom de l'idée" required> <br>
        <textarea name="content" placeholder="contenue de la partie" rows="25" cols="55"></textarea> <br>
        <input type="text" name="img" placeholder="image de l'article" required>
        <input type="text" name="recap" placeholder="recap">
        <input type="text" name="categorie" placeholder="categorie" required>
        <button type="submit">Publier</button>
    </form>
    



</body>
</html>
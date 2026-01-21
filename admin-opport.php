<?php
include 'db.php';


$db = ConnectionDB();
if(isset($_POST["submit_opport"])){
    $categories = $_POST["categories"];
    $nom = $_POST["nom"];
    $contenu = $_POST["contenu"];
    $lien = $_POST["lien"];
    $domaine = $_POST["domaine"];
    $createur = $_POST["créateur"];
    $db->prepare("INSERT INTO ressources(categories, nom, contenu, lien, domaine, createur)
        VALUE (?,?,?,?,?,?)")->execute([$categories, $nom, $contenu, $lien, $domaine, $createur]);
    header("Location: admin-opport.php");
    exit;
}

if(isset($_POST["submit_ent"])){
    $nom = $_POST["nom_ent"];
    $categories_ent = $_POST["cat_ent"];
    $description_ent = $_POST["desc_ent"];
    $valorisation = $_POST["valorisation"];
    $pays = $_POST["pays"];
    $site = $_POST["site"];
    $logo = $_POST["logo"];
    $db->prepare("INSERT INTO entreprises(nom, categorie, descriptions, valorisation, pays, site_web, logo)
        VALUE (?,?,?,?,?,?)")->execute([$nom, $categories_ent, $description_ent, $valorisation, $pays, $site, $logo]);
    header("location: admin-opport.php");
    exit;   
}
?>
<!-- traitement formulaire -->


<!-- fin traitement -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Opportunité</title>
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
    <h1>FORMULAIRE OPPORTUNITE</h1>

    <form action="" method="post">

        <select name="categories" id="categories">
            <option value="opportunités">Opportunité</option>
            <option value="ressources">Ressources</option>
            <option value="interviews">Interviews</option>
            <option value="citation">Citation/Insight</option>
        </select>
        <input type="text" name="nom" placeholder="Nom"> <br>
        <textarea name="contenu" placeholder="Contenu" rows="25" cols="55" required></textarea> <br>
        <input type="text" name="lien" placeholder="Lien">
        <input type="text" name="domaine" placeholder="Domaine">
        <input type="text" name="créateur" placeholder="créateur">
        <button type="submit" name="submit_opport">ENVOYER</button>
    </form>

    <h1>FORMULAIRE ENTREPRISES</h1>
    <form action="" method="post">
        <input type="text" name="nom_ent" placeholder="nom" required>
        <input type="text" name="cat_ent" placeholder="catégorie" required>
        <textarea type="text" name="desc_ent" placeholder="description"></textarea>
        <input type="text" name="valorisation" placeholder="valorisation">
        <input type="text" name="pays"  placeholder="pays">
        <input type="text" name="site" placeholder="site">
        <input type="text" name="logo" placeholder="logo">
        <button type="submit" name="submit_ent">ENVOYER</button>
    </form>

</body>
</html>
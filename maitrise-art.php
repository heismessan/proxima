<?php
    include 'db.php';
    $db = ConnectionDB();
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM maitrises WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
    if(isset($_POST["submit_form"])){
        $email = $_POST["email"];
        $db->prepare("INSERT INTO newsletter(email) VALUE (?) ")->execute([$email]);
        header("location: maitrise-art.php");
        exit;    
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/art.css">
    <title><?= htmlspecialchars(substr($article['nom'],0,50)) ?>...</title>
    <link rel="icon" type="image/svg+xml" href="/styles/logo-white.svg">
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
                    <a href="index.php"><img src="/styles/logo-white.svg" alt="logo du média" height="" width="40"></a>
                </div>
                <a href="search.php" class="icone"><img src="./styles/recherche.svg" alt="icône de recherche"></a>
                <div class="menu-items">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="empires.php">Empires</a></li>
                    <li><a href="maitrises.php">Maîtrises</a></li>
                    <li><a href="opportunite.php">Opportunités</a></li>
                    <li><a href="ressources.php">Ressources</a></li>
                    <li><a href="interview.php">Interviews</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </div>      
            </div>
        </nav>
    </header>

    <main class="main">
        <img src="<?= nl2br(htmlspecialchars($article['img']))?>" alt="image de l'opportunité">
        <h1 style="text-decoration: underline;"><?= htmlspecialchars($article['nom']) ?></h1>
        <!-- <p><?= htmlspecialchars($article['categorie'])?></p> -->
        <p><?= nl2br(strip_tags($article['contenu'], '<table><td><th><tr><a><p><strong><em><ul><li><br><style>'))?></p>
    </main>
    <a href="" class="don-fixe"><img src="./styles/don.svg" alt=""></a>
   <footer>
        <div class="footer-div">
            <div class="para">
                <h2 style="margin-bottom: 10px;">Inscrivez-vous à notre Newletter pour être au courant des dernières sorties d'articles</h2>
            </div>
            <div class="formulaire">
                <form method="post">
                    <input type="text" name="email" placeholder="Email" required>
                    <button type="submit" name="submit_form">S'inscrire</button>
                </form>
            </div>
        </div>
        <div class="page">
            <a href="index.php">Accueil</a>
            <a href="empires.php">Empires</a>
            <a href="maitrises.php">Maîtrises</a>
            <a href="opportunite.php">Opportunités</a>
            <a href="ressources.php">Ressources</a>
            <a href="interview.php">Interviews</a>
            <a href="contact.php">Contact</a>
            <a href="mention.php">Mentions Légales</a>
        </div>
        <p>Nous sommes un média indépendant dont la mission est d'aider les jeunes entreprises et entrepreneurs à évoluer.</p>
       <div class="icons">
            <a href="https://www.facebook.com/share/1CrrE4voi8/?mibextid=wwXIfr" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/proxima.media?igsh=MWxlOXc4Ymxmb29yeg%3D%3D&utm_source=qr" target="_blank">Instagram</a>
            <a href="https://www.tiktok.com/@proxima.media?_t=ZN-8y3cYDaoNsM&_r=1" target="_blank">TikTok</a>
            <a href="https://youtube.com/@proxima.youtube?si=1VAS3R9oJZj7Nrw_" target="_blank">YouTube</a>
            <a href="" target="_blank">LinkedIn</a>
        </div>
        <p>&copy; <?= date('Y') ?> PROXIMA. Tous droits réservés.</p>

    </footer>
</body>
</html>
<?php 
include 'db.php'
?>
<?php
    if(isset($_POST["submit_form"])){
        $email = $_POST["email"];
        $db->prepare("INSERT INTO newsletter(email) VALUE (?) ")->execute([$email]);
        header("location: maitrises.php");
        exit;    
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maîtrises-PROXIMA</title>
    <link rel="stylesheet" href="./styles/maitrises.css">
    <link rel="stylesheet" href="./styles/empires.css">
    <link rel="stylesheet" href="./styles/index.css">
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

        <div class="screen">
            <div class="article">
                <?php
                    $db = ConnectionDB();
                    $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 1");
                ?>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <a href="article.php?id=<?= $row["id"]?>"><img src="<?= htmlspecialchars($row["img"])?>" alt=""></a>
                    <h1><a href="maitrise-art.php?id=<?= $row["id"]?>"><?= htmlspecialchars($row['nom'])?></a></h1>
                <?php } ?>
            </div>


            <div class="articles">
                <?php
                    $db = ConnectionDB();
                    $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 1, 5");
                ?>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="espace" style="display: flex;">
                        <img src="./styles/flèche.svg" alt="" height="30px" width="30px">
                        <p><a href="maitrise-art.php?id=<?= $row["id"]?>"><?= htmlspecialchars($row['nom'])?></a></p>
                    </div>
                <?php } ?>
            </div>

        </div>       

        <!-- <div class="don-class">
            <div class="bloc">
                <p  style="color: black;">PROXIMA</p>
                <p>
                    Proxima est un média indépendant pour les entrepreneurs ambitieux.
                    Soutiens notre travail avec 1€ pour nous permettre de continuer à créer du contenu de qualité.
                </p>
                <button>Faire Don de 1€</button>
            </div>
            <img src="./styles/illustration.avif" alt="image de don">
        </div> -->
    
    

        <?php 
            $db = ConnectionDB();
            $stmt = $db->query("SELECT nom, contenu, createur FROM ressources WHERE categories = 'citation' ORDER BY id DESC LIMIT 4")
        ?>
        <div class="carte">
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="citation">
                    <p class="avant"><?= htmlspecialchars($row["nom"]) ?></p>
                    <h2><?= htmlspecialchars($row["contenu"]) ?></h2>
                    <?php if($row["createur"]): ?>
                        <p><?= htmlspecialchars($row["createur"])?></p>    
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>   
        </div>   
        
        
         <div class="article-empires">
            
            <h1>AUTRES ARTICLES</h1> 
               
            <?php
                $db = ConnectionDB();
                $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 5, 100")
            ?>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <div class="element-empires" style="margin-bottom: 15px;">
                <a href="maitrise-art.php?id=<?= $row["id"]?>"><img src="<?= htmlspecialchars($row['img']) ?>" width="100" height="100"></a>
                <div class="art-element-empires">
                    <h1><a href="maitrise-art.php?id=<?= $row["id"]?>"><?= htmlspecialchars($row['nom'])?></a></h1>
                    <p><?= htmlspecialchars($row['categorie'])?></p>
                </div>
            </div>
            <?php  }?>  
        </div>


    </main>

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
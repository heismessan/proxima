<?php 
include 'db.php'
?>
<?php
    if(isset($_POST["submit_form"])){
        $email = $_POST["email"];
        $db->prepare("INSERT INTO newsletter(email) VALUE (?) ")->execute([$email]);
        header("location: index.php");
        exit;    
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil-PROXIMA</title>
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="icon" type="image/svg+xml" href="./styles/logo-white.svg">
    <script src="index.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id=""/>
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
                    <li><a href="admin-maitrise.php">Admin Maitrises</a></li>
                    <li><a href="admin-empire.php">Admin Empires</a></li>
                    <li><a href="admin-opport.php">Admin Opportunité</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </div>      
            </div>
        </nav>
    </header>

    <main class="main">


        <div class="init">
            
            <div class="init-deux">
                <?php
                    $db = ConnectionDB();
                    $stmt = $db->query("SELECT * FROM empires ORDER BY id DESC LIMIT 1")
                ?>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="element-deux">
                    <a href="empires-art.php?id=<?= $row["id"]?>"><img src="<?= htmlspecialchars($row['img']) ?>" width="100%" height="80%"></a>
                    <div class="art-element">
                        <p><?=htmlspecialchars($row['secteur'])?></p>
                        <a href="empires-art.php?id=<?= $row["id"]?>"><h2><?=htmlspecialchars($row['nom']) ?></h2></a>
                        <p><?php if($row['types'] !== null){ echo htmlspecialchars($row['types']);}?></p>
                    </div>
                </div>
                <?php  }?>  
            </div>

            <div class="init-un">
                <?php
                    $db = ConnectionDB();
                    $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 2")
                ?>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                    <div class="element-un">
                        <a href="article.php?id=<?= $row["id"]?>"><img src="<?= htmlspecialchars($row['img']) ?>" width="100" height="100">
                        <div class="art-element">
                            <a href="article.php?id=<?= $row["id"]?>"><h2><?=htmlspecialchars($row['nom']) ?></h2></a> 
                            <p><?= htmlspecialchars($row['categorie'])?></p>  
                        </div>
                    </div>
                <?php  } ?>
            </div>    
        </div>



        <div class="espace">
            <div class="ligne">
                <h1>MAITRISES</h1> 
                <a href="maitrises.php">VOIR PLUS</a>
            </div>
            <?php
                $db = ConnectionDB();
                $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 2, 10")
            ?>
            <div class="maitrises">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="flex" style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <img src="/styles/flèche.svg" alt="" height="30px" width="30px" margin-top ="3px">
                        <h2><a href="article.php?id=<?= $row['id'] ?>"> <?= htmlspecialchars($row['nom'])?></a></h2>
                    </div>
                <?php  } ?>  
            </div>   
        </div>
        <!-- <div class="article">
            <?php
                $db = ConnectionDB();
                $stmt = $db->query("SELECT * FROM maitrises ORDER BY id DESC LIMIT 4")
            ?>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <div class="element">
                <img src="<?= htmlspecialchars($row['img']) ?>" width="150">
                <div class="art-element">
                    <p>Publié: <?=htmlspecialchars(substr($row['date_creation'], 0, 10))?></p>
                    <h2><?=htmlspecialchars($row['nom']) ?></h2>
                    <p><?=htmlspecialchars(substr($row['contenu'], 0, 1000))?></p>
                </div>
            </div>
            <?php  }?> -->
        </div>
        
        <div class="article-empires">
            <div class="ligne">
                <h1>EMPIRES</h1> 
                <a href="empires.php">VOIR PLUS</a>
            </div>
        
            <?php
                $db = ConnectionDB();
                $stmt = $db->query("SELECT * FROM empires ORDER BY id DESC LIMIT 4")
            ?>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <div class="element-empires" style="margin-bottom: 15px;">
                
                    <a href="empires-art.php?id=<?= $row["id"]?>"><img src="<?= htmlspecialchars($row['img']) ?>" width="100" height="100"></a>
                    <div class="art-element-empires">
                        <!-- <p>Publié: <?=htmlspecialchars(substr($row['date_creation'], 0, 10))?></p> -->
                        <a href="empires-art.php?id=<?= $row["id"]?>"><h2><?=htmlspecialchars($row['nom']) ?></h2></a>
                        <p class="none"><?php if($row['types'] !== null){ echo htmlspecialchars($row['types']);}?> - 
                            <?php if($row['secteur'] !== null){ echo htmlspecialchars($row['secteur']);}?>
                        </p>
                        <p><em>Pays</em> : <?php if($row['pays'] !== null){ echo htmlspecialchars($row['pays']);}else{ echo "???";} ?></p>
                    </div>
                
            </div>
            <?php  }?>  
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
    
        <div class="ligne" style="margin-top: 30px;">
            <h1>ENTREPRISES</h1>
            <!-- <a href="">VOIR PLUS</a> -->
        </div>
        <?php
            $db = connectionDB();
            $stmt = $db->query("SELECT * FROM entreprises LIMIT 6");
        ?>
        <div class="carte-ent">
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="ent">
                <img src="<?= htmlspecialchars($row["logo"]) ?>" alt="logo de l'entreprise <?= htmlspecialchars($row["nom"]) ?>">
                <div class="elem-ent">
                    <p style="font-weight: bold;"><?= htmlspecialchars($row["nom"]) ?></p>
                    <p><?= htmlspecialchars($row["categorie"]) ?> | <?= htmlspecialchars($row["valorisation"]) ?></p>
                    <p><?= htmlspecialchars($row["pays"]) ?></p>
                </div>
            </div>
            <?php } ?>

        </div>
        <!-- ORDER BY id DESC -->

        <div class="ligne" style="margin-top: 30px;">
            <h1>INTERVIEWS</h1>
            <a href="interview.php">VOIR PLUS</a>
        </div>
        <div class="interview">
            <?php
                $db= connectionDB();
                $stmt = $db->query("SELECT * FROM ressources WHERE categories='interviews' ORDER BY id DESC LIMIT 2")
            ?>
            
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  ?>
                <a href="interview-art.php?id=<?= $row['id'] ?>" class="art-inter">
                    <?php $videoID = convertirLienYoutube($row["lien"]); ?>
                    <img src="https://img.youtube.com/vi/<?= $videoID ?>/hqdefault.jpg" alt="">
                    <p><?= htmlspecialchars($row["nom"]) ?></p>
                    <p><em>Réaliser par</em>: <?= htmlspecialchars($row["createur"])?></p> 
                </a>
            <?php } ?>

        </div>

        <!-- <iframe src="https://youtu.be/8o5mAIHR-yU?si=U2OuvPo0ZjFLx0eT" frameborder="0"></iframe> -->
    </main>
    <a href="" class="don-fixe"><img src="./styles/don.svg" alt="faire un don"></a>
    
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
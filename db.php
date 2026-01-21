<?php

function ConnectionDB(){
    //local
    // $host = '127.0.0.1';
    // $user = 'utilisateur';
    // $db = 'nom_de_la_base';
    // $pass = 'mot_de_passe';
    // $charset = 'utf8mb4';

    //hébergement
    $host = '';
    $user = 'utilisateur';
    $db = 'nom_de_la_base';
    $pass = 'mot_de_passe';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    try{
        $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }catch(PDOException $e){
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
    
}
?>


<?php
function convertirLienYoutube($url) {
    // Pour les liens youtu.be
    if (strpos($url, 'youtu.be/') !== false) {
        $path = parse_url($url, PHP_URL_PATH);
        return ltrim($path, '/');
    }
    // Pour les liens classiques ou embed
    if (strpos($url, 'youtube.com') !== false) {
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        if (isset($params['v'])) {
            return $params['v'];
        }
        // Cas où c'est déjà un embed
        $path = parse_url($url, PHP_URL_PATH);
        if (strpos($path, '/embed/') !== false) {
            return basename($path);
        }
    }
    return null;
}
?>

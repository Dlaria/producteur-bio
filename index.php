<?php 
    require 'db.class.php';
    $DB = new DB();

    $req =$DB->db->prepare('SELECT * FROM produit');
    $req -> execute ();
    var_dump($req->fetchall());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" type="text/javascript"></script>
    <title>Mon producteur bio</title>
</head>
<body>
    <header>
        <img src="/producteur-bio/images_site/logo_1.png">
        <h1>PAS BESOIN D'ALLER LOIN POUR BIEN MANGER</h1>
    </header>
        <img src="/producteur-bio/images_site/annonce_ouverture.png">



    <div id="boutique"></div>
</body>
</html>
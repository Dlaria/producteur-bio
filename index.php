<?php 
    require 'db.class.php';
    $DB = new DB();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" type="text/javascript"></script>
    <title>Mon producteur bio</title>
</head>
<body>
    <header>
        <div class="conteneur-logo">
            <img class="logo" src="/producteur-bio/images_site/logo_1.png">
        </div>
        <div class="conteneur-titre">
        <h1 class="titre-index">PAS BESOIN D'ALLER LOIN POUR BIEN MANGER</h1>
        </div>
    </header>

        <img class="annonce" src="/producteur-bio/images_site/annonce_ouverture.png" alt="annonce_ouverture">
    
    <div class="présentation">
        <h2>NOTRE MISSION</h2>
        <p>Chez Mon Producteur Bio nous mettons en avant le circuit court. Nous avons remarqué que sur la majorité des sites de vente de produits bio en ligne il était difficile de savoir quel produits était fait proche de chez nous et par qui. 
        <br><br>
            C’est pourquoi nous avons décidé de rendre tout cela possible, vous pourrez directement filtrer sur votre région pour voir tous les produits fabriqués proche de chez vous avec en prime la photo du producteur qui vous permettra de mettre un visage derrière tout ce travail.
        </p>
        <div class="feuilles"></div>
        <img class="imgPrésentation" src="/producteur-bio/images_site/entreprise.jpg">
    </div>
    <div class="présentation-produit">
        <h2>NOS PRODUITS</h2>
        <p>Sélectionnez les quantités que vous souhaitez précommander et cliquez sur “Je précommande” pour valider.
    <br><br>
    Nous    effectuons la livraison à domicile pour le moment, la livraison en relais colis arrive bientôt ! 
    <br>
    Nous    appliquons des frais de port fixe de 4€ pour la livraison, frais de port offert à partir de 40€ d’achat.
            </p>
    </div>


    <?php $produits = $DB->query('SELECT *FROM produit'); ?>
    <?php foreach ($produits as $produit):?>
        
            <div class="produit">
                    <img src="<?php echo $produit->SrcImage; ?>" alt="">
                <div class="description">
                    <p class="nom-produit"><?php echo $produit->Nom; ?></p>
                    <p>Origine : <br><?php echo $produit->Origine; ?></p>
                </div>
                <p class="price"><?php echo number_format($produit->Prix,2,',',''); ?> €</p>
                <a class="add" href="./form.php?id=<?php echo $produit->id; ?>">add</a>
            </div>
    <?php endforeach ?>

<footer>
    <div class="logo">
    <img src="/producteur-bio/images_site/logo_1.png">
    </div>
    <div>
        <h3>Mon Productuer Bio</h3>
        <p>Qui sommes-nous ?</p>
        <p>Le Blog</p>
    </div>

    <div>
        <h3>Service client</h3>
        <p>Nous contacter</p>
        <p>Aide</p>
        <p>La livraison</p>
        <p>Paiement sécurisé</p>
    </div>
    
    <div>
        <h3>Mentions légales</h3>
        <p>CGV/CGU</p>
        <p>Politique de confidentialité</p>
    </div>
    <div class="reseaux">
        <h3>Nos réseaux sociaux</h3>
        <img src="/producteur-bio/images_site/icon_facebook.png">
        <img src="/producteur-bio/images_site/icon_instagram.png">
        <img src="/producteur-bio/images_site/icon_youtube.png">
    </div>
</footer>
</body>
</html>
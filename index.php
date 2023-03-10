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
    
    <div class="présentation">
        <h2>NOTRE MISSION</h2>
        <p>Chez Mon Producteur Bio nous mettons en avant le circuit court. Nous avons remarqué que sur la majorité des sites de vente de produits bio en ligne il était difficile de savoir quel produits était fait proche de chez nous et par qui. 
        <br><br>
            C’est pourquoi nous avons décidé de rendre tout cela possible, vous pourrez directement filtrer sur votre région pour voir tous les produits fabriqués proche de chez vous avec en prime la photo du producteur qui vous permettra de mettre un visage derrière tout ce travail.
        </p>
        <img src="/producteur-bio/images_site/entreprise.jpg">
        <h2>NOS PRUDUITS</h2>
        <p>Sélectionnez les quantités que vous souhaitez précommander et cliquez sur “Je précommande” pour valider.
<br><br>
Nous    effectuons la livraison à domicile pour le moment, la livraison en relais colis arrive bientôt ! 
<br>
Nous    appliquons des frais de port fixe de 4€ pour la livraison, frais de port offert à partir de 40€ d’achat.
        </p>
    </div>

        <div class="home">
    <div class="container">
         
    <div class="row">
        <div class="wrap">
            <?php $produits = $DB->query('SELECT *FROM produit'); ?>
            <?php foreach ($produits as $produit):?>
                <div class="box">
                    <div class="produit">
                        <a href="#">
                            <img src="<?php echo $produit->SrcImage; ?>" alt="">
                        </a>
                        <div class="description">
                            
                            <?php echo $produit->Nom; ?>
                            <?php echo $produit->Origine; ?>
                            <p class="price"><?php echo number_format($produit->Prix,2,',',''); ?> </p>
                        </div>
                        <a class="add" href="./form.php?id=<?php echo $produit->id; ?>">
                        add</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    </div>
</div>
<footer>
    <img src="/producteur-bio/images_site/logo_1.png">
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
    <div>
        <h3>Nos réseaux sociaux</h3>
        <img src="/producteur-bio/images_site/icon_facebook.png">
        <img src="/producteur-bio/images_site/icon_instagram.png">
        <img src="/producteur-bio/images_site/icon_youtube.png">
    </div>
</footer>
</body>
</html>
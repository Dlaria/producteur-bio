<?php 
    include('config.php');
    session_start();
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
    <script src="script.js"></script>
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
        <p>
            Sélectionnez les quantités que vous souhaitez précommander et cliquez sur “Je précommande” pour valider.
            <br><br>
            Nous effectuons la livraison à domicile pour le moment, la livraison en relais colis arrive bientôt ! 
            <br>
            Nous appliquons des frais de port fixe de 4€ pour la livraison, frais de port offert à partir de 40€ d’achat.
        </p>
    </div>
    <form class="formindex" action="index.php" method="post">
            <!-- Boucle pour récupérer les infos produit -->
        <?php foreach($result as $produit){
            // Nettoyage de la quantité stocker dans le tableau de session
            if (isset($_SESSION['quantite'.$produit->id]) && $_SESSION['quantite'.$produit->id] != ''){
                $_SESSION['quantite'.$produit->id] = '';
            }
            ?>
            <!-- Création du produit -->
            <div class="produit" id="produit-<?= $produit->id;?>">
                <img src="<?= $produit->SrcImage;?>" alt="<?= $produit->Nom;?>">
                <div class="description">
                    <p class="nom-produit"><?= $produit->Nom;?></p>
                    <p>Origine : <br><?= $produit->Origine;?></p>
                </div>

                <?php if ($produit->Poids2 != null){ ?>
                    <select name="selectPoids<?= $produit->id ?>" id="selectPoids-<?= $produit->id ?>" oninput="prixChange(<?= $produit->id ?>, <?= $produit->Prix ?>,<?= $produit->Prix2 ?>)">
                        <option value="poids" name="poids"><?= $produit->Poids ?></option>
                        <option value="poids2"><?= $produit->Poids2 ?></option>
                    </select><br>
                <?php }else{ ?>
                    <span><?= $produit->Poids ?></span><br>
                <?php } ?>

                <span class="price" name="prix-<?= $produit->id ?>" id="prix-<?= $produit->id ?>"><?= number_format($produit->Prix,2,',','');?> €</span><br>


                <input class="btnQuantite" type="image" onclick="plus(<?= $produit->id;?>,event)" src="./images_site/plus.png" alt="bouton-plus">

                <input class="quantite" id="quantite-<?= $produit->id;?>" oninput="opacityBtn(<?= $produit->id;?>, event)" name="quantite-<?= $produit->id;?>" value="0" min="0"type="number">

                <input class="btnQuantite" type="image" onclick="moins(<?= $produit->id;?>,event)" src="./images_site/moins.png" alt="bouton-moins">

            </div>
            
            <?php
            }
            ?>
            <input class="btnOrange" id="btnIndex" type="submit" name="valider" value="Valider" disabled>
            </form>
            <?php if (TRUE === isset($_POST['valider'])){
                foreach($result as $produit){
                    $_SESSION['quantite'.$produit->id] = (int) $_POST['quantite-'.$produit->id];
                    if (isset($_POST['selectPoids'.$produit->id])){

                        switch($_POST['selectPoids'.$produit->id]){
                            case 'poids':
                                $_SESSION['poids'.$produit->id] = $produit->Poids;
                                $_SESSION['prix'.$produit->id] = $produit->Prix;
                                break;
                            case 'poids2':
                                $_SESSION['poids'.$produit->id] = $produit->Poids2;
                                $_SESSION['prix'.$produit->id] = $produit->Prix2;
                                break;
                            default:
                                $produit->Poids;
                                $produit->Prix;
                                break;
                        }
                    }
                }
                // var_dump($_POST);
                // var_dump($_SESSION);
                echo "<script>document.location.href='form.php';</script>";
            }?>
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
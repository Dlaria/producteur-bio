<?php
include('config.php');
session_start();
//var_dump($_SESSION);


$fraisDePort = '4€';
$Total = 0;



// Envoie des champs du formulaire à la table user
if(TRUE === isset($_POST['submit'])){
    // Identification de TOUT les éléments dans le formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $num_et_rue = $_POST['num_et_rue'];
        $comp_adresse = $_POST['comp_adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $numero_tel = $_POST['numero_tel'];
        $num_et_rue_fact = $_POST['num_et_rue_fact'];
        $comp_adresse_fact = $_POST['comp_adresse_fact'];
        $code_postal_fact = $_POST['code_postal_fact'];
        $ville_fact = $_POST['ville_fact'];
        //var_dump($_POST);
        $sql = "INSERT INTO user (Nom, Prénom, Email, NumEtRue, ComplementAdresse, CodePostal, Ville, NumMobile, NumEtRueFact, ComplementAdresseFact, CodePostalFact, VilleFact)
        VALUE (:nom, :prenom, :mail, :num_et_rue, :comp_adresse, :code_postal, :ville, :numero_tel, :num_et_rue_fact, :comp_adresse_fact, :code_postal_fact, :ville_fact)";
        $query = $dbh->prepare($sql);
            $query->bindParam(':nom',$nom,PDO::PARAM_STR);
            $query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $query->bindParam(':mail',$mail,PDO::PARAM_STR);
            $query->bindParam(':num_et_rue',$num_et_rue,PDO::PARAM_STR);
            $query->bindParam(':comp_adresse',$comp_adresse,PDO::PARAM_STR);
            $query->bindParam(':code_postal',$code_postal,PDO::PARAM_STR);
            $query->bindParam(':ville',$ville,PDO::PARAM_STR);
            $query->bindParam(':numero_tel',$numero_tel,PDO::PARAM_STR);

            // Si il y a rien d'écrit dans les champs de facturation alors on execute avec les champs de livraison
            if(strlen($num_et_rue_fact) == 0 && strlen($comp_adresse_fact) == 0 &&  strlen($code_postal_fact) ==  0 && strlen($ville_fact) == 0){
                $query->bindParam(':num_et_rue_fact',$num_et_rue,PDO::PARAM_STR);
                $query->bindParam(':comp_adresse_fact',$comp_adresse,PDO::PARAM_STR);
                $query->bindParam(':code_postal_fact',$code_postal,PDO::PARAM_STR);
                $query->bindParam(':ville_fact',$ville,PDO::PARAM_STR);
            }else{
                $query->bindParam(':num_et_rue_fact',$num_et_rue_fact,PDO::PARAM_STR);
                $query->bindParam(':comp_adresse_fact',$comp_adresse_fact,PDO::PARAM_STR);
                $query->bindParam(':code_postal_fact',$code_postal_fact,PDO::PARAM_STR);
                $query->bindParam(':ville_fact',$ville_fact,PDO::PARAM_STR);
            }
        $query->execute();
}
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
    <title>Mon producteur bio | formulaire de précommande</title>
</head>
<body style="margin:55px 105px;">
    <div class="conteneur-logo">
        <img class="logo" src="./images_site/logo_1.png" alt="logo-mon-producteur-bio">
    </div>
    <div class="conteneur-titre">
        <h1 class="titre">Formulaire de précommande</h1>
    </div>
    
    <input type="button" name="retour" class="btnOrange" onclick="document.location.href='index.php';" value="Continuer mes achats">
    <h2 class="label-grand">Récapitulatif du panier</h2>

    <!-- Début du panier -->
    <form method="post" action="form.php" class="pageForm">
        <div class="panier">
            <table>
                <tr>
                    <th>Produits</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            
                <?php
                // Boucle pour récupérer les infos produit
                    foreach ($result as $produit){
                        // Si la quantité du produit dans le tableau de session en fonction de son identifiant est supérieur à 0 
                        if ($_SESSION['quantite'.$produit->id] > 0){
                ?>
                            <!-- Création du produit dans le panier -->
                            <tr>
                                <td style="text-align:left;line-height:initial;">
                                    <img src="<?= $produit->SrcImage; ?>" alt="<?= $produit->Nom; ?>">
                                    <p><?= $produit->Nom; ?></p>
                                    <p><?php
                                        if(isset($_SESSION['poids'.$produit->id])){
                                            $poids = $_SESSION['poids'.$produit->id];
                                            echo '('.$poids.')';
                                        }else{
                                            $poids = $produit->Poids;
                                            echo '('.$poids.')';
                                        }
                                        ?></p>
                                </td>
                                <td class="quantité"><?= $_SESSION['quantite'.$produit->id];?></td>
                                <td class="prix">
                                    <?php
                                        if (isset($_SESSION['prix'.$produit->id])){
                                            $prix = $_SESSION['prix'.$produit->id];
                                            echo number_format($prix,2,',','');
                                        }else{
                                            $prix = $produit->Prix;
                                            echo number_format($prix,2,',','');
                                        }
                                     ?>
                                </td>
                            </tr>
                <?php
                        // Calcul du total
                        $Total += $prix * $_SESSION['quantite'.$produit->id];

                        // Si il y a pas de quantité alors on retourne a l'index
                        }else if (!isset($_SESSION['quantite'.$produit->id])){
                            header('location:index.php');
                        }
                    }
                ?>
            </table>
            <div class="footer-table">
                <p class="div-inline">Frais de port</p>
                <span class="div-inline">
                    <?php
                        if ($Total >= 40){
                            $fraisDePort = 'OFFERT'; 
                            echo $fraisDePort;
                        }else{
                            echo $fraisDePort;
                        }
                    ?>
                </span>
                <p class="conteneur-total">Prix total  &emsp;&emsp;<span id="total"><?= number_format($Total,2,',','');?>€</span></p>
            </div>
        </div>
        <?php 
        // Envoie des quantité du panier à la table panieruser
        if(TRUE === isset($_POST['submit'])){
            $mail = $_POST['mail'];
            $quantite1 = $_SESSION['quantite1'];
            $poids1 = $_SESSION['poids1'];
            $quantite2 = $_SESSION['quantite2'];
            $poids2 = '350 g';
            $quantite3 = $_SESSION['quantite3'];
            $poids3 = $_SESSION['poids3'];
            $quantite4 = $_SESSION['quantite4'];
            $poids4 = $_SESSION['poids4'];
            $quantite5 = $_SESSION['quantite5'];
            $poids5 = $_SESSION['poids5'];
            $sqlPanier = "INSERT INTO panieruser (Email, quantiteProduit1, poidsProduit1, quantiteProduit2, poidsProduit2, quantiteProduit3, poidsProduit3, quantiteProduit4, poidsProduit4, quantiteProduit5, poidsProduit5, fraisDePort) 
            VALUE (:mail, :quantiteproduit1, :poidsProduit1, :quantiteproduit2, :poidsProduit2, :quantiteproduit3, :poidsProduit3, :quantiteproduit4, :poidsProduit4, :quantiteproduit5, :poidsProduit5, :fraisdeport)";
            $queryPanier = $dbh->prepare($sqlPanier);
                $queryPanier->bindParam(':mail',$mail,PDO::PARAM_STR);
                $queryPanier->bindParam(':quantiteproduit1',$quantite1,PDO::PARAM_INT);
                $queryPanier->bindParam(':poidsProduit1',$poids1,PDO::PARAM_STR);
                $queryPanier->bindParam(':quantiteproduit2',$quantite2,PDO::PARAM_INT);
                $queryPanier->bindParam(':poidsProduit2',$poids2,PDO::PARAM_STR);
                $queryPanier->bindParam(':quantiteproduit3',$quantite3,PDO::PARAM_INT);
                $queryPanier->bindParam(':poidsProduit3',$poids3,PDO::PARAM_STR);
                $queryPanier->bindParam(':quantiteproduit4',$quantite4,PDO::PARAM_INT);
                $queryPanier->bindParam(':poidsProduit4',$poids4,PDO::PARAM_STR);
                $queryPanier->bindParam(':quantiteproduit5',$quantite5,PDO::PARAM_INT);
                $queryPanier->bindParam(':poidsProduit5',$poids5,PDO::PARAM_STR);
                $queryPanier->bindParam(':fraisdeport',$fraisDePort,PDO::PARAM_STR);
            $queryPanier->execute();

            // Après l'evoie on retourne à l'index
            echo "<script>document.location.href='index.php';</script>";
        }
        ?>
    
    <!-- Début du formulaire -->
        <!-- Nom et prénom sont sur la même ligne -->
        <div class="conteneur-inline">
            <div class="div-inline">
                <label class="label-grand">Nom *</label><br>
                <input class="input-form" type="text" name="nom" required>
            </div>
                <div class="div-inline">
                    <label class="label-grand">Prénom *</label><br>
                    <input class="input-form" type="text" name="prenom" required>
				</div>
        </div>
            <div>
                <label class="label-grand">Adresse mail *</label><br>
                <input class="input-form" type="text" name="mail" required>
            </div>
            <div>
                <h3 class="label-grand">Adresse de livraison *</h3>

                <input class="input-form" type="text" name="num_et_rue" required><br>
                <label class="label-petit">N° et Rue</label><br>

                <input class="input-form" type="text" name="comp_adresse" required><br>
                <label class="label-petit">Complément d'adresse</label><br>

                <input class="input-form" type="text" name="code_postal" required><br>
                <label class="label-petit">Code postal</label><br>

                <input class="input-form" type="text" name="ville" required><br>
                <label class="label-petit">Ville</label><br>
            </div>
            <div>
                <label class="label-grand">Numéro de téléphone *</label><br>
                <input class="input-form" type="text" name="numero_tel" required>
            </div>
            <div>
                <h3 class="label-grand">Adresse de Facturation (si différente de celle de livraison)</h3>

                <input class="input-form" type="text" name="num_et_rue_fact"><br>
                <label class="label-petit">N° et Rue</label><br>

                <input class="input-form" type="text" name="comp_adresse_fact"><br>
                <label class="label-petit">Complément d'adresse</label><br>

                <input class="input-form" type="text" name="code_postal_fact"><br>
                <label class="label-petit">Code postal</label><br>

                <input class="input-form" type="text" name="ville_fact"><br>
                <label class="label-petit">Ville</label><br>
            </div>
            <div>
                <h3 class="label-grand">Mode de paiement</h3>
                
                <div>
                <input type="radio" name="paiement" id="visa" required>
                <label>Visa</label>
                </div>

                <div>
                <input type="radio" name="paiement" id="masterCard" required>
                <label>MasterCard</label>
                </div>

                <div>
                <input type="radio" name="paiement" id="paypal" required>
                <label>Paypal</label>
                </div>
            </div>
            <div class="cgu-cgv">
                <input type="checkbox" name="cgu_cgv" class="cgu_cgv" required>
                <label>En cochant cette vous reconnaissez avec pris connaissance des <a href="#"> Conditions Générales d’Utilisation</a> et <a href="#"> Conditions Générales de Ventes</a> *</label>
            </div>
            <p style="font-family: 'Montserrat';">*= Mention obligatiore</p>
            <div class="conteneur-valider">
                <input class="btnOrange" type="button"  onclick="popup()" value="Valider">
            </div>
            <!-- La popup en display:none; apprait à l'appel de la fonction JS popup() -->
            <div class="popup" id="popup">
                <div class="popup-back"></div>
                <div class="popup-container">
                    <img class="logo" src="./images_site/logo_1.png" alt="logo-mon-producteur-bio">
                    <h2>Merci de votre commande !</h2>
                    <p>Nous vous remercions de votre commande ! <br>
                    Vous serez tenu au courant de l'état d'avancement de votre commande et de sa livraison. <br>
                    En attendant n'oubliez pas !</p>
                    <h3>Pas besoin d'aller loin pour manger bien !</h3>
                    <br>
                    <!-- La soumission du formulaire ce fait ici -->
                    <input type="submit" name="submit" class="btnOrange" value="Retour au site"></input>
                </div>
            </div>
    </form>
</body>
</html>
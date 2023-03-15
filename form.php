<?php
include('config.php');
session_start();

$query = $dbh->prepare("SELECT * FROM produit");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_OBJ);
    $fraisDePort = '4€';
    $Total = 0;

if(TRUE === isset($_POST['submit'])){
    // Identification de TOUT les éléments
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

        header('location:index.php');
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
    <!-- Panier -->
    <form method="post" action="form.php" class="pageForm">
        <div class="panier">
            <table>
                <tr>
                    <th>Produits</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            
                <?php
                    foreach ($result as $produit){
                        if ($_SESSION['quantite'.$produit->id] > 0){
                ?>
                            <tr>
                                <td style="text-align:left;line-height:initial;">
                                    <img src="<?= $produit->SrcImage; ?>" alt="<?= $produit->Nom; ?>">
                                    <p><?= $produit->Nom; ?></p>
                                </td>
                                <td class="quantité"><?= $_SESSION['quantite'.$produit->id];?></td>
                                <td class="prix"> <?= number_format($produit->Prix,2,',',''); ?></td>
                            </tr>
                <?php
                        $Total += $produit->Prix * $_SESSION['quantite'.$produit->id];
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
                    <input type="submit" name="submit" class="btnOrange" value="Retour au site"></input>
                </div>
            </div>
    </form>
</body>
</html>
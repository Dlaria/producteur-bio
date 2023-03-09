<?php
require 'db.class.php';
$DB = new DB();
// Configuration de la connexion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','prodbio');

try
{
    // Connexion � la base
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
	// Echec de la connexion
    exit("Error: " . $e->getMessage());
}

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
    <link rel="stylesheet" type="text/css" href="http://localhost/producteur-bio/style.css">
    <script src="script.js" type="text/javasccript"></script>
    <title>Mon producteur bio | formulaire de précommande</title>
</head>
<body style="margin:55px 105px;">


        <?php
            $req_ids=array_keys($_SESSION['panier']);
            $produits =$DB->query('SELECT * FROM produits WHERE  id IN('.implode(',',$ids).')');
            foreach ($produits as $produit):
        ?>
                    
    <!-- Panier -->
    <!-- Début du formulaire -->
    <form action="form.php" method="post">
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
            <div class="">
                <label class="label-grand">Adresse mail *</label><br>
                <input class="input-form" type="text" name="mail" required>
            </div>
            <div class="">
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
            <div class="">
                <label class="label-grand">Numéro de téléphone *</label><br>
                <input class="input-form" type="text" name="numero_tel" required>
            </div>
            <div class="">
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
                <input type="checkbox" name="cgu_cgv" required>
                <label>En cochant cette vous reconnaissez avec pris connaissance des <a href="#"> Conditions Générales d’Utilisation</a> et <a href="#"> Conditions Générales de Ventes</a> *</label>
            </div>
            <p style="font-family: 'Montserrat';">*= Mention obligatiore</p>
            <div class="conteneur-valider">
                <input class="btnOrange" type="submit" name="submit" value="Valider">
            </div>
    </form>
</body>
</html>
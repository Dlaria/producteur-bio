<?php
// Configuration de la connexion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
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
        if(strlen($num_et_rue_fact) == 0 && strlen($comp_adresse_fact) == 0 &&  strlen($code_postal_fact) ==  0 && strlen($ville_fact) == 0){
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
            $query->bindParam(':num_et_rue_fact',$num_et_rue,PDO::PARAM_STR);
            $query->bindParam(':comp_adresse_fact',$comp_adresse,PDO::PARAM_STR);
            $query->bindParam(':code_postal_fact',$code_postal,PDO::PARAM_STR);
            $query->bindParam(':ville_fact',$ville,PDO::PARAM_STR);
            $query->execute();
        }else{
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
            $query->bindParam(':num_et_rue_fact',$num_et_rue_fact,PDO::PARAM_STR);
            $query->bindParam(':comp_adresse_fact',$comp_adresse_fact,PDO::PARAM_STR);
            $query->bindParam(':code_postal_fact',$code_postal_fact,PDO::PARAM_STR);
            $query->bindParam(':ville_fact',$ville_fact,PDO::PARAM_STR);
            $query->execute();
        }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon producteur bio | formulaire de précommande</title>
</head>
<body>
    <img src="./images_site/logo_1.png" alt="logo-mon-producteur-bio">
    <form action="form.php" method="post">
        <!-- Nom et prénom sont sur la même ligne -->
        <div>
            <div class="">
                <label>Nom *</label>
                <input type="text" name="nom" required>
            </div>
                <div class="">
                    <label>Prénom *</label>
                    <input type="text" name="prenom" required>
				</div>
        </div>
            <div class="">
                <label>Adresse mail *</label>
                <input type="text" name="mail" required>
            </div>
            <div class="">
                <label>Adresse de livraison *</label>

                <input type="text" name="num_et_rue" required>
                <label>N° et Rue</label>

                <input type="text" name="comp_adresse" required>
                <label>Complément d'adresse</label>

                <input type="text" name="code_postal" required>
                <label>Code postal</label>

                <input type="text" name="ville" required>
                <label>Ville</label>
            </div>
            <div class="">
                <label>Numéro de téléphone *</label>
                <input type="text" name="numero_tel" required>
            </div>
            <div class="">
                <label>Adresse de Facturation (si différente de celle de livraison)</label>

                <input type="text" name="num_et_rue_fact">
                <label>N° et Rue</label>

                <input type="text" name="comp_adresse_fact">
                <label>Complément d'adresse</label>

                <input type="text" name="code_postal_fact">
                <label>Code postal</label>

                <input type="text" name="ville_fact">
                <label>Ville</label>
            </div>
            <div>
                <input type="checkbox" name="visa">
                <label>Visa</label>

                <input type="checkbox" name="masterCard">
                <label>MasterCard</label>

                <input type="checkbox" name="paypal">
                <label>Paypal</label>
            </div>
            <div>
                <input type="checkbox" name="cgu_cgv" required>
                <label>En cochant cette vous reconnaissez avec pris connaissance des Conditions Générales d’Utilisation et Conditions Générales de Ventes *</label>
            </div>
            <p>*= Mention obligatiore</p>
            <div>
                <input type="submit" name="submit" value="Valider">
            </div>
    </form>
</body>
</html>
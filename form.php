<?php

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
                <input type="checkbox" name="cgu_cgv">
                <label>En cochant cette vous reconnaissez avec pris connaissance des Conditions Générales d’Utilisation et Conditions Générales de Ventes *</label>
            </div>
            <p>*= Mention obligatiore</p>
            <div>
                <input type="submit" name="submit" value="Valider">
            </div>
    </form>
</body>
</html>
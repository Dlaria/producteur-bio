<?php 
    require 'db.class.php';
    $DB = new DB();

    /*if(TRUE === isset($_POST['submit'])){
        // Identification de TOUT les éléments
            $nom = $_POST['Nom'];
            $image = $_POST['SrcImage'];
            $origine = $_POST['Origine'];
            $prix = $_POST['Prix'];
            
           
            //var_dump($_POST);
            $sql = "SELECT * FROM produit";
            $query = $dbh->prepare($sql);
            $query->bindParam(':Nom',$nom,PDO::PARAM_STR);
            $query->bindParam(':SrcImage',$image,PDO::PARAM_STR);
            $query->bindParam(':Origine',$origine,PDO::PARAM_STR);
            $query->bindParam(':Prix',$prix,PDO::PARAM_STR)
            $query->execute();*/
           
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
                            <a href="#" class="price"><?php echo number_format($produit->Prix,2,',',''); ?> </a>
                        </div>
                        <a class="add" href="form.php?id=<?php echo $produit->id; ?>">
                        add</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    </div>
</div>
</body>
</html>
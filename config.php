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
// Séléction de tous les produits dans la table produit
$query = $dbh->prepare("SELECT * FROM produit");
$query->execute();
// On stock le résultat
$result = $query->fetchAll(PDO::FETCH_OBJ);
?>
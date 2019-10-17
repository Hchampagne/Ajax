

<?php

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
$sql = "SELECT * FROM produits WHERE pro_id=".$_POST['pro_id'];
$result = $db->query($sql);
$oProduit = $result->fetch(PDO::FETCH_OBJ);
echo json_encode($oProduit);

?>
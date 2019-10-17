
<?php	
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
    $db = connexionBase(); // Appel de la fonction de connexion	
    $requete = "SELECT * FROM produits  ORDER BY pro_id asc";		
    $result = $db->query($requete);		
    if (!$result) 	
        {	
                    $tableauErreurs = $db->errorInfo();	
                    echo $tableauErreur[2]; 	
                    die("Erreur dans la requête");	
        }		
    if ($result->rowCount() == 0) 	
        {	
            // Pas d'enregistrement	
            die("La table est vide");	
        }	

?>

<div class="container">
    <div class="row  text-center">
        <div class="col table-responsive">
            <table class="table table-bordered table-striped">          
                <thead class="thead-dark">
                    <tr>	
                    <th class="align-middle">Photo</th>
                    <th class="align-middle">Id</th>
                    <th class="align-middle">Référence</th>
                    <th class="align-middle">Libellé</th>
                    <th class="align-middle">Prix</th>
                    <th class="align-middle">Stock</th>
                    <th class="align-middle">Couleur</th>
                    <th class="align-middle">Date ajout</th>
                    <th class="align-middle">Date modif</th>
                    <th class="align-middle">Produit bloqué</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch(PDO::FETCH_OBJ))	
                    {                      
                    ?>

                    <tr >
                    <td class="align-middle">
                        <img class="img-responsive" style="width: 50px; height: 50px;" src="assets/images/<?= $row->pro_id.'.'.$row->pro_photo?>" alt="" title="<?= $row->pro_libelle ?>">
                    </td>
                    <td class="align-middle"><?= $row->pro_id ?></td>
                    <td class="align-middle"><?=$row->pro_ref ?></td>	
                    <td class="align-middle"><a href="detail.php?pro_id=<?= $row->pro_id ?>"  title="<?= $row->pro_libelle ?>"><?= $row->pro_libelle ?></a></td>
                    <td class="align-middle"><?= $row->pro_prix ?></td>
                    <td class="align-middle"><?= $row->pro_stock ?></td>	
                    <td class="align-middle"><?= $row->pro_couleur ?></td>
                    <td class="align-middle"><?=  $row->pro_d_ajout ?></td>
                    <td class="align-middle"><?= $row->pro_d_modif ?></td>
                    <td class="align-middle"><?= $row->pro_bloque == 1 ? 'oui' : 'non' ?></td>
                    </tr>
                    <?php
                    }  
                    ?>
                </tbody>            	
            </table>
        </div>
    </div>
</div>
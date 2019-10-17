
                    
                        <?php
                         
                        $id=$_GET['id_region'];
                        require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
                        $db = connexionBase(); // Appel de la fonction de connexion	
                        $requete = "SELECT dep_id,dep_nom  FROM departements WHERE dep_reg_id=".$id;
                        $result1 = $db->query($requete);
                        if (!$result1) {
                            $tableauErreurs = $db->errorInfo();
                            echo $tableauErreur[2];
                            die("Erreur dans la requête");
                        }
                        if ($result1->rowCount() == 0) {
                            // Pas d'enregistremen	
                            die("La table est vide");
                        }
                        $acategorie = $result1->fetchAll(PDO::FETCH_OBJ);
                        foreach ($acategorie as $categorie) {              //balayage du tableau
                            $id = $categorie->dep_id;
                            $dep = $categorie->dep_nom;
                            ?>

                            <option value=<?= $id ?>><?= $dep ?></option>

                        <?php
                        }
                        ?>
                    
            
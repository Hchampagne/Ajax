
                    
                        <?php
                        require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
                        $db = connexionBase(); // Appel de la fonction de connexion	
                        $requete = "SELECT reg_id,reg_v_nom  FROM regions ORDER BY reg_id asc";
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
                        ?>
                            <option>Régions</option>
                            <?php
                        foreach ($acategorie as $categorie) {              //balayage du tableau
                            $id = $categorie->reg_id;
                            $reg = $categorie->reg_v_nom;
                            ?>

                            <option value=<?= $id ?>><?= $reg ?></option>

                        <?php
                        }
                        ?>
                    
            
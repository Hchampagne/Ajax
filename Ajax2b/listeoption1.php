
                    
                        <?php
                        require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
                        $db = connexionBase(); // Appel de la fonction de connexion	
                        $requete = "SELECT * FROM regions ORDER BY reg_id asc";
                        $result = $db->query($requete);
                       
                        $aregion = $result->fetchAll(PDO::FETCH_OBJ);
                        echo json_encode($aregion);
                        
                    
            
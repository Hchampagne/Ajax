
                    
                        <?php
                         
                        $id=$_POST['reg_id'];
                        require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
                        $db = connexionBase(); // Appel de la fonction de connexion	
                        $requete = "SELECT * FROM departements WHERE dep_reg_id=".$id;
                        $result1 = $db->query($requete);
                      
                        $adep = $result1->fetchALL(PDO::FETCH_OBJ);
                        echo json_encode($adep);
                    
            
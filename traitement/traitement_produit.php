<?php


$pdo = new PDO('mysql:host=localhost;dbname=dashboard', 'root', '');
    if(isset($_POST['produit_valider'])){
        $lieux_achat=!isset($_POST['lieux_achat']);
        $adress_achat=!isset($_POST['adress_achat']);
        $url_site=$_POST['url_site'];
        $nom_produit=htmlspecialchars($_POST['nom_produit']);
        $reference=htmlspecialchars($_POST['reference']);
        $categorie=$_POST['categorie'];
        $date_achat=$_POST['date_achat'];
        $fin_garantie=$_POST['fin_garantie'];
        $prix=htmlspecialchars($_POST['prix']);
        $conseil_entretien=htmlspecialchars($_POST['conseil_entretien']);
        $manuel_utilisation=htmlspecialchars($_POST["manuel_utilisation"]);
        $utilisateur=$_SESSION['utilisateur']="test";
        //a modifier la variable session par ta variable identifiant utilisateur
        $db_fichier=$utilisateur.".png";
        if(!empty($adress_achat)||!empty($url_site)&& !empty($nom_produit)&&!empty($reference)&&!empty($prix)&&!empty($conseil_entretien)){
            $traitement_url=preg_match("#^https\:\/\/#",$url_site);
            $traitement_prix_euro=preg_match("#[0-9]\€$#",$prix);
            
            if($traitement_url){
                if($traitement_prix_euro){
                    
                    $stmt = $pdo->prepare("INSERT INTO produits (adresse_achat, nom_produit,reference,categorie,date_achat,date_fin_garantie,prix,ticket_achat,conseil_entretiens,url_achat)
                     VALUES ( :adress_achat,:nom_produit,:reference,:categorie,:date_achat,:fin_garantie,:prix,:ticket_achat,:conseil_entretien,:url_achat)");
                    $stmt->bindParam(':adress_achat', $adress_achat);
                    $stmt->bindParam(':nom_produit', $nom_produit);
                    $stmt->bindParam(':nom_produit', $nom_produit);
                    $stmt->bindParam(':reference', $reference);
                    $stmt->bindParam(':categorie', $categorie);
                    $stmt->bindParam(':date_achat', $date_achat);
                    $stmt->bindParam(':fin_garantie', $fin_garantie);
                    $stmt->bindParam(':prix', $prix);
                    $stmt->bindParam(':ticket_achat', $db_fichier);
                    $stmt->bindParam(':conseil_entretien', $conseil_entretien);
                    $stmt->bindParam(':url_achat', $url_site);
                    $stmt->execute();

                    $nom_file=$_FILES['facture']['name'];
                    //$utilisateur=$_SESSION['utilisateur'];
                    $extension_file= pathinfo($nom_file, PATHINFO_EXTENSION);
                    $size_file=1000000;
                    $extension_autorise=['png','jpg'];
                    $chemin_file='facture';

                        if(in_array($extension_file,$extension_autorise)){

                            if($_FILES['facture']['size']<=$size_file){
                        
                                $nom_fichier=$_FILES['facture']['tmp_name'];
                                move_uploaded_file($nom_fichier, "$chemin_file/test.png");
                                
                            }else{
                                echo 'le fichier ne doit pas dépasser les 1mo';
                            }
                        }else{
                            echo 'le format de fichier doit etre de type png ou jpg';
                        }

                }else{
                    $erreur_symbole="la chaine doit posséder un chiffre et le symbole €";          
                }
            }else{
                $erreur_url="l'url doit contenir une adressse de type https://";
            }
        }else{
            $erreur_formulaire='tous les champs doivent etre remplis';
        }
    }

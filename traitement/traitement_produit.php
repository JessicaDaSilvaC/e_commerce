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
                    
                    $stmt = $pdo->prepare("INSERT INTO tous_les_produit (adresse_achat, nom_produit,reference,categorie,date_achat,date_fin_garantie,prix,ticket_achat,conseil_entretiens,url_achat) VALUES 
                    ( :adress_achat,:nom_produit,:reference,:categorie,:date_achat,:fin_garantie,:prix,:ticket_achat,:conseil_entretien,:url_achat)");
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
/*$nom_file=$_FILES['facture']['name'];
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
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <div>
            <input type="text" name="nom_produit" class="nom_produit" placeholder="nom_produit" value="<?= ($nom_produit)?>">
        </div>
        <div>
            <select name='puissance' size='l'>
                <option>Catégories
                <option <?php if($categorie == 'Multimédia') echo 'selected'; ?>>Multimédia
                <option <?php if($categorie == 'Livres') echo 'selected'; ?>>Livres
                <option <?php if($categorie == 'Papeterie') echo 'selected'; ?>>Papeterie
                <option <?php if($categorie == 'Electromenager') echo 'selected'; ?> >Electromenager
                <option <?php if($categorie == 'Véhicule') echo 'selected'; ?>>Véhicule
                <option <?php if($categorie == 'Accessoire') echo 'selected'; ?>>Accessoire
            </select>
        </div>
        <div>
            <input type="text" name="référence" class="référence" placeholder="référence" value="<?= ($reference)?>">
        </div>
        <div>
            <input type="date" name="date" id="date" placeholder="date" value="<?php
                if($date_achat == ""){
                    echo strftime("%Y-%m-%d", strtotime("now"));
                } else {
                    echo strftime("%Y-%m-%d", strtotime($date_changement));
            }?>">
        </div>
        <div>
            <input type="date" name="fin" id="fin" placeholder="fin" value="<?php
                if($fin_garantie == ""){
                    echo strftime("%Y-%m-%d", strtotime("now"));
                } else {
                    echo strftime("%Y-%m-%d", strtotime($fin_garantie));
            }?>">
        </div>
        <div>
            <input type="text" name="prix" class="prix" placeholder="prix" value="<?= ($prix)?>">
        </div>
        <div>
            <input type="text" name="conseil" class="conseil" placeholder="conseil" value="<?= ($conseil_entretien)?>">
        </div>
        <div>
            <input type="ticket" name="ticket" class="ticket" placeholder="ticket" value="<?= ($conseil_entretien)?>">
        </div>
        <!--Faire l'up du ticket de caisse-->
        <!--Faire l'up du manuel d'utilisation-->
    </form>
</body>
</html>
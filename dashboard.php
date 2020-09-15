<?php
    include('traitement/traitement_produit.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" class="d-flex flex-column w-50"  enctype="multipart/form-data" method="POST">
        <label>lieux d'achat</label>
        <select name="lieux_achat" id="lieu">
            <option value="direct"> en direct</option>
            <option value="e-commerce"> en e-commerce<option>
        </select>
        <label  class="label_direct" name="label_adress ">Adresse de l'achat</label>
        <input type="text" class="direct" name="adress_achat">
        <label  class="label_e_commerce d-none" name="label_adress "> adresse url du site</label>    
        <input type="text" class="e-commerce d-none" name="url_site" id="input_url">
        <?php 
        if(!isset($erreur_url)){
            
        }else{
            ?>
            <p class="erreur"><?php echo $erreur_url;?></p>
            <?php
        }
      
       
            ?>
        <label>Nom du produit</label>
        <input type="text" name="nom_produit" placeholder="nom du produit">
        <label>Référence</label>
        <input type="text" name="reference">
        <label>Catégorie</label>
        <select name="categorie" name="categorie" id="">
            <option name="electroménager">electroménager</option>
            <option name="Tv_hifi">Tv-hifi</option>
            <option name="bricolage">bricolage</option>
            <option name="Voiture">Voiture</option>
        </select>
        <label >date d'achat</label>
        <input type="date" name="date_achat">
        <label>date de fin de garantie</label>
        <input type="date" name="fin_garantie">
        <label>Prix</label>
        <?php 
        if(!isset($erreur_symbole)){
            
        }else{
            ?>
            <p class="erreur"><?php echo $erreur_symbole;?></p>
            <?php
        }
      
       
            ?>
        <input type="text" name="prix">
        <label>conseil d'entretiens</label>
        <textarea name="conseil_entretien"></textarea>
        <label>ticket d'achat</label>
        <input type="file" name='facture'>
        <label>manuel d'utilisation</label>
        <textarea name="manuel_utilisation"></textarea>
        <button name="produit_valider">valider</button>
        <?php 
        if(!isset($erreur_formulaire)){
            
        }else{
            ?>
            <p class="erreur"><?php echo $erreur_formulaire; ?></p>
            <?php
        }
      
       
            ?>
    </form>
    <script src="lieu.js"></script>
</body>
</html>
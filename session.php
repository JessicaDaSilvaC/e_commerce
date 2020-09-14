<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard produit</title>
</head>
<body onLoad="document.fo.login.focus()">
   <h2>
      <?php echo $bienvenue?>
      <a href="deconnexion.php">Se déconnecter</a>
   </h2>
   <h2> <a href="traitement/traitement_produit.php">Ajouter un produit</a> </h2>
   <table>
      <tr>
         <th>Nom produit</th>
         <div class="optadress">
            <input type="radio" class="achat" name="drone" value="achat" checked>
            <label for="achat">Achat en direct</label>
            <input type="radio" class="achat" name="drone" value="achat" checked>
            <label for="achat">Achat en ligne</label>            
         </div>
         <!--Faire pour que les casses adresse ou url s'affiche selon choix d'avant-->
         <th>Catégorie</th>
         <th>Référence</th>
         <th>Date d'achat</th>
         <th>Date de garantie</th>
         <th>Prix</th>
         <th>Conseils d'entretiens</th>
         <th>Ticket de caisse</th>
         <th>Manuel d'utilisation</th>
      </tr>
   </table>
</body>
</html>
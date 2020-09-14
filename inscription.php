<?php
   session_start();
   
   $erreur="";
   if(isset($_POST["valider"])){ 
      $nom=$_POST["nom"];
      $prenom=$_POST["prenom"];
      $login=$_POST["login"];
      $pass=$_POST["pass"];
      $repass=$_POST["repass"];
      $valider=$_POST["valider"];     
   if(empty($nom)){ 
      $erreur="Nom laissé vide!";
      }elseif(empty($prenom)){
       $erreur="Prénom laissé vide!";
      }elseif(empty($prenom)){
         $erreur="Prénom laissé vide!";
      }elseif(empty($login)){
         $erreur="Login laissé vide!";
      }elseif(empty($pass)){
         $erreur="Mot de passe laissé vide!";
      }elseif($pass!=$repass){
         $erreur="Mots de passe non identiques!";
      }else{
         include("connexion.php");
         $sel = $pdo->prepare("SELECT id FROM utilisateurs WHERE login=? LIMIT 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur="Login existe déjà!";
         }else{
            var_dump($nom);
            $ins=$pdo->prepare("INSERT INTO utilisateurs (nom, prenom, login, pass) VALUES(:nom, :prenom, :login, :pass)");
            $ins->execute(array(':nom' => $nom,':prenom' => $prenom,':login' => $login,':pass' => sha1($pass)));
               /*header("location:index.php");*/
               var_dump($pdo);
         }   
      }
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Formulaire</title>
</head>
<body>
<h1>Inscription <a href="index.php">connexion</a></h1>
      <div class="erreur"><?php echo $erreur ?></div> <!--Gestion des erreurs-->
      <form name="fo" method="post" action="">

    <label >Votre Nom</label>
         <input type="text" name="nom" placeholder="Nom" ><br>

    <label>Votre Prénom</label>
         <input type="text" name="prenom" placeholder="Prénom"><br>

    <label>Votre Identifiant</label>
         <input type="text" name="login" placeholder="Login" ><br>

    <label>Votre Mot de passe</label>
         <input type="password" name="pass" placeholder="Mot de passe" ><br>

    <label>Confirmer Mot de passe</label>     
         <input type="password" name="repass" placeholder="Confirmer Mot de passe"><br>
         <input type="submit" name="valider" value="S'enregistrer">
      </form>
</body>
</html>
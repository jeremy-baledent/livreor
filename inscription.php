<html>
<link rel="stylesheet" href="livreor.css"/>



<div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Inscription </h2>
   

    <div class="fadeIn first">
    </div>

<form class="formulaire" name="inscription" method="post" action="inscription.php">

<?php
if(isset ($_POST['valider']))
{
    $db=mysqli_connect("localhost","root","","livreor");
    $login=$_POST['login']; 
    $requete1="SELECT * FROM `utilisateurs`WHERE login='$login'";
    $query= mysqli_query ($db,$requete1);
    $resultat=mysqli_num_rows($query);

if(($resultat>0)||($_POST['password']!=$_POST['password1']))
{
    if ($resultat>0){ ?> <div class="erreur1">
        <?php
         echo  "cet utilisateurs est déjà utilisé";
         ?>
         </div>
         <?php
         }
         
         if($_POST['password']!=$_POST['password1'])?> <div class="erreur1"> <?php
         {
            echo "les mots de passes sont pas identiques";?></div>
            <?php
         }
  
    
}
else{
   
    $requete='INSERT INTO `utilisateurs` (login, password) VALUES ("'.$_POST['login'].'","'.$_POST['password'].'");';
    mysqli_query ($db,$requete);
    mysqli_close($db);
    header('location: connexion.php');
}
}
?>
       Pseudo: <input type="text" name="login" /> <br/>
        mot de passe : <input type="password" name="password" /><br/>
        confirmez votre mot de passe : <input type="password" name="password1"/><br/>

        <input type="submit" name="valider" value="M'inscrire"/>




    </form></div>



</body>


    
     

    









         


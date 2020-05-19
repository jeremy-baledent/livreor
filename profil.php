<html>
<link rel="stylesheet" href="livreor.css"/>


    <?php
session_start();
?>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Modifiez votre profil </h2>
   

    <div class="fadeIn first">
    </div>


<form class="formulaire" name="modifier" method="post" action="profil.php">
	 </br>
Votre Pseudo: <input type="text" name="login" value="<?php echo $_SESSION ['login'];?>">

        
         </br>
        
        Entrez votre mot de passe: <input type="password" name="password" value="<?php echo $_SESSION['password'];?>">
     </br>
      
        confirmez votre mot de passe : <input type="password" name="password1"value="<?php
        echo $_SESSION['password'];?>"><br/>
         </br>
        <input type="submit" name="valider" value="Valider"/>
</form>
<?php

if(isset($_POST['valider']))
{
    

 $db=mysqli_connect("localhost","root","","livreor");
 $newlogin= $_POST['login']; 
 $login= $_SESSION['login']; 
 $password=$_POST['password'];

 $req= "UPDATE utilisateurs SET login = '".$newlogin."', password = '".$password."' WHERE login= '".$login."' ";
 $query= mysqli_query ($db, $req);
 $_SESSION['login']=$newlogin;
 $_SESSION['password']=$password;
 header('location: index.php');
 
}
?>
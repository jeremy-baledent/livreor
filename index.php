<!DOCTYPE html>
<html>

	<head>
		<title>accueil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="livreor.css"/>
	</head>

	<body >
                <header class="mescouilles">


                <?php
                session_start();

                        if(isset($_POST['deco']))
                        {
                                unset($_SESSION['login']);
                                unset($_SESSION['password']);
                        }
                        

                        
       
                        if(!isset($_SESSION['login']))
                        {
                        ?>
						<div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Accueil </h2>
   

    <div class="fadeIn first">
    </div>
                      <a href="connexion.php"> <input type="submit" class="fadeIn fourth" name="valider"  value="Se Connecter"/>
						<a href="inscription.php"><input type="submit" class="fadeIn fourth" name="valider"  value="Sinscrire"/>
                         <?php
                        }
                        else
                        {


                        ?>
                        <div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Espace Membre </h2>
   

    <div class="fadeIn first">
    </div>
                        <a  href="commentaire.php"><input type="submit" value="Ajouter un commentaire">
                      <a href="profil.php">  <input type="submit" value="modifier profil">
                        <form method="post" action="index.php">
                                <input type="submit" value="deconnexion" name="deco">   
                        </form>

                        <?php
                        }  
                        ?>
	                </ul>
                        </header>
                        

                                        </html>
<?php

session_start();
echo $_SESSION['login'];
if(!empty($_POST['deco']))
{
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	unset($_SESSION['profil']);
}

if((isset($_SESSION['login']))&& (isset($_SESSION['password'])))
{
?>

<html>

<head>
<link href="livreor.css" rel="stylesheet">
<title>Commentaires</title>
</head>

<body class="commentaire">
<header>	
	<ul class="ul2">
		<li><a href="index.php">Accueil</a></li>
	
	
<div class="boutondeco">
<form class="déconnexion" method="post" action="commentaire.php">
<a href="index.php"><input type="submit" name="deco" value="Retour"></a>
</form>
</div>
</ul>
</header>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Ajouter / Supprimer</h2>
   

    <div class="fadeIn first">
    </div>


<?php

if(isset($_POST['envoyer']))
{
	$connexion= mysqli_connect("localhost", "root", "", "livreor"); 
	$login=$_SESSION['login'];
	$query="SELECT  id from utilisateurs WHERE login='$login'";
	$resultat= mysqli_query($connexion, $query);
	$row = mysqli_fetch_array($resultat);
		
	$id_user=$row['id'];

if(!empty($_POST['text']))
{
	
	$query1 = "INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['text']."', '".$id_user."', CURRENT_TIMESTAMP());";		
	mysqli_query($connexion, $query1);		 
	mysqli_close($connexion);
	$_SESSION['commentaire']=$_POST['text'];
	header('Location: livre-or.php');
	

}
else
{
	echo "Veuillez écrire un commentaire";
}

}

	
	
?>

<article class="form">
<form class="commentaireform" method="post" action="commentaire.php">
<textarea size="10" name="text" placeholder="Mettez votre commentaire" class="espace_commentaire"></textarea>
<input type="submit" value="Envoyer" name="envoyer">
<a href="livre-or.php"><input type="reset" value="Effacer" name="reset"></a>
</form>
</article>
<?php 	
}
else
{
?>
<html>

<head>
<link href="livreor.css" rel="stylesheet">
<title>Commentaires</title>
</head>

<body class="commentaire">
<header>	
	<ul class="ul2">
		<li><a href="index.php">Accueil</a></li>
		<li><a href="connexion.php">Se connecter</a></li>
	</ul>
</header>

<article  class="phraseconnexion">
<div class="connexioncommentaire">
<p>Merci de vous connecter ! :)</p>
</div>
</article>

</body>

</html>
<?php	
}

?>

</body>

</html>

<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $user->redirect('nouveaucours.php');
}

if(empty($_GET['IdUtilisateur']) && empty($_GET['code']))
{
	// header("refresh:5;connexion.php?cnx");
 $user->redirect('connexion.php?cnx');
}

if(isset($_GET['IdUtilisateur']) && isset($_GET['code']))
{
 $IdUtilisateur = base64_decode($_GET['IdUtilisateur']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:token");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['mdp'];
   $cpass = $_POST['mdp2'];
   
   if($cpass!==$pass)
   {
    $msg = '<div class="alert alert-danger" role="alert" id="msg5" >Attention, le mot de passe de confirmation est différent du mot de passe !</div>';
   }
   else
   {
    $stmt = $user->runQuery("UPDATE utilisateur SET MotDePasse=:upass WHERE IdUtilisateur=:IdUtilisateur");
    $stmt->execute(array(":upass"=>$cpass,":IdUtilisateur"=>$rows['IdUtilisateur']));
    
    $msg = "<div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      Votre mot de passe a été changé avec succès .
      </div>";
    header("refresh:5;index.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('mdp2').value != "" && document.getElementById('mdp').value != "") {
		
						if ( document.getElementById('mdp2').value.length < 3 || document.getElementById('mdp').value.length < 3 
								|| document.getElementById('mdp2').value.length >50	|| document.getElementById('mdp').value.length >50) {
								alert("Vérifier que le nombre de caractères entre 3 et 25 caractères.");
								valide1=false;
// 								return valide1;
							}	
		}
		else {
			alert("Veuillez remplir les champs vide.");
			valide1=false;
// 			return valide1;
		}
			
			if (valide1==true) {
			alert("Les champs saisir est valide.");
			return true;
		} else {
			alert("Les champs saisir n'est pas valide.");
			return true;
		}
	}
</script>


	<meta http-equiv="Content-Language" content="fr-FR">
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation,Bureatique(Excel,Word..)">
	<meta name="author"      content="DevHelp">
	<meta name="keywords" 	content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server,Bureautique,Word,Excel,Astuces bureautique,Astcuces word">
	
	<title>Connexion</title>

	<link rel="shortcut icon" href="http://d.hatena.ne.jp/images/or_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	
		<script src="Datatable/js/jquery.js"></script>
    <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 



</head>


<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo5.png" alt="DevHelp" style="height: 50px;"></a>
				</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class=""><a href="index.php"><i class="fa fa-home" aria-hidden="true" style="font-size:22px;"></i></a></li>
					<li><a href="aproposdenous.php" style="font-size:15px;">À propos de nous</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Cours <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cours.php?sujet=Base de données">Base de données</a></li>
							<li><a href="cours.php?sujet=Programmation">Programmation</a></li>
                            <li><a href="cours.php?sujet=Conception">Conception</a></li>
                            <li><a href="cours.php?sujet=Réseaux">Réseaux</a></li>
                            <li><a href="cours.php?sujet=Sécurité">Sécurité</a></li>
                            <li><a href="cours.php?sujet=Systéme exploitation">Systéme d'exploitation</a></li>
						</ul>
					</li>
                    <li><a href="tutoriels.php" style="font-size:15px;">Tutoriels</a></li>
                    <li><a href="logiciels.php" style="font-size:15px;">Logiciels</a></li>
                    <li><a href="actualites.php" style="font-size:15px;">Actualités IT</a></li>
						<!--ul class="dropdown-menu">
							<li><a href="tutoriels.php?sujet=Oracle">Oracle</a></li>
							<li><a href="tutoriels.php?sujet=SQL Server">SQL Server</a></li>
                            <li><a href="tutoriels.php?sujet=Big Data">Big Data</a></li>
                            <li><a href="tutoriels.php?sujet=Tuto programmation">Tuto programmation</a></li>
						</ul-->
					<li><a href="contact.php" style="font-size:15px;">Contact</a></li>
					<?php 
				    	if(!isset($_SESSION['Nom']))
						{
					?> 
							<li><a class="btn" href="connexion.php" style="font-size:15px;">Se connecter / S'inscrire</a></li>
					<?php 
				       	}
				    ?> 	
					<?php 
				    	if(isset($_SESSION['Nom']))
						{
					?> 
							<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Profil<b class="caret"></b></a>
							<ul class="dropdown-menu">
                            <li><a href="moncompte.php" style="font-size:15px;">Mon compte </a></li>
							<li><a href="deconnexion.php" style="font-size:15px;">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
						</ul>
                        </li>
					<?php 
				       	}
				    ?> 
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>
<?php if(isset($msg)) { echo $msg; } ?>
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Accueil</a></li>
			<li class="active">Accés utilisateur</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<!--<h1 class="page-title">Récupération du mot de passe</h1>-->
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<!--<h3 class="thin text-center">Connectez-vous</h3>-->
							<p class="text-center text-muted">Pour terminer la ré-initialisation de votre mot de passe, veuillez saisir <b>un nouveau mot de passe</b>.</p>
							<hr>
							
							<form class="con-form" method="post" action="" id="rec">
								<div class="row top-margin">
								<div class="col-sm-12">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp">
								</div>
								<div class="col-sm-12">
									<label>Confirmation de mot de passe<span class="text-danger">*</span></label>
									<input type= "password" class="form-control" placeholder="Confirmation de mot de passe" id="mdp2" name="mdp2">
								</div>
								</div>
                                <br>
									<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-info" type="submit" name="btn-reset-pass">Terminer</button>
									</div></div>
									
									
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<div id="includedfooter"></div>






	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
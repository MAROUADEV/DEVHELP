<?php
session_start();
require_once("configure.php");
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $reg_user->redirect('nouveaucours.php');
}

if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('index.php');
}
$IdUtilisateur=$_SESSION['IdUtilisateur'];
$Email=$_SESSION['Email'];
$sql2 = "SELECT * FROM utilisateur WHERE IdUtilisateur =:IdUtilisateur";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur));
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
	}
?>


<!DOCTYPE html>
<html lang="fr">

<head>


<script type="text/javascript">
function myFunction() {
		valide3 = true;
		valide1 = true;
		valide2 = true;
		while(valide3==true){
		if (document.getElementById('nom').value != ""	&& document.getElementById('prenom').value != ""
			&& document.getElementById('pwd').value != "" && document.getElementById('pwd2').value != ""
			&& document.getElementById('nu').value != "" ) {
						if (document.getElementById('nom').value.length < 3	|| document.getElementById('prenom').value.length < 3
								|| document.getElementById('pwd2').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('nom').value.length >50	|| document.getElementById('prenom').value.length >50
								|| document.getElementById('pwd2').value.length >50 || document.getElementById('pwd').value.length >50
								|| document.getElementById('nu').value.length < 3 || document.getElementById('nu').value.length >50 ) {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg3" > Vérifiez que le nombre de caractères entre 3 et 50 caractères. </div>';
								valide1=false;
								break;
								
						return false;
							}
							if(document.getElementById('pwd2').value !=document.getElementById('pwd').value){
									
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg5" > Attention, le mot de passe de confirmation est différent du mot de passe ! </div>';
								
								valide1=false;
							break;
							return false;
					    }
						}
						else {
					document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Veuillez remplir les champs vides. </div>';
			
			valide1=false;
			break;a
			return false;
		}
			if (valide1==true) {
			document.getElementById('ins').submit();
							<?php

				if(!empty($_POST)){
					extract($_POST);
					$valid = true;
					$Nom = trim($nom);
					$Prenom = trim($prenom);
					$NomUtilisateur = trim($NomUtilisateur);
					$MotDePasse = trim($Password);
					 $stmt = $reg_user->runQuery("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
					 $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
					 $results2 = $stmt->fetchAll();				 
					 foreach ($results2 as $res2) {
						 if($res2['IdUtilisateur']<> $IdUtilisateur){
						$valid = false;
						$msg = "
					 	<div class='alert alert-info'>
					<button class='close' data-dismiss='alert'>&times;</button>
					 <strong> Désolé ! </strong> Ce Nom d'Utilisateur existe déjà ,  Vous essayez un autre Nom d'Utilisateur .
					 </div>
					 ";
					 }	
					 }	 
					 if($valid == true)
				 {
				  if($reg_user->updateUser($IdUtilisateur,$Nom,$Prenom,$NomUtilisateur,$MotDePasse))
				  {
				   $msg = "
					 <div class='alert alert-success'>
					  <button class='close' data-dismiss='alert'>&times;</button>
					  <strong> Félicitations! </strong> Opération réussie, attendez un moment s'il vous plaît.
					   </div>
					 ";
					 header("refresh:10;accueil.php");
				  }
				  else
				  {
				   $msg = "
					 <div class='alert alert-info'>
					  <button class='close' data-dismiss='alert'>&times;</button>
					  <strong> Désolé! </strong> La modification de votre compte n'est pas effectué. 
					   </div>
					 ";
				  }  
				 }
				}
				?>
			return false;
		}
}
}
</script>


	<meta http-equiv="Content-Language" content="fr-FR">
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation">
	<meta name="author"      content="DevHelp">
	<meta name="keywords" 	content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server">

	
	<title> Mon compte </title>

	<script src="https://www.google.com/recaptcha/api.js"></script>
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
					<li><a href="aproposdenous.php" style="font-size:15px;"> À propos de nous</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Cours<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cours.php?sujet=Base de données" style="font-size:15px;">Base de données</a></li>
							<li><a href="cours.php?sujet=Programmation" style="font-size:15px;">Programmation</a></li>
                            <li><a href="cours.php?sujet=Conception" style="font-size:15px;">Conception</a></li>
                            <li><a href="cours.php?sujet=Réseaux" style="font-size:15px;">Réseaux</a></li>
                            <li><a href="cours.php?sujet=Sécurité" style="font-size:15px;">Sécurité</a></li>
                            <li><a href="cours.php?sujet=Systéme exploitation">Systéme d'exploitation</a></li>
						</ul>
					</li>
                    <li><a href="tutoriels.php" style="font-size:15px;">Tutoriels</a></li>
                    <li><a href="logiciels.php" style="font-size:15px;">Logiciels</a></li>
                    <li><a href="actualites.php" style="font-size:15px;">Actualités IT</a></li>
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Profil <b class="caret"></b></a>
						<ul class="dropdown-menu">
								<li><a href="moncompte.php">Mon compte <i class="fa fa-user"></i></a></li>
								<li><a href="deconnexion.php">Déconnexion <i class="fa fa-sign-out"></i></a></li>
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
	
	<?php if(isset($msg)) echo $msg;  ?>

	
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Acceuil</a></li>
			<li class="active">Accés utilisateur</li>
		</ol>

<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Modifier mon compte</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="con-form" method="post" action="" id="ins">
							<?php foreach ($results as $res) { ?>
								<div class="row top-margin">
								<div class="col-sm-6">
									<label>Nom</label>
									<input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required="required"
									value="<?php echo $res['Nom']; ?>">
								</div>
								<div class="col-sm-6">
									<label>Prénom</label>
									<input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" required="required"
									value="<?php echo $res['Prenom']; ?>">
								</div></div>
								<div class="top-margin">
									<label>Nom d'utilisateur<span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Nom d'utilisateur" id="nu" name="NomUtilisateur" required="required"
									value="<?php echo $res['NomUtilisateur']; ?>">
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe<span class="text-danger">*</span></label>
										<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="Password" required="required">
									</div>
									<div class="col-sm-6">
										<label>Confirmez le mot de passe<span class="text-danger">*</span></label>
										<input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="pwd2" name="PasswordConfirmation" required="required">
									</div>
								</div>

								<hr>

								<div class="row">
									
									<div class="col-lg-4 text-right">
										<button class="btn btn-success" type="button" id="btn1" name="MyBtn" onclick="myFunction()" > Modifier mon compte </button>
										
									</div>
								</div>
								<?php
									}
									?>		
							
							</form>	
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article-->

		</div>
		
	</div>	<!-- /container -->

	<div id="tag-id"></div>
		

	<div id="includedfooter"></div>
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>	
</body>
</html>
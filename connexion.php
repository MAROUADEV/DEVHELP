<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();
if($user_login->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $user_login->redirect('nouveaucours.php');
}
/*if($user_login->is_logged_in()!="")
{
	// header("refresh:5;accueil.php");
 $user_login->redirect('accueil.php');
}*/
?>


<!DOCTYPE html>
<html lang="fr">
<head>


<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('email').value != "" && document.getElementById('pwd').value != "") {
		document.getElementById('msg7').style.display  = 'none';
						if ( document.getElementById('email').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('email').value.length >50	|| document.getElementById('pwd').value.length >50) {
								document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg3" > Vérifier que le nombre de caractères entre 3 et 50 caractères. </div>';
								
								valide1=false;
			return false;
							}

		}
		else {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Veuillez remplir les champs vides.</div>';
			
			valide1=false;
// 			return valide1;
			return false;
		}
			
			if (valide1==true) {
			document.getElementById('cnx').submit();
			<?php
			
				if(!empty($_POST)){
					extract($_POST);
					$Email = (trim($Email));
					$MotDePasse = trim($MotDePasse);
					if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
						if($user_login->login1($Email,$MotDePasse))
							 {
							  $user_login->redirect('accueil.php');
							 }
						
					}else{
						if($user_login->login2($Email,$MotDePasse))
							 {
							  $user_login->redirect('accueil.php');
							 }
						
					}
				}	
?>
			return false;
		} else {
			document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Connexion impossible. </div>';
			
			return false;
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
					<li><a href="aproposdenous.php" style="font-size:15px">À propos de nous</a></li>
					<li class=" dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px">Cours <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cours.php?sujet=Base de données">Base de données</a></li>
							<li><a href="cours.php?sujet=Programmation">Programmation</a></li>
                            <li><a href="cours.php?sujet=Conception">Conception</a></li>
                            <li><a href="cours.php?sujet=Réseaux">Réseaux</a></li>
                            <li><a href="cours.php?sujet=Sécurité">Sécurité</a></li>
                            <li><a href="cours.php?sujet=Systéme exploitation">Systéme d'exploitation</a></li>
						</ul>
					</li>
                    <li><a href="tutoriels.php" style="font-size:15px">Tutoriels</a></li>
                    <li><a href="logiciels.php" style="font-size:15px">Logiciels</a></li>
                    <li><a href="actualites.php" style="font-size:15px;">Actualités IT</a></li>
					<li><a href="contact.php" style="font-size:15px">Contact</a></li>
					<li class="active"><a class="btn" href="connexion.php" style="font-size:15x">Se connecter / S'inscrire</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>
	 <?php 
  if(isset($_GET['cnx']))
  {
   ?>
            <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Bienvenue !</strong> Pour pouvoir naviguer avec aisance dans notre site  vous devez vous <a href='inscription.php'>inscrire </a> ou vous <a href='connexion.php'>connecter</a> si vous avez un compte. </div>
   </div>
            <?php
  }
  ?>
			
		 <?php 
  if(isset($_GET['inactive']))
  {
   ?>
            <div class='alert alert-info'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Désolé!</strong> Ce compte n'est pas activé Accédez à votre Boîte de réception et activez-le ou <a href='mailconf.php?Email=<?php echo $_SESSION['Email'] ?>&MotDePasse=<?php echo base64_encode($_SESSION['MotDePasse'])?>'> cliquez ici</a> pour renvoyer l'email de confirmation. 
   </div>
            <?php
  }
  ?>
        <?php
        if(isset($_GET['error']))
  {
   ?>
            <div class='alert alert-info '>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Mot de passe incorrect</strong> 
   </div >
   <?php
  }
  ?>
		<?php
        if(isset($_GET['error2']))
  {
   ?>
            <div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Nom d ' utilisateur inconnu!</strong> 
   </div >
   <?php
  }
  ?>
		<?php
        if(isset($_GET['error3']))
  {
   ?>
            <div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Ce compte n'existe pas!</strong> Entrez une adresse e-mail différente ou créez un autre compte.
   </div >
   <?php
  }
  ?>

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
					<h1 class="page-title">Connectez-vous</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous </h3>
							<p class="text-center text-muted">Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">Ici</a> </p>
							<hr>
							
							<form class="con-form" method="post" action="" id="cnx">
								<div class="top-margin">
									<label>Nom d'utilisateur ou Adresse Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Nom d'utilisateur ou Adresse Email" id="email" name="Email" required="required">
								</div>
								<div class="top-margin">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="MotDePasse" required="required">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-7">
										<b><a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a></b>
									</div>
									<div class="col-lg-5 text-right">
									<button id="lbtn" class="btn btn-action" name="btn-login" onclick="myFunction()"> Se connecter</button>
		
											</div>
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
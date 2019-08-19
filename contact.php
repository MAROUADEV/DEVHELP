<?php
session_start();
require_once 'class.user.php';
$_SESSION['New'] = false;
$user_home = new USER();

if($user_home->is_Admin()!="")
{
 $user_home->redirect('nouveaucours.php');
}

/*if(!$user_home->is_logged_in())
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$_SESSION['New'] =$actual_link;
	$user_home->redirect('connexion.php');
}*/


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Language" content="fr-FR">
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation,Bureatique(Excel,Word..)">
	<meta name="author"      content="DevHelp">
	<meta name="keywords" 	content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server,Bureautique,Word,Excel,Astuces bureautique,Astcuces word">
	
	<title>Contact</title>
        
	<link rel="shortcut icon" href="http://d.hatena.ne.jp/images/or_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">
	
	
	
		<script src="Datatable/js/jquery.js"></script>
    <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 



</head>

<body style="">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom animated slideDown">
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
					<li class="active"><a href="contact.php" style="font-size:15px;">Contact</a></li>
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

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Accueil</a></li>
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez-nous</h1>
				</header>
				
				<br>
                <form action="email.php" method="post" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-sm-6">
								<input class="form-control" type="text" placeholder="Nom d'utilisateur" name="name" required="required">
							</div>
							<div class="col-sm-6">
								<input class="form-control" name="email" type="email" placeholder="Email" id="email" required="required">
							</div>
						</div><br>
                        <div class="row">
							<div class="col-sm-12">
								<input class="form-control" name="subject" type="text" placeholder="Objet" id="subject" required="required">
							</div>
						</div>
                        <br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Veuillez écrire votre message" class="form-control" rows="9" name="message" required="required"></textarea>
							</div>
						</div>
                        
						<br>
                        
						<div class="row">
                            <div class="col-sm-12 text-right">
								<input class="btn btn-action" id="submit" name ="submit" type="submit" value="Envoyer">
						</div>
					</form>
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Supportez-nous !</h4>
                    <p>Veuillez nous supporter afin que nous ameliorions nos cours et nos techniques dans ce large domaine </p>
					<!--<address>
						2002 Holcombe Boulevard, Houston, TX 77030, USA
					</address>-->
					<h4>Business enquiries</h4>
                    <p>" Si vous êtes intéressé par notre produit n'hésitez pas de nous contacter " </p>
                    <center><a href="mailto:#">devhelp.contact@gmail.com</a><br></center>
					<!--<address>
						(713) 791-1414
					</address>-->
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
						
	

	<div id="includedfooter"></div>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
    <script src="assets/js/contact_me.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
	<!-- Google Maps 
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="assets/js/google-map.js"></script>-->
	


</body></html>
<?php
session_start();
require_once("configure.php");

require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_Admin()=="")
{
	// header("refresh:5;connexion.php?cnx");
 $user_login->redirect('connexion.php?cnx');
}else{
	
if(!empty($_POST)){
extract($_POST);
if (isset($_POST['Sujet']) && isset($_POST['Title']) && isset($_POST['Description'])&& isset($_POST['Lien']) && isset($_POST['Type'])) {
					$Sujet = trim($Sujet);
					$Title = trim($Title);
					$Description =trim($Description);
					$Lien = trim($Lien);
					$Type = trim($Type);
$sql2 = " INSERT INTO `cours` (`ID`, `Sujet`, `Title`, `Description`, `Lien`, `Type`) VALUES (NULL, '$Sujet', '$Title', '$Description', '$Lien', '$Type')";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute();
		$msg = "
					 <div class='alert alert-success'>
					  <button class='close' data-dismiss='alert'>&times;</button>
					  <strong> Félicitations! </strong> Opération réussie . 
					   </div>
					 ";
		} catch (Exception $ex) {
		echo($ex->getMessage());
}}}}
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
	
	<title>Nouveau cours</title>
        
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
					<li class=""><a href="contact.php" style="font-size:15px;">Contact</a></li>
					<li><a href="deconnexion.php" style="font-size:15px;">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
					
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
			<li><a href="index.php">Accueil</a></li>
			<li class="active">Nouveau cours</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Nouveau cours</h1>
				</header>
				
				<div id="tag-id"></div>
				<br>
					<form action="" method="post" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-sm-6">
								<input class="form-control" type="text" placeholder="Sujet" name="Sujet" required="required">
							</div>
							<div class="col-sm-6">
								<input class="form-control" name="Title" type="text" placeholder="Title" id="email" required="required">
							</div>
						</div><br>
                        
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Description" class="form-control" rows="9" name="Description" required="required"></textarea>
							</div>
						</div>
                        
						<br>
                        <div class="row">
							<div class="col-sm-6">
								<input class="form-control" name="Lien" type="text" placeholder="Lien" id="subject" required="required">
							</div>
							<div class="col-sm-6">
								<input class="form-control" name="Type" type="text" placeholder="Type" id="subject" required="required">
							</div>
						</div>
                        <br>
						<div class="row">
                            <div class="col-sm-12 text-right">
								<input class="btn btn-action" id="submit" name ="submit" type="submit" value="Ajouter">
						</div>
                            <br><br><br>
						<div class="row">
                            <div class="col-sm-12 text-right">
								<a href="nouveauarticles.php" class="btn btn-action">Ajouter un article </a>
						</div>
					</form>
			</article>
			<!-- /Article -->
			
		

		</div>
	</div>	<!-- /container -->
						<br>
						<br>
	

	<div id="includedfooter"></div>






	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
	<!-- Google Maps 
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="assets/js/google-map.js"></script>-->
	


</body></html>
<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if($user_home->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $user_home->redirect('nouveaucours.php');
}

/*if(!$user_home->is_logged_in())
{
	// header("refresh:5;index.php");
 $user_home->redirect('index.php');
}*/
	
if(isset($_SESSION['New'])){
	if($_SESSION['New'] !="")
			{
			// header("refresh:5;".$_SESSION['New']);
			 $user_home->redirect($_SESSION['New']);
			}
}

require_once("configure.php");
$sql2 = " SELECT * FROM `cours` ORDER BY `cours`.`Id` DESC LIMIT 5";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute();
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}

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
	
	<title>Cours informatiques gratuits en ligne - DevHelp</title>

	<link rel="shortcut icon" href="http://d.hatena.ne.jp/images/or_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,1000">
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
    
    <style type="text/css">
	
        .lead
        {
            text-shadow:2px 2px #fff;
        }
</style>
</head>

<body class="home">

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
					<li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true" style="font-size:22px;"></i></a></li>
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

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead" ><strong>Votre support d'apprentissage</strong> </h1>
				<p class="tagline" style="color:black;"><strong>Facile , gratuit , adaptés à tout âge</strong></p>
                <p class="tagline" style="color:black;font-size:23px;"><strong>Bienvenue 
					<?php 
				       
				    	if(isset($_SESSION['Nom'])){
							echo  $_SESSION['Nom'].' '.$_SESSION['Prenom'].' '. $_SESSION['New'];
				       	}
				    ?> </strong>
				</p>
					<?php 
				    	if(!isset($_SESSION['Nom']))
						{
					?> 
							<a class="btn btn-action btn-lg" role="button">S'inscrire</a>
					<?php 
				       	}
				    ?> 	
				
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Cours informatiques gratuits en ligne</h2>
		<p class="text-muted">
			DevHelp vous propose de télécharger gratuitement des cours et des articles de référence sur différents domaines informatiques.</p>
            <p class="text-muted">
            Ce site est le lieu ou tout un chacun peut trouver la réponse à ses besoins en connaissances informatiques, sans oublier que tous nos supports et tutoriels sont entièrement gratuites, aussi vous trouverez des centaines de cours informatique spécialement conçu pour se former seul en auto-formation. 
 
	</div>
	<!-- /Intro-->



<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h2 class="text-center thin">Accés rapide</h2>
			<div class="row">
			<a href="cours.php?sujet=Sécurité">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="assets/images/pic16.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Sécurité</h3>
      </div>
	  
    </div>
  </div>
  </a>
  <a href="cours.php?sujet=Conception">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
	
      <img src="assets/images/pic14.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Conception</h3>
      </div>
    </div>
  </div>
	  </a>
	<a href="cours.php?sujet=Réseaux">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="assets/images/pic8.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Réseaux</h3>
      </div>
    </div>
  </div>
	  </a>
	<a href="cours.php?sujet=Systéme exploitation">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="assets/images/pic7.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Systéme d'exploitation</h3>
      </div>
    </div>
  </div>
	  </a>
	<a href="cours.php?sujet=Programmation">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="assets/images/pic1.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Programmation</h3>
      </div>
    </div>
  </div>
	  </a>
	<a href="cours.php?sujet=Base de données">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="assets/images/pic11.png" alt="" class="img-circle" 
					style="height: auto;  width: auto;  max-width: 150px;  max-height: 150px;">
      <div class="caption text-center">
        <h3>Base de données</h3>
      </div>
    </div>
</div>
	  </a>
			</div> <!-- /row  -->
		</div>
	</div>
	<!-- /Highlights -->

    <div class="jumbotron top-space">
          
		<div class="container">
			
			<h2 class="text-center thin">Les actualités</h2>
              <?php foreach ($results as $res) { ?>
			<div >
                <div class="col-sm-4 col-md-4">
			         <div class="thumbnail">
                              
					               <h3 style ="padding-left:20px;padding-right:20px;"><a href="actualite.php?id=<?php echo $res['Id_article'] ?>"><?php echo $res['Image'] ?> </a></h3>
                                  <div style ="padding-left:20px;padding-bottom:20px;">
                                     <?php echo substr($res['Sous_titre'],0,500); ?>
<a style ="padding-left:20px;"  href="actualite.php?id=<?php echo $res['Id_article'] ?>">Lire la suite</a></div>
                                    </a>
                                <!--div >
                                      <p > <!--?php echo substr($req['Sous_titre'],0,500); ?>                                          </p-->
                                    
                                    
				                </div-->
                            </div>
                </div>
  </div>
   <?php
					}
					?>
			</div> <!-- /row  -->
   
		</div>

	<!-- /Highlights -->
            
	<!-- container -->
	<div class="container">

		<h2 class="text-center top-space">Les documents les plus récents ajoutés</h2>
		<br>

		<div class="row" >			
			<!-- Article main content -->
			<article class="col-md-12 maincontent">	
				<?php foreach ($request as $req) { ?>
					<center><h4 class="fa fa-hand-o-right" aria-hidden="true"> <?php echo $req['Title'] ?> </h4><br></center>
				<?php
				}
				?>				
				</article>
			<!-- /Article -->
			</div>

</div>	<!-- /container -->
	
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->



	<div id="includedfooter"></div>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
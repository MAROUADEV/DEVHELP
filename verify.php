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
 
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:code LIMIT 1");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 {
						$_SESSION['userSession'] = $row['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $row['IdUtilisateur'];
						$_SESSION['Nom'] = $row['Nom'];
						$_SESSION['Prenom'] = $row['Prenom'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['NomUtilisateur'] = $row['NomUtilisateur'];
						$_SESSION['MotDePasse'] = $row['MotDePasse'];
  if($row['Status']==$statusN)
  {
   $stmt = $user->runQuery("UPDATE utilisateur SET Status=:status WHERE IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":status",$statusY);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   
   $msg = "
             <div class='alert alert-success'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong> Félicitations  !</strong>  Votre compte est activé attendez un moment s'il vous plaît.</a>
          </div>
          "; 
		  if (!filter_var($_SESSION['Email'], FILTER_VALIDATE_EMAIL)) {
						if($user->login1($_SESSION['Email'],$_SESSION['MotDePasse']))
							 {
								 header("refresh:5;accueil.php");
							 }
						
					}else{
						if($user->login2($_SESSION['Email'],$_SESSION['MotDePasse']))
							 {
								 header("refresh:5;accueil.php");
							 }
						
					}
			
  }
  else
  {
   $msg = "
             <div class='alert alert-info'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Désolé !</strong>  Votre compte est déjà activé : <a href='connexion.php'>Connectez-vous ici</a>
          </div>
          ";
  }
 }
 else
 {
  $msg = "
         <div class='alert alert-info'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Désolé !</strong>  Aucun compte trouvé : <a href='inscription.php'>Inscrivez-vous ici</a>
      </div>
      ";
 } 
}

?>
<!DOCTYPE html>
<html>
  <head>
  
  <meta http-equiv="Content-Language" content="fr-FR">
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation,Bureatique(Excel,Word..)">
	<meta name="author"      content="DevHelp">
	<meta name="keywords" 	content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server,Bureautique,Word,Excel,Astuces bureautique,Astcuces word">
	
	<title>Activation de votre compte..! - DevHelp</title>

	<link rel="shortcut icon" href="http://d.hatena.ne.jp/images/or_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,1000">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
    <!-- Bootstrap -->
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		<script src="Datatable/js/jquery.js"></script>
    <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 



  </head>
  <body id="login">
      
      
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
    <div class="container">
    </div> <!-- /container -->
	
  <?php if(isset($msg)) { echo $msg; } ?><br><br><br><br><br><br><br><br>

  

	<div id="includedfooter"></div>


  
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</body>
</html>
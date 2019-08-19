<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();
if($user_login->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $user_login->redirect('nouveaucours.php');
}
/*if($user_login->is_logged_in()=="")
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$_SESSION['New'] =$actual_link;
	// header("refresh:5;connexion.php?cnx");
	$reg_user->redirect('connexion.php?cnx');
}*/

require_once("configure.php");

$Lien=base64_decode($_GET["Lien"]);
$Title=$_GET["Title"];
$Type=$_GET["Type"];
$Sujet=$_GET["Sujet"];
if($Type=="tuto"){
$sql2 = " SELECT * FROM cours  where type=:Type and Title !=:Title ORDER BY Id  DESC LIMIT 3  ";
}else{
$sql2 = " SELECT * FROM cours  where Sujet=:Sujet and type=:Type and Title !=:Title ORDER BY Id  DESC LIMIT 3  ";
}

	try {
		$stmt = $DB->prepare($sql2);
		if($Type!="tuto"){
			$stmt->bindparam(":Sujet",$Sujet);
		}
		$stmt->bindparam(":Title",$Title);
		$stmt->bindparam(":Type",$Type);
		
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
	<meta name="viewport"   	content="width=device-width, initial-scale=1.0">
    <meta name="description"	content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation">
	<meta name="author"     	content="DevHelp">
	<meta name="keywords"		content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server">

		
	<title>Téléchargement <?php echo $Title ?></title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
    <link href="Datatable/css/dataTables.bootstrap.min.css"rel="stylesheet" type="text/css" />

		
		<script src="Datatable/js/jquery.js"></script>
    <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 
<style>
    
   .button {
    background-color: #FF9B22;
    border: 1px solid black;
    color: white;
    font-family: Arial;
    font-size: small;
    text-decoration: none;
    padding: 3px;
} 
    
    
    
</style>
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
					<li><a href="aproposdenous.php">À propos de nous</a></li>
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
			<li class="active">Téléchargements / <?php echo $Title ?></li>
		</ol>
		<div class="row">
		<br>
            <div class="col-sm-12">
			
			<div id="myBarDiv2">
			<div class="progress" id="myBarDiv">
		  <div id="myBar" class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
			<span class="sr-only"></span>
		  </div>
		</div>
		</div>
				<?php
					list($Media, $YT) = preg_split('[;]', $Lien);
					?> 
			
				<a target="_blank"  href=<?php echo ($Media) ?>
	               id="download" class="btn btn-action">  
	               <strong><span><i class="fa fa-download"></i> Télécharger le fichier</span></strong>            	
                </a>
			</div>

		</div>
		
		<br><br><br>
		<div class="row"> 
		<div class="col-sm-12 col-md-12"> 
		<h2>Autre suggestions sur DevHelp</h2></br>
		</div>
		<?php foreach ($results as $res) { ?>
		<div class="col-sm-6 col-md-4"> 
		<div class="thumbnail"> 
		<div class="caption">
		<h3><?php echo $res['Title'] ?></h3> 
		<p><?php echo $res['Description'] ?></p>
		<p ALIGN="CENTER"><a href="telechargement.php?Lien=<?php echo base64_encode($res['Lien']) ?>&Title=<?php echo ($res['Title']) ?>&Sujet=<?php echo ($res['Sujet']) ?>&Type=<?php echo ($res['Type']) ?>"
	                class="btn btn-action"><strong><span><i class="fa fa-download"></i> Télécharger</span></strong></a></p>
		</div> </div> </div> 
		<?php } ?>
		
		
		</div> 
		
		
		
	</div>	<!-- /container -->
<br><br><br><br><br>
	

	
	
	<div id="includedfooter"></div>
	
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script src="Datatable/js/jquery.js"></script>
	<script src="Datatable/js/bootstrap.min.js"></script>
	<script src="Datatable/js/jquery.dataTables.min.js"></script>
	<script src="Datatable/js/dataTables.bootstrap.min.js"></script>
	<script src="Datatable/js/dataTables.select.min.js"></script>
	<script src="Datatable/js/dataTables.editor.min.js"></script>
	    <script>
		
        var downloadButton = document.getElementById("download");
        var counter = 5;
        var newElement = document.createElement("p");
            
        // on modifie son style

        newElement.innerHTML = "Vous pouvez télécharger le fichier en 5 seconds.";
            newElement.setAttribute("class", "btn");
        var id;

        downloadButton.parentNode.replaceChild(newElement, downloadButton);
		
		var elem = document.getElementById("myBar");
		var myBarDiv = document.getElementById("myBarDiv");   
		  var width = 0;
		  
        id = setInterval(function() {
            counter--;
        if(counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
		myBarDiv.style.display = "none";
        } else {
			
			
			var id = setInterval(frame, 10);
		  function frame() {
			if (width >= 100) {
			  clearInterval(id);
			} else {
			  width=100/counter; 
			  elem.style.width =width  + '%'; 
			}
		  }
        newElement.innerHTML = "Vous pouvez télécharger le fichier en " + counter.toString() + "             seconds.";
        }
        }, 1000);
    </script>
</body>
</html>
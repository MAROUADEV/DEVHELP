<?php

require_once 'dbconfig.php';

class USER
{ 

 private $conn;
 
 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 
 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
 public function register($Nom,$Prenom,$Date_naissance,$Email,$NomUtilisateur,$SecteurUtilisateur,$MotDePasse,$Code)
 {
  try
  {       
   // $MotDePasse = ($MotDePasse);
   $stmt = $this->conn->prepare("INSERT INTO utilisateur(Nom,Prenom,Date_naissance,Email,NomUtilisateur,SecteurUtilisateur,MotDePasse,Code) 
                                                VALUES(:Nom, :Prenom,:Date_naissance, :Email, :NomUtilisateur,:SecteurUtilisateur, :MotDePasse, :Code)");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":Date_naissance",$Date_naissance);
   $stmt->bindparam(":Email",$Email);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":SecteurUtilisateur",$SecteurUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":Code",$Code);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login2($Email,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE Email=:Email");
   $stmt->execute(array(":Email"=>$Email));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
                        $_SESSION['Date_naissance'] = $userRow['Date_naissance'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
                        $_SESSION['SecteurUtilisateur'] = $userRow['SecteurUtilisateur'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
      return true;
     }
     else
     {
      header("Location: connexion.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: connexion.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: connexion.php?error3");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login1($NomUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
   $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
                        $_SESSION['Date_naissance'] = $userRow['Date_naissance'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
                        $_SESSION['SecteurUtilisateur'] = $userRow['SecteurUtilisateur'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
      return true;
     }
     else
     {
      header("Location: connexion.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: connexion.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: connexion.php?error2");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }

 
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
  public function is_Admin()
 {
  if(isset($_SESSION['userSession']))
  {
	  if($_SESSION['NomUtilisateur']=="DevHelp.Services")
  {
   return true;
  }
 }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  session_destroy();
						$_SESSION['userSession'] = false;
						$_SESSION['IdUtilisateur']= false;
						$_SESSION['Nom'] = false;
						$_SESSION['Prenom'] = false;
                        $_SESSION['Date_naissance'] = false;
						$_SESSION['Email'] = false;
						$_SESSION['NomUtilisateur'] = false;
                        $_SESSION['SecteurUtilisateur'] = false;
						$_SESSION['MotDePasse'] = false;
						$_SESSION['New'] = false;
 }
    
    public function updateUser($IdUtilisateur,$Nom,$Prenom,$NomUtilisateur,$SecteurUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("update utilisateur set Nom=:Nom,Prenom=:Prenom,NomUtilisateur=:NomUtilisateur,SecteurUtilisateur=:SecteurUtilisateur,MotDePasse=:MotDePasse where IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":SecteurUtilisateur",$SecteurUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 function send_mail($email,$message,$subject)
 {      

// Include and initialize phpmailer class
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'devmaroua@gmail.com';
$mail->Password = 'Sashelpsupport2017';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('maroua.setiya@gmail.com','Captain Job');
$mail->addReplyTo('maroua.setiya@gmail.com','Captain Job');

// Add a recipient
$mail->addAddress($email);
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->send();
// Send email
// if(!$mail->send()){
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
// }else{
    // echo 'Message has been sent';
// }

 } 
}
?>
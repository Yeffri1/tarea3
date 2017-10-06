<?php  
include('conexion.php');
if($_POST)
{
   $informacion = "<?php
	  define('DB_HOST','{$_POST['txtservidor']}');
      define('DB_NAME','{$_POST['txtdb']}');
      define('DB_USER','{$_POST['txtUsuario']}');
      define('DB_PASS','{$_POST['txtPassword']}');?> ";
    file_put_contents("config.php",$informacion);
      $cn = mysqli_connect($_POST['txtservidor'],$_POST['txtUsuario'],$_POST['txtPassword']);
	 if($cn)
	 {
	  $sql = "CREATE DATABASE {$_POST['txtdb']}; \n";
	  
	  $es=mysqli_query($cn,$sql);
	
	  $sql1 = "use {$_POST['txtdb']}; \n";
	  $es1=mysqli_query($cn,$sql1);

	 
	$sql2 = "CREATE TABLE `aportaciones` (
  `Id` int(10) NOT NULL auto_increment,
  `CorreoUser` varchar(50) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `RNC` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Aportacion` int(10) NOT NULL,
  `CantEmpleado` int(10) NOT NULL,
  `Nomeclatura` varchar(1) NOT NULL,
  `Tamano` varchar(50) NOT NULL,
  `Comentario` varchar(100) NOT NULL,
  PRIMARY KEY  (`Id`),
  UNIQUE KEY `Empresa` (`Empresa`,`RNC`),
  KEY `CorreoUser` (`CorreoUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=23 ;"; 
 
   $es2=mysqli_query($cn,$sql2);

   
   echo"<script>window.location='index.php'</script>";
 }
 else{
	 
	  echo"<script>window.location='intalador_error.php'</script>";
	 
 }
	 
   
}

?>
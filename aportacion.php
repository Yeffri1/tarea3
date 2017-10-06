<?php
include('Aportaciones.php');
$Estado = false;
if($_POST){
	
	if($_POST['txtid']=="")
	{
	$aport = new Aportaciones();
	$aport->empresa=$_POST['txtnombre'];
	$aport->rnc=$_POST['txtrnc'];
	$aport->color=$_POST['txtcolor'];
	$aport->aportacion=$_POST['txtaportacion'];
	$aport->nomeclatura=$_POST['chk'];
	$aport->tamano=$_POST['listatamano'];
	$aport->cantidad_empleado=$_POST['txtcant_empleado'];
	$aport->comentario=$_POST['txtcomentario'];
	
	$Estado=$aport->guardar_aportacion();
	}
	else {
	
	$aport = new Aportaciones();
	$aport->empresa=$_POST['txtnombre'];
	$aport->rnc=$_POST['txtrnc'];
	$aport->color=$_POST['txtcolor'];
	$aport->aportacion=$_POST['txtaportacion'];
	$aport->nomeclatura=$_POST['chk'];
	$aport->tamano=$_POST['listatamano'];
	$aport->cantidad_empleado=$_POST['txtcant_empleado'];
	$aport->comentario=$_POST['txtcomentario'];
	
	$Estado=$aport->actualizar_aporto($_POST['txtid']);
	
	
	  
	}
}
else{
	echo "No Hubo Post";
	
}
?>

<!doctype html>

<html>
<head>
<title>Estado Aportacion</title>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<center>
<h1 class="h1">
<?php


if($Estado==true)
{
  echo "Aportacion Agregada Correctamente";
}
else 
{
  echo "Error Agregando";
}

?>
</h1>
<button class="btn btn-info">
<?php
if($Estado==true)
{
  echo "<a href='inicio.php' class='btn btn-info'>Ir a Panel</a>";
}
else{
echo "<a style='background-color:red;' href='inicio.php'>Intentar de nuevo</a>";
}
?>
</button>
</center>
</body>

</html>
<?php  
include('Aportaciones.php');
$ap = new Aportaciones();
$id_actualizar;
$correo;


if($_GET['idactualizar'])
{
	$id_actualizar = $_GET['idactualizar'];
	
	$data = array();
     $data = $ap->cargar_aportaciones_id($id_actualizar);
}
else if($_GET['ideliminar'])
{
  $id_eliminar = $_GET['ideliminar'];
  $ap->eliminar_aporto($id_eliminar);
}
?>



<!Doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Tarea 3 Programacion Web</title>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.botones{
	margin:20px 20px;
}
.radios{
	margin:12px 12px;
}
.resumen{
	margin:12px 12px;
}
</style>
</head>



<body>

<div class="Contaniner">
<div class="col col-md-12">
<br/><br/><br/><br/>
<form method="post" action="aportacion.php" >

<!--primera fila -->
<div class="row">

<!--primera columna -->
<div class="col col-md-4">
<input type="hidden" name="txtid" value="<?php echo $id_actualizar ?>">
<input type="hidden" name="txtcorreo" value="<?php echo $correo ?>">

<div class="input-group form-group">
<span class="input-group-addon">Nombre:</span>
<input type="text" name="txtnombre" value="<?php echo $data[0]['Empresa'];  ?>" id="nombre" autofocus required placeholder="Escribe tu nombre" class="form-control" alt="Escribir tu nombre" />
</div>


<div class="input-group form-group">
<span class="input-group-addon">RNC:</span>
<input type="text" name="txtrnc" required value="<?php echo $data[0]['RNC'];  ?>" alt="Escribir RNC" placeholder="Escribe RNC" class="form-control" id="rnc" />
</div>

<div class=" input-group form-group">
<span class="input-group-addon">Color:</span>
<input type="text" class="form-control"  id="color_" name="txtcolor" value="<?php echo $data[0]['Color'];  ?>" alt="Ingrese el color" />
</div>

<div class="input-group form-group">
<span class="input-group-addon">Comentario:</span>
<textarea type="textarea" class="form-control"  alt="Escribir Comentario" placeholder="text.." id="comentario" name="txtcomentario" value="<?php echo $data[0]['Comentario']; ?>" ></textarea>
</div>


<div class=" input-group form-group">
<span class="input-group-addon">Aportacion $ :</span>
<input type="number" min=0  class="form-control" id="aparatacion" name="txtaportacion" value="<?php echo $data[0]['Aportacion'];  ?>" placeholder="$" alt="Ingrese el monto de apartacion" />
<div class="input-group-addon">.00</div>
</div>

</div>


<!--Segunda columna -->
<div class="col col-md-5">

<div class="input-group form-group ">
<span class="input-group-addon">Cant.Empleados:</span>
<input type="number" min=0  alt="Ingrese cantidad de empleado" name="txtcant_empleado" value="<?php echo $data[0]['CantEmpleado'];  ?>" id="cantempleado" placeholder="Ingrese cantidad de empleado" />
</div>

<div class="input-group  form-group ">
<label>Nomeclatura:</span>
<label class="radios"><input type="radio" name="chk"  id="txta" alt="A" value="A"/>A</label>
<label class="radios"><input type="radio" name="chk"  id="txtb" alt="B" value="B"/>B</label>
<label class="radios"><input type="radio" name="chk"  id="txtx" alt="X" value="X"/>X</label>
<label class="radios"><input type="radio" name="chk" id="txtz" alt="Z" value="Z"/>Z</label>
</div>


<div class="input group form-group">
<label>Tamaño:</label>
<select name="listatamano">
<option  value="Pequena">Pequeña</option>
<option selected  value="Mediana" >Mediana</option>
<option value="Grande">Grande</option>
</select>

</div>


</div>




</div>
<input type="button" onclick="window.location='index.php';" value="Nuevo" class="btn btn-primary botones" />
<input type="submit" value="Guardar" class="btn btn-success botones">
</form>

<br/>
<table class="table table-bordered">
<thead>

<tr class="active">
<td>Empresa</td>
<td>RNC</td>
<td>Color</td>
<td>Aportacion</td>
<td>Cantidad Empleados</td>
<td>Nomeclatura</td>
<td>Tamaño</td>
<td>Act</td>
</tr>
</thead>

<tbody>
<?php
$datos = $ap->cargar_aportaciones();

 foreach($datos as $aportox){
	
	
	echo "
	<tr>
	<td>{$aportox['Empresa']}</td>
	<td>{$aportox['RNC']}</td>
	<td>{$aportox['Color']}</td>
	<td>{$aportox['Aportacion']}</td>
	<td>{$aportox['CantEmpleado']}</td>
	<td>{$aportox['Nomeclatura']}</td>
	<td>{$aportox['Tamano']}</td>
	
	<td>
	<a class='btn btn-primary' href='index.php?idactualizar={$aportox['Id']}'>Actualizar</a>
	<a class='btn btn-danger' href='index.php?ideliminar={$aportox['Id']}'>Eliminar</a>
	</td>
	</tr>
	";
	
}


?>

</tbody>
</table>
<center><label class="resumen"><caption id="total">Total Recaudado:
<?php
$monto = $ap->total_recaudado();
echo $monto[0]['monto'];
?>
</caption>$</label>
<label class="resumen"><caption id="emp_registrado">Empleados Registrados:
<?php
$cant = $ap->total_emp_registrado();
echo $cant[0]['cant_emp'];
?>
</caption></label>
<label class="resumen"><caption  id="empresa_l">Empresas:
<?php
$cant_empresas = $ap->total_empresa_registrada();
echo $cant_empresas[0]['cant_empresa'];
?>
</caption></label></center>


</div>
</div>


</body>


</html>


<?php
include('conexion.php');

class Aportaciones{

public $id;
public $empresa;
public $rnc;
public $aportacion;
public $color;
public $cantidad_empleado;
public $nomeclatura;
public $tamano;
public $comentario;

function _set($atributo,$valor){
	
	if(isset($this->atributo)){
		
		$this->atributo=$valor;
	}
	else{
	   echo "No existe el atributo {$this->atributo} <br>";	
	}
	
	
}	
function _get($atributo){
	if(isset($this->atributo)){
		
		return $this->atributo;
	}
	else{
		return "N/A";
	}
	
}

function guardar_aportacion()
{
	
	$sql = "INSERT INTO `aportaciones` (`Empresa` ,`RNC` ,`Color` ,`Aportacion`,`CantEmpleado`,`Nomeclatura`,`Tamano`,`Comentario`)VALUES('{$this->empresa}','{$this->rnc}','{$this->color}','{$this->aportacion}','{$this->cantidad_empleado}','{$this->nomeclatura}','{$this->tamano}','{$this->comentario}');";
	$estado = mysqli_query(conexion::obj(),$sql);
	return $estado;
	
	
}
function cargar_aportaciones()
{
	
	
	$sql = "Select Id,Empresa,RNC ,Color,Aportacion,CantEmpleado,Nomeclatura,Tamano From aportaciones;";
	$Datos = array();
	$rs = mysqli_query(conexion::obj(),$sql);
	if($rs)
	{
		while($filas = mysqli_fetch_assoc($rs)){
		  $Datos[] = $filas;
	   }	
	}
	return $Datos;
	
}
function cargar_aportaciones_id($id)
{
	$sql = "Select Id,Empresa,RNC ,Color,Aportacion,CantEmpleado,Nomeclatura,Tamano From aportaciones where Id='{$id}'";
	$Datos = array();
	$rs = mysqli_query(conexion::obj(),$sql);
	if($rs)
	{
		while($filas = mysqli_fetch_assoc($rs)){
		  $Datos[] = $filas;
	   }	
	}
	return $Datos;
	
}

function actualizar_aporto($id)
{
	
	$sql = "Update aportaciones set Empresa='{$this->empresa}',RNC='{$this->rnc}' ,Color='{$this->color}',Aportacion='{$this->aportacion}',CantEmpleado='{$this->cantidad_empleado}',Nomeclatura='{$this->nomeclatura}',Tamano='{$this->tamano}' where Id='{$id}';";
	$estado = mysqli_query(conexion::obj(),$sql);
	
	return $estado;
}

function eliminar_aporto($id)
{
	
	$sql = "Delete From aportaciones where Id='{$id}';";
	$estado = mysqli_query(conexion::obj(),$sql);
	
	return $estado;
}
function total_recaudado()
{
   
	$sql = "Select Sum(Aportacion)as monto From aportaciones;";
	$Datos = array();
	$rs = mysqli_query(conexion::obj(),$sql);
	if($rs)
	{
		while($filas = mysqli_fetch_assoc($rs)){
		  $Datos[] = $filas;
	   }	
	}
	return $Datos;
}
function total_emp_registrado()
{
	$sql = "Select Sum(CantEmpleado)as cant_emp From aportaciones;";
	$Datos = array();
	$rs = mysqli_query(conexion::obj(),$sql);
	if($rs)
	{
		while($filas = mysqli_fetch_assoc($rs)){
		  $Datos[] = $filas;
	   }	
	}
	return $Datos;
}
function total_empresa_registrada()
{
	
	$sql = "Select Count(Empresa)as cant_empresa From aportaciones;";
	$Datos = array();
	$rs = mysqli_query(conexion::obj(),$sql);
	if($rs)
	{
		while($filas = mysqli_fetch_assoc($rs)){
		  $Datos[] = $filas;
	   }	
	}
	return $Datos;
}
	
}



?>
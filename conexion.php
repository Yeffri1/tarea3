<?php
include('config.php');
class conexion{
	
	public $instancia = null;
	
	function __construct()
	{
		
			$this->instancia = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if($this->instancia==false)
			{
				echo "<script>window.location='intalador.php'</script>";
				exit();
			}
		
	}
	static $obj_con=null;
	
	static function obj()
	{
		if(self::$obj_con==null)
		{
			self::$obj_con = new conexion();
		}
		return self::$obj_con->instancia;
	}
	
	function __destruct()
	{
		mysqli_close($this->instancia);
	}
	
	
	
	
}
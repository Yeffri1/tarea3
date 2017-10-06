<!doctype html>

<html>

<head>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


<div class="Contaniner">
<div class="col col-md-6">
<form method="post" action="proceso_intalador.php" >

<div class="row">

<h2>Instalador de Servidor</h2>

<div class="input-group form-group">
<span class="input-group-addon">Servidor:</span>
<input type="text" name="txtservidor" autofocus required placeholder="Escribe tu Servidor" class="form-control" alt="Escribir tu Servidor" />
</div>

<div class="input-group form-group">
<span class="input-group-addon">Usuario:</span>
<input type="text" name="txtUsuario"  required placeholder="Escribe tu Usuario" class="form-control" alt="Escribir tu Usuario" />
</div>

<div class="input-group form-group">
<span class="input-group-addon">Password:</span>
<input type="text" name="txtPassword" value="<?php echo ""; ?>"   placeholder="Escribe tu Password" class="form-control" alt="Escribir tu Password" />
</div>

<div class="input-group form-group">
<span class="input-group-addon">Base de datos:</span>
<input type="text" name="txtdb"  required placeholder="Escribe tu Base de datos" class="form-control" alt="Escribir tu Base de datos" />
</div>

</div>

<input type="submit" value="Intalar" class="btn btn-primary">

</form>
</div>
</div>



</body>



</html>
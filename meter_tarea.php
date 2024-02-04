<!DOCTYPE html>
<html>
<head>
<title>crear tarea</title>
<link href="1.css" type="text/css" rel="stylesheet"></link>
</head>
<body>
<?php

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["titulo"])){
		
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$completada = $_POST["completada"];
$fecha_creacion = $_POST["fecha_creacion"];
$fecha_limite = $_POST["fecha_limite"];

try{
$conesion = new PDO ('mysql:host=127.0.0.1;dbname=tareas','root','');
$caracteres = $conesion->query("SET NAMES 'utf8'");
$insercion = $conesion->query("INSERT INTO tarea (titulo, descripcion, completada, fecha_creacion, fecha_limite) VALUES ('$titulo','$descripcion','$completada', '$fecha_creacion', '$fecha_limite')");

$insercion = null;
$conesion = null;

}
catch(PDOEXception){
echo "emosido enganao";
die();
}

?>

<form>
<input type="button" value="crear otra tarea" onClick="location.href='meter_tarea.php'">
<br>
<br>
<br>
<br>
<a href="menu.php">volver a menu homemenu</a>
</form>

<?php
}
else{
?>


<form action = "meter_tarea.php" method = "post" >
<input type="text" name="titulo" placeholder="titulo tarea" required><br>
<input type="text" name="descripcion" placeholder="descripcion" required><br>
<input type="date" name="fecha_creacion" placeholder="fecha_creacion" required><br>
<input type="date" name="fecha_limite" placeholder="fecha_limite" required><br>
<select name="completada" required>
<option selected>tarea terminada</option>
<option value="si">SI</option>
<option value="no">NO</option>
</select>
<br>
<br>
<input type="submit" value="enviar">
</form>

<br>
<br>
<br>
<a href="menu.php">volver a menu homemenu</a>

<?php
}
?>

</body>
</html>
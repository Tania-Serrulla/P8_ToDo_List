<!DOCTYPE html>
<html>
<head>
<title>editar tarea</title>
<link href="1.css" type="text/css" rel="stylesheet"></link>
</head>
<body>
<?php

$conesion = mysqli_connect('127.0.0.1', 'root', '', 'tareas');
$tabla ="SELECT * FROM tarea";
$resultao= mysqli_query($conesion,$tabla);

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["selecsionar_tarea"])){
		
$tarea = $_POST["selecsionar_tarea"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];

if (($titulo === null || trim($titulo) === '')) {
	foreach( $resultao as $result){ 
		if ($result['id'] == $tarea) {
			$titulo = $result['titulo'];
		}
	}
}

if (($descripcion === null || trim($descripcion) === '')) {
	foreach( $resultao as $result){ 
		if ($result['id'] == $tarea) {
			$descripcion = $result['descripcion'];
		}
	}
}

try{
$conesion = new PDO ('mysql:host=127.0.0.1;dbname=tareas','root','');
$caracteres = $conesion->query("SET NAMES 'utf8'");
$insercion = $conesion->query("UPDATE tarea SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $tarea;");

$insercion = null;
$conesion = null;

}
catch(PDOEXception){
echo "emosido enganao";
die();
}

?>
<form>
<input type="button" value="editar otra tarea" onClick="location.href='editar_tarea.php'">
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

<form action = "editar_tarea.php" method = "post" >
<select name="selecsionar_tarea">
<option selected>tarea</option>
<?php foreach( $resultao as $tarea){
	echo "<option value='" . $tarea['id'] . "'>" . $tarea['titulo'] . "</option>";
}
?> 
</select><br>
<br>
<input type="text" name="titulo" placeholder="titulo nuevo"><br>
<input type="text" name="descripcion" placeholder="descripcion nueva"><br>
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
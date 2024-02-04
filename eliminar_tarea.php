<!DOCTYPE html>
<html>
<head>
<title>eliminar tarea</title>
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

try{
$conesion = new PDO ('mysql:host=127.0.0.1;dbname=tareas','root','');
$caracteres = $conesion->query("SET NAMES 'utf8'");
$eliminasion = $conesion->query("DELETE FROM tarea WHERE id = $tarea;");

$eliminasion = null;
$conesion = null;

}
catch(PDOEXception){
echo "emosido enganao";
die();
}

?>
<form>
<input type="button" value="eliminar otra tarea" onClick="location.href='eliminar_tarea.php'">
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

<form action = "eliminar_tarea.php" method = "post" >
<select name="selecsionar_tarea">
<option selected>tarea</option>
<?php foreach( $resultao as $tarea){
	
	echo "<option value='" . $tarea['id'] . "'>" . $tarea['titulo'] . "</option>";
}
?>
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
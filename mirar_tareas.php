<!doctype html>
<html>
<head>
<title>mirar tareas</title>
<link href="1.css" type="text/css" rel="stylesheet"></link>
</head>
<body>
<a href="menu.php">volver a menu homemenu</a>
<div>
<table>
<tr>
<caption>tareas
<hr>
<br>
</caption>
</tr>
<tr>
    <th>Titulo</th>
    <th>Descripcion</th>
    <th>Completada</a></th>
    <th>Fecha_Creacion</a></th>
    <th>Fecha_Limite</a></th>
</tr>

<?php
$conesion = mysqli_connect('127.0.0.1', 'root', '', 'tareas');
if(array_key_exists('OrdenarCom', $_POST)) { 
    $tabla ="SELECT * from tarea ORDER BY completada ASC"; 
} 
else if(array_key_exists('OrdenarFC', $_POST)) { 
    $tabla ="SELECT * from tarea ORDER BY fecha_creacion ASC";
} 
else if(array_key_exists('OrdenarFL', $_POST)) { 
    $tabla ="SELECT * from tarea ORDER BY fecha_limite ASC"; 
} 
else if(array_key_exists('FiltrarEstadoCom', $_POST)) {
    if ($_POST['FiltroEstadoCom'] == 'si'){
        $tabla ="SELECT * from tarea WHERE completada = 'si'"; 
    } 
} 
else if(array_key_exists('FiltrarEstadoPen', $_POST)) {
    if ($_POST['FiltroEstadoPen'] == 'si'){
        $tabla ="SELECT * from tarea WHERE completada = 'no'"; 
    } 
}
else {
    $tabla ="SELECT * from tarea";
}

$resultao= mysqli_query($conesion,$tabla);
while($datos=mysqli_fetch_array($resultao)){
?>
<tr>
<td class="titulo"><?php echo $datos['titulo']; ?></td>
<td><?php echo $datos['descripcion']; ?></td>
<td class="completada"><?php echo $datos['completada']; echo" esta completada"; ?></td>
<td class="fecha_creacion"><?php echo $datos['fecha_creacion']; ?></td>
<td class="fecha_limite"><?php echo $datos['fecha_limite']; ?></td>
</tr>
<tr>
<?php
}
?>
</table>
</div>
<form action = "mirar_tareas.php" method="post"> 
        <br>
        <input type="submit" name="OrdenarCom"
                class="button" value="OrdenarCom" />           
        <input type="submit" name="OrdenarFC"
                class="button" value="OrdenarFC" /> 
        <input type="submit" name="OrdenarFL"
        class="button" value="OrdenarFL" /> 
        <br>
        <br>
        <label>Completadas</label>
        <input type="checkbox" name="FiltroEstadoCom" value="si">
        <input type="submit" name="FiltrarEstadoCom"
        class="button" value="FiltrarEstadoCom" /> 
        <br>
        <br>
        <label>Pendientes</label>
        <input type="checkbox" name="FiltroEstadoPen" value="si">
        <input type="submit" name="FiltrarEstadoPen"
        class="button" value="FiltrarEstadoPen" /> 
    </form> 
</body>
</html>


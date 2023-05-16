<?php
    include("conexion.php");

    $con = conectar();

    $Nombre = $_POST['Empleado'];
    $Dia = $_POST['Dia'];
    $HoraInicio = $_POST['Hora-i'];
    $HoraFinal = $_POST['Hora-f'];
	$Local = $_POST['Local'];

    $consulta = "INSERT INTO turnos(nombre,dia,hora_inicio,hora_fin,local) 
    VALUES ('$Nombre',' $Dia',' $HoraInicio',' $HoraFinal','$Local')";

    $resul = mysqli_query($con,$consulta);

    header('Location: turnosp.php');
?>
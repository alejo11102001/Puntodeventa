<?php
    include("conexion.php");

    $con = conectar();

    $Nombre = $_POST['Nombre'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];

    $consulta = "INSERT INTO locales(nombre,direccion,telefono) 
    VALUES ('$Nombre',' $Direccion',' $Telefono')";

    $resul = mysqli_query($con,$consulta);

    header('Location: locales.html');
?>
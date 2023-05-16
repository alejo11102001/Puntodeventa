<?php

    include("conexion.php");

    $con = conectar();

    $Nombre = $_POST['Nombre'];
    $Telefono = $_POST['Telefono'];
    $Email = $_POST['Email'];
    $Direccion=$_POST['Direccion'];
    $idUs=$_POST['idUs'];

    $consulta = "INSERT INTO proveedores(Nombre,Telefono,Email,Direccion)
    VALUES ('$Nombre','$Telefono','$Email','$Direccion')";
    $resul = mysqli_query($con,$consulta);
    $consulta1 = "SELECT User FROM registro WHERE ID='$idUs'";
    $result1 = mysqli_query($con,$consulta1);
    $User = mysqli_fetch_assoc($result1)['User'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$idUs'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];
    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Agregar nuevo producto','$idUs','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);

    mysqli_close($con);

    header("Location: agregarproveedor.php?idUs=".$idUs);
    die();
?>
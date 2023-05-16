<?php

    include("conexion.php");

    $con = conectar();

    $IDVendedor = $_POST['idUs'];
    $Nombre = $_POST['NombreCliente'];
    $Direccion = $_POST['DireccionCliente'];
    $Celular = $_POST['CelularCliente'];
    $Correo = $_POST['CorreoCliente'];
    $CostoProducto= $_POST['CostoProducto'];
    $Cantidad = $_POST['CantidadProducto'];
    $ValorTotal = $_POST['Total'];
    $Local = $_POST['Local'];

    $consulta = "SELECT IDProducto FROM productos WHERE Costo='$CostoProducto'";
    $result = mysqli_query($con,$consulta);
    $IDProducto = mysqli_fetch_assoc($result)['IDProducto'];
    $consulta1 = "SELECT Rol FROM registro WHERE ID='$IDVendedor'";
    $result1 = mysqli_query($con,$consulta1);
    $Rol = mysqli_fetch_assoc($result1)['Rol'];

    $consulta2 = "SELECT CantidadDisponible FROM productos WHERE IDProducto='$IDProducto'";
    $result2 = mysqli_query($con,$consulta2);
    $CantidadDisponible = mysqli_fetch_assoc($result2)['CantidadDisponible'];
    $CantidadActualizada = $CantidadDisponible - $Cantidad;
    echo $IDProducto;
    echo $CantidadActualizada;

    $consulta3 = "INSERT INTO ventas(Nombre,Direccion,Celular,Correo,FechaHora,IDVendedor,IDProductosVendidos,ValorTotal,Cantidad,Local) 
    VALUES ('$Nombre','$Direccion','$Celular','$Correo',NOW(),'$IDVendedor','$IDProducto','$ValorTotal','$Cantidad','$Local')";
    $result3 = mysqli_query($con,$consulta3);
    echo $result3;

    $consulta4 = "UPDATE productos SET CantidadDisponible='$CantidadActualizada' WHERE IDProducto='$IDProducto'";
    $result4 = mysqli_query($con,$consulta4);
    echo $result4;

    $consulta5 = "SELECT User FROM registro WHERE ID='$IDVendedor'";
    $result5 = mysqli_query($con,$consulta5);
    $User = mysqli_fetch_assoc($result5)['User'];

    $consulta6 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Agregar venta','$IDVendedor','$User','$Rol')";
    $result6 = mysqli_query($con,$consulta6);

    header('Location: operadorventas.php?idUs='.$IDVendedor);
?>
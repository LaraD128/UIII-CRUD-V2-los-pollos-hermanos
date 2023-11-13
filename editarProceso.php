<?php
    print_r($_POST);
    if(!isset($_POST['idcliente'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idcliente = $_POST['idcliente'];
    $nombre = $_POST["txtNombre"];
    $apellidop = $_POST["txtApellidoP"];
    $apellidom = $_POST["txtApellidoM"];
    $nombreusuario = $_POST["txtNombreU"];
    $contra = $_POST["txtContra"];
    $confirmcontra = $_POST["txtConfirmContra"];
    $tarjeta = $_POST["txtTarjeta"];

    $sentencia = $bd->prepare("UPDATE clientes SET nombre = ?, apellidop = ?, apellidom = ?, nombreusuario = ?, contra = ?, confirmcontra = ?, tarjeta = ? where idcliente = ?;");
    $resultado = $sentencia->execute([$nombre, $apellidop, $apellidom, $nombreusuario, $contra, $confirmcontra, $tarjeta, $idcliente]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
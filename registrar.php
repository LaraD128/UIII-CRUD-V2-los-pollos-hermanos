<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellidoP"]) || empty($_POST["txtApellidoM"]) || empty($_POST["txtNombreU"]) || empty($_POST["txtContra"]) || empty($_POST["txtConfirmContra"]) || empty($_POST["txtTarjeta"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellidop = $_POST["txtApellidoP"];
    $apellidom = $_POST["txtApellidoM"];
    $nombreusuario = $_POST["txtNombreU"];
    $contra = $_POST["txtContra"];
    $confirmcontra = $_POST["txtConfirmContra"];
    $tarjeta = $_POST["txtTarjeta"];
    
    $sentencia = $bd->prepare("INSERT INTO clientes(nombre,apellidop,apellidom,nombreusuario,contra,confirmcontra,tarjeta) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellidop,$apellidom,$nombreusuario,$contra,$confirmcontra,$tarjeta]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
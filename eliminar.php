<?php 
    if(!isset($_GET['idcliente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $idcliente = $_GET['idcliente'];

    $sentencia = $bd->prepare("DELETE FROM clientes where idcliente = ?;");
    $resultado = $sentencia->execute([$idcliente]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>
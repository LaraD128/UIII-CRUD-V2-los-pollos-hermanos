<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idcliente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idcliente = $_GET['idcliente'];

    $sentencia = $bd->prepare("select * from clientes where idcliente = ?;");
    $sentencia->execute([$idcliente]);
    $clientes = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($clientes);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido paterno: </label>
                        <input type="text" class="form-control" name="txtApellidoP" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido materno: </label>
                        <input type="text" class="form-control" name="txtApellidoM" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Usuario: </label>
                        <input type="text" class="form-control" name="txtNombreU" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="text" class="form-control" name="txtContra" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña: </label>
                        <input type="text" class="form-control" name="txtConfirmContra" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tarjeta: </label>
                        <input type="text" class="form-control" name="txtTarjeta" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idcliente" value="<?php echo $clientes->idcliente; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
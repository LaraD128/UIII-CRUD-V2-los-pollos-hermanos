<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from clientes");
    $clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido paterno</th>
                                <th scope="col">Apellido materno</th>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Confirmacion de contraseña</th>
                                <th scope="col">Tarjeta</th>

                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($clientes as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->idcliente; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->apellidop; ?></td>
                                <td><?php echo $dato->apellidom; ?></td>
                                <td><?php echo $dato->nombreusuario; ?></td>
                                <td><?php echo $dato->contra; ?></td>
                                <td><?php echo $dato->confirmcontra; ?></td>
                                <td><?php echo $dato->tarjeta; ?></td>
                                    
                                <td><a class="text-success" href="editar.php?idcliente=<?php echo $dato->idcliente; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?idcliente=<?php echo $dato->idcliente; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
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
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
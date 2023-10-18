<?php include '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

// validar que sea un id válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('location: /admin');
}

// obtener el arreglo del vendedor
$vendedor = Vendedor::find($id);

// Arreglo con mensajes de errores 
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // asignar los valores
    $args = $_POST['vendedor'];

    // sincronizar objeto en memoria con lo que el usuario escribió
    $vendedor->sincronizar($args);

    // validacion
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }
}
incluirTemplate('header'); ?>

<h1 class="fw-300 centrar-texto">Administración - Actualizar Vendedor</h1>

<main class="contenedor seccion contenido-centrado">
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/formulario_vendedores.php'; ?>
        <input type="submit" value="Guardar cambios" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer');
mysqli_close($db); ?>
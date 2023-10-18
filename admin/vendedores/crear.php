<?php include '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de errores 
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar que no haya campos vacios
    $errores = $vendedor->validar();

    // No hay errores
    if (empty($errores)) {
        $vendedor->guardar();
    }
}
incluirTemplate('header'); ?>

<h1 class="fw-300 centrar-texto">Administración - Nuevo Vendedor</h1>

<main class="contenedor seccion contenido-centrado">
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data" action="/admin/vendedores/crear.php">
        <?php include '../../includes/formulario_vendedores.php'; ?>
        <input type="submit" value="Registrar vendedor" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer');
mysqli_close($db); ?>
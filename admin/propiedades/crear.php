<?php include '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

// Proteger esta ruta.
estaAutenticado();

$propiedad = new Propiedad;

// Consulta para obtener los vendedores
$vendedores = Vendedor::all();

// Arreglo con mensajes de errores 
$errores = Propiedad::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Crear una nueva instancia */
    $propiedad = new Propiedad($_POST['propiedad']);

    // Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la imagen
    // Realiza un resize a la imagen con intervention
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validar
    $errores = $propiedad->validar();

    // El array de errores esta vacio
    if (empty($errores)) {
        // Crear la carpeta pa subir imagenes
        if (!is_dir(CARPETAS_IMAGENES)) {
            mkdir(CARPETAS_IMAGENES);
        }

        //  Guardar la imagen en el servidor
        $image->save(CARPETAS_IMAGENES . $nombreImagen);

        // Guardar en la base de datos
        $resultado = $propiedad->guardar();
    }
}
?>
<?php $nombrePagina = 'Crear Propiedad';
incluirTemplate('header'); ?>

<h1 class="fw-300 centrar-texto">Administración - Nueva Propiedad</h1>

<main class="contenedor seccion contenido-centrado">
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer');
mysqli_close($db); ?>
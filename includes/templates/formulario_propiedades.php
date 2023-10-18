<fieldset>
    <legend>Información General</legend>
    <label for="titulo">Titulo:</label>
    <input name="titulo" type="text" id="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio: </label>
    <input name="precio" type="number" id="propiedad[precio]" placeholder="Precio" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen: </label>
    <input name="propiedad[imagen]" type="file" id="imagen">
    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php $propiedad->imagen ?>" alt="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>

</fieldset>


<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input name="habitaciones" type="number" min="1" max="10" step="1" id="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input name="wc" type="number" min="1" max="10" step="1" id="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input name="estacionamiento" type="number" min="1" max="10" step="1" id="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option value="" selected disabled>-- Seleccionar Vendedor --</option>
        <?php foreach($vendedores as $vendedor): ?>
            <option
            <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
            value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>
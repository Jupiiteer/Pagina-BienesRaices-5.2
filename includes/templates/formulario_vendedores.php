<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre:</label>
    <input name="nombre" type="text" id="vendedor[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">
    <label for="apellido">Apellido:</label>
    <input name="apellido" type="text" id="vendedor[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido); ?>">
    <label for="telefono">Teléfono:</label>
    <input name="telefono" type="tel" id="propiedad[telefono]" placeholder="Teléfono Propiedad" value="<?php echo s($propiedad->telefono); ?>">
</fieldset>
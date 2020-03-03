<br>
<a href="../listado" class="btn btn-success">Regresar</a>
<br><br>

<?php echo form_open(''); ?>

<div class="form-group">
    <?php
    echo form_label('Nombre', 'nombre');
    $input = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'value' => $nombre,
        'readonly' => 'readonly',
        'class' => 'form-control input-lg'
    );

    echo form_input($input);
    ?>
</div>

<div class="form-group">
    <?php
    echo form_label('Apellido', 'apellido');
    $input = array(
        'name' => 'apellido',
        'id' => 'apellido',
        'value' => $apellido,
        'readonly' => 'readonly',
        'class' => 'form-control input-lg'
    );

    echo form_input($input);
    ?>
</div>

<div class="form-group">
    <?php
    echo form_label('Edad', 'edad');
    $input = array(
        'type' => 'number',
        'name' => 'edad',
        'id' => 'edad',
        'value' => $edad,
        'readonly' => 'readonly',
        'class' => 'form-control input-lg'
    );

    echo form_input($input);
    ?>
</div>

<?php echo form_close(); ?>
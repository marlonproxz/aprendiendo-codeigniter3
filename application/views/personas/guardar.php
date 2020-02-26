<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            
            <br>
            <a href="<?php echo base_url(); ?>personas/listado" class="btn btn-success">Regresar</a>
            <br><br>
            
            <?php if(validation_errors() != ""): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            
            <?php if($error != ""): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php echo form_open_multipart('');?>

            <div class="form-group">
                <?php

                    echo form_label('Nombre', 'nombre');
                    $input = array(
                        'name'  =>  'nombre',
                        'id'    =>  'nombre',
                        'value' =>  $nombre,
                        'class' =>  'form-control input-lg'
                    );

                    echo form_input($input);
                ?>
            </div>

            <div class="form-group">
                <?php

                    echo form_label('Apellido', 'apellido');
                    $input = array(
                        'name'  =>  'apellido',
                        'id'    =>  'apellido',
                        'value' =>  $apellido,
                        'class' =>  'form-control input-lg'
                    );

                    echo form_input($input);
                ?>
            </div>

            <div class="form-group">
                <?php

                    echo form_label('Edad', 'edad');
                    $input = array(
                        'type'  =>  'number',
                        'name'  =>  'edad',
                        'id'    =>  'edad',
                        'value' =>  $edad,
                        'class' =>  'form-control input-lg'
                    );

                    echo form_input($input);
                ?>
            </div>
            
            <div class="form-group">
                <?php

                    echo form_label('Imagen', 'image');
                    $input = array(
                        'type'  =>  'file',
                        'name'  =>  'image',
                        'id'    =>  'image',
                        'value' =>  '',
                        'class' =>  'form-control input-lg'
                    );

                    echo form_input($input);
                ?>
            </div>
            
            <?php 
                echo form_submit('mysybumit', 'Enviar', "class='btn btn-primary'");
            ?>

            <?php echo form_close(); ?>
            
        </div>
    </body>
</html>

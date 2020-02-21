<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            
            <br>
            <a href="guardar" class="btn btn-success">Guardar</a>
            <br><br>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach ($personas as $key => $p) :?>
                    <tr>
                      <th scope="row"><?php echo $p->persona_id; ?></th>
                      <td><?php echo $p->nombre; ?></td>
                      <td><?php echo $p->apellido; ?></td>
                      <td><?php echo $p->edad; ?></td>
                      <td>
                          <a href="guardar/<?php echo $p->persona_id; ?>">Editar</a><br>
                          <a href="ver/<?php echo $p->persona_id; ?>">Ver</a><br>
                          <a href="borrar/<?php echo $p->persona_id; ?>">Borrar</a>
                      </td>
                    </tr>

                    <?php endforeach;?>

              </tbody>
            </table>
        </div>
    </body>
</html>
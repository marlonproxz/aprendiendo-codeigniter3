<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            .img-small{
                width: 180px;
                display: block;
                border: 1px solid #CCC;
                margin: 4px 0;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php echo $view; ?>
        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.toaster"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>
            var id;
            var link;
            $('#DeletePerson').on('show.bs.modal', function (event) {
                link = $(event.relatedTarget) // Button that triggered the modal
                id = link.data('id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var name = link.data('name')
                // console.log(id)
                var modal = $(this)
                modal.find('.modal-title span').text(name);
            })

            $("#b-borrar").click(function () {
                // console.log("click", id); 
                $.ajax({
                    url: "<?php echo base_url(); ?>personas/borrar_ajax/" + id,
                    context: document.body
                }).done(function (res) {
                    console.log(res);
                    $('#DeletePerson').modal('hide');
                    $(link).parent().parent().remove();
                });
            });
        </script>

        <?php if ($this->session->flashdata('message') != null) : ?>

            <script>
                $.toaster({message: '<?php echo $this->session->flashdata('message'); ?>', title: 'Mensaje'});
            </script>

        <?php endif; ?>
    </body>
</html>
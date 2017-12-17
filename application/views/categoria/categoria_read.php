<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Categoria Read</h2>
        <table class="table">
	    <tr><td>Idcategoria</td><td><?php echo $idcategoria; ?></td></tr>
	    <tr><td>Categoria</td><td><?php echo $categoria; ?></td></tr>
	    <tr><td>Descripcion</td><td><?php echo $descripcion; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('categoria') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
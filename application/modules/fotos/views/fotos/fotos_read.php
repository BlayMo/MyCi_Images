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
        <h2 style="margin-top:0px">Fotos Read</h2>
        <table class="table">
	    <tr><td>Idfoto</td><td><?php echo $idfoto; ?></td></tr>
	    <tr><td>Id Categoria</td><td><?php echo $id_categoria; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Fecha Alta</td><td><?php echo $fecha_alta; ?></td></tr>
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Autor</td><td><?php echo $autor; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>Priority</td><td><?php echo $priority; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fotos') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
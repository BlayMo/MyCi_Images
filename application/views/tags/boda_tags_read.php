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
        <h2 style="margin-top:0px">Boda_tags Read</h2>
        <table class="table">
	    <tr><td>Idtag</td><td><?php echo $idtag; ?></td></tr>
	    <tr><td>Id Foto</td><td><?php echo $id_foto; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Tag</td><td><?php echo $tag; ?></td></tr>
	    <tr><td>Descripcion</td><td><?php echo $descripcion; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tags') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
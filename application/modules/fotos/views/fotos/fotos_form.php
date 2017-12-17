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
        <h2 style="margin-top:0px">Fotos <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Idfoto <?php echo form_error('idfoto') ?></label>
            <input type="text" class="form-control" name="idfoto" id="idfoto" placeholder="Idfoto" value="<?php echo $idfoto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Categoria <?php echo form_error('id_categoria') ?></label>
            <input type="text" class="form-control" name="id_categoria" id="id_categoria" placeholder="Id Categoria" value="<?php echo $id_categoria; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fecha Alta <?php echo form_error('fecha_alta') ?></label>
            <input type="text" class="form-control" name="fecha_alta" id="fecha_alta" placeholder="Fecha Alta" value="<?php echo $fecha_alta; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Autor <?php echo form_error('autor') ?></label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Priority <?php echo form_error('priority') ?></label>
            <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="<?php echo $priority; ?>" />
        </div>
	    <input type="hidden" name="id_foto" value="<?php echo $id_foto; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fotos') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
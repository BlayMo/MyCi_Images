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
        <h2 style="margin-top:0px">Categoria <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Idcategoria <?php echo form_error('idcategoria') ?></label>
            <input type="text" class="form-control" name="idcategoria" id="idcategoria" placeholder="Idcategoria" value="<?php echo $idcategoria; ?>" readonly />
        </div>
	    <div class="form-group">
            <label for="varchar">Categoria <?php echo form_error('categoria') ?></label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Descripcion <?php echo form_error('descripcion') ?></label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php echo $descripcion; ?>" />
        </div>
	    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('categoria') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>

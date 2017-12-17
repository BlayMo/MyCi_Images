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
        <h2 style="margin-top:0px">Boda_tags <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Idtag <?php echo form_error('idtag') ?></label>
            <input type="text" class="form-control" name="idtag" id="idtag" placeholder="Idtag" value="<?php echo $idtag; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Foto <?php echo form_error('id_foto') ?></label>
            <input type="text" class="form-control" name="id_foto" id="id_foto" placeholder="Id Foto" value="<?php echo $id_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tag <?php echo form_error('tag') ?></label>
            <input type="text" class="form-control" name="tag" id="tag" placeholder="Tag" value="<?php echo $tag; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Descripcion <?php echo form_error('descripcion') ?></label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php echo $descripcion; ?>" />
        </div>
	    <input type="hidden" name="id_tag" value="<?php echo $id_tag; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tags') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
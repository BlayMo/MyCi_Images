<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Fotos List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('fotos/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Idfoto</th>
		    <th>Id Categoria</th>
		    <th>Foto</th>
		    <th>Fecha Alta</th>
		    <th>Title</th>
		    <th>Autor</th>
		    <th>Url</th>
		    <th>Priority</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($fotos_data as $fotos)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $fotos->idfoto ?></td>
		    <td><?php echo $fotos->id_categoria ?></td>
		    <td><?php echo $fotos->foto ?></td>
		    <td><?php echo $fotos->fecha_alta ?></td>
		    <td><?php echo $fotos->title ?></td>
		    <td><?php echo $fotos->autor ?></td>
		    <td><?php echo $fotos->url ?></td>
		    <td><?php echo $fotos->priority ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('fotos/read/'.$fotos->id_foto),'Read'); 
			echo ' | '; 
			echo anchor(site_url('fotos/update/'.$fotos->id_foto),'Update'); 
			echo ' | '; 
			echo anchor(site_url('fotos/delete/'.$fotos->id_foto),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>

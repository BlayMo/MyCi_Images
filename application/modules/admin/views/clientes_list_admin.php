

<div class="row">
        <table class="table table-bordered table-striped table-responsive" id="mytable">
            <thead>
                <tr>
                    <th>No</th>		   		    
		    <th>Nombre</th>
		    <th>Apellidos</th>		   
		    <th>Mail</th>		    
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($clientes_data as $clientes)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>		    
		    <td><?php echo $clientes->nombre ?></td>
		    <td><?php echo $clientes->apellidos ?></td>		    
		    <td><?php echo $clientes->mail ?></td>		   
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('clientes/read/'.$clientes->id_cliente),'Read'); 
			echo ' | '; 
			echo anchor(site_url('clientes/update/'.$clientes->id_cliente),'Actualiza'); 
			echo ' | '; 
			echo anchor(site_url('clientes/delete/'.$clientes->id_cliente),'Borrar','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
</div>        

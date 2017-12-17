

<!--<div class="container-fluid" style="padding-top: 50px;">-->
	
    <h1>Grupos/Perfiles <small></small>
		<a href="<?php echo site_url('auth/create_group'); ?>" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Create Group</a>
                <!--<br/>-->
                <?php //$this->load->view('menu_boton');?>
        </h1>

	<?php if($message): ?>
	<div class="alert alert-info">
		<?php echo $message; ?>
	</div>
	<?php endif; ?>

	<!--<table class="table table-bordered table-hover">-->
        <table class="table table-bordered table-hover ztable-responsive" id="mytable">     
		<thead>
		<tr>
			<th>Group Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($groups as $group):?>
		<tr>
			<td><?php echo $group->name;?></td>
			<td><?php echo $group->description;?></td>
			<td>
				<div class="pull-right">
				<?php echo anchor("auth/edit_group/".$group->id, '<i class="glyphicon glyphicon-edit"></i> Edit', 'class="btn btn-xs btn-warning"') ;?>
				<?php if(!in_array($group->id, array(1,2))): ?>
				<?php echo anchor("auth/delete_group/".$group->id, '<i class="glyphicon glyphicon-remove"></i> Delete', 'class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure want to delete this?\')"') ;?>
				<?php endif; ?>
				</div>
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>
        <div class="alert alert-info">
		......
	</div>

<!--</div>-->

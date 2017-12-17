<?php $this->load->view('admin/header_admin'); ?>

<div class="container-fluid">
	
	<h1><?php echo lang('deactivate_heading');?></h1>

	<div class="well">
		<?php echo form_open("auth/deactivate/".$user->id, 'class="bs-example form-horizontal"');?>
		<fieldset>
			<legend><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></legend>

			<div class="form-group">
				<div class="col-lg-10">					
					<div class="radio">	
						<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
						<input type="radio" name="confirm" value="yes" checked="checked" />
					</div>
					<div class="radio">	
						<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
						<input type="radio" name="confirm" value="no" />
					</div>
				</div>
			</div>	

			<?php echo form_hidden($csrf); ?>
			<?php echo form_hidden(array('id'=>$user->id)); ?>

			<div class="form-group">
				<label for="input" class="col-lg-2">
					<?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn-primary btn-lg"');?>
				</label>
                                <a href="<?php echo site_url('admin/users');?>"><button type="button" class="btn btn-lg btn-link">Home</button></a>
			</div>

		</fieldset>
		<?php echo form_close();?>
	</div>

</div>
<?php $this->load->view('admin/footer_admin'); ?>

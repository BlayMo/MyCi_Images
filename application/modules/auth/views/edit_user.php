<?php //$this->load->view('admin/admin_main_view'); ?>


<!--<div class="container-fluid">-->
<div class="row">    
<h1><?php echo lang('edit_user_heading');?></h1>
<?php if($message): ?>
    <div class="alert alert-warning">
       <?php echo $message; ?>
    </div>
<?php endif; ?>
<div class="well">
   <?php echo form_open(uri_string(), 'class="bs-example form-horizontal"');?>
   <fieldset>
      <legend><?php echo lang('create_user_subheading');?></legend>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_fname_label', 'first_name');?></label>
         <div class="col-lg-10"> <?php echo form_input($first_name, null, 'class="form-control"');?></div>
      </div>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_lname_label', 'last_name');?></label>
         <div class="col-lg-10"> <?php echo form_input($last_name, null, 'class="form-control"');?></div>
      </div>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_phone_label', 'phone');?></label>
         <div class="col-lg-10"> <?php echo form_input($phone, null, 'class="form-control"');?></div>
      </div>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_company_label', 'company');?></label>
         <div class="col-lg-10"> <?php echo form_input($company, null, 'class="form-control"');?></div>
      </div>
   </fieldset>
   <fieldset>
      <legend><?php echo lang('Fill_user_authentication_data_below')?></legend>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_password_label', 'password');?></label>
         <div class="col-lg-10"> <?php echo form_input($password, null, 'class="form-control"');?></div>
      </div>
      <div class="form-group">
         <label for="input" class="col-lg-2 control-label"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
         <div class="col-lg-10"> <?php echo form_input($password_confirm, null, 'class="form-control"');?></div>
      </div>
      <?php if ($this->ion_auth->is_admin()): ?>
   </fieldset>
   <fieldset>
      <legend><?php echo lang('edit_user_groups_heading');?></legend>
      <div class="form-group">
         <label class="col-lg-2 control-label">Groups</label>
         <div class="col-lg-10">
            <?php foreach ($groups as $group):?>
            <?php
               $gID=$group['id'];
               $checked = null;
               $item = null;
               foreach($currentGroups as $grp) {
                    if ($gID == $grp->id) {
                            $checked= ' checked="checked"';
                            break;
                    }
               }
               ?>
            <div class="checkbox">
               <label>
               <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?> />
               <?php echo $group['name'];?>
               </label>
            </div>
            <?php endforeach?>
         </div>
         <?php endif ?>
         <?php echo form_hidden('id', $user->id);?>
         <?php echo form_hidden($csrf); ?>
         <div class="form-group">
            <label for="input" class="col-lg-2 col-lg-offset-2 control-label"><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn-primary btn-sm"');?>
            <a href="<?php echo site_url('admin/users');?>"><button type="button" class="btn-primary btn-lg btn-link">Home</button></a></label>
         </div>
      </div>
   </fieldset>
   <?php echo form_close();?>
   </div>
</div>
<!--</div>-->
<?php //$this->load->view('footer');


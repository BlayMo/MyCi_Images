<?php

/* * **********************************************************
 * The MIT License
 *
 * Copyright 2017 Blas Monerris Alcaraz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.

  --------------- CodeIgniter -----------------------------------

  @package	CodeIgniter
  @author	EllisLab Dev Team
  @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
  @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
  @license	http://opensource.org/licenses/MIT	MIT License
  @link	https://codeigniter.com
  @since	Version 1.0.0
  @filesource

  --------------------- Mi codigo  -------------------------

  @Proyecto: MyCi_Images
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Desarrollo
  @Comienzo: 07-03-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 5.6 - 7.0.5 + Codeigniter 3.1.4 + Bootsrap 3.3.7 + mPdf + moment + geocoder +faker

  

  Script creado el 09-03-2017, 8:28:05
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<!--<div class="container-fluid">-->
	
	<h1><?php echo lang('index_heading');?> <small><?php //echo lang('index_subheading');?></small>
		<a href="<?php echo site_url('auth/create_user'); ?>" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Create User</a>
	</h1>

	<?php if($message): ?>
	<div class="alert alert-info">
		<?php echo $message; ?>
	</div>
	<?php endif; ?>

	<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th><?php echo lang('index_fname_th');?></th>
			<th><?php echo lang('index_lname_th');?></th>
			<th><?php echo lang('index_email_th');?></th>
			<th><?php echo lang('index_groups_th');?></th>
			<th><?php echo lang('index_status_th');?></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
				<span class="label label-default"><?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?> </span> &nbsp;
				<?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td>
				<div class="pull-right">
				<?php echo anchor("auth/edit_user/".$user->id, '<i class="glyphicon glyphicon-edit"></i> Edit', 'class="btn btn-xs btn-warning"') ;?>
				<?php if($user->id != 1): ?>
				<?php echo anchor("auth/delete_user/".$user->id, '<i class="glyphicon glyphicon-remove"></i> Delete', 'class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure want to delete this?\')"') ;?>
				<?php endif; ?>
				</div>
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>

<!--</div>-->

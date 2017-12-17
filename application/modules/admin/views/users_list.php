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
  @Objeto:   Aprendizaje/Desarrollo
  @Comienzo: 04-01-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.0.5 + Codeigniter 3.1.2 + Bootsrap 3.3.7 + mPdf + moment + geocoder +faker

  

  Script creado el 14-01-2017 0:0:0
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 


<!--<div class="container-fluid">-->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title">Tabla de <?php echo lang('index_heading');?></h3><br/>         
         <div id="infoMessage"><?php echo $message;?></div>
         <div class="alert alert-info" role="alert"></div>
      </div>
       <div class="panel-body">
           <div class="row" style="padding: 5px;">           
           <?php echo anchor(site_url('auth/create_user'), 'Nuevo Usuario', 'class="btn btn-primary pull-right"'); ?>    
           <a href="#menu-toggle" class="btn btn-sm btn-primary  pull-left" id="menu-toggle" style="margin-right: 2px;">Toggle Menu</a>                         
          </div>           
       </div> 
      <div class="panel-body">
         
         <div class="row">
            <div class="table-responsive col-lg-12">
               <table class="table table-bordered" id="mytable">
                   <thead>
                  <tr>
                     <th><?php echo lang('index_fname_th');?></th>                     
                     <th><?php echo lang('index_email_th');?></th>
                     <th><?php echo lang('index_groups_th');?></th>
                     <th><?php echo lang('index_status_th');?></th>
                     <th><?php echo lang('index_action_th');?></th>
                  </tr>
                   </thead>
                   <tbody>
                  <?php foreach ($users as $user):?>
                  <tr>
                     <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>                     
                     <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                     <td>
                        <?php foreach ($user->groups as $group):?>
                        <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                        <?php endforeach?>
                     </td>
                     <td><?php // echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                    
                     <td>
                        <div class="pull-right">
                        <?php echo anchor("auth/edit_user/".$user->id, '<i class="glyphicon glyphicon-edit"></i> Edit', 'class="btn btn-xs btn-warning"') ;?>                        
                        <?php if($user->id != ADMIN): ?>
                        <?php echo anchor("auth/delete_user/".$user->id, '<i class="glyphicon glyphicon-remove"></i> Delete', 'class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure want to delete this?\')"') ;?>                        
                        <?php endif; ?>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach;?>
                   </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
<!--</div>-->


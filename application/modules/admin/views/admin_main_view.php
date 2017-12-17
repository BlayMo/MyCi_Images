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
  @Comienzo: 19-02-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 5.6 - 7.0.5 + Codeigniter 3.1.4 + Bootsrap 3.3.7 + mPdf + moment + geocoder +faker

  

  Script creado el 02-03-2017, 17:51:38
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

$cAssets   = my_url('').'assets/bootstrap/css/';
$cAssetsjs = my_url('').'assets/bootstrap/js/';
$sitio = $this->config->item('sitio_web');
?>


<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="author" content="Blas Monerris Alcaraz">
      <link rel="icon" href="<?php echo base_url('assets') ?><?=base_url()?>favicon.ico">
      <title><?=$sitio?>Admin</title>
      <!-- Bootstrap Core CSS -->
      <link href="<?=$cAssets?>bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->          
      <link href="<?=$cAssets?>simple-sidebar.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
      <link rel="stylesheet" href="<?php echo base_url('assets/datatables/responsive.bootstrap.min.css') ?>"/>      
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <?php if(isset($output)){
         foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
      <?php endforeach; ?>
      <?php foreach($js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
      <?php endforeach;} ?>
   </head>
   <body>
      <div id="wrapper">
         <!-- Sidebar -->
         <div id="sidebar-wrapper">             
            <ul class="sidebar-nav" style="color:white;font-size: 16px;;">
               <li class="sidebar-brand">
                   <a href="<?=site_url('main')?>"><span class="glyphicon glyphicon-home"></span> <?=$sitio?></a>
               </li>
               <li>
                  <a href="<?=site_url('admin')?>">Tablero</a>
               </li>
               <li>
                  <a href="<?=site_url('main/salir')?>">Salir</a>
               </li>
               
               <?php if (($this->ion_auth->is_admin() and $this->session->userdata('user_id') == 1)){/* solo administrador*/?>               
                    <li>
                       <a href="<?=site_url('admin/users')?>">Usuarios</a>
                    </li>
                    <li>
                       <a href="<?=site_url('admin/groups')?>">Grupos</a>
                    </li>                                                                                
               <?php }?> 
                                                                                    
            </ul>
         </div>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <?php $this->load->view('admin/admin_menu_horizontal')?> 
               <?php            
                  if (isset($output)){?>               
               <div>
                  <?php
                     $this->load->view('admin/admin_body');
                     echo $output; ?>
               </div>
               <?php }else{            
                  $this->load->view($cuerpo);            
                  }?>
            </div>
            <!--<hr/>-->
            <div class="footer">
               <?php // $this->load->view('copyright_footer');?>
            </div>
            <!-- /#page-content-wrapper -->
         </div>
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
     
      <!-- Bootstrap Core JavaScript -->  
      <script src="<?php echo base_url('assets/bootstrap/js/jquery-2.2.4.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>      
      <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
//        $(document).ready(function () {
//            $("#mytable").dataTable();
//        });
    </script>
      <!-- Menu Toggle Script -->
      <script>
         $("#menu-toggle").click(function(e) {
             e.preventDefault();
             $("#wrapper").toggleClass("toggled");
         });
      </script>
      <script type="text/javascript">
        $(document).ready(function () {
            $("#mytable").dataTable({                
                "lengthMenu": [ [ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "Todo"] ],
                "responsive": true,
                "searching": true,
                "ordering": true,                
                "processing": true,
                "language": {
                "url": "<?=base_url()?>assets/datatables/spanish.json"
            }
            });              
        });        
    </script>
   </body>
</html>


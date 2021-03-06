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
  @Comienzo: 06-11-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6 + Codeigniter 3.1.6 + otrosoftw

  

  Script creado el 10-11-2017, 20:35:19
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
 <?php $this->load->view('main/main_navbar')?>


<div class="container">
   <!--<div class="container">-->
   <div class="row">
      <div class="col-lg-12 text-center">
         <a href="<?php echo site_url('main') ?>" class="btn btn-danger">Volver</a>
      </div>
       <div zstyle="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
       </div>
   </div>
   <hr/>
   <?php $this->load->view('fotos/formulario_buscar_fotos')?>
   <!--</div>-->
   <!-- Pagination -->
   <?php if($paginado){?>
   <div class="row">
      <div class="col-lg-12 text-left">
         <?php //echo $pagination ?>
      </div>
   </div>
   <?php }?>
   <hr/>
   <!-- Projects Row -->
   <?php
      $start = 0;
      $col = 0;
      $pathfoto = 'files/fotos/resized';
      foreach ($fotos_data as $fotos)
      {
          
      if ($col == 0){ 
      echo '<div class="row">';
      } ?>    
   <div class="col-md-4 col-sm-4 col-md-4 col-lg-4 portfolio-item thumbnail" style="background-image: url(<?= site_url('z_assets/roses-2761630_1920.png')?>)">
      <div class="well">
         <h5>
            <strong><?=$fotos->title.'<br/></strong>Subida el <small>'?><a href="#"><?=str_fecha_es($fotos->fecha_alta).''?></a></small>                    
         </h5>
         <!--<br/>--> 
         <h5>
            <strong>Categoria: </strong> <?=$fotos->categoria.' '?>
         </h5>
         <!--<br/>-->
         <h5>
            <strong>Autor: </strong> <?=$fotos->autor.' '?>
         </h5>
         <br/>
         <a href="<?=site_url('fotos/read/'.$fotos->id_foto)?>">
         <img class="img-responsive image-thumbnail" src="<?=site_url($pathfoto).'/'.$fotos->foto?>" alt="<?=$fotos->foto?>">
         </a>
         <!--<br/>-->
         <p class="text-center"><h5 style="color: red"><?php
         foreach ($tags_data as $tags)
            {
               if ($tags->id_foto == $fotos->id_foto){
                   echo '<small><span class="label label-success">'.$tags->tag.',</span></small> ';
               } 
            }
            ?>
         </h5></p>
         <!--<div class="col-md-4 col-sm-4 col-md-4 col-lg-4">-->
            <?php echo anchor(site_url('fotos/dga/'.$fotos->id_foto), 'Descargar', 'class="btn btn-primary pull-right" style="margin:2px"'); ?> 
            <?php
            if ($this->ion_auth->is_admin()){
                echo anchor(site_url('fotos/update/'.$fotos->id_foto), 'Modificar', 'class="btn btn-danger pull-right" style="margin:2px"');                
            }
            ?>            
         <!--</div>-->
         <br/><br/>
      </div>
   </div>
   <?php ++$col;
      if ($col == 3){ $col = 0;}
      if ($col == 0){  
      echo  '</div>';
      } 
          }
          ?>
   <!-- /.row -->        
   <hr/>
   <!-- Pagination -->
   <?php if($paginado){?>
   <div class="row">
      <div class="col-md-6">
         <h5><span class="label label-info">Total Items : <?php echo $nro_fotos ?></span></h5>
      </div>
      <div class="col-md-6 text-right">
         <?php echo $pagination ?>
      </div>
   </div>
   <?php }?>
   <!--</div>-->       
   <!-- Footer -->
   <footer>
      <div class="row">
         <div class="col-lg-12">
            <p>Copyright &copy; A&amp;P 2017</p>
         </div>
      </div>
      <!-- /.row -->
   </footer>
</div>


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

  

  Script creado el 15-03-2017, 11:23:39
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 



<div class="container-fluid">
   <!--<form>-->
      <?php  echo form_open($action,'class="form-horizontal"')?>
      <div class="row">
         <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
            <div class="form-group">
               <!--<label for="busca_mes">Mes</label>-->
               <select class="form-control" name="busca_autor">
                  <option value="0">Autor</option>
                   <?php foreach ($drop_autor as $value) {                      
                  echo '<option value="'.$value->autor.'">'.$value->autor.'</option>';                    
                  }?>  
               </select>
            </div>
         </div>
         <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
            <div class="form-group">
               <!--<label for="busca_mes">Mes</label>-->
               <select class="form-control" name="busca_cat">
                  <option value="0">Categoria</option>
                  <?php foreach ($drop_cat as $value) {                      
                  echo '<option value="'.$value->id_categoria.'">'.$value->categoria.'</option>';                    
                  }?> 
               </select>
            </div>
         </div>
         <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
            <div class="form-group">               
                <input type="text" class="form-control" name="busca_texto" placeholder="Palabra" value="<?=$busca_texto?>" />
            </div>
         </div>                  
         <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
            <div class="form-group">            
               <button type="submit" class="btn btn-primary form-control" style="margin-left: 5px">Filtrar</button>
            </div>
         </div>
         <!--</div>-->
         <input type="hidden" name="tabla_busca" value="<?=$tabla_bt?>" >   
      </div>   
   </form>       
</div>
<!--<hr>-->
<div class="container-fluid">
<div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <?php foreach ($drop_tag as $value4) {                      
                 
                  echo anchor(site_url('galeria/bttag/'.$value4->id_tag),'<span class="glyphicon glyphicon-heart"></span> '.$value4->tag, 'class="btn-sm btn-info pull-left"'.' style="margin-left: 5px"');
                  
            }?> 
        </div> 
        
    </div>
</div>    
<hr>
<a href="<?=site_url($clear)?>"><button type="button" class="btn  btn-success pull-right" style="margin-left: 5px">Clear</button></a>
<?php echo anchor(site_url('fotos/upfoto'), 'Subir Fotos', 'class="btn btn-danger pull-right"'.' style="margin-left: 5px"'); ?>
<?php echo anchor(site_url('galeria/reord'), 'Reordena', 'class="btn btn-info pull-right"'.' style="margin-left: 5px"'); ?>
<?php
   if ($paginado){
       echo $pagination;    
   }?>      
<!--<hr>-->
<pre><?=$sql?></pre>
<hr>


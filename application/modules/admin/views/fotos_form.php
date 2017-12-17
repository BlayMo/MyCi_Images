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

  

  Script creado el 10-11-2017, 7:51:45
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
$pathfoto = 'files/fotos/resized';
?> 


<h2 style="margin-top:0px">Fotos <?php echo $button ?></h2>
<!--<form>-->
   <?php echo form_open($action); ?>	    
   <div class="form-group">
      <label for="int">Categoria <?php echo form_error('id_categoria') ?></label>
      <input type="text" class="form-control" name="id_categoria" value="<?php echo $categoria; ?>" readonly />
      <label>Seleccione la categoria</label>
      <select class="form-control" name="ncategoria" value="0">
         <option></option>
         <?php foreach ($categoria_data as $value) {
            echo '<option value="'.$value->id_categoria.'">'.$value->categoria.'</option>';
            }?>                   
      </select>
   </div>
   <div class="form-group thumbnail">
      <label for="varchar">Foto <?php echo form_error('foto') ?></label>
      <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" readonly />
      <img class="img-responsive img-rounded" src="<?=site_url($pathfoto).'/'.$foto?>" alt="<?=$foto?>">
   </div>
   <div class="form-group">
      <label for="varchar">Fecha Alta <?php echo form_error('fecha_alta') ?></label>
      <input type="text" class="form-control" name="fecha_alta" id="fecha_alta" placeholder="Fecha Alta" value="<?php echo $fecha_alta; ?>" readonly />
   </div>
   <div class="form-group">
      <label for="varchar">Title <?php echo form_error('title') ?></label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
   </div>
   <div class="form-group">
      <label for="varchar">Autor <?php echo form_error('autor') ?></label>
      <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor; ?>" />
   </div>
   <input type="hidden" name="id_foto" value="<?php echo $id_foto; ?>" /> 
   <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
   <a href="<?php echo site_url('admin/fot') ?>" class="btn btn-default">Cancel</a>
</form>


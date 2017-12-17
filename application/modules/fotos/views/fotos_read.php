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

  

  Script creado el 07-11-2017, 17:17:04
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<div class="row">
        <div class="col-lg-12 text-center">
            <a href="<?php echo site_url('fotos') ?>" class="btn btn-danger">Volver</a>
        </div>
    </div>
<h3 style="margin-top:0px">Foto <small><?php echo $foto; ?></small></h3>
<table class="table table-bordered table-striped table-responsive">
   <tr>
      <td>Title</td>
      <td><?php echo $title; ?></td>
   </tr>
   <tr>
      <td>Autor</td>
      <td><?php echo $autor; ?></td>
   </tr>
   <tr>
      <td>Categoria</td>
      <td><?php echo $categoria; ?></td>
   </tr>
   <tr>
      <td></td>
      <td>
         <img class="img-responsive image-thumbnail img-rounded" src="<?=site_url('files/fotos/resized/'.$foto)?>"/>
      </td>
   </tr>
   <tr>
      <td>Fecha subida</td>
      <td><?php echo str_fecha_es($fecha_alta); ?></td>
   </tr>   
   <tr>
      <td></td>
      <td>
         <a href="<?php echo site_url('fotos') ?>" class="btn btn-danger">Cancel</a>
         <?php echo anchor(site_url('main'), 'Descargar', 'class="btn btn-primary pull-right"'); ?>
      </td>
   </tr>
</table>


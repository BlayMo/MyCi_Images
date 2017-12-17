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
  @Comienzo: 16-07-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.1.6+ Codeigniter 3.1.6

  

  Script creado el 25-07-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<h2 style="margin-top:0px">Subir Fotos </h2>
<?php $this->load->view('fotos/texto_ayuda_formulario');?>
<!--<form>-->
   <?php echo form_open_multipart($action,'  class="z_dropzone"'); ?>
   <!--<div class="container">-->
   <div class="row">
      <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->   
      <div class="form-group">
         <label for="varchar">Title <?php echo form_error('title') ?></label>
         <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
      </div>
      <div class="form-group">
         <label for="varchar">Autor <?php echo form_error('autor') ?></label>
         <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor; ?>" />
      </div>
      <div class="form-group">
         <label>Seleccione la categoria</label>
         <select class="form-control" name="ncategoria" value="0">
            <option></option>
            <?php foreach ($categoria_data as $value) {
               echo '<option value="'.$value->id_categoria.'">'.$value->categoria.'</option>';
               }?>                   
         </select>
      </div>
      <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
         <div class="form-group">
            <!--<label for="varchar">Tag1 </label>-->
            <input type="text" class="form-control" name="tag1" id="tag" placeholder="Etiqueta" value="<?php echo $tag1; ?>" />
         </div>
      </div>
      <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
         <div class="form-group">
            <!--<label for="varchar">Tag2 </label>-->
            <input type="text" class="form-control" name="tag2" id="tag" placeholder="Etiqueta" value="<?php echo $tag2; ?>" />
         </div>
      </div>
      <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
         <div class="form-group">
            <!--<label for="varchar">Tag3</label>-->
            <input type="text" class="form-control" name="tag3" id="tag" placeholder="Etiqueta" value="<?php echo $tag3; ?>" />
         </div>
      </div>
      <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
         <div class="form-group">
            <!--<label for="varchar">Tag4 </label>-->
            <input type="text" class="form-control" name="tag4" id="tag" placeholder="Etiqueta" value="<?php echo $tag4; ?>" />
         </div>
      </div>
      <div class="form-group">
         <!--<input type="file"  name="files" multiple/>-->   
         <input type="file"  name="files[]" accept="image/*" multiple="multiple" required/>
      </div>
      <input type="hidden" name="id_foto" value="<?php echo $id_foto; ?>" /> 
      <button type="submit" id="upload" class="btn  btn-primary "><span class="glyphicon glyphicon-cloud-upload"></span>  Subir</button>
      <a href="<?php echo site_url('galeria') ?>" class="btn btn-default">Cancel</a>
   </div>
   <!--</div>-->
</form>


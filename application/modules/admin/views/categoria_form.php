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

  

  Script creado el 20-07-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        
<h2 style="margin-top:0px">Categoria <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Idcategoria <?php echo form_error('idcategoria') ?></label>
            <input type="text" class="form-control" name="idcategoria" id="idcategoria" placeholder="Idcategoria" value="<?php echo $idcategoria; ?>" readonly />
        </div>
	    <div class="form-group">
            <label for="varchar">Categoria <?php echo form_error('categoria') ?></label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Descripcion <?php echo form_error('descripcion') ?></label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php echo $descripcion; ?>" />
        </div>
	    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('categoria') ?>" class="btn btn-default">Cancel</a>
	</form>
    

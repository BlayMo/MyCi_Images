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
?> 

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Fotos List</h2>
                <a href="#menu-toggle" class="btn btn-sm btn-primary  pull-left" id="menu-toggle" style="margin-right: 2px;">Toggle Menu</a>                         
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">                
                <?php //echo anchor(site_url('fotos/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-responsive table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>		    
		    <th>Categoria</th>
		    <th>Foto</th>
		    <th>Fecha</th>
		    <th>Title</th>
		    <th>Autor</th>		    
		    <th>Priority</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($fotos_data as $fotos)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>		    
		    <td><?php echo $fotos->id_categoria.' |'.$fotos->categoria ?></td>
		    <td><?php echo $fotos->foto ?></td>
		    <td><?php echo $fotos->fecha_alta ?></td>
		    <td><?php echo $fotos->title ?></td>
		    <td><?php echo $fotos->autor ?></td>		    
		    <td><?php echo $fotos->priority ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('fotos/read/'.$fotos->id_foto),'Read'); 
			echo ' | '; 
			echo anchor(site_url('fotos/update/'.$fotos->id_foto),'Update'); 
			echo ' | '; 
			echo anchor(site_url('fotos/delete/'.$fotos->id_foto.'/'.TRUE),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        

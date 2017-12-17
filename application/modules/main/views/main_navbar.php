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

  

  Script creado el 19-07-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
$movil = $this->movil->isMobile();
?> 


<nav class="navbar navbar-inverse navbar-fixed-top" style="color:white;font-size: 120%;">
   <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
          <a class="navbar-brand" href="<?=site_url('main')?>"><span class="glyphicon glyphicon-home"></span></a>          
      </div>
      <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
            <li class="active"><a href="<?=site_url('main')?>">Portada</a></li>            
            <?php if ($this->ion_auth->logged_in()){?>  
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo 'Las fotos'?> <span class="caret"></span></a>
               <ul class="dropdown-menu">                                    
                  <li><a href="<?=site_url('galeria')?>">Galeria de fotos</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>                                                      
                  <?php if (!$movil){?>  
                    <li><a href="<?=site_url('fotos/lista')?>">Lista de imagenes</a></li>
                  <?php }?>
                  <!--<li><a href="#">One more separated link</a></li>-->
               </ul>
            </li>
             <?php }?>
         </ul>
         <ul class="nav navbar-nav pull-right">             
            <?php if ($this->ion_auth->logged_in()){?>  
            <li><a href="<?=site_url('main/salir')?>">Salir</a></li>
            <?php }?>
            <li><a href="<?=site_url('main/contact')?>">WebMaster</a></li>
            <?php if ($this->ion_auth->is_admin()){?>                        
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
               <ul class="dropdown-menu"> 
                  <li><a href="<?=site_url('admin')?>">Admin</a></li>                  
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>                                    
                  <li><a href="<?=site_url('main')?>">Opcion</a></li>
                  <!--<li><a href="#">One more separated link</a></li>-->
               </ul>
            </li>
            <?php }?>
         </ul>
      </div>
   </div>
</nav>


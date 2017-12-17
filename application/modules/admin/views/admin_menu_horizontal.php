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
defined('BASEPATH') OR exit('No direct script access allowed');?>


      <style>
         #custom-bootstrap-menu.navbar-default .navbar-brand {
         color: rgba(23, 15, 115, 1);
         }
         #custom-bootstrap-menu.navbar-default {
         font-size: 16px;
         background-color: rgba(13, 99, 10, 1);
         border-width: 1px;
         border-radius: 7px;
         }
         #custom-bootstrap-menu.navbar-default .navbar-nav>li>a {
         color: rgba(237, 228, 228, 1);
         background-color: rgba(248, 248, 248, 0);
         }
         #custom-bootstrap-menu.navbar-default .navbar-nav>li>a:hover,
         #custom-bootstrap-menu.navbar-default .navbar-nav>li>a:focus {
         color: rgba(51, 51, 51, 1);
         background-color: rgba(248, 248, 248, 0);
         }
         #custom-bootstrap-menu.navbar-default .navbar-nav>.active>a,
         #custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:hover,
         #custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:focus {
         color: rgba(85, 85, 85, 1);
         background-color: rgba(231, 231, 231, 1);
         }
         #custom-bootstrap-menu.navbar-default .navbar-toggle {
         border-color: #ddd;
         }
         #custom-bootstrap-menu.navbar-default .navbar-toggle:hover,
         #custom-bootstrap-menu.navbar-default .navbar-toggle:focus {
         background-color: #ddd;
         }
         #custom-bootstrap-menu.navbar-default .navbar-toggle .icon-bar {
         background-color: #888;
         }
         #custom-bootstrap-menu.navbar-default .navbar-toggle:hover .icon-bar,
         #custom-bootstrap-menu.navbar-default .navbar-toggle:focus .icon-bar {
         background-color: #0d630a;
         }
      </style>
  
      <!-- Fixed navbar -->
      <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation">
         <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href=""></a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse navbar-menubuilder">
               <ul class="nav navbar-nav navbar-left">                
                    <li>
                       <a href="<?=site_url('admin/cat')?>">Categorias</a>
                    </li>
                    <li>
                       <a href="<?=site_url('admin/fot')?>">Fotos</a>
                    </li>
                    <li>
                       <a href="<?=site_url('admin/tags')?>">Etiquetas</a>
                    </li>
               </ul>
            </div>
         </div>
      </div>
      

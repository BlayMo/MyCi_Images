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

  

  Script creado el 16-07-2017
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
$cAssets = my_url('').'assets/bootstrap/css/';
$cFoto = my_url('files/fotos/resized/');
?> 

 <?php $this->load->view('main/main_header')?>
   <body>
      <!-- Fixed navbar -->
      <?php $this->load->view('main/main_navbar')?>
      <div class="container">
      <?php $this->load->view('texto_cabecera_inicio')?>    
         <!-- Page Content -->
         <!--<div class="container">-->
         <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
               <!-- Blog Post -->
               <?php foreach ($blog_data as $blog){
                  if ($blog->posicion == 'PORTADA'){                    
                  ?>
               <!-- Title -->
               <h1><?php echo $blog->titulo ?></h1>
               <!-- Author -->
               <p class="lead">
                  by <a href="#"><?php echo $blog->first_name ?></a>
               </p>
               <!--<hr>-->
               <!-- Date/Time -->
               <p><span class="label label-success pull-right">
                       <span class="glyphicon glyphicon-time"></span> Publicado el <?=date('d-m-Y', strtotime($blog->fecha))?></span>
               </p>
               <br/>
               <!--<hr>-->
               <!-- Preview Image -->
               <img class="img-responsive img-rounded" src="<?php echo site_url('files/blog/').$blog->imagen ?>" alt="<?php echo $blog->imagen ?>">
<!--               <hr>-->
               <!-- Post Content -->
               <article class="text-justify">
                  <p class="lead">Lorem ipsum dolor sit amet</p>
                  <?php echo clean_html($blog->texto) ?>
               </article>
               <div class="text-right">
               <a href="<?=site_url('blog/coment/'.$blog->id_blog)?>" class="btn  btn-primary "><span class="glyphicon glyphicon-hand-right"></span>  Ver mas</a>  
               </div>
               <hr>
               <?php } } ?>
               <!-- Blog Comments -->
               <!--<hr>-->
               <!-- Posted Comments -->
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
               <!-- Blog Search Well -->
                <div class="well-sm">                      
                    <img class="img-circle" height="40" src="<?=my_url('assets/')?>Spain-256.png" alt="www.AceiteOjosVerdes.com">    
                </div>          
                <hr>
               <div class="well">
                  <h4>Buscar</h4>
                  <div class="input-group">
                     <input type="text" class="form-control">
                     <span class="input-group-btn">
                     <button class="btn btn-default" type="button">
                     <span class="glyphicon glyphicon-search"></span>
                     </button>
                     </span>
                  </div>
                  <!-- /.input-group -->
               </div>
               <!-- Blog Categories Well -->
               <div class="well">
                  <h4>Ultimos Posts</h4>
                   <?php $this->load->view('main_widget_posts')?>
               </div>
               <!-- Side Widget Well -->
               <div class="well">
                  <h4>Los mas votados</h4>
                  <?php $this->load->view('main_widget_votos')?>
               </div>
            </div>
         </div>
         <!-- /.row -->
         <!--<hr>-->
         <!-- Footer -->
         <footer>
            <div class="row">
               <div class="col-lg-12">
                  <!--<p>Copyright &copy; Your Website 2014</p>-->
               </div>
            </div>
            <!-- /.row -->
         </footer>
         <!--</div>-->
         <?php $this->load->view('copyright_footer');?> 
      </div>
      <script src="<?php echo base_url('assets/bootstrap/js/jquery.js') ?>"></script>
      <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
      <script src="<?php //echo my_url('assets/datatables/jquery.dataTables.js') ?>"></script>
      <script src="<?php //echo my_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
      <script type="text/javascript">
      //boton Up   
      $(document).ready(function(){
        $('body').append('<div id="toTop" class="btn btn-info pull-right"><span class="glyphicon glyphicon-chevron-up"></span> Up</div>');
          $(window).scroll(function () {
                          if ($(this).scrollTop() !== 0) {
                                  $('#toTop').fadeIn();
                          } else {
                                  $('#toTop').fadeOut();
                          }
                  }); 
      $('#toTop').click(function(){
          $("html, body").animate({ scrollTop: 0 }, 600);
          return false;
      });
      });
   </script> 

   </body>
</html>


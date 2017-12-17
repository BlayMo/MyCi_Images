<?php

/* * **********************************************************
 * The MIT License
 *
 * Copyright 2016 Blas Monerris Alcaraz.
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

  --------------------- xxxxxx -------------------------

  @Proyecto: MyCi_Images
  @Autor:    Blas Monerris Alcaraz
  @Objeto:   Aprendizaje/Desarrollo
  @Comienzo: 21-09-2016
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.1

  @mail: expresoweb2015@gmail.com

  PHP7 + Codeigniter 3.1.0 + Bootstrap v3.1.1 + Start Bootstrap HTML Template

  

  Script creado el 21-09-2016
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php  $this->load->view('main_header');?>

 <!--       mapa leafletjs -->
         <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
         <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.21.0/mapbox-gl.css' rel='stylesheet' />
         <style>
            #map { height: 360px; }            
            #pre.ui-distance {
            position:absolute;
            bottom:10px;
            left:10px;
            padding:5px 5px;
            background:rgba(0,0,0,0.5);
            color:#fff;
            font-size:11px;
            line-height:18px;
            border-radius:3px;
            }                   
         </style>
         <style type="text/css">
      .contact-form {
      /*margin-top:70px;*/
      }
   </style>
         
<body style="padding-bottom: 5em;">
   
   <div class="container">
      
       <div class="row">
        <a href="<?php echo site_url('main') ?>" class="btn btn-danger pull-right">Volver</a>
       </div> 
       <div  id="message">
         <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <h3>Gracias por las sugerencias</h3>
            <hr>
            <address>
               <strong>Mi Email:</strong> <a href="mailto:#"> <?=$this->config->item('email_admin')?></a><br><br>               
            </address>        
         </div>
         <div class="col-sm-8 contact-form">
            <div class="well-sm">
               <h4>Donde estoy</h4>
               <hr>
               <!--<pre id='info'></pre>-->
               <div id="map"></div>
               <!--<pre id='distance' class='ui-distance'>Click para situar una marca</pre>-->
               <hr>
            <!--</div>-->
            <?=form_open($action);?> 
            <strong>Recibir&aacute; copia de este mail</strong>
            <div class="row">
               <div class="col-xs-6 col-md-6 form-group">
                   <input style="color:blue" class="form-control"  name="nombre" placeholder="Su Nombre" type="text" autofocus value="<?php echo $nombre; ?>"/>
               </div>
               <div class="col-xs-6 col-md-6 form-group">
                  <input style="color:blue" class="form-control"  name="email" placeholder="Su Email" type="email" value="<?php echo $email; ?>"/>
               </div>
            </div>
            <textarea style="color:blue" class="form-control"  name="texto" placeholder="Texto" rows="5" value="<?php echo $texto; ?>"></textarea>
            <hr/>
            <div class="row">
               <div class="col-xs-12 col-md-12 form-group">
                  <a href="<?php echo site_url('main') ?>" class="btn btn-danger">Volver</a>
                  <button class="btn btn-primary pull-right" type="submit">Enviar</button>               
               </div>
            </div>
            <?=form_close();?>           
         </div>
      </div>
   </div>
   <?php $this->load->view('footer_scripts_js')?>  
   
   <!-- ------------------ mapa ----------------------------------------------->        
   <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>        
   <script>
      L.mapbox.accessToken = 'pk.eyJ1IjoiYmxheW1vIiwiYSI6ImNpcXBocDg2bTAwNm1pNG5tanV3MGhlMTQifQ.AdVY_NiyRFiavkFi9wALyQ';
      var map = L.mapbox.map('map', 'mapbox.streets')
          .setView([42.4305945,-8.6497182], 13);
      
          // Start with a fixed marker.38.7612887,-0.5871637
      var fixedMarker = L.marker(new L.LatLng(42.4305945,-8.6497182), {
          icon: L.mapbox.marker.icon({
              'marker-color': 'ff8888'
          })
      }).bindPopup('Pontevedra, Pontevedra').addTo(map);
      
      // Store the fixedMarker coordinates in a variable.
      var fc = fixedMarker.getLatLng();
      
      // Create a featureLayer that will hold a marker and linestring.
      var featureLayer = L.mapbox.featureLayer().addTo(map);
      
      // When a user clicks on the map we want to
      // create a new L.featureGroup that will contain a
      // marker placed where the user selected the map and
      // a linestring that draws itself between the fixedMarkers
      // coordinates and the newly placed marker.
      map.on('click', function(ev) {
          // ev.latlng gives us the coordinates of
          // the spot clicked on the map.
          var c = ev.latlng;
      
          var geojson = [
            {
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [c.lng, c.lat]
              },
              "properties": {
                "marker-color": "#ff8888"
              }
            }, {
              "type": "Feature",
              "geometry": {
                "type": "LineString",
                "coordinates": [
                  [fc.lng, fc.lat],
                  [c.lng, c.lat]
                ]
              },
              "properties": {
                "stroke": "#000",
                "stroke-opacity": 0.5,
                "stroke-width": 4
              }
            }
          ];
      
          featureLayer.setGeoJSON(geojson);
      
          // Finally, print the distance between these two points
          // on the screen using distanceTo().
          var container = document.getElementById('distance');
          container.innerHTML = (fc.distanceTo(c)).toFixed(0) + 'm';
      });
      
      map.on('mousemove', function (e) {
          document.getElementById('info').innerHTML =
              // e.point is the x, y coordinates of the mousemove event relative
              // to the top-left corner of the map
              JSON.stringify(e.point) + '<br />' +
                  // e.lngLat is the longitude, latitude geographical position of the event
              JSON.stringify(e.lngLat);
      });
   </script>
</body>
</html>


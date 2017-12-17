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

  

  Script creado el 11-11-2017, 8:19:22
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
defined('COLS')  OR define('COLS',  3); //Num. columnas por fila
defined('FILAS') OR define('FILAS', 2); //Num. filas por pagina

class Galeria extends MY_Controller
{
    private $filas;                                     
    private $categorias;
    private $nro_reg;
    private $filtrado;
    private $fotos_data;
    private $filtrado_por;
    private $tags;
    private $orden;
            
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('fotos/Fotos_model',
                                 'Categoria_model',
                                 'Tags_model'));
        $this->filas = (FILAS * COLS); // tres registros por fila 
        $this->categorias = $this->Categoria_model->get_all();
        $this->filtrado = FALSE;
        $this->fotos_data = new stdClass();
        $this->filtrado_por = '';
        $this->tags = $this->Tags_model->get_all_id_foto();
        $this->orden = 'DESC';
        
    }
    
    
    public function index( $limite_sup = 0)          
    {
        if ($this->filtrado){
            $fotos = $this->fotos_data; 
            $this->nro_reg = count($fotos);
        }else{
            //----------- lectura de datos ------            
            $fotos = $this->Fotos_model->get_all_rango($this->filas,$limite_sup,$this->orden); 
            $this->nro_reg = $this->Fotos_model->cuenta();
        } 
                        
        $data = array(
            'fotos_data' => $fotos
        );
        
        $this->paginar();
        $data['pagination']        = $this->pagination->create_links();
        $data['paginado']          = TRUE;
        $data['nro_fotos']         = $this->nro_reg;
        //variables de busqueda
        $data['clear']             = 'galeria';
        $data['sql']               = 'Orden '. $this->orden.' /'.$this->filtrado_por.' Fotos '.$this->nro_reg;
        $data['tabla_bt']          = 'boda_fotos';
        $data['action']            = 'galeria/bt';                 
        $data['busca_autor']       = set_value('busca_autor');
        $data['busca_cat']         = set_value('busca_cat');
        $data['busca_texto']       = set_value('busca_texto','');        
        $data['orden']             = set_value('orden');
        $data['drop_autor']        = $this->Fotos_model->drop_autor();
        $data['drop_cat']          = $this->categorias;
        $data['drop_tag']          = $this->Tags_model->drop_tags();
        $data['movil']             = $this->movil->isMobile();
        $data['tags_data']         = $this->tags;
                
        $data['vista']             = 'galeria/fotos_galeria';
            
        $this->load->view('read_view', $data);
        
    }
    
    public function reord(){
        $n = mt_rand(1, 3);  
        if ($n == 1){
           $this->orden = 'ASC' ;
        }
        
        if ($n == 2){
           $this->orden = 'DESC' ;
        }
        
        if ($n == 3){
           $this->orden = 'RANDOM' ;
        }
        
        $this->index();
    }
    
    function paginar()
    {
        $config = array();
        $config['base_url']          = site_url('galeria/siguiente');
        $config['first_url']         = site_url('galeria');           
        $config['per_page']          = $this->filas;           
        $config['total_rows']        = $this->nro_reg;
        $config['use_page_numbers']  = TRUE;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);
    }
        
    public function siguiente()
    {            
        $pagina = intval($this->input->get('pagina'));
        $limite_sup = (($pagina * $this->filas) - $this->filas ) ; 
        if($limite_sup < 0){$limite_sup = 0;}
        $this->index($limite_sup);            
    }
    
    //busqueda 
    public function bttag($tag){
    
        $row = $this->Tags_model->get_by_id($tag);
        if ($row) {
            $this->filtrado_por = 'Etiqueta = '.$row->tag;
            $this->fotos_data = $this->Fotos_model->get_by_tag($row->tag); 
            $this->filtrado = TRUE;
        }
        
        $this->index();
    }
    
    
    public function bt(){
       
        $data = array();
        $busca = FALSE;
        
                
        if( $this->input->post('busca_autor',TRUE)!=''){$busca = TRUE;}
        if( $this->input->post('busca_cat',TRUE)!=''){$busca = TRUE;} 
        if( $this->input->post('busca_texto',TRUE)!=''){ $busca = TRUE;} 
                       
        //busqueda 
        if ($busca){
            
            if( $this->input->post('tabla_busca',TRUE) != ''){
                $tabla = $this->input->post('tabla_busca',TRUE);
                $orden = NULL;                
                
                if( $this->input->post('busca_autor',TRUE)!='0'){
                    $data[$tabla.'.autor'] = $this->input->post('busca_autor',TRUE);
                    $this->filtrado_por = 'Autor = '.$this->input->post('busca_autor',TRUE);
                    $this->fotos_data = $this->Fotos_model->get_search($data,$orden);  
                }
                
                if( $this->input->post('busca_cat',TRUE)!='0'){
                    $data[$tabla.'.id_categoria'] = $this->input->post('busca_cat',TRUE);
                    $row = $this->Categoria_model->get_by_id($this->input->post('busca_cat',TRUE));
                    $this->filtrado_por = 'Categoria = '.$row->categoria;
                    $this->fotos_data = $this->Fotos_model->get_search($data,$orden);  
                }
                
                if( $this->input->post('busca_texto',TRUE)!=''){                                
                    $texto = trim($this->input->post('busca_texto',TRUE));
                    $this->fotos_data = $this->Fotos_model->get_texto($texto);
                    $this->filtrado_por = 'Con la palabra '.$texto;
                }
                                                
                $this->filtrado = $busca;                
            }
                                                                        
        }
        
        
        $jsonvar2 = json_encode( $this->fotos_data ,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK );                
        write_file('./files/'.'filtro_sql.json', $jsonvar2, 'w+');
        
        $this->index();
    }// fin bt
    
    
    
}


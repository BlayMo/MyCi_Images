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

class Fotos_model extends MY_Model
{
       
    function __construct()
    {
        parent::__construct();
        $this->table = 'boda_fotos';
        $this->id = 'id_foto';
        $this->order = 'DESC';
        $this->where = $this->table.'.'.$this->id;
        $this->orden = $this->id.' '.$this->order;
        
    }

    private function my_set_relation()
    {
        $this->db->select();               
        $this->db->join('boda_categoria', 'boda_fotos.id_categoria = boda_categoria.id_categoria','left');
    }
        
    // get all
    function get_all()
    {
        parent::get_all();
        $this->my_set_relation();        
        $this->db->order_by($this->orden);        
        return $this->db->get($this->table)->result();
        
    }
       
     // get all dentro de un rango filtrado por categoria+activos
    function get_all_rango($filas,$limite_sup,$orden_view)
    {    
        $this->my_set_relation();        
        $this->db->order_by($this->table.'.'.$this->id, $orden_view);        
        return $this->db->get($this->table,$filas,$limite_sup)->result();
    }
    // get all
    function get_ultimas()
    {        
        $this->my_set_relation();
        $this->db->order_by($this->id, 'RANDOM');
        $this->db->limit(9, 0);
        return $this->db->get($this->table)->result();        
    }
    
    // get data by id
    function get_by_id_rel($id)
    {       
        $this->my_set_relation();
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get data by id
    function get_by_idfoto($idfoto)
    {       
        //$this->my_set_relation();
        $this->db->where($this->table.'.idfoto', $idfoto);
        return $this->db->get($this->table)->row();
    }
    
    public function drop_autor(){
        $this->db->select('autor');
        //$this->db->order_by('autor', 'ASC');
        $this->db->group_by($this->table.'.autor', 'ASC');
        return $this->db->get($this->table)->result();        
    }
    
    public function get_by_tag($tag){
        $this->db->select();               
        $this->db->join('boda_categoria', 'boda_fotos.id_categoria = boda_categoria.id_categoria','left');
        $this->db->join('boda_tags', 'boda_fotos.id_foto = boda_tags.id_foto','left');
        $this->db->order_by($this->table.'.'.$this->id, 'DESC');
        $this->db->where('boda_tags.tag', $tag);
        return $this->db->get($this->table)->result(); 
    }
    
    // busca ----------------------------------------------------------
    // obtengo datos filtrados en formulario
    function get_search($data,$orden = null) {
        $this->my_set_relation();
        if ($orden != NULL){
            $this->db->order_by($orden);
        }else{ 
            $this->db->order_by($this->id, $this->order);            
        }        
	$this->db->where($data);        
        return $this->db->get($this->table)->result();
    }
    
    // busca coincidencias de texto
    function get_texto($q = NULL) {
        $this->my_set_relation();
        $this->db->order_by($this->id, $this->order);
        $this->db->like   ('title', $q);
        $this->db->or_like('foto', $q);		
	$this->db->or_like('video', $q);
	$this->db->or_like('fecha_alta', $q);	
	$this->db->or_like('autor', $q);        
        return $this->db->get($this->table)->result();
    }
    
    function ver_sql($data,$orden = NULL,$like = FALSE){
        $this->my_set_relation();
        if ($orden != NULL){
            $this->db->order_by($orden);
        }else{ 
            $this->db->order_by($this->id, $this->order);            
        } 
        if ($like){
            $this->db->like($data);
        }else{
            $this->db->where($data);
        }
        return $this->db->get_compiled_select($this->table);        
    }
    
    function get_texto_sql($q = NULL) {
        $this->my_set_relation();
        $this->db->order_by($this->id, $this->order);
        $this->db->like   ('title', $q);
        $this->db->or_like('foto', $q);		
	$this->db->or_like('video', $q);
	$this->db->or_like('fecha_alta', $q);	
	$this->db->or_like('autor', $q);		
        
        return $this->db->get_compiled_select($this->table); 
    }
            
}

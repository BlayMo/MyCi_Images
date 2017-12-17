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

class Categoria extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
        
    }

    public function index()
    {
        redirect(site_url('admin/cat'));
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('categoria/create_action'),
	    'id_categoria' => set_value('id_categoria'),
	    'idcategoria' => set_value('idcategoria', generate_token()),
	    'categoria' => set_value('categoria'),
	    'descripcion' => set_value('descripcion'),
	);
        $data['cuerpo'] = 'admin/categoria_form';
        $this->_render_page('admin/admin_main_view',$data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idcategoria' => $this->input->post('idcategoria',TRUE),
		'categoria' => $this->input->post('categoria',TRUE),
		'descripcion' => $this->input->post('descripcion',TRUE),
	    );

            $this->Categoria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categoria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categoria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('categoria/update_action'),
		'id_categoria' => set_value('id_categoria', $row->id_categoria),
		'idcategoria' => set_value('idcategoria', $row->idcategoria),
		'categoria' => set_value('categoria', $row->categoria),
		'descripcion' => set_value('descripcion', $row->descripcion),
	    );
            $data['cuerpo'] = 'admin/categoria_form';
            $this->_render_page('admin/admin_main_view',$data);
            //$this->load->view('categoria/categoria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categoria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_categoria', TRUE));
        } else {
            $data = array(		
		'categoria' => $this->input->post('categoria',TRUE),
		'descripcion' => $this->input->post('descripcion',TRUE),
	    );

            $this->Categoria_model->update($this->input->post('id_categoria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categoria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categoria_model->get_by_id($id);

        if ($row) {
            $this->Categoria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categoria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categoria'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
	$this->form_validation->set_rules('descripcion', 'descripcion', 'trim');

	$this->form_validation->set_rules('id_categoria', 'id_categoria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

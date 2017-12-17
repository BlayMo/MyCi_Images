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


class Tags extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tags_model');        
    }

    public function index()
    {

        redirect(site_url('admin/tags'));
    }

   
    public function update($id) 
    {
        $row = $this->Tags_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tags/update_action'),
		'id_tag' => set_value('id_tag', $row->id_tag),
		'idtag' => set_value('idtag', $row->idtag),
		'id_foto' => set_value('id_foto', $row->id_foto),
		'id_user' => set_value('id_user', $row->id_user),
		'tag' => set_value('tag', $row->tag),
		'descripcion' => set_value('descripcion', $row->descripcion),
	    );
            $data['cuerpo'] = 'admin/tags_form';
            $this->_render_page('admin/admin_main_view',$data);
            //$this->load->view('tags/boda_tags_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tags'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tag', TRUE));
        } else {
            $data = array(
		'idtag' => $this->input->post('idtag',TRUE),
		'id_foto' => $this->input->post('id_foto',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'tag' => $this->input->post('tag',TRUE),
		'descripcion' => $this->input->post('descripcion',TRUE),
	    );

            $this->Tags_model->update($this->input->post('id_tag', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tags'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tags_model->get_by_id($id);

        if ($row) {
            $this->Tags_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tags'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tags'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('tag', 'tag', 'trim|required');
	$this->form_validation->set_rules('descripcion', 'descripcion', 'trim');

	$this->form_validation->set_rules('id_tag', 'id_tag', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

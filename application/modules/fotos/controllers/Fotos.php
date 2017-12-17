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

  

  Script creado el 07-11-2017, 17:17:04
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');


class Fotos extends MY_Controller
{
    
    protected $numcat;
            
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('fotos/Fotos_model',
                                 'Categoria_model',
                                 'Tags_model')); 
        //$this->numcat = 7;
    }

    public function index()
    {
        redirect(site_url('galeria'),'auto');
    }
    
    

    public function upfoto() 
    {
        //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; 
        $categoria = $this->Categoria_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('fotos/upload'),
            'id_foto' => set_value('id_foto'),
	    'idfoto' => set_value('idfoto'),
	    'id_categoria' => set_value('id_categoria'),
	    'foto' => set_value('foto'),
	    'fecha_alta' => set_value('fecha_alta'),
	    'title' => set_value('title',$this->config->item('sitio_web')),
            'autor' => set_value('autor'),
	    'url' => set_value('url'),
	    'priority' => set_value('priority'),
            'categoria_data' => $categoria,
            'tag1' => set_value('tag1',''),
            'tag2' => set_value('tag2',''),
            'tag3' => set_value('tag3',''),
            'tag4' => set_value('tag4',''),
            'movil' => ($this->movil) ? 'Pc':'movil',
	);
        
        $data['vista']        = 'fotos/images_form_upload';
            
        $this->load->view('read_view', $data);
                
    }
        
    //este metodo no valida el tipo de fichero 
    //el tipo y el tamaño se validan en el formulario    
    public function upload() {
        if (isset($_FILES['files']) && !empty($_FILES['files'])) {
            $no_files = count($_FILES["files"]['name']);
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "  Error: " . $_FILES["files"]["error"][$i] . "<br>";
                } else {
                    if (file_exists('files/galeria/' . $_FILES["files"]["name"][$i])) {
                        echo 'File already exists : files/fotos/resized/' . $_FILES["files"]["name"][$i];
                    } else {
                        //$target_file = 'files/fotos/resized/' . $_FILES["files"]["name"][$i];
                        //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'files/fotos/resized/' . $_FILES["files"]["name"][$i]);
                        //echo 'File successfully uploaded : files/galeria/' . $_FILES['files']['name'][$i] . ' ';
                        $this->session->set_flashdata('message', 'Ok. Archivos subidos');
                        
                        $data = array(
                            'idfoto' => generate_token(),
                            'id_categoria' => 0 /*mt_rand(1, $this->numcat)*/,
                            'foto' => $_FILES["files"]["name"][$i],
                            'fecha_alta' => ahora(),
                            'title' => $this->input->post('title',TRUE),
                            'url' => '',
                            'autor' => $this->input->post('autor',TRUE),
                            'priority' => '1',
                            'id_user' => $this->session->userdata('user_id'),                            
                        );
                        
                        if ($this->input->post('ncategoria',TRUE) != 0){
                            $data['id_categoria'] = $this->input->post('ncategoria',TRUE);
                        }
                        
                        $this->Fotos_model->insert($data);
                        //inserto dos etiquetas por defecto
                        
                        $row = $this->Fotos_model->get_by_idfoto($data['idfoto']);                        
                        if ($row) {                            
                            $tags = FALSE;
                            if ($this->input->post('tag1',TRUE) != ''){
                                $datat1 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => $this->input->post('tag1',TRUE),
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($datat1);
                                $tags = TRUE;
                            }
                            
                            if ($this->input->post('tag2',TRUE) != ''){
                                $datat2 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => $this->input->post('tag2',TRUE),
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($datat2);
                                $tags = TRUE;
                            }
                            
                            if ($this->input->post('tag3',TRUE) != ''){
                                $datat3 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => $this->input->post('tag3',TRUE),
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($datat3);
                                $tags = TRUE;
                            }
                            
                            if ($this->input->post('tag4',TRUE) != ''){
                                $datat4 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => $this->input->post('tag4',TRUE),
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($datat4);
                                $tags = TRUE;
                            }
                                                        
                            if (!$tags){
                                $data2 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => 'boda',
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($data2);
                                $data3 = array(
                                'idtag' => $row->idfoto,
                                'id_foto' => $row->id_foto,
                                'id_user' => $row->id_user,
                                'tag' => 'Ana y Pablo',
                                'descripcion' => '',
                                );
                                $this->Tags_model->insert($data3);
                            }
                        }  
                                          
                    }
                }
            }
        } else {
            //echo 'Please choose at least one file';
            $this->session->set_flashdata('message', 'Debe seleccionar alg&uacute;n archivo');
        }
        
        $this->index();        
    }

        
    public function _rules() 
    {
	//$this->form_validation->set_rules('idfoto', 'idfoto', 'trim|required');
	$this->form_validation->set_rules('id_categoria', 'id categoria', 'trim|required');
	//$this->form_validation->set_rules('foto', 'foto', 'trim');
	//$this->form_validation->set_rules('fecha_alta', 'fecha alta', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	//$this->form_validation->set_rules('priority', 'priority', 'trim|required');

	$this->form_validation->set_rules('id_foto', 'id_foto', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
            
    public function lista() {
        $fotos = $this->Fotos_model->get_all();

        $data = array(
            'fotos_data' => $fotos
        );
        
        $data['barra_nav']         = 'main/main_navbar';
        $data['style']             = 'font-size:80%';
        $data['titulo_panel']      = 'Listado de Fotos';        
        $data['vista']             = 'fotos/fotos_lista';
        $data['borrado']           = $this->session->userdata('borrado');
                        
        $this->_render_page('tablas_view', $data);  
                       
    }
    
    public function read($id) 
    {
        $row = $this->Fotos_model->get_by_id_rel($id);
        if ($row) {
            $data = array(
		'id_foto' => $row->id_foto,
		'idfoto' => $row->idfoto,
		'categoria' => $row->categoria,
		'foto' => trim($row->foto),
		'fecha_alta' => $row->fecha_alta,
		'title' => $row->title,
		'autor' => $row->autor,
		'url' => $row->url,
		'priority' => $row->priority,
	    );
            //$this->load->view('fotos/fotos_read', $data);
            $data['vista']        = 'fotos/fotos_read';
            
            $this->load->view('read_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fotos'));
        }
    }
    
    public function dga($id_foto){
        //solo los anfitriones descargan
        $group = 'anfitriones';
        if ($this->ion_auth->in_group($group)){
                        
        $row = $this->Fotos_model->get_by_id($id_foto);
            if ($row) {
                //ob_clean(); 
                $this->load->helper('download');
                $data = file_get_contents(site_url('files/fotos/resized/'.$row->foto)); 
                $name = $row->foto; 
                force_download($name,$data); 
                $this->session->set_flashdata('message', 'Descarga completada');
            }           
        }else{
            $this->session->set_flashdata('message', '<h4>No esta autorizado</h4>');
        }
        $this->index();
    }
    
    //metodos desde administracion
    public function update($id) 
    {
        $row = $this->Fotos_model->get_by_id_rel($id);

        if ($row) {
            $categoria = $this->Categoria_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('fotos/update_action/'),
		'id_foto' => set_value('id_foto', $row->id_foto),
		'idfoto' => set_value('idfoto', $row->idfoto),
		'id_categoria' => set_value('id_categoria', $row->id_categoria),
		'foto' => set_value('foto', $row->foto),
		'fecha_alta' => set_value('fecha_alta', $row->fecha_alta),
		'title' => set_value('title', $row->title),
		'autor' => set_value('autor', $row->autor),
		'url' => set_value('url', $row->url),
		'priority' => set_value('priority', $row->priority),
                'categoria_data' => $categoria,
                'categoria' => $row->categoria,
	    );
            $data['cuerpo'] = 'admin/fotos_form';
            $this->_render_page('admin/admin_main_view',$data);
            //$this->load->view('fotos/fotos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/fot'));
        }
    }
    
    public function update_action() 
    {
        $this->admin_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_foto', TRUE));
        } else {
            $data = array(		
		'id_categoria' => $this->input->post('id_categoria',TRUE),		
		'title' => $this->input->post('title',TRUE),
		'autor' => $this->input->post('autor',TRUE),
		'url' => $this->input->post('url',TRUE),
		'priority' => $this->input->post('priority',TRUE),
	    );
            
            if ($this->input->post('ncategoria',TRUE) != 0){
                $data['id_categoria'] = $this->input->post('ncategoria',TRUE);
            }

            $this->Fotos_model->update($this->input->post('id_foto', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
                        
            redirect(site_url('admin/fot'));
        }
    }
    
    public function delete($id,$admin = FALSE) 
    {
        $row = $this->Fotos_model->get_by_id($id);
        $borrado = FALSE;
        
        if ($row) {
            if (borra_file('files/fotos/resized/'.$row->foto)){
                    $this->Fotos_model->delete($id); 
                    $borrado = TRUE;                    
                }                                    
        } 
        
        if ($borrado){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message', 'Record Not Found');
        }
        
        if ($admin){
            redirect(site_url('admin/fot'));
        }else{
            redirect(site_url('fotos/lista'));
        }
        
    }

    public function admin_rules() 
    {
//	$this->form_validation->set_rules('idfoto', 'idfoto', 'trim|required');
//	$this->form_validation->set_rules('id_categoria', 'id categoria', 'trim|required');
//	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
//	$this->form_validation->set_rules('fecha_alta', 'fecha alta', 'trim|required');
//	$this->form_validation->set_rules('title', 'title', 'trim|required');
//	$this->form_validation->set_rules('autor', 'autor', 'trim|required');
//	$this->form_validation->set_rules('url', 'url', 'trim|required');
//	$this->form_validation->set_rules('priority', 'priority', 'trim|required');

	$this->form_validation->set_rules('id_foto', 'id_foto', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    
}

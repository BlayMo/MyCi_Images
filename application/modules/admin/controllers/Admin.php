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
  @Comienzo: 07-03-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 5.6 - 7.0.5 + Codeigniter 3.1.4 + Bootsrap 3.3.7 + mPdf + moment + geocoder +faker

  

  Script creado el 07-03-2017, 8:58:37
 * 
 * //-------------------------- ejemplo de uso -----------------------
       
         * function clientes()
        {   
            
            try{
                $crud = new grocery_CRUD();                
                $crud->set_table('clientes');
                //$crud->set_theme('datatables');
                                
                $crud->set_relation('id_user','users','username');
                $crud->set_relation('id_categoria','categoria','categoria');

                $crud->display_as('id_user','User')->
                       display_as('id_categoria','Categoria')->
                       display_as('id_cliente','Reg.No.');
                                                
                $crud->columns('id_cliente','foto_cliente','nombre','id_user','activo','mail','password');
                $crud->callback_column('mail',array($this,'_callback_mod_pass'));
                $crud->callback_column('password',array($this,'_callback_mod_pass'));
                $crud->callback_column('activo',array($this,'_callback_activo'));
                
                $crud->unset_edit_fields('id_user','idcliente','usuario','color',
                        'orden_ale','orden_tiempo','fecha_reg','fecha_modificado','fecha_baja',
                        'ip_address','megusta','invitaciones','mensajes','citas_privadas',
                        'eventos','amigos','fotos','genero','disponibilidad','password','mail','activo');
                
                $crud->set_field_upload('foto_cliente','data/sc/images/clientes');
                $crud->unset_add();
                //$crud->unset_edit();
                //$crud->unset_delete();
                //---- solo funciona bien un callback
                                
                $output = $crud->render();
                
                $data['include'] = 'menu_boton.php';
                $data['accion'] = '<p class="text-center"><strong>Lista de clientes</strong></p>';

                $this->load->view('header_admin',$data);
                $this->load->view('wcrud',$output);
                //$this->load->view('footer_admin'); 
            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }            
        }
         
        //----------------------------------------------------------- 
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
defined('ADMIN')    OR define('ADMIN', 1);

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();        
        $this->load->model(array('fotos/Fotos_model',
                                 'Categoria_model',
                                 'Tags_model'));
        
        $this->user_online();
    }

    public function index() {
                
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('Auth/login'));}
        if (!$this->ion_auth->is_admin())
        {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect(site_url('auth'),'refresh');
        }
        
        $this->tablero();
    }
    
    private function tablero() {
                	        
        $data = array(            
            'cuerpo' => 'admin/admin_body',
            'chart_view' => 'admin/widget_blanco',
        );
        
        $this->_render_page('admin/admin_main_view',$data);
    }
    
    public function users()
	{
            $data = array();                       
                      
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'),
                    $this->config->item('error_end_delimiter', 'ion_auth'));

            $this->lang->load('auth');    

            // set the flash data error message if there is one
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
           $data['users'] = $this->ion_auth->users()->result();
            foreach ($data['users'] as $k => $user)
            {
                   $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
              
            $data['cuerpo'] = 'admin/users_list';
            $this->_render_page('admin/admin_main_view',$data);
           
	}
        
        // group list
	function groups()
	{
            $data = array();   
                         
            //set the flash data error message if there is one
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups'] = $this->ion_auth->groups()->result();

            $data['cuerpo'] = 'admin/groups_list';
            $this->_render_page('admin/admin_main_view',$data);
                                                              	
	}
                                 
         //reajusta las imagenes de la galeria
        public function imggal(){
            $img_files = get_filenames('./files/galeria/');                        
            foreach ($img_files as $value) {                               
                $this->ajusta ('./files/galeria/',$value,800);                
            }
            $this->galeria();
        }
                             
        public function vlog(){
            $this->db->truncate('logs');
            $this->index();
        }
        
        public function vsess(){
            $this->db->truncate('ci_sessions');
            //$this->index();
            redirect(site_url('admin'));
        }
        
        public function cat()
    {
        $categoria = $this->Categoria_model->get_all();

        $data = array(
            'categoria_data' => $categoria
        );
        
        $data['cuerpo'] = 'admin/categoria_list';
        $this->_render_page('admin/admin_main_view',$data);

        
    }
    
    public function fot()
    {
        $fotos = $this->Fotos_model->get_all();

        $data = array(
            'fotos_data' => $fotos
        );

        $data['cuerpo'] = 'admin/fotos_list';
        $this->_render_page('admin/admin_main_view',$data);
        
    }
    
    public function tags()
    {
        $tags = $this->Tags_model->get_all();

        $data = array(
            'tags_data' => $tags
        );
        
        $data['cuerpo'] = 'admin/tags_list';
        $this->_render_page('admin/admin_main_view',$data);
        
    }
                                                      
}

/* End of file Admin.php */


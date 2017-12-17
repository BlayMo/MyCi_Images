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


class Main extends MY_Controller {

    //private $movil;
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('fotos/Fotos_model',                                 
                                 ));
        
        $this->user_online();
        $jsonvar  = json_encode( 
                array('acceso' => ahora(),'User' => $this->session->userdata('email'))
                ,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK );                
        write_file('./files/'.'registro_acceso.json', $jsonvar, 'w+');
        //$this->movil = new Mobile_Detect;
        
    }

    public function index() {
        
        if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'),'auto');}
        $fotos = $this->Fotos_model->get_ultimas();

        $data = array(
            'fotos_data' => $fotos,
            'sitio_web' => $this->config->item('sitio_web'),
        );
        
        $data['movil']  = $this->movil->isMobile();
        $this->load->view('main/portada',$data);
    }
    
    public function salir(){
        //registro salida  al hacer logout
        if ( !$this->ion_auth->logged_in() ){$this->index();}
        if ( $this->ion_auth->logout()){
            $this->session->set_flashdata('message', 'Sesion finalizada con exito');
        }
        redirect(site_url('main'),'refresh');              
    }
    
    //--------------- formulario de contacto ------------------
        public function contact()
	{   
                        
            // array de datos en blanco        
            $data = array(               
                'action' => site_url('main/create_contact'),
                'nombre' => set_value('nombre'),
                'email' => set_value('email'),
                'texto' => set_value('texto'),                
            );
                        
            $this->load->view('contact_form', $data);
        }
        
        public function create_contact() 
        {
            $this->contact_rules();

            if ($this->form_validation->run() == FALSE) {                
                $this->session->set_flashdata('message', validation_errors());
                $this->contact();
            } else {
                $data = array(
                    'nombre' => $this->input->post('nombre',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'texto' => $this->input->post('texto',TRUE),		
                );
            
            $to         = 'expresoweb2015@gmail.com';
            $cc         = $this->input->post('email',TRUE);    
            $subject    = $this->config->item('sitio_web').' / Contacto';
            $message    = cleanInput($data['texto']);
            $fromName   = valida_input($data['nombre']);
            $fromEmail  = $data['email'];
            
            if ($this->sendEmail($to, $subject, $message, $fromEmail , $fromName, $cc))
            {
                $this->session->set_flashdata('message','Mail enviado OK');
                //var_dump($this->email->print_debugger());
            }  else {
                
               $this->session->set_flashdata('message','email NO enviado'); 
            }
             
            $this->index();
            //redirect(site_url('main'));
            }
        }
        
        public function contact_rules() 
        {
            $this->form_validation->set_rules('nombre', 'nombre', 'xss_clean|trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('texto', 'texto', 'trim|valida_input');           
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }
        

}

/* End of file Main.php */


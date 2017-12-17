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
  @Comienzo: 04-01-2017
  @licencia  http://opensource.org/licenses/MIT  MIT License
  @link      https://expresoweb.joomla.com
  @Version   1.0.0

  @mail: expresoweb2015@gmail.com

  PHP 7.0.5 + Codeigniter 3.1.2 + otrosoftw

  

  Script creado el 07-01-2017 0:0:0
 * ******************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
     
    public $movil;
    function __construct(){
        parent::__construct();
               
        $this->load->library(array('ion_auth',
                                   'form_validation',
                                   'pagination',
                                   'image_lib',
                                   ));
        //$this->load->helper('htmlpurifier');
        $this->load->model(array('Ion_auth_model'));                                         
        $this->load->helper(array('language','form','array','security'));
        $this->lang->load('auth');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        date_default_timezone_set("Europe/Madrid");
        
        $this->fecha_act();
        //if ( !$this->ion_auth->logged_in() ){ redirect(site_url('auth/login'));}
                
        if (ENVIRONMENT != 'production'){
            $this->output->enable_profiler(true);//Activa profiler de Forensics 
        } 
        $this->movil = new Mobile_Detect;
    }
    /**
     * this function will be called to send emails with
     *
     * @param  Integer      $perPage    feild name of the databse which reqired to be displayed in the value section in dropdown list.
     * @param  Integer      $pageNumber feild name of the databse which reqired to be displayed in the value section in dropdown list.
     * @param  STDObject    $where      if additional query required it should be provided as STDObject example Array('country_name)'=>'Sri Lanka')
     * @param  Text         $AsOrder    if additional query required it should be provided as STDObject example Array('country_name)'=>'Sri Lanka')
     * @throws Some_Exception_Class If something interesting cannot happen
     * @return row / all rows in the specific table
     * 
     * public function sendEmail($to, $subject, $message,
                              $fromEmail = 'noreply@mail.com',
                              $fromName = "Test Notification",
                              $cc = null,$attach = null)
    {
        
        //configuracion para hostalia
        $configMail = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.aceiteojosverdes.com',                
                'smtp_user' => 'admin.aceiteojosverdes.com',
                'smtp_pass' => 'Bm050258',
                'mailtype' => 'text',
                'charset' => 'utf-8',
                'newline' => "\r\n",                
        );
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
        $this->email->set_header('Content-type', 'text/html'); //must add this line
        //cargamos la configuración 
        $this->email->initialize($configMail);
      
        $this->email->from($fromEmail, $fromName,'-fadmin@aceiteojosverdes.com');
        $this->email->to($to);
        if ($cc != null){
            $this->email->cc($cc);
        }
        $this->email->bcc('monalcblay@gmail.com');
        
        if ($attach != null){
            $this->email->attach($attach);
        }
        
        $nmessage = wordwrap($message, 70, "\r\n");
        $this->email->subject($subject);
        $this->email->message($nmessage);
        //return true;
        
        if($this->email->send())
        {            
            return true;
        }
        else
        {
            return false;
        }
       
    }
     * 
     * 
     */
    public function sendEmail($to, $subject, $message,
                              $fromEmail = 'noreply@mail.com',
                              $fromName = "Test Notification",
                              $cc = null,
                              $attach = null){
        try {
                        
            $result = TRUE;
            $this->load->library('email');
            //configuracion para hostalia
            $configMail = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.expresoweb2017.com',                
                    'smtp_user' => 'admin.expresoweb2017.com',
                    'smtp_pass' => 'Bm050258',
                    'mailtype' => 'text',
                    'charset' => 'utf-8',
                    'newline' => "\r\n",                
            );
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
            $this->email->set_header('Content-type', 'text/html'); //must add this line
            //cargamos la configuración 
            $this->email->initialize($configMail);
        
            //$this->email->set_newline("\r\n");
            $this->email->from($fromEmail, $fromName,'-fadmin@expresoweb2017.com');
            $this->email->to($to);
            if ($cc != null){
                $this->email->cc($cc);
            }
            $this->email->bcc('monalcblay@gmail.com');

            if ($attach != null){
                $this->email->attach($attach);
            }

            $nmessage = wordwrap($message, 70, "\r\n");
            $this->email->subject($subject);
            $this->email->message($nmessage);
                                                                        
            if(!$this->email->send()) {
                $result = FALSE;
                throw new \Exception('I could not send the email.' . $this->email->ErrorInfo);
            }    
                        
        }catch(Exception $e){
            //show_error($e->getMessage().' --- '.$e->getTraceAsString());
            echo $e->getMessage().' --- '.$e->getTraceAsString();
        }
        
        return $result;
    }
    /**
     * this function will be called to send MASS emails
     *
     * @param  Integer      $perPage    feild name of the databse which reqired to be displayed in the value section in dropdown list.
     * @param  Integer      $pageNumber feild name of the databse which reqired to be displayed in the value section in dropdown list.
     * @param  STDObject    $where      if additional query required it should be provided as STDObject example Array('country_name)'=>'Sri Lanka')
     * @param  Text         $AsOrder    if additional query required it should be provided as STDObject example Array('country_name)'=>'Sri Lanka')
     * @throws Some_Exception_Class If something interesting cannot happen
     * @return row / all rows in the specific table
     */
    public function sendMassEmail($to, $subject, $message, $fromEmail = "noreply@mail.com", $fromName = "Test Notification")
    {
        foreach($to as $recipient)
        {
            if($this->sendEmail($recipient, $subject, $message, $fromEmail, $fromName)){
                //echo 'Email Send';
            }else{
                //echo 'NOT Send';
            }
        }
    }
    
    
    function user_online()
    {
        // Compruebo quien esta online y almaceno sus datos en una cookie de session
        $aDatosUser = array('username' => '');

        if ($this->ion_auth->logged_in())
        {
            $user = $this->ion_auth->user()->row_array();
            
            //datos del usuario
            $aDatosUser = array(
                                'username'  => $user['username'],
                                'user_id'   => $user['id'],                                
                                'email'     => $user['email'],
                                'active'    => $user['active'],
                                'borrado'   => FALSE,
                                );
            //grupo al que pertenece
            $group = array('anfitriones','admin');
            if ($this->ion_auth->in_group($group))
            {
                $aDatosUser['borrado'] = TRUE;
            }
                        
        }
        $this->session->set_userdata($aDatosUser);
    }
    
            
    public function _render_page($view, $data = null, $returnhtml = false)
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;
        removeCache();
        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) {
            return $view_html;                
        }
    }
    
    private function fecha_act() {
        
        createFolder();                
        if (!file_exists('./files/actualizado.json')){
            $jsonvar = json_encode( date(DATE_ISO8601,  time()) ,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK );
            write_file('./files/actualizado.json',$jsonvar,'w+');
        }
        
        $json = file_get_contents('./files/actualizado.json');        
        $this->session->set_userdata('actualizado',json_decode($json));        
    }
      
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Codigo Hecho Por Paris E Vazquez */

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index()
	{
        if ($this->session->userdata('id_session')) {
            redirect('base');
        }

        if (isset($_POST['clave'])) {
            $this->load->model('Login_model');
            if($this->Login_model->ingresar($_POST['usuario'], $_POST['clave'])) {
                $this->session->set_userdata('id_session', $this->Login_model->obtener_id($_POST['usuario'], $_POST['clave'])[0]['id_usuario'] );
                $this->session->set_userdata('usuario', $this->Login_model->obtener_id($_POST['usuario'], $_POST['clave'])[0]['usuario']);
                redirect('base');
            }else
            {
                redirect('home');
            }
        }

        $data["solve"] = true;
		$this->load->view('home', $data);
    }
    
    public function cerrar_session()
    {
        if ($this->session->userdata('id_session')) {
            $this->session->sess_destroy();
        }
        redirect('home');
    }
}
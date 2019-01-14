<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Codigo Hecho Por Paris E Vazquez */

class Base extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
		$this->load->helper('url');
		$this->logeado();
    }

	public function index()
	{
		/*
        $data['usuario'] = $this->nombre_usuario();
		$this->load->view('base_top', $data);
		$this->load->view('base', $data);
		$this->load->view('base_bottom', $data);
		*/
		redirect('Base/lista_contactos');
	}

	//====================================================================

	private function logeado()
	{
		if (! $this->session->userdata('usuario')) {
			redirect('home');
		}
	}
	private function nombre_usuario()
	{
		$user = $this->session->userdata('usuario') ? $this->session->userdata('usuario') : "";
		return $user;
	}

	//====================================================================

	public function lista_contactos()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Contactos_model');
		if ( $this->input->get('column') && $this->input->get('order') )
		{
			$data['rows'] = $this->Contactos_model->lista_contactos_ordered(
				$this->session->userdata('id_session'),
				$this->input->get('column'),
				$this->input->get('order'));
		}else
		{
			$data['rows'] = $this->Contactos_model->lista_contactos($this->session->userdata('id_session'));
		}
		$this->load->view('base_top', $data);
		$this->load->view('contactos', $data);
		$this->load->view('base_bottom', $data);
	}

	public function crear_contactos()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->view('base_top', $data);
		$this->load->view('contactos_crear', $data);
		$this->load->view('base_bottom', $data);
	}

	public function crear_contactos_post()
	{
		$data = Array(
			'id_usuario' => $this->session->userdata('id_session'),
			'nombre' => $this->input->post('firstname'),
			'apellido' => $this->input->post('lastname'),
			'correo' => $this->input->post('mail'),
			'telefono' => $this->input->post('telephone'),
			'direccion' => $this->input->post('address'),
			'facebook' => $this->input->post('facebook'),
			'notas' => $this->input->post('notes'),
			'compartir' => $this->input->post('share')
		);
		$this->load->model('Contactos_model');
		$this->Contactos_model->crear_contactos($data);
		redirect('Base/crear_contactos');
	}

	public function borrar_contactos(){
		$id_contacto = $this->uri->segment(3);
		$this->load->model('Contactos_model');
		$this->Contactos_model->borrar_contactos($id_contacto);
		redirect('Base/lista_contactos');
	}

	public function compartir_contactos()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Contactos_model');
		$data['rows'] = $this->Contactos_model->lista_compartir($this->session->userdata('id_session'));
		$data['id_usuario'] = $this->session->userdata('id_session');
		$this->load->view('base_top', $data);
		$this->load->view('contactos_share', $data);
		$this->load->view('base_bottom', $data);
	}
	
	public function seleccion_multiple()
	{
		$this->load->model('Contactos_model');
		if ($this->input->post('no_compartir')) {
			$this->Contactos_model->seleccion_multiple_dejar_compartir($this->input->post('cbox'));
			redirect('Base/lista_contactos');
		}
		if ($this->input->post('compartir')) {
			$this->Contactos_model->seleccion_multiple_compartir($this->input->post('cbox'));
			redirect('Base/lista_contactos');
		}
		if ($this->input->post('borrar')) {
			$this->Contactos_model->seleccion_multiple_borrar($this->input->post('cbox'));
			redirect('Base/lista_contactos');
		}
	}

	public function editar_contactos()
	{
		$id_contacto = $this->uri->segment(3);
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Contactos_model');
		$data['row'] = $this->Contactos_model->seleccionar_un_contacto($id_contacto);

		if ( $data['row'] != false )
		{
			$this->load->view('base_top', $data);
			$this->load->view('contactos_editar', $data);
			$this->load->view('base_bottom', $data);
		}else
		{
			redirect('Base/lista_contactos');
		}
	}

	public function editar_contactos_post()
	{
		$data = Array(
			'id_contacto' => $this->input->post('id_contacto'),
			'nombre' => $this->input->post('firstname'),
			'apellido' => $this->input->post('lastname'),
			'correo' => $this->input->post('mail'),
			'telefono' => $this->input->post('telephone'),
			'direccion' => $this->input->post('address'),
			'facebook' => $this->input->post('facebook'),
			'notas' => $this->input->post('notes'),
			'compartir' => $this->input->post('share')
		);
		$this->load->model('Contactos_model');
		$this->Contactos_model->editar_contactos($data);
		redirect('Base/lista_contactos');
	}

	public function papelera_contactos()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Contactos_model');
		$data['rows'] = $this->Contactos_model->papelera_contactos($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('contactos_papelera', $data);
		$this->load->view('base_bottom', $data);
	}

	public function seleccion_multiple_papelera()
	{
		$this->load->model('Contactos_model');
		if ($this->input->post('restaurar')) {
			$this->Contactos_model->seleccion_multiple_papelera_restaurar($this->input->post('cbox'));
			redirect('Base/papelera_contactos');
		}
		if ($this->input->post('borrar')) {
			$this->Contactos_model->seleccion_multiple_papelera_borrar($this->input->post('cbox'));
			redirect('Base/papelera_contactos');
		}
	}
	//====================================================================

	public function agenda()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Agenda_model');
		$data['rows'] = $this->Agenda_model->lista_eventos($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('agenda', $data);
		$this->load->view('base_bottom', $data);

	}

	public function crear_evento()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->view('base_top', $data);
		$this->load->view('agenda_crear', $data);
		$this->load->view('base_bottom', $data);
	}

	public function crear_evento_post()
	{
		$data = Array(
			'id_usuario' => $this->session->userdata('id_session'),
            'fecha_inicio' => $this->input->post('date1'),
            'hora_inicio' => $this->input->post('time1'),
            'fecha_vigencia' => $this->input->post('date2'),
            'hora_vigencia' => $this->input->post('time2'),
            'evento' => $this->input->post('event'),
            'etiqueta' => $this->input->post('tag'),
            'compartir' => $this->input->post('share')
		);
		$this->load->model('Agenda_model');
		$this->Agenda_model->crear_evento($data);
		redirect('Base/crear_evento');
	}

	public function borrar_evento()
	{
		$id_evento = $this->uri->segment(3);
		$this->load->model('Agenda_model');
		$this->Agenda_model->borrar_evento($id_evento);
		redirect('Base/agenda');
	}

	public function compartir_eventos()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Agenda_model');
		$data['rows'] = $this->Agenda_model->lista_compartir($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('agenda_share', $data);
		$this->load->view('base_bottom', $data);
	}

	public function papelera_agenda()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Agenda_model');
		$data['rows'] = $this->Agenda_model->papelera_agenda($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('agenda_papelera', $data);
		$this->load->view('base_bottom', $data);
	}

	public function restaurar_evento_pap($id_evento)
	{
		$this->load->model('Agenda_model');
		$data['rows'] = $this->Agenda_model->papelera_agenda_restaurar($id_evento);
		redirect('Base/papelera_agenda');
	}

	public function borrar_evento_pap($id_evento)
	{
		$this->load->model('Agenda_model');
		$data['rows'] = $this->Agenda_model->papelera_agenda_borrar($id_evento);
		redirect('Base/papelera_agenda');
	}
	//====================================================================

	public function notas()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Notas_model');
		$data['rows'] = $this->Notas_model->lista_notas($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('notas', $data);
		$this->load->view('base_bottom', $data);
	}

	public function crear_nota()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->view('base_top', $data);
		$this->load->view('notas_crear', $data);
		$this->load->view('base_bottom', $data);
	}

	public function crear_nota_post()
	{
		$data = Array(
			'id_usuario' => $this->session->userdata('id_session'),
            'fecha' => $this->input->post('date'),
            'hora' => $this->input->post('time'),
            'titulo' => $this->input->post('title'),
            'cuerpo' => $this->input->post('body'),
            'etiqueta' => $this->input->post('tag'),
            'compartir' => $this->input->post('share')
		);
		$this->load->model('Notas_model');
		$data['rows'] = $this->Notas_model->crear_nota($data);
		redirect('Base/crear_nota');
	}

	public function editar_nota()
	{
		$id_nota = $this->uri->segment(3);
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Notas_model');
		$data['rows'] = $this->Notas_model->seleccionar_una_nota($id_nota);
		if ( $data['rows'] != false )
		{
			$this->load->view('base_top', $data);
			$this->load->view('notas_editar', $data);
			$this->load->view('base_bottom', $data);
		}else
		{
			redirect('Base/notas');
		}
	}

	public function editar_nota_post()
	{
		$data = Array(
			'id_nota' => $this->input->post('id_nota'),
            'fecha' => $this->input->post('date'),
            'hora' => $this->input->post('time'),
            'titulo' => $this->input->post('title'),
            'cuerpo' => $this->input->post('body'),
            'etiqueta' => $this->input->post('tag'),
            'compartir' => $this->input->post('share')
		);
		$this->load->model('Notas_model');
		$this->Notas_model->editar_nota($data);
		redirect('Base/notas');
	}

	public function borrar_nota()
	{
		$id_nota = $this->uri->segment(3);
		$this->load->model('Notas_model');
		$this->Notas_model->borrar_nota($id_nota);
		redirect('Base/notas');
	}

	public function compartir_notas()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Notas_model');
		$data['rows'] = $this->Notas_model->lista_compartir($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('notas_share', $data);
		$this->load->view('base_bottom', $data);
	}

	public function papelera_notas()
	{
		$data['usuario'] = $this->nombre_usuario();
		$this->load->model('Notas_model');
		$data['rows'] = $this->Notas_model->lista_papelera($this->session->userdata('id_session'));
		$this->load->view('base_top', $data);
		$this->load->view('notas_papelera', $data);
		$this->load->view('base_bottom', $data);
	}

	public function restaurar_nota_pap()
	{
		$id_nota = $this->uri->segment(3);
		$this->load->model('Notas_model');
		$this->Notas_model->restaurar_papelera($id_nota);
		redirect('Base/papelera_notas');
	}

	public function borrar_nota_pap()
	{
		$id_nota = $this->uri->segment(3);
		$this->load->model('Notas_model');
		$this->Notas_model->borrar_papelera($id_nota);
		redirect('Base/papelera_notas');
	}
	
	/*
		<a href="mailto:someone@example.com?Subject=Hello%20again&Body=hahaha" target="_top">Send Mail</a>
	*/
	/** Codigo Hecho Por Paris E Vazquez */
	//====================================================================
	
	public function enviar_correo_al_desarrollador()
	{
		/*
		$this->load->library('email');

		$this->email->from('');
		$this->email->to('');
		$this->email->subject('');
		$this->email->message('');

		if ( $this->email->send() )
		{
			echo "correo enviado";
		}else
		{
			echo "fallo al intentar enviar el correo";
		}
		*/
		/** Codigo Hecho Por Paris E Vazquez */
	}
}
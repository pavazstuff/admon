<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lista_eventos($id_usuario)
    {
        $this->db->select("*");
        $this->db->from("agenda");
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 0);
        $this->db->order_by('fecha_inicio','asc');
        $this->db->order_by('hora_inicio','asc');
        $q = $this->db->get();
        if ( $q->num_rows() > 0 ) 
        {
            return $q->result();
        }else
        {
            return false;
        }
    }

    public function crear_evento($data)
    {
        $this->db->insert('agenda', array(
            'id_usuario' => $data['id_usuario'],
            'fecha_inicio' => $data['fecha_inicio'],
            'hora_inicio' => $data['hora_inicio'],
            'fecha_vigencia' => $data['fecha_vigencia'],
            'hora_vigencia' => $data['hora_vigencia'],
            'evento' => $data['evento'],
            'etiqueta' => $data['etiqueta'],
            'compartir' => $data['compartir'],
            'papelera' => '0'
        ));
    }

    public function borrar_evento($id_evento)
    {
        $data = array(
            'papelera' => '1'
        );
        $this->db->where('id_evento', $id_evento);
        $this->db->update('agenda', $data);
    }

    public function lista_compartir($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('agenda');
        $this->db->where('compartir', 1);
        $this->db->where('papelera', 0);
        $this->db->where('id_usuario !=', $id_usuario);
        $this->db->order_by('fecha_inicio','asc');
        $this->db->order_by('hora_inicio','asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function papelera_agenda($id_usuario)
    {
        $this->db->select("*");
        $this->db->from("agenda");
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 1);
        $this->db->order_by('fecha_inicio','asc');
        $this->db->order_by('hora_inicio','asc');
        $q = $this->db->get();
        if ( $q->num_rows() > 0 ) 
        {
            return $q->result();
        }else
        {
            return false;
        }
    }

    public function papelera_agenda_restaurar($id_evento)
    {
        $data = array(
            'papelera' => '0'
        );
        $this->db->where('id_evento', $id_evento);
        $this->db->update('agenda', $data);
    }

    public function papelera_agenda_borrar($id_evento)
    {
        $this->db->where('id_evento', $id_evento);
        $this->db->delete('agenda');
    }
}
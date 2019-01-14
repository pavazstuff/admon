<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lista_notas($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('notas');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 0);
        $this->db->order_by('fecha', 'asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function crear_nota($data)
    {
        $this->db->insert('notas', array(
            'id_usuario' => $data['id_usuario'],
            'fecha' => $data['fecha'],
            'hora' => $data['hora'],
            'titulo' => $data['titulo'],
            'cuerpo' => $data['cuerpo'],
            'etiqueta' => $data['etiqueta'],
            'compartir' => $data['compartir'],
            'papelera' => '0'
        ));
    }

    public function seleccionar_una_nota($id_nota)
    {
        $this->db->select('*');
        $this->db->from('notas');
        $this->db->where('id_nota', $id_nota);
        $q = $this->db->get();
        if ($q->num_rows() > 0) 
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function editar_nota($data)
    {
        $datos_editar = array(
            'fecha' => $data['fecha'],
            'hora' => $data['hora'],
            'titulo' => $data['titulo'],
            'cuerpo' => $data['cuerpo'],
            'etiqueta' => $data['etiqueta'],
            'compartir' => $data['compartir']
        );
        $this->db->where('id_nota', $data['id_nota']);
        $this->db->update('notas', $datos_editar);
    }

    public function borrar_nota($id_nota)
    {
        $data = array(
            'papelera' => '1'
        );
        $this->db->where('id_nota', $id_nota);
        $this->db->update('notas', $data);
    }

    public function lista_compartir($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('notas');
        $this->db->where('compartir', 1);
        $this->db->where('papelera', 0);
        $this->db->where('id_usuario !=', $id_usuario);
        $this->db->order_by('fecha', 'asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function lista_papelera($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('notas');
        $this->db->where('papelera', 1);
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('fecha', 'asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function restaurar_papelera($id_nota)
    {
        $data = array(
            'papelera' => '0'
        );
        $this->db->where('id_nota', $id_nota);
        $this->db->update('notas', $data);
    }

    public function borrar_papelera($id_nota)
    {
        $this->db->where('id_nota', $id_nota);
        $this->db->delete('notas');
    }
}
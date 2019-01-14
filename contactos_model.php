<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lista_contactos($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 0);
        $this->db->order_by('nombre','asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            //return $q->result_array();
            return $q->result();
        }else{
            return false;
        }
    }

    public function lista_contactos_ordered($id_usuario, $col, $ascd)
    {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 0);
        $this->db->order_by($col, $ascd);
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function crear_contactos($data)
    {
        $this->db->insert('contactos', array(
            'id_usuario' => $data['id_usuario'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'facebook' => $data['facebook'],
            'notas' => $data['notas'],
            'compartir' => $data['compartir'],
            'papelera' => '0'
        ));
    }

    public function seleccionar_un_contacto($id_contacto)
    {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('id_contacto', $id_contacto);
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }
    
    public function editar_contactos($data)
    {
        $datos_editar = array(
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'facebook' => $data['facebook'],
            'notas' => $data['notas'],
            'compartir' => $data['compartir']);
        $this->db->where('id_contacto', $data['id_contacto'] );
        $this->db->update('contactos', $datos_editar);
    }

    public function borrar_contactos($id_contacto)
    {
        $data = array(
            'papelera' => '1'
        );
        $this->db->where('id_contacto', $id_contacto);
        $this->db->update('contactos', $data);
    }

    public function compartir_contactos($id_contacto)
    {
        $data = array(
            'compartir' => '1'
        );
        $this->db->where('id_contacto', $id_contacto);
        $this->db->update('contactos', $data);
    }

    public function dejar_compartir_contactos($id_contacto)
    {
        $data = array(
            'compartir' => '0'
        );
        $this->db->where('id_contacto', $id_contacto);
        $this->db->update('contactos', $data);
    }

    public function lista_compartir($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('compartir', 1);
        $this->db->where('papelera', 0);
        $this->db->where('id_usuario !=', $id_usuario);
        $this->db->order_by('nombre','asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function seleccion_multiple_borrar($lista)
    {
        $data = array(
            'papelera' => '1'
        );
        foreach($lista as $id_contacto) {
            $this->db->where('id_contacto', $id_contacto);
            $this->db->update('contactos', $data);
        }
    }

    public function seleccion_multiple_compartir($lista)
    {
        $data = array(
            'compartir' => '1'
        );
        foreach($lista as $id_contacto) {
            $this->db->where('id_contacto', $id_contacto);
            $this->db->update('contactos', $data);
        }
    }

    public function seleccion_multiple_dejar_compartir($lista)
    {
        $data = array(
            'compartir' => '0'
        );
        foreach($lista as $id_contacto) {
            $this->db->where('id_contacto', $id_contacto);
            $this->db->update('contactos', $data);
        }
    }

    public function papelera_contactos($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('papelera', 1);
        $this->db->order_by('nombre','asc');
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            return $q->result();
        }else{
            return false;
        }
    }

    public function seleccion_multiple_papelera_restaurar($lista)
    {
        $data = array(
            'papelera' => '0'
        );
        foreach($lista as $id_contacto) {
            $this->db->where('id_contacto', $id_contacto);
            $this->db->update('contactos', $data);
        }
    }

    public function seleccion_multiple_papelera_borrar($lista)
    {
        foreach($lista as $id_contacto) {
            $this->db->where('id_contacto', $id_contacto);
            $this->db->delete('contactos');
        }
    }
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ingresar($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $user);
        $this->db->where('clave', $pass);
        $q = $this->db->get();
        if( $q->num_rows() > 0 )
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function obtener_id($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $user);
        $this->db->where('clave', $pass);
        $q = $this->db->get();
        return $q->result_array();
    }
}

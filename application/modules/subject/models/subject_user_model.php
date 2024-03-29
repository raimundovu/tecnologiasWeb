<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_user_model extends CI_Model{
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      // 
    }
    
    public function get_all()
    {
        $this->db->select('*');
        return $this->db->get('asignatura_usuario')->result();
    }

    public function add($id,$code)
    {
        $data['id_usuario'] = $id;
        $data['codigo_asignatura']=$code;
        $this->db->insert('asignatura_usuario',$data);
    }


    public function get_all_proffesors()
    {
      $this->db->select('nombres, id_usuario, apellido_paterno, apellido_materno');
      $this->db->from('usuario');
      $this->db->where('usuario.tipo = 3' );
      return  $this->db->get()->result();
    }
}
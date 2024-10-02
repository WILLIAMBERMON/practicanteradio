<?php

/**
 * Created by PhpStorm.
 * User: Alirio Villamizar - Henry Alexander
 * Date: 30/10/2016
 * Time: 22:55 PM
 */
class Usuario_model extends CI_Model
{
    /**
     * usuario constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function login($user,$password)
    {
        $query = $this->db->query("select * from usuario where user = '{$user}' and password = '{$password}' and estado = 1");
        return $query->row();
    }

    public function get_usuario($id_usuario)
    {
        $query = $this->db->query("select * from usuario where id = '{$id_usuario}'");
        return $query->row();
    }

//    public function get_usuarios($id_portal)
//    {
//        $query = $this->db->query("select * from usuario where id_portal = '{$id_portal}'");
//        $results = array();
//        foreach ($query->result() as $result) {
//            $results[] = $result;
//        }
//        return $results;
//    }

    public function update_usuario($id_usuario, $info)
    {
        $this->db->where('id', $id_usuario);
        return $this->db->update('usuario', $info);
    }

}
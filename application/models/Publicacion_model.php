<?php

class Publicacion_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPublicacion($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_publicaciones "
                . "WHERE seccion = '{$id}' order by publicacion_id desc");

        return $query->result();
    }

    public function getMenuPrincipal($id_seccion) {

        $query = $this->db->query("SELECT * "
                . "FROM p_menu "
                . "WHERE id_seccion = '{$id_seccion}' AND "
                . "publicar = 1 order by orden_menu_p asc");

        return $query->result_array();
    }

    public function get_all_publicacion($id_seccion)
    {
        $query = $this->db->query("select * from p_publicaciones where seccion = '{$id_seccion}' order by publicacion_id asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_publicacion($id_publicacion)
    {
        $query = $this->db->query("select * from p_publicaciones where publicacion_id = '{$id_publicacion}'");
        return $query->row();
    }

    public function update_publicacion($id_publicacion, $info)
    {
        $this->db->where('publicacion_id', $id_publicacion);
        return $this->db->update('p_publicaciones', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_publicaciones', $info);
    }

}

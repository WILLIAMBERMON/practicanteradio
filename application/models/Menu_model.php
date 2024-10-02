<?php

class Menu_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getSeccionMenu($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_menu "
                . "WHERE id_seccion = '{$id}' and padre_menu = 0 and publicar = 1 order by orden_menu_p asc");

        return $query->result();
    }

    public function getSeccionSubmenu($id) {
    
        $query = $this->db->query("SELECT * "
                . "FROM p_menu "
                . "WHERE publicar = 1 and padre_menu != 0 and id_seccion = '{$id}' order by orden_menu asc");

        return $query->result();
    }

    public function getMenuPrincipal($id_seccion) {

        $query = $this->db->query("SELECT * "
                . "FROM p_menu "
                . "WHERE id_seccion = '{$id_seccion}' AND "
                . "publicar = 1 order by orden_menu_p asc");

        return $query->result_array();
    }
    
    public function getMenuInit($id) {

        $query = $this->db->query("SELECT id_menu "
                . "FROM p_menu "
                . "WHERE id_seccion = '{$id}' and enlace_menu != 0 and publicar = 1 order by id_menu asc limit 0,1");

        return $query->result();
    }


    public function get_all_menu($id_seccion)
    {
        $query = $this->db->query("select * from p_menu where id_seccion = '{$id_seccion}' and padre_menu = 0  order by id_menu asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_all_submenu($id_menu)
    {
        $query = $this->db->query("select * from p_menu where padre_menu = '{$id_menu}' order by id_menu asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_menu($id_menu)
    {
        $query = $this->db->query("select * from p_menu where id_menu = '{$id_menu}'");
        return $query->row();
    }

    public function update_menu($id_menu, $info)
    {
        $this->db->where('id_menu', $id_menu);
        return $this->db->update('p_menu', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_menu', $info);
    }


}

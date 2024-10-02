<?php

class Popop_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_popop_activo()
    {
        $query = $this->db->query("select * from p_popop where publicar = 1 AND  TIPO = '1' AND (NOW() BETWEEN fecha_inicio AND fecha_fin) order by id_popop desc");
        return $query->row();
    }


    public function get_all_popops()
    {
        $query = $this->db->query("select * from p_popop order by id_popop desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_popop($id_popop)
    {
        $query = $this->db->query("select * from p_popop where id_popop = '{$id_popop}'");
        return $query->row();
    }

    public function update($id_popop, $info)
    {
        $this->db->where('id_popop', $id_popop);
        return $this->db->update('p_popop', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_popop', $info);
    }

    public function get_popop_act_tipo($tipo)
    {
        $query = $this->db->query("select * from p_popop where publicar = 1 AND TIPO = '{$tipo}' AND (NOW() BETWEEN fecha_inicio AND fecha_fin) order by id_popop desc");
        return $query->row();
    }

}

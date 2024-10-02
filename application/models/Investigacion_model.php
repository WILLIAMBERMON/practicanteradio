<?php

class Investigacion_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_investigacion($id_facultad)
    {
        $query = $this->db->query("select * from p_investigacion where facultad = '{$id_facultad}' order by id_grupo asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_investigacion($id_grupo)
    {
        $query = $this->db->query("select * from p_investigacion where id_grupo = '{$id_grupo}'");
        return $query->row();
    }

    public function getInvestigacion($id) {

        $query = $this->db->query("SELECT * "
            . "FROM p_investigacion "
            . "WHERE facultad = '{$id}' and "
            . "publicar = 1 order by nombre");

        return $query->result();
    }
    
    public function update($id_grupo, $info)
    {
        $this->db->where('id_grupo', $id_grupo);
        return $this->db->update('p_investigacion', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_investigacion', $info);
    }

}

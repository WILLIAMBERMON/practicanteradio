<?php

class Documento_contenido_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_documentos_titulo($id_seccion)
    {
        $query = $this->db->query("select * from p_documento_contenido_titulo where id_seccion = '{$id_seccion}' order by id_titulo desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_all_documentos($id_titulo)
    {
        $query = $this->db->query("select * from p_documento_contenido where id_titulo = '{$id_titulo}' order by id_documento desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }


    public function get_documento_titulo($id_titulo)
    {
        $query = $this->db->query("select * from p_documento_contenido_titulo where id_titulo = '{$id_titulo}'");
        return $query->row();
    }

    public function get_documento($id_documento)
    {
        $query = $this->db->query("select * from p_documento_contenido where id_documento = '{$id_documento}'");
        return $query->row();
    }

    public function get_documentos_contenido_titulo($id_contenido)
    {
        $query = $this->db->query("select * from p_documento_contenido_titulo where id_contenido = '{$id_contenido}' and publicar = 1 order by orden asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_documentos_contenido($id_titulo)
    {
        $query = $this->db->query("select * from p_documento_contenido where id_titulo = '{$id_titulo}' and publicar = 1 order by orden asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function update_titulo($id_titulo, $info)
    {
        $this->db->where('id_titulo', $id_titulo);
        return $this->db->update('p_documento_contenido_titulo', $info);
    }

    public function update($id_documento, $info)
    {
        $this->db->where('id_documento', $id_documento);
        return $this->db->update('p_documento_contenido', $info);
    }

    public function insert_titulo($info)
    {
        return $this->db->insert('p_documento_contenido_titulo', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_documento_contenido', $info);
    }

}

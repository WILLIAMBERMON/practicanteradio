<?php

class Universidad_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTransparenciaTitulo() {

        $query = $this->db->query("SELECT * "
                . "FROM transparencia_titulo "
                . "WHERE publicar = 1 order by orden asc");

        return $query->result();
    }
    
     public function getTransparenciaContenido() {

        $query = $this->db->query("SELECT * "
                . "FROM transparencia_contenido "
                . "WHERE publicar = 1 order by orden asc");

        return $query->result();
    }

    public function getConvocatoriaTitulo($tipo = 1) {

        $query = $this->db->query("SELECT * "
            . "FROM ufps_convocatoria "
            . "WHERE publicar = 1 and tipo = '{$tipo}' order by fecha_publicado desc");

        return $query->result();
    }

    public function getConvocatoriaActividad($id) {

        $query = $this->db->query("SELECT * "
            . "FROM ufps_actividad "
            . "WHERE publicar = 1 and id_convocatoria = '{$id}' order by orden desc");

        return $query->result();
    }

    public function getContenidoTrans($idcont){

        $query = $this->db->query("SELECT * "
            . "FROM transparencia_contenido "
            . "WHERE id_contenido = '{$idcont}'");

        return $query->result();

    }

    public function getContenidoConvo($idcont){

        $query = $this->db->query("SELECT * "
            . "FROM ufps_actividad "
            . "WHERE id_actividad = '{$idcont}'");

        return $query->result();

    }

    public function getUltimaFechaTrans(){

        $query = $this->db->query("SELECT max(fecha_publicado) ultima "
            . "FROM transparencia_contenido "
            . "WHERE publicar = 1");

        return $query->row();

    }
    
    
    
    public function getSeccion($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_seccion "
                . "WHERE id_seccion = '{$id}' and publicar = 1");

        return $query->result();
    }
    
    public function getListadoUltNoticias() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 and tipo = 2 and fecha BETWEEN '2015-01-01' AND '2015-12-31' order by fecha desc ,idnoti desc");

        return $query->result();
    }

    public function getListadoNoticias() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 and tipo = 2 order by fecha desc ,idnoti desc");

        return $query->result();
    }

    public function getNoticiaActuales() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 AND tipo = 2 order by fecha desc ,idnoti desc");

        return $query->result_array();
    }

    public function getDestacadoActuales() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 AND tipo = 1 order by fecha desc ,idnoti desc");

        return $query->result_array();
    }

}

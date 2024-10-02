<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipo_seccion_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    

    public function getTipoSeccion($id_seccion) {

        $query = $this->db->query("SELECT a.id_tipo, a.id_seccion_padre, b.nombre_tipo, c.nombre_seccion, d.nombre_url "
                . "FROM p_tipo_seccion as a, p_tipo as b, p_seccion as c, p_url as d "
                . "WHERE a.id_seccion = '{$id_seccion}' "
                . "and a.id_tipo = b.id_tipo and a.id_seccion_padre = c.id_seccion and d.id_seccion = a.id_seccion_padre");

        return $query->result();
    }

 
}

/* End of file events_model.php */
/* Location: ./application/models/events_model.php */
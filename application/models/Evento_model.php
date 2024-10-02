<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Evento_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Europe/Madrid");
    }

    /**
     * @desc - añade un nuevo evento
     * @access public
     * @author Iparra
     * @return bool
     */
    public function add() {
        $this->db->set("start", $this->_formatDate($this->input->post("from")));
        $this->db->set("end", $this->_formatDate($this->input->post("to")));
        $this->db->set("url", $this->input->post("url"));
        $this->db->set("title", $this->input->post("title"));
        $this->db->set("body", $this->input->post("event"));
        $this->db->set("class", $this->input->post("class"));
        if ($this->db->insert("events")) {
            $evento = getUltimoEvento();
            
            $data = array(
                'url' => $evento->id
            );

            $this->db->where('id', $id);
            $this->db->update('p_evento', $data);
            return TRUE;
        }
        return FALSE;
    }

    public function getEvento($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_evento "
                . "WHERE id_titulo = '{$id}'");

        return $query->result();
    }

    public function getEventoActuales() {

        $query = $this->db->query("SELECT * "
                . "FROM p_evento "
                . "WHERE publicar = 1 AND (NOW() BETWEEN fecha_inicio AND fecha_fin) order by fecha_real desc");

        return $query->result_array();
    }

    public function getUltimoEvento() {

        $query = $this->db->query("SELECT * "
                . "FROM p_evento "
                . "WHERE publicar = 1 order by id desc");

        return $query->result();
    }

    /**
     * @desc - obtiene todos los registros de events
     * @access public
     * @author Iparra
     * @return object
     */
    public function getAll() {
        $query = $this->db->get('p_evento');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return object();
    }

    /**
     * @desc - formatea una fecha a microtime para añadir al evento tipo 1401517498985
     * @access private
     * @author Iparra
     * @return strtotime
     */
    private function _formatDate($date) {
        return strtotime(substr($date, 6, 4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2) . " " . substr($date, 10, 6)) * 1000;
    }



    public function get_evento($id_evento)
    {
        $query = $this->db->query("select * from p_evento where id = '{$id_evento}'");
        return $query->row();
    }

    public function get_all_eventos()
    {
        $query = $this->db->query("select * from p_evento order by id desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function update_evento($id_evento, $info)
    {
        $this->db->where('id', $id_evento);
        return $this->db->update('p_evento', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_evento', $info);
    }

}

/* End of file events_model.php */
/* Location: ./application/models/events_model.php */
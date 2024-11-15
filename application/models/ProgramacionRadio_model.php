<?php
class ProgramacionRadio_model extends CI_Model {

public function __construct() {
    parent::__construct();
    $this->load->database();
}
// Obtener toda la programacion
public function get_all_programacion() {
    $query = $this->db->get('programacion_radio');
    return $query->result();
}
// Obtener una programacion por ID
public function get_programacion($id) {
    $query = $this->db->get_where('programacion_radio', array('id' => $id));
    return $query->row();
}

// Insertar una nueva programacion
public function insert_programacion($data) {
    return $this->db->insert('programacion_radio', $data);
}

// Actualizar una programacion existente
public function update_programacion($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('programacion_radio', $data);
}

// Eliminar un programacion
public function delete_programacion($id) {
    $this->db->where('id', $id);
    return $this->db->delete('programacion_radio');
}
}

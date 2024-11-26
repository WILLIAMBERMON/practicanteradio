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
public function get_programacion_colectivo($colectivo_id) {
    $this->db->select('*'); // Selecciona todas las columnas
    $this->db->from('programacion_radio'); // Tabla de la que se hará la consulta
    $this->db->where('colectivo_id', $colectivo_id); // Filtro por categoria_id
    $this->db->order_by("CASE dia 
            WHEN 'Lunes' THEN 1 
            WHEN 'Martes' THEN 2 
            WHEN 'Miércoles' THEN 3 
            WHEN 'Jueves' THEN 4 
            WHEN 'Viernes' THEN 5 
            WHEN 'Sábado' THEN 6 
            WHEN 'Domingo' THEN 7 
            END", "ASC");
    $query = $this->db->get(); // Ejecuta la consulta

    if ($query->num_rows() > 0) {
        return $query->result(); // Devuelve los resultados como un array de objetos
    } else {
        return []; // Devuelve un array vacío si no hay resultados
    }
}
public function get_programacion_dia($dia) {
    $this->db->select('*'); // Selecciona todas las columnas
    $this->db->from('programacion_radio'); // Tabla de la que se hará la consulta
    $this->db->where('dia', $dia);
    $this->db->order_by('hora_inicio', 'ASC');
    $query = $this->db->get(); // Ejecuta la consulta

    if ($query->num_rows() > 0) {
        return $query->result(); // Devuelve los resultados como un array de objetos
    } else {
        return []; // Devuelve un array vacío si no hay resultados
    }
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

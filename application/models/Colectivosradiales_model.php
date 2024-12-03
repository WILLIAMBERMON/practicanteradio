<?php
class Colectivosradiales_model extends CI_Model {

public function __construct() {
    parent::__construct();
    $this->load->database();
}
// Obtener todos los colectivos
public function get_all_colectivos() {
    $query = $this->db->get('colectivo_radio');
    return $query->result();
}
//obtener categorias
public function obtener_categorias() {
    // Obtenemos las categorías de la base de datos
    $query = $this->db->get('categoria_colectivo');
    $categorias = array();
    foreach ($query->result() as $row) {
        $categorias[$row->id] = $row->nombre;  // 'id' es la clave, 'nombre' es el valor
    }

    return $categorias;
}
//obtener las categorias para la API
public function get_all_categorias() {
    // Obtenemos las categorías de la base de datos
    $query = $this->db->get('categoria_colectivo');
    return $query->result();
}
// Insertar una nueva categoria
public function insert_categoria($data) {
    return $this->db->insert('categoria_colectivo', $data);
}
// Obtener una categoria por ID
public function get_categoria($id) {
    $query = $this->db->get_where('categoria_colectivo', array('id' => $id));
    return $query->row();
}
// Actualizar una categoria existente
public function update_categoria($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('categoria_colectivo', $data);
}
// Eliminar un categoria
public function delete_categoria ($id) {
    $this->db->where('id', $id);
    return $this->db->delete('categoria_colectivo');
}

// Obtener un colectivo por ID
public function get_colectivo($id) {
    $query = $this->db->get_where('colectivo_radio', array('id' => $id));
    return $query->row();
}
//Obtener un colectivo por categoria
public function get_colectivo_categoria($categoria_id) {
        $this->db->select('*'); // Selecciona todas las columnas
        $this->db->from('colectivo_radio'); // Tabla de la que se hará la consulta
        $this->db->where('categoria_id', $categoria_id); // Filtro por categoria_id
        $query = $this->db->get(); // Ejecuta la consulta

        if ($query->num_rows() > 0) {
            return $query->result(); // Devuelve los resultados como un array de objetos
        } else {
            return []; // Devuelve un array vacío si no hay resultados
        }
}

// Insertar un nuevo colectivo
public function insert_colectivo($data) {
    return $this->db->insert('colectivo_radio', $data);
}

// Actualizar un colectivo existente
public function update_colectivo($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('colectivo_radio', $data);
}

// Eliminar un colectivo
public function delete_colectivo($id) {
    $this->db->where('id', $id);
    return $this->db->delete('colectivo_radio');
}
}

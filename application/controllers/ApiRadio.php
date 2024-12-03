<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRadio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProgramacionRadio_model');
        $this->load->model('Colectivosradiales_model');
        $this->load->model('Contenido_model');
    }

    // Obtener toda la programación
    public function get_programacion() {
        $data = $this->ProgramacionRadio_model->get_all_programacion();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    // Obtener todos los colectivos
    public function get_colectivos() {
        $data = $this->Colectivosradiales_model->get_all_colectivos();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    // Obtener categorías
    public function get_categorias() {
        $data = $this->Colectivosradiales_model->get_all_categorias();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function get_integrantes() {
        $contenidos = $this->Contenido_model->get_all_contenido(195);
        $array_contenido=[];
        foreach ($contenidos as $contenido) {
            $array_contenido[$contenido->nombre_contenido]=  $contenido->desc_contenido ;
        }
        if(isset($array_contenido['equipo_ufps_radio'])) {
        $data = json_decode($array_contenido['equipo_ufps_radio']);
        }else{
            $data = ["vacio"=>"no se han cargado integrantes"];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
}
}
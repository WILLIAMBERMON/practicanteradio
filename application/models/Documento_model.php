<?php

class Documento_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getDocumento($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_documento "
                . "WHERE id_documento = '{$id}' and publicar = 1");

        return $query->result();
    }

    public function getEntidad() {

        $query = $this->db->query("SELECT b.id_seccion, "
                . "b.nombre_seccion "
                . "FROM p_documento as a, "
                . "p_seccion as b "
                . "where a.id_seccion=b.id_seccion "
                . "and a.id_acto!=0 "
                . "group by b.id_seccion,b.nombre_seccion");

        return $query->result();
    }

    public function getActoEntidad($id) {

        $query = $this->db->query("SELECT  a.id_acto, a.NombreActo "
                . "FROM p_acto as a, p_documento as b "
                . "where b.id_seccion='{$id}' "
                . "and a.id_acto=b.id_acto "
                . "group by a.id_acto,a.NombreActo");

        return $query->result();
    }

    public function getAnyoActoEntidad($id_seccion, $id_acto) {

        $query = $this->db->query("SELECT year(fecha_documento) as m_year "
                . "FROM p_documento "
                . "where id_seccion='{$id_seccion}' "
                . "and id_acto='{$id_acto}' "
                . "group by year(fecha_documento)");

        return $query->result();
    }

    public function getBuscarDocumento($id_seccion, $id_acto, $id_anyo) {

        $query = $this->db->query("SELECT  a.id_documento, b.nombre_seccion, c.NombreActo, a.numero_acto, a.fecha_documento, a.descripcion_documento, a.archivo "
                . "FROM p_documento as a, p_seccion as b, p_acto as c "
                . "where a.id_seccion='{$id_seccion}' "
                . "and b.id_seccion='{$id_seccion}' "
                . "and a.id_acto='{$id_acto}' "
                . "and a.id_acto!=0 "
                . "and c.id_acto='{$id_acto}' "
                . "and year(a.fecha_documento)='{$id_anyo}' "
                . "and a.publicar=1 "
                . "order by a.fecha_documento desc ,a.id_acto desc");

        return $query->result();
    }
    
    public function getActoSeccion() {

        $query = $this->db->query("SELECT  a.id_documento, b.nombre_seccion, c.NombreActo, a.numero_acto, a.fecha_documento, a.descripcion_documento, a.archivo "
                . "FROM p_documento as a, p_seccion as b, p_acto as c "
                . "where a.id_seccion=b.id_seccion "
                . "and a.id_acto=c.id_acto "
                . "and a.id_acto!=0 "
                . "and a.publicar=1 "
                . "order by a.fecha_documento desc, a.id_acto desc limit 0,10");

        return $query->result();
    }
    
    public function getActoPrincipales(){
        
             $query = $this->db->query("SELECT a.id_seccion, a.id_documento, a.descripcion_documento, a.fecha_documento, a.archivo "
                     . "FROM p_documento as a, p_acto as b , p_seccion as c "
                     . "where a.id_seccion=c.id_seccion "
                     . "and a.id_acto = b.id_acto "
                     . "and a.prioridad >=1 "
                     . "and a.publicar=1 "
                     . "order by a.prioridad ASC");

        return $query->result();
        
    }
    
      public function getDocumentosAnexos($id_seccion){
        
             $query = $this->db->query("SELECT id_documento, descripcion_documento, fecha_documento, archivo "
                     . "FROM p_documento "
                     . "where id_seccion='{$id_seccion}' "
                     . "and id_acto = 0 "
                     . "and publicar=1 "
                     . "order by fecha_actualizacion ASC");

        return $query->result();
        
    }
    
        public function getBuscarDocumentoRecientes($id_seccion) {

        $query = $this->db->query("SELECT  a.id_documento, b.nombre_seccion, c.NombreActo, a.numero_acto, a.fecha_documento, a.descripcion_documento, a.archivo "
                . "FROM p_documento as a, p_seccion as b, p_acto as c "
                . "where a.id_seccion='{$id_seccion}' "
                . "and a.id_seccion= b.id_seccion "
                . "and a.id_acto!=0 "
                . "and a.publicar=1 "
                . "and a.id_acto = c.id_acto "
                . "order by a.fecha_documento desc, a.numero_acto desc limit 0,10");

        return $query->result();
    }

    public function get_all_entidades()
    {
        $query = $this->db->query("SELECT b.id_seccion, b.nombre_seccion FROM p_documento as a, p_seccion as b where a.id_seccion=b.id_seccion and a.id_acto!=0 
        group by b.id_seccion,b.nombre_seccion");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_all_actos($id_seccion)
    {
        $query = $this->db->query("SELECT  a.id_acto, a.NombreActo 
            FROM p_acto as a, p_documento as b 
            where b.id_seccion='{$id_seccion}' 
            and a.id_acto=b.id_acto 
            group by a.id_acto,a.NombreActo");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_documento($id_documento)
    {
        $query = $this->db->query("select * from p_documento where id_documento = '{$id_documento}'");
        return $query->row();
    }

    public function get_all_documentos($id_seccion, $id_acto)
    {
        $query = $this->db->query("select * from p_documento where id_seccion = '{$id_seccion}' and id_acto = '{$id_acto}' order by id_documento desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function update_documento($id_documento, $info)
    {
        $this->db->where('id_documento', $id_documento);
        return $this->db->update('p_documento', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_documento', $info);
    }


    public function get_all_archivos()
    {
        $query = $this->db->query("select * from p_archivo order by id_archivo desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function insert_archivo($info)
    {
        return $this->db->insert('p_archivo', $info);
    }

}

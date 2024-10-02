<?php

class Noticia_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getNoticia($id) {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE id_titulo = '{$id}' and tipo = 2");

        return $query->result();
    }

//    public function getListadoUltNoticias() {
//
//        $query = $this->db->query("SELECT * "
//                . "FROM noticia "
//                . "WHERE publicar = 1 and tipo = 2 and fecha BETWEEN '2015-01-01' AND '2015-12-31' order by fecha desc ,idnoti desc");
//
//        return $query->result();
//    }
    public function getListadoUltNoticias() {

        $query = $this->db->query("SELECT * "
            . "FROM noticia "
            . "WHERE publicar = 1 and tipo = 2 and categoria = 1 order by fecha desc, numero desc limit 0,4");

        return $query->result();
    }

    public function getListadoUltNoticiasRadio() {

        $query = $this->db->query("SELECT * "
            . "FROM noticia "
            . "WHERE publicar = 1 and tipo = 2 and categoria = 2 order by fecha desc, numero desc limit 0,4");

        return $query->result();
    }


    public function getListadoNoticias() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 and tipo = 2 and categoria = 1 order by fecha desc ,idnoti desc");

        return $query->result();
    }

    public function getNoticiaActuales() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 AND tipo = 2 order by fecha desc ,idnoti desc");

        return $query->result_array();
    }
    
      public function getDestacado($id) {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE id_titulo = '{$id}' and tipo = 1 and publicar = 1");

        return $query->result();
    }

    
//Publicación de Comunicado y Providencia judicial
public function getDestacadoActuales() {
    /*(SELECT *  FROM `noticia` WHERE `idNoti` = 5258)
    UNION
    (SELECT *  FROM `noticia` WHERE publicar = 1 AND tipo = 1 order by fecha_real desc, idnoti desc limit 0,3)*/
    $query = $this->db->query("SELECT *  FROM `noticia` WHERE publicar = 1 AND tipo = 1 
    order by fecha_real desc, idnoti desc limit 0,3");

    return $query->result_array();
}

  /*  public function getDestacadoActuales() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 AND tipo = 1 order by fecha_real desc ,idnoti desc limit 0,3");

        return $query->result_array();
    } */
    
       public function getDestacadoRecientes() {

        $query = $this->db->query("SELECT * "
                . "FROM noticia "
                . "WHERE publicar = 1 AND tipo = 1 order by fecha_real desc ,idnoti desc");

        return $query->result_array();
    }

    public function getIdNoticia($id){

        $query = $this->db->query("SELECT idNoti "
            . "FROM noticia "
            . "WHERE id_titulo = '{$id}' and publicar = 1");

        return $query->row();

    }

    public function getNoticiaImg($id){

        $query = $this->db->query("SELECT * "
            . "FROM noticia_img "
            . "WHERE publicar = 1 and idNoti = '{$id}'");

      //  return $query->result();

       return $query->row();


    }

    public function getNoticiaImgAll($id){

        $query = $this->db->query("SELECT * "
            . "FROM noticia_img "
            . "WHERE idNoti = '{$id}'");

        //  return $query->result();

        return $query->row();


    }

    public function get_noticia($id_noticia)
    {
        $query = $this->db->query("select * from noticia where idNoti = '{$id_noticia}'");
        return $query->row();
    }

    public function get_all_noticias()
    {
        $query = $this->db->query("select * from noticia where idNoti > 4261 and tipo = 2 order by idNoti desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_all_informaciones()
    {
        $query = $this->db->query("select * from noticia where tipo = 3 order by fecha_real desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function update_noticia($id_noticia, $info)
    {
        $this->db->where('idNoti', $id_noticia);
        return $this->db->update('noticia', $info);
    }

    public function update_firma($id_noticia, $firma)
    {

        $data = array(
            'firma' => $firma
        );

        $this->db->where('idNoti', $id_noticia);
        return $this->db->update('noticia', $data);

    }

    public function insert($info)
    {
        return $this->db->insert('noticia', $info);
    }

    public function insertImg($info)
    {
        return $this->db->insert('noticia_img', $info);
    }

    public function update_noticia_img($id_noticia, $info)
    {
        $this->db->where('idNoti', $id_noticia);
        return $this->db->update('noticia_img', $info);
    }

    public function get_all_novedades()
    {
        $query = $this->db->query("select * from noticia where tipo = 1 and publicar = 1 order by idNoti desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_noticia_informacion($id_titulo)
    {
        $query = $this->db->query("select * from noticia where 	id_titulo = '{$id_titulo}' and tipo = 3 and publicar = 1");
        return $query->row();
    }

}

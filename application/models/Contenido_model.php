<?php

class Contenido_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_menu_principal()
    {
        $query = $this->db->query("select * from p_contenido where id_contenido = 618");
        return $query->row();
    }

    public function get_menu_radio()
    {
        $query = $this->db->query("select * from p_contenido where id_contenido = 1387");
        return $query->row();
    }

    public function getContenido($id, $idcont)
    {

        //        $query = $this->db->query("SELECT * "
        //                . "FROM p_contenido "
        //                . "WHERE id_seccion = '{$id}' and "
        //                . "id_contenido = '{$idcont}'");

        $query = $this->db->query("SELECT * "
            . "FROM p_contenido "
            . "WHERE id_contenido = '{$idcont}'");

        return $query->result();
    }




    public function getMenuPrincipal($id_seccion)
    {

        $query = $this->db->query("SELECT * "
            . "FROM p_menu "
            . "WHERE id_seccion = '{$id_seccion}' AND "
            . "publicar = 1 order by orden_menu_p asc");

        return $query->result_array();
    }

    public function getLicitaciones($anyo)
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitaciones "
            . "WHERE anyo = '{$anyo}' order by grupo desc, orden desc");

        return $query->result();
    }
    public function getLicitaciones2014()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2014 order by grupo desc, orden desc");

        return $query->result();
    }
    public function getLicitaciones2015()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2015 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2016()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2016 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2017()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2017 order by grupo desc, orden desc");

        return $query->result();
    }
    public function getLicitaciones2018()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2018 order by grupo desc, orden desc");

        return $query->result();
    }
    public function getLicitaciones2019()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2019 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2020()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2020 WHERE publicar = 1 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2021()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2021 WHERE publicar = 1 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2022()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2022 WHERE publicar = 1 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitaciones2023()
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacion2023 WHERE publicar = 1 order by grupo desc, orden desc");

        return $query->result();
    }

    public function getLicitacionesw($año)
    {

        $query = $this->db->query("SELECT * "
            . "FROM licitacionw WHERE publicar = 1 and ano = '{$año}' order by grupo desc, orden desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2015()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2015 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2016()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2016 order by idgrupo desc");

        return $query->result();
    }


    public function getGrupoLicitaciones2017()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2017 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2018()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2018 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2019()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2019 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2020()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2020 WHERE publicar = 1 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2021()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2021 WHERE publicar = 1 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitaciones2022()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2022 WHERE publicar = 1 order by idgrupo desc");

        return $query->result();
    }
    public function getGrupoLicitaciones2023()
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolic2023 WHERE publicar = 1 order by idgrupo desc");

        return $query->result();
    }

    public function getGrupoLicitacionesw($año)
    {

        $query = $this->db->query("SELECT * "
            . "FROM grupolicw WHERE publicar = 1 and ano = '{$año}' order by idgrupo desc");

        return $query->result();
    }

    public function get_all_contenido($id_seccion)
    {
        $query = $this->db->query("select * from p_contenido where id_seccion = '{$id_seccion}' order by id_contenido asc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_contenido($id_contenido)
    {
        $query = $this->db->query("select * from p_contenido where id_contenido = '{$id_contenido}'");
        return $query->row();
    }

    public function update_contenido($id_contenido, $info)
    {
        $this->db->where('id_contenido', $id_contenido);
        return $this->db->update('p_contenido', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_contenido', $info);
    }
}

<?php

class Seccion_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        
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
    
    public function getUrlSeccion($id) {

        $query = $this->db->query("SELECT * "
                . "FROM p_url "
                . "WHERE nombre_url = '{$id}'");

        return $query->result();
    }

    public function getSeccionImg($id_seccion){

        $query = $this->db->query("SELECT * "
            . "FROM p_seccion_img "
            . "WHERE id_seccion = $id_seccion");

        return $query->row();

    }


    public function get_all_secciones($rol_usuario)
    {
        $query = $this->db->query("select * from p_seccion where rol_usuario = '{$rol_usuario}' order by id_seccion desc");
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function get_seccion($id_seccion)
    {
        $query = $this->db->query("select * from p_seccion where id_seccion = '{$id_seccion}'");
        return $query->row();
    }

    public function get_link($id_seccion)
    {
        $query = $this->db->query("select * from p_url where id_seccion = '{$id_seccion}'");
        return $query->row();
    }

    public function get_seccion_nombre($nombre_seccion)
    {
        $query = $this->db->query("select * from p_seccion where nombre_seccion = '{$nombre_seccion}'");
        return $query->row();
    }
    
    public function update_seccion($id_seccion, $info)
    {
        $this->db->where('id_seccion', $id_seccion);
        return $this->db->update('p_seccion', $info);
    }

    public function insert($info)
    {
        return $this->db->insert('p_seccion', $info);
    }

    public function insert_url($info)
    {
        return $this->db->insert('p_url', $info);
    }

    public function update_url($id_seccion, $info)
    {
        $this->db->where('id_seccion', $id_seccion);
        return $this->db->update('p_url', $info);
    }


    public function insert_imagen_banner($info)
    {
        return $this->db->insert('p_seccion_img', $info);
    }

    public function get_imagen_seccion($id_seccion)
    {
        $query = $this->db->query("select * from p_seccion_img where id_seccion = '{$id_seccion}'");
        return $query->row();
    }

    public function validar_nombre_imagen_seccion($nombre)
    {
        $query = $this->db->query("select id from p_seccion_img where img1 = '{$nombre}' or img2 = '{$nombre}' or 
                                    img3 = '{$nombre}' or img4 = '{$nombre}' or img5 = '{$nombre}' or 
                                    img6 = '{$nombre}'");
        return $query->result();
    }


    public function update_imagen_banner($id_imagen, $info)
    {
        $this->db->where('id', $id_imagen);
        return $this->db->update('p_seccion_img', $info);
    }

    public function get_all_images() //obtiene todas las imágenes de la tabla en lista
    {
        $query = $this->db->query("SELECT DISTINCT imagen
                                    FROM (
                                        SELECT img1 AS imagen FROM p_seccion_img WHERE img1 IS NOT NULL
                                        UNION ALL
                                        SELECT img2 AS imagen FROM p_seccion_img WHERE img2 IS NOT NULL
                                        UNION ALL
                                        SELECT img3 AS imagen FROM p_seccion_img WHERE img3 IS NOT NULL
                                        UNION ALL
                                        SELECT img4 AS imagen FROM p_seccion_img WHERE img4 IS NOT NULL
                                        UNION ALL
                                        SELECT img5 AS imagen FROM p_seccion_img WHERE img5 IS NOT NULL
                                        UNION ALL
                                        SELECT img6 AS imagen FROM p_seccion_img WHERE img6 IS NOT NULL
                                    ) AS imagenes
                                    ORDER BY imagen");
        return $query->result();
    }

    public function validar_seccion($id_seccion) 
    {
        $query = $this->db->query(" SELECT count(id_estilo) as cantidad, 'estilo_seccion' as tabla
                                    FROM estilo_seccion
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_contenido) as cantidad, 'p_contenido' as tabla
                                    FROM p_contenido
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_documento) as cantidad, 'p_documento' as tabla
                                    FROM p_documento
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_noticia) as cantidad, 'p_noticia' as tabla
                                    FROM p_noticia
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_url) as cantidad, 'p_url' as tabla
                                    FROM p_url
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_etrabajo) as cantidad, 'p_etrabajo' as tabla
                                    FROM p_etrabajo
                                    WHERE id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_grupo) as cantidad, 'p_investigacion' as tabla
                                    FROM p_investigacion
                                    WHERE facultad = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_tipo_seccion) as cantidad, 'p_tipo_seccion_hija' as tabla 
                                    FROM p_tipo_seccion where id_seccion = '{$id_seccion}'

                                    UNION ALL

                                    SELECT count(id_tipo_seccion) as cantidad, 'p_tipo_seccion_padre' as tabla 
                                    FROM p_tipo_seccion where id_seccion_padre = '{$id_seccion}'

                                    UNION ALL

                                    SELECT COUNT(id) as cantidad, 'p_seccion_img' as tabla 
                                    FROM p_seccion_img 
                                    WHERE id_seccion = '{$id_seccion}' 

                                    UNION ALL

                                    SELECT count(id_menu) as cantidad, 'p_menu' as tabla 
                                    FROM p_menu  where id_seccion = '{$id_seccion}'

                                    ORDER BY tabla ASC

                                    ");
        return $query->result();
    }

    public function borrar_registro_seccion($id_seccion, $tipo_registro)
    {
        $tabla = '';

        switch ($tipo_registro) 
        {
            case "Estilo CSS":
                $tabla = "estilo_seccion";
                break;
            case "Contenido":
                $tabla = "p_contenido";
                break;
            case "Documento":
                $tabla = "p_documento";
                break;
            case "Personal":
                $tabla = "p_etrabajo";
                break;
            case "Grupo de investigación":
                $tabla = "p_investigacion";
                break;
            case "Noticia":
                $tabla = "p_noticia";
                break;
            case "Imagen":
                $tabla = "p_seccion_img";
                break;
            case "Tipo de sección secundaria":
                $tabla = "p_tipo_seccion_hija";
                break;
            case "Tipo de sección principal":
                $tabla = "p_tipo_seccion_padre";
                break;
            case "URL":
                $tabla = "p_url";
                break;
            case "Menú":
                $tabla = "p_menu";
                break;
            default:
                return false; // Manejamos el error retornando false
        }

        if (!empty($tabla)) 
        {
            if ($tabla == 'p_investigacion') 
            {
                $this->db->where('facultad', $id_seccion);
            } 
            else if ($tabla == 'p_tipo_seccion_hija') //Es una sección hija y solo va a eliminar un registro
            {
                $tabla = "p_tipo_seccion";
                $this->db->where('id_seccion', $id_seccion);
            }
            else if ($tabla == 'p_tipo_seccion_padre') //Es una sección padre y va a eliminar a todas las hijas y sus registros relacionados
            {
                return $this->eliminar_hijas($id_seccion);
            }
            else 
            {
                $this->db->where('id_seccion', $id_seccion);
            }

            return $this->db->delete($tabla);
        } else {
            return false; // Manejamos el error retornando false si la tabla está vacía
        }
    }

    function eliminar_hijas($id_seccion)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Buscar las secciones hijas de esa sección padre
        $query = $this->db->query("SELECT id_seccion FROM p_tipo_seccion WHERE id_seccion_padre = '{$id_seccion}'");
        $resultado = $query->result();

        // Recorrer las secciones hijas
        foreach ($resultado as $hija) 
        {
            // Validar las tablas relacionadas con cada sección hija
            $tablas_relacionadas = $this->validar_seccion($hija->id_seccion);

            // Recorrer las tablas relacionadas para cada sección hija
            foreach ($tablas_relacionadas as $tabla)
            {
                if ($tabla->cantidad > 0)
                {
                    // Eliminar registros de la tabla relacionada
                    if (!$this->borrar_registro_hija($hija->id_seccion, $tabla->tabla)) {
                        // Si alguna eliminación falla, revertir la transacción
                        $this->db->trans_rollback();
                        return false;
                    }
                }
            }
        }

        // Completar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Algo falló, revertir los cambios
            return false;
        } else {
            // Todo fue exitoso, confirmar los cambios
            return true;
        }
    }

    function borrar_registro_hija($id_seccion, $tabla)
    {
        // Iniciar una transacción
        $this->db->trans_start();
        
        // Determinar la tabla y las condiciones para eliminar registros
        if ($tabla == 'p_investigacion') 
        {
            $this->db->where('facultad', $id_seccion);
        }    
        else if ($tabla == 'p_tipo_seccion_hija')  // Es una sección hija
        {
            $tabla = "p_tipo_seccion";  // Cambia la tabla a p_tipo_seccion
            $this->db->where('id_seccion', $id_seccion);
        }
        else if ($tabla == 'p_tipo_seccion_padre')  // Es una sección padre
        {
            // Llama a la función para eliminar hijas y sus registros
            $resultado = $this->eliminar_hijas($id_seccion);
            
            // Si falla la eliminación de las hijas, revertir la transacción
            if (!$resultado) {
                $this->db->trans_rollback();
                return false;
            }
            
            // Si las hijas fueron eliminadas correctamente, no necesitamos hacer más
            $this->db->trans_complete();
            return true;
        }
        else 
        {
            $this->db->where('id_seccion', $id_seccion);
        }

        // Intentar eliminar el registro en la tabla
        $resultado = $this->db->delete($tabla);

        // Completar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE || !$resultado) {
            // Algo falló, revertir los cambios
            return false;
        }

        // Todo fue exitoso
        return true;
    }

    function delete_seccion($id_seccion)
    {
        // Inicia la transacción
        $this->db->trans_start();
        
        // Validar las tablas relacionadas con la sección
        $tablas = $this->validar_seccion($id_seccion);

        foreach($tablas as $tabla)
        {
            if($tabla->cantidad > 0)
            {
                // Condiciones para eliminar registros en diferentes tablas
                if ($tabla->tabla == 'p_investigacion') 
                {
                    $this->db->where('facultad', $id_seccion);
                } 
                else if ($tabla->tabla == 'p_tipo_seccion_hija') // Es una sección hija
                {
                    $tabla->tabla = "p_tipo_seccion";  // Cambia la tabla a p_tipo_seccion
                    $this->db->where('id_seccion', $id_seccion);
                }
                else if ($tabla->tabla == 'p_tipo_seccion_padre') // Es una sección padre
                {
                    // Si es una sección padre, eliminamos las hijas
                    if (!$this->eliminar_hijas($id_seccion)) {
                        // Si falla la eliminación de las hijas, cancelamos la transacción
                        $this->db->trans_rollback();
                        return false;
                    }
                }
                else 
                {
                    $this->db->where('id_seccion', $id_seccion);
                }

                // Elimina los registros de la tabla especificada
                $this->db->delete($tabla->tabla);
            }
        }

        // Después de eliminar los registros relacionados, elimina la sección principal
        $this->db->where('id_seccion', $id_seccion);
        $this->db->delete('p_seccion');

        // Completa la transacción
        $this->db->trans_complete();

        // Verifica si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Algo falló, se hace rollback automáticamente
            return false;
        } else {
            // Todo salió bien, la transacción fue commit
            return true;
        }
    }


}

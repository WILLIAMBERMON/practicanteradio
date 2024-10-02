<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CMS_Controller extends CI_Controller
{

    public function __construct()
    {

        //        date_default_timezone_set("America/Bogota");
        //        $date1 = new DateTime("now");
        //        $date2 = new DateTime("2015-02-07");
        //        $date3 = new DateTime("2015-02-13");
        //        $msj = "Este portal estará habilitado desde el día 09 hasta el 13 de Febrero de 2015.";
        //        if (($date1 < $date2) || ($date1 > $date3)) {
        //            show_error($msj);
        //        }

        parent::__construct();
        if (ENVIRONMENT == 'development') {
            $this->output->enable_profiler(TRUE);
        }
        $this->_init_globals();
        if ($userdata = $this->session->userdata(SESSION_NAME)) {
            $this->template->set('userdata', $userdata);
        }

        $this->load->model('contenido_model', 'c_model');

        $menuprincipal = $this->c_model->get_menu_principal();
        //        echo '<pre>'; print_r($menuprincipal); return;
        $this->template->set('menuprincipal', $menuprincipal);


        $this->session->userdata['queries'] = array();
        $this->session->userdata['query_time'] = array();
        $this->session->userdata['query_nrows'] = array();
    }

    private function _init_globals()
    {

        //Sesion
        define('SESSION_NAME', 'user_ufps_cecom');
        //Ruta Documento de Normatividad 
        define('RUTA_REGLAMENTACION', base_url("/public/archivos/reglamentacion"));
        //Ruta Documento de la Sección
        define('RUTA_ARCHIVO', base_url("/public/archivos/"));
        //Ruta Documento de Universidad
        define('RUTA_ARCHIVO_UNIVERSIDAD', base_url("/public/archivos/universidad"));
        //Ruta Documento de Oferta académica
        define('RUTA_OFERTA_ACADEMICA', base_url("/public/archivos/oferta_academica"));
        //Ruta Documento de Publicaciones
        define('RUTA_PUBLICACIONES', base_url("/public/archivos/publicaciones"));

        //Noticia
        define('MAX_SIZE_NOTICIA', 200);
        define('MAX_WIDTH_NOTICIA', 1910);
        define('MAX_HEIGHT_NOTICIA', 560);
        define('PATH_NOTICIA', "public/imagenes/noticia/");
        define('PATH_NOTICIA_DIVISIST', "ufpsnuevo/archivos/");

        define('MAX_SIZE_NOTICIA_PEQ', 40);
        define('MAX_WIDTH_NOTICIA_PEQ', 110);
        define('MAX_HEIGHT_NOTICIA_PEQ', 40);

        define('MAX_SIZE_NOTICIA_GRAN', 80);
        define('MAX_WIDTH_NOTICIA_GRAN', 810);
        define('MAX_HEIGHT_NOTICIA_GRAN', 310);

        define('MAX_SIZE_NOTICIA_DIV', 80);
        define('MAX_WIDTH_NOTICIA_DIV', 271);
        define('MAX_HEIGHT_NOTICIA_DIV', 111);

        //Noticia Boletín
        define('MAX_SIZE_NOTI_BOLETIN', 200);
        define('MAX_WIDTH_NOTI_BOLETIN', 342);
        define('MAX_HEIGHT_NOTI_BOLETIN', 347);
        define('PATH_NOTI_BOLETIN', "public/imagenes/seccion/");


        //Archivo
        define('MAX_SIZE_ARCHIVO', 1024);
        define('MAX_WIDTH_ARCHIVO', 847);
        define('MAX_HEIGHT_ARCHIVO', 1600);
        define('PATH_ARCHIVO', "public/imagenes/seccion/");

        //Galeria
        define('MAX_SIZE_GALERIA', 100);
        define('MAX_WIDTH_GALERIA', 710);
        define('MAX_HEIGHT_GALERIA', 410);
        define('PATH_GALERIA', "public/imagenes/noticias/");

        //Evento
        define('MAX_SIZE_EVENTO', 150);
        define('MAX_WIDTH_EVENTO', 710);
        define('MAX_HEIGHT_EVENTO', 355);
        define('PATH_EVENTO', "public/imagenes/eventos/");

        define('MAX_SIZE_EVENTO_PEQ', 50);
        define('MAX_WIDTH_EVENTO_PEQ', 263);
        define('MAX_HEIGHT_EVENTO_PEQ', 100);

        //Popop
        define('MAX_SIZE_POPOP', 150);
        define('MAX_WIDTH_POPOP', 568);
        define('MAX_HEIGHT_POPOP', 568);
        define('PATH_POPOP', "public/imagenes/popop/");

        //Publicacion
        define('MAX_SIZE_PUBLICACION', 30);
        define('MAX_WIDTH_PUBLICACION', 85);
        define('MAX_HEIGHT_PUBLICACION', 126);
        define('MAX_SIZE_PUBLICACIONAR', 900);
        define('MAX_WIDTH_PUBLICACIONAR', 1276);
        define('MAX_HEIGHT_PUBLICACIONAR', 1860);
        define('PATH_PUBLICACION', "public/imagenes/publicaciones/");

        //Documento Archivo
        define('PATH_PDF_ARCHIVO', "public/archivos/pdf/");
        define('PATH_PDF_NOTI_DIVISIST', "public/documentos/");
        define('MAX_SIZE_PDF_ARCHIVO', 50000);

        //Documento Evento
        define('PATH_PDF_DOCUMENTO_EVENTO', "public/archivos/evento/");
        define('MAX_SIZE_PDF_EVENTO', 20480);

        //Documento Licitacion
        define('PATH_PDF_DOCUMENTO_LICITACION', "public/archivos/rectoria/pdf/");
        define('MAX_SIZE_PDF_LICITACION', 20480);

        //Documento Actividad
        define('PATH_PDF_DOCUMENTO_ACTIVIDAD', "public/archivos/universidad/");
        define('MAX_SIZE_PDF_ACTIVIDAD', 20480);

        //Documento Publicacion
        define('PATH_PDF_DOCUMENTO_PUBLICACION', "public/archivos/publicaciones/");
        define('MAX_SIZE_PDF_PUBLICACION', 20480);

        //Documento Calendario
        define('PATH_PDF_DOCUMENTO_CALENDARIO', "public/archivos/calendarios/");
        define('MAX_SIZE_PDF_CALENDARIO', 20480);


        //Documento Novedad
        define('PATH_PDF_DOCUMENTO_NOVEDAD', "public/archivos/reglamentacion/");
        define('MAX_SIZE_PDF_NOVEDAD', 20480);

        //Documento Menu
        define('PATH_PDF_DOCUMENTO_MENU', "public/archivos/oferta_academica/");
        define('MAX_SIZE_PDF_MENU', 20480);

        //Documento Normatividad
        define('PATH_PDF_DOCUMENTO_NORMATIVIDAD', "public/archivos/reglamentacion/");
        define('MAX_SIZE_PDF_NORMATIVIDAD', 20480);

        //Documento Contenido
        define('PATH_PDF_DOCUMENTO_CONTENIDO_DOC', "public/archivos/contenido/");
        define('MAX_SIZE_PDF_CONTENIDO_DOC', 20480);

        //Contenido
        define('MAX_SIZE_IMG_CONTENIDO', 1024);
        define('MAX_WIDTH_IMG_CONTENIDO', 1500);
        define('MAX_HEIGHT_IMG_CONTENIDO', 768);
        define('PATH_IMG_CONTENIDO', "public/contenido/imagen/");
        define('MAX_SIZE_PDF_CNOTENIDO', 10240);
        define('PATH_PDF_CONTENIDO', "public/contenido/archivo/");
        //Documento
        define('PATH_PDF_DOCUMENTO_CONTENIDO', "public/documento/");
        //Plantilla
        define('ID_TEMPLATE', 1);
        define('PATH_TEMPLATE', "public/template/");
        define('MAX_SIZE_LOGO', 1024);
        define('MAX_WIDTH_LOGO', 1500);
        define('MAX_HEIGHT_LOGO', 768);
        define('MAX_SIZE_ESCUDO', 1024);
        define('MAX_WIDTH_ESCUDO', 1500);
        define('MAX_HEIGHT_ESCUDO', 768);
        define('MAX_SIZE_LOGO_FOOTER', 1024);
        define('MAX_WIDTH_LOGO_FOOTER', 1500);
        define('MAX_HEIGHT_LOGO_FOOTER', 768);
        define('MAX_SIZE_ESCUDO_FOOTER', 1024);
        define('MAX_WIDTH_ESCUDO_FOOTER', 1500);
        define('MAX_HEIGHT_ESCUDO_FOOTER', 768);
        //Extra
        define('MUNICIPIO', "Municipio de Tibú");
        define('ALCALDIA', "Alcaldía de Municipio de Tibú - Norte de Santander");
        define('URL_ALCALDIA', 'http://tibu-nortedesantander.gov.co/');
        define('URL_FACEBOOK', 'https://www.facebook.com/tibu.nortedesantander');
        define('URL_TWITTER', 'https://twitter.com/alcaldiadetibu');
        define('URL_ATENCION', 'http://tibu-nortedesantander.gov.co/Notificaciones.shtml');
        define('URL_RSS', 'http://tibu-nortedesantander.gov.co/RSS.shtml');
        define('URL_NUESTRA_ALCALDIA', 'http://tibu-nortedesantander.gov.co/quienes_somos.shtml');
        define('URL_TRAMITES', 'http://tibu-nortedesantander.gov.co/tramites.shtml');
        define('URL_PLANEACION', 'http://tibu-nortedesantander.gov.co/Informes_empalme.shtml');
        define('URL_PRESUPUESTO', 'http://tibu-nortedesantander.gov.co/Inventario_bienes.shtml');
        define('URL_PARTICIPACION', 'http://tibu-nortedesantander.gov.co/foros.shtml');
    }


    /**
     * Función que recibe una fecha en formato DD/MM/YYY y la retorna en un formato legible.
     *
     * Ejemplo:
     * recibe   01/01/2016
     * retorna  Viernes 1 de Enero de 2016
     *
     * @param String $fecha
     * @return string
     */
    public function ajuste_fecha($fecha)
    {

        if (!$this->valid_date($fecha)) {
            return "fecha invalida";
        }

        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiempre', 'Octubre', 'Noviembre', 'Diciembre');
        $date = date_create_from_format("d/m/Y", $fecha);
        $wday = $date->format('w');
        $tmp = explode('/', $fecha);
        return sprintf("%s %s de %s de %s", $dias[$wday], $tmp[0], $meses[$tmp[1] - 1], $tmp[2]);
    }

    /**
     * Función utilizada como callback en las reglas de form validation. Valida que una cadena de texto sea
     * alfabética y permite incluir 'ñÑ' y acentos en las vocales.
     *
     * @param String $str
     * @return boolean
     */
    public function alpha_es($str)
    {
        if (!preg_match("/^([ a-zA-Z0-9ñÑáéíóú\.,;\-:]).+$/i", $str)) {
            $this->form_validation->set_message('alpha_es', 'El campo {field} solo puede contener caracteres alfabéticos');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    
    /**
     * Función que utiliza una plantilla estandar de la institución para enviar correos electronicos a cualquier destinatario.
     *
     * @param String $tittle - Titulo del Cuerpo del mensaje
     * @param String $subject - Asunto del mensaje
     * @param String $body - Contenido del Cuerpo del mensaje.
     * @param String $link - Enlace del cuerpo del mensaje (Usado cuando se envian correos de activación de usuarios o recuperación de claves)
     * @param String $to - A quien se le envia el mensaje.
     * @param String $from - Quien envia el mensaje
     *
     * Generalmente se utiliza un correo que contenga la palabra "noreply",
     * este correo puede existir o no. Debe ser del dominio @ufps.edu.co.
     * Ejemplo: notifications-noreply@ufps.edu.co
     *
     * @param boolean $template - Por defecto es TRUE, en caso de ser FALSE no utilizada la plantilla institucional
     * @return boolean - TRUE: Mensaje enviado con éxito, FALSE  de lo contrario.
     */
    public function send_email($tittle = "", $subject = "", $body = "", $link = "", $to = NULL, $from = NULL, $template = TRUE)
    {

        if (!$to && !$from) {
            return FALSE;
        }

        $this->load->library("email");

        $configGmail = $this->_mailConfigPostfix();
        $this->email->initialize($configGmail);
        $this->email->clear(TRUE);
        //        $this->dump(base_url("assets/email/email_tpl.html"));
        //        $this->dump(file_get_contents(base_url("assets/email/email_tpl.html")));
        if ($template) {
            $tpl = "assets/email/email_tpl2.php";
            $file = fopen($tpl, "r");
            $html = fread($file, filesize($tpl));
            //$html = file_get_contents(base_url("assets/email/email_tpl.php"));
            $html = str_replace("@tittle-email", $tittle, $html);
            $html = str_replace("@body-email", $body, $html);
            $html = str_replace("@link-email", $link, $html);
        } else {
            $html = $body;
        }

        $this->email->from($from, 'División de Sistemas UFPS');
        $this->email->to(strtolower($to));

        $this->email->subject($subject);
        $this->email->message($html);
        $send = $this->email->send();
        //        $this->dump($this->email->print_debugger());
        return $send;
    }

    private function _mailConfigGmail($credentials = array())
    {
        if (empty($credentials)) {
            exit;
        }

        $configMail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $configMail['smtp_user'] = $credentials['smtp_user'];
        $configMail['smtp_pass'] = $credentials['smtp_pass'];

        return $configMail;
    }

    private function _mailConfigPostfix()
    {
        $mailConfig = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.ufps.edu.co',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        if (ENVIRONMENT == 'development') {
            $mailConfig['smtp_user'] = "Divisist180";
            $mailConfig['smtp_pass'] = "C0rre0M4sib0180";
        } else {
            $mailConfig['smtp_user'] = "Divisist8";
            $mailConfig['smtp_pass'] = "C0rre0M4sib0";
        }

        return $mailConfig;
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

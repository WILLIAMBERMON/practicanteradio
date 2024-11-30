<?php

class Uradio extends CMS_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('noticia_model', 'n_model');
        $this->load->model('contenido_model', 'c_model');
        $this->load->model('evento_model', 'e_model');
        $this->load->model('popop_model', 'p_model');
        $this->load->helper('date');
        $this->template->set('datefecha', dateFecha());
        $this->template->set_template('uradio');
        $this->template->set('slider_principal', true);
        $this->template->add_js('js/views/radio/coment_face');


        $this->template->add_js('plugins/wow-animations/js/wow.min');
        $this->template->add_js('js/plugins/owl-recent-works.min');
        $this->template->add_js('plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min');
    //    $this->template->add_js('js/plugins/layer-slider.min');
        $this->template->add_js('js/plugins/validation.min');
        $this->template->add_js('js/plugins/datepicker.min');
        $this->template->add_js('js/plugins/owl-carousel.min');
        $this->template->add_js('js/app.min');
        $this->template->add_js('js/plugins/custom.min');
        $this->template->add_js('plugins/layer-slider/layerslider/js/layerslider.kreaturamedia.jquery');
        $this->template->add_js('plugins/layer-slider/layerslider/js/layerslider.transitions');
        $this->template->add_js('plugins/layer-slider/layerslider/js/greensock');
        $this->template->add_js('plugins/horizontal-parallax/js/sequence.jquery-min');
        $this->template->add_js('plugins/owl-carousel/owl-carousel/owl.carousel.min');
   //     $this->template->add_js('plugins/jquery.parallax.min');
        $this->template->add_js('plugins/smoothScroll.min');
        $this->template->add_js('plugins/back-to-top.min');
        $this->template->add_js('js/pgwslider/pgwslider.min');

        $this->template->add_css('css/pgwslider/pgwslider.min');
        $this->template->add_css('css/custom');
     //   $this->template->add_css('css/custom/bloques.min');
    //    $this->template->add_css('plugins/ladda-buttons/css/custom-lada-btn.min');
        $this->template->add_css('plugins/hover-effects/css/custom-hover-effects.min');
        $this->template->add_css('plugins/hover-effects/css/hover.min');
        $this->template->add_css('plugins/brand-buttons/brand-buttons-inversed.min');
        $this->template->add_css('plugins/brand-buttons/brand-buttons.min');
        $this->template->add_css('css/pages/profile.min');
        $this->template->add_css('plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.min');
        $this->template->add_css('plugins/sky-forms-pro/skyforms/css/sky-forms.min');
        $this->template->add_css('plugins/scrollbar/css/jquery.mCustomScrollbar.min');
        $this->template->add_css('css/theme-colors/ured.min');
        $this->template->add_css('plugins/layer-slider/layerslider/css/layerslider.min');
        $this->template->add_css('plugins/horizontal-parallax/css/horizontal-parallax.min');
        $this->template->add_css('plugins/owl-carousel/owl-carousel/owl.carousel.min');
        $this->template->add_css('plugins/font-awesome/css/font-awesome.min');
        $this->template->add_css('plugins/line-icons/line-icons.min');
        $this->template->add_css('plugins/animate.min');
        $this->template->add_css('css/footers/footer-v1.min');
    //    $this->template->add_css('css/custom/header.min');
        $this->template->add_css('css/headers/header-v8.min');
        $this->template->add_css('css/headers/header-v6.min');
        $this->template->add_css('css/shop.style.min');
        $this->template->add_css('plugins/style-switcher/style-switcher.min');
        $this->template->add_css('css/shop.blocks.min');
        $this->template->add_css('css/shop.plugins.min');
        $this->template->add_css('css/app.min');
        $this->template->add_css('css/style.min');
        $this->template->add_css('css/plugins.min');
        $this->template->add_css('css/blocks.min');
        $this->template->add_css('css/ie8.min');

        $this->template->set('page_tittle', "UFPS - Cúcuta");
        $this->template->set('page_keywords', "ufps, universidad, francisco, de paula, santander, cucuta, colombia,carreras,ingenierias, pregrados,norte de santander, especializaciones, diplomados,cursos,oriente, matricula, notas, división, sistemas");
        $this->template->set('page_description', "Portal Universidad Francisco de Paula Santander - Cúcuta, Norte de Santander");
    

        //enviar colectivo que esta sonando en la hora actual para poder mostrarlo en el reproductor
        $this->load->model('Colectivosradiales_model');     
        $this->load->model('ProgramacionRadio_model');     
        $this->load->model('contenido_model'); 
            $contenidos = $this->contenido_model->get_all_contenido(195);
            $array_contenido=[];
            foreach ($contenidos as $contenido) {
                $array_contenido[$contenido->nombre_contenido]=  $contenido->desc_contenido ;
            }
        $this->template->set('array_contenido', $array_contenido);

    
        $colectivos = $this->Colectivosradiales_model->get_all_colectivos();
        $dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        $programacion = [];
        
        foreach ($dias as $dia) {
            $programacion[$dia] = $this->ProgramacionRadio_model->get_programacion_dia($dia);
        }
    
        $colectivos_array = [];
        foreach ($colectivos as $colectivo) {
            $colectivos_array[$colectivo->id] = $this->Colectivosradiales_model->get_colectivo($colectivo->id);
        }
    
        // Obtener la hora actual
        date_default_timezone_set('America/Bogota');
        $hora_actual = date('H:i');
        $dia_actual = date('l'); // Obtiene el día actual en inglés
        $dia_actual = ucfirst($dia_actual); // Capitaliza la primera letra
        $dias = array(
            "Sunday" => "Domingo",
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miercoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sabado"
        );
        $dia_actual= isset($dias[$dia_actual])? $dias[$dia_actual] : "null"  ;
    
        // Buscar el colectivo que está sonando
        $colectivo_actual = null;
        $programacion_actual = null;
        if (isset($programacion[$dia_actual])) {
            foreach ($programacion[$dia_actual] as $programa) {
                if ($hora_actual >= $programa->hora_inicio && $hora_actual <= $programa->hora_fin) {
                    $colectivo_actual = $programa->colectivo_id;
                    $programacion_actual = $programa;
                    break;
                }
            }
        }
    
        // Obtener los detalles del colectivo actual
        $colectivo_info = null;
        if ($colectivo_actual && $programacion_actual) {
            $colectivo_info = $colectivos_array[$colectivo_actual];
        }
    
        // Pasar la información a la vista
        $this->template->set('programacion_actual', $programacion_actual);
        $this->template->set('colectivo_actual', $colectivo_info);
    }

    public function index() {

        $menuprincipal = $this->c_model->get_menu_radio();
        //        echo '<pre>'; print_r($menuprincipal); return;
        $this->template->set('menuprincipal', $menuprincipal);



        $popop = $this->p_model->get_popop_activo();
        if(!empty($popop->video) && count(explode("/", $popop->video)) > 2){
            $popop->video = explode("/", $popop->video)[3];
        }

        $eventos = $this->e_model->getEventoActuales();
        $this->template->set('eventos', $eventos);
        $noticias_actu = $this->n_model->getListadoUltNoticiasRadio();
        $destacados_actu = $this->n_model->getDestacadoActuales();

     //   echo '<pre>'; print_r($popop); return;

     //  echo '<pre>'; print_r(hex2bin('6a6f722e32303035')); return;
        $this->load->model('Colectivosradiales_model');     

        $colectivos = $this->Colectivosradiales_model->get_all_colectivos();

        
        $this->load->model('contenido_model'); 
        $contenidos = $this->contenido_model->get_all_contenido(195);
        $array_contenido=[];
        $array_id=[];
        foreach ($contenidos as $contenido) {
            $array_contenido[$contenido->nombre_contenido]=  $contenido->desc_contenido ;
            $array_id[$contenido->nombre_contenido]=  $contenido->id_contenido ;

        }
        if(isset($array_id["equipo_ufps_radio"])){
            $equipo_radio=json_decode($array_contenido["equipo_ufps_radio"], true);
        }else{
            $equipo_radio=[];
        }
        $this->template->set('equipo_radio', $equipo_radio );
        
        
        if(isset($array_id["imagen_carrusel_index_radio"])){
            $img_carrusel = $this->contenido_model->get_contenido($array_id["imagen_carrusel_index_radio"]);
        }else{
            $img_carrusel ="vacio";
        }

        $this->template->set('colectivos', $colectivos);
        $this->template->set('img_carrusel', $img_carrusel);
        $this->template->set('popop', $popop);
        $this->template->set('destacados_actu', $destacados_actu);
        $this->template->set('noticias_actu', $noticias_actu);
        $this->template->render('uprincipal/index_radio');
    }

    public function logout() {
        //      if ($this->session->userdata('estudiante_divisist')) {
        //        $this->session->sess_destroy();
        //    }
        redirect();
    }

    public function construirMenuPrincipal() {

        $menu = $this->c_model->getMenuPrincipal(146);
        $listado = " ";
        $numMenu = count($menu);

        for ($i = 0; $i < $numMenu; $i++) {
            $listado .= "<li><a class='page-scroll' href=" . $menu[$i]['enlace_menu'] . ">" . $menu[$i]['nombre_menu'] . "</a></li>";
        }

        return $listado;
    }


}

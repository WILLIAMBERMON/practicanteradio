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

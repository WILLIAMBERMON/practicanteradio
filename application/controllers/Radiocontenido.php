<?php

class Radiocontenido extends CMS_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->template->set_template('uradio');
        $this->load->helper('date');
        $this->template->set('datefecha', dateFecha());

        ///   $this->template->add_css('css/adminlte/AdminLTE.min');
        $this->template->add_css('plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.min');
        $this->template->add_css('plugins/sky-forms-pro/skyforms/css/sky-forms.min');
//        $this->template->add_css('plugins/sky-forms-pro/skyforms/custom/custom-sky-forms');
//        $this->template->add_css('plugins/sky-forms-pro/skyforms/css/sky-forms');
        $this->template->add_css('plugins/fancybox/source/jquery.fancybox.min');


        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main.min");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

//        $this->template->add_js('plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min');
//        $this->template->add_js('plugins/sky-forms-pro/skyforms/js/jquery-ui.min');
//        $this->template->add_js('plugins/sky-forms-pro/skyforms/js/jquery.validate.min');
        $this->template->add_js('js/plugins/fancy-box.min');
        $this->template->add_js('plugins/fancybox/source/jquery.fancybox.pack');


        $this->template->add_js('plugins/wow-animations/js/wow.min');
        $this->template->add_js('js/plugins/owl-recent-works.min');
        $this->template->add_js('plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min');
        $this->template->add_js('js/plugins/layer-slider.min');
        $this->template->add_js('js/plugins/validation.min');
        $this->template->add_js('js/plugins/datepicker.min');
        $this->template->add_js('js/plugins/owl-carousel.min');
        $this->template->add_js('js/app.min');

        $this->template->add_js('js/views/custom/universidad.min');
        //  $this->template->add_js('js/views/busqueda/normatividad');

        $this->template->add_js('plugins/layer-slider/layerslider/js/layerslider.kreaturamedia.jquery');
        $this->template->add_js('plugins/layer-slider/layerslider/js/layerslider.transitions');
        $this->template->add_js('plugins/layer-slider/layerslider/js/greensock');
        $this->template->add_js('plugins/horizontal-parallax/js/sequence.jquery-min');
        $this->template->add_js('plugins/owl-carousel/owl-carousel/owl.carousel.min');
        $this->template->add_js('plugins/jquery.parallax.min');
        $this->template->add_js('plugins/smoothScroll.min');
        $this->template->add_js('plugins/back-to-top.min');
        $this->template->add_js('js/pgwslider/pgwslider.min');


        $this->template->add_css('css/pgwslider/pgwslider.min');
        $this->template->add_css('css/custom.min');
        $this->template->add_css('plugins/ladda-buttons/css/custom-lada-btn.min');
        $this->template->add_css('plugins/hover-effects/css/custom-hover-effects.min');
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
        $this->template->add_css('css/custom/header.min');
        $this->template->add_css('css/headers/header-v8.min');
        $this->template->add_css('css/headers/header-v6.min');
        $this->template->add_css('css/shop.style.min');
        $this->template->add_css('css/style.min');
        $this->template->add_css('css/plugins.min');
        $this->template->add_css('css/blocks.min');
        $this->template->add_css('css/ie8.min');


      //  $this->template->add_css('plugins/style-switcher/style-switcher.min');
     //   $this->template->add_css('css/shop.blocks.min');
   //     $this->template->add_css('css/shop.plugins.min');
        $this->template->add_css('css/app.min');


        $this->load->model('seccion_model', 's_model');
        $this->load->model('contenido_model', 'c_model');
        $this->load->model('menu_model', 'm_model');
        $this->load->model('investigacion_model', 'i_model');
        $this->load->model('publicacion_model', 'p_model');
        $this->load->model('documento_model', 'd_model');
        $this->load->model('tipo_seccion_model', 't_model');
        $this->load->model('noticia_model', 'n_model');
        $this->load->model('universidad_model', 'u_model');
        $this->load->model('documento_contenido_model', 'dc_model');

        /***** popop multimedia *****/
        $this->template->add_js('js/shadowbox/shadowbox');
        $this->template->add_css('css/shadowbox/shadowbox.min');
        
        $listado_noticias = $this->n_model->getListadoUltNoticias();
        $galerias = $this->_galeriasNoticias($listado_noticias);
        $this->template->set('listado_noticias', $listado_noticias);
        $this->template->set('galerias', $galerias);
        
        $menuprincipal = $this->c_model->get_menu_radio();
        //        echo '<pre>'; print_r($menuprincipal); return;
        $this->template->set('menuprincipal', $menuprincipal);
        
    }

    public function index($idnom = null, $idcont = null, $iddoc = null)
    {

        //  echo '<pre>';   print_r($iddoc); return;

//       echo '<pre>';   print_r($this->s_model->getUrlSeccion($id)); return;

        $present = false;
        if ($this->s_model->getUrlSeccion($idnom)) {
            $id = $this->s_model->getUrlSeccion($idnom)[0]->id_seccion;
            $seccion = $this->s_model->getSeccion($id);
        } else {
            show_404();
        }


//        $contenido = $this->c_model->getContenido($id, $idcont);
        if (!$idcont) {
//            $idcont = $this->m_model->getMenuInit($id);
//            if (count($idcont)) {
//                $idcont = $idcont[0]->id_menu;
//                $present = true;
//            }
            $present = true;
        }
//        if (strpos($idcont, ".pdf")) {
//            $this->template->set('docu', $idcont);
//        }

// echo '<pre>';   print_r($idcont); return;
        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);

        if ($idcont == 'doc' && $iddoc != null) {
            $contenido = null;
            $contenido = $this->getArchivoPdfRegla($iddoc);
            $subcontenido = null;
        } else {
            if (empty(explode("-", $idcont)[1])) {
                $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
            } else {
                $contenido[0] = $this->getContenido($id, explode("-", $idcont)[0]);
            }
        }


        $tiposeccion = $this->t_model->getTipoSeccion($id);
//echo '<pre>';   print_r($menuTabla); return;
        $titulo_bread = $seccion[0]->nombre_seccion;
        if ($tiposeccion) {
            $breadcrumb = $this->_breadcrumbSeccionTipo($seccion, $tiposeccion, $idcont);
            $this->template->set('tipo', $tiposeccion[0]->nombre_tipo);
        } else {
            $breadcrumb = $this->_breadcrumbSeccion($seccion);
        }

        $subcontenido = $this->subContenidoMet($contenido);
        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('present', $present);
        $this->template->set('idnom', $idnom);
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);

        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        $this->template->set('tiposeccion', $tiposeccion);
        $this->template->render('universidad/dependencia');
    }


    public function organismo($idnom = null, $idcont = null, $iddoc = null)
    {

        $present = false;
        $categoria = "organismo";
        if ($this->s_model->getUrlSeccion($idnom)) {
            $id = $this->s_model->getUrlSeccion($idnom)[0]->id_seccion;
            $seccion = $this->s_model->getSeccion($id);
        } else {
            show_404();
        }

        if (!$idcont) {
            $present = true;
        }

        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);

        if ($idcont == 'doc' && $iddoc != null) {
            $contenido = null;
            $contenido = $this->getArchivoPdfRegla($iddoc);
            $subcontenido = null;
        } else {
            $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
        }


        //    $tiposeccion = $this->t_model->getTipoSeccion($id);
        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);
        $subcontenido = $this->subContenidoMet($contenido);

        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('present', $present);
        $this->template->set('idnom', $idnom);
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('categoria', $categoria);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        //  $this->template->set('tiposeccion', $tiposeccion);
        $this->template->render('universidad/dependencia');
    }


    public function institucion($idnom = null, $idcont = null, $iddoc = null)
    {

        $this->template->add_js('js/views/custom/elevatezoom.min');
        $this->template->add_js('js/elevatezoom/jquery.elevatezoom.min');
      //  $this->template->add_js('js/responsiveimagenmap/jquery.rwdImageMaps');
      //  $this->template->add_js('js/jquery/jquery.min');



     //   $this->template->add_js('js/elevatezoom/jquery-1.8.3.min');

        $present = false;
        $categoria = "radiocontenido";
        if ($this->s_model->getUrlSeccion($idnom)) {
            $id = $this->s_model->getUrlSeccion($idnom)[0]->id_seccion;
            $seccion = $this->s_model->getSeccion($id);
        } else {
            show_404();
        }

        if (!$idcont) {
            $present = true;
        }

        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);

        if ($idcont == 'doc' && $iddoc != null) {
            $contenido = null;
            $contenido = $this->getArchivoPdfRegla($iddoc);
            $subcontenido = null;
        } else {

            if (empty(explode("-", $idcont)[1])) {
                $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
            } else {
                $contenido[0] = $this->getContenido($id, explode("-", $idcont)[0]);
            }

        }
        if(isset($contenido[0][0]->id_contenido)) {
            $titulos = $this->dc_model->get_documentos_contenido_titulo($contenido[0][0]->id_contenido);

            $numFilas = count($titulos);
            $array_temp = array();
            for ($i = 0; $i < $numFilas; $i++) {
                $documento = $this->dc_model->get_documentos_contenido($titulos[$i]->id_titulo);
                $array_temp = array_merge($array_temp, $documento);
            }
            if (isset($array_temp)) {
                $this->template->set('titulos_doc', $titulos);
                $this->template->set('documentosc', $array_temp);
            }
        }

        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);
        $subcontenido = $this->subContenidoMet($contenido);

        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('present', $present);
        $this->template->set('idnom', $idnom);
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('categoria', $categoria);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        $this->template->render('universidad/dependencia');
    }


    public function vicerrectoria($idnom = null, $idcont = null, $iddoc = null)
    {

        $present = false;
        $categoria = "vicerrectoria";
        if ($this->s_model->getUrlSeccion($idnom)) {
            $id = $this->s_model->getUrlSeccion($idnom)[0]->id_seccion;
            $seccion = $this->s_model->getSeccion($id);
        } else {
            show_404();
        }

        if (!$idcont) {
            $present = true;
        }

        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);

        if ($idcont == 'doc' && $iddoc != null) {
            $contenido = null;
            $contenido = $this->getArchivoPdfRegla($iddoc);
            $subcontenido = null;
        } else {
            $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
        }

        if(isset($contenido[0][0]->id_contenido)) {
            $titulos = $this->dc_model->get_documentos_contenido_titulo($contenido[0][0]->id_contenido);

            $numFilas = count($titulos);
            $array_temp = array();
            for ($i = 0; $i < $numFilas; $i++) {
                $documento = $this->dc_model->get_documentos_contenido($titulos[$i]->id_titulo);
                $array_temp = array_merge($array_temp, $documento);
            }
            if (isset($array_temp)) {
                $this->template->set('titulos_doc', $titulos);
                $this->template->set('documentosc', $array_temp);
            }
        }

        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);
        $subcontenido = $this->subContenidoMet($contenido);

        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('present', $present);
        $this->template->set('idnom', $idnom);
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('categoria', $categoria);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        $this->template->render('universidad/dependencia');
    }


    public function normatividad($id = null, $idcont = null, $iddoc = null)
    {


        /***** valores por defecto para presentación de normatividad *****/
        $id = 44;
        if ($idcont == null) {
            $idcont = 931;
        }


        if ($this->session->flashdata('documentos')) {
            $this->template->set('documentos', $this->session->flashdata('documentos'));
        }

        if ($id == 44 && $idcont == 248) {

            $this->template->set('is_normatividad', true);

            $entidad = $this->d_model->getEntidad();
            $entidades[0] = 'Seleccione la Entidad';
            foreach ($entidad as $item) {
                $entidades[$item->id_seccion] = $item->nombre_seccion;
            }

            $data = array('Entidad' => $entidades);
            $this->load->helper('form');
            $this->template->set('data', $data);
            $idcont = null;
        }
        if ($this->input->post('buscar') == 1) {
            $documentos = $this->d_model->getBuscarDocumento($this->input->post('txtEnt'), $this->input->post('txtActo'), $this->input->post('txtAnyo'));
            //    echo '<pre>'; print_r($documentos); return;
            $this->template->set('documentos', $documentos);
            $this->session->set_flashdata('documentos', $documentos);
            redirect("universidad/normatividad/248");
        }


        $seccion = $this->s_model->getSeccion($id);
        $contenido = $this->c_model->getContenido($id, $idcont);
        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);
        $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
        $subcontenido = $this->subContenidoMet($contenido);

        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);

        if ($idcont == 929 && $iddoc != null) {
            $contenido = null;
            $contenido = $this->getArchivoPdfRegla($iddoc);
            $subcontenido = null;
        }
        /*    if ($idcont == 234 && $iddoc != null) {
                $contenido = null;
                $contenido = $this->getArchivoPdfPubli($iddoc);
                $subcontenido = null;
            } */

        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);

        $this->template->render('universidad/normatividad');
    }

    public function transparencia($id = null, $idcont = null)
    {

        /************** valores predeterminados ****************/
        $id = 152;
        if ($idcont != null) {
            $contenido = $this->contenidoMetTrans($idcont);
         //   echo '<pre>'; print_r($contenido); return;
            $this->template->set('contenido', $contenido);
        } else {
            $titransparencia = $this->u_model->getTransparenciaTitulo();
            $this->template->set('titransparencia', $titransparencia);
        }

        $titulo = "Transparencia y Acceso a la Información Pública";
        $fecha = $this->u_model->getUltimaFechaTrans();

        $contransparencia = $this->u_model->getTransparenciaContenido();
        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);
        $breadcrumb = $this->_breadcrumbUni($titulo);
    //   echo '<pre>';   print_r($contenido); return;

        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo);

        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('titulo', $titulo);
        $this->template->set('fecha', $fecha);

        $this->template->set('contrasparencia', $contransparencia);
        $this->template->render('universidad/transparencia');
    }

//     public function atencion_ciudadano_2() {
//
//        $titulo = "Atención al Ciudadano";
//        $titransparencia = $this->u_model->getTransparenciaTitulo();
////         echo '<pre>'; print_r($titransparencia); return;
//        $contransparencia = $this->u_model->getTransparenciaContenido();
////echo '<pre>'; print_r($contransparencia); return;
//        $menu = $this->m_model->getSeccionMenu(146);
//        $submenu = $this->m_model->getSeccionSubmenu(146);
//        $menuTabla = $this->menuTabla($menu, $submenu);
////echo '<pre>'; print_r($menuTabla); return;
//        $this->template->set('menuTabla', $menuTabla);
//        $this->template->set('titulo', $titulo);
//        $this->template->set('titransparencia', $titransparencia);
//        $this->template->set('contrasparencia', $contransparencia);
//        $this->template->render('universidad/index');
//    }


    public function atencion_ciudadano($id = null, $idcont = null, $iddoc = null)
    {

        // echo '<pre>'; print_r($id); return;

        /************* valores por defecto para pqrs *************/
        $id = 152;
        if ($idcont == null) {
            $idcont = 1024;
        }


        $seccion = $this->s_model->getSeccion($id);
        //    $contenido = $this->c_model->getContenido($id, $idcont);
        $menu = $this->m_model->getSeccionMenu($id);
        $submenu = $this->m_model->getSeccionSubmenu($id);
        $menuTabla = $this->menuTabla($menu, $submenu);
        $contenido = $this->contenidoMet($id, $idcont, $menuTabla);
        //   echo '<pre>'; print_r($menuTabla); return;
        $subcontenido = $this->subContenidoMet($contenido);
        //   $contenido = $this->c_model->getContenido(23, $idcont);
        //     echo '<pre>'; print_r($menuTabla); return;
        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);

        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        $this->template->render('universidad/atencion');
    }

    public function audiencia_publica($id = null, $idcont = null, $iddoc = null)
    {

        $seccion = $this->s_model->getSeccion(153);
        //    $contenido = $this->c_model->getContenido($id, $idcont);
        $menu = $this->m_model->getSeccionMenu(152);
        $submenu = $this->m_model->getSeccionSubmenu(152);
        $menuTabla = $this->menuTabla($menu, $submenu);
        $contenido = $this->c_model->getContenido(153, 912);
        //  $contenido = $this->contenidoMet(153, 152, $menuTabla);

        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);

        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
//        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);
        $this->template->render('universidad/audiencia');
    }

    public function rectoria($idcont = null, $iddoc = null)
    {

        if ($idcont == null) {
            $idcont = 1007;
        }
        $seccion = $this->s_model->getSeccion(23);
        $menu = $this->m_model->getSeccionMenu(23);
        $submenu = $this->m_model->getSeccionSubmenu(23);
        $menuTabla = $this->menuTabla($menu, $submenu);
        $contenido = $this->contenidoMet(23, $idcont, $menuTabla);
        $subcontenido = $this->subContenidoMet($contenido);


        if(isset($contenido[0][0]->id_contenido)) {
            $titulos = $this->dc_model->get_documentos_contenido_titulo($contenido[0][0]->id_contenido);

            $numFilas = count($titulos);
            $array_temp = array();
            for ($i = 0; $i < $numFilas; $i++) {
                $documento = $this->dc_model->get_documentos_contenido($titulos[$i]->id_titulo);
                $array_temp = array_merge($array_temp, $documento);
            }
            if (isset($array_temp)) {
                $this->template->set('titulos_doc', $titulos);
                $this->template->set('documentosc', $array_temp);
            }
        }

        $titulo_bread = $seccion[0]->nombre_seccion;
        $breadcrumb = $this->_breadcrumbSeccion($seccion);

        $this->template->set('url', base_url('universidad/rectoria'));
        $this->template->set('nom_titulo', 'Rectoría - UFPS');
        $this->template->set('url_img', base_url("public/imagenes/template/header/logo_ufps.png"));
        $this->template->set('descripcion', "La Rectoría es una dependencia de la Universidad Francisco de Paula Santander a cargo del rector, quien es el representante legal y la primera autoridad ejecutiva de la institución...");

        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo_bread);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('menuTabla', $menuTabla);
        $this->template->set('menu', $menu);
        $this->template->set('submenu', $submenu);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);

//getListasProcesos

        $lici = false;
        if(isset($contenido[0][0]->sub_call_contenido)){
            $lici = strpos($contenido[0][0]->sub_call_contenido,"getListasProcesos");
        }

        if($lici !== false){
            $array_lici = explode ("sos", $contenido[0][0]->sub_call_contenido);
            if($array_lici[1] > 2016){
                $this->template->render('universidad/rectoria2');
            }else{
                $this->template->render('universidad/rectoria');
            }

        }else{
            $this->template->render('universidad/rectoria');
        }
    }

    public function convocatorias($idcont = null)
    {

        /************** valores predeterminados ****************/
        if ($idcont != null) {
            $contenido = $this->contenidoMetConvo($idcont);
            //echo '<pre>'; print_r($contenido); return;
            $this->template->set('contenido', $contenido);
        } else {
            $ticonvocatoria = $this->u_model->getConvocatoriaTitulo('1');
            $this->template->set('ticonvocatoria', $ticonvocatoria);
        }

        $titulo = "Convocatorias";
        $fecha = $this->u_model->getUltimaFechaTrans();

        if(isset($ticonvocatoria)) {
            $numFilas = count($ticonvocatoria);
            $array_temp = array();
            for ($i = 0; $i < $numFilas; $i++) {

                $conconvocatoria = $this->u_model->getConvocatoriaActividad($ticonvocatoria[$i]->id_convocatoria);
                $array_temp = array_merge($array_temp, $conconvocatoria);
            }
            $this->template->set('conconvocatoria', $array_temp);
        }

       // $menu = $this->m_model->getSeccionMenu($id);
      //  $submenu = $this->m_model->getSeccionSubmenu($id);
     //   $menuTabla = $this->menuTabla($menu, $submenu);
        $breadcrumb = $this->_breadcrumbUni($titulo);


        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo);

     //   $this->template->set('menuTabla', $menuTabla);
        $this->template->set('titulo', $titulo);
        $this->template->set('fecha', $fecha);
        $this->template->render('universidad/convocatorias');
    }

    public function seleccion($idcont = null)
    {

        /************** valores predeterminados ****************/
        if ($idcont != null) {
            $contenido = $this->contenidoMetConvo($idcont);
            //echo '<pre>'; print_r($contenido); return;
            $this->template->set('contenido', $contenido);
        } else {
            $ticonvocatoria = $this->u_model->getConvocatoriaTitulo('2');
            $this->template->set('ticonvocatoria', $ticonvocatoria);
        }

        $titulo = "Proceso de Selección";
        $fecha = $this->u_model->getUltimaFechaTrans();

        if(isset($ticonvocatoria)) {
            $numFilas = count($ticonvocatoria);
            $array_temp = array();
            for ($i = 0; $i < $numFilas; $i++) {

                $conconvocatoria = $this->u_model->getConvocatoriaActividad($ticonvocatoria[$i]->id_convocatoria);
                $array_temp = array_merge($array_temp, $conconvocatoria);
            }
            $this->template->set('conconvocatoria', $array_temp);
        }

        // $menu = $this->m_model->getSeccionMenu($id);
        //  $submenu = $this->m_model->getSeccionSubmenu($id);
        //   $menuTabla = $this->menuTabla($menu, $submenu);
        $breadcrumb = $this->_breadcrumbUni($titulo);


        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $titulo);

        //   $this->template->set('menuTabla', $menuTabla);
        $this->template->set('titulo', $titulo);
        $this->template->set('fecha', $fecha);
        $this->template->render('universidad/convocatorias');
    }

    public function perfiles($idnom = null, $idcont = null) {

        $present = false;
        if ($this->s_model->getUrlSeccion($idnom)) {
            $id = $this->s_model->getUrlSeccion($idnom)[0]->id_seccion;
            $seccion = $this->s_model->getSeccion($id);
        } else {
            show_404();
        }

        $breadcrumb = $this->_breadcrumbSeccion($seccion[0]->nombre_seccion);

        $contenido[0] = $this->c_model->getContenido($seccion[0]->id_seccion, $idcont);

        if($contenido){
            $subcontenido = $this->subContenidoMet($contenido);
        }

        //  echo '<pre>';   print_r($seccion); return;

        $this->template->set('subcontenido', $subcontenido);
        $this->template->set('idnom', $idnom);
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set('titulo_bread', $seccion[0]->nombre_seccion);
        $this->template->set('titulo', $seccion[0]->nombre_seccion);
        $this->template->set('contenido', $contenido);
        $this->template->set('seccion', $seccion);

        $this->template->render('universidad/perfiles');
    }


    private function _galeriasNoticias($listado){

        $numFilas = count($listado);
        $galeria = array();
        for($i = 0; $i < $numFilas; $i++){
            $galeria[$i] = $this->n_model->getNoticiaImg($listado[$i]->idNoti);
        }

        return $galeria;
    }

    private function _breadcrumbSeccion($seccion)
    {

        $breadcrumb = array(
            0 => array(
                "title" => "Ingresar a Inicio",
                "href" => base_url(""),
                "nombre" => "Inicio"
            ),
            1 => array(
                "title" => "Universidad",
                "href" => base_url(""),
                "nombre" => "Universidad"
            ),
            2 => array(
                "title" => ((isset($seccion[0]->nombre_seccion)) ? $seccion[0]->nombre_seccion : "-"),
                "href" => " ",
                "nombre" => ((isset($seccion[0]->nombre_seccion)) ? $seccion[0]->nombre_seccion : "-")
            )
        );
        return $breadcrumb;
    }

    private function _breadcrumbUni($titulo)
    {

        $breadcrumb = array(
            0 => array(
                "title" => "Ingresar a Inicio",
                "href" => base_url(""),
                "nombre" => "Inicio"
            ),
            1 => array(
                "title" => "Universidad",
                "href" => base_url(""),
                "nombre" => "Universidad"
            ),
            2 => array(
                "title" => ((isset($titulo)) ? $titulo : "-"),
                "href" => " ",
                "nombre" => ((isset($titulo)) ? $titulo : "-")
            )
        );
        return $breadcrumb;
    }

    private function getArchivoPdfRegla($iddoc)
    {

        $documento = $this->d_model->getDocumento($iddoc);
        $contenido[0]['funcion'] = "getArchivoPdfRegla";
        $contenido[0]['enlace'] = RUTA_REGLAMENTACION . '/' . $documento[0]->archivo;

        return $contenido;
    }

    private function getArchivoPdfPubli($iddoc)
    {

        $contenido[0]['funcion'] = "getArchivoPdf";
        $contenido[0]['enlace'] = 'http://www.ufps.edu.co/ufpsnuevo/publicaciones/archivos/' . $iddoc;

        return $contenido;
    }

    public function getActo()
    {


        $actos = array();
        if ($this->input->post('entidad_selected')) {
            $acto = $this->d_model->getActoEntidad($this->input->post('entidad_selected'));
            $actos[0] = 'Seleccione el acto';
            foreach ($acto as $item)
                $actos[$item->id_acto] = $item->NombreActo;
        }

        $output = form_dropdown('txtActo', $actos, array($this->input->post('txtActo')), 'onChange="getAnyo()"');
        echo $output;
    }

    public function getAnyo()
    {


        $anyos = array();
        if ($this->input->post('acto_selected') && $this->input->post('entidad_selected')) {
            $anyo = $this->d_model->getAnyoActoEntidad($this->input->post('entidad_selected'), $this->input->post('acto_selected'));
            $anyos[0] = 'Seleccione el año';
            foreach ($anyo as $item)
                $anyos[$item->m_year] = $item->m_year;
        }

        $output = form_dropdown('txtAnyo', $anyos, array($this->input->post('txtAnyo')));
        echo $output;
    }

    public function logout()
    {
        //      if ($this->session->userdata('estudiante_divisist')) {
        //        $this->session->sess_destroy();
        //    }
        redirect();
    }


    private function contenidoMet($id, $idcont, $menuTabla)
    {

        $numFilas = count($menuTabla);
        $contenido = array();

        for ($i = 0; $i < $numFilas; $i++) {
            if ($menuTabla[$i]['id'] == $idcont) {
                if (is_numeric($menuTabla[$i]['enlace'])) {
                    $contenido[0] = $this->c_model->getContenido($id, $menuTabla[$i]['enlace']);
                }
                else{
                    $funcion = explode(",", $menuTabla[$i]['enlace'])[0];
                    if ($funcion == 'getArchivoPdf'){
                        $contenido[0] = array('funcion' => $funcion, 'enlace' => RUTA_OFERTA_ACADEMICA . '/' . (explode(",", $menuTabla[$i]['enlace'])[1]));
                    }elseif($funcion == 'getLink') {
                        $contenido[0] = array('funcion' => $funcion, 'enlace' => (explode(",", $menuTabla[$i]['enlace'])[1]));
                    }elseif ($funcion == 'getLinkInt') {
                        $contenido[0] = array('funcion' => 'getLinkInt', 'enlace' => base_url((explode(",", $menuTabla[$i]['enlace'])[1])));
                    } else {
                        $contenido[0] = $this->$funcion($id);
                    }
                }
            }
        }

        //echo '<pre>';   print_r($contenido); return;

        return $contenido;
    }

     private function contenidoMetTrans($idcont)
    {

        $contenido = $this->u_model->getContenidoTrans($idcont);

        //  echo '<pre>';   print_r($contenido); return;
        if (explode(",", $contenido[0]->enlace)[0] == 'getArchivoPdf') {
            $contenido[0] = array('funcion' => 'getArchivoPdf', 'enlace' => RUTA_ARCHIVO_UNIVERSIDAD . '/' . (explode(",", $contenido[0]->enlace)[1]));
        } elseif (explode(",", $contenido[0]->enlace)[0] == 'getLink') {
            $contenido[0] = array('funcion' => 'getLink', 'enlace' => (explode(",", $contenido[0]->enlace)[1]));
        } elseif (explode(",", $contenido[0]->enlace)[0] == 'getLinkInt') {
            $contenido[0] = array('funcion' => 'getLinkInt', 'enlace' => base_url((explode(",", $contenido[0]->enlace)[1])));
        } elseif ($contenido[0]->enlace == 'getDirectorio') {
            $contenido[0] = array('funcion' => 'getDirectorio');
            $this->getDirectorio();
        }

        return $contenido;
    }

    private function contenidoMetConvo($idcont)
    {

        $contenido = $this->u_model->getContenidoConvo($idcont);

       // echo '<pre>';   print_r($contenido); return;
        if (explode(",", $contenido[0]->archivo)[0] == 'getArchivoPdf') {
            $contenido[0] = array('funcion' => 'getArchivoPdf', 'enlace' => RUTA_ARCHIVO_UNIVERSIDAD . '/' . (explode(",", $contenido[0]->archivo)[1]));
        } elseif (explode(",", $contenido[0]->archivo)[0] == 'getLink') {
            $contenido[0] = array('funcion' => 'getLink', 'enlace' => (explode(",", $contenido[0]->archivo)[1]));
        } elseif (explode(",", $contenido[0]->archivo)[0] == 'getLinkInt') {
            $contenido[0] = array('funcion' => 'getLinkInt', 'enlace' => base_url((explode(",", $contenido[0]->archivo)[1])));
        }

        return $contenido;
    }


    private function subContenidoMet($contenido)
    {

        $subcontenido = array();
        if (isset($contenido[0][0]->sub_call_contenido) && strlen($contenido[0][0]->sub_call_contenido) != 0) {

            $arratemp = explode(",", $contenido[0][0]->sub_call_contenido);
            if (count($arratemp) == 2) {
                $funcion = $arratemp[0];
                $subcontenido = $this->$funcion($arratemp[1]);
            } elseif (count($arratemp) == 1) {
                $funcion = $arratemp[0];
                $subcontenido = $this->$funcion();
            } else {
                $funcion = $arratemp[0];
                $subcontenido = $this->$funcion($arratemp[1], $arratemp[2]);
            }
        }

        return $subcontenido;
    }

    private function getDirectorio() {

        $this->load->model('website_model');
        $directorio = $this->website_model->get_directorio_principales();
  //echo '<pre>'; print_r($directorio); return;
        $this->template->set('directorio', $directorio);
    }

    private function getActoSeccionRecientes($id)
    {

        $documentos = $this->d_model->getBuscarDocumentoRecientes($id);

        $this->template->set('documentos', $documentos);
    }

    private function getContenido($id, $idcont)
    {
        $contenido = array();

        return $contenido[0] = $this->c_model->getContenido($id, $idcont);
    }

    private function getListasProcesos($anyo)
    {

        $licitaciones = $this->c_model->getLicitaciones($anyo);

        return $licitaciones;
        //  echo '<pre>';   print_r($licitaciones); return;
    }

    private function getListasProcesos2014()
    {

        $licitaciones = $this->c_model->getLicitaciones2014();

        return $licitaciones;

    }

    private function getListasProcesos2015()
    {

        $licitaciones = $this->c_model->getLicitaciones2015();

        $grupos = $this->c_model->getGrupoLicitaciones2015();
        $this->template->set('grupos', $grupos);
        //    echo '<pre>';   print_r($grupos); return;

        return $licitaciones;
        //  echo '<pre>';   print_r($licitaciones); return;
    }

    private function getListasProcesos2016()
    {

        $licitaciones = $this->c_model->getLicitaciones2016();
        $grupos = $this->c_model->getGrupoLicitaciones2016();
        $this->template->set('grupos', $grupos);

      //  echo '<pre>';   print_r($grupos); return;

        return $licitaciones;


    }

    private function getListasProcesos2017()
    {

        $licitaciones = $this->c_model->getLicitaciones2017();
        $grupos = $this->c_model->getGrupoLicitaciones2017();
        $this->template->set('grupos', $grupos);

        //  echo '<pre>';   print_r($grupos); return;

        return $licitaciones;


    }

    private function getListasProcesos2018()
    {

        $licitaciones = $this->c_model->getLicitaciones2018();
        $grupos = $this->c_model->getGrupoLicitaciones2018();
        $this->template->set('grupos', $grupos);

        return $licitaciones;


    }

    private function getListasProcesos2019()
    {

        $licitaciones = $this->c_model->getLicitaciones2019(); 
        $grupos = $this->c_model->getGrupoLicitaciones2019();
        $this->template->set('grupos', $grupos);

        return $licitaciones;


    }

    private function getListasProcesos2020()
    {

        $licitaciones = $this->c_model->getLicitaciones2020(); 
        $grupos = $this->c_model->getGrupoLicitaciones2020();
        $this->template->set('grupos', $grupos);

        return $licitaciones;


    }

    private function getActoSeccion($id)
    {

        $documentos = $this->d_model->getActoSeccion();
        $this->template->set('documentos', $documentos);

        return array();
    }

    private function getActoPrincipales($var1 = null, $var2 = null)
    {

        $actoprincipales = $this->d_model->getActoPrincipales();

        $this->getDocumentosAnexos(44);

        return $actoprincipales;
    }

    private function getDocumentosAnexos($id)
    {
        $docanexos = $this->d_model->getDocumentosAnexos($id);
        if ($docanexos) {
            $this->template->set('docanexos', $docanexos);
        }
    }

    private function getGrupoTrabajo($id, $tipo)
    {
        $this->load->model('etrabajo_model', 'e_model');
        $etrabajo = $this->e_model->getEtrabajo($id, $tipo);

        return $etrabajo;
    }

    private function getNoticiasSeccion($id, $tipo)
    {

        return array();
    }

    private function getGruposSeccion($id)
    {
        return $this->i_model->getInvestigacion($id);
    }

    private function getPublicacionesSeccion($id)
    {
        return $this->p_model->getPublicacion($id);
    }

    private function getLink($link)
    {

        $enlace = array();
    }

//    private function menuTabla($menu, $submenu) {
//
//        $numFilas = count($menu);
//        $numSubmenu = count($submenu);
//        $opc = 0;
//
//        $tablaArray = array();
//
//        for ($i = 0; $i < $numFilas; $i++):
//            for ($j = 0; $j < $numSubmenu; $j++):
//                if ($menu[$i]->id_menu == $submenu[$j]->padre_menu):
//                    if ($opc == 0):
//                        $opc++;
//                        $tablaArray[] = Array('id' => ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'href' => '#collapse-' . ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'nombre' => ((isset($menu[$i]->nombre_menu)) ? $menu[$i]->nombre_menu : "-"), 'enlace' => ((isset($menu[$i]->enlace_menu)) ? $menu[$i]->enlace_menu : "-"), 'tipo' => 0);
//                        $tablaArray[] = Array('id' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'href' => ((isset($submenu[$j]->id_seccion)) ? $submenu[$j]->id_seccion : "-") . '/' . ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'nombre' => ((isset($submenu[$j]->nombre_menu)) ? $submenu[$j]->nombre_menu : "-"), 'enlace' => ((isset($submenu[$j]->enlace_menu)) ? $submenu[$j]->enlace_menu : "-"), 'tipo' => 1);
//                    else:
//                        $opc++;
//                        $tablaArray[] = Array('id' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'href' => ((isset($submenu[$j]->id_seccion)) ? $submenu[$j]->id_seccion : "-") . '/' . ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'nombre' => ((isset($submenu[$j]->nombre_menu)) ? $submenu[$j]->nombre_menu : "-"), 'enlace' => ((isset($submenu[$j]->enlace_menu)) ? $submenu[$j]->enlace_menu : "-"), 'tipo' => 1);
//                    endif;
//                endif;
//            endfor;
//            if ($opc == 0):
//                $tablaArray[] = Array('id' => ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'href' => ((isset($menu[$i]->id_seccion)) ? $menu[$i]->id_seccion : "-") . '/' . ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'nombre' => ((isset($menu[$i]->nombre_menu)) ? $menu[$i]->nombre_menu : "-"), 'enlace' => ((isset($menu[$i]->enlace_menu)) ? $menu[$i]->enlace_menu : "-"), 'tipo' => 0);
//            endif;
//            $opc = 0;
//        endfor;
//
//        return $tablaArray;
//    }

    private function menuTabla($menu, $submenu)
    {

        $numFilas = count($menu);
        $numSubmenu = count($submenu);
        $opc = 0;

        $tablaArray = array();

        for ($i = 0; $i < $numFilas; $i++):
            for ($j = 0; $j < $numSubmenu; $j++):
                if ($menu[$i]->id_menu == $submenu[$j]->padre_menu):
                    if ($opc == 0):
                        $opc++;
                        $tablaArray[] = Array('id' => ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'href' => '#collapse-' . ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'nombre' => ((isset($menu[$i]->nombre_menu)) ? $menu[$i]->nombre_menu : "-"), 'enlace' => ((isset($menu[$i]->enlace_menu)) ? $menu[$i]->enlace_menu : "-"), 'tipo' => 0);
                        $tablaArray[] = Array('id' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'href' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'nombre' => ((isset($submenu[$j]->nombre_menu)) ? $submenu[$j]->nombre_menu : "-"), 'enlace' => ((isset($submenu[$j]->enlace_menu)) ? $submenu[$j]->enlace_menu : "-"), 'tipo' => 1);
                    else:
                        $opc++;
                        $tablaArray[] = Array('id' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'href' => ((isset($submenu[$j]->id_menu)) ? $submenu[$j]->id_menu : "-"), 'nombre' => ((isset($submenu[$j]->nombre_menu)) ? $submenu[$j]->nombre_menu : "-"), 'enlace' => ((isset($submenu[$j]->enlace_menu)) ? $submenu[$j]->enlace_menu : "-"), 'tipo' => 1);
                    endif;
                endif;
            endfor;
            if ($opc == 0):
                $tablaArray[] = Array('id' => ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'href' => ((isset($menu[$i]->id_menu)) ? $menu[$i]->id_menu : "-"), 'nombre' => ((isset($menu[$i]->nombre_menu)) ? $menu[$i]->nombre_menu : "-"), 'enlace' => ((isset($menu[$i]->enlace_menu)) ? $menu[$i]->enlace_menu : "-"), 'tipo' => 0);
            endif;
            $opc = 0;
        endfor;

        return $tablaArray;
    }

    public function construirMenuPrincipal()
    {

        $menu = $this->c_model->getMenuPrincipal(146);
        $listado = " ";
        $numMenu = count($menu);

        for ($i = 0; $i < $numMenu; $i++) {
            $listado .= "<li><a class='page-scroll' href=" . $menu[$i]['enlace_menu'] . ">" . $menu[$i]['nombre_menu'] . "</a></li>";
        }

        return $listado;
    }

}

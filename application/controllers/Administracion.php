<?php

/**
 * Created by PhpStorm.
 * User: Alirio Villamizar - Henry Alexander
 * Date: 30/10/2016
 * Time: 22:43 PM
 */
class Administracion extends CMS_Controller
{
    /**
     * administracion constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->template->set_template('uprincipal');
        $this->load->helper('date');
        $this->template->set('datefecha', dateFecha());

        ///   $this->template->add_css('css/adminlte/AdminLTE.min');

        $this->template->add_js('js/plugins/fancy-box.min');
        $this->template->add_js('plugins/fancybox/source/jquery.fancybox.pack');
        $this->template->add_js('plugins/wow-animations/js/wow.min');
        $this->template->add_js('js/plugins/owl-carousel.min');
        $this->template->add_js('js/app.min');
        $this->template->add_js('js/views/custom/useccion.min');
        $this->template->add_js('plugins/owl-carousel/owl-carousel/owl.carousel.min');
        $this->template->add_js('plugins/jquery.parallax.min');
        $this->template->add_js('plugins/smoothScroll.min');
        $this->template->add_js('plugins/back-to-top.min');
        $this->template->add_js('js/pgwslider/pgwslider.min');
        /******************* formularios *******************/

        $this->template->add_css('plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.min');
        $this->template->add_css('plugins/sky-forms-pro/skyforms/css/sky-forms.min');
        $this->template->add_css('plugins/fancybox/source/jquery.fancybox.min');
        $this->template->add_css('css/custom/useccion.min');
        $this->template->add_css('css/custom/administracion.min');
        $this->template->add_css('css/custom.min');
        $this->template->add_css('css/pgwslider/pgwslider.min');
        $this->template->add_css('plugins/ladda-buttons/css/custom-lada-btn.min');
        $this->template->add_css('plugins/hover-effects/css/custom-hover-effects.min');
        $this->template->add_css('plugins/brand-buttons/brand-buttons-inversed.min');
        $this->template->add_css('plugins/brand-buttons/brand-buttons.min');
        $this->template->add_css('css/pages/profile.min');
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

        $this->load->model('seccion_model', 's_model');
        $this->load->model('contenido_model', 'c_model');
        $this->load->model('menu_model', 'm_model');
        $this->load->model('investigacion_model', 'i_model');
        $this->load->model('publicacion_model', 'p_model');
        $this->load->model('documento_model', 'd_model');
        $this->load->model('tipo_seccion_model', 't_model');
        $this->load->model('noticia_model', 'n_model');

        /******popop multimedia *****/
        $this->template->add_js('js/shadowbox/shadowbox');
        $this->template->add_css('css/shadowbox/shadowbox.min');
    }

    public function index()
    {
        $usuario = $this->session->userdata(SESSION_NAME);

        if (!$usuario) {
            redirect("administracion/login");
        }

        if ($usuario->rol == 'admin') {
            redirect("administracion/noticia");
        }
        if ($usuario->rol == 'contratacion') {
            $this->session->set_userdata('id_seccion', 122);
            redirect("administracion/procesos_contractuales");
        }
        if ($usuario->rol == 'radio') {
            //$this->session->set_userdata('id_seccion', 122);
            redirect("administracion/seccion");
        }

    }

    private function _validar_login($rol)
    {
        if (!$this->session->userdata(SESSION_NAME)) {
            redirect('administracion/login');
        }
        if ($this->session->userdata(SESSION_NAME)->rol != $rol) {
            redirect("administracion/index");
        }
    }

    private function _validar_imagen($name, $required = true, $tipo = 'noticia', $error_name = "error_imagen")
    {
        switch ($tipo) {
            case "archivo":
                $config['upload_path'] = './' . PATH_ARCHIVO;
                $config['max_size'] = MAX_SIZE_ARCHIVO;
                $config['max_width'] = MAX_WIDTH_ARCHIVO;
                $config['max_height'] = MAX_HEIGHT_ARCHIVO;
                break;
            case "noti_divisist":
                $config['upload_path'] = './' . PATH_NOTICIA_DIVISIST;
                //$config['max_size'] = MAX_SIZE_ARCHIVO;
                //$config['max_width'] = MAX_WIDTH_ARCHIVO;
                //$config['max_height'] = MAX_HEIGHT_ARCHIVO;
                break;
            case "contenido":
                $config['upload_path'] = './' . PATH_IMG_CONTENIDO;
                $config['max_size'] = MAX_SIZE_IMG_CONTENIDO;
                $config['max_width'] = MAX_WIDTH_IMG_CONTENIDO;
                $config['max_height'] = MAX_HEIGHT_IMG_CONTENIDO;
                break;
            case "evento":
                $config['upload_path'] = './' . PATH_EVENTO;
                $config['max_size'] = MAX_SIZE_EVENTO;
                $config['max_width'] = MAX_WIDTH_EVENTO;
                $config['max_height'] = MAX_HEIGHT_EVENTO;
                break;
            case "eventopeq":
                $config['upload_path'] = './' . PATH_EVENTO;
                $config['max_size'] = MAX_SIZE_EVENTO_PEQ;
                $config['max_width'] = MAX_WIDTH_EVENTO_PEQ;
                $config['max_height'] = MAX_HEIGHT_EVENTO_PEQ;
                break;
            case "galeria":
                $config['upload_path'] = './' . PATH_GALERIA;
                $config['max_size'] = MAX_SIZE_GALERIA;
                $config['max_width'] = MAX_WIDTH_GALERIA;
                $config['max_height'] = MAX_HEIGHT_GALERIA;
                break;
            case "imagen_slider":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA;
                $config['max_width'] = MAX_WIDTH_NOTICIA;
                $config['max_height'] = MAX_HEIGHT_NOTICIA;
                break;
            case "imagen_pequena":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_PEQ;
                $config['max_width'] = MAX_WIDTH_NOTICIA_PEQ;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_PEQ;
                break;
            case "imagen_alterna":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_GRAN;
                $config['max_width'] = MAX_WIDTH_NOTICIA_GRAN;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_GRAN;
                break;
            case "popop":
                $config['upload_path'] = './' . PATH_POPOP;
                $config['max_size'] = MAX_SIZE_POPOP;
                $config['max_width'] = MAX_WIDTH_POPOP;
                $config['max_height'] = MAX_HEIGHT_POPOP;
                break;
            case "publicacion":
                $config['upload_path'] = './' . PATH_PUBLICACION;
                $config['max_size'] = MAX_SIZE_PUBLICACION;
                $config['max_width'] = MAX_WIDTH_PUBLICACION;
                $config['max_height'] = MAX_HEIGHT_PUBLICACION;
                break;
            case "publicacionar":
                $config['upload_path'] = './' . PATH_PUBLICACION;
                $config['max_size'] = MAX_SIZE_PUBLICACIONAR;
                $config['max_width'] = MAX_WIDTH_PUBLICACIONAR;
                $config['max_height'] = MAX_HEIGHT_PUBLICACIONAR;
                break;
            case "imagen_noti_div":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_DIV;
                $config['max_width'] = MAX_WIDTH_NOTICIA_DIV;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_DIV;
                break;
            case "imagen_noti_enlace":
                $config['upload_path'] = './' . PATH_NOTI_BOLETIN;
                $config['max_size'] = MAX_SIZE_NOTI_BOLETIN;
                $config['max_width'] = MAX_WIDTH_NOTI_BOLETIN;
                $config['max_height'] = MAX_HEIGHT_NOTI_BOLETIN;
                break;
            case "imagen_info_rectoria":
                $config['upload_path'] = './assets/uploads/img/rectoria';
                $config['max_size'] = 15360; // 15MB
                break;
            default:
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA;
                $config['max_width'] = MAX_WIDTH_NOTICIA;
                $config['max_height'] = MAX_HEIGHT_NOTICIA;
                break;
        }

        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777);
        }

        if (!$required && $_FILES[$name]['size'] == 0) {
            return true;
        }

        if (!$this->upload->do_upload($name)) {
            $this->template->set($error_name, $this->upload->display_errors());
            return false;
        } else {
            return $this->upload->data();
        }
    }

    private function _validar_imagen2($name, $required = true, $tipo = 'noticia', $error_name = "error_imagen")
    {
        switch ($tipo) {
            case "archivo":
                $config['upload_path'] = './' . PATH_ARCHIVO;
                $config['max_size'] = MAX_SIZE_ARCHIVO;
                $config['max_width'] = MAX_WIDTH_ARCHIVO;
                $config['max_height'] = MAX_HEIGHT_ARCHIVO;
                break;
            case "noti_divisist":
                $config['upload_path'] = './' . PATH_NOTICIA_DIVISIST;
                //$config['max_size'] = MAX_SIZE_ARCHIVO;
                //$config['max_width'] = MAX_WIDTH_ARCHIVO;
                //$config['max_height'] = MAX_HEIGHT_ARCHIVO;
                break;
            case "imagen_banner":
                $config['upload_path'] = './' . PATH_ARCHIVO;
                //$config['max_size'] = MAX_SIZE_ARCHIVO;
                //$config['max_width'] = MAX_WIDTH_ARCHIVO;
                //$config['max_height'] = MAX_HEIGHT_ARCHIVO;
                break;
            case "contenido":
                $config['upload_path'] = './' . PATH_IMG_CONTENIDO;
                $config['max_size'] = MAX_SIZE_IMG_CONTENIDO;
                $config['max_width'] = MAX_WIDTH_IMG_CONTENIDO;
                $config['max_height'] = MAX_HEIGHT_IMG_CONTENIDO;
                break;
            case "evento":
                $config['upload_path'] = './' . PATH_EVENTO;
                $config['max_size'] = MAX_SIZE_EVENTO;
                $config['max_width'] = MAX_WIDTH_EVENTO;
                $config['max_height'] = MAX_HEIGHT_EVENTO;
                break;
            case "eventopeq":
                $config['upload_path'] = './' . PATH_EVENTO;
                $config['max_size'] = MAX_SIZE_EVENTO_PEQ;
                $config['max_width'] = MAX_WIDTH_EVENTO_PEQ;
                $config['max_height'] = MAX_HEIGHT_EVENTO_PEQ;
                break;
            case "galeria":
                $config['upload_path'] = './' . PATH_GALERIA;
                $config['max_size'] = MAX_SIZE_GALERIA;
                $config['max_width'] = MAX_WIDTH_GALERIA;
                $config['max_height'] = MAX_HEIGHT_GALERIA;
                break;
            case "imagen_slider":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA;
                $config['max_width'] = MAX_WIDTH_NOTICIA;
                $config['max_height'] = MAX_HEIGHT_NOTICIA;
                break;
            case "imagen_pequena":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_PEQ;
                $config['max_width'] = MAX_WIDTH_NOTICIA_PEQ;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_PEQ;
                break;
            case "imagen_alterna":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_GRAN;
                $config['max_width'] = MAX_WIDTH_NOTICIA_GRAN;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_GRAN;
                break;
            case "popop":
                $config['upload_path'] = './' . PATH_POPOP;
                $config['max_size'] = MAX_SIZE_POPOP;
                $config['max_width'] = MAX_WIDTH_POPOP;
                $config['max_height'] = MAX_HEIGHT_POPOP;
                break;
            case "publicacion":
                $config['upload_path'] = './' . PATH_PUBLICACION;
                $config['max_size'] = MAX_SIZE_PUBLICACION;
                $config['max_width'] = MAX_WIDTH_PUBLICACION;
                $config['max_height'] = MAX_HEIGHT_PUBLICACION;
                break;
            case "publicacionar":
                $config['upload_path'] = './' . PATH_PUBLICACION;
                $config['max_size'] = MAX_SIZE_PUBLICACIONAR;
                $config['max_width'] = MAX_WIDTH_PUBLICACIONAR;
                $config['max_height'] = MAX_HEIGHT_PUBLICACIONAR;
                break;
            case "imagen_noti_div":
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA_DIV;
                $config['max_width'] = MAX_WIDTH_NOTICIA_DIV;
                $config['max_height'] = MAX_HEIGHT_NOTICIA_DIV;
                break;
            case "imagen_noti_enlace":
                $config['upload_path'] = './' . PATH_NOTI_BOLETIN;
                $config['max_size'] = MAX_SIZE_NOTI_BOLETIN;
                $config['max_width'] = MAX_WIDTH_NOTI_BOLETIN;
                $config['max_height'] = MAX_HEIGHT_NOTI_BOLETIN;
                break;
            case "imagen_info_rectoria":
                $config['upload_path'] = './assets/uploads/img/rectoria';
                $config['max_size'] = 15360; // 15MB
                break;
            default:
                $config['upload_path'] = './' . PATH_NOTICIA;
                $config['max_size'] = MAX_SIZE_NOTICIA;
                $config['max_width'] = MAX_WIDTH_NOTICIA;
                $config['max_height'] = MAX_HEIGHT_NOTICIA;
                break;
        }

        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777);
        }

        if (!$required && $_FILES[$name]['size'] == 0) {
            return true;
        }

        if (!$this->upload->do_upload($name)) {
            $this->template->set($error_name, $this->upload->display_errors());
            return $this->upload->data();
            //return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

    private function _validar_documento($name, $required = true, $tipo = "contenido")
    {
        switch ($tipo) {
            case "documento_archivo":
                $config['upload_path'] = './' . PATH_PDF_ARCHIVO;
                $config['max_size'] = MAX_SIZE_PDF_ARCHIVO;
                break;
            case "documento_divisist":
                $config['upload_path'] = './' . PATH_PDF_NOTI_DIVISIST;
                $config['max_size'] = MAX_SIZE_PDF_ARCHIVO;
                break; //documento_divisist
            case "documento_contenido":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_CONTENIDO;
                $config['max_size'] = MAX_SIZE_PDF_CNOTENIDO;
                break;
            case "documento_novedad":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_NOVEDAD;
                $config['max_size'] = MAX_SIZE_PDF_NOVEDAD;
                break;
            case "documento_evento":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_EVENTO;
                $config['max_size'] = MAX_SIZE_PDF_EVENTO;
                break;
            case "documento_menu":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_MENU;
                $config['max_size'] = MAX_SIZE_PDF_MENU;
                break;
            case "documento_licitacion":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_LICITACION;
                $config['max_size'] = MAX_SIZE_PDF_LICITACION;
                break;
            case "documento_normatividad":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_NORMATIVIDAD;
                $config['max_size'] = MAX_SIZE_PDF_NORMATIVIDAD;
                break;
            case "documento_actividad":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_ACTIVIDAD;
                $config['max_size'] = MAX_SIZE_PDF_ACTIVIDAD;
                break;
            case "documento_publicacion":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_PUBLICACION;
                $config['max_size'] = MAX_SIZE_PDF_PUBLICACION;
                break;
            case "documento_calendario":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_CALENDARIO;
                $config['max_size'] = MAX_SIZE_PDF_CALENDARIO;
                break;
            case "documento_contenido_doc":
                $config['upload_path'] = './' . PATH_PDF_DOCUMENTO_CONTENIDO_DOC;
                $config['max_size'] = MAX_SIZE_PDF_CONTENIDO_DOC;
                break;
            case "contenido":
            default:
                $config['upload_path'] = './' . PATH_PDF_CONTENIDO;
                $config['max_size'] = MAX_SIZE_PDF_CNOTENIDO;
                break;
        }

        $config['allowed_types'] = 'txt|xls|xlsx|doc|docx|pdf|PDF|ppt|pptx|docm';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$required && $_FILES[$name]['size'] == 0) {
            return true;
        }

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777);
        }

        if (!$this->upload->do_upload($name)) {
            $this->template->set('error_documento', $this->upload->display_errors());
            return false;
        } else {
            return $this->upload->data();
        }
    }

    public function login()
    {
        if ($this->session->userdata(SESSION_NAME)) {
            redirect('administracion/index');
        }

        $this->load->model('usuario_model');

        if ($this->input->post('login') == 1 && $this->input->post('g-recaptcha-response') == "") {
            $this->template->add_message([
                'error' => 'Por favor debe validar el captcha' . $this->input->post('g-recaptcha-response'),
            ]);
        }

        if ($this->input->post('login') == 1 && $this->input->post('g-recaptcha-response') != "") {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'user',
                    'label' => 'Usuario',
                    'rules' => 'trim|required|alpha_dash|max_length[45]',
                ],
                [
                    'field' => 'password',
                    'label' => 'Contraseña',
                    'rules' => 'trim|required|alpha_dash|max_length[45]',
                ],
            ];
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === true) {
                $user = $this->usuario_model->login($this->input->post('user'), $this->input->post('password'));
                if ($user) {
                    $this->session->set_userdata(SESSION_NAME, $user);
                    redirect('administracion/index');
                } else {
                    $this->template->add_message([
                        'error' => 'Usuario o Contraseña invalidos',
                    ]);
                }
            }
        }

        $this->load->helper('form');

        $this->template->render('administracion/login');
    }

    public function logout()
    {
        if ($this->session->userdata(SESSION_NAME)) {
            $this->session->sess_destroy();
        }
        redirect('administracion/login');
    }

    public function noticia()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $noticias = $this->noticia_model->get_all_noticias();
        if ($noticias) {
            $this->template->set('noticias', $noticias);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_noticias');
        $this->template->render('administracion/noticia/index');
    }

    public function agregar_noticia()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número Noticia',
                    'rules' => 'required|max_length[3]|numeric',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'firma',
                    'label' => 'Firma',
                    'rules' => 'required',
                ],
                [
                    'field' => 'video2',
                    'label' => 'URL Video Youtube',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'descripcion_video2',
                    'label' => 'Descripción Video',
                    'rules' => 'max_length[4000]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "imagen_slider", 'error_imagen');
            $imagenp = $this->_validar_imagen('imagenp', false, "imagen_pequena", "error_imagenp");
            $imgalterna = $this->_validar_imagen('imgalterna', false, "imagen_alterna", "error_imgalterna");

            if ($this->form_validation->run() === true && $imagen && $imagenp && $imgalterna) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => '2',
                    'firma' => $this->input->post('firma'),
                    'video2' => $this->input->post('video2'),
                    'descripcion_video2' => $this->input->post('descripcion_video2'),
                    'numero' => $this->input->post('numero'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenp['file_name'])) {
                    $info['imagenp'] = $imagenp['file_name'];
                }
                if (isset($imgalterna['file_name'])) {
                    $info['imgalterna'] = $imgalterna['file_name'];
                }
                $ok = $this->noticia_model->insert($info);

                if ($ok) {
                    $noticia = $this->noticia_model->getNoticia($this->input->post('id_titulo'));
                    $info = [
                        'idNoti' => $noticia[0]->idNoti,
                    ];
                    $ok2 = $this->noticia_model->insertImg($info);
                    if ($ok2) {
                        $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva Noticia y la galería de la Noticia']);
                    } else {
                        $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la galería de la Noticia']);
                    }
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva Noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva Noticia']);
                }

                redirect('administracion/noticia');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias');
        $this->template->render('administracion/noticia/agregar_noticia');
    }

    public function editar_noticia()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $id_noticia = $this->input->post('id_noticia');

        if (!$id_noticia) {
            $id_noticia = $this->session->id_noticia;
            if (!$id_noticia) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_noticia', $id_noticia);
        }

        $noticia = $this->noticia_model->get_noticia($id_noticia);

        if (!$noticia) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la noticia seleccionada.']);
            redirect('administracion/noticia');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número Noticia',
                    'rules' => 'required|max_length[3]|numeric',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                //                [
                //                    'field' => 'firma',
                //                    'label' => 'Firma',
                //                    'rules' => 'required'
                //                ],
                [
                    'field' => 'video2',
                    'label' => 'URL Video Youtube',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'descripcion_video2',
                    'label' => 'Descripción Video',
                    'rules' => 'max_length[4000]',
                ],
            ];
            $this->form_validation->set_rules($rules);
            $imagen = $this->_validar_imagen('imagen', false, "imagen_slider", 'error_imagen');
            $imagenp = $this->_validar_imagen('imagenp', false, "imagen_pequena", "error_imagenp");
            $imgalterna = $this->_validar_imagen('imgalterna', false, "imagen_alterna", "error_imgalterna");

            if ($this->form_validation->run() === true && $imagen && $imagenp && $imgalterna) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => 2,
                    'firma' => " ",
                    'video2' => $this->input->post('video2'),
                    'descripcion_video2' => $this->input->post('descripcion_video2'),
                    'numero' => $this->input->post('numero'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenp['file_name'])) {
                    $info['imagenp'] = $imagenp['file_name'];
                }
                if (isset($imgalterna['file_name'])) {
                    $info['imgalterna'] = $imgalterna['file_name'];
                }

                $ok = $this->noticia_model->update_noticia($id_noticia, $info);
                if ($ok) {
                    $firma = "<p>
Centro de Comunicaciones y Medios Audiovisuales - CECOM<br />
Universidad Francisco de Paula Santander<br />
oficinadeprensa@ufps.edu.co</p>
";
                    $ok = $this->noticia_model->update_firma($id_noticia, $firma);
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la Noticia.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/noticia');
            }
        } else {
            $_POST = array_merge($_POST, (array) $noticia);
            $imagen_noticia = $noticia->imagen ? site_url(PATH_NOTICIA . $noticia->imagen) : "";
            $imagen_pequena = $noticia->imagenp ? site_url(PATH_NOTICIA . $noticia->imagenp) : "";
            $imagen_alterna = $noticia->imgalterna ? site_url(PATH_NOTICIA . $noticia->imgalterna) : "";
            $this->template->set('imagen_noticia', $imagen_noticia);
            $this->template->set('imagen_pequena', $imagen_pequena);
            $this->template->set('imagen_alterna', $imagen_alterna);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias');
        $this->template->render('administracion/noticia/editar_noticia');
    }

    public function informacion()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $noticias = $this->noticia_model->get_all_informaciones();
        if ($noticias) {
            $this->template->set('noticias', $noticias);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_informaciones');
        $this->template->render('administracion/informacion/index');
    }

    public function agregar_informacion()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => '3',
                ];

                $ok = $this->noticia_model->insert($info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo evento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo evento']);
                }
                redirect('administracion/informacion');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_informaciones');
        $this->template->render('administracion/informacion/agregar_informacion');
    }

    public function editar_informacion()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $id_noticia = $this->input->post('id_noticia');

        if (!$id_noticia) {
            $id_noticia = $this->session->id_noticia;
            if (!$id_noticia) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_noticia', $id_noticia);
        }

        $noticia = $this->noticia_model->get_noticia($id_noticia);

        if (!$noticia) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la noticia seleccionada.']);
            redirect('administracion/noticia');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => 3,
                ];

                $ok = $this->noticia_model->update_noticia($id_noticia, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la Información.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/informacion');
            }
        } else {
            $_POST = array_merge($_POST, (array) $noticia);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_informaciones');
        $this->template->render('administracion/informacion/editar_informacion');
    }

    public function editar_imagen()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $id_noticia = $this->input->post('id_noticia');

        if (!$id_noticia) {
            $id_noticia = $this->session->id_noticia;
            if (!$id_noticia) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_noticia', $id_noticia);
        }

        $noticia = $this->noticia_model->getNoticiaImgAll($id_noticia);

        if (!$noticia) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar las imágenes de la noticia seleccionada.']);
            redirect('administracion/noticia');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción galería',
                    'rules' => 'max_length[4000]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $img1 = $this->_validar_imagen('img1', false, "galeria", "imagen_uno");
            $img2 = $this->_validar_imagen('img2', false, "galeria", "imagen_dos");
            $img3 = $this->_validar_imagen('img3', false, "galeria", "imagen_tres");
            $img4 = $this->_validar_imagen('img4', false, "galeria", "imagen_cuatro");
            $img5 = $this->_validar_imagen('img5', false, "galeria", "imagen_cinco");
            $img6 = $this->_validar_imagen('img6', false, "galeria", "imagen_seis");
            $img7 = $this->_validar_imagen('img7', false, "galeria", "imagen_siete");
            $img8 = $this->_validar_imagen('img8', false, "galeria", "imagen_ocho");
            $img9 = $this->_validar_imagen('img9', false, "galeria", "imagen_nueve");
            $img10 = $this->_validar_imagen('img10', false, "galeria", "imagen_diez");

            if ($this->form_validation->run() === true && $img1 && $img2 && $img3 && $img4 && $img5 && $img6 && $img7 && $img8 && $img9 && $img10) {
                $info = [
                    'publicar' => $this->input->post('publicar'),
                    'descripcion' => $this->input->post('descripcion'),
                ];
                if (isset($img1['file_name'])) {
                    $info['img1'] = $img1['file_name'];
                }
                if (isset($img2['file_name'])) {
                    $info['img2'] = $img2['file_name'];
                }
                if (isset($img3['file_name'])) {
                    $info['img3'] = $img3['file_name'];
                }
                if (isset($img4['file_name'])) {
                    $info['img4'] = $img4['file_name'];
                }
                if (isset($img5['file_name'])) {
                    $info['img5'] = $img5['file_name'];
                }
                if (isset($img6['file_name'])) {
                    $info['img6'] = $img6['file_name'];
                }
                if (isset($img7['file_name'])) {
                    $info['img7'] = $img7['file_name'];
                }
                if (isset($img8['file_name'])) {
                    $info['img8'] = $img8['file_name'];
                }
                if (isset($img9['file_name'])) {
                    $info['img9'] = $img9['file_name'];
                }
                if (isset($img10['file_name'])) {
                    $info['img10'] = $img10['file_name'];
                }
                $ok = $this->noticia_model->update_noticia_img($id_noticia, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la galería.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/noticia');
            }
        } else {
            $_POST = array_merge($_POST, (array) $noticia);
            $imagen_uno = $noticia->img1 ? site_url(PATH_GALERIA . $noticia->img1) : "";
            $this->template->set('imagen_uno', $imagen_uno);
            $imagen_dos = $noticia->img2 ? site_url(PATH_GALERIA . $noticia->img2) : "";
            $this->template->set('imagen_dos', $imagen_dos);
            $imagen_tres = $noticia->img3 ? site_url(PATH_GALERIA . $noticia->img3) : "";
            $this->template->set('imagen_tres', $imagen_tres);
            $imagen_cuatro = $noticia->img4 ? site_url(PATH_GALERIA . $noticia->img4) : "";
            $this->template->set('imagen_cuatro', $imagen_cuatro);
            $imagen_cinco = $noticia->img5 ? site_url(PATH_GALERIA . $noticia->img5) : "";
            $this->template->set('imagen_cinco', $imagen_cinco);
            $imagen_seis = $noticia->img6 ? site_url(PATH_GALERIA . $noticia->img6) : "";
            $this->template->set('imagen_seis', $imagen_seis);
            $imagen_siete = $noticia->img7 ? site_url(PATH_GALERIA . $noticia->img7) : "";
            $this->template->set('imagen_siete', $imagen_siete);
            $imagen_ocho = $noticia->img8 ? site_url(PATH_GALERIA . $noticia->img8) : "";
            $this->template->set('imagen_ocho', $imagen_ocho);
            $imagen_nueve = $noticia->img9 ? site_url(PATH_GALERIA . $noticia->img9) : "";
            $this->template->set('imagen_nueve', $imagen_nueve);
            $imagen_diez = $noticia->img10 ? site_url(PATH_GALERIA . $noticia->img10) : "";
            $this->template->set('imagen_diez', $imagen_diez);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias');
        $this->template->render('administracion/noticia/editar_galeria');
    }

    public function evento()
    {
        $this->_validar_login('admin');

        $this->load->model('evento_model');
        $eventos = $this->evento_model->get_all_eventos();
        if ($eventos) {
            $this->template->set('eventos', $eventos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_eventos');
        $this->template->render('administracion/evento/index');
    }

    public function agregar_evento()
    {
        $this->_validar_login('admin');

        $this->load->model('evento_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Contenido',
                ],
                [
                    'field' => 'url',
                    'label' => 'URL',
                ],
                [
                    'field' => 'fecha_inicio',
                    'label' => 'Fecha Inicio',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_fin',
                    'label' => 'Fecha Fin',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_evento',
                    'label' => 'Fecha Evento',
                    'rules' => 'max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'hora_evento',
                    'label' => 'Hora Evento',
                    'rules' => 'max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'lugar',
                    'label' => 'Lugar',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'contacto',
                    'label' => 'Contacto',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "evento", "error_imagen");
            $imagenp = $this->_validar_imagen('imagenp', false, "eventopeq", "error_imagenp");
            $pdf = $this->_validar_documento('documento', false, "documento_evento");

            if ($this->form_validation->run() === true && $imagen && $imagenp && $pdf) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'url' => $this->input->post('url'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'fecha_evento' => $this->input->post('fecha_evento'),
                    'hora_evento' => $this->input->post('hora_evento'),
                    'publicar' => $this->input->post('publicar'),
                    'lugar' => $this->input->post('lugar'),
                    'contacto' => $this->input->post('contacto'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenp['file_name'])) {
                    $info['imagenp'] = $imagenp['file_name'];
                }
                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }
                $ok = $this->evento_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo evento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo evento']);
                }
                redirect('administracion/evento');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_eventos');
        $this->template->render('administracion/evento/agregar_evento');
    }

    public function editar_evento()
    {
        $this->_validar_login('admin');

        $this->load->model('evento_model');
        $id_evento = $this->input->post('id_evento');

        if (!$id_evento) {
            $id_evento = $this->session->id_evento;
            if (!$id_evento) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_evento', $id_evento);
        }

        $evento = $this->evento_model->get_evento($id_evento);
        $evento->fecha_inicio = strftime('%Y-%m-%dT%H:%M:%S', strtotime($evento->fecha_inicio));
        $evento->fecha_fin = strftime('%Y-%m-%dT%H:%M:%S', strtotime($evento->fecha_fin));
        //   echo '<pre>'; print_r($evento); return;

        if (!$evento) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del evento seleccionado.']);
            redirect('administracion/evento');
        }

        if ($this->input->post('editar') == 1) {
            //    echo '<pre>'; print_r($this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')); return;

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Contenido',
                ],
                [
                    'field' => 'url',
                    'label' => 'URL',
                ],
                [
                    'field' => 'fecha_inicio',
                    'label' => 'Fecha Inicio',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_fin',
                    'label' => 'Fecha Fin',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_evento',
                    'label' => 'Fecha Evento',
                    'rules' => 'required|max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'hora_evento',
                    'label' => 'Hora Evento',
                    'rules' => 'max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'lugar',
                    'label' => 'Lugar',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'contacto',
                    'label' => 'Contacto',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "evento", "error_imagen");
            $imagenp = $this->_validar_imagen('imagenp', false, "eventopeq", "error_imagenp");
            $pdf = $this->_validar_documento('documento', false, "documento_evento");

            if ($this->form_validation->run() === true && $imagen && $pdf && $imagenp) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'url' => $this->input->post('url'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'fecha_evento' => $this->input->post('fecha_evento'),
                    'hora_evento' => $this->input->post('hora_evento'),
                    'publicar' => $this->input->post('publicar'),
                    'lugar' => $this->input->post('lugar'),
                    'contacto' => $this->input->post('contacto'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenp['file_name'])) {
                    $info['imagenp'] = $imagenp['file_name'];
                }
                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }
                $ok = $this->evento_model->update_evento($id_evento, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el evento.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/evento');
            }
        } else {
            $_POST = array_merge($_POST, (array) $evento);
            $imagen_evento = $evento->imagen ? site_url(PATH_EVENTO . $evento->imagen) : "";
            $this->template->set('imagen_evento', $imagen_evento);
            $imagen_pevento = $evento->imagenp ? site_url(PATH_EVENTO . $evento->imagenp) : "";
            $this->template->set('imagen_pevento', $imagen_pevento);
            if ($evento->archivo) {
                $ruta_documento = site_url(PATH_PDF_DOCUMENTO_EVENTO . $evento->archivo);
                $this->template->set('ruta_documento', $ruta_documento);
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_eventos');
        $this->template->render('administracion/evento/editar_evento');
    }

    public function novedad()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $novedades = $this->noticia_model->get_all_novedades();
        if ($novedades) {
            $this->template->set('novedades', $novedades);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_novedades');
        $this->template->render('administracion/novedad/index');
    }

    public function agregar_novedad()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Contenido',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_novedad");
            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => 1,
                ];
                if (isset($pdf['file_name'])) {
                    $info['adjunto'] = "../reglamentacion/" . $pdf['file_name'];
                }
                $ok = $this->noticia_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva Novedad']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva Novedad']);
                }
                redirect('administracion/novedad');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_novedades');
        $this->template->render('administracion/novedad/agregar_novedad');
    }

    public function editar_novedad()
    {
        $this->_validar_login('admin');

        $this->load->model('noticia_model');
        $id_novedad = $this->input->post('id_novedad');

        if (!$id_novedad) {
            $id_novedad = $this->session->id_novedad;
            if (!$id_novedad) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_novedad', $id_novedad);
        }

        $novedad = $this->noticia_model->get_noticia($id_novedad);

        if (!$novedad) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la noticia seleccionada.']);
            redirect('administracion/novedad');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Contenido',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_novedad");
            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'id_titulo' => $this->input->post('id_titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => $this->input->post('fecha'),
                    'publicar' => $this->input->post('publicar'),
                    'tipo' => 1,
                ];
                if (isset($pdf['file_name'])) {
                    $info['adjunto'] = "../reglamentacion/" . $pdf['file_name'];
                }
                $ok = $this->noticia_model->update_noticia($id_novedad, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la Novedad.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/novedad');
            }
        } else {
            $_POST = array_merge($_POST, (array) $novedad);
            $ruta_documento = site_url(PATH_PDF_DOCUMENTO_NOVEDAD . $novedad->adjunto);
            $this->template->set('ruta_documento', $ruta_documento);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_novedades');
        $this->template->render('administracion/novedad/editar_novedad');
    }

    public function infouser()
    {
        $this->load->model('storage_model');
        $this->storage_id = '2';
        $storage = $this->storage_model->get_storage($this->storage_id);
        $this->load->library('upload');
        if ($storage) {
            $this->upload_dir = $storage->BUCKET; //$storage->BUCKET;  --- '../uploads'
            if (ENVIRONMENT == 'development') {
                $this->upload_dir = '../uploads';
            }
        }
        if ($this->input->post('codigo') && $this->input->post('origen') && $this->input->post('destino')) {
            if (ENVIRONMENT == 'development') {
                $_POST['origen'] = '/var/www/uploads/88207572/foto_reciente/bdc42ec48baec9cac97ffaa858e00f1b.png';
            }
            $doc = str_replace('/var/www/uploads', $this->upload_dir, $this->input->post('origen'));
            $partes = explode('.', $_POST['origen']);
            $extension = $partes[1];
            $name = 'foto';
            $contents = file_get_contents($doc);
            $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($contents);
            if ($extension == 'pdf' || $extension == 'PDF') {
                $base64 = 'data:application/pdf;base64,' . base64_encode($contents);
                $archivo = '<object data="' . $base64 . '" type="application/pdf" width="100%" height="400px"/>';
            } else {
                $archivo = '<div style="display:none"><img id="source" src="' . $base64 . '"/></div><input id="base" type="hidden" value="' . $base64 . '">';
            }
            echo json_encode(['carga' => true, 'archivo' => $archivo]);
        } else {
            echo json_encode(['carga' => false]);
        }
        exit();
    }

    public function seccion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('seccion_model');
        $secciones = $this->seccion_model->get_all_secciones($this->session->userdata(SESSION_NAME)->rol);
        if ($secciones) {
            $this->template->set('secciones', $secciones);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_js('js/views/administracion/administracion');
        $this->template->add_js("plugins/notify/notify.min");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");
        $this->template->add_css("css/views/administracion/seccion/seccion");
        

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/seccion/index');
    }

    public function agregar_seccion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('seccion_model');
        if ($this->input->post('agregar') == 1) {

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_seccion',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[500]|callback_alpha_es',
                ],
                [
                    'field' => 'id_titulo',
                    'label' => 'Nombre Corto',
                    'rules' => 'required|max_length[255]|alpha_dash',
                ],
                [
                    'field' => 'desc_seccion',
                    'label' => 'Descripción',
                    'rules' => 'max_length[8000]',
                ],
                [
                    'field' => 'fecha_actualizacion_seccion',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) 
            {

                $seccion = $this->seccion_model->get_seccion_nombre($this->input->post('nombre_seccion'));

                if(empty($seccion))
                {
                    $info = [
                        'nombre_seccion' => $this->input->post('nombre_seccion'),
                        'desc_seccion' => $this->input->post('desc_seccion'),
                        'fecha_actualizacion_seccion' => $this->input->post('fecha_actualizacion_seccion'),
                        'publicar' => $this->input->post('publicar'),
                        'rol_usuario' => $this->session->userdata(SESSION_NAME)->rol
                    ];

                    $ok = $this->seccion_model->insert($info);


                    if ($ok === true) 
                    {
                        $sesion = $this->seccion_model->get_seccion_nombre($this->input->post('nombre_seccion'));
                        $info = [
                            'nombre_url' => $this->input->post('id_titulo'),
                            'id_seccion' => $sesion->id_seccion,
                        ];

                        // Verificar si se ha enviado un archivo
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                        {
                            sort($_FILES['imagen_banner']['name']);//ordena el array de las imágenes
                            
                            // Verificar si hay errores en la carga
                            if (isset($_FILES['imagen_banner']) && !empty($_FILES['imagen_banner']['name'][0])) 
                            {

                                // Definir la ruta de destino donde se guardarán las imágenes
                                $rutaDestino = 'public/imagenes/seccion/';

                                // Verificar si la carpeta de destino existe, si no, crearla
                                if (!file_exists($rutaDestino)) {
                                    mkdir($rutaDestino, 0777, true);
                                }

                                $contador_imagen = 1;
                                // Procesar cada imagen
                                $totalArchivos = count($_FILES['imagen_banner']['name']);
                                for ($i = 0; $i < $totalArchivos; $i++) 
                                {
                                    // Verificar si hay errores en la carga del archivo
                                    if ($_FILES['imagen_banner']['error'][$i] == UPLOAD_ERR_OK) 
                                    {
                                        $nombreArchivo = $_FILES['imagen_banner']['name'][$i];

                                        
                                        // Obtener información del archivo
                                        $info2 = pathinfo($nombreArchivo);

                                        // Separar el nombre de la extensión
                                        $nombre = $info2['filename']; // Nombre del archivo sin extensión
                                        $extension = $info2['extension']; // Extensión del archivo
                                        $encryption_key = 'clave_pagina_ufps'; 

                                        //Encripta el nombre de la imagen y valida que no se repita en la tabla p_seccion_img
                                        $nombreArchivo = $this->encryptFilename($nombre, $encryption_key,$extension).'.'.$extension;
                                        
                                        $rutaTemporal = $_FILES['imagen_banner']['tmp_name'][$i];

                                        // Mover el archivo desde la ubicación temporal a la carpeta de destino
                                        if (move_uploaded_file($rutaTemporal, $rutaDestino . basename($nombreArchivo))) 
                                        {
                                            $this->template->set_flash_message(['success' => "La imagen se ha subido correctamente: " . htmlspecialchars($nombreArchivo) . "<br>"]);

                                            $info_imagen = [
                                                        'id_seccion' => $info["id_seccion"],
                                                        'img'.$contador_imagen => $nombreArchivo
                                                    ];


                                            $imagen = $this->seccion_model->get_imagen_seccion($info["id_seccion"]);

                                            if(!empty($imagen))
                                                $ok = $this->seccion_model->update_imagen_banner($imagen->id, $info_imagen);
                                            else
                                                $ok = $this->seccion_model->insert_imagen_banner($info_imagen);
                                                
                                        } 
                                        else 
                                        {
                                            //echo "Error al mover la imagen: " . htmlspecialchars($nombreArchivo) . "<br>";
                                            $this->template->set_flash_message(['error' => "Error al mover la imagen: " . htmlspecialchars($nombreArchivo) . "<br>"]);
                                        }
                                    } 
                                    else 
                                    {
                                        //echo "Error en la carga de la imagen: " . $_FILES['imagen_banner']['error'][$i] . "<br>";
                                        $this->template->set_flash_message(['error' => "Error en la carga de la imagen: " . $_FILES['imagen_banner']['error'][$i] . "<br>"]);
                                    }

                                    $contador_imagen++;
                                }
                                
                            } 
                            else 
                            {
                                //echo "No se ha enviado ninguna imagen.";
                            }
                        } 
                        else 
                        {
                            //echo "No se ha enviado ningún archivo.";
                        }

                        $ok2 = $this->seccion_model->insert_url($info);
                        if ($ok2) 
                        {
                            $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva sección y el nuevo Url de la sección']);
                        } 
                        else 
                        {
                            $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo Url de la sección']);
                        }
                        $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva sección']);
                    } 
                    else 
                    {
                        $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva sección']);
                    }


                }
                else
                {
                    $this->template->set_flash_message(['error' => 'Error: La sección ya existe en la base de datos']);
                    redirect('administracion/agregar_seccion');
                }

                redirect('administracion/seccion');
                
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor"); //plugin del editor de texto enriquecido
        $this->template->add_js('plugins/cropper/cropper'); //plugin para recortar imágenes
        $this->template->add_js('plugins/fileup/fileup'); //plugin para subir múltiples archivos con Jquery y Ajax
        $this->template->add_js('js/views/administracion/imagenuser');
        $this->template->add_js('js/views/administracion/administracion');
        $this->template->add_css('plugins/cropper/cropper');
        $this->template->add_css('plugins/fileup/fileup');
        $this->template->add_css("css/views/administracion/seccion/seccion");
        //$this->template->add_css('plugins/fileup/fileup.bootstrap.min');

        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/seccion/agregar_seccion');
    }

    public function editar_seccion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('seccion_model');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        $seccion = $this->seccion_model->get_seccion($id_seccion);
        $url_link = $this->seccion_model->get_link($id_seccion);
        $seccion->fecha_actualizacion_seccion = strftime('%Y-%m-%dT%H:%M:%S', strtotime($seccion->fecha_actualizacion_seccion));

        if (!$seccion) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/seccion');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_seccion',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[500]|callback_alpha_es',
                ],
                [
                    'field' => 'desc_seccion',
                    'label' => 'Descripción',
                    'rules' => 'max_length[8000]',
                ],
                [
                    'field' => 'fecha_actualizacion_seccion',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_seccion' => $this->input->post('nombre_seccion'),
                    'desc_seccion' => $this->input->post('desc_seccion'),
                    'fecha_actualizacion_seccion' => $this->input->post('fecha_actualizacion_seccion'),
                    'publicar' => $this->input->post('publicar'),
                ];

                $ok = $this->seccion_model->update_seccion($id_seccion, $info);
                if ($ok) 
                {
                    $info["id_seccion"] = $this->input->post('id_seccion');

                    $carpeta = 'public/imagenes/seccion/';

                    //Consulta si la sección tiene imágenes registradas
                    $lista = $this->seccion_model->get_imagen_seccion($info["id_seccion"]);

                    if(!empty($lista)) //si la sección ya tiene imágenes registradas
                    {
                        $nombresImagenes = array($lista->img1,$lista->img2,$lista->img3,$lista->img4,$lista->img5,$lista->img6);
                        
                        if ($this->eliminarArchivosEnCarpeta($carpeta,$nombresImagenes)) 
                        {
                            $info_imagen = [
                                        'id_seccion' => $info["id_seccion"],
                                        'img1' => NULL,
                                        'img2' => NULL,
                                        'img3' => NULL,
                                        'img4' => NULL,
                                        'img5' => NULL,
                                        'img6' => NULL,
                                        ];

                            $imagen = $this->seccion_model->get_imagen_seccion($info["id_seccion"]);

                            //Elimina todas las imagenes que tenga la sección en la base de datos
                            $ok = $this->seccion_model->update_imagen_banner($imagen->id, $info_imagen);

                        }
                    }

                    // Verificar si se ha enviado un archivo
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {
                        //ordena el array de las imágenes                                
                        sort($_FILES['imagen_banner']['name']);


                        // Verificar si hay errores en la carga
                        if (isset($_FILES['imagen_banner']) && !empty($_FILES['imagen_banner']['name'][0])) 
                        {
                            // Definir la ruta de destino donde se guardarán las imágenes
                            $rutaDestino = 'public/imagenes/seccion/';

                            // Verificar si la carpeta de destino existe, si no, crearla
                            if (!file_exists($rutaDestino)) {
                                mkdir($rutaDestino, 0777, true);
                            }

                            $contador_imagen = 1;
                            // Procesar cada imagen
                            $totalArchivos = count($_FILES['imagen_banner']['name']);
                            for ($i = 0; $i < $totalArchivos; $i++) 
                            {
                                // Verificar si hay errores en la carga del archivo
                                if ($_FILES['imagen_banner']['error'][$i] == UPLOAD_ERR_OK) 
                                {
                                    $nombreArchivo = $_FILES['imagen_banner']['name'][$i];

                                    // Obtener información del archivo
                                    $info2 = pathinfo($nombreArchivo);

                                    // Separar el nombre de la extensión
                                    $nombre = $info2['filename']; // Nombre del archivo sin extensión
                                    $extension = $info2['extension']; // Extensión del archivo
                                    $encryption_key = 'clave_pagina_ufps'; 

                                    //Encripta el nombre de la imagen y valida que no se repita en la tabla p_seccion_img
                                    $nombreArchivo = $this->encryptFilename($nombre, $encryption_key,$extension).'.'.$extension;

                                    $rutaTemporal = $_FILES['imagen_banner']['tmp_name'][$i];

                                    // Mover el archivo desde la ubicación temporal a la carpeta de destino
                                    if (move_uploaded_file($rutaTemporal, $rutaDestino . basename($nombreArchivo))) 
                                    {
                                        $this->template->set_flash_message(['success' => "La imagen se ha subido correctamente: " . htmlspecialchars($nombreArchivo) . "<br>"]);

                                        $info_imagen = [
                                                    'id_seccion' => $info["id_seccion"],
                                                    'img'.$contador_imagen => $nombreArchivo
                                                ];


                                        $imagen = $this->seccion_model->get_imagen_seccion($info["id_seccion"]);

                                        if(!empty($imagen))
                                            $ok = $this->seccion_model->update_imagen_banner($imagen->id, $info_imagen);
                                        else
                                            $ok = $this->seccion_model->insert_imagen_banner($info_imagen);
                                            
                                    } 
                                    else 
                                    {
                                        //echo "Error al mover la imagen: " . htmlspecialchars($nombreArchivo) . "<br>";
                                        $this->template->set_flash_message(['error' => "Error al mover la imagen: " . htmlspecialchars($nombreArchivo) . "<br>"]);
                                    }
                                } 
                                else 
                                {
                                    //echo "Error en la carga de la imagen: " . $_FILES['imagen_banner']['error'][$i] . "<br>";
                                    $this->template->set_flash_message(['error' => "Error en la carga de la imagen: " . $_FILES['imagen_banner']['error'][$i] . "<br>"]);
                                }

                                $contador_imagen++;
                            }
                            
                        } 
                        else 
                        {
                            //echo "No se ha enviado ninguna imagen.";
                        }
                    } 
                    else 
                    {
                        //echo "No se ha enviado ningún archivo.";
                    }

                    $info_url = [
                                'id_seccion' => $info["id_seccion"],
                                'nombre_url' => $this->input->post('nombre_url')
                            ];

                    $url = $this->seccion_model->get_link($info["id_seccion"]);

                    if(!empty($url))
                        $ok2 = $this->seccion_model->update_url($info["id_seccion"], $info_url);
                    else
                        $ok2 = $this->seccion_model->insert_url($info_url);

                    if ($ok2) 
                        $this->template->set_flash_message(['success' => 'Se ha modificada exitosamente la url de la sección']);
                    else 
                        $this->template->set_flash_message(['error' => 'Ocurrio un error al modificar la Url de la sección']);

                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la sección seleccionada']);
                } 
                else 
                {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/seccion');
            }
        } else {
            $_POST = array_merge($_POST, (array) $seccion, (array) $url_link);
            //echo '<pre>';
            //echo var_dump($_POST);
            //echo '</pre>';
            //die;
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->template->add_js('plugins/cropper/cropper'); //plugin para recortar imágenes
        $this->template->add_js('plugins/fileup/fileup'); //plugin para subir múltiples archivos con Jquery y Ajax
        $this->template->add_js('js/views/administracion/imagenuser');
        $this->template->add_js('js/views/administracion/administracion');
        $this->template->add_css('plugins/cropper/cropper');
        $this->template->add_css('plugins/fileup/fileup');
        $this->template->add_css("css/views/administracion/seccion/seccion");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/seccion/editar_seccion');
    }

    public function borrar_seccion()
    {
        $this->_validar_login('admin');

        //$this->load->model('contenido_model');
        $this->load->model('seccion_model');

        //$id_contenido = $this->session->id_contenido;
        $id_seccion = $this->input->post("id_seccion");

        if (!$id_seccion) 
            redirect('administracion');

        $seccion = $this->seccion_model->get_seccion($id_seccion);

        if(!empty($seccion))
        {
            
        }

        if (empty($seccion)) 
        {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la sección seleccionada']);
            redirect('administracion/seccion');
        }

        $info = ['id' => $documento->id];
        $ok = $this->documento_model->delete($info);

        if ($ok) {
            $this->template->set_flash_message(['success' => 'Se ha eliminado exitosamente el documento']);
        } else {
            $this->template->set_flash_message(['error' => 'Ocurrio un error al eliminar el documento']);
        }
        redirect('administracion/documentos');
    }

    public function validar_seccion()
    {
        $this->load->model('seccion_model');
        $resultado = $this->seccion_model->validar_seccion($this->input->post('id_seccion'));

        //echo json_encode($resultado);exit;

        //Si encuentra noticias
        if (!empty($resultado)) {
            echo json_encode([
                "estado" => "success",
                "mensaje" => "La consulta se realizó correctamente",
                "resultado" => $resultado,
                "id_seccion" => $this->input->post('id_seccion'),
            ]);
            exit();
        } else {
            echo json_encode([
                "estado" => "error",
                "mensaje" => "No se encontró información de la sección",
            ]);
            exit();
        }
    }

    public function borrar_registro_seccion()
    {
        $this->load->model('seccion_model');

        /*******************Si el tipo de Registro es Imagen**********/

        if($this->input->post('tipo_registro') == 'Imagen')
        {
            $carpeta = 'public/imagenes/seccion/';
            $lista = $this->seccion_model->get_imagen_seccion($this->input->post('id_seccion'));

            if(!empty($lista))
            {
                $nombresImagenes = array($lista->img1,$lista->img2,$lista->img3,$lista->img4,$lista->img5,$lista->img6);

                //Elimina todos los archivos/imágenes que haya en la carpeta
                $ok1 = $this->eliminarArchivosEnCarpeta($carpeta,$nombresImagenes);
            }
        }

        ////////////////////////////////////////////////////////////////////

        $ok = $this->seccion_model->borrar_registro_seccion($this->input->post('id_seccion'),$this->input->post('tipo_registro'));

        //echo json_encode($resultado);exit;

        //Si encuentra noticias
        if ($ok === true) 
        {
            $resultado = $this->seccion_model->validar_seccion($this->input->post('id_seccion'));

            echo json_encode([
                "estado" => "success",
                "mensaje" => "Se eliminó correctamente los registros del tipo: ". $this->input->post('tipo_registro'),
                "resultado" => $resultado,
                "id_seccion" => $this->input->post('id_seccion')
            ]);
            exit();
        } else {
            echo json_encode([
                "estado" => "error",
                "mensaje" => "No se pudieron eliminar los registros",
            ]);
            exit();
        }
    }

    public function delete_seccion()
    {
        $this->load->model('seccion_model');

        $carpeta = 'public/imagenes/seccion/';
        $lista = $this->seccion_model->get_imagen_seccion($this->input->post('id_seccion'));

        if(!empty($lista))
        {
            $nombresImagenes = array($lista->img1,$lista->img2,$lista->img3,$lista->img4,$lista->img5,$lista->img6);

            //Elimina todos los archivos/imágenes que haya en la carpeta
            $ok1 = $this->eliminarArchivosEnCarpeta($carpeta,$nombresImagenes);
        }

        ////////////////////////////////////////////////////////////////////

        $ok = $this->seccion_model->delete_seccion($this->input->post('id_seccion'));

        //echo json_encode($resultado);exit;

        //Si encuentra noticias
        if ($ok === true) 
        {
            echo json_encode([
                "estado" => "success",
                "mensaje" => "La sección se eliminó correctamente"
            ]);
            exit();
        } else {
            echo json_encode([
                "estado" => "error",
                "mensaje" => "No se pudieron eliminar los registros",
            ]);
            exit();
        }
    }



    function encryptFilename($filename, $encryption_key,$extension) 
    {
        $method = 'aes-256-cbc'; // Método de encriptación
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)); // Generar un IV aleatorio

        // Encriptar el nombre del archivo
        $encrypted_filename = openssl_encrypt($filename, $method, $encryption_key, 0, $iv);

        // Codificar el IV y el nombre encriptado en base64 para almacenamiento
        $nombre_encriptado2 =  base64_encode($encrypted_filename . '::' . base64_encode($iv));
        $resultado = $this->seccion_model->validar_nombre_imagen_seccion($nombre_encriptado2.'.'.$extension);

        if(count($resultado) > 0)
            $this->encryptFilename($nombre_encriptado2, $encryption_key,$extension);
        else
            return $nombre_encriptado2;

    }

    function decryptFilename($encrypted_filename, $encryption_key) 
    {
        $method = 'aes-256-cbc'; // Método de encriptación

        // Decodificar base64
        list($encrypted_data, $iv) = explode('::', base64_decode($encrypted_filename), 2);
        $iv = base64_decode($iv);

        // Desencriptar el nombre del archivo
        return openssl_decrypt($encrypted_data, $method, $encryption_key, 0, $iv);
    }



function eliminarArchivosEnCarpeta($carpeta, $nombresImagenes) 
{
    // Verifica si la carpeta existe
    if (!is_dir($carpeta)) {
        //echo "La carpeta no existe.";
        return false;
    }

    // Obtener todos los archivos y subcarpetas en la carpeta
    $archivos = array_diff(scandir($carpeta), array('.', '..'));

    foreach ($archivos as $archivo) 
    {
        // Comprueba si el archivo está en el array de nombres de imágenes
        if (in_array($archivo, $nombresImagenes)) 
        {
            $rutaCompleta = $carpeta . DIRECTORY_SEPARATOR . $archivo;

            if (is_file($rutaCompleta)) 
            {
                // Eliminar el archivo
                if (unlink($rutaCompleta)) 
                {
                    //echo "Archivo eliminado: $rutaCompleta<br>";
                } 
                else 
                {
                    //echo "No se pudo eliminar el archivo: $rutaCompleta<br>";
                }
            }
        }
    }

    return true;
}


    public function consultar_imagenes_seccion()
    {
        $this->load->model('seccion_model');
        $imagenes = $this->seccion_model->get_imagen_seccion($this->input->post('id_seccion'));
        //var_dump($imagenes->img1); die;

        $contador = 1;

        if(!empty($imagenes))
        {
            $lista_imagenes = array($imagenes->img1,$imagenes->img2,$imagenes->img3,$imagenes->img4,$imagenes->img5,$imagenes->img6);
            $lista_imagenes2 = array();  
            

            foreach($lista_imagenes as $imagen)
            {
                if(!empty($imagen) )
                {
                    // Ruta al archivo de imagen
                    $imagePath =  getcwd().'/public/imagenes/seccion/'.$imagen; 
                    $fileSize = 0;

                    //echo $imagePath;die;

                    // Verificar si el archivo existe
                    if (file_exists($imagePath)) 
                    {
                        // Obtener el tamaño del archivo en bytes
                        $fileSize = filesize($imagePath);
                        
                    } 

                    $imagen2 = array(
                        "name" => $imagen,
                        "size" => $fileSize,
                        "urlPreview" => '../../../../public/imagenes/seccion/'.$imagen,
                        "urlDownload" => ''
                    );

                    $lista_imagenes2 []= $imagen2;

                }

            }

            //Si encuentra noticias
            if (!empty($lista_imagenes2)) 
            {
                echo json_encode([
                    "estado" => "success",
                    "mensaje" => "La consulta se realizó correctamente",
                    "imagenes" => $lista_imagenes2
                ]);
                exit();
            } else 
            {
                echo json_encode([
                    "estado" => "error",
                    "mensaje" => "No se encontraron imagenes en la carpeta",
                ]);
                exit();
            }

        }
        else
        {
            echo json_encode([
                    "estado" => "error",
                    "mensaje" => "No se encontraron imagenes en la carpeta",
                ]);
                exit();
        }

    }

    public function menu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('menu_model');
        $this->load->model('seccion_model');
        $id_seccion = $this->input->post('id_seccion');

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }
        $menus = $this->menu_model->get_all_menu($id_seccion);
        if ($menus) {
            $this->template->set('menus', $menus);
        }

        //  echo '<pre>'; print_r($menus); return;

        $url_link = $this->seccion_model->get_link($id_seccion);
        $this->template->set('nombre_url', base_url('/universidad/') . $url_link->nombre_url . '/');

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/index');
    }

    public function agregar_menu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->template->add_js('js/views/autoform/validar');
        $this->load->model('menu_model');
        $id_seccion = $this->session->id_seccion;
        $this->load->model('contenido_model');
        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);
        $this->template->set('contenidos', $contenidos);

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_menu',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'orden_menu_p',
                    'label' => 'Orden Menú',
                    'rules' => 'required|max_length[32]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->input->post('tipo_enlace') == 2) {
                $pdf = $this->_validar_documento('documento', false, "documento_menu");
            }

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_menu' => $this->input->post('nombre_menu'),
                    'padre_menu' => 0,
                    'orden_menu' => 0,
                    'orden_menu_p' => $this->input->post('orden_menu_p'),
                    'publicar' => $this->input->post('publicar'),
                    'id_seccion' => $id_seccion,
                ];

                if ($this->input->post('tipo_enlace') == 1 && $this->input->post('enlace_contenido')) {
                    $info['enlace_menu'] = $this->input->post('enlace_contenido');
                }
                if ($this->input->post('tipo_enlace') == 2) {
                    if (isset($pdf['file_name'])) {
                        $info['enlace_menu'] = "getArchivoPdf," . $pdf['file_name'];
                    }
                }
                if ($this->input->post('tipo_enlace') == 3 && $this->input->post('enlace_link')) {
                    $info['enlace_menu'] = 'getLink,' . $this->input->post('enlace_link');
                }
                if ($this->input->post('tipo_enlace') == 4) {
                    $info['enlace_menu'] = 'getGruposSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 5) {
                    $info['enlace_menu'] = 'getPublicacionesSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 6) {
                    $info['enlace_menu'] = null;
                }

                $ok = $this->menu_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo menú']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo menú']);
                }
                redirect('administracion/menu');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/agregar_menu');
    }

    public function editar_menu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->template->add_js('js/views/autoform/validar');

        $this->load->model('menu_model');
        $this->load->model('contenido_model');
        $id_menu = $this->input->post('id_menu');
        $id_seccion = $this->session->id_seccion;

        if (!$id_menu) {
            $id_menu = $this->session->id_menu;
            if (!$id_menu) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_menu', $id_menu);
        }

        $menu = $this->menu_model->get_menu($id_menu);
        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);

        if (!$menu) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/menu');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_menu',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'orden_menu_p',
                    'label' => 'Orden Menú',
                    'rules' => 'required|max_length[32]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->input->post('tipo_enlace') == 2) {
                $pdf = $this->_validar_documento('documento', false, "documento_menu");
            }

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_menu' => $this->input->post('nombre_menu'),
                    'orden_menu_p' => $this->input->post('orden_menu_p'),
                    'publicar' => $this->input->post('publicar'),
                ];

                if ($this->input->post('tipo_enlace') == 1 && $this->input->post('enlace_contenido')) {
                    $info['enlace_menu'] = $this->input->post('enlace_contenido');
                }
                if ($this->input->post('tipo_enlace') == 2) {
                    if (isset($pdf['file_name'])) {
                        $info['enlace_menu'] = "getArchivoPdf," . $pdf['file_name'];
                    }
                }
                if ($this->input->post('tipo_enlace') == 3 && $this->input->post('enlace_link')) {
                    $info['enlace_menu'] = 'getLink,' . $this->input->post('enlace_link');
                }
                if ($this->input->post('tipo_enlace') == 4) {
                    $info['enlace_menu'] = 'getGruposSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 5) {
                    $info['enlace_menu'] = 'getPublicacionesSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 6) {
                    $info['enlace_menu'] = null;
                }

                $ok = $this->menu_model->update_menu($id_menu, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el menú seleccionado']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/menu');
            }
        } else {
            $_POST = array_merge($_POST, (array) $menu);
            $this->template->set('contenidos', $contenidos);
            //  echo '<pre>'; print_r($contenidos); return;
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/editar_menu');
    }

    public function submenu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('menu_model');
        $id_menu_p = $this->input->post('id_menu');

        if ($id_menu_p) {
            $this->session->set_userdata('id_menu_p', $id_menu_p);
        } else {
            $id_menu_p = $this->session->id_menu_p;
        }
        $menus = $this->menu_model->get_all_submenu($id_menu_p);
        if ($menus) {
            $this->template->set('menus', $menus);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/submenu');
    }

    public function editar_submenu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->template->add_js('js/views/autoform/validar');

        $this->load->model('menu_model');
        $this->load->model('contenido_model');
        $id_menu = $this->input->post('id_menu');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_menu) {
            $id_menu = $this->session->id_menu;
            if (!$id_menu) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_menu', $id_menu);
        }
        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }

        $menus_p = $this->menu_model->get_all_menu($id_seccion);
        if ($menus_p) {
            $this->template->set('menus_p', $menus_p);
        }
        $menu = $this->menu_model->get_menu($id_menu);
        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);

        if (!$menu) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/submenu');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_menu',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'padre_menu',
                    'label' => 'Menú padre',
                    'rules' => 'required|max_length[11]',
                ],
                [
                    'field' => 'orden_menu',
                    'label' => 'Orden subMenú',
                    'rules' => 'required|max_length[2]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->input->post('tipo_enlace') == 2) {
                $pdf = $this->_validar_documento('documento', false, "documento_menu");
            }

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_menu' => $this->input->post('nombre_menu'),
                    'padre_menu' => $this->input->post('padre_menu'),
                    'orden_menu' => $this->input->post('orden_menu'),
                    'publicar' => $this->input->post('publicar'),
                ];

                if ($this->input->post('tipo_enlace') == 1 && $this->input->post('enlace_contenido')) {
                    $info['enlace_menu'] = $this->input->post('enlace_contenido');
                }
                if ($this->input->post('tipo_enlace') == 2) {
                    if (isset($pdf['file_name'])) {
                        $info['enlace_menu'] = "getArchivoPdf," . $pdf['file_name'];
                    }
                }
                if ($this->input->post('tipo_enlace') == 3 && $this->input->post('enlace_link')) {
                    $info['enlace_menu'] = 'getLink,' . $this->input->post('enlace_link');
                }
                if ($this->input->post('tipo_enlace') == 4) {
                    $info['enlace_menu'] = 'getGruposSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 5) {
                    $info['enlace_menu'] = 'getPublicacionesSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 6) {
                    $info['enlace_menu'] = null;
                }

                //echo var_dump($info);die;
                $ok = $this->menu_model->update_menu($id_menu, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el submenú seleccionado']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/submenu');
            }
        } else {
            $_POST = array_merge($_POST, (array) $menu);
            $this->template->set('contenidos', $contenidos);
            //  echo '<pre>'; print_r($contenidos); return;
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/editar_submenu');
    }

    public function agregar_submenu()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->template->add_js('js/views/autoform/validar');
        $this->load->model('menu_model');
        $this->load->model('contenido_model');
        $id_seccion = $this->input->post('id_seccion');
        $id_menu_p = $this->input->post('id_menu');

        if ($id_menu_p) {
            $this->session->set_userdata('id_menu_p', $id_menu_p);
        } else {
            $id_menu_p = $this->session->id_menu_p;
        }

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }

        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);
        $this->template->set('contenidos', $contenidos);

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_menu',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'orden_menu',
                    'label' => 'Orden subMenú',
                    'rules' => 'required|max_length[2]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->input->post('tipo_enlace') == 2) {
                $pdf = $this->_validar_documento('documento', false, "documento_menu");
            }

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_menu' => $this->input->post('nombre_menu'),
                    'padre_menu' => $id_menu_p,
                    'orden_menu' => $this->input->post('orden_menu'),
                    'orden_menu_p' => 0,
                    'publicar' => $this->input->post('publicar'),
                    'id_seccion' => $id_seccion,
                ];

                if ($this->input->post('tipo_enlace') == 1 && $this->input->post('enlace_contenido')) {
                    $info['enlace_menu'] = $this->input->post('enlace_contenido');
                }
                if ($this->input->post('tipo_enlace') == 2) {
                    if (isset($pdf['file_name'])) {
                        $info['enlace_menu'] = "getArchivoPdf," . $pdf['file_name'];
                    }
                }
                if ($this->input->post('tipo_enlace') == 3 && $this->input->post('enlace_link')) {
                    $info['enlace_menu'] = 'getLink,' . $this->input->post('enlace_link');
                }
                if ($this->input->post('tipo_enlace') == 4) {
                    $info['enlace_menu'] = 'getGruposSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 5) {
                    $info['enlace_menu'] = 'getPublicacionesSeccion,' . $id_seccion;
                }
                if ($this->input->post('tipo_enlace') == 6) {
                    $info['enlace_menu'] = null;
                }

                $ok = $this->menu_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo submenú']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo submenú']);
                }
                redirect('administracion/submenu');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/menu/agregar_submenu');
    }

    public function contenido()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->template->add_css('css/pages/pricing/pricing_v8');
        $this->load->model('contenido_model');
        $id_seccion = $this->input->post('id_seccion');

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }
        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);
        if ($contenidos) {
            $this->template->set('contenidos', $contenidos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/contenido/index');
    }

    public function editar_contenido()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $id_contenido = $this->input->post('id_contenido');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        if (!$id_contenido) {
            $id_contenido = $this->session->id_contenido;
            if (!$id_contenido) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_contenido', $id_contenido);
        }

        $contenido = $this->contenido_model->get_contenido($id_contenido);

        if (!$contenido) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del contenido seleccionado.']);
            redirect('administracion/contenido');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_contenido',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'desc_contenido',
                    'label' => 'Descripción',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre_contenido' => $this->input->post('nombre_contenido'),
                    'desc_contenido' => $this->input->post('desc_contenido'),
                ];

                if ($this->input->post('sub_call_contenido') == 1) {
                    $info['sub_call_contenido'] = "getGrupoTrabajo," . $id_seccion . ",1";
                }
                if ($this->input->post('sub_call_contenido') == 2) {
                    $info['sub_call_contenido'] = "getGrupoTrabajo," . $id_seccion . ",2";
                }
                if ($this->input->post('sub_call_contenido') == 3) {
                    $info['sub_call_contenido'] = null;
                }

                $ok = $this->contenido_model->update_contenido($id_contenido, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el contenido.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/contenido');
            }
        } else {
            $_POST = array_merge($_POST, (array) $contenido);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/contenido/editar_contenido');
    }

    public function agregar_contenido()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre_contenido',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[100]|callback_alpha_es',
                ],
                [
                    'field' => 'desc_contenido',
                    'label' => 'Descripción',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'id_seccion' => $id_seccion,
                    'nombre_contenido' => $this->input->post('nombre_contenido'),
                    'desc_contenido' => $this->input->post('desc_contenido'),
                ];

                if ($this->input->post('sub_call_contenido') == 1) {
                    $info['sub_call_contenido'] = "getGrupoTrabajo," . $id_seccion . ",1";
                }
                if ($this->input->post('sub_call_contenido') == 2) {
                    $info['sub_call_contenido'] = "getGrupoTrabajo," . $id_seccion . ",2";
                }
                if ($this->input->post('sub_call_contenido') == 3) {
                    $info['sub_call_contenido'] = null;
                }

                $ok = $this->contenido_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo contenido']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo contenido']);
                }
                redirect('administracion/contenido');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/contenido/agregar_contenido');
    }

    public function documento_contenido_titulo()
    {
        
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('documento_contenido_model');
        $id_seccion = $this->input->post('id_seccion');

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }

        $titulos = $this->documento_contenido_model->get_all_documentos_titulo($id_seccion);

        if ($titulos) {
            $this->template->set('titulos', $titulos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/index');
    }

    public function editar_documento_contenido_titulo()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('documento_contenido_model');
        $this->load->model('contenido_model');
        $id_titulo = $this->input->post('id_titulo');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        if (!$id_titulo) {
            $id_titulo = $this->session->id_titulo;
            if (!$id_titulo) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_titulo', $id_titulo);
        }

        $titulo = $this->documento_contenido_model->get_documento_titulo($id_titulo);
        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);

        //   echo '<pre>'; print_r($documento); return;
        //$publicacion->fecha_real = strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacion->fecha_real));

        if (!$titulo) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del título seleccionado.']);
            redirect('administracion/documento_contenido_titulo');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción del título',
                    'rules' => 'required|max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'id_contenido',
                    'label' => 'Contenido',
                    'rules' => 'max_length[11]|required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'descripcion' => $this->input->post('descripcion'),
                    'orden' => $this->input->post('orden'),
                    'publicar' => $this->input->post('publicar'),
                    'id_contenido' => $this->input->post('id_contenido'),
                ];

                $ok = $this->documento_contenido_model->update_titulo($id_titulo, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el título.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/documento_contenido_titulo');
            }
        } else {
            $_POST = array_merge($_POST, (array) $titulo);
            $this->template->set('contenidos', $contenidos);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/editar_documento_titulo');
    }

    public function agregar_documento_contenido_titulo()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('documento_contenido_model');
        $this->load->model('contenido_model');

        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        $contenidos = $this->contenido_model->get_all_contenido($id_seccion);
        $this->template->set('contenidos', $contenidos);

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción del título',
                    'rules' => 'required|max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'id_contenido',
                    'label' => 'Contenido',
                    'rules' => 'max_length[11]|required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'descripcion' => $this->input->post('descripcion'),
                    'id_seccion' => $id_seccion,
                    'orden' => $this->input->post('orden'),
                    'publicar' => $this->input->post('publicar'),
                    'id_contenido' => $this->input->post('id_contenido'),
                ];

                $ok = $this->documento_contenido_model->insert_titulo($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo título']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo título']);
                }
                redirect('administracion/documento_contenido_titulo');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/agregar_documento_titulo');
    }

    public function documento_contenido()
    {
        
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('documento_contenido_model');
        $id_titulo = $this->input->post('id_titulo');

        if ($id_titulo) {
            $this->session->set_userdata('id_titulo', $id_titulo);
        } else {
            $id_titulo = $this->session->id_titulo;
        }

        $documentos = $this->documento_contenido_model->get_all_documentos($id_titulo);

        if ($documentos) {
            $this->template->set('documentos', $documentos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/documento');
    }

    public function agregar_documento_contenido()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('documento_contenido_model');
        $this->load->model('contenido_model');

        $id_titulo = $this->input->post('id_titulo');

        if (!$id_titulo) {
            $id_titulo = $this->session->id_titulo;
            if (!$id_titulo) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_titulo', $id_titulo);
        }

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion_documento',
                    'label' => 'Descripción del documento',
                    'rules' => 'required|max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'max_length[3]|required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'fecha_documento',
                    'label' => 'Fecha del documento',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('archivo', false, "documento_contenido_doc");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'descripcion_documento' => $this->input->post('descripcion_documento'),
                    'orden' => $this->input->post('orden'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha_documento' => $this->input->post('fecha_documento'),
                    'id_titulo' => $id_titulo,
                ];

                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }

                $ok = $this->documento_contenido_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo documento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo documento']);
                }
                redirect('administracion/documento_contenido');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/agregar_documento');
    }

    public function editar_documento_contenido()
    {
        //   $this->_validar_login('admin');
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');


        $this->load->model('documento_contenido_model');
        $this->load->model('contenido_model');
        $id_documento = $this->input->post('id_documento');

        if (!$id_documento) {
            $id_documento = $this->session->id_documento;
            if (!$id_documento) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_documento', $id_documento);
        }

        $documento = $this->documento_contenido_model->get_documento($id_documento);

        //   echo '<pre>'; print_r($documento); return;
        //$publicacion->fecha_real = strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacion->fecha_real));

        if (!$documento) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del documento seleccionado.']);
            redirect('administracion/documento_contenido');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion_documento',
                    'label' => 'Descripción del documento',
                    'rules' => 'required|max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'max_length[3]|required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'max_length[1]|required',
                ],
                [
                    'field' => 'fecha_documento',
                    'label' => 'Fecha del documento',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('archivo', false, "documento_contenido_doc");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'descripcion_documento' => $this->input->post('descripcion_documento'),
                    'orden' => $this->input->post('orden'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha_documento' => $this->input->post('fecha_documento'),
                ];

                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }

                $ok = $this->documento_contenido_model->update($id_documento, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el documento.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/documento_contenido');
            }
        } else {
            $_POST = array_merge($_POST, (array) $documento);
            $ruta_documento = site_url(PATH_PDF_DOCUMENTO_CONTENIDO_DOC . $documento->archivo);
            $this->template->set('ruta_documento', $ruta_documento);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/documento_contenido/editar_documento');
    }

    public function documentos()
    {
        $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $this->load->model('documento_model');
        $id_contenido = $this->input->post('id_contenido');

        if (!$id_contenido) {
            $id_contenido = $this->session->id_contenido;
            if (!$id_contenido) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_contenido', $id_contenido);
        }

        $contenido = $this->contenido_model->get_contenido($id_contenido, ID_PORTAL);

        if (!$contenido) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/contenido');
        }

        $documentos = $this->documento_model->get_documentos($id_contenido);
        $this->template->set('documentos', $documentos);
        $this->template->set('contenido', $contenido);

        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_contenidos');
        $this->template->render(['administracion/sidebar', 'administracion/documento/index']);
    }

    public function agregar_documento()
    {
        $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $this->load->model('documento_model');

        $id_contenido = $this->session->id_contenido;
        if (!$id_contenido) {
            redirect('administracion');
        }

        $contenido = $this->contenido_model->get_contenido($id_contenido, ID_PORTAL);

        if (!$contenido) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al procesar el recurso solicitado.']);
            redirect('administracion/contenido');
        }
        $this->load->model('contenido_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[250]|callback_alpha_es',
                ],
                [
                    'field' => 'estado',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', true, "documento_contenido");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'id_contenido' => $contenido->id,
                    'nombre' => $this->input->post('nombre'),
                    'estado' => $this->input->post('estado'),
                    'ruta_pdf' => $pdf['file_name'],
                ];
                $ok = $this->documento_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo documento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo documento']);
                }
                redirect('administracion/documentos');
            }
        }
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_contenidos');
        $this->template->render(['administracion/sidebar', 'administracion/documento/agregar_documento']);
    }

    public function editar_documento()
    {
        $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $this->load->model('documento_model');

        $id_contenido = $this->session->id_contenido;
        if (!$id_contenido) {
            $this->template->set_flash_message(['warning' => 'Debe seleccionar un bloque de contenido para acceder a este módulo.']);
            redirect('administracion');
        }

        $contenido = $this->contenido_model->get_contenido($id_contenido, ID_PORTAL);

        if (!$contenido) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al procesar el recurso solicitado.']);
            redirect('administracion/contenido');
        }

        $id_documento = $this->input->post("id_documento");
        if (!$id_documento) {
            $id_documento = $this->session->id_documento;
            if (!$id_documento) {
                $this->template->set_flash_message(['warning' => 'Debe seleccionar documento para acceder a este módulo.']);
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_documento', $id_documento);
        }

        $documento = $this->documento_model->get_documento($id_documento, $id_contenido);

        if (!$documento) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/contenido');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[250]|callback_alpha_es',
                ],
                [
                    'field' => 'estado',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_contenido");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'id_contenido' => $contenido->id,
                    'nombre' => $this->input->post('nombre'),
                    'estado' => $this->input->post('estado'),
                ];
                if (isset($pdf['file_name'])) {
                    $info['ruta_pdf'] = $pdf['file_name'];
                }
                $ok = $this->documento_model->update_documento($id_documento, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el documento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar el documento']);
                }
                redirect('administracion/documentos');
            }
        } else {
            $_POST = array_merge($_POST, (array) $documento);
            $ruta_documento = site_url(PATH_PDF_DOCUMENTO_CONTENIDO . $documento->ruta_pdf);
            $this->template->set('ruta_documento', $ruta_documento);
        }

        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_contenidos');
        $this->template->render(['administracion/sidebar', 'administracion/documento/editar_documento']);
    }

    public function borrar_documento()
    {
        $this->_validar_login('admin');

        $this->load->model('contenido_model');
        $this->load->model('documento_model');

        $id_contenido = $this->session->id_contenido;
        $id_documento = $this->input->post("id_documento");
        if (!$id_contenido) {
            redirect('administracion');
        }

        $documento = $this->documento_model->get_documento($id_documento, $id_contenido);

        if (!$documento) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del elemento seleccionado']);
            redirect('administracion/contenido');
        }

        $info = ['id' => $documento->id];
        $ok = $this->documento_model->delete($info);

        if ($ok) {
            $this->template->set_flash_message(['success' => 'Se ha eliminado exitosamente el documento']);
        } else {
            $this->template->set_flash_message(['error' => 'Ocurrio un error al eliminar el documento']);
        }
        redirect('administracion/documentos');
    }

    public function editar_plantilla()
    {
        $this->load->model("template_model");

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');

            $rules = [
                [
                    'field' => 'texto_footer',
                    'label' => 'Texto pie de página',
                    'rules' => 'max_length[1000]',
                ],
            ];

            $this->form_validation->set_rules($rules);

            $pdf_logo = $this->_validar_imagen('ruta_logo', false, "ruta_logo", "error_ruta_logo");
            $pdf_escudo = $this->_validar_imagen('ruta_escudo', false, "ruta_escudo", "error_ruta_escudo");
            $pdf_logo_footer = $this->_validar_imagen('ruta_logo_footer', false, "ruta_logo_footer", "error_ruta_logo_footer");
            $pdf_escudo_footer = $this->_validar_imagen('ruta_escudo_footer', false, "ruta_escudo_footer", "error_ruta_escudo_footer");

            if ($this->form_validation->run() === true && $pdf_logo && $pdf_escudo && $pdf_logo_footer && $pdf_escudo_footer) {
                $info['texto_footer'] = $this->input->post('texto_footer');

                if (isset($pdf_logo['file_name'])) {
                    $info['ruta_logo'] = $pdf_logo['file_name'];
                }
                if (isset($pdf_escudo['file_name'])) {
                    $info['ruta_escudo'] = $pdf_escudo['file_name'];
                }
                if (isset($pdf_logo_footer['file_name'])) {
                    $info['ruta_logo_footer'] = $pdf_logo_footer['file_name'];
                }
                if (isset($pdf_escudo_footer['file_name'])) {
                    $info['ruta_escudo_footer'] = $pdf_escudo_footer['file_name'];
                }

                $ok = $this->template_model->update_template(ID_TEMPLATE, $info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la plantilla del portal.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar la plantilla del portal.']);
                }
                //                redirect('administracion/editar_plantilla');
            }
        }

        $template = $this->template_model->get_template(ID_TEMPLATE, ID_PORTAL);

        $_POST = array_merge($_POST, (array) $template);

        $rutas['ruta_logo'] = $template->ruta_logo ? site_url(PATH_TEMPLATE . $template->ruta_logo) : "";
        $rutas['ruta_escudo'] = $template->ruta_escudo ? site_url(PATH_TEMPLATE . $template->ruta_escudo) : "";
        $rutas['ruta_logo_footer'] = $template->ruta_logo_footer ? site_url(PATH_TEMPLATE . $template->ruta_logo_footer) : "";
        $rutas['ruta_escudo_footer'] = $template->ruta_escudo_footer ? site_url(PATH_TEMPLATE . $template->ruta_escudo_footer) : "";

        $this->template->set('rutas', $rutas);

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $item_sidebar_active = 'administrar_plantilla';
        $this->template->set('item_sidebar_active', $item_sidebar_active);
        $this->template->render(['administracion/sidebar', 'administracion/template/editar_plantilla']);
    }

    public function procesos_contractuales()
    {
        $año = date('Y');
        $añovigencia = date('Y') - 1;

        $this->_validar_login('contratacion');
        $this->load->model('procesos_contractuales_model');
        $grupoactual = $this->procesos_contractuales_model->contractual_vigencia($año);
        $this->template->set('nuevogrupow', true);
        if (isset($grupoactual) && $grupoactual) {
            $this->template->set('nuevogrupow', false);
            $añovigencia = $año;
        }
        if ($this->session->userdata('añovigencia')) {
            $añovigencia = $this->session->userdata('añovigencia');
        } else {
            $this->session->set_userdata('añovigencia', $añovigencia);
        }

        if ($this->input->post('cambiar') == 1 && $this->input->post('vigencia')) {
            $añovigencia = $this->input->post('vigencia');
            $this->session->set_userdata('añovigencia', $añovigencia);
        }

        $vigencias = $this->procesos_contractuales_model->vigencias();
        $this->template->set('vigencias', $vigencias);
        $this->template->set('actual', $añovigencia);

        $grupos = $this->procesos_contractuales_model->get_all_grupow($añovigencia);
        // echo '<pre>'; print_r($grupos); return;
        if ($grupos) {
            $this->template->set('grupos', $grupos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/index');
    }

    public function crear_vigencia()
    {
        $año = date('Y');
        $this->load->model('procesos_contractuales_model');
        $grupoactual = $this->procesos_contractuales_model->crear_vigencia($año);

        if (isset($grupoactual) && $grupoactual) {
            $vigencia = $this->procesos_contractuales_model->contractual_vigencia($año);
            if (isset($vigencia) && $vigencia) {
                $id = $vigencia[0]->id_contenido;
                $creado = $this->procesos_contractuales_model->crear_vigencia_menu($año, $id);
                if ($creado) {
                    redirect('administracion/procesos_contractuales');
                }
            }
        }
    }

    public function agregar_procesos_contractuales()
    {
        $this->_validar_login('contratacion');

        $this->load->model('procesos_contractuales_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'objeto_des',
                    'label' => 'Objeto',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número',
                    'rules' => 'required|numeric|max_length[3]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $año = date('Y');
                $añovigencia = date('Y') - 1;
                $grupoactual = $this->procesos_contractuales_model->contractual_vigencia($año);
                if (isset($grupoactual) && $grupoactual) {
                    $añovigencia = $año;
                }
                if ($this->session->userdata('añovigencia')) {
                    $añovigencia = $this->session->userdata('añovigencia');
                } else {
                    $this->session->set_userdata('añovigencia', $añovigencia);
                }

                if (ENVIRONMENT == 'development') {
                    $info = [
                        'objeto_des' => $this->input->post('objeto_des'),
                        'fecha' => $this->input->post('fecha'),
                        'numero' => $this->input->post('numero'),
                        //'idgrupo' => '1',
                        'pag' => '0',
                        'publicar' => '1',
                        'ano' => $añovigencia,
                    ];
                } else {
                    $info = [
                        'objeto_des' => $this->input->post('objeto_des'),
                        'fecha' => $this->input->post('fecha'),
                        'numero' => $this->input->post('numero'),
                        'pag' => '0',
                        'publicar' => '1',
                        'ano' => $añovigencia,
                    ];
                }

                $ok = $this->procesos_contractuales_model->insert_grupow($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo grupo de licitaciones']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo grupo de licitaciones']);
                }
                redirect('administracion/procesos_contractuales');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/agregar_grupo');
    }

    public function editar_grupo()
    {
        $this->_validar_login('contratacion');

        $this->load->model('procesos_contractuales_model');
        $id_grupo = $this->input->post('id_grupo');

        if (!$id_grupo) {
            $id_grupo = $this->session->id_grupo;
            if (!$id_grupo) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_grupo', $id_grupo);
        }

        $grupo = $this->procesos_contractuales_model->get_grupo($id_grupo);

        if (!$grupo) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del grupo seleccionada.']);
            redirect('administracion/procesos_contractuales');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'objeto_des',
                    'label' => 'Objeto',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número',
                    'rules' => 'required|numeric|max_length[3]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'objeto_des' => $this->input->post('objeto_des'),
                    'fecha' => $this->input->post('fecha'),
                    'numero' => $this->input->post('numero'),
                    'publicar' => $this->input->post('publicar'),
                ];

                $ok = $this->procesos_contractuales_model->update_grupo($id_grupo, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el grupo.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/procesos_contractuales');
            }
        } else {
            //  echo '<pre>'; print_r($grupo); return;
            $_POST = array_merge($_POST, (array) $grupo);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/editar_grupo');
    }

    public function licitaciones()
    {
        $this->_validar_login('contratacion');

        $id_grupo = $this->input->post('id_grupo');

        if ($id_grupo) {
            $this->session->set_userdata('id_grupo', $id_grupo);
        } else {
            $id_grupo = $this->session->id_grupo;
        }
        $this->load->model('procesos_contractuales_model');
        $año = date('Y');
        $añovigencia = date('Y') - 1;
        $grupoactual = $this->procesos_contractuales_model->contractual_vigencia($año);
        if (isset($grupoactual) && $grupoactual) {
            $añovigencia = $año;
        }
        if ($this->session->userdata('añovigencia')) {
            $añovigencia = $this->session->userdata('añovigencia');
        } else {
            $this->session->set_userdata('añovigencia', $añovigencia);
        }
        $licitaciones = $this->procesos_contractuales_model->get_all_licitacionesw($id_grupo, $añovigencia);

        if ($licitaciones) {
            $this->template->set('licitaciones', $licitaciones);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/licitaciones');
    }

    public function agregar_licitacion()
    {
        $this->_validar_login('contratacion');

        $id_grupo = $this->session->id_grupo;
        if (!$id_grupo) {
            redirect('administracion');
        }

        $this->load->model('procesos_contractuales_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Título',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required|max_length[2]',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_licitacion");

            if ($this->form_validation->run() === true && $pdf) {
                $año = date('Y');
                $añovigencia = date('Y') - 1;
                $grupoactual = $this->procesos_contractuales_model->contractual_vigencia($año);
                if (isset($grupoactual) && $grupoactual) {
                    $añovigencia = $año;
                }
                if ($this->session->userdata('añovigencia')) {
                    $añovigencia = $this->session->userdata('añovigencia');
                } else {
                    $this->session->set_userdata('añovigencia', $añovigencia);
                }
                if (ENVIRONMENT == 'development') {
                    $info = [
                        'titulo' => $this->input->post('titulo'),
                        'grupo' => $id_grupo,
                        'orden' => $this->input->post('orden'),
                        'fechapublicado' => $this->input->post('fecha'),
                        'ano' => $añovigencia,
                        //'idlici' => '1',
                        'publicar' => '1',
                    ];
                } else {
                    $info = [
                        'titulo' => $this->input->post('titulo'),
                        'grupo' => $id_grupo,
                        'orden' => $this->input->post('orden'),
                        'fechapublicado' => $this->input->post('fecha'),
                        'ano' => $añovigencia,
                        'publicar' => '1',
                    ];
                }
                if (isset($pdf['file_name'])) {
                    $info['enlace'] = $pdf['file_name'];
                }

                $ok = $this->procesos_contractuales_model->insert_licitacionw($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente una nueva licitación']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar una nueva licitación']);
                }
                redirect('administracion/licitaciones');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/agregar_licitacion');
    }

    public function editar_licitacion()
    {
        $this->_validar_login('contratacion');

        $this->load->model('procesos_contractuales_model');
        $id_licitacion = $this->input->post('id_licitacion');

        if (!$id_licitacion) {
            $id_licitacion = $this->session->id_licitacion;
            if (!$id_licitacion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_licitacion', $id_licitacion);
        }

        $licitacion = $this->procesos_contractuales_model->get_licitacion($id_licitacion);
        $licitacion->fechapublicado = strftime('%Y-%m-%dT%H:%M:%S', strtotime($licitacion->fechapublicado));

        if (!$licitacion) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la licitación seleccionada.']);
            redirect('administracion/procesos_contractuales');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Título',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'grupo',
                    'label' => 'Grupo',
                    'rules' => 'required|max_length[4]',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required|max_length[4]',
                ],
                [
                    'field' => 'fechapublicado',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_licitacion");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'grupo' => $this->input->post('grupo'),
                    'orden' => $this->input->post('orden'),
                    'fechapublicado' => $this->input->post('fechapublicado'),
                    'publicar' => $this->input->post('publicar'),
                ];

                if (isset($pdf['file_name'])) {
                    $info['enlace'] = $pdf['file_name'];
                }

                $ok = $this->procesos_contractuales_model->update_licitacion($id_licitacion, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la licitación.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/licitaciones');
            }
        } else {
            $_POST = array_merge($_POST, (array) $licitacion);
            $ruta_documento = site_url(PATH_PDF_DOCUMENTO_LICITACION . $licitacion->enlace);
            $this->template->set('ruta_documento', $ruta_documento);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_procesos_contractuales');
        $this->template->render('administracion/procesos_contractuales/editar_licitacion');
    }

    public function convocatoria()
    {
        $this->_validar_login('admin');

        $this->load->model('convocatoria_model');
        $convocatorias = $this->convocatoria_model->get_all_convocatoria();
        //    echo '<pre>'; print_r($convocatorias); return;
        if ($convocatorias) {
            $this->template->set('convocatorias', $convocatorias);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/index');
    }

    public function agregar_convocatoria()
    {
        $this->_validar_login('admin');

        $this->load->model('convocatoria_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                //                [
                //                    'field' => 'enlace',
                //                    'label' => 'Link Externo'
                //                ],
                [
                    'field' => 'fecha_publicado',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'descripcion' => $this->input->post('descripcion'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha_publicado' => $this->input->post('fecha_publicado'),
                ];

                $ok = $this->convocatoria_model->insert_convocatoria($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva convocatoria']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva convocatoria']);
                }
                redirect('administracion/convocatoria');
            }
        }

        //$this->template->add_js("plugins/ckeditor/ckeditor");
        $this->template->add_css("plugins/trumbowyg/dist/ui/trumbowyg.min"); //estilos generales del editor de texto
        $this->template->add_css("plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min"); //estilos del plugin de color

        //Dentro de este JS del plugin del editor trumbowyg se agregó el contenido del JS del plugin de color debido a que
        //no lo reconocía de manera separada, si necesita agregar más plugin recomiendo hacer lo mismo con los nuevos
        $this->template->add_js("plugins/trumbowyg/dist/trumbowyg");
        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/agregar_convocatoria');
    }

    public function editar_convocatoria()
    {
        $this->_validar_login('admin');

        $this->load->model('convocatoria_model');
        $id_convocatoria = $this->input->post('id_convocatoria');

        if (!$id_convocatoria) {
            $id_convocatoria = $this->session->id_convocatoria;
            if (!$id_convocatoria) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_convocatoria', $id_convocatoria);
        }

        $convocatoria = $this->convocatoria_model->get_convocatoria($id_convocatoria);

        $convocatoria->fecha_publicado = strftime('%Y-%m-%dT%H:%M:%S', strtotime($convocatoria->fecha_publicado));

        if (!$convocatoria) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la convocatoria seleccionada.']);
            redirect('administracion/convocatoria');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                //                [
                //                    'field' => 'enlace',
                //                    'label' => 'Link Externo'
                //                ],
                [
                    'field' => 'fecha_publicado',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'descripcion' => $this->input->post('descripcion'),
                    'publicar' => $this->input->post('publicar'),
                    //                    'enlace' => $this->input->post('enlace'),
                    'fecha_publicado' => $this->input->post('fecha_publicado'),
                ];

                $ok = $this->convocatoria_model->update_convocatoria($id_convocatoria, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la convocatoria.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/convocatoria');
            }
        } else {
            $_POST = array_merge($_POST, (array) $convocatoria);
        }

        $this->template->add_css("plugins/trumbowyg/dist/ui/trumbowyg.min"); //estilos generales del editor de texto
        $this->template->add_css("plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min"); //estilos del plugin de color

        //Dentro de este JS del plugin del editor trumbowyg se agregó el contenido del JS del plugin de color debido a que
        //no lo reconocía de manera separada, si necesita agregar más plugin recomiendo hacer lo mismo con los nuevos
        $this->template->add_js("plugins/trumbowyg/dist/trumbowyg");
        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom

        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/editar_convocatoria');
    }

    public function actividad_convocatoria()
    {
        $this->_validar_login('admin');

        $id_convocatoria = $this->input->post('id_convocatoria');

        if ($id_convocatoria) {
            $this->session->set_userdata('id_convocatoria', $id_convocatoria);
        } else {
            $id_convocatoria = $this->session->id_convocatoria;
        }

        $this->load->model('convocatoria_model');
        $actividades = $this->convocatoria_model->get_all_actividades($id_convocatoria);

        if ($actividades) {
            $this->template->set('actividades', $actividades);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/actividades');
    }

    public function agregar_actividad()
    {
        $this->_validar_login('admin');

        $id_convocatoria = $this->session->id_convocatoria;
        if (!$id_convocatoria) {
            redirect('administracion');
        }

        $this->load->model('convocatoria_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'fecha_realizacion',
                    'label' => 'Fecha Realización',
                    'rules' => 'required',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required|numeric',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_actividad");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'id_convocatoria' => $id_convocatoria,
                    'descripcion' => $this->input->post('descripcion'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha_realizacion' => $this->input->post('fecha_realizacion'),
                    'orden' => $this->input->post('orden'),
                ];

                if (isset($pdf['file_name'])) {
                    $info['archivo'] = "getArchivoPdf," . $pdf['file_name'];
                }

                $ok = $this->convocatoria_model->insert_actividad($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente una nueva actividad']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar una nueva actividad']);
                }
                redirect('administracion/actividad_convocatoria');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/agregar_actividad');
    }

    public function editar_actividad()
    {
        $this->_validar_login('admin');

        $this->load->model('convocatoria_model');
        $id_actividad = $this->input->post('id_actividad');

        if (!$id_actividad) {
            $id_actividad = $this->session->id_actividad;
            if (!$id_actividad) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_actividad', $id_actividad);
        }

        $actividad = $this->convocatoria_model->get_actividad($id_actividad);
        $actividad->fecha_publicado = strftime('%Y-%m-%dT%H:%M:%S', strtotime($actividad->fecha_publicado));
        $actividad->fecha_realizacion = strftime('%Y-%m-%d', strtotime($actividad->fecha_realizacion));

        if (!$actividad) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la actividad seleccionada.']);
            redirect('administracion/convocatoria');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'required|callback_alpha_es',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'fecha_publicado',
                    'label' => 'Fecha Publicado',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_realizacion',
                    'label' => 'Fecha Realización',
                    'rules' => 'required',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required|numeric',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_actividad");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'descripcion' => $this->input->post('descripcion'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha_realizacion' => $this->input->post('fecha_realizacion'),
                    'fecha_publicado' => $this->input->post('fecha_publicado'),
                    'orden' => $this->input->post('orden'),
                ];

                if (isset($pdf['file_name'])) {
                    $info['archivo'] = "getArchivoPdf," . $pdf['file_name'];
                }

                $ok = $this->convocatoria_model->update_actividad($id_actividad, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la actividad.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/actividad_convocatoria');
            }
        } else {
            $_POST = array_merge($_POST, (array) $actividad);
            $archivo_pdf = explode(",", $actividad->archivo);
            if ($archivo_pdf[0] == 'getArchivoPdf') {
                $ruta_documento = site_url(PATH_PDF_DOCUMENTO_ACTIVIDAD . $archivo_pdf[1]);
                $this->template->set('ruta_documento', $ruta_documento);
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_convocatorias');
        $this->template->render('administracion/convocatoria/editar_actividad');
    }

    public function popop()
    {
        $this->_validar_login('admin');

        $this->load->model('popop_model');
        $popops = $this->popop_model->get_all_popops();
        if ($popops) {
            $this->template->set('popops', $popops);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_popop');
        $this->template->render('administracion/popop/index');
    }

    public function agregar_popop()
    {
        $this->_validar_login('admin');

        $this->load->model('popop_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'fecha_inicio',
                    'label' => 'Fecha Inicio',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_fin',
                    'label' => 'Fecha Fin',
                    'rules' => 'required',
                ],
                [
                    'field' => 'video',
                    'label' => 'URL Video Youtube',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'enlace',
                    'label' => 'URL',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "popop", "error_imagen");

            if ($this->form_validation->run() === true && $imagen) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'video' => $this->input->post('video'),
                    'publicar' => $this->input->post('publicar'),
                    'enlace' => $this->input->post('enlace'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }

                $ok = $this->popop_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente un nuevo popop']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo popop']);
                }
                redirect('administracion/popop');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_popop');
        $this->template->render('administracion/popop/agregar_popop');
    }

    public function editar_popop()
    {
        $this->_validar_login('admin');

        $this->load->model('popop_model');
        $id_popop = $this->input->post('id_popop');

        if (!$id_popop) {
            $id_popop = $this->session->id_popop;
            if (!$id_popop) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_popop', $id_popop);
        }

        $popop = $this->popop_model->get_popop($id_popop);
        $popop->fecha_inicio = strftime('%Y-%m-%dT%H:%M:%S', strtotime($popop->fecha_inicio));
        $popop->fecha_fin = strftime('%Y-%m-%dT%H:%M:%S', strtotime($popop->fecha_fin));

        if (!$popop) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del popop seleccionado.']);
            redirect('administracion/popop');
        }

        if ($this->input->post('editar') == 1) {
            //    echo '<pre>'; print_r($this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')); return;

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'fecha_inicio',
                    'label' => 'Fecha Inicio',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha_fin',
                    'label' => 'Fecha Fin',
                    'rules' => 'required',
                ],
                [
                    'field' => 'enlace',
                    'label' => 'URL',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'video',
                    'label' => 'URL Video Youtube',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "popop", "error_imagen");

            if ($this->form_validation->run() === true && $imagen) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'video' => $this->input->post('video'),
                    'publicar' => $this->input->post('publicar'),
                    'enlace' => $this->input->post('enlace'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }

                $ok = $this->popop_model->update($id_popop, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el popop.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/popop');
            }
        } else {
            $_POST = array_merge($_POST, (array) $popop);
            $imagen_popop = $popop->imagen ? site_url(PATH_POPOP . $popop->imagen) : "";
            $this->template->set('imagen_popop', $imagen_popop);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_popop');
        $this->template->render('administracion/popop/editar_popop');
    }

    public function entidad()
    {
        $this->_validar_login('admin');

        $this->load->model('documento_model');
        $entidades = $this->documento_model->get_all_entidades();
        if ($entidades) {
            $this->template->set('entidades', $entidades);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_normatividad');
        $this->template->render('administracion/normatividad/index');
    }

    public function acto()
    {
        $this->_validar_login('admin');

        $id_entidad = $this->input->post('id_entidad');
        $nombre_entidad = $this->input->post('nombre_entidad');

        if (!$id_entidad) {
            $id_entidad = $this->session->id_entidad;
            $nombre_entidad = $this->session->nombre_entidad;
            if (!$id_entidad) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_entidad', $id_entidad);
            $this->session->set_userdata('nombre_entidad', $nombre_entidad);
        }

        $this->load->model('documento_model');
        $actos = $this->documento_model->get_all_actos($id_entidad);
        //  echo '<pre>'; print_r($actos); return;
        if ($actos) {
            $this->template->set('actos', $actos);
        }
        if ($nombre_entidad) {
            $this->template->set('nombre_entidad', $nombre_entidad);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_normatividad');
        $this->template->render('administracion/normatividad/actos');
    }

    public function documento_norma()
    {
        $this->_validar_login('admin');

        $id_acto = $this->input->post('id_acto');
        $nombre_acto = $this->input->post('nombre_acto');

        $id_entidad = $this->session->id_entidad;
        $nombre_entidad = $this->session->nombre_entidad;

        if (!$id_entidad) {
            redirect('administracion');
        }

        if (!$id_acto) {
            $id_acto = $this->session->id_acto;
            $nombre_acto = $this->session->nombre_acto;
            if (!$id_acto) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_acto', $id_acto);
            $this->session->set_userdata('nombre_acto', $nombre_acto);
        }

        $this->load->model('documento_model');
        $documentos = $this->documento_model->get_all_documentos($id_entidad, $id_acto);
        //  echo '<pre>'; print_r($documentos); return;
        if ($documentos) {
            $this->template->set('documentos', $documentos);
        }
        if ($nombre_acto) {
            $this->template->set('nombre_acto', $nombre_acto);
        }
        if ($nombre_entidad) {
            $this->template->set('nombre_entidad', $nombre_entidad);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_normatividad');
        $this->template->render('administracion/normatividad/listado');
    }

    public function agregar_documento_norma()
    {
        $this->_validar_login('admin');

        $id_acto = $this->session->id_acto;
        $nombre_acto = $this->session->nombre_acto;
        $id_entidad = $this->session->id_entidad;
        $nombre_entidad = $this->session->nombre_entidad;

        if (!$id_entidad || !$id_acto) {
            redirect('administracion');
        } else {
            $this->session->set_userdata('id_entidad', $id_entidad);
            $this->session->set_userdata('nombre_entidad', $nombre_entidad);
            $this->session->set_userdata('id_acto', $id_acto);
            $this->session->set_userdata('nombre_acto', $nombre_acto);
        }

        $this->load->model('documento_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'numero_acto',
                    'label' => 'Número de acto',
                    'rules' => 'required|max_length[20]',
                ],
                [
                    'field' => 'fecha_documento',
                    'label' => 'Fecha del documento',
                    'rules' => 'required',
                ],
                [
                    'field' => 'descripcion_documento',
                    'label' => 'Descripción del documento',
                    'rules' => 'required|max_length[4000]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_normatividad");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'id_seccion' => $id_entidad,
                    'id_acto' => $id_acto,
                    'numero_acto' => $this->input->post('numero_acto'),
                    'fecha_documento' => $this->input->post('fecha_documento'),
                    'descripcion_documento' => $this->input->post('descripcion_documento'),
                    'publicar' => $this->input->post('publicar'),
                ];
                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }
                $ok = $this->documento_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo documento']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo documento']);
                }
                redirect('administracion/documento_norma');
            }
        }
        if ($nombre_acto) {
            $this->template->set('nombre_acto', $nombre_acto);
        }
        if ($nombre_entidad) {
            $this->template->set('nombre_entidad', $nombre_entidad);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_normatividad');
        $this->template->render('administracion/normatividad/agregar_documento');
    }

    public function editar_documento_norma()
    {
        $this->_validar_login('admin');

        $this->load->model('documento_model');
        $id_documento = $this->input->post('id_documento');
        $id_acto = $this->session->id_acto;
        $nombre_acto = $this->session->nombre_acto;
        $id_entidad = $this->session->id_entidad;
        $nombre_entidad = $this->session->nombre_entidad;

        if (!$id_documento) {
            $id_documento = $this->session->id_documento;
            if (!$id_documento) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_documento', $id_documento);
        }

        $documento = $this->documento_model->get_documento($id_documento);

        if (!$documento) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del documento seleccionado.']);
            redirect('administracion/acto');
        }

        if ($this->input->post('editar') == 1) {
            //    echo '<pre>'; print_r($this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')); return;

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'numero_acto',
                    'label' => 'Número de acto',
                    'rules' => 'required|max_length[20]',
                ],
                [
                    'field' => 'fecha_documento',
                    'label' => 'Fecha del documento',
                    'rules' => 'required',
                ],
                [
                    'field' => 'descripcion_documento',
                    'label' => 'Descripción del documento',
                    'rules' => 'required|max_length[4000]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $pdf = $this->_validar_documento('documento', false, "documento_normatividad");

            if ($this->form_validation->run() === true && $pdf) {
                $info = [
                    'numero_acto' => $this->input->post('numero_acto'),
                    'fecha_documento' => $this->input->post('fecha_documento'),
                    'descripcion_documento' => $this->input->post('descripcion_documento'),
                    'publicar' => $this->input->post('publicar'),
                ];

                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }
                $ok = $this->documento_model->update_documento($id_documento, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el documento.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/documento_norma');
            }
        } else {
            $_POST = array_merge($_POST, (array) $documento);
            if ($documento->archivo) {
                $ruta_documento = site_url(PATH_PDF_DOCUMENTO_NORMATIVIDAD . $documento->archivo);
                $this->template->set('ruta_documento', $ruta_documento);
            }
        }

        if ($nombre_acto) {
            $this->template->set('nombre_acto', $nombre_acto);
        }
        if ($nombre_entidad) {
            $this->template->set('nombre_entidad', $nombre_entidad);
        }
        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_normatividad');
        $this->template->render('administracion/normatividad/editar_documento');
    }

    public function publicacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('publicacion_model');
        $id_seccion = $this->input->post('id_seccion');

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }
        $publicaciones = $this->publicacion_model->get_all_publicacion($id_seccion);
        //    echo '<pre>'; print_r($publicaciones); return;
        if ($publicaciones) {
            $this->template->set('publicaciones', $publicaciones);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/publicacion/index');
    }

    public function agregar_publicacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        $this->load->model('publicacion_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'volumen',
                    'label' => 'Volumen',
                    'rules' => 'max_length[5]',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número',
                    'rules' => 'max_length[5]',
                ],
                [
                    'field' => 'isbn',
                    'label' => 'ISBN',
                    'rules' => 'max_length[20]',
                ],
                [
                    'field' => 'year',
                    'label' => 'Año',
                    'rules' => 'max_length[4]',
                ],
                [
                    'field' => 'edicion',
                    'label' => 'Edición',
                    'rules' => 'max_length[5]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "publicacion", "error_imagen");
            $imagenar = $this->_validar_imagen('imagenar', false, "publicacionar", "error_imagenar");
            $pdf = $this->_validar_documento('documento', false, "documento_publicacion");

            if ($this->form_validation->run() === true && $imagen && $imagenar && $pdf) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'volumen' => $this->input->post('volumen'),
                    'numero' => $this->input->post('numero'),
                    'isbn' => $this->input->post('isbn'),
                    'year' => $this->input->post('year'),
                    'edicion' => $this->input->post('edicion'),
                    'seccion' => $id_seccion,
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenar['file_name'])) {
                    $info['archivo'] = $imagenar['file_name'];
                }
                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }

                $ok = $this->publicacion_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente una nueva publicación']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar una nueva publicación']);
                }
                redirect('administracion/publicacion');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/publicacion/agregar_publicacion');
    }

    public function editar_publicacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('publicacion_model');
        $id_publicacion = $this->input->post('id_publicacion');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        if (!$id_publicacion) {
            $id_publicacion = $this->session->id_publicacion;
            if (!$id_publicacion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_publicacion', $id_publicacion);
        }

        $publicacion = $this->publicacion_model->get_publicacion($id_publicacion);
        //  echo '<pre>'; print_r($publicacion); return;
        $publicacion->fecha_real = strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacion->fecha_real));

        if (!$publicacion) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información de la publicación seleccionada.']);
            redirect('administracion/publicacion');
        }

        if ($this->input->post('editar') == 1) {
            //    echo '<pre>'; print_r($this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')); return;

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[50]|callback_alpha_es',
                ],
                [
                    'field' => 'volumen',
                    'label' => 'Volumen',
                    'rules' => 'max_length[5]',
                ],
                [
                    'field' => 'numero',
                    'label' => 'Número',
                    'rules' => 'max_length[5]',
                ],
                [
                    'field' => 'isbn',
                    'label' => 'ISBN',
                    'rules' => 'max_length[20]',
                ],
                [
                    'field' => 'year',
                    'label' => 'Año',
                    'rules' => 'max_length[4]',
                ],
                [
                    'field' => 'edicion',
                    'label' => 'Edición',
                    'rules' => 'max_length[5]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "publicacion", "error_imagen");
            $imagenar = $this->_validar_imagen('imagenar', false, "publicacionar", "error_imagenar");
            $pdf = $this->_validar_documento('documento', false, "documento_publicacion");

            if ($this->form_validation->run() === true && $imagen && $imagenar && $pdf) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'volumen' => $this->input->post('volumen'),
                    'numero' => $this->input->post('numero'),
                    'isbn' => $this->input->post('isbn'),
                    'year' => $this->input->post('year'),
                    'edicion' => $this->input->post('edicion'),
                    'seccion' => $id_seccion,
                ];
                if (isset($imagen['file_name'])) {
                    $info['imagen'] = $imagen['file_name'];
                }
                if (isset($imagenar['file_name'])) {
                    $info['archivo'] = $imagenar['file_name'];
                }
                if (isset($pdf['file_name'])) {
                    $info['archivo'] = $pdf['file_name'];
                }

                $ok = $this->publicacion_model->update_publicacion($id_publicacion, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la publicacion.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/publicacion');
            }
        } else {
            $_POST = array_merge($_POST, (array) $publicacion);
            $imagen_publicacion = $publicacion->imagen ? site_url(PATH_PUBLICACION . $publicacion->imagen) : "";
            $this->template->set('imagen_publicacion', $imagen_publicacion);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/publicacion/editar_publicacion');
    }

    public function investigacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('investigacion_model');
        $id_seccion = $this->input->post('id_seccion');

        if ($id_seccion) {
            $this->session->set_userdata('id_seccion', $id_seccion);
        } else {
            $id_seccion = $this->session->id_seccion;
        }
        $investigaciones = $this->investigacion_model->get_all_investigacion($id_seccion);
        //    echo '<pre>'; print_r($investigaciones); return;
        if ($investigaciones) {
            $this->template->set('investigaciones', $investigaciones);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/investigacion/index');
    }

    public function agregar_investigacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        $this->load->model('investigacion_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'max_length[250]|callback_alpha_es',
                ],
                [
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'max_length[1]',
                ],
                [
                    'field' => 'director',
                    'label' => 'Director',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'departamento',
                    'label' => 'Departamento',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'correo',
                    'label' => 'Correo',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'linea',
                    'label' => 'Linea',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'estatus',
                    'label' => 'Estatus',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'enlace',
                    'label' => 'Enlace',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'tipo' => $this->input->post('tipo'),
                    'director' => $this->input->post('director'),
                    'facultad' => $id_seccion,
                    'departamento' => $this->input->post('departamento'),
                    'correo' => $this->input->post('correo'),
                    'linea' => $this->input->post('linea'),
                    'estatus' => $this->input->post('estatus'),
                    'enlace' => $this->input->post('enlace'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha' => $this->input->post('fecha'),
                ];

                $ok = $this->investigacion_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente un nuevo grupo de investigación']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar un nuevo grupo de investigación']);
                }
                redirect('administracion/investigacion');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/investigacion/agregar_investigacion');
    }

    public function editar_investigacion()
    {
        if($this->session->userdata(SESSION_NAME)->rol == 'radio')
            $this->_validar_login('radio');
        else
            $this->_validar_login('admin');

        $this->load->model('investigacion_model');
        $id_grupo = $this->input->post('id_grupo');
        $id_seccion = $this->input->post('id_seccion');

        if (!$id_seccion) {
            $id_seccion = $this->session->id_seccion;
            if (!$id_seccion) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_seccion', $id_seccion);
        }

        if (!$id_grupo) {
            $id_grupo = $this->session->id_grupo;
            if (!$id_grupo) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_grupo', $id_grupo);
        }

        $grupo = $this->investigacion_model->get_investigacion($id_grupo);
        // echo '<pre>'; print_r($grupo); return;
        $grupo->fecha_real = strftime('%Y-%m-%dT%H:%M:%S', strtotime($grupo->fecha_real));

        if (!$grupo) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del grupo seleccionado.']);
            redirect('administracion/investigacion');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'max_length[250]|callback_alpha_es',
                ],
                [
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'max_length[1]',
                ],
                [
                    'field' => 'director',
                    'label' => 'Director',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'departamento',
                    'label' => 'Departamento',
                    'rules' => 'max_length[200]',
                ],
                [
                    'field' => 'correo',
                    'label' => 'Correo',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'linea',
                    'label' => 'Linea',
                    'rules' => 'max_length[255]',
                ],
                [
                    'field' => 'estatus',
                    'label' => 'Estatus',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'enlace',
                    'label' => 'Enlace',
                    'rules' => 'max_length[100]',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'tipo' => $this->input->post('tipo'),
                    'director' => $this->input->post('director'),
                    'facultad' => $id_seccion,
                    'departamento' => $this->input->post('departamento'),
                    'correo' => $this->input->post('correo'),
                    'linea' => $this->input->post('linea'),
                    'estatus' => $this->input->post('estatus'),
                    'enlace' => $this->input->post('enlace'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha' => $this->input->post('fecha'),
                ];

                $ok = $this->investigacion_model->update($id_grupo, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el grupo de investigación.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/investigacion');
            }
        } else {
            $_POST = array_merge($_POST, (array) $grupo);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_secciones');
        $this->template->render('administracion/investigacion/editar_investigacion');
    }

    public function calendario()
    {
        $this->_validar_login('admin');
        $this->load->model('calendario_model');

        $calendarios = $this->calendario_model->get_all_calendario();
        //   echo '<pre>'; print_r($calendarios); return;
        if ($calendarios) {
            $this->template->set('calendarios', $calendarios);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_calendarios');
        $this->template->render('administracion/calendario/index');
    }

    public function agregar_calendario()
    {
        $this->_validar_login('admin');

        $this->load->model('calendario_model');

        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'max_length[1]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $archivo = $this->_validar_documento('documento', false, "documento_calendario");
            $pp = $this->_validar_documento('pp', false, "documento_calendario");
            $sp = $this->_validar_documento('sp', false, "documento_calendario");
            $tp = $this->_validar_documento('tp', false, "documento_calendario");
            $ex = $this->_validar_documento('ex', false, "documento_calendario");
            $ha = $this->_validar_documento('ha', false, "documento_calendario");

            if ($this->form_validation->run() === true && $archivo && $pp && $sp && $tp && $ex && $ha) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'tipo' => $this->input->post('tipo'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha' => $this->input->post('fecha'),
                ];

                if (isset($archivo['file_name'])) {
                    $info['archivo'] = $archivo['file_name'];
                }
                if (isset($pp['file_name'])) {
                    $info['pp'] = $pp['file_name'];
                }
                if (isset($sp['file_name'])) {
                    $info['sp'] = $sp['file_name'];
                }
                if (isset($tp['file_name'])) {
                    $info['tp'] = $tp['file_name'];
                }
                if (isset($ex['file_name'])) {
                    $info['ex'] = $ex['file_name'];
                }
                if (isset($ha['file_name'])) {
                    $info['ha'] = $ha['file_name'];
                }

                $ok = $this->calendario_model->insert($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente un nuevo calendario']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar un nuevo calendario']);
                }
                redirect('administracion/calendario');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_calendarios');
        $this->template->render('administracion/calendario/agregar_calendario');
    }

    public function editar_calendario()
    {
        $this->_validar_login('admin');

        $this->load->model('calendario_model');
        $id_calendario = $this->input->post('id_calendario');

        if (!$id_calendario) {
            $id_calendario = $this->session->id_calendario;
            if (!$id_calendario) {
                redirect('administracion');
            }
        } else {
            $this->session->set_userdata('id_calendario', $id_calendario);
        }

        $calendario = $this->calendario_model->get_calendario($id_calendario);
        //  echo '<pre>'; print_r($calendario); return;

        if (!$calendario) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información del calendario seleccionado.']);
            redirect('administracion/calendario');
        }

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'max_length[4000]|callback_alpha_es',
                ],
                [
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'max_length[1]',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required',
                ],
                [
                    'field' => 'fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $archivo = $this->_validar_documento('documento', false, "documento_calendario");
            $pp = $this->_validar_documento('pp', false, "documento_calendario");
            $sp = $this->_validar_documento('sp', false, "documento_calendario");
            $tp = $this->_validar_documento('tp', false, "documento_calendario");
            $ex = $this->_validar_documento('ex', false, "documento_calendario");
            $ha = $this->_validar_documento('ha', false, "documento_calendario");

            if ($this->form_validation->run() === true && $archivo && $pp && $sp && $tp && $ex && $ha) {
                $info = [
                    'nombre' => $this->input->post('nombre'),
                    'tipo' => $this->input->post('tipo'),
                    'publicar' => $this->input->post('publicar'),
                    'fecha' => $this->input->post('fecha'),
                ];

                if (isset($archivo['file_name'])) {
                    $info['archivo'] = $archivo['file_name'];
                }
                if (isset($pp['file_name'])) {
                    $info['pp'] = $pp['file_name'];
                }
                if (isset($sp['file_name'])) {
                    $info['sp'] = $sp['file_name'];
                }
                if (isset($tp['file_name'])) {
                    $info['tp'] = $tp['file_name'];
                }
                if (isset($ex['file_name'])) {
                    $info['ex'] = $ex['file_name'];
                }
                if (isset($ha['file_name'])) {
                    $info['ha'] = $ha['file_name'];
                }

                $ok = $this->calendario_model->update($id_calendario, $info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el calendario.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/calendario');
            }
        } else {
            $_POST = array_merge($_POST, (array) $calendario);
            if ($calendario->archivo) {
                $ruta_documento = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->archivo);
                $this->template->set('ruta_documento', $ruta_documento);
            }
            if ($calendario->pp) {
                $ruta_pp = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->pp);
                $this->template->set('ruta_pp', $ruta_pp);
            }
            if ($calendario->sp) {
                $ruta_sp = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->sp);
                $this->template->set('ruta_sp', $ruta_sp);
            }
            if ($calendario->tp) {
                $ruta_tp = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->tp);
                $this->template->set('ruta_tp', $ruta_tp);
            }
            if ($calendario->ex) {
                $ruta_ex = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->ex);
                $this->template->set('ruta_ex', $ruta_ex);
            }
            if ($calendario->ha) {
                $ruta_ha = site_url(PATH_PDF_DOCUMENTO_CALENDARIO . $calendario->ha);
                $this->template->set('ruta_ha', $ruta_ha);
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_calendarios');
        $this->template->render('administracion/calendario/editar_calendario');
    }

    public function archivo()
    {
        $this->_validar_login('admin');

        $this->load->model('documento_model');
        $archivos = $this->documento_model->get_all_archivos();

        if ($archivos) {
            $this->template->set('archivos', $archivos);
        }

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_archivo');
        $this->template->render('administracion/archivo/index');
    }

    public function agregar_archivo()
    {
        $this->_validar_login('admin');

        $this->load->model('documento_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[255]|callback_alpha_es',
                ],
                [
                    'field' => 'descripcion',
                    'label' => 'Descripcion',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen', false, "archivo", "error_imagen");
            $pdf = $this->_validar_documento('documento', false, "documento_archivo");

            if ($this->form_validation->run() === true && $imagen && $pdf) {
                $info = [
                    'titulo' => $this->input->post('titulo'),
                    'descripcion_archivo' => $this->input->post('descripcion'),
                ];
                if (isset($imagen['file_name'])) {
                    $info['url'] = '/' . PATH_ARCHIVO . $imagen['file_name'];
                }
                if (isset($pdf['file_name'])) {
                    $info['url'] = '/' . PATH_PDF_ARCHIVO . $pdf['file_name'];
                }
                $ok = $this->documento_model->insert_archivo($info);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo archivo']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo archivo']);
                }
                redirect('administracion/archivo');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_archivo');
        $this->template->render('administracion/archivo/agregar_archivo');
    }

    public function noticia_divisist()
    {
        $this->_validar_login('admin');

        $this->load->model('website_model');
        $noticias = $this->website_model->get_noticias_divisist(0); //por defecto cargue las del Cecom
        //echo '<pre>'; print_r($noticias); return;
        $this->template->set('noticias', $noticias);

        //$this->template->add_js("js/jquery/jquery-2.1.3.min");
        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_noticias_di');
        $this->template->render('administracion/noticia_div/index');
    }

    //Este método es llamado en la interfaz que lista las noticias, cuando un usuario selecciona una opción entre
    //CECOM o Noticias de prensa
    public function getNoticias()
    {
        if ($this->input->post('tipo_noticia') == 0 || $this->input->post('tipo_noticia') == 1) {
            $this->load->model('website_model');
            $noticias = $this->website_model->get_noticias_divisist($this->input->post('tipo_noticia'));
            //echo json_encode($noticias);exit;

            //Si encuentra noticias
            if (!empty($noticias)) {
                echo json_encode([
                    "estado" => "success",
                    "mensaje" => "La consulta se realizó correctamente",
                    "lista_noticias" => $noticias,
                    "tipo_noticia" => $this->input->post('tipo_noticia'),
                ]);
                exit();
            } else {
                echo json_encode([
                    "estado" => "error",
                    "mensaje" => "No se encontraron noticias registradas",
                ]);
                exit();
            }
        } else {
            echo "Error";
            exit();
        }
    }

    public function agregar_noticia_divisist()
    {
        //$this->template->add_js("js/jquery/jquery-3.2.1.min");
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->template->add_css("plugins/trumbowyg/dist/ui/trumbowyg.min"); //estilos generales del editor de texto
        $this->template->add_css("plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min"); //estilos del plugin de color

        //Dentro de este JS del plugin del editor trumbowyg se agregó el contenido del JS del plugin de color debido a que
        //no lo reconocía de manera separada, si necesita agregar más plugin recomiendo hacer lo mismo con los nuevos
        $this->template->add_js("plugins/trumbowyg/dist/trumbowyg");

        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom

        $this->_validar_login('admin');

        $this->load->model('website_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');

            $tipo_noticia = $this->input->post('tipo_noticia');

            if ($tipo_noticia == '1') {
                //Noticias de prensa
                $rules = [
                    [
                        'field' => 'tipo_noticia',
                        'label' => 'Tipo Noticia',
                        'rules' => 'required|numeric|max_length[1]',
                    ],
                    [
                        'field' => 'titulo',
                        'label' => 'Titulo',
                        'rules' => 'required|max_length[200]',
                    ],
                    [
                        'field' => 'publicar',
                        'label' => 'Publicar',
                        'rules' => 'required|numeric|max_length[1]',
                    ],
                    [
                        'field' => 'tipo',
                        'label' => 'Tipo',
                        'rules' => 'required|max_length[1]',
                    ],
                    [
                        'field' => 'fecha_vencimiento',
                        'label' => 'Fecha de Vencimiento',
                        'rules' => 'required',
                    ],
                ];
            }
            //Noticias CECOM
            else {
                $rules[] = [
                    'field' => 'url',
                    'label' => 'URL',
                    'rules' => 'max_length[200]',
                ];

                $rules[] = [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ];
            }

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                if (isset($_FILES['imagen_noti_div']['name'])) {
                    $nombre_archivo = $_FILES['imagen_noti_div']['name'];
                    $porcion = explode(".", $nombre_archivo);
                    $tipo_archivo = $porcion[1];

                    if ($tipo_archivo == 'pdf') {
                        $imagen_noti_div = $this->_validar_documento('imagen_noti_div', false, "documento_divisist");
                    } else {
                        if ($tipo_noticia == '0') {
                            //Cecom
                            $imagen_noti_div = $this->_validar_imagen2('imagen_noti_div', false, "imagen_noti_div", "error_imagen_noti_div");
                        }
                        //Noticias de Prensa
                        else {
                            $imagen_noti_div = $this->_validar_imagen2('imagen_noti_div', false, "noti_divisist", "error_imagen_noti_div");
                        }
                    }

                    //echo $imagen_noti_div; die;

                    if (!isset($imagen_noti_div['file_name'])) {
                        $this->template->set_flash_message(['error' => $imagen_noti_div]);
                        redirect('administracion/agregar_noticia_divisist');
                    }
                }

                //TITULO, CONTENIDO, 'OFICINA DE PRENSA',TIPO, FECHA_VENCIMEINTO
                $info = [
                    'TIPO_NOTICIA' => $tipo_noticia,
                    'TITULO' => $this->input->post('titulo'),
                    'CONTENIDO' => str_replace("</p>", "", str_replace("<p>", "", $this->input->post('contenido'))),
                    'ESTADO' => $this->input->post('publicar'),
                    'TIPO' => $this->input->post('tipo'),
                    'OBSERVACION' => 'Cecom',
                    'FECHA_VENCIMIENTO' => $this->input->post('fecha_vencimiento'),
                    'URL' => $this->input->post('url'),
                ];

                if ($tipo_noticia == '1') {
                    //Noticias de Prensa
                    $info['OBSERVACION'] = 'OFICINA DE PRENSA';
                    //$info['CONTENIDO']= $this->input->post('contenido');

                    //Si el usuario subió una imagen o un PDF
                    if (isset($imagen_noti_div['file_name'])) {
                        $separador_invisible = '<input id="separador" name="separador" type="hidden" value="" />';
                        $salto_linea = !empty($info['CONTENIDO']) ? '<br>' : '';

                        if ($tipo_archivo == 'pdf') {
                            $info['CONTENIDO'] =
                                $info['CONTENIDO'] .
                                $salto_linea .
                                $separador_invisible .
                                '<embed src="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="300px" />' .
                                '<br><a href="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '" target="_blank"><img class="img-responsive center-block" src="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '"></a>';
                        }
                        //es una imagen
                        else {
                            $info['CONTENIDO'] =
                                $info['CONTENIDO'] .
                                $salto_linea .
                                $separador_invisible .
                                '<img class="img-responsive center-block" width="75%" height="75%"  src="' .
                                base_url("/ufpsnuevo/archivos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '">';
                        }
                    }
                }
                //Cecom
                else {
                    if (isset($imagen_noti_div['file_name'])) {
                        $info['URL_IMG'] = base_url("/public/imagenes/noticia") . '/' . $imagen_noti_div['file_name'];
                    }
                }

                $ok = $this->website_model->insert_noticia_div($info);

                //echo '<pre>';
                //echo var_dump($ok);
                //echo '</pre>';die;

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva Noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva Noticia']);
                }

                redirect('administracion/noticia_divisist');
            }
        }

        //$this->template->add_js("plugins/ckeditor/ckeditor");
        //$this->template->add_js('js/views/administracion/administracion');//Jquery custom

        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias_di');
        $this->template->render('administracion/noticia_div/agregar_noticia');
    }

    public function editar_noticia_divisist()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->template->add_css("plugins/trumbowyg/dist/ui/trumbowyg.min"); //estilos generales del editor de texto
        $this->template->add_css("plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min"); //estilos del plugin de color

        //Dentro de este JS del plugin del editor trumbowyg se agregó el contenido del JS del plugin de color debido a que
        //no lo reconocía de manera separada, si necesita agregar más plugin recomiendo hacer lo mismo con los nuevos
        $this->template->add_js("plugins/trumbowyg/dist/trumbowyg");

        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom

        $this->_validar_login('admin');

        $this->load->model('website_model');

        $id_noticia = $this->input->post('id_noticia');
        $tipo = $this->input->post('tipo');
        $tipo_noticia = $this->input->post('tipo_noticia');

        $noticia = $this->website_model->getNoticiaDivisist($id_noticia, $tipo, $tipo_noticia);
        //echo var_dump($noticia);exit;

        if ($this->input->post('editar') == 1) {
            $tipo_noticia = $this->input->post('TIPO_NOTICIA');

            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'ESTADO',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'FECHA_VENCIMIENTO',
                    'label' => 'Fecha de Vencimiento',
                    'rules' => 'required',
                ],
            ];

            if ($tipo_noticia == 0) {
                //CECOM
                $rules[] = [
                    'field' => 'URL',
                    'label' => 'URL',
                    'rules' => 'max_length[200]',
                ];

                $rules[] = [
                    'field' => 'CONTENIDO',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ];
            }

            $this->form_validation->set_rules($rules);

            //$imagen_noti_div = $this->_validar_imagen2('imagen_noti_div', false, "imagen_noti_div", "error_imagen_noti_div");

            if ($this->form_validation->run() === true) {
                //Si el usuario subió una imagen o un PDF
                if (isset($_FILES['imagen_noti_div']['name']) && $_FILES['imagen_noti_div']['name'] !== "") {
                    $nombre_archivo = $_FILES['imagen_noti_div']['name'];
                    $porcion = explode(".", $nombre_archivo);
                    $tipo_archivo = $porcion[1];

                    if ($tipo_archivo == 'pdf') {
                        $imagen_noti_div = $this->_validar_documento('imagen_noti_div', false, "documento_divisist");
                    } else {
                        if ($tipo_noticia == '0') {
                            //Cecom
                            $imagen_noti_div = $this->_validar_imagen2('imagen_noti_div', false, "imagen_noti_div", "error_imagen_noti_div");
                        }
                        //Noticias de Prensa
                        else {
                            $imagen_noti_div = $this->_validar_imagen2('imagen_noti_div', false, "noti_divisist", "error_imagen_noti_div");
                        }
                    }

                    //echo $imagen_noti_div; die;

                    if (!isset($imagen_noti_div['file_name'])) {
                        $this->template->set_flash_message(['error' => $imagen_noti_div]);
                        redirect('administracion/editar_noticia_divisist');
                    }
                }

                //TITULO, CONTENIDO, 'OFICINA DE PRENSA',TIPO, TIPO_NOTICIA
                $info = [
                    'TITULO' => $this->input->post('ID_NOTICIA'),
                    'CONTENIDO' => str_replace("</p>", "", str_replace("<p>", "", $this->input->post('CONTENIDO'))),
                    'ESTADO' => $this->input->post('ESTADO'),
                    'TIPO' => $this->input->post('TIPO'),
                    'FECHA_VENCIMIENTO' => $this->input->post('FECHA_VENCIMIENTO'),
                    'URL' => $this->input->post('URL'),
                ];

                if ($tipo_noticia == '1') {
                    //Noticias de Prensa
                    //$info['CONTENIDO']= $this->input->post('contenido');

                    //Si el usuario subió una imagen o un PDF
                    if (isset($imagen_noti_div['file_name'])) {
                        if (!empty($info['CONTENIDO'])) {
                            $partes = explode('<br><input id="separador" name="separador" type="hidden" value="">', $info['CONTENIDO']);

                            if (!empty($partes[1])) {
                                //si hay documento o imagen entonces se quita
                                $info['CONTENIDO'] = $partes[0];
                            }

                            $salto_linea = '<br><input id="separador" name="separador" type="hidden" value="" />';
                        }

                        if ($tipo_archivo == 'pdf') {
                            $info['CONTENIDO'] =
                                $info['CONTENIDO'] .
                                $salto_linea .
                                '<embed src="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="300px" />' .
                                '<br><a href="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '" target="_blank"><img class="img-responsive center-block" src="' .
                                base_url("/public/documentos") .
                                '/' .
                                $imagen_noti_div['file_name'] .
                                '"></a>';
                        }
                        //es una imagen
                        else {
                            $info['CONTENIDO'] =
                                $info['CONTENIDO'] . $salto_linea . '<br><img class="img-responsive center-block" width="75%" height="75%"  src="' . base_url("/ufpsnuevo/archivos") . '/' . $imagen_noti_div['file_name'] . '">';
                        }
                    }
                }
                //Cecom
                else {
                    if (isset($imagen_noti_div['file_name'])) {
                        $info['URL_IMG'] = base_url("/public/imagenes/noticia") . '/' . $imagen_noti_div['file_name'];
                    }
                }

                //echo '<pre>';
                //echo var_dump($info);
                //echo '</pre>';die;

                $ok = $this->website_model->update_noticia_div($info, $tipo_noticia);

                //echo '<pre>';
                //echo var_dump($ok);
                //echo '</pre>';die;

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la nueva Noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar la nueva Noticia']);
                }

                redirect('administracion/noticia_divisist');
            }
        } else {
            if (!empty($noticia)) {
                $_POST = array_merge($_POST, (array) $noticia);
                $imagen_noti = !empty($noticia->URL_IMG) ? $noticia->URL_IMG : "";
                $fecha_ven = $noticia->FECHA_VEN;

                $tipo = '';

                if ($noticia->TIPO == 'A') {
                    $tipo = "Estudiante";
                } elseif ($noticia->TIPO == 'D') {
                    $tipo = "Docente";
                } elseif ($noticia->TIPO == 'R') {
                    $tipo = "Administrativo";
                }

                $this->template->set('imagen_noti', $imagen_noti);
                $this->template->set('fecha_ven', $fecha_ven);
                $this->template->set('id_noticia', $noticia->TITULO);
                $this->template->set('tipo', $noticia->TIPO); //$tipo_noticia
                $this->template->set('tipo_noticia', $tipo_noticia);
            } else {
                $this->template->set_flash_message(['error' => 'Ocurrio un error al cargar los datos de la noticia seleccionada']);
            }
        }

        //$this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias_di');
        $this->template->render('administracion/noticia_div/editar_noticia');
    }

    public function correos_sientelau()
    {
        $this->_validar_login('admin');

        $this->load->model('website_model');
        $editoriales = $this->website_model->get_correos_divisist();
        //  echo '<pre>'; print_r($editoriales[0]->CONTENIDO_NOTICIA->load()); return;
        //  echo '<pre>'; print_r($editoriales); return;
        $this->template->set('editoriales', $editoriales);

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'correos_sientelau');
        $this->template->render('administracion/sientelau/index');
    }

    public function agregar_sientelau()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'titulo',
                    'label' => 'Titulo',
                    'rules' => 'required|max_length[200]',
                ],
                [
                    'field' => 'contenido',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'publicar',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'tipo',
                    'label' => 'Tipo',
                    'rules' => 'required|max_length[1]',
                ],
                [
                    'field' => 'fecha_vencimiento',
                    'label' => 'Fecha de Vencimiento',
                    'rules' => 'required',
                ],
                [
                    'field' => 'url',
                    'label' => 'URL',
                    'rules' => 'max_length[200]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen_noti_div = $this->_validar_imagen('imagen_noti_div', false, "imagen_noti_div", "error_imagen_noti_div");

            if ($this->form_validation->run() === true && $imagen_noti_div) {
                $info = [
                    'TITULO' => $this->input->post('titulo'),
                    'CONTENIDO' => str_replace("</p>", "", str_replace("<p>", "", $this->input->post('contenido'))),
                    'ESTADO' => $this->input->post('publicar'),
                    'TIPO' => $this->input->post('tipo'),
                    'OBSERVACION' => 'Cecom',
                    'FECHA_VENCIMIENTO' => $this->input->post('fecha_vencimiento'),
                    'URL' => $this->input->post('url'),
                ];
                if (isset($imagen_noti_div['file_name'])) {
                    $info['URL_IMG'] = base_url("/public/imagenes/noticia/") . $imagen_noti_div['file_name'];
                }

                $ok = $this->website_model->insert_noticia_div($info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva Noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva Noticia']);
                }

                redirect('administracion/noticia_divisist');
            }
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias_di');
        $this->template->render('administracion/noticia_div/agregar_noticia');
    }

    public function editar_sientelau()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');

        $id = $this->input->post('editorial');
        $anyo = $this->input->post('anyo');

        $editorial = $this->website_model->getSientelaU($id_noticia, $tipo);

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'CONTENIDO',
                    'label' => 'Descripción',
                    'rules' => 'required',
                ],
                [
                    'field' => 'ESTADO',
                    'label' => 'Publicar',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'FECHA_VENCIMIENTO',
                    'label' => 'Fecha de Vencimiento',
                    'rules' => 'required',
                ],
                [
                    'field' => 'URL',
                    'label' => 'URL',
                    'rules' => 'max_length[200]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen_noti_div = $this->_validar_imagen('imagen_noti_div', false, "imagen_noti_div", "error_imagen_noti_div");

            if ($this->form_validation->run() === true && $imagen_noti_div) {
                $info = [
                    'CONTENIDO' => str_replace("</p>", "", str_replace("<p>", "", $this->input->post('CONTENIDO'))),
                    'ESTADO' => $this->input->post('ESTADO'),
                    'OBSERVACION' => 'Cecom',
                    'FECHA_VENCIMIENTO' => $this->input->post('FECHA_VENCIMIENTO'),
                    'URL' => $this->input->post('URL'),
                ];
                if (isset($imagen_noti_div['file_name'])) {
                    $info['URL_IMG'] = base_url("/public/imagenes/noticia/") . $imagen_noti_div['file_name'];
                } else {
                    $info['URL_IMG'] = $this->input->post('IMAGEN_NOTI');
                }
                $info['TITULO'] = $this->input->post('ID_NOTICIA');
                $info['TIPO'] = $this->input->post('TIPO');

                //   echo '<pre>'; print_r(array_slice($info, 6, 8)); return;

                $ok = $this->website_model->update_noticia_div($info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la nueva Noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar la nueva Noticia']);
                }

                redirect('administracion/noticia_divisist');
            }
        } else {
            $_POST = array_merge($_POST, (array) $noticia);
            $imagen_noti = $noticia->URL_IMG ? $noticia->URL_IMG : "";
            $fecha_ven = $noticia->FECHA_VEN;
            $this->template->set('imagen_noti', $imagen_noti);
            $this->template->set('fecha_ven', $fecha_ven);
            $this->template->set('id_noticia', $noticia->TITULO);
            $this->template->set('tipo', $noticia->TIPO);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_noticias_di');
        $this->template->render('administracion/noticia_div/editar_noticia');
    }

    public function correos_enlace_informativo()
    {
        $this->_validar_login('admin');

        $this->load->model('website_model');
        $editoriales = $this->website_model->get_correos_enlace();
        //  echo '<pre>'; print_r($editoriales[0]->CONTENIDO_NOTICIA->load()); return;
        //  echo '<pre>'; print_r($editoriales); return;
        $this->template->set('editoriales', $editoriales);

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_js('js/views/administracion/administracion'); //Jquery custom
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/index');
    }

    public function generarBoletin()
    {
        $id_boletin = $this->input->post('id_boletin');
        $this->load->model('website_model');
        $boletin = $this->website_model->getBoletin($id_boletin);
        $noticias = $this->website_model->get_contenido_correos_enlace($id_boletin);
        $plantilla = $this->website_model->getPlantilla($boletin->ID_TEMPLATE_CORREO);

        $template = $plantilla->PLANTILLA;
        $template = $template->read($template->size());

        $template = str_replace("edicion_banner", "Edición " . $boletin->EDICION, $template);

        $contador = 1;

        foreach ($noticias as $noticia) {
            if ($contador == 1) {
                $template = str_replace("img_noti_1", $noticia->RUTA_IMAGEN, $template);
                $template = str_replace("titulo_noti_1", $noticia->NOMBRE, $template);
                $template = str_replace("resumen_noti_1", $noticia->RESUMEN, $template);
                $template = str_replace("url_noti_1", $noticia->URL, $template);
            } elseif ($contador == 2) {
                $template = str_replace("img_noti_2", $noticia->RUTA_IMAGEN, $template);
                $template = str_replace("titulo_noti_2", $noticia->NOMBRE, $template);
                $template = str_replace("resumen_noti_2", $noticia->RESUMEN, $template);
                $template = str_replace("url_noti_2", $noticia->URL, $template);
            } elseif ($contador == 3) {
                $template = str_replace("img_noti_3", $noticia->RUTA_IMAGEN, $template);
                $template = str_replace("titulo_noti_3", $noticia->NOMBRE, $template);
                $template = str_replace("resumen_noti_3", $noticia->RESUMEN, $template);
                $template = str_replace("url_noti_3", $noticia->URL, $template);
            }

            $contador++;
        }

        if (!empty($noticias)) {
            echo json_encode([
                "estado" => "success",
                "mensaje" => "Boletín generado correctamente",
                "boletin" => $boletin,
                "noticias" => $noticias,
                "plantilla" => $template,
            ]);
            exit();
        } else {
            echo json_encode([
                "estado" => "error",
                "mensaje" => "No se puede generar el boletín sin noticias registradas",
            ]);
            exit();
        }
    }

    public function enviarBoletinCorreo()
    {
        $correo = $this->input->post('correo');
        $nombre_boletin = $this->input->post('nombre_boletin');
        $contenido_boletin = $this->input->post('contenido_boletin');

        $this->load->library('form_validation');
        $rules = [
            [
                'field' => 'email_boletin',
                'label' => 'Correo',
                'rules' => 'max_length[100]',
            ],
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === true) {
            $tittle = $nombre_boletin;
            $subject = $nombre_boletin;
            $body = $contenido_boletin;
            $link = "";

            $from = "noreply@ufps.edu.co";

            $respuesta = $this->send_email($tittle, $subject, $body, $link, $correo, $from, false);

            //echo var_dump($respuesta);exit;

            if ($respuesta === true) {
                // si envío el correo correctamente
                echo json_encode([
                    "estado" => "success",
                    "mensaje" => "Correo enviado correctamente",
                ]);
            } else {
                echo json_encode([
                    "estado" => "error",
                    "mensaje" => "Error al enviar el correo",
                ]);
            }
            exit();
        }
    }

    public function agregar_enlace_informativo()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[50]',
                ],
                [
                    'field' => 'edicion',
                    'label' => 'Edición',
                    'rules' => 'required|numeric|max_length[3]',
                ],
                [
                    'field' => 'estado',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'anyo',
                    'label' => 'Año',
                    'rules' => 'required|numeric|max_length[4]',
                ],
                [
                    'field' => 'id_template_correo',
                    'label' => 'Plantilla',
                    'rules' => 'required|numeric|max_length[2]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'NOMBRE' => $this->input->post('nombre'),
                    'EDICION' => $this->input->post('edicion'),
                    'ESTADO' => $this->input->post('estado'),
                    'ANYO' => $this->input->post('anyo'),
                    'ID_TEMPLATE_CORREO' => $this->input->post('id_template_correo'),
                ];

                if ($this->website_model->insert_boletin_enlace($info)) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente el nuevo boletín']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar el nuevo boletín']);
                }
                redirect('administracion/correos_enlace_informativo');
            }
        }

        $listado_plantilla = $this->_templates($this->website_model->get_template_correos());
        $this->template->set('listado_plantilla', $listado_plantilla);

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/agregar_boletin');
    }

    public function editar_enlace_informativo()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');

        $id_boletin = $this->input->post('id_boletin');

        $boletin = $this->website_model->getBoletin($id_boletin);

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'NOMBRE',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[50]',
                ],
                [
                    'field' => 'EDICION',
                    'label' => 'Edición',
                    'rules' => 'required|numeric|max_length[3]',
                ],
                [
                    'field' => 'ESTADO',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'ANYO',
                    'label' => 'Año',
                    'rules' => 'required|numeric|max_length[4]',
                ],
                [
                    'field' => 'ID_TEMPLATE_CORREO',
                    'label' => 'Plantilla',
                    'rules' => 'required|numeric|max_length[2]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === true) {
                $info = [
                    'NOMBRE' => $this->input->post('NOMBRE'),
                    'ESTADO' => $this->input->post('ESTADO'),
                    'EDICION' => $this->input->post('EDICION'),
                    'ANYO' => $this->input->post('ANYO'),
                    'ID_TEMPLATE_CORREO' => $this->input->post('ID_TEMPLATE_CORREO'),
                ];

                $ok = $this->website_model->update_boletin_enlace($id_boletin, $info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente el nuevo boletín']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar el nuevo boletín']);
                }

                redirect('administracion/correos_enlace_informativo');
            }
        } else {
            $_POST = array_merge($_POST, (array) $boletin);

            $listado_plantilla = $this->_templates($this->website_model->get_template_correos());
            $this->template->set('listado_plantilla', $listado_plantilla);

            $this->template->set('boletin', $boletin);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/editar_boletin');
    }

    public function contenido_enlace_informativo()
    {
        $this->_validar_login('admin');

        $this->load->model('website_model');

        $id_boletin = $this->input->post('id_boletin');

        if ($id_boletin) {
            $this->session->set_userdata('id_boletin', $id_boletin);
        } else {
            $id_boletin = $this->session->id_boletin;
        }

        $noticias = $this->website_model->get_contenido_correos_enlace($id_boletin);
        //  echo '<pre>'; print_r($editoriales[0]->CONTENIDO_NOTICIA->load()); return;
        //  echo '<pre>'; print_r($noticias); return;
        $this->template->set('noticias', $noticias);

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/contenido');
    }

    public function agregar_noticia_enlace_informativo()
    {
        $id_boletin = $this->session->id_boletin;
        if (!$id_boletin) {
            redirect('administracion/correos_enlace_informativo');
        }

        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');
        if ($this->input->post('agregar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[500]',
                ],
                [
                    'field' => 'resumen',
                    'label' => 'Resumen',
                    'rules' => 'max_length[1000]',
                ],
                [
                    'field' => 'descripcion',
                    'label' => 'Descripción',
                    'rules' => 'max_length[8000]',
                ],
                [
                    'field' => 'url',
                    'label' => 'Url',
                    'rules' => 'max_length[500]',
                ],
                [
                    'field' => 'estado',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'orientacion',
                    'label' => 'Orientación',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required|numeric|max_length[2]',
                ],
                [
                    'field' => 'firma',
                    'label' => 'Firma',
                    'rules' => 'max_length[2000]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen_noti_enlace', true, "imagen_noti_enlace", "error_imagen_noti_enlace");

            if ($this->form_validation->run() === true && $imagen) {
                $info = [
                    'NOMBRE' => $this->input->post('nombre'),
                    'RESUMEN' => $this->input->post('resumen'),
                    'ESTADO' => $this->input->post('estado'),
                    'ORDEN' => $this->input->post('orden'),
                    'URL' => $this->input->post('url'),
                    'ORIENTACION' => $this->input->post('orientacion'),
                    'DESCRIPCION' => substr($this->input->post('descripcion'), 0, 4000),
                    'DESCRIPCION2' => substr($this->input->post('descripcion'), 4000, 8000),
                    'ID_BOLETIN' => $id_boletin,
                    'FIRMA' => $this->input->post('firma'),
                ];

                if (isset($imagen['file_name'])) {
                    $info['RUTA_IMAGEN'] = base_url("/public/imagenes/seccion") . '/' . $imagen['file_name'];
                }

                if ($this->website_model->insert_noticia_boletin_enlace($info)) {
                    $this->template->set_flash_message(['success' => 'Se ha registrado exitosamente la nueva noticia']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al registrar la nueva noticia']);
                }
                redirect('administracion/contenido_enlace_informativo');
            }
        }
        $opc_ori = ['' => 'Seleccione una opción', 1 => 'Izquierda', 2 => 'Derecha', 3 => 'Completa'];
        $this->template->set('opc_ori', $opc_ori);

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/agregar_noticia');
    }

    public function editar_noticia_enlace_informativo()
    {
        $this->template->add_js('js/custom/fecha');
        $this->template->add_css('plugins/datetimepicker/css/bootstrap-datetimepicker');
        $this->template->add_js('plugins/datetimepicker/js/bootstrap-datetimepicker.min');
        $this->template->add_js('js/momentjs/moment');

        $this->_validar_login('admin');

        $this->load->model('website_model');

        $id_noticia = $this->input->post('id_noticia');

        $noticia = $this->website_model->getNoticiaBoletin($id_noticia);

        if ($this->input->post('editar') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'NOMBRE',
                    'label' => 'Nombre',
                    'rules' => 'required|max_length[500]',
                ],
                [
                    'field' => 'RESUMEN',
                    'label' => 'Resumen',
                    'rules' => 'max_length[1000]',
                ],
                [
                    'field' => 'DESCRIPCION',
                    'label' => 'Descripción',
                    'rules' => 'max_length[8000]',
                ],
                [
                    'field' => 'URL',
                    'label' => 'Url',
                    'rules' => 'max_length[500]',
                ],
                [
                    'field' => 'ESTADO',
                    'label' => 'Estado',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'ORIENTACION',
                    'label' => 'Orientación',
                    'rules' => 'required|numeric|max_length[1]',
                ],
                [
                    'field' => 'ORDEN',
                    'label' => 'Orden',
                    'rules' => 'required|numeric|max_length[2]',
                ],
                [
                    'field' => 'FIRMA',
                    'label' => 'Firma',
                    'rules' => 'max_length[2000]',
                ],
            ];
            $this->form_validation->set_rules($rules);

            $imagen = $this->_validar_imagen('imagen_noti_enlace', false, "imagen_noti_enlace", "error_imagen_noti_enlace");

            if ($this->form_validation->run() === true && $imagen) {
                $info = [
                    'NOMBRE' => $this->input->post('NOMBRE'),
                    'RESUMEN' => $this->input->post('RESUMEN'),
                    'ESTADO' => $this->input->post('ESTADO'),
                    'ORDEN' => $this->input->post('ORDEN'),
                    'URL' => $this->input->post('URL'),
                    'ORIENTACION' => $this->input->post('ORIENTACION'),
                    'DESCRIPCION' => substr($this->input->post('DESCRIPCION'), 0, 4000),
                    'DESCRIPCION2' => substr($this->input->post('DESCRIPCION'), 4000, 8000),
                    'FIRMA' => $this->input->post('FIRMA'),
                ];

                if (isset($imagen['file_name'])) {
                    $info['RUTA_IMAGEN'] = base_url("/public/imagenes/seccion") . '/' . $imagen['file_name'];
                }

                //    echo '<pre>'; print_r($info); return;
                $ok = $this->website_model->update_noticia_boletin_enlace($id_noticia, $info);

                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente la nueva noticia del boletín']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al editar la nueva noticia del boletín']);
                }

                redirect('administracion/contenido_enlace_informativo');
            }
        } else {
            $_POST = array_merge($_POST, (array) $noticia);
            $imagen_noti = $noticia->RUTA_IMAGEN ? $noticia->RUTA_IMAGEN : "";
            $this->template->set('imagen_noti', $imagen_noti);
            $this->template->set('noticia', $noticia);
            $opc_ori = ['' => 'Seleccione una opción', 1 => 'Izquierda', 2 => 'Derecha', 3 => 'Completa'];
            $this->template->set('opc_ori', $opc_ori);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'correos_enlace_informativo');
        $this->template->render('administracion/enlace_ufps/editar_noticia');
    }

    private function _templates($listado)
    {
        $arrayTemp = [];
        $arrayTemp[''] = "Seleccione una opción";
        if (count($listado['ID']) > 0) {
            $numFilas = count($listado['ID']);
            for ($i = 0; $i < $numFilas; $i++) {
                $arrayTemp[$listado['ID'][$i]] = $listado['NOMBRE'][$i];
            }
        }

        return $arrayTemp;
    }

    public function contenido_rectoria()
    {
        $this->_validar_login('admin');
        $this->load->model('website_model');

        $inforectoria = $this->website_model->get_info_rectoria();
        $this->template->set('inforectoria', $inforectoria);

        $this->template->add_js("plugins/datatables/js/dataTables.bootstrap.min");
        $this->template->add_js("plugins/datatables/js/jquery.dataTables.min");
        $this->template->add_js("plugins/datatables/js/main");
        $this->template->add_css("plugins/datatables/css/dataTables.bootstrap.min");

        $this->template->set('item_sidebar_active', 'administrar_contenido_rectoria');
        $this->template->render('administracion/contenido_rectoria/index');
    }

    public function editar_contenido_rectoria()
    {
        $this->_validar_login('admin');

        $this->load->model('website_model');
        $id_info_rec = $this->input->get('id_info_rec');

        $info_rec = $this->website_model->get_info_rectoria();

        if (!$info_rec) {
            $this->template->set_flash_message(['warning' => 'Ocurrió un error al cargar la información.']);
            redirect('administracion/contenido_rectoria');
        }

        if ($this->input->post('editar') == 1) {
            $imagen = $this->_validar_imagen('FOTO', false, "imagen_info_rectoria", "error_imagen");

            if ($imagen) {
                $nombre = $this->input->post('NOMBRE');
                $cargo = $this->input->post('CARGO');
                $foto = '';
                if (isset($imagen['file_name'])) {
                    $foto = $imagen['file_name'];
                }
                $id_info_rec = $info_rec->ID_INFO_REC;

                $ok = $this->website_model->guardar_rector($id_info_rec, $nombre, $cargo, $foto);
                if ($ok) {
                    $this->template->set_flash_message(['success' => 'Se ha editado exitosamente.']);
                } else {
                    $this->template->set_flash_message(['error' => 'Ocurrio un error al guardar los cambios solicitados.']);
                }
                redirect('administracion/contenido_rectoria/editar');
            }
        } else {
            $_POST = array_merge($_POST, (array) $info_rec);
            $imagen = $info_rec->FOTO ? site_url('./assets/uploads/img/rectoria/' . $info_rec->FOTO) : "";
            $this->template->set('foto', $imagen);
        }

        $this->template->add_js("plugins/ckeditor/ckeditor");
        $this->load->helper('form');
        $this->template->set('item_sidebar_active', 'administrar_contenido_rectoria');
        $this->template->render('administracion/contenido_rectoria/editar');
    }

    public function cargar_banner_seccion()
    {
        //var_dump($_FILES['imagen_banner']);exit;

        if (isset($_FILES['imagen_banner']['name'])) {
            $imagen_banner = $this->_validar_imagen2('imagen_banner', false, "imagen_banner", "error_imagen_banner");
            //echo '<pre>';
            //var_dump($imagen_banner);
            //echo '</pre>';die;

            //Muestra un error
            if (empty($imagen_banner['file_name'])) {
                echo json_encode([
                    "estado" => "error",
                    "mensaje" => "Error al cargar la imagen",
                ]);
                exit();
            }
            //Subió la imagen correctamente
            else {
                echo json_encode([
                    "estado" => "success",
                    "mensaje" => "La imagen fue cargada correctamente",
                    "nombre_imagen" => $imagen_banner['file_name'],
                ]);
                exit();
            }
        }
    }

    public function eliminar_archivo()
    {
        //var_dump($_FILES['imagen_banner']);exit;

        if (isset($_FILES['imagen_banner']['name'])) {
            $imagen_banner = $this->_validar_imagen2('imagen_banner', false, "imagen_banner", "error_imagen_banner");
            //echo '<pre>';
            //var_dump($imagen_banner);
            //echo '</pre>';die;

            //Muestra un error
            if (empty($imagen_banner['file_name'])) {
                echo json_encode([
                    "estado" => "error",
                    "mensaje" => "Error al cargar la imagen",
                ]);
                exit();
            }
            //Subió la imagen correctamente
            else {
                echo json_encode([
                    "estado" => "success",
                    "mensaje" => "La imagen fue cargada correctamente",
                    "nombre_imagen" => $imagen_banner['file_name'],
                ]);
                exit();
            }
        }
    }
}

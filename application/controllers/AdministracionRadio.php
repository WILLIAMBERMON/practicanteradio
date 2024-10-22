<?php

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

}
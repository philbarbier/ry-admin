<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index() {
        if ($this->_check_session()) {
            header('Location: /home');
            exit;
        }
        $this->load->helper(array('form'));
        $this->_load_view('login_form');
    }

    public function logout() {
        $this->session->sess_destroy();
        header('Location: /');
        exit;
    }

    public function performlogin() {
        $this->load->model('adminuser', 'User');
        $res = $this->User->checklogin($this->input->post('username'), $this->input->post('password'));
        if ($res) {
            // good
            $this->session->set_userdata(array('username' => $this->input->post('username')));
            header('Location: /home');
            exit;
        } else {
            header('Location: /');
            exit;
        }
        exit;
    }
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    var $session = false; 

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function _load_view($viewname = false, $viewdata = []) {
        $this->load->view('header', $viewdata);
        if ($this->_check_session()) {
            $this->load->view('nav', $viewdata);
        }
        $this->load->view($viewname, $viewdata);
        $this->load->view('footer');
    }

    public function _check_session() {
        return $this->session->userdata('username'); 
    }
}

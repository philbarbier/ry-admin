<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
    
    public function index() {
        $this->_load_view('homepage');
    }

    public function add_submission() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|psd|jpeg';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = true;
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('uploadfile')) {
            $error = array('message' => $this->upload->display_errors());
            $this->_load_view('add_submission_form', $error);
        } else { 
            // add submission to database
            $data = $this->input->post();
            $data['file'] = $this->upload->data();
            $this->load->model('submission');
            $res = $this->submission->add_submission($data);
            $data = ['message' => ($res) ? 'Submission successful' : 'Error processing submission'];
            $this->_load_view('add_submission_form', $data);
        }
    }

    public function add_submission_form() {
        $this->_load_view('add_submission_form');        
    }

    public function export_voters() {
        $this->load->dbutil();
        $query = $this->db->query('select * from voters');
        $csvdata = $this->dbutil->csv_from_result($query, ',', "\n");
        $this->load->helper('download');
        $name = 'Ryvita_voter_exports_' . date('Y-m-d_Hi') . '.csv';
        force_download($name, $csvdata);
        exit;

    }
}

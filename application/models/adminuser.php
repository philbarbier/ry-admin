<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminUser extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function checklogin($user, $pass) {
        $this->db->from('admin_users');
        $this->db->where(array('username' => $user, 'passhash' => md5($pass), 'active' => 1));
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? true : false;
    }
}

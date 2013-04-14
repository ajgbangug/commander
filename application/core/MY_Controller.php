<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    public function is_logged_in()
    {
        session_start();
        return isset($_SESSION['username']);
    }

    public function is_valid_account($username, $password) {
        $this->load->model('user_model');
        $details = array(
            'username' => $username,
            'password' => $password
        );
        if($this->user_model->getUser($details) == NULL) {
            $this->form_validation->set_message('is_valid_account', 'Incorrect login details.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function username_not_exists($username) {
        $this->load->model('user_model');
        $details = array(
            'username' => $username
        );
        if($this->user_model->getUser($details) != NULL) {
            $this->form_validation->set_message('username_not_exists', 'Username already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
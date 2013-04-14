<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('pages/login', $data);
    }

    public function process() {
        $this->load->library('form_validation');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username',
            'required|callback_is_valid_account['.$password.']');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()) {
            session_start();
            $_SESSION['username'] = $this->input->post('username');
            redirect('home');
        } else {
            $data['title'] = 'Login';
            $this->load->view('pages/login', $data);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        redirect('login');
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

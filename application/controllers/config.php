<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->is_logged_in()) {
            $this->load->model('user_model');
            $username = $_SESSION['username'];
            $this->config->load('mongodb');
            $data['dbname'] = $this->config->item('dbname');
            $data['dbhost'] = $this->config->item('dbhost');
            $data['dbusername'] = $this->config->item('username');
            $data['account'] = $this->user_model->getUser(array('username' => $username));
            $data['title'] = 'Config';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/config/page_header');
            $this->load->view('pages/config/config_main', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
        
    }

    public function change_account() {
        if($this->is_logged_in()) {
            $this->load->model('user_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[conf_password]');
            $this->form_validation->set_rules('conf_password', 'Password', 'required');

            if($this->form_validation->run() == FALSE) {
                $username = $_SESSION['username'];
                $data['dbname'] = $this->config->item('dbname');
                $data['dbhost'] = $this->config->item('dbhost');
                $data['dbusername'] = $this->config->item('username');
                $data['account'] = $this->user_model->getUser(array('username' => $username));
                $data['title'] = 'Config';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/page_header');
                $this->load->view('pages/config/config_main', $data);
                $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $details = array(
                    'username' => $username,
                    'password' => $password
                );
                $this->user_model->updateUser(array('username' => $_SESSION['username']), $details);
                redirect('login/logout');
            }
        }
    }

    public function add_account() {
        if($this->is_logged_in()) {
            $this->load->model('user_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('new_account_username', 'Username',
                'required|callback_username_not_exists');
            $this->form_validation->set_rules('new_account_password', 'Password',
                'required|matches[new_account_conf_password]');
            $this->form_validation->set_rules('new_account_conf_password', 'Confirm Password', 'required');

            if($this->form_validation->run() == FALSE) {
                $username = $_SESSION['username'];
                $data['dbname'] = $this->config->item('dbname');
                $data['dbhost'] = $this->config->item('dbhost');
                $data['dbusername'] = $this->config->item('username');
                $data['account'] = $this->user_model->getUser(array('username' => $username));
                $data['title'] = 'Config';
                
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/page_header');
                $this->load->view('pages/config/config_main', $data);
                $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('new_account_username');
                $password = $this->input->post('new_account_password');
                $details = array(
                    'username' => $username,
                    'password' => $password
                );
                $this->user_model->addUser($details);
                $data['title'] = 'Account Creation Successful!';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/success_new_account');
                $this->load->view('templates/footer');
            }
        }
    }
}

/* End of file config.php */
/* Location: ./application/controllers/config.php */
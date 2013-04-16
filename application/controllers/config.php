<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->is_logged_in()) {
            $username = $_SESSION['username'];
            $this->config->load('mongodb');
            $this->load->model('user_model');
            $data['user_list'] = $this->user_model->getUsers(
                array('username' => array('$ne' => $_SESSION['username'])), array('username'));
            $data['dbname'] = $this->config->item('dbname');
            $data['dbhost'] = $this->config->item('dbhost');
            $data['dbusername'] = $this->config->item('username');
            $data['title'] = 'Config';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/config/page_header');
            $this->load->view('pages/config/config_main');
            $this->load->view('pages/config/js_includes');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
        
    }

    public function change_account() {
        if($this->is_logged_in()) {
            $this->load->model('user_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('old_password', 'Old Password',
                'required|callback_correct_password['.$_SESSION['username'].']');
            $this->form_validation->set_rules('new_password', 'Password', 'required|matches[new_conf_password]');
            $this->form_validation->set_rules('new_conf_password', 'Confirm Password', 'required');

            if($this->form_validation->run() == FALSE) {
                $username = $_SESSION['username'];
                $data['dbname'] = $this->config->item('dbname');
                $data['dbhost'] = $this->config->item('dbhost');
                $data['dbusername'] = $this->config->item('username');
                $data['title'] = 'Config';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/page_header');
                $this->load->view('pages/config/config_main', $data);
                $this->load->view('pages/config/js_includes');
                $this->load->view('templates/footer');
            } else {
                $password = $this->input->post('new_password');
                $details = array(
                    '$set' => array('password' => md5($password))
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
                $data['dbname'] = $this->config->item('dbname');
                $data['dbhost'] = $this->config->item('dbhost');
                $data['dbusername'] = $this->config->item('username');
                $data['title'] = 'Config';
                
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/page_header');
                $this->load->view('pages/config/config_main', $data);
                $this->load->view('pages/config/js_includes');
                $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('new_account_username');
                $password = $this->input->post('new_account_password');
                $details = array(
                    'username' => $username,
                    'password' => md5($password)
                );
                $this->user_model->addUser($details);
                $data['title'] = 'Account Creation Successful!';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/config/success_new_account');
                $this->load->view('templates/footer');
            }
        }
    }

    public function delete_account() {
        if($this->is_logged_in()) {
            $this->load->model('user_model');
            $user_list = explode(',', $this->input->post('selection_list'));
            foreach ($user_list as $u) {
                $this->user_model->deleteUsers(array('username' => $u));
            }

            $this->load->view('templates/header', array('title' => 'Delete Successful!'));
            $this->load->view('pages/config/success_delete_account');
            $this->load->view('templates/footer');
        }
    }
}

/* End of file config.php */
/* Location: ./application/controllers/config.php */
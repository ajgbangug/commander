<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->is_logged_in()) {
            $data['title'] = 'Home';
            $this->load->model('task_model');
            $log_list = $this->task_model->getLogs(array(), array());
            $data['log_list'] = $log_list;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('login');
        }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
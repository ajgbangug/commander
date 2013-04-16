<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->is_logged_in()) {
            $data['title'] = 'Logs';
            $this->load->model('task_model');
            $log_list = $this->task_model->getLogs(array(), array());
            $data['log_list'] = $log_list;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/logs/page_header', $data);
            $this->load->view('pages/logs/tasks_table', $data);
            $this->load->view('pages/logs/js_includes', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('login');
        }
    }

    public function refresh_logs()
    {
        if ($this->is_logged_in()) {
            $this->load->model('task_model');
            $host_list = $this->task_model->getLogs(array(), array('_id','successful'));
            $status_list = array();
            foreach ($host_list as $h) {
                $status_list[$h['_id']->{'$id'}] = $h['successful'];
            }
            echo json_encode($status_list);
        } else {
            redirect('login');
        }
    }

    public function clear() {
        if($this->is_logged_in()) {
            $this->load->model('task_model');
            $this->task_model->clear();
            redirect('home');
        } else {
            redirect('login');
        }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hosts extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->is_logged_in()) {
            $this->load->model('hosts_model');
            $this->load->model('task_model');

            $data['host_list'] = $this->hosts_model->getHosts(array(),
                array('hostname', 'operatingsystem', 'lsbdistrelease', 'macaddress', 'ipaddress'));
            $data['title'] = 'Hosts';
            $data['log_list'] = $this->task_model->getLogs(array(), array());;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/hosts', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('login');
        }
    }

    public function refreshList()
    {
        if ($this->is_logged_in()) {
            $this->load->model('hosts_model');
            $host_list = $this->hosts_model->getHosts(array(), array('macaddress', 'online'));
            $status_list = array();
            foreach ($host_list as $h) {
                $status_list[$h['macaddress']] = $h['online'];
            }
            echo json_encode($status_list);
        } else {
            redirect('login');
        }
    }

    public function profile() {
        if($this->is_logged_in()) {
            $this->load->model('hosts_model');
            $mac = $this->input->post('macaddress');
            $criteria = array(
                'macaddress' => $mac
            );
            
            $data['profile'] = $this->hosts_model->deepDive($criteria, array());
            $this->load->view('templates/header', $data);
            $this->load->view('pages/profile', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('login');
        }
    }

    public function clear() {
        if($this->is_logged_in()) {
            $this->load->model('hosts_model');
            $this->hosts_model->clear();
            redirect('hosts');
        } else {
            redirect('login');
        }
    }
}

/* End of file hosts.php */
/* Location: ./application/controllers/hosts.php */
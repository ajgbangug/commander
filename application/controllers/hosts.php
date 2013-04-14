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
            $this->load->view('templates/header', array('title' => 'Hosts'));
            $this->load->view('pages/hosts/page_header');
            $this->load->view('pages/hosts/hosts_main', $data);
            $this->load->view('pages/hosts/js_includes');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }

    public function refresh_status()
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
            $this->load->view('pages/hosts/profile', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
}

/* End of file hosts.php */
/* Location: ./application/controllers/hosts.php */
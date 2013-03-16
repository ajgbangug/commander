<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hosts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('hosts_model');
        $data['host_list'] = $this->hosts_model->getHosts(array(),
            array('hostname', 'operatingsystem', 'lsbdistrelease', 'macaddress', 'ipaddress'));
        $data['title'] = 'Hosts';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/hosts', $data);
        $this->load->view('templates/footer', $data);
    }

    public function refreshList()
    {
        $this->load->model('hosts_model');
        $host_list = $this->hosts_model->getHosts(array(), array('macaddress', 'online'));
        $status_list = array();
        foreach ($host_list as $h) {
            $status_list[$h['macaddress']] = $h['online'];
        }
        echo json_encode($status_list);
    }
}

/* End of file hosts.php */
/* Location: ./application/controllers/hosts.php */
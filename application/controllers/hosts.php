<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hosts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('hosts_model');
        $data['host_list'] = $this->hosts_model->getHosts();
        $data['title'] = 'Hosts';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/hosts', $data);
        $this->load->view('templates/footer', $data);
    }

    public function refreshList()
    {
        $host_list = $this->input->post('host_list');
        var_dump($host_list);
        /*
        $this->load->model('hosts_model');
        $remove_list = array();
        foreach ($host_list as $h) {
            if(!$this->hosts_model->deepDive(array('hostname' => $h))) {
                array_push($remove_list, $h); 
            }
        }

        print_r($remove_list);*/
    }
}

/* End of file hosts.php */
/* Location: ./application/controllers/hosts.php */
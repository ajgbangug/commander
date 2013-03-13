<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

}

/* End of file dashboardController.php */
/* Location: ./application/controllers/dashboardController.php */
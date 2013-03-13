<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		
	}

	public function view($id) {
		$this->load->model('hosts_model');
		
		$criteria = array(
			'hostname' => $id
		);
		
		$data['profile'] = $this->hosts_model->deepDive($criteria);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/profile', $data);
		$this->load->view('templates/footer', $data);
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();		
	}

	public function load_db() {
        $this->config->load('mongodb');
        $dbname = $this->config->item('dbname');
        $dbhost = $this->config->item('dbhost');
        $username = $this->config->item('username');
        $password = $this->config->item('password');
        $mongo = new Mongo("mongodb://{$username}:{$password}@{$dbhost}/{$dbname}");
        return $mongo->selectDB($dbname);
    }

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
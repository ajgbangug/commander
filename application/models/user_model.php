<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getUser($details) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->users;

        return $collection->findOne($details);
    }

    public function updateUser($username, $details) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->users;

        return $collection->update($username, $details);
    }

    public function login() {
        $this->config->load('mongodb');
        $dbname = $this->config->item('dbname');
        $dbhost = $this->config->item('dbhost');
        $username = $this->config->item('username');
        $password = $this->config->item('password');
        
        return new Mongo("mongodb://{$username}:{$password}@{$dbhost}/{$dbname}");
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
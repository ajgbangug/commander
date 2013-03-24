<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hosts_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getHosts($criteria, $columns) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->hosts;
        return iterator_to_array($collection->find($criteria , $columns));
    }

    public function deepDive($id, $columns) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->hosts;
        return $collection->findOne($id, $columns);
    }

    public function login() {
        $this->config->load('mongodb');
        $dbname = $this->config->item('dbname');
        $dbhost = $this->config->item('dbhost');
        $username = $this->config->item('username');
        $password = $this->config->item('password');
        
        return new Mongo("mongodb://{$username}:{$password}@{$dbhost}/{$dbname}");
    }

    public function clear() {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->hosts;
        return $collection->drop();
    }
}

/* End of file hosts */
/* Location: ./application/models/hosts */
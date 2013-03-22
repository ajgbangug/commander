<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }

    public function addTask($task) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->tasks;
        return $collection->batchInsert($task);
    }

    public function getLogs($criteria, $columns) {
        $mongo = $this->login();
        $this->config->load('mongodb');
        $db = $mongo->selectDB($this->config->item('dbname'));
        $collection = $db->tasks;
        return iterator_to_array($collection->find($criteria , $columns));
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

/* End of file task_model.php */
/* Location: ./application/models/task_model.php */
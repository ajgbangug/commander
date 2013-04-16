<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function addUser($details) {
        $db = $this->load_db();
        $collection = $db->users;

        return $collection->insert($details);
    }

    public function getUser($details) {
        $db = $this->load_db();
        $collection = $db->users;

        return $collection->findOne($details);
    }

    public function updateUser($username, $details) {
        $db = $this->load_db();
        $collection = $db->users;

        return $collection->update($username, $details);
    }

    public function getUsers($criteria, $columns) {
        $db = $this->load_db();
        $collection = $db->users;

        return iterator_to_array($collection->find($criteria, $columns));
    }
    public function deleteUsers($criteria) {
        $db = $this->load_db();
        $collection = $db->users;

        return $collection->remove($criteria);
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
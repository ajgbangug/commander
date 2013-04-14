<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hosts_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getHosts($criteria, $columns) {
        $db = $this->load_db();
        $collection = $db->hosts;
        return iterator_to_array($collection->find($criteria , $columns));
    }

    public function deepDive($id, $columns) {
        $db = $this->load_db();
        $collection = $db->hosts;
        return $collection->findOne($id, $columns);
    }

    public function delete($details) {
        $db = $this->load_db();
        $collection = $db->hosts;
        return $collection->remove($details);
    }
}

/* End of file hosts */
/* Location: ./application/models/hosts */
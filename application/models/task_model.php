<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();   
    }

    public function addTask($task) {
        $db = $this->load_db();
        $collection = $db->tasks;
        return $collection->batchInsert($task);
    }

    public function getLogs($criteria, $columns) {
        $db = $this->load_db();
        $collection = $db->tasks;
        return iterator_to_array($collection->find($criteria , $columns));
    }

    public function clear() {
        $db = $this->load_db();
        $collection = $db->tasks;
        return $collection->drop();
    }

}

/* End of file task_model.php */
/* Location: ./application/models/task_model.php */
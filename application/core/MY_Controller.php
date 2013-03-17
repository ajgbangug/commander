<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    public function is_logged_in()
    {
        session_start();
        return isset($_SESSION['username']);
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {

    public function enqueue() {
        $data = $this->input->post();
        $host_list = explode(",", $data['selection_list']);
        $task = $data['task'];
        $this->load->model('task_model');

        switch ($task) {
            case 'reboot':
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'reboot'
                );
                break;
            case 'shutdown':
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'shutdown'
                );
                break;
            case 'install':
                $packages = explode(' ', $data['packages']);
                $clean_packages = array();
                foreach ($packages as $p) {
                    array_push($clean_packages, '"'.$p.'"');
                }
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'install',
                    'args' => $clean_packages
                );
                break;
            case 'remove':
                $packages = explode(' ', $data['packages']);
                $clean_packages = array();
                foreach ($packages as $p) {
                    array_push($clean_packages, '"'.$p.'"');
                }
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'remove',
                    'args' => $clean_packages
                );
                break;
            case 'upgrade':
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'upgrade'
                );
                break;
            case 'dist-upgrade':
                $to_queue = array(
                    'host_list' => $host_list,
                    'operation' => 'dist-upgrade'
                );
                break;
        }
        return $this->task_model->addTask($to_queue);
    }

}

/* End of file action.php */
/* Location: ./application/controllers/action.php */
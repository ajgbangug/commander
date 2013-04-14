<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends MY_Controller {

    public function enqueue() {
        if($this->is_logged_in()) {
            $this->load->model('hosts_model');
            $data = $this->input->post();
            $mac_list = explode(",", $data['selection_list']);
            $task = $data['task'];
            $this->load->model('task_model');
            $this->load->model('hosts_model');
            $to_queue = array();
            switch ($task) {
                case 'reboot':
                case 'shutdown':
                case 'update':
                case 'upgrade':
                case 'dist_upgrade':
                case 'update_info':
                case 'remove_node':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        if($host) {
                            $to_queue[] = array(
                                'hostname' => $host['hostname'],
                                'macaddress' => $m,
                                'operation' => $task,
                                'time' => date('Y-m-d H:i:s'),
                                'successful' => false,
                                'by' => $_SESSION['username']
                            );
                        }
                    }
                    break;
                case 'install':
                case 'remove':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        if($host) {
                            $packages = explode(' ', $data['packages']);
                            $clean_packages = array();
                            foreach ($packages as $p) {
                                array_push($clean_packages, '"'.$p.'"');
                            }
                            $to_queue[] = array(
                                'hostname' => $host['hostname'],
                                'macaddress' => $m,
                                'args' => $clean_packages,
                                'operation' => $task,
                                'time' => date('Y-m-d H:i:s'),
                                'successful' => false,
                                'by' => $_SESSION['username']
                            );
                        }
                    }
                    break;
            }
            return $this->task_model->addTask($to_queue);
        } else {
            redirect('login');
        }
    }   
}

/* End of file action.php */
/* Location: ./application/controllers/action.php */
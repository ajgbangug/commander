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
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'operation' => 'reboot',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    
                    break;
                case 'shutdown':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'operation' => 'shutdown',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    break;
                case 'install':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $packages = explode(' ', $data['packages']);
                        $clean_packages = array();
                        foreach ($packages as $p) {
                            array_push($clean_packages, '"'.$p.'"');
                        }
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'args' => $clean_packages,
                            'operation' => 'install',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    break;
                case 'remove':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $packages = explode(' ', $data['packages']);
                        $clean_packages = array();
                        foreach ($packages as $p) {
                            array_push($clean_packages, '"'.$p.'"');
                        }
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'args' => $clean_packages,
                            'operation' => 'remove',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    break;
                case 'upgrade':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'operation' => 'upgrade',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    break;
                case 'dist_upgrade':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'operation' => 'dist_upgrade',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
                    }
                    break;
                case 'update_info':
                    foreach ($mac_list as $m) {
                        $host = $this->hosts_model->deepDive(array('macaddress' => $m),
                            array('hostname'));
                        $to_queue[] = array(
                            'hostname' => $host['hostname'],
                            'macaddress' => $m,
                            'operation' => 'update_info',
                            'time' => date('Y-m-d H:i:s'),
                            'successful' => 0
                        );
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
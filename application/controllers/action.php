<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends MY_Controller {

    public function enqueue() {
        if($this->is_logged_in()) {
            $data = $this->input->post();
            $host_list = explode(",", $data['selection_list']);
            $task = $data['task'];
            $this->load->model('task_model');
            $this->load->model('hosts_model');

            $hostname_query = array(
                'ipaddress' => array('$in' => $host_list)
            );
            
            $affected_hosts = $this->hosts_model->getHosts($hostname_query, array('hostname'));
            
            switch ($task) {
                case 'reboot':
                    $to_queue = array(
                        'host_list' => $host_list,
                        'operation' => 'reboot',
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
                    );
                    break;
                case 'shutdown':
                    $to_queue = array(
                        'host_list' => $host_list,
                        'operation' => 'shutdown',
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
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
                        'args' => $clean_packages,
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
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
                        'args' => $clean_packages,
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
                    );
                    break;
                case 'upgrade':
                    $to_queue = array(
                        'host_list' => $host_list,
                        'operation' => 'upgrade',
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
                    );
                    break;
                case 'dist-upgrade':
                    $to_queue = array(
                        'host_list' => $host_list,
                        'operation' => 'dist-upgrade',
                        'hostnames' => $affected_hosts,
                        'time' => date('Y-m-d H:i:s')
                    );
                    break;
            }

            return $this->task_model->addTask($to_queue) && $this->task_model->addLog($to_queue);
        } else {
            redirect('login');
        }
    }

}

/* End of file action.php */
/* Location: ./application/controllers/action.php */
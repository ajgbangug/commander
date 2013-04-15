<div class="row">
    <div class="span12 offset2">
        <?php
            $this->load->view('pages/operations/'.$page);
            $this->load->view('pages/operations/host_list', array('host_list' => $host_list));
        ?>
    </div>
</div>
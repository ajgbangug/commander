<div class="row">
    <div class="span12 offset2">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Host List</a></li>
                <li><a href="#tab2" data-toggle="tab">Install/Remove</a></li>
                <li><a href="#tab3" data-toggle="tab">Upgrade</a></li>
                <li><a href="#tab4" data-toggle="tab">Shutdown/Reboot</a></li>
                <li><a href="#tab5" data-toggle="tab">Reporting</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?php $this->load->view('pages/hosts/host_list',
                        array('host_list' => $host_list)); ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <?php $this->load->view('pages/hosts/install_or_remove'); ?>
                </div>
                <div class="tab-pane" id="tab3">
                    <?php $this->load->view('pages/hosts/upgrade'); ?>
                </div>
                <div class="tab-pane" id="tab4">
                    <?php $this->load->view('pages/hosts/shutdown_or_reboot'); ?>
                </div>
                <div class="tab-pane" id="tab5">
                    <?php $this->load->view('pages/hosts/reporting'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="span12 offset2">
        <div class="page-header">
            <h3>Control Panel</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="span7 offset2">
        <table class="table table-hover" id="host_list">
            <caption><h4>Available Hosts</h4></caption>
            <thead>
                <tr>
                    <th>Hostname</th>
                    <th>Operating System</th>
                    <th>Version</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($host_list as $h) {
                ?>
                    <tr>
                        <td><?php echo $h['hostname']; ?></td>
                        <td><?php echo $h['operatingsystem']; ?></td>
                        <td><?php echo $h['lsbdistrelease']; ?></td>
                        <td class="status_indicator" id="<?php echo $h['macaddress']; ?>"></td>
                        <td>
                            <a href="<?php echo site_url("profile/view")."/".$h['hostname'];?>"
                                role="button" class="view_button btn btn-small btn-info">View</a>
                            <button value="<?php echo $h['ipaddress'];?>" type="button" class="btn btn-small select_button" data-toggle="button">Select</button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="span5">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Install/Remove</a></li>
                <li><a href="#tab2" data-toggle="tab">Upgrade</a></li>
                <li><a href="#tab3" data-toggle="tab">Shutdown/Reboot</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?php echo form_open('action/enqueue'); ?>
                        <input type="hidden" name="selection_list" class="selection_list"/>
                        <p><?php echo form_radio('task', 'install');?> Install software</p>
                        <p><?php echo form_radio('task', 'remove');?> Remove software</p>
                        <p>Packages to install (separated by spaces):</p>
                        <p>
                            <?php
                                echo form_textarea(array(
                                    'name' => 'packages',
                                    'rows' => 3
                                ));
                            ?>
                        </p>
                        <p>
                            <?php
                                echo form_submit(array(
                                    'class' => 'action_button btn btn-primary',
                                    'value' => 'Queue task'
                                ));
                            ?>
                        </p>
                    <?php echo form_close(); ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <?php echo form_open('action/enqueue'); ?>
                    <input type="hidden" name="selection_list" class="selection_list"/>
                    <p><?php echo form_radio('task', 'upgrade');?> Upgrade all packages</p>
                    <p><?php echo form_radio('task', 'dist-upgrade');?> Upgrade Distribution</p>
                    <p>
                        <?php
                            echo form_submit(array(
                                'class' => 'action_button btn btn-primary',
                                'value' => 'Queue task'
                            ));
                        ?>
                    </p>
                <?php echo form_close(); ?>
                </div>
                <div class="tab-pane" id="tab3">
                    <?php echo form_open('action/enqueue'); ?>
                    <input type="hidden" name="selection_list" class="selection_list"/>
                    <p><?php echo form_radio('task', 'reboot');?> Reboot Computer</p>
                    <p><?php echo form_radio('task', 'shutdown');?> Shutdown Computer</p>
                    <p>
                        <?php
                            echo form_submit(array(
                                'class' => 'action_button btn btn-primary',
                                'value' => 'Queue task'
                            ));
                        ?>
                    </p>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url('assets/js/hosts.js'); ?>"></script>
<button type="button" id="select_all" class="btn" data-toggle="button">Select All</button>
<table class="table table-hover" id="host_list">
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
            <tr id="<?php echo $h['macaddress']; ?>" class="list_entry">
                <td><?php echo $h['hostname']; ?></td>
                <td><?php echo $h['operatingsystem']; ?></td>
                <td><?php echo $h['lsbdistrelease']; ?></td>
                <td class="status_indicator"></td>
                <td>
                    <?php echo form_open('hosts/profile', '', array('macaddress' => $h['macaddress'])); ?>
                        <?php
                            echo form_submit(array(
                                'class' => 'view_button btn btn-small btn-info',
                                'value' => 'View'
                            ));
                        ?>
                        <button value="<?php echo $h['macaddress'];?>" type="button" class="btn btn-small select_button" data-toggle="button">Select</button>
                    <?php echo form_close(); ?>
                </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
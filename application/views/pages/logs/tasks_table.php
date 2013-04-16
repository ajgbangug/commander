<div class="row">
    <div class="span12 offset2">
        <table id="log_table" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Operation</th>
                    <th>Hosts</th>
                    <th>By</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($log_list as $l) {
                ?>
                    <tr id="<?php echo $l['_id'];?>" class="success status_indicator">
                        <td>
                            <?php echo $l['time']; ?>
                        </td>
                        <td>
                            <?php
                                echo $l['operation'];
                                if($l['operation'] == 'install' ||
                                   $l['operation'] == 'remove')
                                {
                                    echo '<ul>';
                                    foreach ($l['args'] as $a) {
                                        echo '<li>'.$a.'</li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </td>
                        <td>
                            <ul>
                            <?php
                                echo $l['hostname'];
                            ?>
                            </ul>
                        </td>
                        <td>
                            <?php echo $l['by']; ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php echo form_open('logs/clear', array('id' => 'clear_logs',
            'class' => 'pull-right')); ?>
            <input type="submit" class="btn btn-primary" value="Clear" />
        <?php echo form_close(); ?>
    </div>
</div>
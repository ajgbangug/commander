<div class="row">
    <div class="span12 offset2">
        <?php
            echo form_open('home/clear');
        ?>
            <input type="submit" class="btn btn-primary" value="Clear Tasks" />
        <?php
            echo form_close();
        ?>
        <table id="log_table" class="table table-hover table-condensed">
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
    </div>
</div>
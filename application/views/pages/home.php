<div class="row">
    <div class="span12 offset2">
        <div class="page-header">
            <h3>Dashboard</h3>
        </div>
        <h5>
            Welcome <code><?php echo $_SESSION['username']; ?></code>!
        </h5>
        <h5>
            Displayed below are the tasks that have been executed by the system including the hosts
            which were affected and the timestamp of the task.
        </h5>
    </div>
</div>
<div class="row">
    <div class="span12 offset2">
        <table id="log_table" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Operation</th>
                    <th>Hosts</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($log_list as $l) {
                ?>
                    <tr class="success">
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
                                foreach ($l['hostnames'] as $h) {
                                    echo '<li>'.$h['hostname'].'</li>';
                                }
                            ?>
                            </ul>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url('assets/js/home.js'); ?>"></script>
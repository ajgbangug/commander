<div class="row">
    <div class="span12 offset2">
        <div class="page-header">
            <h3>Dashboard</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="span7 offset2">
    </div>
    <div class="span5">
        <table id="log_table" class="table table-hover table-condensed">
            <caption><h4>Logs</h4></caption>
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
                    <tr>
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
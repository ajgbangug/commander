<!--<?php print_r($profile); ?> -->
<div class="row">
    <div class="span12 offset2">
        <div class="page-header">
            <h3><?php echo $profile['hostname']; ?></h3>
        </div>
        <h5>Below are some of the system specifications
         of <code><?php echo $profile['hostname']; ?></code>.</h5>
    </div>
</div>
<div class="row">
    <div class="span12 offset2">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $attr = array(
                    'architecture',
                    'ipaddress',
                    'kernel',
                    'kernelmajversion',
                    'kernelrelease',
                    'lsbdistdescription',
                    'macaddress',
                    'osfamily',
                    'uptime',
                );

                foreach ($attr as $a) {
            ?>
                <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $profile[$a]; ?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="span12 offset2">
        <div class="accordion" id="package_accordion">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse"
                        data-parent="#package_accordion" href="#packageCollapse">
                        Installed Packages (<?php echo count($profile['packages']);?>)
                    </a>
                </div>
                <div id="packageCollapse" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php
                            foreach ($profile['packages'] as $p) {
                        ?>
                            <li><?php echo $p; ?></li>
                        <?php
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<?php
    foreach ($profile['packages'] as $p) {
?>
    <li><?php echo $p; ?></li>
<?php
    }
?>
</ul>
-->
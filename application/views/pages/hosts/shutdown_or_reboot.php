<?php echo form_open('action/enqueue', array('class' => 'operation')); ?>
    <input type="hidden" name="selection_list" class="selection_list"/>
    <p><?php echo form_radio('task', 'reboot');?> Reboot computer</p>
    <p><?php echo form_radio('task', 'shutdown');?> Shutdown computer</p>
    <p>
        <?php
            echo form_submit(array(
                'class' => 'action_button btn btn-primary',
                'value' => 'Queue task'
            ));
        ?>
    </p>
<?php echo form_close(); ?>
<?php echo form_open('action/enqueue', array('class' => 'operation')); ?>
    <input type="hidden" name="selection_list" class="selection_list"/>
    <input type="hidden" name="task" class="task"/>
    <div class="input-prepend input-append">
        <button type="button" id="select_all" class="btn" data-toggle="button">Select All</button>
        <div class="btn-group" data-toggle="buttons-radio">
            <button class="btn task_choice" type="button" value="update">Update Repos</button>
            <button class="btn task_choice" type="button" value="upgrade">Upgrade</button>
            <button class="btn task_choice" type="button" value="dist-upgrade">Dist-Upgrade</button>
        </div>
        <button type="submit" class="action_button btn btn-primary">Queue task</button>
    </div>
<?php echo form_close(); ?>
<h5>Create a new login account to access the system.</h5>
<?php echo form_open('config/add_account', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="new_account_username">Username</label>
            <div class="controls">
                <input type="text" id="new_account_username" name="new_account_username"
                    value="<?php echo set_value('new_account_username'); ?>" />
            </div>
            <div class="controls">
                <?php echo form_error('new_account_username'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="new_account_password">Password</label>
            <div class="controls">
                <input type="password" id="new_account_password" name="new_account_password"
                    value="<?php echo set_value('new_account_password'); ?>" />
            </div>
            <div class="controls">
                <?php echo form_error('new_account_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="new_account_conf_password" >Confirm Password</label>
            <div class="controls">
                <input type="password" id="new_account_conf_password" name="new_account_conf_password"
                    value="<?php echo set_value('new_account_conf_password'); ?>" />
            </div>
            <div class="controls">
                <?php echo form_error('new_account_conf_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Create</button>
            </div>
        </div>
    </fieldset>
<?php echo form_close(); ?>
<p>This is your account. After editing your account, you will be logged out.</p>
<?php echo form_open('config/change_account', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <span class="uneditable-input" id="username"><?php echo $_SESSION['username']; ?></span>
            </div>
            <div class="controls">
                <?php echo form_error('username'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="old_password">Old Password</label>
            <div class="controls">
                <input type="password" id="old_password" name="old_password"
                    value="<?php echo set_value('old_password'); ?>">
            </div>
            <div class="controls">
                <?php echo form_error('old_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="new_password">New Password</label>
            <div class="controls">
                <input type="password" id="new_password" name="new_password"
                    value="<?php echo set_value('new_password'); ?>">
            </div>
            <div class="controls">
                <?php echo form_error('new_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="new_conf_password" >Confirm New Password</label>
            <div class="controls">
                <input type="password" id="new_conf_password" name="new_conf_password"
                    value="<?php echo set_value('new_conf_password'); ?>">
            </div>
            <div class="controls">
                <?php echo form_error('new_conf_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Save</button>
            </div>
        </div>
    </fieldset>
<?php echo form_close(); ?>
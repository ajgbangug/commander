<h5>
    This is your account. After editing your account, you will be logged out.
</h5>
<?php echo form_open('config/change_account', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" value="<?php echo $account['username']; ?>">
            </div>
            <div class="controls">
                <?php echo form_error('username'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" value="<?php echo $account['password']; ?>">
            </div>
            <div class="controls">
                <?php echo form_error('password'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="conf_password" >Confirm Password</label>
            <div class="controls">
                <input type="password" id="conf_password" name="conf_password" value="<?php echo $account['password']; ?>">
            </div>
            <div class="controls">
                <?php echo form_error('password'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Save</button>
            </div>
        </div>
    </fieldset>
<?php echo form_close(); ?>
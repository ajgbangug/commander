<div class="row">
    <div class="span12 offset1">
        <div class="page-header">
            <h3>Account Details</h3>
        </div>
        <h5>This is the account that you will use to login to the system.</h5>
    </div>
</div>
<div class="row">
    <div class="span12 offset1">
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
        </form>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="row">
    <div class="span12 offset1">
        <div class="page-header">
            <h3>Database Server Details</h3>
        </div>
        <h5>You can edit the database server details in <code>application/config/mongodb.php</code>.</h5>
    </div>
</div>
<div class="row">
    <div class="span12 offset1">
        <table class="table table-hover">
            <thead>
                <th>Attribute</th>
                <th>Value</th>
            </thead>
            <tbody>
                <tr>
                    <td>Host</td>
                    <td><?php echo $dbhost; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $dbname; ?></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><?php echo $username; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
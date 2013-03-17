<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Commander - <?php echo $title;?></title>
        <script src="<?php echo base_url("assets/jquery.min.js"); ?>"></script>
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="span12 offset2">
                <div class="page-header">
                    <h2>Commander</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span5 offset5">
                <?php 
                    echo form_open('login/process', array('class' => 'form-horizontal'));
                ?>
                    <fieldset>
                        <legend>Login</legend>
                        <div class="control-group">
                            <label class="control-label" for="username">Username</label>
                            <div class="controls">
                                <input type="text" id="username" name="username"
                                    placeholder="Username" value="<?php echo set_value('username'); ?>">
                            </div>
                            <div class="controls">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                          <div class="control-group">
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password"
                                    placeholder="Password" value="<?php echo set_value('password'); ?>">
                            </div>
                            <div class="controls">
                                <?php echo form_error('password'); ?>
                            </div>
                          </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Sign in</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php echo form_close(); ?>
            </div>
        </div>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    </body>
</html>
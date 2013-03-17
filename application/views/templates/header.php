<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Commander - <?php echo $title;?></title>
        <script src="<?php echo base_url("assets/jquery.min.js"); ?>"></script>
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="brand" href="#">Commander</a>
                        <ul class="nav">
                            <li><a href="<?php echo site_url("home");?>">Home</a></li>
                            <li><a href="<?php echo site_url("hosts");?>">Hosts</a></li>
                            <li><a href="<?php echo site_url("config");?>">Config</a></li>
                            <li><a href="<?php echo site_url("login/logout");?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
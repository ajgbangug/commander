<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Commander - <?php echo $title;?></title>
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
        <script src="<?php echo base_url("assets/jquery.min.js"); ?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-inner">
                    <div class="container">
                        <span class="brand" href="#">Commander</span>
                        <ul class="nav">
                            <li><a href="<?php echo site_url("home");?>">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="operation" role="button"
                                    data-target="#" data-toggle="dropdown">
                                    Operations <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="operation">
                                    <li><a href="<?php echo site_url("operations/do/install_or_remove"); ?>">
                                        Install/Remove</a></li>
                                    <li><a href="<?php echo site_url("operations/do/shutdown_or_reboot"); ?>">
                                        Shutdown/Reboot</a></li>
                                    <li><a href="<?php echo site_url("operations/do/upgrade"); ?>">
                                        Package/Distribution Upgrades</a></li>
                                    <li><a href="<?php echo site_url("operations/do/monitoring"); ?>">
                                        Monitoring</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url("config");?>">Config</a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li><a>Welcome <?php echo $_SESSION['username']; ?>!</a></li>
                            <li><a href="<?php echo site_url("login/logout");?>"
                                class="pull-right">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
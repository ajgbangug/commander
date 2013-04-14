<div class="row">
    <div class="span12 offset2">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Account Details</a></li>
                <li><a href="#tab2" data-toggle="tab">New Account</a></li>
                <li><a href="#tab3" data-toggle="tab">Database Server Details</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?php
                        $this->load->view('pages/config/account_details', array('account' => $account));
                    ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <?php
                        $this->load->view('pages/config/new_account');
                    ?>
                </div>
                <div class="tab-pane" id="tab3">
                    <?php
                        $this->load->view('pages/config/db_server_details', 
                            array(
                                'dbname' => $dbname,
                                'dbhost' => $dbhost,
                                'dbusername' => $dbusername
                            )
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
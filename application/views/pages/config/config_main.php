<div class="row">
    <div class="span12 offset2">
        <div class="tabbable">
            <ul class="nav nav-pills">
                <li class="active"><a href="#tab1" data-toggle="tab">Account Details</a></li>
                <li><a href="#tab2" data-toggle="tab">New Account</a></li>
                <li><a href="#tab3" data-toggle="tab">Delete Account</a></li>
                <li><a href="#tab4" data-toggle="tab">Database Server Details</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?php
                        $this->load->view('pages/config/account_details');
                    ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <?php
                        $this->load->view('pages/config/new_account');
                    ?>
                </div>
                <div class="tab-pane" id="tab3">
                    <?php
                        $this->load->view('pages/config/delete_account',
                            array('user_list' => $user_list));
                    ?>
                </div>
                <div class="tab-pane" id="tab4">
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
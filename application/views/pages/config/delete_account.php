<p><button type="button" id="select_all" class="btn" data-toggle="button">Select All</button></p>
<table class="table table-hover table-bordered" id="host_list">
    <thead>
        <tr>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($user_list as $u) {
        ?>
            <tr class="list_entry">
                <td><?php echo $u['username']; ?></td>
                <td>
                    <button value="<?php echo $u['username'];?>" type="button" 
                        class="btn btn-small select_button" data-toggle="button">Select</button>
                </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php echo form_open('config/delete_account', array('class' => 'operation')); ?>
    <input type="hidden" name="selection_list" class="selection_list"/>
    <button type="submit" class="delete_button btn btn-primary">Delete</button>
<?php echo form_close(); ?>
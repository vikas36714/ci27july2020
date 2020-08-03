<div class="row justify-content-center">
    <div class="col-6">        
    <h1><?= $title; ?></h1>
    <?php if( $message = $this->session->userdata('message')) { ?>
        <div class="alert alert-danger"><?php echo $message; ?></div>
    <?php } ?>
        <?php echo form_open('users/changePassword', array('id' => 'changepassword', 'name'=>'changepassword')); ?>
            <div class="form-group">
                <input type="password" name="oldPassword" id="oldPassword" class="form-control" placeholder="Old Password" />
                <?php echo form_error('oldPassword', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New Password" />
                <?php echo form_error('newPassword', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password" />
                <?php echo form_error('confirmPassword', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">Change Password</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
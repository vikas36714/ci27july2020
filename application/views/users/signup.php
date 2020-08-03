<div class="row justify-content-center">
    <div class="col-6">
        
    <h1><?= $title; ?></h1>
        <?php echo form_open('users/signup', array('id' => 'signup_form', 'name'=>'signup_form', 'class'=>'signup-form')); ?>
            <div class="form-group">
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" />
                <?php echo form_error('first_name', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" />
                <?php echo form_error('last_name', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
                <?php echo form_error('email', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <?php echo form_error('password', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" />
                <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-danger" value="Signup"/>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
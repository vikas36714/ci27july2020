<div class="row justify-content-center">
    <div class="col-6">        
    <h1><?= $title; ?></h1>
    <?php if( $message = $this->session->userdata('message')) { ?>
        <div class="alert alert-danger"><?php echo $message; ?></div>
    <?php } ?>
        <?php echo form_open('users/login', array('id' => 'login_form', 'name'=>'login_form', 'class'=>'login-form')); ?>
            <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
                <?php echo form_error('email', '<div class="text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <?php echo form_error('password', '<div class="text-danger">', '</div>') ?>
            </div><div class="form-group">
                <input type="submit" name="submit" class="btn btn-danger" value="Login"/>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
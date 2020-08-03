<div class="row justify-content-center">
    <div class="col-6">        
    <h1><?= $title; ?></h1>
    <?php if( $message = $this->session->userdata('message')) { ?>
        <div class="alert alert-danger"><?php echo $message; ?></div>
    <?php } ?>
        <?php echo form_open_multipart('users/upload', array('id' => 'uploadform')); ?>
            <div class="form-group">
                <input type="file" name="userfile" class="form-control" />
                <?php echo $error; ?>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Upload"/>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
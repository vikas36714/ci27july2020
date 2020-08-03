<h1><?php echo $title ?></h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div id="message" class="text-danger"></div>
        <?php echo form_open('pages/contactSubmit', array('id' => 'contactForm')); ?>
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" />
            </div>
            <div class="form-group">
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Message" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
  
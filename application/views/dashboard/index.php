<h1><?= $title; ?></h1>
<hr/>
<h4>User Profile</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

<h4>Welcome to User Dashboard</h4>
<div class="row">
    <div class="col-md-9">
        <div class="usr-profile">
            <table class="table table-borderd">
                <tr>
                    <td><strong>Firstname</strong></td>
                    <td><?= $user->first_name ?></td>
                </tr>
                <tr>
                    <td><strong>Lastname</strong></td>
                    <td><?= $user->last_name ?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td><?= $user->email ?></td>
                </tr>
                <tr>
                    <td><strong>Created_at</strong></td>
                    <td><?= $user->created_at ?></td>
                </tr>
            </table>
        </div>
        <div class="userlinks">
            <?php echo anchor('users/edit', 'Edit Profie'); ?><br/>
            <?php echo anchor('users/changePassword', 'Change Password'); ?><br/>
            <?php echo anchor('users/logout', 'Logout'); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="usr-pic">
            <?php if($user->profile_photo) { ?>
                <img src="<?php echo base_url('uploads/'.$user->profile_photo); ?>" class="img-thumbnail" alt="user image"/>
            <?php } else{ ?>
                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-thumbnail" alt="user image"/>
                <?php } ?>
        </div>
        <br/>
        <a href="<?php echo site_url('users/upload') ?>" class="btn btn-success btn-block">Upload Image</a>
    </div>
</div>
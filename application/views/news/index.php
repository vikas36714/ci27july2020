<h1>Welcome</h1>
<h2><?php echo $title ?></h2>
<!-- <h2><?php print_r($users) ?></h2> -->
<!-- <h2><?php echo base_url() ?></h2>
<h2><?php echo anchor('users/s', 'test'); ?></h2>
<?php 
    echo '<pre>'; 
    print_r($allnews);
?> -->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <?php echo $this->session->flashdata('message'); ?>
        <table border='1'>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Acctive</th>
            <th>Actions</th>
        <tbody>
            <?php if( !empty($allnews)) { ?>
                <?php foreach( $allnews as $news) { ?>
                <tr>
                    <td><?php echo $news->id ?></td>
                    <td><?php echo $news->title ?></td>
                    <td><?php echo $news->description ?></td>
                    <td><?php echo $news->active ?></td>
                    <td><?php echo $news->created_at ?></td>
                    <td>
                        <?php echo anchor('news/edit/'. $news->id, 'Edit') ?> &nbsp;&nbsp;
                        <?php echo anchor('news/delete/'. $news->id, 'Delete') ?>
                        <?php echo anchor('news/details/'. $news->id, 'View') ?>
                    </td>
                </tr>
            <?php } } else { ?>
                <h2>Record not found</h2>
            <?php } ?>
        </tbody>
        </table>
        
        <script src="" async defer></script>
    </body>
</html>
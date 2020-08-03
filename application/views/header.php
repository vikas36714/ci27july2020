<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('assets/mdb/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/mdb/css/mdb.min.css'); ?>" />
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>   
     <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbgcolor">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Learning Codeigniter</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <?php echo anchor('pages/view/about', 'About', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('pages/view/services', 'Services', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('pages/view/contact', 'contact', ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('products', 'Product', ['class' => 'nav-link']) ?>
                        </li>
                    </ul>
                    <ul class="navbar-nav right">
                        <?php if ($this->session->userdata('authenticated')) { ?>
                            <li class="nav-item">
                            <?php echo anchor('dashboard', 'My Profile', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?php echo anchor('users/logout', 'Logout', ['class' => 'nav-link']) ?>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                            <?php echo anchor('users/signup', 'Signup', ['class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?php echo anchor('users/login', 'Login', ['class' => 'nav-link']) ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
     </header>
    <!-- <div class="jumbotron text-center" style="margin-top: 57px; background-color:transparent !important">
        <h1>Codeigniter Learning</h1>
        <p>Developed site!</p>
    </div> -->
    <!-- Container Opening  div -->
    <div class="container" style="margin-top:100px">

<!DOCTYPE html>
<html>
<head>

    <title>{judul_halaman}</title>
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/back/img/favicon.png') ?>">

    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <?php if (current_url() != base_url().'index.php/konsultasi/singlekonsultasi/'.$this->uri->segment(3)): ?>
        <link rel="stylesheet" href="<?= base_url('assetsnew/css/bootstrap.min.css') ?>"/>
    <?php endif ?>
    
    <link href="<?= base_url('assetsnew/css/keyframes.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/materialize.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/swiper.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/swipebox.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/stylenew.css') ?>" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="<?= base_url('assetsnew/js/preview.js') ?>"></script>
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url('assetsnew/css/sweetalert.css');?>">
    <script>
     var base_url = "<?php echo base_url();?>" ;
 </script> 
</head>
<body>
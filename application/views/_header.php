<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <title>What Era?</title>
</head>
<body class="background">
<div class="menu">
    <div class="left-menu"><h2>ph</h2></div>
    <div class="right-menu">
    <?php if($this->session->userdata('username')): ?>
    <?php echo anchor(base_url('products'), 'Termékek'); ?>
    <?php echo anchor(base_url('user/view_cart'), 'Kosaram'); ?>
    <?php echo anchor(base_url('user/logout'), 'Kijelentkezés'); ?>
    
    <?php elseif($this->session->userdata('admin')): ?>
    <?php echo anchor(base_url('products'), 'Termékek'); ?>
    <?php echo anchor(base_url('admin/listofusers'), 'Felhasználók'); ?>
    <?php echo anchor(base_url('user/logout'), 'Kijelentkezés'); ?>
    <?php else:?>
    <?php echo anchor(base_url('user/register'), 'Regisztráció'); ?>
    <?php echo anchor(base_url('user/login'), 'Bejelentkezés'); ?>
    <?php endif; ?>
    </div>
</div>
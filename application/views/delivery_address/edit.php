<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <title>Products</title>
</head>
<body class="userbground">
<div class="user2">
<div class="list">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>

<?php echo form_label('Város neve:','cts_name'); ?>
<?php echo form_input('name',set_value('name',$cts->name),[ 'id' => 'cts_name',]); ?>
<?php echo form_error('name');?>
<br/>

<?php echo form_label('Irányítószám:','cts_postal_code'); ?>
<?php echo form_input('postal_code',set_value('postal_code',$cts->postal_code)); ?>
<?php echo form_error('postal_code'); ?>

<?php echo form_submit('submit','Küldés'); ?>
<?php echo form_close(); ?>
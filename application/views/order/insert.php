
<div class="list">
<?php echo form_open(); ?>

<?php echo form_label('Város neve:'); ?>
<br/>
<?php echo form_input('city',set_value('city','')); ?>
<?php echo form_error('city');?>
<br/><br/>
<?php echo form_label('Irányítószám:'); ?>
<br/>
<?php echo form_input('postal_code',set_value('postal_code','')); ?>
<?php echo form_error('postal_code'); ?>
<br/><br/>
<?php echo form_label('Utca, házszám:'); ?>
<br/>
<?php echo form_input('address',set_value('address','')); ?>
<?php echo form_error('address'); ?>
<br/><br/>
<?php echo form_label('Telefonszám:'); ?>
<br/>
<?php echo form_input('phone_number',set_value('phone_number','')); ?>
<?php echo form_error('phone_number'); ?>
<br/><br/>
<?php echo form_label('Vezetéknév Keresztnév:'); ?>
<br/>
<?php echo form_input('name',set_value('name','')); ?>
<?php echo form_error('name'); ?>
<br/>
<br/>
<?php echo form_submit('submit','Küldés'); ?>
<?php echo form_close(); ?>
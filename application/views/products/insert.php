<?php if($this->session->userdata('admin')): ?>
<div class="list">
<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?> <br/>
<?php endif; ?>
<?php echo form_open_multipart();  ?>

<?php echo form_label('Termék neve:','prod_name'); ?> <br/>
<?php echo form_input('name',set_value('name',''),[ 'id' => 'prod_name']); ?>
<br/> <br/>
<?php echo form_label('Leírás:','prod_desc'); ?> <br/>
<?php echo form_input('description',set_value('description','')); ?>
<br/> <br/>
<?php echo form_label('Ár:','prod_price'); ?> <br/>
<?php echo form_input('price',set_value('price','')); ?>
<br/> <br/>
<?php echo form_label('Termék kód:','prod_code'); ?> <br/>
<?php echo form_input('product_code',set_value('product_code','')); ?>
<br/>
<br/>
<?php 
    echo form_upload('file');
?>
 <br/> <br/>
<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>
<?php endif; ?>
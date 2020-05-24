
<div class="list">
<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?>
<?php endif; ?>
<?php echo form_open_multipart();  ?>

<?php echo form_label('Termék neve:','prod_name'); ?>
<?php echo form_input('name',set_value('name',''),[ 'id' => 'prod_name']); ?>
<br/>
<?php echo form_input('description',set_value('description',''), ['placeholder' => 'Leírás']); ?>
<br/>
<?php echo form_input('price',set_value('price',''),['placeholder' => 'Ár']); ?>
<br/>
<?php echo form_input('product_code',set_value('product_code',''),['placeholder' => 'Termék kód']); ?>
<br/>

<?php 
    echo form_upload('file');
?>

<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<?php $this->load->helper('url');?>
<img src="<?php echo base_url()?>uploads/img/products/<?php echo $prod->id ?>">
<br/>
<?php //echo form_label('Dolgozó neve:','prod_name'); ?>
<?php echo form_input('name',set_value('name',$prod->name),[ 'id' => 'prod_name']); ?>
<br/>
<?php echo form_input('description',set_value('description',$prod->description), ['placeholder' => 'Leírás']); ?>
<br/>
<?php echo form_input('price',set_value('price',$prod->price),['placeholder' => 'ár']); ?>
<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>
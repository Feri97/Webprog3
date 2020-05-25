<?php if($this->session->userdata('admin')): ?>
<div class="list">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<?php $this->load->helper('url');?>
<img src="<?php echo base_url()?><?php echo $prod->img?>">
<br/><br/>
<?php echo form_input('name',set_value('name',$prod->name),[ 'id' => 'prod_name']); ?>
<br/><br/>
<?php echo form_input('description',set_value('description',$prod->description), ['placeholder' => 'Leírás']); ?>
<br/><br/>
<?php echo form_input('price',set_value('price',$prod->price),['placeholder' => 'ár']); ?>
<br/><br/>
<?php echo form_submit('submit','Beküld'); ?>
<?php echo form_close(); ?>
<?php endif; ?>
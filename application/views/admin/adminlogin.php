
<?php echo validation_errors(); ?>
<?php if(isset($error)):?>
    <?php echo $error; ?>
<?php endif; ?>
<?php echo form_open(); ?>
<br/>
<?php $this->load->helper('url');  ?>
<br/>
<?php echo form_label('Adminisztrátor név:','username'); ?> <br/>
<?php echo form_input('username',set_value('username',''),[ 'id' => 'username',
                                  /*'required' => 'required'*/]); ?>
<?php echo form_error('username');?>
<br/>
<br/>
<?php echo form_label('Jelszó:','password'); ?> <br/>
<?php echo form_password('password',set_value('password',''),[]); ?>
<?php echo form_error('password'); ?>
<br/>
<br/>


<?php echo form_submit('submit','Belépés'); ?>
<br/>



<?php echo form_close(); ?>
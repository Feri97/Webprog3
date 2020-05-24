
<div class="list">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<br/>

<br/>
<br/>

<?php echo form_label('Felhasználó név:','username'); ?> <br/>
<?php echo form_input('username',set_value('username',''), [ /*'required' => 'requried',*/ 
                                  ]); ?>
<br/>
<?php echo form_error('username'); ?>
<br/>
<?php echo form_label('Jelszó:','password'); ?> <br/>
<?php echo form_password('password',set_value('password',''),[ /*'required' => 'required',*/
                                ]); ?>
<br/>
<?php echo form_error('password'); ?>
<br/>
<?php echo form_label('Email cím:','email'); ?> <br/>
<?php echo form_input('email',set_value('email',''),[ 'id' => 'email']);?>
<br/>
<?php echo form_error('email');?>
<br/>
<?php echo form_submit('submit','Mentés'); ?>
<br/>

<?php echo form_close(); ?>
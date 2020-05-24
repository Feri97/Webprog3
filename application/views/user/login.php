
<div class="list">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<br/>

<br/>
<br/>

<?php echo form_label('Felhasználó név:','username'); ?> <br/>
<?php echo form_input('username',set_value('username',''), [ /*'required' => 'requried',*/ 
                                  ]); ?>
<?php echo form_error('username'); ?>
<br/>
<br/>
<?php echo form_label('Jelszó:','password'); ?> <br/>
<?php echo form_password('password',set_value('password',''),[ /*'required' => 'required',*/
                                ]); ?>
<?php echo form_error('password'); ?>
<br/>
<div class="button">
<br/>
<?php echo form_submit('submit','Belépés'); ?>
</div>
<br/>

<?php echo form_close(); ?>
<?php echo $error; ?>
<?php 
    // amennyiben fájl feltöltése is fog szerepelni az 
    // űrlapon, akkor kötelezően multipart-os lesz 
    echo form_open_multipart(); 
?>
    <?php 
        // <input type="file" name="1. paraméter értéke lesz"/>
        echo form_upload('file');
    ?>

    <?php echo form_submit('submit', 'Mentés'); ?>
<?php echo form_close(); ?>
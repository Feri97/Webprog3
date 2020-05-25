<?php if($this->session->userdata('admin')): ?>
<div class="list">
        <?php
            echo "Itt lehetősége van egy user felvételére. Csak az adatokat kell elhelyezni, a ". base_url('uploads/users.txt') . '-ben. <br>';
            echo "Az adatok a fájlban sorrendben usernév, jelszó, e-mail pontosveszővel elválasztva. <br>"
        ?>

        <?php echo anchor(base_url('fileread/read_file/'),'User felvétele');?>
       
<?php endif; ?> 


    
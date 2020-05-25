
<div class="product">
<h1><?php echo $prod->name ?></h1>
<br/>
<br/>
<img src="<?php echo base_url()?><?php echo $prod->img?>">

    <table>
        <thead>
            <tr>
                <th colspan="2">Adatok</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>Termék név:</td>
                <td><?=$prod->name?></td>
            </tr>
            <tr>
                <td>Ár:</td>
                <td><?=$prod->price?></td>
            </tr>
            <tr>
                <td>Leírás:</td>
                <td><?=$prod->description?></td>
            </tr>
        </tbody>
    </table>

    <?php if($this->session->userdata('username')): ?>
    <?php echo anchor(base_url('user/add_to_cart/'.$prod->id),'Kosárba');?>
    <?php endif; ?>
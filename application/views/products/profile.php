
<div class="list">
<?php echo form_open(); ?>
<h1><?php echo $prod->name ?></h1>
<br/>
<br/>
<img src="<?php echo base_url()?><?php echo $prod->img?>">

    <table>
        <thead>
            <tr>
                <th>Információ</th>
                <th>Adat</th>
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

    
    <?php echo anchor(base_url('user/add_to_cart/'.$prod->id),'Kosárba');?>
<?php echo form_open(); ?>
<h1><?php echo $prod->name.form_label(' termék adatlapja'); ?></h1>
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
            <tr>
                <td>Fájlnév:</td>
                <td><?=$prod->id?></td>
            </tr>
        </tbody>
    </table>
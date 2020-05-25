<?php if($this->session->userdata('admin')): ?>
    <div class="adminlist">
<?php echo anchor(base_url('products/insert'),'Új termék hozzáadása'); ?>
<br/><br/>
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Terméknév</th>
                <th>Ár</th>
                <th>Leírás</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?php echo anchor(base_url('products/profile/'.$prod->id), $prod->name);?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->description?></td>
                <td>
                    <?php echo anchor(base_url('products/edit/'.$prod->id),'Módosítás');?>
                    <?php echo anchor(base_url('products/delete/'.$prod->id),'Törlés');?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
<?php endif; ?>

<?php endif; ?>
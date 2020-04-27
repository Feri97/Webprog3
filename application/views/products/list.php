<?php echo anchor(base_url('products/insert'),'Új termék hozzáadása'); ?>
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>price</th>
                <th>description</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><a href="<?php echo base_url()?>uploads/img/products/<?php echo $prod->id?>" target="_blank"><?=$prod->name?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->description?></td>
                <td>
                    <?php echo anchor(base_url('products/edit/'.$prod->id),'Módosítás');?>
                    <?php echo anchor(base_url('products/delete/'.$prod->id),'Törlés');?>
                    <?php echo anchor(base_url('products/profile/'.$prod->price),'Profil');?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


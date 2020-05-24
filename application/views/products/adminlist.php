
    <div class="list">
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th style="color: cadetblue;">Name</th>
                <th style="color: cadetblue;">price</th>
                <th style="color: cadetblue;">description</th>
                <th style="color: cadetblue;">Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?php echo anchor(base_url('products/profile/'.$prod->id), $prod->name);?></td>
                <td style="color: cadetblue;"><?=$prod->price?></td>
                <td style="color: cadetblue;"><?=$prod->description?></td>
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

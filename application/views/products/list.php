
<div class="list">
<?php if($this->session->userdata('username')): ?>
<?php if($products == NULL || empty($products)): ?>
    <p>Nincs rögzítve egyetlen termék sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Terméknév</th>
                <th>Ár</th>
                <th>Leírás</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($products as &$prod): ?>
            <tr>
                <td><?php echo anchor(base_url('products/profile/'.$prod->id), $prod->name);?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->description?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


<?php else:?>
   <?php redirect(base_url("user/login")); ?>
<?php endif; ?>


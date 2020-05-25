<?php if($this->session->userdata('admin')): ?>
<div class="orders">
<?php if($order == NULL || empty($order)): ?>
    <p>Nincs rögzítve rendelés!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>User id</th>
                <th>Város</th>
                <th>Irányítószám</th>
                <th>Utca, házszám</th>
                <th>Telefonszám</th>
                <th>Név</th>
                <th>Időpont</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($order as &$o): ?>
            <tr>
                <td><?=$o->user_id?></td>
                <td><?=$o->city?></td>
                <td><?=$o->postal_code?></td>
                <td><?=$o->address?></td>
                <td><?=$o->phone_number?></td>
                <td><?=$o->name?></td>
                <td><?=$o->date_time?></td>
                <td>
                    <?php echo anchor(base_url('order/delete/'.$o->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php endif; ?>

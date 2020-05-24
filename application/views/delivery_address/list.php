<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <title>Products</title>
</head>
<body class="userbground">
<div class="user2">
<div class="list">
<?php echo anchor(base_url('delivery_address/insert'),'Hozzáadás'); ?>
<?php if($delivery_address == NULL || empty($delivery_address)): ?>
    <p>Nincs rögzítve város!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Postal code</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($delivery_address as &$addr): ?>
            <tr>
                <td><?=$addr->id?></td>
                <td><?=$addr->postal_code?></td>
                <td><?=$addr->name?></td>
                <td>
                    <?php echo anchor(base_url('delivery_address/edit/'.$addr->id),'Módosítás');?>
                    <?php echo anchor(base_url('delivery_address/delete/'.$addr->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


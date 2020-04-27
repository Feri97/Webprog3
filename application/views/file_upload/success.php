<h1> 1 új fájl sikeresen feltöltve </h1>

<table>
    <thead>
        <tr>
            <th>Kulcs</th>
            <th>Érték</th1>
        </tr>
    </thead>
    <tbody>
        <?php foreach($file as $key => $value) : ?>
        <tr>
            <td><?=$key?></td>
            <td><?=$value?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if($file['is_image'] == 1): ?>
    <img src="<?=base_url('uploads/'.$file['file_name'])?>"
         alt="<?=$file['file_name']?>"/>
<?php endif; ?>
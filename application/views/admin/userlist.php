<?php if($this->session->userdata('admin')): ?>
<div class="userlist">
<?php if($users == NULL || empty($users)): ?>
    <p>Nincs regisztrált user</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>E-mail</th>
                <th>Felhasználó név</th>
                <th>Jelszó</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($users as &$user): ?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->email?></td>
                <td><?php echo anchor(base_url('admin/userprofile/'.$user->id), $user->username);?>
                <td><?=md5($user->password)?></td>
                
                <td>
                    <?php echo anchor(base_url('user/delete/'.$user->id),'Törlés');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
<?php endif; ?>
<?php endif; ?>

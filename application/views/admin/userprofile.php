<?php if($this->session->userdata('admin')): ?>
<div class="user">

<table>
        <thead>
            <tr>
                <th colspan="2">User adatai</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>Felhasználó név:</td>
                <td><?=$user->username?></td>
            </tr>
            <tr>
                <td>Jelszó:</td>
                <td><?=$user->password?></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><?=$user->email?></td>
            </tr>
        </tbody>
    </table>

    <?php endif; ?>
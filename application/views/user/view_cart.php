
<div class="list">
<?php echo form_open('user/view_cart'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%">

<tr>
        <th>Mennyiség</th>
        <th>Termék név</th>
        <th style="text-align:right">Ár</th>
        <th style="text-align:right">Összesen</th>
        <th>Műveletek</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' =>'qty[]', 'type'=>'number','class'=>'form-control', 'style'=>'width:75px' ,'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
    <?php echo form_input(array('name' =>'rowid1[]', 'type'=>'hidden', 'value' => $items['rowid'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td><?php echo $items['name']; ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> FT</td>
                <td> 
                <?php echo anchor(base_url('user/remove_from_cart/'.$items['rowid']),'Törlés');?>
                </td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Végösszeg</strong></td>
        <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?> FT</td>
        
</tr>
</table>

<p><?php echo form_submit('update', 'Frissít'); ?></p>
<p><?php echo form_submit('order', 'Megrendelem'); ?></p>
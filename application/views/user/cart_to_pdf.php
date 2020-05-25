
<div class="pdf">
<table cellpadding="6" cellspacing="1" style="width:100%">

<tr>
        <th>Mennyiség</th>
        <th>Termék név</th>
        <th style="text-align:right">Ár</th>
        <th style="text-align:right">Összesen</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <tr>
                <td><?php echo $this->cart->format_number($items['qty']); ?></td>
                <td><?php echo $items['name']; ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> FT</td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Végösszeg</strong></td>
        <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?> FT</td>
        
</tr>
</table>

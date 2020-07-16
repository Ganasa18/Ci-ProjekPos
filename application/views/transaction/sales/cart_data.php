 <?php $no = 1; ?>
 <?php if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
     <tr>
       <td><?= $no++; ?></td>
       <td><?= $data->barcode; ?></td>
       <td class="text-center"><?= $data->item_name; ?></td>
       <td class="text-center"><?= $data->cart_price; ?></td>
       <td class="text-center"><?= $data->qty; ?></td>
       <td class="text-center"><?= $data->discount_item; ?></td>
       <td class="text-center" id="total"><?= $data->total; ?></td>
       <td class="text-center">
         <button id="update_cart" class="badge badge-warning" data-toggle="modal" data-target="#modal-item-edit" data-cartid="<?= $data->cart_id; ?>" data-barcode="<?= $data->barcode; ?>" data-product="<?= $data->item_name; ?>" data-price="<?= $data->price; ?>" data-qty="<?= $data->qty; ?>" data-dicount="<?= $data->discount_item ?>" data-total="<?= $data->total; ?>">
           <i class="fas fa-pencil-alt"></i> Update</button>
         <button id="del_cart" data-cartid="<?= $data->cart_id; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
       </td>
     </tr>
 <?php
    }
  } else {
    echo '<tr>
    <td colspan="8" class="text-center"> Tidak ada item</td>
    </tr>';
  } ?>
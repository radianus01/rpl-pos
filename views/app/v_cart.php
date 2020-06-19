<?php $no = 1;
foreach ($carts as $user) { ?>
	<tr align="center">
		
		<td><?= $no++ ?></td>
		<td class="bb"><?= $user->barcode ?></td>
		<td><?= $user->b_nama ?></td>
		<td><?= $user->c_harga ?></td>
		<td id="yu"> <?= $user->qty ?></td>
		<td><?= $user->discount_barang ?></td>
		<td id="total"><?=$user->total ?></td>

		
		<td width="160px">
			<button class="btn btn-sm btn-info" 
			id="update" data-toggle="modal" 
			data-target="#modal-barang-edit" 
			data-cartid="<?= $user->id_cart ?>" 
			data-barcode="<?= $user->barcode ?>" 
			data-barangnama="<?= $user->b_nama ?>" 
			data-harga="<?= $user->c_harga ?>" 
			data-qty="<?= $user->qty ?>" 
			data-discount="<?= $user->discount_barang ?>" 
			data-total="<?= $user->total ?>">
				<i class="fas fa-edit"></i>
			</button>
			<button id="del_cart" data-cartid="<?= $user->id_cart ?>" class="btn btn-sm btn-danger">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</button>
		</td>
	</tr>
<?php } ?>
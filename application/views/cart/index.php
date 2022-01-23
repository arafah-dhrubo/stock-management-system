<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
	<div class="bg-white p-3 w-full shadow mr-3 rounded ">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">Cart</h1>
			<a href="<?php echo base_url() . 'cart/add_cart' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
		</div>
		<table class="w-full">
			<thead>
			<th class="border px-2 py-1">#</th>
			<th class="border px-2 py-1">Product</th>
			<th class="border px-2 py-1">Unit Price</th>
			<th class="border px-2 py-1">Quantity</th>
			<th class="border px-2 py-1">Net Price</th>
			<th class="border px-2 py-1">Action</th>
			</thead>
			<tbody>
			<?php foreach ($data as $key => $value) {?>
				<tr>
					<td class="px-2 py-1 border"><?php echo $key+1?></td>
					<td class="border px-2 py-1"><?php echo $value->product?></td>
					<td class="px-2 py-1 border"><?php echo $value->net_price/$value->quantity?></td>
					<td class="px-2 py-1 border"><?php echo $value->quantity?></td>
					<td class="px-2 py-1 border"><?php echo $value->net_price?></td>
					<td class="flex gap-2 border">
						<a
							href="<?php echo base_url() . 'cart/update_cart/' . $value->id ?>"
							class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-orange-500 cursor-pointer">

							Update</a>
						<a
							href="<?php echo base_url() . 'cart/delete_cart/' . $value->id ?>"
							class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer">
							Delete</a>
					</td>
				</tr>
			<?php }?>
			</tbody>
		</table>
		<div class="flex justify-between py-2">		<h1 class="text-xl">Total Payable <span class="font-bold"><?php echo $total_price?></span>BDT</h1>
			<a href="<?php echo base_url() . 'order/checkout'?>" class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Checkout</a>
		</div>
</div>
</div>

<?php include("application/views/inc/footer.php") ?>

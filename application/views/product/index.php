<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
	<div class="bg-white p-3 w-full shadow mr-3 rounded ">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">All Products</h1>
			<a href="<?php echo base_url() . 'product/add_product' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Add product</a>
		</div>
		<table class="w-full">
			<thead>
			<th class="border px-2 py-1">#</th>
			<th class="border px-2 py-1">Name</th>
			<th class="border px-2 py-1">SKU</th>
			<th class="border px-2 py-1">Price</th>
			<th class="border px-2 py-1">Stock</th>
			<th class="border px-2 py-1">Category</th>
			<th class="border px-2 py-1">Visibility</th>
			<th class="border px-2 py-1">Action</th>
			</thead>
			<tbody>
			<?php foreach ($data as $key => $value) {?>
				<tr>
					<td class="px-2 py-1 border"><?php echo $key+1?></td>
					<td class="border px-2 py-1"><?php echo $value->name?></td>
					<td class="border px-2 py-1"><?php echo $value->sku?></td>
					<td class="px-2 py-1 border"><?php echo $value->price?></td>
					<td class="px-2 py-1 border"><?php echo $value->stock<=5?'<span class="bg-red-500 px-3 py-1 text-center text-white">'.$value->stock.'</span>':'<span>'.$value->stock.'</span>'?></td>
					<td class="px-2 py-1 border"><?php echo $value->category?></td>
					<td class="px-2 py-1 border"><?php echo $value->is_visible?></td>
					<td class="flex gap-2 border">
						<a
							href="<?php echo base_url() . 'product/update_product/' . $value->id ?>"
							class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-orange-500 cursor-pointer">

							Update</a>
						<a
							href="<?php echo base_url() . 'product/delete_product/' . $value->id ?>"
							class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer">

							Delete</a>
					</td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</div>

<?php include("application/views/inc/footer.php") ?>

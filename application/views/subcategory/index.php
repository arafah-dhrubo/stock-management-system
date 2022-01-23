<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 justify-between mt-3 w-full gap-3">
	<div class="bg-white rounded shadow p-3 w-full">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">All Subcategories</h1>
			<a href="<?php echo base_url() . 'subcategory/add_subcategory' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Add Subcategory</a>
		</div>
		<table class="w-full">
			<thead>
			<th class="border px-2 py-1">#</th>
			<th class="border px-2 py-1">Category</th>
			<th class="border px-2 py-1">Subcategory</th>
			<th class="border px-2 py-1">Visibility</th>
			<th class="border px-2 py-1 w-1/6">Action</th>
			</thead>
			<tbody>
			<?php foreach ($data as $index => $value) { ?>
				<tr>
					<td class="px-2 py-1 border"><?php echo $index+1 ?></td>
					<td class="px-2 py-1 border"><?php echo $value->category ?></td>
					<td class="px-2 py-1 border"><?php echo $value->name ?></td>
					<td class="px-2 py-1 border"><?php echo $value->is_visible ?></td>
					<td class="flex gap-2 border">
						<a
								href="<?php echo base_url() . 'subcategory/update_subcategory/' . $value->id ?>"
								class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-orange-500 cursor-pointer">

							Update</a>
						<a
								href="<?php echo base_url() . 'subcategory/delete_subcategory/' . $value->id ?>"
								class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer">

							Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="mt-5">
		<a href="<?php echo base_url() . 'category/index' ?>"
		   class="border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back to categories</a>
	</div>
</div>
<?php include("application/views/inc/footer.php") ?>

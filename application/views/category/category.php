<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 mt-3 w-full pr-3">
	<div class="bg-white p-3 w-full shadow mb-5 ">
		<div class="flex justify-between mb-3">
		<h1 class="text-3xl font-semibold">All Categories</h1>
		<a href="<?php echo base_url() . 'category/add_category' ?>"
		   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Add Category</a>
		</div>
			<table class="w-full">
			<thead>
			<th class="border px-2 py-1">#</th>
			<th class="border px-2 py-1">Category</th>
			<th class="border px-2 py-1">Visibility</th>
			<th class="border px-2 py-1 w-1/6">Action</th>
			</thead>
			<tbody>
			<?php foreach ($data as $index => $value) { ?>
				<tr class="items-center">
					<td class="px-2 py-1 border"><?php echo $index ?></td>
					<td class="px-2 py-1 border"><?php echo $value->name ?></td>
					<td class="px-2 py-1 border"><?php echo $value->is_visible ?></td>
					<td class="flex gap-2 border">
						<a class="bg-orange-500 px-2 py-1 text-white w-full text-center cursor-pointer rounded"
						   href="<?php echo base_url('category/update_category/' . $value->id) ?>">Edit</a>
						<a class="bg-red-500 px-2 py-1 text-white w-full text-center cursor-pointer rounded"
						   href="<?php echo base_url('category/delete_category/' . $value->id) ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="text-right">
		<a href="<?php echo base_url() . 'subcategory/index' ?>"
		   class="border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Subcategories</a>
	</div>
</div>

<?php include("application/views/inc/footer.php") ?>

<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 justify-between mt-3 w-full gap-3">
	<div class="bg-white rounded shadow p-3 w-full">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">Update Subcategories</h1>
			<a href="<?php echo base_url() . 'subcategory/index' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Go Back</a>
		</div>
		<form action="<?php echo base_url() . 'subcategory/update_subcategory/'.$data['id'] ?>" method="post">
			<label for="category_name" class="text-sm font-semibold"
			>Category name</label
			><br/>
			<select
					id="category_name"
					name="category_name"
					class="focus:outline-0 focus:border-2 focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
					value="<?php echo $data['category'] ?>">
				<?php foreach ($parent as $item) { ?>
					<option value="<?php echo $item->name ?>"><?php echo $item->name ?></option>
				<?php } ?>
			</select>
			<label for="subcategory_name" class="text-sm font-semibold"
			>Subcategory name</label
			><br/>
			<input
					type="text"
					name="name"
					id="subcategory_name"
					placeholder="Subcategory name"
					value="<?php echo $data['name'] ?>"
					class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
			/><br>
			<span class="text-red-500">
                    <?php echo form_error('name'); ?>
                </span>

			<p class="text-sm font-semibold mt-1">Visibility</p>
			<input
					type="radio"
					id="visible"
					name="is_visible"
					value="visible"
			/>
			<label for="visible">Visible</label><br>
			<span class="text-red-500">
                    <?php echo form_error('is_visible'); ?>
                </span>

			<input
					type="radio"
					id="invisible"
					name="is_visible"
					value="invisible"
			/>
			<label for="invisible">Invisible</label><br>
			<span class="text-red-500">
                    <?php echo form_error('is_visible'); ?>
                </span>

			<input
					type="submit"
					value="Update Subcategory"
					class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
			/>
		</form>
	</div>

	<div class="mt-5">
		<a href="<?php echo base_url() . 'category/index' ?>"
		   class="border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back to categories</a>
	</div>
</div>
<?php include("application/views/inc/footer.php") ?>

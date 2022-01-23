<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 mt-3 w-full pr-3">
	<div class="bg-white p-3 w-full shadow ">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">Add Categories</h1>
			<a href="<?php echo base_url() . 'category/index' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Go Back</a>
		</div>
		<form action="<?php echo base_url() . 'category/add_category';?>" method="post">
			<label for="name" class="text-sm font-semibold"
			>Category name</label
			><br/>
			<input
					type="text"
					name="name"
					id="name"
					placeholder="Category name"
					class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
			/>
			<br>
			<span class="text-red-500">
                    <?php echo form_error('name'); ?>
                </span>
			<br/>
			<p class="text-sm font-semibold mt-1">Visibility</p>
			<input
					type="radio"
					id="visible"
					name="is_visible"
					value="visible"
			/>
			<label for="visible">Visible</label><br/>
			<input
					type="radio"
					id="invisible"
					name="is_visible"
					value="invisible"
			/>
			<label for="invisible">Invisible</label><span class="text-red-500">
                    <?php echo form_error('is_visible'); ?>
                </span>
			<br/>
			<input
					type="submit"
					value="Add Category"
					class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
			/>
		</form>
	</div>

	<div class="text-right mt-5">
		<a href="<?php echo base_url() . 'subcategory/index' ?>"
		   class="border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Subcategories</a>
	</div>
</div>

<?php include("application/views/inc/footer.php") ?>

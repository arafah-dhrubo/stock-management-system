<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
	<div class="flex gap-3">
		<div class="bg-white p-3 w-full shadow rounded">
			<div class="flex justify-between mb-3">
				<h1 class="text-3xl font-semibold">Add to cart</h1>
				<a href="<?php echo base_url() . 'order/index' ?>"
				   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
			</div>
			<form action="" method="post">
				<div class="w-full">

					<label for="product" class="text-sm font-semibold">Product name</label>
					<select
							id="product"
							name="product"
							value="<?php echo $data['product'] ?>"
							class="focus:outline-0 focus:border-2 focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
					>
						<?php foreach ($product as $item) { if($item->stock>=5){?>
							<option value="<?php echo $item->name ?>"><?php echo $item->name ?></option>
						<?php }} ?>
					</select>
					<span class="text-red-500">
                    <?php echo form_error('product'); ?>
                </span>
					<label for="quantity" class="text-sm font-semibold"
					>Quantity</label
					><br/>
					<input
                            min="0"
                            max="5"
							type="number"
							name="quantity"
							id="quantity"
							placeholder="Product quantity"
							value="<?php echo $data['quantity'] ?>"
							class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
					/><br/>
					<span class="text-red-500">
                    <?php echo form_error('quantity'); ?>
                </span>
					<div class="flex gap-3 mt-2">
						<input type="submit"
							   value="Add to cart"
							   class="bg-indigo-500 cursor-pointer text-center px-2 py-1 rounded text-white w-full"
						>
						<a href="<?php echo base_url() . 'cart/index' ?>"
						   class="bg-orange-500 cursor-pointer text-center px-2 py-1 rounded text-white w-full">Show
							cart</a>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>

<?php include("application/views/inc/footer.php") ?>

<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
	<div class="flex gap-3">
		<div class="bg-white p-3 w-full shadow rounded">
			<div class="flex justify-between mb-3">
				<h1 class="text-3xl font-semibold">Update Customer</h1>
				<a href="<?php echo base_url() . 'customer/index' ?>"
				   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
			</div>
			<form action="<?php echo base_url().'customer/update_customer/'.$data['id']?>" method="post">
				<div class="w-full">
					<label for="name" class="text-sm font-semibold"
					>Customer name</label
					><br/>
					<input
						type="text"
						name="name"
						id="name"
						placeholder="Customer name"
						value="<?php echo $data['name'] ?>"
						class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
					/><br/>
					<span class="text-red-500">
                    <?php echo form_error('name'); ?>
                </span>
					<label for="phone" class="text-sm font-semibold"
					>Customer Phone</label
					><br/>
					<input
						type="text"
						name="phone"
						id="phone"
						placeholder="Customer phone"
						value="<?php echo $data['phone'] ?>"
						class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
					/><br/>
					<span class="text-red-500">
                    <?php echo form_error('phone'); ?>
                </span>
					<label for="email" class="text-sm font-semibold"
					>Customer email</label
					><br/>
					<input
						type="text"
						name="email"
						id="email"
						placeholder="Customer email"
						value="<?php echo $data['email'] ?>"
						class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
					/><br/>
					<span class="text-red-500">
                    <?php echo form_error('email'); ?>
                </span>
					<input type="submit"
						   value="Update Customer"
						   class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
					>
				</div>
			</form>
		</div>
	</div>

</div>

<?php include("application/views/inc/footer.php") ?>

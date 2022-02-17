<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
	<div class="bg-white p-3 w-full shadow mr-3 rounded ">
		<div class="flex justify-between mb-3">
			<h1 class="text-3xl font-semibold">All Orders</h1>
            <div class="mt-5 text-right">
			<a href="<?php echo base_url() . 'cart/add_cart' ?>"
			   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Create new order</a>


                <a href="<?php echo base_url() . 'cart/index' ?>"
                   class="bg-orange-500 cursor-pointer text-center px-3 py-2 uppercase rounded text-white w-full">Show
                    cart</a>
            </div></div>
        <div class="w-full h-min">
            <?php if (count($data)) { ?>
		<table class="w-full">
			<thead>
			<th class="border px-2 py-1">#</th>
			<th class="border px-2 py-1">Customer</th>
			<th class="border px-2 py-1">Payable</th>
			<th class="border px-2 py-1 w-1/4">Order Date</th>
			</thead>
			<tbody>
			<?php foreach ($data['orders'] as $key => $value) {?>
				<tr>
					<td class="px-2 py-1 border"><?php echo $key+1?></td>
					<td class="border px-2 py-1"><?php echo $value->name?></td>
					<td class="px-2 py-1 border"><?php echo $value->payable?></td>
					<td class="px-2 py-1 border"><?php echo $value->created_at?></td>
				</tr>
			<?php }?>
            </tbody>
		</table>
                <p><?php echo $data['links']; ?></p>
            <?php }else{ ?>
                <p class="text-center text-red-500 font-bold text-2xl">No record found</p>
            <?php } ?>
	</div>
</div>

<?php include("application/views/inc/footer.php") ?>

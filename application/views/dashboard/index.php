<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 mt-3">
        <div class="bg-white col-span-10 mr-3 rounded shadow">
            <div class="p-3"><h1 class="text-3xl font-bold">Good morning <?php echo $_SESSION['user']['username']?></h1>
                <p>Welcome back to your shop inventory</p></div>
            <div class="flex justify-between gap-3 p-3">
                <div class="w-full flex bg-red-50 p-5 rounded">
                    <div class="rounded-full bg-red-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-cart-plus text-red-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold"><?php echo $total_order?></h1>
                        <p class="font-semibold">Today's Order</p>
                    </div>
                </div>
                <div class="w-full flex bg-purple-50 p-5 rounded">
                    <div class="rounded-full bg-purple-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-funnel-dollar text-purple-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold"><?php echo $revenue?> BDT</h1>
                        <p class="font-semibold">Today's Revenue</p>
                    </div>
                </div>
                <div class="w-full flex bg-green-50 p-5 rounded">
                    <div class="rounded-full bg-green-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-sort-amount-down text-green-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold"><?php echo count($stock_out)?></h1>
                        <p class="font-semibold">Running out of stock</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="bg-white col-span-10 mt-3 mr-3 rounded shadow p-3 w-full">
                <div class="flex justify-between mb-3"><h1 class="text-xl font-semibold">Recent Orders</h1>
                <a class="rounded text-white px-3 py-1 bg-indigo-500" href="<?php echo base_url().'order/index' ?>">Show All</a>
                </div>
                <?php  if(count($orders)>0){?>
                <table class="w-full">
                    <thead>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Customer</th>
                    <th class="border px-2 py-1">Payment</th>
                    </thead>
                    <tbody>
                    <?php foreach ($orders['orders'] as $index=>$value){?>
                    <tr>
                        <td class="px-2 py-1 border"><?php echo $index+1?></td>
                        <td class="px-2 py-1 border"><?php echo $value->name?></td>
                        <td class="px-2 py-1 border"><?php echo $value->payable?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
                    <p><?php echo $orders['links']; ?></p>
                 <?php }else{
        ?><p class="text-center text-red-500 font-bold text-2xl">No Record Found</p>
        <?php } ?>
            </div>
            <div class="bg-white col-span-10 mt-3 mr-3 rounded shadow p-3 w-full">
                <div class="flex justify-between mb-3"><h1 class="text-xl font-semibold">Running out of stock</h1>
                <a class="rounded text-white px-3 py-1 bg-indigo-500" href="<?php echo base_url().'product/index' ?>">All Products</a>
                </div>
                <?php  if(count($stock_out)>0){?>
                <table class="w-full">
                    <thead>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Product</th>
                    <th class="border px-2 py-1">Category</th>
                    <th class="border px-2 py-1">Quantity</th>
                    <th class="border px-2 py-1 w-1/4">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($stock_out as $index=>$value){?>
                    <tr>
                        <td class="px-2 py-1 border"><?php echo $index+1?></td>
                        <td class="px-2 py-1 border"><?php echo $value->name?></td>
                        <td class="px-2 py-1 border"><?php echo $value->category?></td>
                        <td class="px-2 py-1 border"><?php echo $value->stock?></td>
                        <td class="px-2 py-1 border flex gap-3">
                            <a class="text-white px-2 bg-orange-500 rounded" href="<?php echo base_url().'product/update_product/'.$value->id ?>">Update</a>
                            <a class="text-white px-2 bg-green-500 rounded" href="<?php echo base_url().'product/show_product/'.$value->id ?>">Show</a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
                <?php }else{
        ?><p class="text-center text-red-500 font-bold text-2xl">No Record Found</p>
        <?php } ?>
            </div>
        </div>
    </div>
    </div>
<div class="relative border-2 border-white">
<?php include("application/views/inc/footer.php") ?>
</div>
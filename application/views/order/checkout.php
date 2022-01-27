<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
    <div class="flex gap-3">
        <div class="bg-white p-3 w-full shadow rounded">
            <form action="" method="post">
                <div class="w-full">
                    <label for="customer" class="text-sm font-semibold">Customer name</label>
                    <select
                            id="customer"
                            name="customer"
                            value="<?php echo $data['customer'] ?>"
                            class="focus:outline-0 focus:border-2 focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
                    >
                        <?php foreach ($customer as $item) { ?>
                            <option value="<?php echo $item->name ?>"><?php echo $item->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-red-500">
                    <?php echo form_error('customer'); ?>
                </span>
                    <div class="flex gap-3 mt-2">
                        <input type="submit"
                               value="Confirm Order"
                               class="bg-indigo-500 cursor-pointer text-center px-2 py-1 rounded text-white w-full"
                        >
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-white p-3 w-full shadow rounded">
            <div class="flex justify-between mb-3">
                <h1 class="text-3xl font-semibold">Review Cart</h1>
                <a href="<?php echo base_url() . 'order/index' ?>"
                   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
            </div>
            <table class="w-full">
                <thead>
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Product</th>
                <th class="border px-2 py-1">Unit Price</th>
                <th class="border px-2 py-1">Quantity</th>
                <th class="border px-2 py-1">Price</th>
                </thead>
                <tbody>
                <?php foreach ($cart as $key => $value) { ?>
                    <tr>
                        <td class="px-2 py-1 border"><?php echo $key + 1 ?></td>
                        <td class="border px-2 py-1"><?php echo $value->product ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->net_price / $value->quantity ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->quantity ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->net_price ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="flex justify-between py-2">
                <h1 class="text-xl">Total Payable <span
                            class="font-bold"><?php echo $total_price ?></span>BDT</h1>
            </div>
        </div>
    </div>

</div>

<?php include("application/views/inc/footer.php") ?>

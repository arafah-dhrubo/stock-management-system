<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
    <div class="w-3/4 mx-auto h-min mt-3 ">
<?php if (count($data)) { ?>

    <!--
    Showing information of products
    -->
<h1 class="text-3xl font-semibold">All Orders</h1>
    <table class="w-full bg-white p-3 ">
        <thead>
        <th class="border px-2 py-1">#</th>
        <th class="border px-2 py-1 w-3/6">Transaction</th>
        <th class="border px-2 py-1 w-1/6">Paid</th>
        <th class="border px-2 py-1 w-6/6">Order Date</th>
        </thead>
        <tbody>
        <?php
        foreach ($data as $key => $item) { ?>
            <tr>
                <td class="px-3 border"><?php echo $key+1; ?></td>
                <td class="px-3 border"><?php echo $item->txn; ?></td>
                <td class="px-3 border"><?php echo $item->payable; ?> BDT</td>
                <td class="px-3 border"><?php echo $item->created_at; ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
<?php } else {
    ?><p class="text-center text-red-500 font-bold text-2xl">Cart is empty;</p>
<?php } ?></div>
    <?php include("application/views/inc/footer.php") ?>
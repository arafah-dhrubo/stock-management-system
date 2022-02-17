<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
<div class="w-10/12 mx-auto  my-5">
    <div class="flex justify-between">
        <h1 class="font-semibold text-xl">Order Details</h1>
        <a href="<?php echo base_url()."home/history"?>" class="bg-indigo-500 text-white px-3 py-1 rounded" >Back</a>
    </div>
    <table class="w-full bg-white rounded mt-2 p-10">
        <thead>
        <th class="px-3 py-2 border">#</th>
        <th class="px-3 py-2 border">Image</th>
        <th class="px-3 py-2 border">Product Name</th>
        <th class="px-3 py-2 border">Unit Price</th>
        <th class="px-3 py-2 border">Qty</th>
        <th class="px-3 py-2 border">Total</th>
        </thead>
        <tbody>
        <?php foreach ($ordered_products as $item=>$value){?>
            <tr>
                <td class="px-3 py-2 border"><?php echo $item+1?></td>
                <td class="px-3 py-2 border"><img width="35px" height="35px" src="<?php echo base_url()."images/".$value['image']?>" alt="<?php echo $value['name']?>"></td>
                <td class="px-3 py-2 border"><a href="<?php echo base_url()."home/productDetail/".$value["id"]?>" class="hover:text-indigo-500"><?php echo $value['name']?></a></td>
                <td class="px-3 py-2 border"><?php echo $value['price']?></td>
                <td class="px-3 py-2 border"><?php echo $value['qty']?></td>
                <td class="px-3 py-2 border"><?php echo $value['total']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div class="flex justify-between my-5">
        <h1 class="text-xl font-semibold">Total: <?php echo $data[0]->payable?>BDT</h1>
        <h1 class="text-xl font-semibold">Purchased at: <?php  echo date('Y-m-d H:i:s', strtotime($data[0]->created_at)) ?></h1>
    </div>
    <div class="bg-white p-5">
        <h1 class="text-xl font-semibold mb-2">
            Delivery Information
        </h1>
        <table class="w-full">  <thead>
            <th class="px-3 py-2 border">Full Name</th>
            <th class="px-3 py-2 border">Phone</th>
            <th class="px-3 py-2 border">Division</th>
            <th class="px-3 py-2 border">District</th>
            <th class="px-3 py-2 border">TXN</th>
            </thead>
            <tbody>
            <tr>
                <td class="px-3 py-2 border"><?php echo $data[0]->name?></td>
                <td class="px-3 py-2 border"><?php echo $data[0]->phone?></td>
                <td class="px-3 py-2 border"><?php echo $data[0]->division?></td>
                <td class="px-3 py-2 border"><?php echo $data[0]->district?></td>
                <td class="px-3 py-2 border"><?php echo $data[0]->txn?></td>
            </tr>
            </tbody></table>
    </div>
</div>
<?php include("application/views/inc/footer.php") ?>

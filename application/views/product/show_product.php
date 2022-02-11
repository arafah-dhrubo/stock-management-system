<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
    <div class="flex gap-3">
        <div class="bg-white p-3 w-full shadow rounded">
            <div class="flex justify-between mb-3">
                <h1 class="text-3xl font-semibold"><?php echo $product->name ?></h1>
                <a href="<?php echo base_url() . 'product/index' ?>"
                   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
            </div>
            <div>
                <div class="w-full">
                    <div class="w-full flex gap-3">
                        <div class="w-full">
                            <img src="<?php echo base_url().'images/'.$product->image ?>" height="300px" width="300px" alt="<?php echo base_url().$product->image ?>">
                        </div>
                        <div class="w-full">
                            <table class="border w-full text-left">
                                <tr class="border">
                                    <th class="px-2 py-1">Stock</th>
                                    <td class="px-2 py-1"><?php echo $product->stock ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">SKU</th>
                                    <td class="px-2 py-1"><?php echo $product->sku ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Category</th>
                                    <td class="px-2 py-1"><?php echo $product->category ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Price</th>
                                    <td class="px-2 py-1"><?php echo $product->price ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Visibility</th>
                                    <td class="px-2 py-1"><?php echo $product->is_visible ?></td>
                                </tr>
                            </table>
                            <div class="mt-3 w-full text-center">
                                <?php
                                $id = $product->id;
                                $cart = $this->cart->contents();
                                $ids = array_column($cart, 'id');
                                $exists = in_array($id, $ids);

                                //Checking id this product is exists in cart
                                if ($exists) {

                                    //If exists then get qty and row_id
                                    $qty = 0;
                                    $row_id = '';
                                    foreach ($cart as $item) {
                                        if ($item['id'] == $id) {
                                            $qty = $item['qty'];
                                            $row_id = $item['rowid'];
                                        }
                                    };
                                    ?>
                                    <div class="flex gap-3 items-center justify-center">
                                        <a href="<?php echo base_url() . 'home/downCart/' . $row_id . '/' . $qty
                                        ?>"><i class="fas fa-minus text-xl text-indigo-400 font-bold"></i></a>
                                        <?php echo $qty; ?><a
                                                href="<?php echo base_url() . 'home/upCart/' . $row_id . '/' . $qty
                                                ?>"><i
                                                    class="fas fa-plus text-xl text-indigo-400 font-bold"></i></a>
                                        <a class="bg-indigo-500 text-white px-3 py-2 rounded" href="<?php echo base_url().'cart/index'?>">View on cart</a>
                                    </div>
                                <?php } else {
                                    ?>
                                    <a class="bg-indigo-500 text-white px-3 py-2 rounded"
                                       href="<?php echo base_url() . "home/addCart/" . $product->id ?>">Add to
                                        cart</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h1 class="text-xl font-semibold">Description</h1>
                        <p><?php echo $product->description ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?php include("application/views/inc/footer.php") ?>

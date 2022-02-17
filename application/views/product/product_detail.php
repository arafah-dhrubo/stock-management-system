<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
<main class="w-11/12 mx-auto">
        <div class="flex-column gap-3 w-full mt-3">
            <div class="flex justify-between mb-3 md:w-full w-3/4 mx-auto">
                <h1 class="text-3xl font-semibold"><?php echo $product['name'] ?></h1>
                <a href="<?php echo base_url() ?>"
                   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
            </div>
            <div>
                <div class="w-full">
                    <div class="w-full  sm:flex-column gap-5 md:flex justify-content-between">
                        <div class="md:w-2/4 w-3/4 mx-auto mt-3 md:mt-0">
                            <img src="<?php echo base_url() . 'images/' . $product['image'] ?>"
                                 alt="<?php echo base_url() . $product['name'] ?>">
                        </div>
                        <div class="md:w-2/4 w-3/4 mx-auto mt-3 md:mt-0">
                            <table class="border w-full text-left">
                                <tr class="border">
                                    <th class="px-2 py-1">Stock</th>
                                    <td class="px-2 py-1"><?php echo $product['stock'] ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">SKU</th>
                                    <td class="px-2 py-1"><?php echo $product['sku'] ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Category</th>
                                    <td class="px-2 py-1"><?php echo $product['category'] ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Price</th>
                                    <td class="px-2 py-1"><?php echo $product['price'] ?></td>
                                </tr>
                                <tr class="border">
                                    <th class="px-2 py-1">Visibility</th>
                                    <td class="px-2 py-1"><?php echo $product['is_visible'] ?></td>
                                </tr>
                            </table>
                            <div class="mt-3 w-full text-center">
                                <?php
                                $id = $product['id'];
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
                                        <a class="bg-indigo-500 text-white px-3 py-2 rounded" href="<?php echo base_url().'home/showCart'?>">View on cart</a>
                                    </div>
                                <?php } else {
                                    ?>
                                    <a class="bg-indigo-500 text-white px-3 py-2 rounded"
                                       href="<?php echo base_url() . "home/addCart/" . $product['id'] ?>">Add to
                                        cart</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="bg-white p-3 md:w-2/4 w-3/4 mx-auto mt-3 md:mt-0">
                            <h3 class="font-semibold uppercase">Delivery Option</h3>
                            <div class="flex gap-3 items-center">
                                <i class="fas fa-hands-helping text-xl text-indigo-500"></i>
                                <p>Cash on delivery</p>
                            </div>
                            <div class="flex gap-3 items-center">
                                <i class="fas fa-map-marker-alt text-xl text-indigo-500"></i>
                                <p>Delivery Charge Inside 60 TK</p>
                            </div>
                            <div class="flex gap-3 items-center">
                                <i class="fas fa-map-signs text-xl text-indigo-500"></i>
                                <p>Outside Dhaka 120 TK</p>
                            </div>
                            <hr class="my-3 border-indigo-400">
                            <h3 class="font-semibold uppercase">Our Values</h3>
                            <div class="flex gap-3 items-center">
                                <i class="fas fa-check-circle text-xl text-indigo-500"></i>
                                <p>100% Authentic</p>
                            </div>
                            <div class="flex gap-3 items-center">
                                <i class="fas fa-undo text-xl text-indigo-500"></i>
                                <p>Instant Return</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 md:w-full w-3/4 mx-auto">
                        <p class="text-xl font-semibold">Description</p>
                        <p><?php echo $product['description'] ?></p>
                    </div>
                </div>

            </div>
        </div>
    </main>
<?php include("application/views/inc/footer.php") ?>
<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
    <div class="flex gap-3">
        <div class="bg-white p-3 w-full shadow rounded">
            <div class="flex justify-between mb-3">
                <h1 class="text-3xl font-semibold"><?php echo in_array('update', explode('/',$_SERVER['REQUEST_URI']))?"Update":"Add"?> Product</h1>
                <a href="<?php echo base_url() . 'product/index' ?>"
                   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="w-full flex gap-3">
                    <div class="w-full">
                        <label for="name" class="text-sm font-semibold"
                        >Product name</label
                        ><br/>
                        <input
                                type="text"
                                name="name"
                                id="name"
                                placeholder="Product name"
                                value="<?php echo $data['name'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('name'); ?>
                    </span>
                        <label for="sku" class="text-sm font-semibold"
                        >Product SKU</label
                        ><br/>
                        <input
                                type="text"
                                name="sku"
                                id="sku"
                                placeholder="Product sku"
                                value="<?php echo $data['sku'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('sku'); ?>
                    </span>
                        <label for="image" class="text-sm font-semibold"
                        >Product image</label
                        ><br/>
                        <input
                                type="file"
                                name="image"
                                id="image"
                                placeholder="Product image"
                                value="<?php echo $_FILES['image']['name'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('image'); ?>
                    </span>
                        <label for="description" class="text-sm font-semibold"
                        >Product description</label
                        ><br/>
                        <textarea
                                name="description"
                                id="description"
                                placeholder="Product description"
                                class="w-full h-auto focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        ><?php set_value('description', $data['description'])?></textarea><br/>
                        <span class="text-red-500">
                    <?php echo form_error('desc'); ?>
                </span>
                        <label for="price" class="text-sm font-semibold"
                        >Price</label
                        ><br/>
                        <input
                                type="text"
                                name="price"
                                id="price"
                                placeholder="Product Price"
                                value="<?php echo $data['price'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('price'); ?>
                </span>
                    </div>
                    <div class="w-full">
                        <label for="stock" class="text-sm font-semibold"
                        >Stock</label
                        ><br/>
                        <input
                                type="number"
                                name="stock"
                                id="stock"
                                placeholder="Product Stock"
                                value="<?php echo $data['stock'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('stock'); ?>
                </span>
                        <p class="text-sm font-semibold w-full">Categories</p>
                        <div class="overflow-y-auto h-32 border border-gray-300 rounded p-1">
                            <?php foreach ($categories as $item) { ?>
                                <input
                                        type="radio"
                                        id="category"
                                        name="category"
                                        value="<?php echo $item->name ?>"
                                    <?php echo set_radio('category', '<?php echo $item->name ?>', TRUE); ?>
                                />
                                <label for="category"><?php echo $item->name . " [parent=" . $item->parent . "]" ?></label>
                                <br>
                            <?php } ?>
                        </div>
                        </select>
                        <span class="text-red-500">
                    <?php echo form_error('category'); ?>
                </span>
                        <div class="flex w-full mt-1"><p class="text-sm font-semibold w-full">Visibility</p>
                            <div class="flex w-full items-center justify-around">
                                <div><input
                                            type="radio"
                                            id="visible"
                                            name="is_visible"
                                            value="visible"
                                        <?php echo set_radio('is_visible', 'visible', TRUE); ?>
                                    />
                                    <label for="visible">Visible</label></div>
                                <div><input
                                            type="radio"
                                            id="invisible"
                                            name="is_visible"
                                            value="invisible"
                                        <?php echo set_radio('is_visible', 'invisible', TRUE); ?>
                                    />
                                    <label for="invisible">Invisible</label></div>
                            </div>
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('is_visible'); ?>
                </span>
                        <input type="submit"
                               value="<?php echo in_array('update', explode('/',$_SERVER['REQUEST_URI']))?"Update":"Add"?> Product"
                               class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                        >
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-white p-3 w-full shadow mr-3 rounded ">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold">All Products</h1>

        </div>
        <?php if (count($products) > 0) { ?>
            <table class="w-full">
                <thead>
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">SKU</th>
                <th class="border px-2 py-1">Price</th>
                <th class="border px-2 py-1">Stock</th>
                <th class="border px-2 py-1">Category</th>
                <th class="border px-2 py-1">Visibility</th>
                <th class="border px-2 py-1 w-1/6">Action</th>
                </thead>
                <tbody>
                <?php foreach ($products['products'] as $key => $value) { ?>
                    <tr class="<?php echo $value->stock <= 5 ? '<span class="bg-red-50 px-3 py-1 text-center text-white"></span>' : '' ?>">
                        <td class="px-2 py-1 border"><?php echo $key + 1 ?></td>
                        <td class="border px-2 py-1"><?php echo $value->name ?></td>
                        <td class="border px-2 py-1"><?php echo $value->sku ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->price ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->stock ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->category ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->is_visible ?></td>
                        <td class="flex gap-2 border">
                            <a
                                    href="<?php echo base_url() . 'product/update/' . $value->id ?>"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-orange-500 cursor-pointer">

                                Update</a>
                            <a
                                    href="<?php echo base_url() . 'product/delete_product/' . $value->id ?>"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer">

                                Delete</a>
                            <a
                                    href="<?php echo base_url() . 'product/show_product/' . $value->id ?>"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-green-500 cursor-pointer">

                                Show</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p><?php echo $products['links']; ?></p>
        <?php } else { ?>
            <p class="text-center text-red-500 font-bold text-2xl">No Record Found</p>
        <?php }
        ?>
    </div>
</div>

<?php include("application/views/inc/footer.php") ?>

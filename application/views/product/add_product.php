<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
    <div class="flex gap-3">
        <div class="bg-white p-3 w-full shadow rounded">
            <div class="flex justify-between mb-3">
                <h1 class="text-3xl font-semibold">Add New Product</h1>
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
                                value="<?php echo $data['image'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <span class="text-red-500">
                    <?php echo form_error('sku'); ?>
                    </span>
                        <label for="desc" class="text-sm font-semibold"
                        >Product description</label
                        ><br/>
                        <textarea
                                name="desc"
                                id="desc"
                                placeholder="Product description"
                                value="<?php echo $data['description'] ?>"
                                class="w-full h-auto focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        ></textarea><br/>
                        <span class="text-red-500">
                    <?php echo form_error('desc'); ?>
                </span>
                    </div>
                    <div class="w-full">
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
                        <label for="category_name" class="text-sm font-semibold">Category name</label>
                        <select
                                id="category_name"
                                name="category"
                                value="<?php echo $data['category'] ?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
                        >
                            <?php foreach ($category as $item) { ?>
                                <option value="<?php echo $item->name ?>"><?php echo $item->name . " [parent=" . $item->category . "]" ?></option>
                            <?php } ?>
                        </select>
                        <span class="text-red-500">
                    <?php echo form_error('category_name'); ?>
                </span>
                        <p class="text-sm font-semibold mt-1">Visibility</p>
                        <input
                                type="radio"
                                id="visible"
                                name="is_visible"
                                value="visible"
                        />
                        <label for="visible">Visible</label><br/>
                        <input
                                type="radio"
                                id="invisible"
                                name="is_visible"
                                value="invisible"
                        />
                        <label for="invisible">Invisible</label><br/>
                        <input type="submit"
                               value="Add New Product"
                               class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                        >
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include("application/views/inc/footer.php") ?>

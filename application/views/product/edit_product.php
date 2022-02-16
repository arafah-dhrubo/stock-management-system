<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>
<script>
    tinymce.init({
        selector : '#description',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
    });
</script>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
    <div class="bg-white p-3 w-full shadow rounded">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold">
                Update Product</h1>
            <a href="<?php echo base_url() . 'product/index' ?>"
               class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Back</a>
        </div>

        <!--        form start-->
        <form action="<?php echo base_url().'product/update_product/'.$product['id']?>"
              method="post" enctype="multipart/form-data" novalidate>
            <div class="w-full flex gap-3">
                <div class="w-full">
                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="name" class="text-sm font-semibold w-4/12">Product name</label>
                            <input
                                required
                                type="text"
                                name="name"
                                id="name"
                                value="<?php echo $product['name']?>"
                                placeholder="Product name"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            />
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('name'); ?>
                    </span>
                    </div>
                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="sku" class="text-sm font-semibold w-4/12">Product SKU</label>
                            <input
                                required
                                type="text"
                                name="sku"
                                id="sku"
                                value="<?php echo $product['sku']?>"
                                placeholder="Product sku"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            />
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('sku'); ?>
                    </span>
                    </div>
                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="image" class="text-sm font-semibold w-4/12">Product image</label>
                            <input
                                required
                                type="file"
                                name="image"
                                src="<?php echo base_url().'images/'.$product['image']?>"
                                id="image"
                                placeholder="Product image"
                                value="<?php echo $product['image']?>"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            />
                        </div>
                        <a target="_blank"
                           href="<?php echo base_url().'images/'.$product['image']?>"
                           class="text-sm">Current image: <span class="text-indigo-500">
                                <?php echo $product['image']?></span></a>
                        <span class="text-red-500">
                    <?php echo form_error('image'); ?>
                    </span></div>
                    <div class="mt-1">
                        <label for="description" class="text-sm font-semibold"
                        >Product description</label
                        ><br/>
                        <textarea name="" id="description" cols="30" rows="10"></textarea>
                       <br/>
                        <span class="text-red-500">
                    <?php echo form_error('desc'); ?>
                </span></div>

                </div>
                <div class="w-full">
                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="price" class="text-sm font-semibold w-4/12">Price</label>
                            <input
                                required
                                type="text"
                                name="price"
                                id="price"
                                value="<?php echo $product['price']?>"
                                placeholder="Product Price"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            />
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('price'); ?>
                </span>
                    </div>
                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="stock" class="text-sm font-semibold w-4/12">Stock</label>
                            <input
                                required
                                type="number"
                                name="stock"
                                id="stock"
                                value="<?php echo $product['stock']?>"
                                placeholder="Product Stock"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            />
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('stock'); ?>
                </span>
                    </div>
                    <p class="text-sm font-semibold w-full">Categories</p>
                    <div class="overflow-y-auto h-32 border border-gray-300 rounded p-1">
                        <?php foreach ($categories as $item) { ?>
                            <input
                                required
                                type="radio"
                                id="category"
                                name="category"
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
                    <div class="mt-1">
                        <div class="flex w-full items-center">
                            <label for="is_visible" class="w-4/12 text-sm font-semibold">Visibility</label>
                            <select name="is_visible" id="is_visible"
                                    class="w-8/12 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 rounded px-2 py-1">
                                <option value="visible">visible</option>
                                <option value="invisible">invisible</option>
                            </select>
                        </div>
                        <span class="text-red-500"><?php echo form_error('is_visible'); ?></span>
                    </div>
                    <div class="mt-1">
                        <div class="flex w-full items-center">
                            <label for="is_feat" class="w-4/12 text-sm font-semibold">Featured</label>
                            <select name="is_feat" id="is_feat"
                                    class="w-8/12 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 rounded px-2 py-1">
                                <option value="1">Featured</option>
                                <option value="0">Not Featured</option>
                            </select>
                        </div>
                        <span class="text-red-500">
                    <?php echo form_error('is_visible'); ?>
                     </span>
                    </div>
                    <input type="submit"
                           value="Update Product"
                           class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                    >
                </div>
            </div>
        </form>
    </div>
</div>

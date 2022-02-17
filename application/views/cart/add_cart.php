<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
    <div class="flex justify-between">
        <div class="w-fit">
            <form class="flex w-full gap-3" action="<?php echo base_url() . 'product/product_page' ?>">
                <input name="keyword"
                       id="search"
                       placeholder="search product"
                       class="border border-gray-300 rounded px-2 py-1 w-full me-2 focus:outline-none focus:border focus:border-indigo-500">
                <button class="bg-indigo-500 text-white px-3 py-1 rounded" type="submit">Search</button>
            </form>
            <div class="relative w-11/12 text-left">
                <?php include("application/views/home/result.php") ?>
            </div>
        </div>
        <a href="<?php echo base_url() . 'cart/index' ?>" class="text-indigo-500 relative text-center cursor-pointer"><i
                    class="fas fa-shopping-bag text-3xl"> </i>
            <?php if ($this->cart->total_items() > 0) { ?>
                <div class=" absolute top-0 right-0 text-white bg-indigo-400 text-sm rounded-full w-5 h-5 text-center">
                    <?php echo $this->cart->total_items(); ?>
                </div>
            <?php } ?></a></div>
    <div class="mt-6 flex gap-5 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4">
        <?php foreach ($data['products'] as $value) { ?>
            <div class="bg-white hover:shadow-md p-3 h-min">
                <img src="<?php echo base_url() . 'images/' . $value->image ?>" class="w-full"
                     alt="<?php echo $value->name ?>">
                <div class="w-full mb-2">
                    <h1 class="font-semibold">
                        <?php echo substr($value->name, 0, 28) ?>
                    </h1>
                    <h1 class="text-center text-sm"><?php echo $value->category ?></h1>
                    <p class="text-2xl text-center font-semibold">
                        <?php echo $value->price ?> BDT</p>
                </div>
                <div class="flex gap-3">
                    <a href="<?php echo base_url() . "home/addCart/" . $value->id ?>"
                       class="bg-indigo-500 text-white px-3 py-1 rounded text-xl w-full text-center"><i
                                class="fas fa-cart-plus"></i></a>
                    <a href="<?php echo base_url() . "home/productDetail/" . $value->id ?>"
                       class="bg-indigo-500 text-white px-3 py-1 rounded text-xl w-full text-center"><i
                                class="fas fa-eye"></i></a>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($data['links'])) { ?>
            <div><p><?php echo $data['links']; ?></p></div>
        <?php } ?>
    </div>
</div>

<?php include("application/views/inc/footer.php") ?>

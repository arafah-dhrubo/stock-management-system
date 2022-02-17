<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
<?php include("application/views/inc/header.php") ?>
<main class="w-10/12 mx-auto" xmlns="http://www.w3.org/1999/html">
    <div class="flex items-center bg-white rounded-xl gap-5 p-10 mt-3">
        <div class="w-6/12 text-center">
            <h1 class="text-4xl font-semibold">Confused while shopping? </h1>
            <p class="mt-1 font-semibold w-6/12 mx-auto">Checkout our minimal storeOffering goods that only you
                needed</p>
            <div class="mt-10">
            <a href="<?php echo base_url() . "product/product_page?keyword=" ?>"
               class="text-white bg-gray-900 px-4 py-3">Show Products</a>
        </div>
    </div>

    <div class="w-6/12">
        <img src="https://kit8.net/wp-content/uploads/edd/2021/03/color_selection_preview.jpg" alt="banner">
    </div>
    </div>
    <div class="mt-28">
        <div class="text-center">
            <p class="text-4xl font-semibold">We Provide High Quality Service</p>
            <p>Accept that it’s sometimes okay to focus just on the content.</p>
        </div>
        <div class="my-6 grid grid-cols-2 md:grid-cols-3 flex gap-4 items-center">
            <div class="bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4 text-center">
                <div>
                    <i class="fas fa-people-carry text-6xl"></i>
                </div>
                <div>
                    <p class="text-2xl text-indigo-500 font-semibold">Home Delivery</p>
                    <p class="text-sm">24-72 Hours</p>
                </div>
            </div>
            <div class="bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4 text-center">
                <div>
                    <i class="fas fa-fingerprint text-6xl"></i>
                </div>
                <div>
                    <p class="text-2xl text-indigo-500 font-semibold">Secured Shopping</p>
                    <p class="text-sm">100% Safe Transactions</p>
                </div>
            </div>
            <div class="bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4 text-center">
                <div>
                    <i class="fas fa-ribbon text-6xl"></i>
                </div>
                <div>
                    <p class="text-2xl text-indigo-500 font-semibold">Original Products</p>
                    <p class="text-sm">Buy Original Products</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-28">
        <div class="text-center">
            <p class="text-4xl font-semibold">Featured Products</p>
            <p>Accept that it’s sometimes okay to focus just on the content.</p>
        </div>
        <div class="flex mt-6 gap-2 mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php foreach ($data['products'] as $value) { ?>
                <div class="bg-white hover:shadow-md p-3 h-96 w-60">
                    <div class="md:h-48 lg:h-56">
                        <img src="<?php echo base_url() . 'images/' . $value->image ?>"
                             class="rounded-md h-full w-full mx-auto"
                             alt="<?php echo $value->name ?>"></div>
                    <div class="flex-column mt-2">
                        <div class="w-full mb-2">
                            <h1 class="text-semibold text-md font-semibold"><?php echo substr($value->name, 0,28) ?></h1>
                            <h1 class="text-semibold text-sm text-center"><?php echo $value->category ?></h1>
                            <p class="text-2xl text-center font-semibold"><?php echo $value->price ?> BDT</p>
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
                </div>
            <?php } ?>
            <div><p><?php echo $data['links']; ?></p></div>
        </div>
    </div>
    <div class="mt-28 flex gap-3">
        <div class="p-16">
            <h1 class="font-semibold text-5xl mb-3">We provide good products</h1>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, asperiores autem beatae in
                inventore maiores!</p>
            <div class="mt-3 flex gap-3">
                <a href="" class="px-6 py-2 text-white bg-gray-900">Shop Now</a>
                <a href="" class="px-6 py-2 text-white bg-gray-900">Contact Us</a>
            </div>
        </div>
        <div class="p-16">
            <img src="https://www.pngall.com/wp-content/uploads/11/iPhone-13-PNG-Cutout.png" alt="">
        </div>
    </div>

</main>
<div class="relative mt-10">
    <?php include("application/views/inc/footer.php") ?>
</div>

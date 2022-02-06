<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
<main class="bg-indigo-50 h-screen container mx-auto">
    <div class="text-center w-full">
        <img src="https://image.freepik.com/free-vector/online-shopping-concept-web-landing-page-digital-marketing-website-mobile-application_25819-695.jpg" class="mx-auto" alt="">
    </div>
    <div class="my-3 grid grid-cols-2 md:grid-cols-3 flex gap-4 items-center">
        <div class="flex bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4">
            <div>
                <i class="fas fa-people-carry text-4xl"></i>
            </div>
            <div>
                <p class="text-xl text-indigo-500 font-semibold">Home Delivery</p>
                <p class="text-sm">24-72 Hours</p>
            </div>
        </div>
        <div class="flex bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4">
            <div>
                <i class="fas fa-fingerprint text-4xl"></i>
            </div>
            <div>
                <p class="text-xl text-indigo-500 font-semibold">Secured Shopping</p>
                <p class="text-sm">100% Safe Transactions</p>
            </div>
        </div>
        <div class="flex bg-white shadow-indigo-500 items-center gap-3 rounded px-5 py-4">
            <div>
                <i class="fas fa-ribbon text-4xl"></i>
            </div>
            <div>
                <p class="text-xl text-indigo-500 font-semibold">Original Products</p>
                <p class="text-sm">Buy Original Products</p>
            </div>
        </div>
    </div>
    <div class="mt-6 flex gap-3 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
        <?php foreach ($data as $value) { ?>
            <div class="bg-white hover:shadow-md p-3">
                <img src="<?php echo base_url() . 'images/' . $value->image ?>" class="w-full"
                     alt="<?php echo $value->name ?>">
                <div class="w-full mb-2">
                    <h1 class="text-semibold"><?php echo $value->name ?></h1>
                    <p class="text-2xl text-center font-semibold"><?php echo $value->price ?> BDT</p>
                </div>
                <div class="flex gap-3">
                    <a href="<?php echo base_url()."home/addCart/".$value->id?>" class="bg-indigo-500 text-white px-3 py-1 rounded text-xl w-full text-center"><i class="fas fa-cart-plus"></i></a>
                    <a href="<?php echo base_url()."home/productDetail/".$value->id?>" class="bg-indigo-500 text-white px-3 py-1 rounded text-xl w-full text-center"><i class="fas fa-eye"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>

</main>
<?php include("application/views/inc/header.php") ?>

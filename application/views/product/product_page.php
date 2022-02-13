<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
<main class="w-11/12 mx-auto">
    <div class="mt-6 flex gap-3 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
        <?php foreach ($data['products'] as $value) { ?>
            <div class="bg-white hover:shadow-md p-3 h-min">
                <img src="<?php echo base_url() . 'images/' . $value->image ?>" class="w-full"
                     alt="<?php echo $value->name ?>">
                <div class="w-full mb-2">
                    <h1 class="text-semibold"><?php echo $value->name ?></h1>
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
        <?php } ?>
        <?php if (isset($data['links'])) { ?>
            <div><p><?php echo $data['links']; ?></p></div>
        <?php } ?>
    </div>
</main>
<?php include("application/views/inc/header.php") ?>
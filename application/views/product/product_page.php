<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navmenu.php") ?>
    <main class="w-11/12 mx-auto mt-6 ">
        <div class="flex justify-between">
            <p>Showing result for <span class="text-indigo-500"><?php echo $_GET['keyword'] ?></span></p>
            <a href="<?php echo base_url() ?>"
               class="w-min h-min bg-indigo-500 text-white px-3 py-1 rounded text-sm w-full text-center">Back</a>
        </div>
        <div class="flex gap-3 mt-6 ">
<!--            <div class="w-2/12 bg-white p-3 h-min">-->
<!--                <div>-->
<!--                    <p class="text-sm text-indigo-500 font-semibold" >Filter</p>-->
<!--                    <select name="" id="" class="border-2 border-gray-300 focus:outline-0 focus:border-indigo-400 px-3 py-1">-->
<!--                        <option value="">Price low to high</option>-->
<!--                        <option value="">Price high to low</option>-->
<!--                    </select>-->
<!---->
<!--                </div>-->
<!--                <div class="mt-3">-->
<!--                    <p class="text-sm text-indigo-500 font-semibold">Categories</p>-->
<!--                    --><?php
//                    $category = array();
//                    foreach ($data['products'] as $value) {
//                        if (in_array($value->category, $category)) continue;
//                        $category[] = $value->category
//                        ?>
<!--                        <a href="" class="hover:text-gray-900 text-gray-500">--><?php //echo $value->category ?><!--</a>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--            </div>-->
            <div class="w-11/12 flex gap-3 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4">
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
        </div>
    </main>
<?php include("application/views/inc/header.php") ?>
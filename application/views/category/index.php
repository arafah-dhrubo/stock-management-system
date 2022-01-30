<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>
    <div class="flex gap-3 col-span-10 mt-3 w-full pr-3">
        <div class="bg-white p-3 w-full shadow ">
            <div class="flex justify-between mb-3">
                <h1 class="text-3xl font-semibold">Add Categories</h1>
                <a href="<?php echo base_url() . 'category/index' ?>"
                   class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Go Back</a>
            </div>
            <form action="" method="post">
                <label for="name" class="text-sm font-semibold"
                >Category name</label
                ><br/>
                <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Category name"
                        value="<?php echo $data['name'] ?>"
                        class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                />
                <span class="text-red-500">
                    <?php echo form_error('name'); ?>
                </span>

                <label for="parent" class="text-sm font-semibold">Category parent</label>
                <br>
                <select
                        id="parent"
                        name="parent"
                        default="default"
                        value="<?php echo $data['parent'] ?>"
                        class="focus:outline-0 mt-1 focus:border-2 w-full focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
                >
                    <option value="default" class="">Default</option>
                    <?php foreach ($categories as $item) { ?>
                        <option value="<?php echo $item->name ?>"><?php echo $item->name . " [parent=" . $item->parent . "]" ?></option>
                    <?php } ?>
                </select>
                <span class="text-red-500">
                    <?php echo form_error('category_name'); ?>
                </span>
                <br/>
                <label for="slug" class="text-sm font-semibold"
                >Category slug</label
                ><br/>
                <input
                        type="text"
                        name="slug"
                        id="slug"
                        placeholder="Category slug"
                        value="<?php echo $data['slug'] ?>"
                        class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                />
                <br>
                <span class="text-red-500">
                    <?php echo form_error('slug'); ?>
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
                <input
                        type="submit"
                        value="Add Category"
                        class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                />
            </form>
        </div>
        <div class="bg-white p-3 w-full shadow ">
            <table class="w-full">
                <thead>
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Parent</th>
                <th class="border px-2 py-1">Visibility</th>
                <th class="border px-2 py-1 w-1/6">Action</th>
                </thead>
                <tbody>
                <?php foreach ($categories as $index => $value) {?>
                    <tr class="items-center bg-<?php echo $value->parent!="default"?"indigo":"white" ?>-50">
                        <td class="px-2 py-1 border"><?php echo $index+1 ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->name ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->parent ?></td>
                        <td class="px-2 py-1 border"><?php echo $value->is_visible ?></td>
                        <td class="flex gap-2 border">
                            <a class="bg-orange-500 px-2 py-1 text-white w-full text-center cursor-pointer rounded"
                               href="<?php echo base_url('category/update/' . $value->id) ?>">Edit</a>
                            <a class="bg-red-500 px-2 py-1 text-white w-full text-center cursor-pointer rounded"
                               href="<?php echo base_url('category/delete/' . $value->id) ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include("application/views/inc/footer.php") ?>
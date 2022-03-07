<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>
<div class="flex gap-3 col-span-10 mt-3 w-full pr-3">
    <div class="bg-white p-3 w-full shadow ">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold"><?php echo in_array('update', explode('/', $_SERVER['REQUEST_URI'])) ? "Update" : "Add" ?>
                Categories</h1>
            <a href="<?php echo base_url() . 'category/index' ?>"
               class="text-sm border bg-indigo-500 px-3 py-2 text-white rounded uppercase">Go Back</a>
        </div>
        <form action="" id="add-category" method="post">
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
            <span class="text-red-500" id="name_err"></span>
            <br>
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
                <?php foreach ($parent as $item) { ?>
                    <option value="<?php echo $item->name ?>" <?php echo set_select('parent', '<?php echo $item->name ?>', TRUE); ?>><?php echo $item->name . " [parent=" . $item->parent . "]" ?></option>
                <?php } ?>
            </select>
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
            <span class="text-red-500" id="slug_err"></span>
            <br>
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
                    value="<?php echo in_array('update', explode('/', $_SERVER['REQUEST_URI'])) ? "Update" : "Add" ?> Category"
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
            <?php if (count($categories['categories']) > 0) {?>
                <?php foreach ($categories['categories'] as $index => $value) { ?>
                    <tr class="items-center bg-<?php echo $value->parent != "default" ? "indigo" : "white" ?>-50">
                        <td class="px-2 py-1 border"><?php echo $index + 1 ?></td>
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
            <?php } else { ?>
                <p class="text-center text-red-500 font-bold text-2xl">No Record Found</p>
            <?php } ?>
            </tbody>
        </table>
        <div><p><?php echo $categories['links']; ?></p></div>
    </div>
</div>

<?php include("application/views/inc/footer.php") ?>
<script >

    //Create Category
    const addCategory = document.getElementById('add-category');
    const nameErr = document.getElementById('name_err');
    const slugErr = document.getElementById('slug_err');
    addCategory.addEventListener('submit', e => {
        let name = addCategory.name.value;
        let slug = addCategory.slug.value;
        let category = addCategory.parent.value;
        let visibility = addCategory.is_visible.value;
        e.preventDefault();
        if (name == '') nameErr.innerText = "err";
        if (name != '') nameErr.innerText = "";
        if (slug == '') slugErr.innerText = "err";
        if (slug != '') slugErr.innerText = "";

        let params;
        if (slug != '' && name != '') {
            params = {
                name: name,
                slug: slug,
                parent: category,
                is_visible: visibility
            }
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo base_url() . 'category/add'?>", true);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    addCategory.name.value = "";
                    addCategory.parent.value = "default";
                    addCategory.slug.value = "";
                }
            }
            xhr.send(JSON.stringify(params));
            // return false;
        }
    })

    //Show updated data


</script>

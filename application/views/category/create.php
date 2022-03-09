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
        <form id="add-category" method="post">
            <label for="name" class="text-sm font-semibold"
            >Category name</label
            ><br/>
            <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Category name"
                    value="<?php echo isset($data)? $data['name']:''?>"
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
                    value="<?php echo isset($data)? $data['slug']:''?>"
                    placeholder="Category slug"
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
                        />
                        <label for="visible">Visible</label></div>
                    <div><input
                                type="radio"
                                id="invisible"
                                name="is_visible"
                                value="invisible"
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
        if (name == '') nameErr.innerText = "Name is a required field";
        if (name != '') nameErr.innerText = "";
        if (slug == '') slugErr.innerText = "Slug is a required field";
        if (slug != '') slugErr.innerText = "";

        let params;
        if (slug != '' && name != '') {
            params = {
                name: name,
                slug: slug,
                parent: category,
                is_visible: visibility
            }

            let url = '<?php echo base_url()."category/add/".$data['id'] ?>'

            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
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

</script>

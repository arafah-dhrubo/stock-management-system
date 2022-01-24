<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 border w-full gap-3 pr-3">
        <div class="flex gap-3">
            <div class="bg-white p-3 w-full shadow rounded">
                <h1 class="text-xl font-semibold">Add New Product</h1>
                <form action="" method="post">
                    <div class="flex gap-3">
                        <div class="w-full">
                            <label for="name" class="text-sm font-semibold"
                            >Product name</label
                            ><br/>
                            <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Product name"
                                    class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            /><br/>
                            <label for="price" class="text-sm font-semibold"
                            >Product price</label
                            ><br/>
                            <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    placeholder="Product price"
                                    class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            /><br/>
                            <label for="stock" class="text-sm font-semibold">Stock</label
                            ><br/>
                            <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    placeholder="Product stock"
                                    class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            /><br/>
                        </div>
                        <div class="w-full">
                            <label for="description" class="text-sm font-semibold"
                            >Description</label
                            ><br/>
                            <textarea
                                    type="text"
                                    name="description"
                                    id="description"
                                    placeholder="Description"
                                    class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                            >
                </textarea>
                            <label for="category_name" class="text-sm font-semibold"
                            >Category name</label
                            ><br/>
                            <select
                                    id="category_name"
                                    class="focus:outline-0 focus:border-2 focus:border-indigo-500 border mb-1 border-gray-300 w-full rounded px-2 py-1"
                            >
                                <option value="">Select</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>

                            <div class="flex">
                                <div class="w-full">
                                    <p class="text-sm font-semibold mt-1">Visibility</p>
                                </div>
                                <div class="w-full">
                                    <input
                                            type="radio"
                                            id="visible"
                                            name="visibility"
                                            value="visible"
                                    />
                                    <label for="visible">Visible</label>
                                </div>
                                <div class="w-full">
                                    <input
                                            type="radio"
                                            id="invisible"
                                            name="visibility"
                                            value="invisible"
                                    />
                                    <label for="invisible">Invisible</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit"
                           value="Add New Product"
                           class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                    >
                </form>
            </div>
            <div class="bg-white rounded shadow p-3 w-full">
                <h1 class="text-xl font-semibold">Running out of stock</h1>
                <table class="w-full">
                    <thead>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Product</th>
                    <th class="border px-2 py-1">Category</th>
                    <th class="border px-2 py-1">Quantity</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-2 py-1 border">1</td>
                        <td class="px-2 py-1 border">T-Shirt</td>
                        <td class="px-2 py-1 border">Dhrubo</td>
                        <td class="px-2 py-1 border">300</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white p-3 w-full shadow mr-3 rounded ">
            <h1 class="text-xl font-semibold">All Products</h1>
            <table class="w-full">
                <thead>
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">SKU</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Category</th>
                <th class="border px-2 py-1">Stock</th>
                <th class="border px-2 py-1">Unit Price</th>
                <th class="border px-2 py-1">Visibility</th>
                <th class="border px-2 py-1">Action</th>
                </thead>
                <tbody>
                <tr>
                    <td class="px-2 py-1 border">1</td>
                    <td class="border px-2 py-1">SKU1234</td>
                    <td class="px-2 py-1 border">Red T-Shirt</td>
                    <td class="px-2 py-1 border">T-Shirt</td>
                    <td class="px-2 py-1 border">1234</td>
                    <td class="px-2 py-1 border">300</td>
                    <td class="px-2 py-1 border">Visible</td>
                    <td class="flex gap-2 border">
                        <form action="" method="post" class="w-full">
                            <input
                                    type="submit"
                                    value="Update"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-orange-500 cursor-pointer"
                            />
                        </form>
                        <form action="" method="post" class="w-full">
                            <input
                                    type="submit"
                                    value="Delete"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer"
                            />
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php include("application/views/inc/footer.php") ?>

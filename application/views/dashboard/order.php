<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 flex flex-col justify-between mt-3 w-full gap-3 pr-3">
        <div class="flex gap-3">
            <div class="bg-white p-3 w-full shadow rounded">
                <form action="" method="post">
                    <div class="w-full">
                        <label for="customer_id" class="text-sm font-semibold"
                        >Customer ID</label
                        ><br/>
                        <input
                                type="text"
                                name="customer_id"
                                id="customer_id"
                                placeholder="Customer ID"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <label for="sku" class="text-sm font-semibold"
                        >SKU</label
                        ><br/>
                        <input
                                type="text"
                                name="sku"
                                id="sku"
                                placeholder="Product sku"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <label for="quantity" class="text-sm font-semibold"
                        >Product quantity</label
                        ><br/>
                        <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                placeholder="Product quantity"
                                class="focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                        /><br/>
                        <input type="submit"
                               value="Add As Order"
                               class="bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                        >
                    </div>
                </form>
            </div>
            <div class="bg-white rounded shadow p-3 w-full">
                <h1 class="text-xl font-semibold">Order Summary</h1>
                <table class="w-full">
                    <thead>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Price</th>
                    <th class="border px-2 py-1">SKU</th>
                    <th class="border px-2 py-1">Quantity</th>
                    <th class="border px-2 py-1">Action</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-2 py-1 border">1</td>
                        <td class="px-2 py-1 border">12</td>
                        <td class="px-2 py-1 border">1234</td>
                        <td class="px-2 py-1 border">3</td>
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
                <div class="flex justify-between items-center mt-2">
                    <h1 class="w-full text-xl font-semibold">Total: $1200</h1>
                    <div class="flex justify-between gap-3">
                        <form action="" method="post" class="w-full">
                            <input
                                    type="submit"
                                    value="Complete Order"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-green-500 cursor-pointer"
                            />
                        </form>

                        <form action="" method="post" class="w-full">
                            <input
                                    type="submit"
                                    value="Cancel Order"
                                    class="w-full text-center px-2 py-1 text-sm font-semibold text-white bg-red-500 cursor-pointer"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-3 w-full shadow mr-3 rounded ">
            <h1 class="text-xl font-semibold">All Orders</h1>
            <table class="w-full">
                <thead>
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Order ID</th>
                <th class="border px-2 py-1">Customer ID</th>
                <th class="border px-2 py-1">Net Price</th>
                <th class="border px-2 py-1">Order Date</th>
                <th class="border px-2 py-1">Action</th>
                </thead>
                <tbody>
                <tr>
                    <td class="px-2 py-1 border">1</td>
                    <td class="border px-2 py-1">SKU1234</td>
                    <td class="px-2 py-1 border">Red T-Shirt</td>
                    <td class="px-2 py-1 border">T-Shirt</td>
                    <td class="px-2 py-1 border">1234</td>
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

<?php include("application/views/inc/header.php") ?>
<?php include("application/views/inc/navbar.php") ?>
<?php include("application/views/inc/sidebar.php") ?>

<div class="col-span-10 mt-3">
        <div class="bg-white col-span-10 mr-3 rounded shadow">
            <div class="p-3"><h1 class="text-3xl font-bold">Good morning Admin</h1>
                <p>Welcome back to your shop inventory</p></div>
            <div class="flex justify-between gap-3 p-3">
                <div class="w-full flex bg-red-50 p-5 rounded">
                    <div class="rounded-full bg-red-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-cart-plus text-red-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold">50</h1>
                        <p class="font-semibold">Today's Order</p>
                    </div>
                </div>
                <div class="w-full flex bg-purple-50 p-5 rounded">
                    <div class="rounded-full bg-purple-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-funnel-dollar text-purple-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold">$150</h1>
                        <p class="font-semibold">Today's Revenue</p>
                    </div>
                </div>
                <div class="w-full flex bg-green-50 p-5 rounded">
                    <div class="rounded-full bg-green-200 w-16 h-16 justify-center items-center flex">
                        <i class="fas fa-sort-amount-down text-green-600 text-3xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-semibold">3</h1>
                        <p class="font-semibold">Running out of stock</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="bg-white col-span-10 mt-3 mr-3 rounded shadow p-3 w-full">
                <h1 class="text-xl font-semibold">Recent Orders</h1>
                <table class="w-full">
                    <thead>
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Product</th>
                    <th class="border px-2 py-1">Customer</th>
                    <th class="border px-2 py-1">Payment</th>
                    <th class="border px-2 py-1">Order</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-2 py-1 border">1</td>
                        <td class="px-2 py-1 border">T-Shirt</td>
                        <td class="px-2 py-1 border">Dhrubo</td>
                        <td class="px-2 py-1 border">300</td>
                        <td class="px-2 py-1 border">1234</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-white col-span-10 mt-3 mr-3 rounded shadow p-3 w-full">
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
    </div>
    </div>

<?php include("application/views/inc/footer.php") ?>

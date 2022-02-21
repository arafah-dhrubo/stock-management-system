<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 PDF Generate Example - Lartutorials.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@0.7.4/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="w-full border">
<div class="container mt-5 mx-auto">
    <h1 class="text-center">TDIpsum</h1>

    <div class="text-center flex-1">
        <h2 class="mt-6 mb-4">Invoice</h2>
        <a href="<?php echo base_url() . 'home/show_order/', $data[0]->id ?>">
            Order Detail
        </a>
    </div>

    <div class="bg-white w-full flex-1">
        <h1 class="text-xl font-semibold mb-2">
            Delivery Information
        </h1>
        <table class="w-full">
            <tr>
                <th class="px-3 py-2 border">Full Name</th>
                <td class="px-3 py-2 border"><?php echo $data[0]->name ?></td>
            </tr>
            <tr>
                <th class="px-3 py-2 border">Phone</th>
                <td class="px-3 py-2 border"><?php echo $data[0]->phone ?></td>
            </tr>
            <tr>
                <th class="px-3 py-2 border">Division</th>
                <td class="px-3 py-2 border"><?php echo $data[0]->division ?></td>
            </tr>
            <tr>
                <th class="px-3 py-2 border">District</th>
                <td class="px-3 py-2 border"><?php echo $data[0]->district ?></td>
            </tr>
            <tr>
                <th class="px-3 py-2 border">TXN</th>
                <td class="px-3 py-2 border"><?php echo $data[0]->txn ?></td>
            </tr>
            </tbody>
        </table>
    </div>

<h1 class="mt-4 mb-2 text-xl">Order Summary</h1>
    <table class="w-full bg-white rounded">
        <thead>
        <th class="px-3 py-2 border">#</th>
        <th class="px-3 py-2 border">Image</th>
        <th class="px-3 py-2 border w-full">Product Name</th>
        <th class="px-3 py-2 border">Unit Price</th>
        <th class="px-3 py-2 border">Qty</th>
        <th class="px-3 py-2 border">Total</th>
        </thead>
        <tbody>
        <?php foreach ($ordered_products as $item => $value) { ?>
            <tr>
                <td class="px-3 py-2 border"><?php echo $item + 1 ?></td>
                <td class="px-3 py-2 border"><img width="5px" height="5px"
                                                  src="<?php echo base_url() . "images/" . $value['image'] ?>"
                                                  alt="<?php echo $value['name'] ?>"></td>
                <td class="px-3 py-2 border"><a href="<?php echo base_url() . "home/productDetail/" . $value["id"] ?>"
                                                class="hover:text-indigo-500"><?php echo $value['name'] ?></a></td>
                <td class="px-3 py-2 border"><?php echo $value['price'] ?></td>
                <td class="px-3 py-2 border"><?php echo $value['qty'] ?></td>
                <td class="px-3 py-2 border"><?php echo $value['total'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="text-right mt-2">
        <h1 class="w-3/6 text-xl font-semibold">Total: <?php echo $data[0]->payable ?>BDT</h1>
    </div>

</div>
</body>
</html>
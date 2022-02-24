<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail template</title>
    <style>
        body {
            width: 80%;
            margin: 50px auto;
            font-family: sans-serif;
            background: aliceblue;
        }
table{
    width: 100%;
}
        .thanks {
            text-align: center;
        }

        th {
            width: auto;
            text-align: left;
            background: #2f2f2f;
            color: white;
        }

        th:first-child {
            width: 5%;
        }

        th, td {
            padding: 5px 10px;
        }

        tr td {
            border-bottom: 1px solid lightgray;
        }

        tr:last-child td {
            border-bottom: 1px solid black;
        }

        .total {
            padding: 10px;
            text-align: center;
            background: whitesmoke;
        }

        .links {
            text-align: center;
        }

        .links a {
            text-decoration: none;
        }

        .links a:first-child {
            background: black;
            color: white;
            padding: 10px 12px;
        }

        .links a:last-child {
            border: 1px solid black;
            padding: 10px 12px;
            color: black;
        }
    </style>
</head>
<body>
<header></header>
<main>
    <div class="thanks">
        <img src="<?php echo base_url()."assets/tick.svg"?>" alt="" width="65px">
        <h3>Thank you for placing your order
            with our store!</h3>
        <p>This email is to confirm your recent order.</p>
    </div>
    <table>
        <thead>
        <th>#</th>
        <th>Product</th>
        <th>Unit Price</th>
        <th>Qty</th>
        <th>Total</th>
        </thead>
        <tbody>
        <?php foreach ($ordered_products as $item => $value) { ?>
            <tr>
                <td class="px-3 py-2 border"><?php echo $item + 1 ?></td>
               <td class="px-3 py-2 border"><a href="<?php echo base_url() . "home/productDetail/" . $value["id"] ?>"
                                                class="hover:text-indigo-500"><?php echo $value['name'] ?></a></td>
                <td class="px-3 py-2 border"><?php echo $value['price'] ?></td>
                <td class="px-3 py-2 border">X <?php echo $value['qty'] ?></td>
                <td class="px-3 py-2 border"><?php echo $value['total'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <h2 class="total">
        Total: <?php echo $data[0]->payable ?>BDT
    </h2>
    <div class="links">
        <a href="<?php echo base_url()."home/show_order/".$data[0]->id?>">Order Detail</a>
        <a href="<?php echo base_url()."home/downloadPdf/".$data[0]->id?>">Download Invoice</a>
    </div>
</main>
<footer></footer>
</body>
</html>
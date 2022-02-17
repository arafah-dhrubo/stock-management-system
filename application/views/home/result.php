<div id="result" class="absolute w-full shadow-xl
    <?php if (isset($result)) { ?>
     bg-white px-3 py-2">
    <?php
    $i=0;
    foreach ($result as $index => $item) {?>
        <a
           href="<?php echo base_url() . 'product/product_page?keyword=', $item->name?>"
           class="mt-25 hover:text-indigo-500"><?php echo $item->name ?></a><br>
    <?php
        if($i++>=2)break;
    }?>
    <?php } else { ?>"><?php } ?>
    <span id="more-result">

    </span>
</div>
<script>
    document.getElementById('search').addEventListener('keyup', e => {
        const str = e.target.value.trim();
        if (str == "") {
            document.getElementById("result").innerHTML = "";
            return;
        } else if (str.length >= 1) {
            const xhr = new XMLHttpRequest();

            xhr.open("GET", "/stock/product/fetch/" + str, true);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                    document.getElementById("more-result").innerHTML=`
                    <a href='<?php echo base_url()?>product/product_page?keyword=${str}' class='text-sm text-orange-400'>See More</a>`;
                }
            };
            xhr.send(null);
        }
    });
</script>
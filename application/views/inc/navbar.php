<script src="<?php base_url().'js/custom.js'?>"></script>
<nav class="bg-white py-3 px-2">
    <div class="w-11/12 mx-auto flex justify-between items-center">
        <a href="/stock" class="logo text-3xl text-gray-900 font-semibold uppercase"><span class="text-indigo-500">TD</span>Ipsum
        </a>
       <div class="flex gap-3">
           <a href="<?php echo base_url().'home'?>" class="px-3 py-1 flex items-center "><i class="fas fa-paper-plane text-2xl"></i> Home</a>
           <a href="<?php echo base_url().'accounts/logout'?>"
              class="px-3 py-1 flex items-center rounded text-sm font-semibold uppercase cursor-pointer bg-red-500 text-white"
           ><i class="fas fa-sign-out-alt text-2xl"></i>
               Logout
           </a>
       </div>
    </div>
</nav>

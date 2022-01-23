<?php include("application/views/inc/header.php") ?>

<main class="bg-purple-50 h-screen">
    <div class="flex items-center h-screen justify-center">
        <div class="bg-white shadow w-3/4 md:w-1/4 px-3 py-5 text-center">
            <div class="flex justify-between items-center mb-3">
                <h1 class="font-bold text-2xl">Login Account</h1>
            </div>

            <form action="<?php echo base_url().'accounts/login'?>" class="text-left" method="post">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="Input your username" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Input your password" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <input type="submit" value="Login" class="bg-indigo-500 w-full text-center text-white text-xl py-2 cursor-pointer hover:bg-indigo-600">
            </form>
        </div>

</main>

<?php include("application/views/inc/footer.php") ?>

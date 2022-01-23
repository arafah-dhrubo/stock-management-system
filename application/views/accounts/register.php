<?php include("application/views/inc/header.php") ?>

<main class="bg-purple-50 h-screen">
    <div class="flex items-center h-screen justify-center">
        <div class="bg-white shadow w-3/4 md:w-2/4 px-3 py-5 text-center">
            <div class="flex justify-between items-center mb-3">
                <h1 class="font-bold text-2xl">Create Account</h1>
                <?php echo anchor("welcome/index", "Go Back", ['class' => 'bg-indigo-500 text-white px-3 py-2 hover:bg-indigo-600']); ?>
            </div>
            <form method="post" class="text-left">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="Your username" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <label for="email">Email Address</label><br>
                <input type="email" name="email" id="email" placeholder="Input Email Address" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <label for="gender">Gender</label><br>
                <select name="gender" id="gender" class="w-full p-2 focus:outline-0 focus:border-2 border border-indigo-600 mb-3">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Input Your password" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <label for="confirm_password">Password</label><br>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Input Your confirm password" class="p-2 w-full focus:outline-0 focus:border-2 border border-indigo-600 mb-3"><br>
                <input type="submit" value="Create Account" class="bg-indigo-500 w-full text-center text-white text-xl py-2 cursor-pointer hover:bg-indigo-600">
            </form>
            Already registered? <?php echo anchor("accounts/login", "Login", ['class' => 'text-indigo-500 hover:text-indigo-600']); ?> here.
        </div>

</main>

<?php include("application/views/inc/footer.php") ?>
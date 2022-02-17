<?php include("application/views/inc/header.php") ?>

<main class="bg-purple-50 h-screen">
    <div class="flex items-center h-screen justify-center">
        <div class="bg-white shadow w-3/4 md:w-1/4 px-3 py-5 ">
            <div class="flex justify-between items-center mb-3">
                <h1 class="font-bold text-2xl">Create Account</h1>
                <?php echo anchor("welcome/index", "Go Back", ['class' => 'bg-indigo-500 text-white px-3 py-2 hover:bg-indigo-600']); ?>
            </div>
            <form action="" method="post">
                <div class="w-full">
                    <label for="username" class="text-sm font-semibold"
                    >Username</label
                    ><br/>
                    <input
                            type="text"
                            name="username"
                            id="username"
                            placeholder="Username"
                            value="<?php echo $data['username'] ?>"
                            class="mb-2 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                    /><br/>
                    <span class="text-red-500">
                    <?php echo form_error('username'); ?>
                </span>
                    <label for="email" class="text-sm font-semibold"
                    >Email Address</label
                    ><br/>
                    <input
                            type="text"
                            name="email"
                            id="email"
                            placeholder="Email Address"
                            value="<?php echo $data['email'] ?>"
                            class="mb-2 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                    /><br/>
                    <span class="text-red-500">
                    <?php echo form_error('email'); ?>
                </span>
                    <label for="password" class="text-sm font-semibold"
                    >Password</label
                    ><br/>
                    <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            value="<?php echo $data['password'] ?>"
                            class="mb-2 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                    /><br/>
                    <span class="text-red-500">
                    <?php echo form_error('password'); ?>
                </span>
                    <label for="confirm_password" class="text-sm font-semibold"
                    >Confirm password</label
                    ><br/>
                    <input
                            type="password"
                            name="confirm_password"
                            id="confirm_password"
                            placeholder="Confirm password"
                            value="<?php echo $data['confirm_password'] ?>"
                            class="mb-2 focus:outline-0 focus:border-2 focus:border-indigo-500 border border-gray-300 w-full rounded px-2 py-1"
                    /><br/>
                    <span class="text-red-500">
                    <?php echo form_error('confirm_password'); ?>
                </span>
                    <input type="submit"
                           value="Create New Account"
                           class="mb-2 bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                    >
                </div>
            </form>
            Already registered? <?php echo anchor("accounts/login", "Login", ['class' => 'mb-2 text-indigo-500 hover:text-indigo-600']); ?> here.
        </div>

    </div>
</main>

<?php include("application/views/inc/footer.php") ?>
<?php include("application/views/inc/header.php") ?>

<main class="bg-purple-50 h-screen">
    <div class="flex flex-col justify-center items-center h-screen justify-center">
        <div class="bg-white mb-3 shadow w-3/4 md:w-1/4 px-3 py-5">
            <table class=" w-full">
                <tr class="text-left w-full">
                    <th class="border px-2 py-1">Username</th>
                <td class="border px-2 py-1">admin</td>
                </tr>
                <tr class="border text-left w-full p-3">
                    <th class="border px-2 py-1">password</th>
                <td class="border px-2 py-1">1234</td>
                </tr>
            </table>
        </div>
        <div class="bg-white shadow w-3/4 md:w-1/4 px-3 py-5">
            <div class="flex justify-between items-center mb-3">
                <h1 class="font-bold text-2xl">Login Account</h1>
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
                    <input type="submit"
                           value="Login"
                           class="mb-2 bg-indigo-500 cursor-pointer text-center px-2 py-1 mt-1 rounded text-white w-full"
                    >
                </div>
            </form>
            New
            Here? <?php echo anchor("accounts/register", "Create Account", ['class' => 'mb-2 text-indigo-500 hover:text-indigo-600']); ?>
            here.
        </div>

</main>

<?php include("application/views/inc/footer.php") ?>

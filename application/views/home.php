<?php include("inc/header.php") ?>
<main class="bg-purple-50 h-screen">
	<div class="flex items-center h-screen justify-center">
		<div class="bg-white shadow w-3/4 md:w-2/4 px-3 py-5 text-center">
			<h1 class="font-bold text-2xl">Stock Management System</h1>
			<div class="mt-6">
                <a href="<?php echo base_url().'accounts/register'?>" class='bg-indigo-500 text-white px-3 py-2 hover:bg-indigo-600'>Register</a>
                <a href="<?php echo base_url().'accounts/login'?>" class='bg-indigo-500 text-white px-3 py-2 hover:bg-indigo-600'>Login</a>
			</div>
		</div>

</main>
<?php include("inc/footer.php") ?>

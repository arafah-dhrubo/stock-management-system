<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo $_SESSION['title'] ?? 'TDIpsum' ?></title>
	<link
			rel="stylesheet"
			href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"
	/>
    <link rel="icon" href="<?php echo base_url() . 'assets/favicon.ico' ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ob6b1fcb5bc5kabcbjay5gisc52s3xvjjluwxewnqbx2qy5b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script defer src="https://unpkg.com/alpinejs@3.9.0/dist/cdn.min.js"></script>

</head>
<body class=" bg-indigo-50">
<?php
if($session=$this->session->tempdata()){?>
<div class="absolute bottom-10 bg-white right-10 rounded shadow shadow-<?php echo $session['color']?>-500">
    <div class="bg-<?php echo $session['color']?>-600 px-2 py-1 text-white flex items-center">
        <span class="text-2xl mr-2"><?php echo $session['color']=='red'?'<i class="far fa-times-circle"></i>':'
    <i class="far fa-check-circle"></i>';?></span>
<p><?php var_dump($session['message']); ?></p>
    </div>
</div>
<?php }?>


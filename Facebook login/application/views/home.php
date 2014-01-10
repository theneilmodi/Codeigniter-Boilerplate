<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Undernotes </title>

	<link rel="stylesheet/less" href="<?=base_url()?><?=LESS_PATH?>main.less">
	<script src="<?=base_url()?><?=JS_PATH?>less.js"></script>

</head>

<body>
	<div class = 'container'>
		<script>
		console.log("home");
		</script>

			<?php print_r($user); ?>

			<br>

			<a href="<?php echo $logout?>">Logout</a> 


	</div>
</body>
</html>
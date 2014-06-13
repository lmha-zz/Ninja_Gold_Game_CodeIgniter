<?php
date_default_timezone_set('America/Los_Angeles');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Money</title>
	<link rel="stylesheet" text="text/css" href="/assets/css/css.css">
</head>
<body>
	<div id="header">
		<h1>Your Gold: <div id="gold"><?= $this->session->userdata('gold') ?> Gold</div></h1>
	</div>
	<div class="choose_path_wrapper">
		<h3>Farm</h3>
		<p>(earns 10-20 gold)</p>
		<form action="<?= base_url('ninjagold/farm') ?>">
			<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="choose_path_wrapper">
		<h3>Cave</h3>
		<p>(earns 5-10 gold)</p>
		<form action="<?= base_url('ninjagold/house') ?>">
			<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="choose_path_wrapper">
		<h3>House</h3>
		<p>(earns 2-5 gold)</p>
		<form action="<?= base_url('ninjagold/cave') ?>">
			<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="choose_path_wrapper">
		<h3>Casino</h3>
		<p>(earns/takes 0-50 gold)</p>
		<form action="<?= base_url('ninjagold/casino') ?>">
			<input type="submit" value="Find Gold!">
		</form>
	</div>
	<h2>Activities:</h2>
	<div id="activity_wrapper">
		<div class="inner">
		<?php
		$logger = $this->session->userdata('activity_logger');
		foreach ($logger as $message) {
			echo $message;
		}
		?>
		</div>
	</div>
	<form action="/ninjagold/reset" method="post">
		<input id="reset_button" type="submit" value="Reset Game">
	</form>
</body>
</html>

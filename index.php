<?php 
require 'lib/loader.php';
session_start() ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>bioRelai</title>
		<style>
			@import url(styles/bioRelai.css);
		</style>
	</head>
	<body>
		<?php
			include_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>

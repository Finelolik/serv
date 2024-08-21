<?php include('../auth/auth.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="../styles/style.css" />
		<title>Главная</title>
	</head>
</html>
<body>
	<div class="container">
		<div class="header">
			<div class="header-line" id="#">
				<div class="nav">
					<div class="left">
						<a href=".."
							><img class="image" src="../images/law.png" alt="logo"
						/></a>
					</div>
					<div class="quitadm">
						<span class="login">login: $login</span>
						<a href="../auth/logout.php"><div class="quit">Выйти</div></a>
					</div>
				</div>
			</div>
			<div class="requestsblock" id="requests-container">
				<script src="../js/req.js"></script>
			</div>
		</div>
	</div>
</body>

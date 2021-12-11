<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Quản lý học sinh</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>
		<header>QUAN LY HOC SINH</header>
		<content>
			<div class="container">
				<ul class="nav justify-content-center">
					<li class="nav-item active">
						<a class="nav-link" href="/index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/list.php">Danh sách học sinh</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cau1.png">Câu 1</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Đăng xuất</a>
					</li>
				</ul>
				<br>
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Xin chào!</h4>
						<h3><?php echo $_SESSION['username']?></h3>
						<p>Đăng nhập vào lúc <?php echo $_SESSION['datetime']?></p>
					</div>
				</div>
			</div>
			
		</content>
		<footer>
			Ngô Quang Vinh - 80413 - CNT59DH
		</footer>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
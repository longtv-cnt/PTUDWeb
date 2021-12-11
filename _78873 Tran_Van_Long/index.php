<!DOCTYPE html>
<html>
<head>
	<title>Quản lý vận đơn</title>
	<script type="text/javascript" src="bootstrap/bootstrap/js/jquery-3.6.0.slim.min.js"></script>

	<script type="text/javascript" src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<header>
		<div class="header"> quản lý vận đơn</div>
	</header>
	<!-- ///////////////////////////////////// -->
	<content>
		<?php
		session_start();
		if(!isset($_SESSION['username'])){
			header('location:sign_in.php');
	}
?>
		<div class="container">
					<ul class="nav editnav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Trang chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="list.php">Danh sách vận đơn</a>

						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">Ảnh câu 1</a>
						</li>
						<?php if (!empty($_SESSION['username'])): ?>
							<p> xin chào $_SESSION['username']
								
							</p>
							<a href="/sign_out.php"> Đăng xuất</a>
						<?php else:?>
						 <a class="nav-link" href="sign_in.php">Đăng nhập</a>
						<?php endif ?>
						 


						<!-- <li class="nav-item">
							<a class="nav-link" href="sign_in.php">Đăng nhập</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="sign_out.php">Đăng xuất</a>
						</li> -->
					</ul>
				<p>Đây là project ôn tập</p>
		</div>
	
	</content>
	<!-- ////////////////////////////////////////// -->
	<footer class="footer card-footer">
		Trần Văn Long 78873-CNT59DH
	</footer>
</head>
<body>

</body>
</html>
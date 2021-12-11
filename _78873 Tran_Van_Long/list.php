<?php
session_start();
		if(!isset($_SESSION['username'])){
			header('location:sign_in.php');}
include("config.php");
if (empty($_POST['submit'])){
	$sql="SELECT * FROM hienthi";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result = array();
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$result[]=$row;
	}	
}else{
		$timkiem = $_POST['timkiem'];
		$sql = "SELECT * FROM hienthi WHERE hovaten LIKE '%$timkiem%'";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row;
		}
	}

?>
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
						<li class="nav-item">
							<a class="nav-link" href="sign_in.php">Đăng nhập</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="sign_out.php">Đăng xuất</a>
						</li>
					</ul>
				<form class="form-inline m-4" method="post" name="submit">
						<div class="form-group">
							
							<input type="text" class="form-control" 
							name="timkiem"  placeholder="Nhập tên nhân viên">
						</div>
						
						<button type="submit" class="btn btn-primary ml-2">Tìm 
						</button>
				</form>	
			<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
				<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
				  <caption>Danh sách vận đơn</caption>
				  <thead class="thead-dark|thead-light">
				    <tr>
				      <th scope="col">ID Vận đơn</th>
				      <th scope="col">Nhân viên</th>
				      
				      <th scope="col">Hàng hóa</th>
				      <th scope="col">Số lượng</th>
				       <th scope="col">Người nhận</th>
				      <th scope="col">Thao tác</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($result as $items):?>
				  		
				  	
				    <tr>
				      <td><?php echo $items['id'] ?></td>
				      <td><?php echo $items['hovaten'] ?></td>

				      
				      <td><?php echo $items['ten'] ?></td>
				      <td><?php echo $items['soluong'] ?></td>
				      <td><?php echo $items['nguoinhan'] ?></td>

				     <td><a href="add_vandon.php" target="blank">Thêm</a></td>

				    </tr>
				    <?php endforeach?>
				  </tbody>
				</table>
			</div>
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
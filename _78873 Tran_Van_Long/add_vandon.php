<?php
session_start();
		if(!isset($_SESSION['username'])){
			header('location:sign_in.php');}
include("config.php");

$sql="SELECT hovaten, ten, nhanvien.id as idnv, hanghoa.id as idhh FROM nhanvien, hanghoa WHERE nhanvien.id = hanghoa.id";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result = array();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$result[]=$row;
}
if (empty($_POST['submit'])) {
	if(isset($_POST['idvandon'])&&isset($_POST['idctvandon'])&&isset($_POST['nhanvien'])&&isset($_POST['nguoinhan'])&&isset($_POST['hanghoa'])&&isset($_POST['sl'])) {
		$idvd = $_POST['idvandon'];
			$idctvd = $_POST['idctvandon'];
			$nhanvien = $_POST['nhanvien'];
			$nguoinhan = $_POST['nguoinhan'];
			$hanghoa = $_POST['hanghoa'];
			$soluong = $_POST['sl'];
			$sql = "INSERT INTO vandon(id,nhanvien_id,nguoinhan) VALUES('$idvd','$nhanvien','$nguoinhan');
			INSERT INTO ChiTietVanDon(id,vandon,hanghoa_id,soluong) VALUES('$idctvd','$idvd','$hanghoa','$soluong')";
			var_dump($sql);
			$stmt = $conn->prepare($sql);
			$query = $stmt->execute();
			if($query){
				header('location:list.php');
			}
			else{
				echo "Thêm dữ liệu thất bại";
			}
		# code...
	}
	# code...
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
		<div class="header"> Thêm vận đơn</div>
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

				<form method="post">
					<fieldset class="form-group">
						<label>id vận đơn</label>
						<input type="text" class="form-control" 
						name="idvandon" placeholder="nhập id vận đơn">
					</fieldset>
					<fieldset>
					<label>id chi tiết vận đơn</label>
						<input type="text" class="form-control" 
						name="idctvandon" placeholder="nhập id chi tiết vận đơn">
					</fieldset>
					<fieldset>
						<label>Nhân viên</label>
							<select  class="form-control" name="nhanvien" placeholder="chọn nhân vien ">  
									<?php
										foreach ($result as $items):?>

									<option value="<?php echo $items['idnv'] ?>">
										<?php echo $items['hovaten'] ?>
									</option>
									<?php endforeach ?>
							</select>


							
					</fieldset>
					<fieldset>
						<label>Tên người nhận</label>
						<input type="text" class="form-control" 
						name="nguoinhan" placeholder="nhập tên người nhận">
					</fieldset>
					<fieldset>
						<label>tên hàng hóa</label>
						<select  class="form-control" name="hanghoa" placeholder="chọn hàng hóa "> 
								<?php
									foreach ($result as $items):?>

							<option value="<?php echo $items['idhh'];?>">
								<?php echo $items['ten'];?> 
							</option><?php endforeach?></select> 

					</fieldset>
					<fieldset>
						<label>Số lượng</label>
							<input type="text" class="form-control" 
							name="sl" placeholder="nhập số lượng">
					</fieldset>
						<button type="submit" class="btn btn-info btn-lg|btn-sm form-control mt-4" value="Lưu">Lưu</button>
				</form>
		</div>
	
	</content>
	<!-- ////////////////////////////////////////// -->
	<footer class="footer card-footer">
		Trần Văn Long 78873-CNT59DH
	</footer>
</head>
<body>
<!-- SELECT vandon.id, nhanvien.hovaten,hanghoa.ten,soluong,vandon.nguoinhan 
FROM `chitietvandon`,hanghoa,nhanvien,vandon
WHERE vandon.nhanvien_id=nhanvien.id 
AND chitietvandon.hanghoa_id=hanghoa.id
AND chitietvandon.vandon=vandon.id -->
</body>
</html>
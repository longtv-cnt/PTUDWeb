<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
	include 'connect.php';
	$sql="SELECT id as lopid FROM lop";
	$stmt = $conn->prepare($sql);
	$query = $stmt->execute();
	$result = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[] = $row;
	}
	if(!empty($_POST['submit'])){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$trangthai = $_POST['trangthai'];
			$lopid = $_POST['lopid'];
			$hovaten = $_POST['hovaten'];
			$ngaysinh = $_POST['ngaysinh'];
			$mota = $_POST['mota'];
			$newdate = date("Y-m-d",strtotime($ngaysinh));
			$sql = "INSERT INTO hocsinh(id,trangthai,lop_id,hovaten,ngaysinh,mota) VALUES ('$id','$trangthai','$lopid','$hovaten','$newdate','$mota')";
			$stmt = $conn->prepare($sql);
			$query = $stmt->execute();
			if($query){
				header('location:list.php');
			}
			else{
				echo "Thêm học sinh thất bại";
			}
		}
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
			<nav class="navbar navbar-expand-lg">
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
				</div>
			</nav>
            <div class="container">
            <form method="post" action="" name="fm_Add_student">
                <fieldset class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" name="id" placeholder="Enter ID">
                </fieldset>
                <fieldset class="form-group">
                    <label for="trangthai">Trạng Thái</label>
                    <input type="number" class="form-control" name="trangthai" placeholder="Enter Status">
                </fieldset>
                <fieldset class="form-group">
                    <label for="lopid">ID Lớp</label>
					<div class="form-group">
					  <label for=""></label>
					  <select class="form-control" name="lopid" placeholder="Chọn lớp ID">
						<?php foreach($result as $item): ?>
					  	<option value="<?php echo $item['lopid'] ?>">
							<?php echo $item['lopid'] ?>
						</option>
						<?php endforeach; ?>
					  </select>
					</div>
                </fieldset>
                <fieldset class="form-group">
                    <label for="hovaten">Họ và Tên</label>
                    <input type="text" class="form-control" name="hovaten" placeholder="Enter Fullname">
                </fieldset>
                <fieldset class="form-group">
                    <label for="ngaysinh">Ngày Sinh</label>
                    <input type="date" class="form-control"  name="ngaysinh" placeholder="Enter Birthday">
                </fieldset>
                <fieldset class="form-group">
                    <label for="mota">Mô Tả</label>
                    <textarea class="form-control" placeholder="Mô Tả" name="mota" id="floatingTextarea2" style="height: 100px"></textarea>
                    <!-- <input type="t" class="form-control" id="mota" placeholder="Enter Description"> -->
                </fieldset>
				<br>
				<fieldset class="form-group">
					<input type="submit" value="THÊM" class="btn btn-primary" name="submit">
				</fieldset>
            </form>
            </div>
		</content>
		<footer>
			Ngô Quang Vinh - 80413 - CNT59DH
		</footer>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
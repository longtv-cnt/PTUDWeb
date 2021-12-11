<?php
    include 'connect.php';
    session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
	if(empty($_POST['submit'])){
        $sql = "SELECT * FROM hocsinh";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
	else{
		$search = $_POST['search'];
		$sql = "SELECT * FROM hocsinh WHERE hovaten LIKE '%$search%'";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row; 
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
				<nav class="navbar">
					<div class="container-fluid justify-content-center">
						<form class="d-flex" method="POST">
							<input class="form-control me-2" type="text" name="search" placeholder="Tên nhân viên">
							<input class="btn btn-outline-success" type="submit" name="submit" value="Tìm kiếm">
						</form>
					</div>
				</nav>
				<hr>              
                <a href="add_hocsinh.php" class="btn btn-primary" name="add">Thêm học sinh</a>
				<br><br>
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ Và Tên</th>
                            <th>Trạng Thái</th>
                            <th>Lớp</th>
                            <th>Ngày sinh</th>
                            <th>Mô tả</th>
							<th>Thao tac</th>
                        </tr>
                        </thead>
                        <tbody>
							<?php foreach ($result as $item):?>
                            <tr>
                                <td scope="row"><?php echo $item['id'] ?></td>
                                <td scope="row"><?php echo $item['hovaten'] ?></td>
                                <td scope="row"><?php echo $item['trangthai'] ?></td>
                                <td scope="row"><?php echo $item['lop_id'] ?></td>
                                <td scope="row"><?php echo $item['ngaysinh'] ?></td>
                                <td scope="row"><?php echo $item['mota'] ?></td>
								<td>
									<a href="/tongket.php?id=<?php echo $item['id']?>" class="btn btn-primary">Nhận xét</a>
								</td>
                            </tr>
							<?php endforeach?>
                        </tbody>
                </table>
            </div>
		</content>
		<footer>
			Ngô Quang Vinh - 80413 - CNT59DH
		</footer>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
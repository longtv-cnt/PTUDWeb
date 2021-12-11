<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
    include 'connect.php';
    
    if(isset($_GET['id'])){
        $idhs = $_GET['id'];
        $sql = "SELECT * FROM nhanxet WHERE id_hs = '$idhs'";
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Nam hoc</th>
                            <th>Nhan xet chung</th>
                            <th>Uu diem</th>
                            <th>Khuyet diem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $item):?>
                        <tr>
                            <td><?php echo $item['id_hs'] ?></td>
                            <td><?php echo $item['namhoc'] ?></td>
                            <td><?php echo $item['nhanxetchung'] ?></td>
                            <td><?php echo $item['uudiem'] ?></td>
                            <td><?php echo $item['cankhacphuc'] ?></td> 
                        </tr>
                        <?php endforeach ?>
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